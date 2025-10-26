<?php

namespace App\Services;

use App\Models\Master\District;
use App\Models\Master\Province;
use App\Models\Master\Regency;
use App\Models\Master\Village;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WilayahService
{
    /**
     * Base URL for Wilayah.id API
     */
    protected string $baseUrl = 'https://wilayah.id/api';

    public function getDefaultProvince(){
        $result = Province::query()
            ->select('province_id as code', 'name')
            ->where('name', 'Jawa Barat')
            ->first();

        return $result;
    }

    public function listDefaultRegency(){
        $defaultProvince = $this->getDefaultProvince();

        $results = Regency::query()
            ->select('regency_id as code', 'name')
            ->where('province_id', $defaultProvince->code)
            ->get();

        return $results;
    }

    public function getDefaultRegency(){
        $defaultRegencies = $this->listDefaultRegency();
        $defaultRegency = collect($defaultRegencies)->firstWhere('name', 'Kabupaten Bogor');

        return $defaultRegency;
    }

    public function listDefaultDistrict(){
        $defaultRegency = $this->getDefaultRegency();

        $results = District::query()
            ->select('district_id as code', 'name')
            ->where('regency_id', $defaultRegency->code)
            ->get();

        return $results;
    }

    public function getDefaultDistrict(){
        $defaultDistricts = $this->listDefaultDistrict();
        $defaultDistrict = collect($defaultDistricts)->firstWhere('name', 'Ciomas');

        return $defaultDistrict;
    }

    public function listDefaultVillage(){
        $defaultDistrict = $this->getDefaultDistrict();

        $results = Village::query()
            ->select('village_id as code', 'name')
            ->where('district_id', $defaultDistrict->code)
            ->get();

        return $results;
    }

    /**
     * Get all provinces in Indonesia
     */
    public function getProvinces(): array
    {
        $results = Cache::remember('apicall_provinces', 5, function () {
            return $this->makeRequest('/provinces.json');
        });

        return $results;
    }

    /**
     * Get regencies/cities by province code
     */
    public function getRegencies(string $provinceCode): array
    {
        $results = Cache::remember("apicall_regencies_$provinceCode", 5, function () use($provinceCode) {
            return $this->makeRequest("/regencies/{$provinceCode}.json");
        });

        return $results;
    }

    /**
     * Get districts by regency code
     */
    public function getDistricts(string $regencyCode): array
    {
        $results = Cache::remember("apicall_districts_$regencyCode", 5, function () use($regencyCode) {
            return $this->makeRequest("/districts/{$regencyCode}.json");
        });

        return $results;
    }

    /**
     * Get villages by district code
     */
    public function getVillages(string $districtCode): array
    {
        $results = Cache::remember("apicall_villages_$districtCode", 5, function () use($districtCode) {
            return $this->makeRequest("/villages/{$districtCode}.json");
        });

        return $results;
    }

    /**
     * Make HTTP request to Wilayah.id API
     */
    protected function makeRequest(string $endpoint): array
    {
        try {
            $response = Http::timeout(30)
                ->retry(3, 100)
                ->get($this->baseUrl . $endpoint);

            if ($response->successful()) {
                return $response->json('data', []);
            }

            Log::error('Wilayah API request failed', [
                'endpoint' => $endpoint,
                'status' => $response->status(),
                'response' => $response->body()
            ]);

            return [];

        } catch (\Exception $e) {
            Log::error('Wilayah API exception', [
                'endpoint' => $endpoint,
                'message' => $e->getMessage()
            ]);

            return [];
        }
    }
}