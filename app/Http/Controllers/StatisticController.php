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

class StatisticController extends Controller
{
    public function __construct()
    {
    }

    public function statistics_()
    {
        $currentYear = now()->year;

        $data = [
            'title' => 'STATISTIK SARPRAS '.$currentYear
        ];

        // Get statistics data - you'll need to implement these queries based on your database
        $stats = [
            'paud_stats' => $this->getPAUDStatistics_(),
            'dasar_stats' => $this->getDasarStatistics_(),
            'completion_stats' => $this->getCompletionStatistics_(),
            'facility_stats' => $this->getFacilityStatistics_(),
        ];

        return view('public.statistics_', array_merge($data, $stats));
    }

    private function getPAUDStatistics_()
    {
        // Example implementation - replace with actual queries
        // return [
        //     'tk_count' => School::where('spm_level_id', 'SPM_TK')->count(),
        //     'kb_count' => School::where('spm_level_id', 'SPM_KB')->count(),
        //     'sps_count' => School::where('spm_level_id', 'SPM_SPS')->count(),
        //     'total_paud' => School::whereIn('spm_level_id', ['SPM_TK', 'SPM_KB', 'SPM_SPS'])->count(),
        // ];
        
        // Realistic data for Ciomas, Kabupaten Bogor
        return [
            'tk_count' => 28, // ~48% of total PAUD
            'kb_count' => 19, // ~33% of total PAUD  
            'sps_count' => 11, // ~19% of total PAUD
            'total_paud' => 58,
        ];
    }

    private function getDasarStatistics_()
    {
        // return [
        //     'sd_count' => School::where('spm_level_id', 'SPM_SD')->count(),
        //     'smp_count' => School::where('spm_level_id', 'SPM_SMP')->count(),
        //     'total_dasar' => School::whereIn('spm_level_id', ['SPM_SD', 'SPM_SMP'])->count(),
        // ];

        return [
            'sd_count' => 32, // Adjusted to maintain realistic ratio
            'smp_count' => 10, // Adjusted to maintain realistic ratio
            'total_dasar' => 42,
        ];
    }

    private function getCompletionStatistics_()
    {
        // Get completion rates by education level
        // return [
        //     'tk_completion' => 75, // Example percentage
        //     'kb_completion' => 68,
        //     'sps_completion' => 82,
        //     'sd_completion' => 88,
        //     'smp_completion' => 79,
        // ];

        // Realistic completion rates for Ciomas (70-80% range)
        return [
            'tk_completion' => 76,
            'kb_completion' => 71,
            'sps_completion' => 74,
            'sd_completion' => 81,
            'smp_completion' => 78,
        ];
    }

    private function getFacilityStatistics_()
    {
        // Get facility availability statistics
        // return [
        //     'library_available' => 85,
        //     'lab_available' => 72,
        //     'sports_facility' => 90,
        //     'disabled_access' => 65,
        //     'health_room' => 78,
        // ];

        return [
            'library_available' => 82,
            'lab_available' => 65,
            'sports_facility' => 89,
            'disabled_access' => 42,
            'health_room' => 73
        ];
    }

    //real-time data
    public function statistics()
    {
        $currentYear = now()->year;

        $data = [
            'title' => 'STATISTIK SARPRAS '.$currentYear,
            'current_year' => $currentYear
        ];

        $stats = [
            'paud_stats' => $this->getPAUDStatistics($currentYear),
            'dasar_stats' => $this->getDasarStatistics($currentYear),
            'completion_stats' => $this->getCompletionStatistics($currentYear),
            'facility_stats' => $this->getFacilityStatistics($currentYear),
            'answer_stats' => $this->getAnswerStatistics($currentYear),
        ];

        return view('public.statistics', array_merge($data, $stats));
    }

    private function getPAUDStatistics($year)
    {
        $totalSchools = School::whereIn('spm_level_id', ['SPM_TK', 'SPM_KB', 'SPM_SPS'])->count();
        $answeredSchools = $this->getAnsweredSchoolCount(['SPM_TK', 'SPM_KB', 'SPM_SPS'], $year);

        return [
            'tk_count' => School::where('spm_level_id', 'SPM_TK')->count(),
            'kb_count' => School::where('spm_level_id', 'SPM_KB')->count(),
            'sps_count' => School::where('spm_level_id', 'SPM_SPS')->count(),
            'total_paud' => $totalSchools,
            'answered_paud' => $answeredSchools,
            'completion_rate' => $totalSchools > 0 ? round(($answeredSchools / $totalSchools) * 100, 2) : 0,
        ];
    }

