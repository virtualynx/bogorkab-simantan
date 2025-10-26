<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpmLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'spm_level_id' => 'SPM_TK',
                'name' => 'Persyaratan SPM TK',
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
            ],
            [
                'spm_level_id' => 'SPM_KB',
                'name' => 'Persyaratan SPM KB',
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
            ],
            [
                'spm_level_id' => 'SPM_SPS',
                'name' => 'Persyaratan SPM SPS',
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
            ],
            [
                'spm_level_id' => 'SPM_SD',
                'name' => 'Persyaratan SPM SD',
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
            ],
            [
                'spm_level_id' => 'SPM_SMP',
                'name' => 'Persyaratan SPM SMP',
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
            ],
        ];
        
        DB::table('spm_level')->insert($data);
    }
}
