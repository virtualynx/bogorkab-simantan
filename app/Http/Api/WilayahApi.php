<?php

namespace App\Http\Api;

use App\Models\Master\District;
use App\Models\Master\Province;
use App\Models\Master\Regency;
use App\Models\Master\Village;
use App\Services\WilayahService;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class WilayahApi extends Controller
{
    private WilayahService $wilayahService;

    public function __construct(WilayahService $wilayahService)
    {
        $this->wilayahService = $wilayahService;
    }

    /**
     * Get all provinces
     */
    public function provinces(): JsonResponse
    {
        $provinces = Province::query()
            ->select('province_id as code, name')
            ->orderBy('name')
            ->get();
        
        return response()->json([
            'success' => true,
            'data' => $provinces
        ]);
    }

    /**
     * Get regencies by province code
     */
    public function regencies(string $provinceCode): JsonResponse
    {
        // $regencies = $this->wilayahService->getRegencies($provinceCode);
        $regencies = Regency::query()
            ->select('regency_id as code, name')
            ->orderBy('name')
            ->get();
        
        return response()->json([
            'success' => true,
            'data' => $regencies
        ]);
    }

    /**
     * Get districts by regency code
     */
    public function districts(string $regencyCode): JsonResponse
    {
        // $districts = $this->wilayahService->getDistricts($regencyCode);
        $districts = District::query()
            ->select('district_id as code, name')
            ->orderBy('name')
            ->get();
        
        return response()->json([
            'success' => true,
            'data' => $districts
        ]);
    }

    /**
     * Get villages by district code
     */
    public function villages(string $districtCode): JsonResponse
    {
        // $villages = $this->wilayahService->getVillages($districtCode);
        $villages = Village::query()
            ->select('village_id as code, name')
            ->orderBy('name')
            ->get();
        
        return response()->json([
            'success' => true,
            'data' => $villages
        ]);
    }
}
