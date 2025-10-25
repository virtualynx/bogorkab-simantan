<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SurveyQuestionTK_Seeder extends Seeder
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
                'spm_level_id' => 'SPM_TK',
                'order' => 1,
                'question' => 'Berasal Dari Guru',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_TK',
                'order' => 2,
                'question' => 'Memiliki Kualifikasi Akademik (D-VI atau Sarjana Paud/BK/Psikologi)',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_TK',
                'order' => 3,
                'question' => 'Memiliki Sertifikasi Pendidik',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_TK',
                'order' => 4,
                'question' => 'Memiliki Pengalaman Manajerial Paling Sedikit 2 Tahun',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_TK',
                'order' => 5,
                'question' => 'Memiliki STTPL Calon Kepala Sekolah atau Sertifikat Guru Penggerak',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_TK',
                'order' => 6,
                'question' => 'Memiliki Usia Peserta Didik yang Diterima 5 - 6 Tahun',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_TK',
                'order' => 7,
                'question' => 'Luas Lahan 300m²',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_TK',
                'order' => 8,
                'question' => 'Memiliki Ruang Kegiatan yang Aman dan Sehat dengan rasio 3 m² per anak',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_TK',
                'order' => 9,
                'question' => 'Tersedia Fasilitas Cuci Tangan Dengan Air Bersih',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_TK',
                'order' => 10,
                'question' => 'Memiliki Ruang Guru/ Ruang Administrasi',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_TK',
                'order' => 11,
                'question' => 'Memiliki Ruang Kepala Sekolah',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_TK',
                'order' => 12,
                'question' => 'Memiliki Ruang UKS dengan Kelengkapan P3K',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_TK',
                'order' => 13,
                'question' => 'Memiliki Jamban dengan Air Bersih',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_TK',
                'order' => 14,
                'question' => 'Memiliki Ruang Lainnya yang Relevan dengan kebutuhan kegiatan anak',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_TK',
                'order' => 15,
                'question' => 'memiliki alat permainan edukatif yang aman dan sehat sesuai SNI',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_TK',
                'order' => 16,
                'question' => 'memiliki fasilitas bermain di dalam maupun diluar ruangan',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_TK',
                'order' => 17,
                'question' => 'memiliki tempat sampah yang tertutup dan tidak tercemar',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_TK',
                'order' => 18,
                'question' => 'memiliki ruang tempat beribadah',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_TK',
                'order' => 19,
                'question' => 'memiliki ruang literasi',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_TK',
                'order' => 20,
                'question' => 'memiliki ruang laktasi (ruang penampung ASI untuk putra/putrinya di rumah)',
                'answer_type' => 'sudah_belum',
            ],
        ];
        
        DB::table('survey_question')->insert($data);
    }
}
