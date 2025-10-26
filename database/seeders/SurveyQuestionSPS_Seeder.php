<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SurveyQuestionSPS_Seeder extends Seeder
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
                'spm_level_id' => 'SPM_SPS',
                'order' => 1,
                'question' => 'Berasal Dari Guru',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_SPS',
                'order' => 2,
                'question' => 'Memiliki Kualifikasi Akademik (D-VI atau Sarjana Paud/BK/Psikologi)',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_SPS',
                'order' => 3,
                'question' => 'Memiliki Sertifikasi Pendidik',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_SPS',
                'order' => 4,
                'question' => 'Memiliki Pengalaman Manajerial Paling Sedikit 2 Tahun',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_SPS',
                'order' => 5,
                'question' => 'Memiliki STTPL Calon Kepala Sekolah atau Sertifikat Guru Penggerak',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_SPS',
                'order' => 6,
                'question' => 'Memiliki Usia Peserta Didik yang Diterima 5 - 6 Tahun',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_SPS',
                'order' => 7,
                'question' => 'memiliki jumlah ruang dan luas lahan minimal 3 m² per anak',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_SPS',
                'order' => 8,
                'question' => 'Memiliki Ruang untuk aktivitas anak didik di dalam dan di luar',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_SPS',
                'order' => 9,
                'question' => 'memiliki Fasilitas Cuci Tangan Dengan Air Bersih',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_SPS',
                'order' => 10,
                'question' => 'Memiliki Kamar mandi/jamban yang mudah dijangkau oleh anak dengan air bersih yang aman dan sehat',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_SPS',
                'order' => 11,
                'question' => 'Memiliki Fasilitas permainan di dalam dan di luar ruangan yang aman dan sehat',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_SPS',
                'order' => 12,
                'question' => 'memiliki tempat sambah yang tertutup dan tidak tercemar',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_SPS',
                'order' => 13,
                'question' => 'Memiliki ruang tempat beribadah',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_SPS',
                'order' => 14,
                'question' => 'Memiliki ruang laktasi (Ruang penampungan ASI untuk putra/putrinya di rumah)',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_SPS',
                'order' => 15,
                'question' => 'memiliki ruang administrasi',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_SPS',
                'order' => 16,
                'question' => 'memiliki ruang literasi',
                'answer_type' => 'sudah_belum',
            ],
        ];
        
        DB::table('survey_question')->insert($data);
    }
}
