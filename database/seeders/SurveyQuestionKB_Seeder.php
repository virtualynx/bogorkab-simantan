<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SurveyQuestionKB_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_KB',
                'order' => 1,
                'question' => 'Berasal Dari Guru',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_KB',
                'order' => 2,
                'question' => 'Memiliki Kualifikasi Akademik (D-VI atau Sarjana Paud/BK/Psikologi)',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_KB',
                'order' => 3,
                'question' => 'Memiliki Sertifikasi Pendidik',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_KB',
                'order' => 4,
                'question' => 'Memiliki Pengalaman Manajerial Paling Sedikit 2 Tahun',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_KB',
                'order' => 5,
                'question' => 'Memiliki STTPL Calon Kepala Sekolah atau Sertifikat Guru Penggerak',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_KB',
                'order' => 6,
                'question' => 'Memiliki Usia Peserta Didik yang Diterima 5 - 6 Tahun',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_KB',
                'order' => 7,
                'question' => 'memiliki jumlah ruang dan luas lahan sesuai dengan jumlah anak minimal 3 m² per anak/literasi',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_KB',
                'order' => 8,
                'question' => 'Memiliki ruang dan fasilitas aktivitas anak di dalam dan di luar',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_KB',
                'order' => 9,
                'question' => 'fasilitas cuci tangan dan kamar mandi/jamban',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_KB',
                'order' => 10,
                'question' => 'tempat sampah yang tertutup dan tidak tercemar',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_KB',
                'order' => 11,
                'question' => 'Memiliki Ruang tempat ibadah',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_KB',
                'order' => 12,
                'question' => 'Memiliki Ruang laktasi (Ruang penampungan ASI untuk putra/putrinya di rumah)',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_KB',
                'order' => 13,
                'question' => 'Memiliki ruang admininstasi',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_KB',
                'order' => 14,
                'question' => 'Memiliki ruang literasi',
                'answer_type' => 'sudah_belum',
            ],
        ];
        
        DB::table('survey_question')->insert($data);
    }
}