    private function getDasarStatistics($year)
    {
        $totalSchools = School::whereIn('spm_level_id', ['SPM_SD', 'SPM_SMP'])->count();
        $answeredSchools = $this->getAnsweredSchoolCount(['SPM_SD', 'SPM_SMP'], $year);

        return [
            'sd_count' => School::where('spm_level_id', 'SPM_SD')->count(),
            'smp_count' => School::where('spm_level_id', 'SPM_SMP')->count(),
            'total_dasar' => $totalSchools,
            'answered_dasar' => $answeredSchools,
            'completion_rate' => $totalSchools > 0 ? round(($answeredSchools / $totalSchools) * 100, 2) : 0,
        ];
    }

    private function getCompletionStatistics($year)
    {
        $completionRates = [];
        $levels = ['SPM_TK', 'SPM_KB', 'SPM_SPS', 'SPM_SD', 'SPM_SMP'];
        
        foreach ($levels as $level) {
            $totalSchools = School::where('spm_level_id', $level)->count();
            $answeredSchools = $this->getAnsweredSchoolCount([$level], $year);
            
            $completionRates[strtolower($level) . '_completion'] = $totalSchools > 0 ? 
                round(($answeredSchools / $totalSchools) * 100, 2) : 0;
        }

        return $completionRates;
    }

    private function getFacilityStatistics($year)
    {
        // Get facility statistics based on survey answers
        $facilities = [
            'library_available' => $this->getFacilityAvailability('perpustakaan', $year),
            'lab_available' => $this->getFacilityAvailability('laboratorium', $year),
            'sports_facility' => $this->getFacilityAvailability('olahraga', $year),
            'disabled_access' => $this->getFacilityAvailability('disabilitas', $year),
            'health_room' => $this->getFacilityAvailability('kesehatan', $year),
        ];

        return $facilities;
    }

    private function getAnswerStatistics($year)
    {
        return [
            'total_answers' => Answer::where('period_year', $year)->count(),
            'unique_schools_answered' => Answer::where('period_year', $year)->distinct('school_id')->count('school_id'),
            'total_schools' => School::count(),
            'answer_coverage' => School::count() > 0 ? 
                round((Answer::where('period_year', $year)->distinct('school_id')->count('school_id') / School::count()) * 100, 2) : 0,
        ];
    }

    private function getAnsweredSchoolCount(array $spmLevels, $year)
    {
        return DB::table('answer as a')
            ->join('school as s', 'a.school_id', '=', 's.school_id')
            ->whereIn('s.spm_level_id', $spmLevels)
            ->where('a.period_year', $year)
            ->distinct('a.school_id')
            ->count('a.school_id');
    }

    private function getFacilityAvailability($facilityKeyword, $year)
    {
        // Find questions related to the facility
        $questionIds = SurveyQuestion::where('question', 'like', '%' . $facilityKeyword . '%')
            ->pluck('survey_question_id');

        if ($questionIds->isEmpty()) {
            return 0;
        }

        $totalAnswers = Answer::whereIn('survey_question_id', $questionIds)
            ->where('period_year', $year)
            ->count();

        if ($totalAnswers === 0) {
            return 0;
        }

        $positiveAnswers = Answer::whereIn('survey_question_id', $questionIds)
            ->where('period_year', $year)
            ->where(function($query) {
                $query->where('answer', '1')
                      ->orWhere('value', '>', 0);
            })
            ->count();

        return round(($positiveAnswers / $totalAnswers) * 100, 2);
    }

    // Additional method for more detailed statistics
    public function getDetailedStatistics($year = null)
    {
        if (!$year) {
            $year = now()->year;
        }

        $stats = [
            'school_distribution' => $this->getSchoolDistribution(),
            'answer_trends' => $this->getAnswerTrends(),
            'facility_comparison' => $this->getFacilityComparison($year),
        ];

        return $stats;
    }

    private function getSchoolDistribution()
    {
        return School::select('spm_level_id', DB::raw('count(*) as count'))
            ->groupBy('spm_level_id')
            ->get()
            ->pluck('count', 'spm_level_id')
            ->toArray();
    }

    private function getAnswerTrends()
    {
        $currentYear = now()->year;
        $trends = [];
        
        for ($i = 4; $i >= 0; $i--) {
            $year = $currentYear - $i;
            $count = Answer::where('period_year', $year)->distinct('school_id')->count('school_id');
            $trends[$year] = $count;
        }
        
        return $trends;
    }

    private function getFacilityComparison($year)
    {
        $facilities = ['perpustakaan', 'laboratorium', 'olahraga', 'disabilitas', 'kesehatan'];
        $comparison = [];
        
        foreach ($facilities as $facility) {
            $comparison[$facility] = $this->getFacilityAvailability($facility, $year);
        }
        
        return $comparison;
    }
}
