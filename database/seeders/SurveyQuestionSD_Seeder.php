<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SurveyQuestionSD_Seeder extends Seeder
{
    public function run(): void
    {
        $data = [
            // A. Ketersediaan Prasarana Minimum
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_SD',
                'order' => 1,
                'question' => 'Apakah sekolah memiliki ruang kelas yang memadai untuk seluruh rombongan belajar?',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_SD',
                'order' => 2,
                'question' => 'Apakah sekolah memiliki ruang perpustakaan yang dilengkapi dengan koleksi buku yang memadai?',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_SD',
                'order' => 3,
                'question' => 'Apakah sekolah memiliki ruang administrasi untuk kegiatan tata usaha?',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_SD',
                'order' => 4,
                'question' => 'Apakah sekolah memiliki ruang kesehatan (UKS) untuk pelayanan kesehatan peserta didik?',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_SD',
                'order' => 5,
                'question' => 'Apakah sekolah memiliki tempat beribadah yang layak sesuai dengan agama yang dianut peserta didik?',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_SD',
                'order' => 6,
                'question' => 'Apakah sekolah memiliki tempat bermain atau lapangan olahraga untuk kegiatan fisik peserta didik?',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_SD',
                'order' => 7,
                'question' => 'Apakah sekolah memiliki kantin yang menyediakan makanan dan minuman yang sehat dan higienis?',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_SD',
                'order' => 8,
                'question' => 'Apakah sekolah memiliki toilet yang memadai dan dalam kondisi bersih?',
                'answer_type' => 'sudah_belum',
            ],

            // B. Standar Luas Ruang Kelas
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_SD',
                'order' => 9,
                'question' => 'Apakah luas ruang kelas memenuhi standar minimal 2 meter persegi per peserta didik?',
                'answer_type' => 'sudah_belum',
            ],

            // C. Aksesibilitas untuk Penyandang Disabilitas
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_SD',
                'order' => 10,
                'question' => 'Apakah sekolah memiliki fasilitas aksesibilitas (seperti ramp) untuk penyandang disabilitas?',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_SD',
                'order' => 11,
                'question' => 'Apakah sekolah menyediakan toilet khusus yang dapat diakses oleh penyandang disabilitas?',
                'answer_type' => 'sudah_belum',
            ],

            // D. Sarana Pembelajaran
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_SD',
                'order' => 12,
                'question' => 'Apakah sarana pembelajaran (bahan ajar, alat peraga, dan media pembelajaran) sudah memadai?',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_SD',
                'order' => 13,
                'question' => 'Apakah perpustakaan dilengkapi dengan sarana yang memadai (rak buku, meja baca, koleksi buku)?',
                'answer_type' => 'sudah_belum',
            ],

            // E. Kondisi Bangunan dan Keselamatan
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_SD',
                'order' => 14,
                'question' => 'Apakah bangunan sekolah memenuhi standar keselamatan (konstruksi kuat dan memiliki jalur evakuasi)?',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_SD',
                'order' => 15,
                'question' => 'Apakah ruangan kelas memiliki pencahayaan dan penghawaan alami yang memadai?',
                'answer_type' => 'sudah_belum',
            ],

            // F. Sanitasi dan Kesehatan
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_SD',
                'order' => 16,
                'question' => 'Apakah toilet dalam kondisi bersih, berfungsi dengan baik, dan terpelihara?',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_SD',
                'order' => 17,
                'question' => 'Apakah tersedia fasilitas cuci tangan dengan air mengalir dan sabun di tempat yang strategis?',
                'answer_type' => 'sudah_belum',
            ],

            // G. Ruang Terbuka Hijau
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_SD',
                'order' => 18,
                'question' => 'Apakah sekolah memiliki ruang terbuka hijau yang dapat digunakan untuk kegiatan pembelajaran luar kelas?',
                'answer_type' => 'sudah_belum',
            ],
        ];
        
        DB::table('survey_question')->insert($data);
    }
}