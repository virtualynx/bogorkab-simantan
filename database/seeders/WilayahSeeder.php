<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WilayahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jabar = DB::table('master_provinces')->insert([
            'province_id' => '32',
            'name' => 'Jawa Barat'
        ]);
        $bogor = DB::table('master_regencies')->insertGetId([
            'regency_id' => '32.01',
            'province_id' => '32',
            'name' => 'Kabupaten Bogor'
        ]);
        $ciomas = DB::table('master_districts')->insertGetId([
            'district_id' => '32.01.29',
            'regency_id' => '32.01',
            'name' => 'Ciomas'
        ]);
        DB::table('master_villages')->insert([
            [
                'village_id' => '32.01.29.2008',
                'district_id' => '32.01.29',
                'name' => 'Ciapus'
            ],
            [
                'village_id' => '32.01.29.2005',
                'district_id' => '32.01.29',
                'name' => 'Ciomas'
            ],
            [
                'village_id' => '32.01.29.2011',
                'district_id' => '32.01.29',
                'name' => 'Ciomas Rahayu'
            ],
            [
                'village_id' => '32.01.29.2009',
                'district_id' => '32.01.29',
                'name' => 'Kotabatu'
            ],
            [
                'village_id' => '32.01.29.2010',
                'district_id' => '32.01.29',
                'name' => 'Laladon'
            ],
            [
                'village_id' => '32.01.29.2001',
                'district_id' => '32.01.29',
                'name' => 'Mekarjaya'
            ],
            [
                'village_id' => '32.01.29.1003',
                'district_id' => '32.01.29',
                'name' => 'Padasuka'
            ],
            [
                'village_id' => '32.01.29.2006',
                'district_id' => '32.01.29',
                'name' => 'Pagelaran'
            ],
            [
                'village_id' => '32.01.29.2004',
                'district_id' => '32.01.29',
                'name' => 'Parakan'
            ],
            [
                'village_id' => '32.01.29.2002',
                'district_id' => '32.01.29',
                'name' => 'Sukaharja'
            ],
            [
                'village_id' => '32.01.29.2007',
                'district_id' => '32.01.29',
                'name' => 'Sukamakmur'
            ],
        ]);
    }
}
