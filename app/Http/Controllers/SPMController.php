<?php

namespace App\Http\Controllers;

use App\Models\Master\SpmLevel;
use App\Models\SurveyQuestion;
use App\Services\WilayahService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SPMController extends Controller
{
    private WilayahService $wilayahService;
    
    public function __construct(WilayahService $wilayahService)
    {
        $this->wilayahService = $wilayahService;
    }

    public function index()
    {
        $data['meta'] = [
            'title' => 'BERANDA'
        ];

        return view('public.index', $data);
    }

    public function sarpasTK()
    {
        $spmLevel = SpmLevel::where('spm_level_id', 'SPM_TK')->first();
        $questions = SurveyQuestion::query()
            ->where('is_disabled', false)
            ->where('spm_level_id', 'SPM_TK')
            ->orderBy('order')
            ->get();

        $data = [
            'title' => 'SARPAS TK',
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

        return view('public.form.tk', $data);
    }
    
    public function sarpasKB()
    {
        $spmLevel = SpmLevel::where('spm_level_id', 'SPM_KB')->first();
        $questions = SurveyQuestion::query()
            ->where('is_disabled', false)
            ->where('spm_level_id', 'SPM_KB')
            ->orderBy('order')
            ->get();

        $data = [
            'title' => 'SARPAS KB',
            'spm_title' => $spmLevel->name,
            'survey_questions' => $questions
        ];

        return view('public.form.kb', $data);
    }

    public function sarpasSPS()
    {
        $data['meta'] = [
            'title' => 'SARPAS SPS'
        ];

        return view('public.form.sps', $data);
    }

    public function storeTK(Request $request)
    {
        try {
            $validateData = $this->validate($request, [
                'name-school' => 'required|string|max:124',
                'name-headmaster' => 'required|string|max:124',
                'teacher' => 'required|string|max:12',
                'nip' => 'nullable|string|max:20',
                'kualifikasi-akademik-guru' => 'required|string|max:12',
                'rombel-a' => 'required|string|max:12',
                'rombel-b' => 'required|string|max:12',
                'total-siswa' => 'required|string|max:12',
                'akreditasi' => 'required|boolean',
                'peringkat' => 'nullable|string|max:12',
                'alamat-1' => 'required|string|max:255',
                'alamat-2' => 'required|string|max:64',
                'alamat-3' => 'required|string|max:64',
                'alamat-4' => 'required|string|max:64',
                'alamat-5' => 'required|string|max:10',
                'lokasi' => 'required|string',
                'g-recaptcha-response' => 'required|recaptchav3:tk,0.5'
            ]);

        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }

    }

    public function sarpasSD()
    {

        $data = [
            'title' => 'SARPAS SD',
            // 'spm_title' => $spmLevel->name,
            // 'survey_questions' => $questions
        ];

        return view('public.form.sd', $data);
    }

    public function storeSD(Request $request)
    {
        try {
            $validateData = $this->validate($request, [
                'name-school' => 'required|string|max:124',
                'name-headmaster' => 'required|string|max:124',
                'teacher' => 'required|string|max:12',
                'nip' => 'nullable|string|max:20',
                'kualifikasi-akademik-guru' => 'required|string|max:12',
                'rombel-a' => 'required|string|max:12',
                'rombel-b' => 'required|string|max:12',
                'total-siswa' => 'required|string|max:12',
                'akreditasi' => 'required|boolean',
                'peringkat' => 'nullable|string|max:12',
                'alamat-1' => 'required|string|max:255',
                'alamat-2' => 'required|string|max:64',
                'alamat-3' => 'required|string|max:64',
                'alamat-4' => 'required|string|max:64',
                'alamat-5' => 'required|string|max:10',
                'lokasi' => 'required|string',
                'k-1' => 'required|boolean',
                'k-2' => 'required|boolean',
                'k-3' => 'required|boolean',
                'k-4' => 'required|boolean',
                'k-5' => 'required|boolean',
                'k-6' => 'required|boolean',
                'k-7' => 'required|boolean',
                'k-8' => 'required|boolean',
                'k-9' => 'required|boolean',
                'k-10' => 'required|boolean',
                'k-11' => 'required|boolean',
                'k-12' => 'required|boolean',
                'k-13' => 'required|boolean',
                'k-14' => 'required|boolean',
                'k-15' => 'required|boolean',
                'k-16' => 'required|boolean',
                'k-17' => 'required|boolean',
                'k-18' => 'required|boolean',
                'k-19' => 'required|boolean',
                'k-20' => 'required|boolean',
                'g-recaptcha-response' => 'required|recaptchav3:tk,0.5'
            ]);

        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }

    }
}
