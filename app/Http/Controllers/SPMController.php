<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Master\SpmLevel;
use App\Models\School;
use App\Models\SurveyQuestion;
use App\Services\WilayahService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class SPMController extends Controller
{
    private const _TEACHER_EDU_ARR = ['S3', 'S2', 'S1', 'Diploma', 'SMA', 'SMP', 'SD'];

    private WilayahService $wilayahService;
    
    public function __construct(WilayahService $wilayahService)
    {
        $this->wilayahService = $wilayahService;
    }

    public function index()
    {
        $data = [
            'title' => 'BERANDA'
        ];

        return view('public.index', $data);
    }

    public function sarpasPAUD(){
        $spm_id = request('spm');
        
        $spmLevel = SpmLevel::where('spm_level_id', $spm_id)->first();
        $questions = SurveyQuestion::query()
            ->where('is_disabled', false)
            ->where('spm_level_id', $spm_id)
            ->orderBy('order')
            ->get();

        $header_title = [
            'SPM_TK' => 'SARPAS TK',
            'SPM_KB' => 'SARPAS KB',
            'SPM_SPS' => 'SARPAS SPS',
        ];

        $data = [
            'spm_level_id' => $spm_id,
            'title' => $header_title[$spm_id],
            'spm_title' => $spmLevel->name,
            'survey_questions' => $questions,
            // 'provinces' => $this->wilayahService->getProvinces(),
            // 'regencies' => $this->wilayahService->listDefaultRegency(),
            // 'districts' => $this->wilayahService->listDefaultDistrict(),
            'villages' => $this->wilayahService->listDefaultVillage(),
            'default_province' => $this->wilayahService->getDefaultProvince(),
            'default_regency' => $this->wilayahService->getDefaultRegency(),
            'default_district' => $this->wilayahService->getDefaultDistrict(),
        ];

        return view('public.form.paud', $data);
    }

    public function savePAUD(){
        $params = request()->all();

        DB::beginTransaction();
        try {
            $validationArray = [
                'spm_level_id' => 'required|string',
                'school_name' => 'required|string|max:124',
                'school_npsn' => 'nullable|string|max:20',
                'headmaster_name' => 'required|string|max:124',
                'headmaster_nip' => 'nullable|string|max:20',
                'teacher_count' => 'required|numeric',
                'rombel_a' => 'required|numeric',
                'rombel_b' => 'required|numeric',
                'student_count' => 'required|numeric',
                'accreditation' => 'nullable|string|max:12',
                'address_province' => 'required|string',
                'address_regency' => 'required|string', 
                'address_district' => 'required|string',
                'address_village' => 'required|string',
                'address_detail' => 'nullable|string|max:5000',
                'k-*' => 'required|boolean',
            ];

            foreach(self::_TEACHER_EDU_ARR as $row){
                $validationArray["kualifikasi_count_$row"] = 'nullable|numeric';
            }

            $validateData = $this->validate(request(), $validationArray);

            if(empty($params['lat']) || empty($params['lng'])){
                throw new \Exception("Lokasi sekolah harus dipilih pada map");
            }

            $questions = SurveyQuestion::query()
                ->where('spm_level_id', $params['spm_level_id'])
                ->get();

            foreach($questions as $row_question){
                if(!isset($params['k-'.$row_question->survey_question_id])){
                    // throw ValidationException::withMessages([
                    //     'k-'.$row_question->survey_question_id => 'Harus diisi',
                    // ]);
                    
                    throw new \Exception("Pertanyaan ke-$row_question->order wajib diisi !");
                }
            }
            
            $school = null;
            if(!empty($params['school_id'])){
                $school = School::where('school_id', $params['school_id'])->first();
            }else{
                $inputData = [
                    'spm_level_id' => $params['spm_level_id'],
                    'name' => $params['school_name'],
                    'NPSN' => $params['school_npsn']? $params['school_npsn']: null,
                    'headmaster_name' => $params['headmaster_name'],
                    'headmaster_nip' => $params['headmaster_nip']? $params['headmaster_nip']: null,
                    'accreditation' => $params['accreditation'],
                    'lat' => $params['lat']? $params['lat']: null,
                    'lng' => $params['lng']? $params['lng']: null,
                    'address_village_code' => $params['address_village'],
                    'address' => $params['address_detail']? $params['address_detail']: null,
                    'teacher_count' => $params['teacher_count'],
                    'teacher_s3_count' => $params['kualifikasi_count_S3']? $params['kualifikasi_count_S3']: 0,
                    'teacher_s2_count' => $params['kualifikasi_count_S2']? $params['kualifikasi_count_S2']: 0,
                    'teacher_s1_count' => $params['kualifikasi_count_S1']? $params['kualifikasi_count_S1']: 0,
                    'teacher_dipl_count' => $params['kualifikasi_count_Diploma']? $params['kualifikasi_count_Diploma']: 0,
                    'teacher_sma_count' => $params['kualifikasi_count_SMA']? $params['kualifikasi_count_SMA']: 0,
                    'teacher_smp_count' => $params['kualifikasi_count_SMP']? $params['kualifikasi_count_SMP']: 0,
                    'teacher_sd_count' => $params['kualifikasi_count_SD']? $params['kualifikasi_count_SD']: 0,
                    'rombel_a_count' => $params['rombel_a'],
                    'rombel_b_count' => $params['rombel_b'],
                    'student_count' => $params['student_count'],
                ];

                $school = new School($inputData);
                $school->save();
            }
            
            $currentYear = now()->year;
            foreach($questions as $row_question){
                $answer = new Answer([
                    'period_year' => $currentYear,
                    'school_id' => $school->school_id,
                    'survey_question_id' => $row_question->survey_question_id,
                    'answer' => $params['k-'.$row_question->survey_question_id],
                    'value' => $params['k-'.$row_question->survey_question_id],
                ]);
                $answer->save();
            }

            DB::commit();
        } catch (ValidationException $e) {
            DB::rollBack();
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }

        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }

    public function sarpasSDTest()
    {

        $data = [
            'title' => 'SARPAS SD',
            // 'spm_title' => $spmLevel->name,
            // 'survey_questions' => $questions
        ];

        return view('public.form.sd', $data);
    }

    public function sarpasDasar()
    {
        $spm_id = request('spm');
        
        $spmLevel = SpmLevel::where('spm_level_id', $spm_id)->first();
        $questions = SurveyQuestion::query()
            ->where('is_disabled', false)
            ->where('spm_level_id', $spm_id)
            ->orderBy('order')
            ->get();

        $header_title = [
            'SPM_SD' => 'SARPAS SD',
            'SPM_SMP' => 'SARPAS SMP'
        ];
        
        $data = [
            'spm_level_id' => $spm_id,
            'title' => $header_title[$spm_id],
            'spm_title' => $spmLevel->name,
            'survey_questions' => $questions,
            // 'provinces' => $this->wilayahService->getProvinces(),
            // 'regencies' => $this->wilayahService->listDefaultRegency(),
            // 'districts' => $this->wilayahService->listDefaultDistrict(),
            'villages' => $this->wilayahService->listDefaultVillage(),
            'default_province' => $this->wilayahService->getDefaultProvince(),
            'default_regency' => $this->wilayahService->getDefaultRegency(),
            'default_district' => $this->wilayahService->getDefaultDistrict(),
        ];

        return view('public.form.dasar', $data);
    }

    public function saveDasar(){
        $params = request()->all();

        DB::beginTransaction();
        try {
            $validationArray = [
                'spm_level_id' => 'required|string',
                'school_name' => 'required|string|max:124',
                'school_npsn' => 'nullable|string|max:20',
                'headmaster_name' => 'required|string|max:124',
                'headmaster_nip' => 'nullable|string|max:20',
                'teacher_count' => 'required|numeric',
                'rombel' => 'required|numeric',
                'class_count' => 'required|numeric',
                'student_count' => 'required|numeric',
                'accreditation' => 'nullable|string|max:12',
                'address_province' => 'required|string',
                'address_regency' => 'required|string', 
                'address_district' => 'required|string',
                'address_village' => 'required|string',
                'address_detail' => 'nullable|string|max:5000',
                'k-*' => 'required|boolean',
            ];

            foreach(self::_TEACHER_EDU_ARR as $row){
                $validationArray["kualifikasi_count_$row"] = 'nullable|numeric';
            }

            $validateData = $this->validate(request(), $validationArray);

            if(empty($params['lat']) || empty($params['lng'])){
                throw new \Exception("Lokasi sekolah harus dipilih pada map");
            }

            $questions = SurveyQuestion::query()
                ->where('spm_level_id', $params['spm_level_id'])
                ->get();

            foreach($questions as $row_question){
                if(!isset($params['k-'.$row_question->survey_question_id])){
                    // throw ValidationException::withMessages([
                    //     'k-'.$row_question->survey_question_id => 'Harus diisi',
                    // ]);
                    
                    throw new \Exception("Pertanyaan ke-$row_question->order wajib diisi !");
                }
            }
            
            $school = null;
            if(!empty($params['school_id'])){
                $school = School::where('school_id', $params['school_id'])->first();
            }else{
                $inputData = [
                    'spm_level_id' => $params['spm_level_id'],
                    'name' => $params['school_name'],
                    'NPSN' => $params['school_npsn']? $params['school_npsn']: null,
                    'headmaster_name' => $params['headmaster_name'],
                    'headmaster_nip' => $params['headmaster_nip']? $params['headmaster_nip']: null,
                    'accreditation' => $params['accreditation'],
                    'lat' => $params['lat']? $params['lat']: null,
                    'lng' => $params['lng']? $params['lng']: null,
                    'address_village_code' => $params['address_village'],
                    'address' => $params['address_detail']? $params['address_detail']: null,
                    'teacher_count' => $params['teacher_count'],
                    'teacher_s3_count' => $params['kualifikasi_count_S3']? $params['kualifikasi_count_S3']: 0,
                    'teacher_s2_count' => $params['kualifikasi_count_S2']? $params['kualifikasi_count_S2']: 0,
                    'teacher_s1_count' => $params['kualifikasi_count_S1']? $params['kualifikasi_count_S1']: 0,
                    'teacher_dipl_count' => $params['kualifikasi_count_Diploma']? $params['kualifikasi_count_Diploma']: 0,
                    'teacher_sma_count' => $params['kualifikasi_count_SMA']? $params['kualifikasi_count_SMA']: 0,
                    'teacher_smp_count' => $params['kualifikasi_count_SMP']? $params['kualifikasi_count_SMP']: 0,
                    'teacher_sd_count' => $params['kualifikasi_count_SD']? $params['kualifikasi_count_SD']: 0,
                    'rombel_count' => $params['rombel'],
                    'class_count' => $params['class_count'],
                    'student_count' => $params['student_count'],
                ];

                $school = new School($inputData);
                $school->save();
            }
            
            $currentYear = now()->year;
            foreach($questions as $row_question){
                $answer = new Answer([
                    'period_year' => $currentYear,
                    'school_id' => $school->school_id,
                    'survey_question_id' => $row_question->survey_question_id,
                    'answer' => $params['k-'.$row_question->survey_question_id],
                    'value' => $params['k-'.$row_question->survey_question_id],
                ]);
                $answer->save();
            }

            DB::commit();
        } catch (ValidationException $e) {
            DB::rollBack();
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }

        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }
}
