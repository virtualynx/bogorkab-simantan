<?php

namespace App\Http\Api;

use App\Models\Answer;
use App\Models\Master\District;
use App\Models\Master\Province;
use App\Models\Master\Regency;
use App\Models\Master\Village;
use App\Models\School;
use App\Services\WilayahService;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class HistoryApi extends Controller
{
    public function __construct()
    {
    }

    public function getSchoolAnsweredList(): JsonResponse
    {
        $year = request('year');

        if(empty($year)){
            $year = now()->year;
        }

        $school_ids = Answer::query()
            ->where('period_year', $year)
            ->distinct()
            ->pluck('school_id');

        $res = School::query()
            // ->whereIn('school_id', $school_ids)
            ->get();
        
        return response()->json([
            'success' => true,
            'data' => $res
        ]);
    }

    public function getSchoolByName(): JsonResponse
    {
        $search = request('q');
        $spm_level_id = request('spm');

        $res = School::query()
            ->where('spm_level_id', $spm_level_id)
            ->where('name', 'LIKE', "%{$search}%")
            ->orderBy('name')
            ->get();
        
        return response()->json([
            'success' => true,
            'data' => $res
        ]);
    }

    public function checkAnswerBySchoolName(): JsonResponse
    {
        $school_id = request('school_id');

        $alreadyAnwered = Answer::query()
            ->where('period_year', now()->year)
            ->where('school_id', $school_id)
            ->exists();

        $res = $alreadyAnwered? 'already_answered': '';
        
        return response()->json([
            'success' => true,
            'data' => $res
        ]);
    }
}
