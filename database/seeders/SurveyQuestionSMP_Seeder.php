<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SurveyQuestionSMP_Seeder extends Seeder
{
    public function run(): void
    {
        $data = [
            // A. Ketersediaan Prasarana Minimum (Pasal 25 huruf c)
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_SMP',
                'order' => 1,
                'question' => 'Apakah sekolah memiliki ruang kelas yang memadai untuk seluruh rombongan belajar dengan rasio luas minimal 2 m² per peserta didik?',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_SMP',
                'order' => 2,
                'question' => 'Apakah sekolah memiliki ruang perpustakaan dengan luas minimal sama dengan satu ruang kelas yang dilengkapi koleksi buku memadai?',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_SMP',
                'order' => 3,
                'question' => 'Apakah sekolah memiliki ruang laboratorium dengan luas minimal 1,5 kali luas ruang kelas untuk pembelajaran praktik?',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_SMP',
                'order' => 4,
                'question' => 'Apakah sekolah memiliki ruang administrasi untuk kegiatan tata usaha dan pengelolaan satuan pendidikan?',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_SMP',
                'order' => 5,
                'question' => 'Apakah sekolah memiliki ruang kesehatan (UKS) untuk pelayanan kesehatan peserta didik dan warga sekolah?',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_SMP',
                'order' => 6,
                'question' => 'Apakah sekolah memiliki tempat beribadah yang layak sesuai dengan agama dan kepercayaan warga sekolah?',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_SMP',
                'order' => 7,
                'question' => 'Apakah sekolah memiliki tempat bermain atau lapangan olahraga untuk kegiatan fisik dan pengembangan kebugaran?',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_SMP',
                'order' => 8,
                'question' => 'Apakah sekolah memiliki kantin yang menyediakan makanan dan minuman sehat serta higienis?',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_SMP',
                'order' => 9,
                'question' => 'Apakah sekolah memiliki toilet yang memadai, bersih, dan berfungsi dengan baik?',
                'answer_type' => 'sudah_belum',
            ],

            // B. Standar Luas dan Kelengkapan Ruang (Pasal 12, 13, 14)
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_SMP',
                'order' => 10,
                'question' => 'Apakah setiap ruang kelas memiliki pencahayaan dan penghawaan alami yang memadai untuk kegiatan pembelajaran?',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_SMP',
                'order' => 11,
                'question' => 'Apakah ruang perpustakaan dilengkapi dengan sarana yang memadai seperti rak buku, meja baca, dan koleksi buku yang relevan?',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_SMP',
                'order' => 12,
                'question' => 'Apakah ruang laboratorium dilengkapi dengan peralatan praktik yang sesuai dengan kurikulum dan kebutuhan pembelajaran?',
                'answer_type' => 'sudah_belum',
            ],

            // C. Aksesibilitas untuk Penyandang Disabilitas (Pasal 6, 9, 10)
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_SMP',
                'order' => 13,
                'question' => 'Apakah sekolah memiliki fasilitas aksesibilitas seperti ramp atau jalur khusus untuk penyandang disabilitas?',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_SMP',
                'order' => 14,
                'question' => 'Apakah tersedia toilet khusus yang dapat diakses dengan mudah oleh penyandang disabilitas?',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_SMP',
                'order' => 15,
                'question' => 'Apakah sarana pembelajaran sudah mengakomodasi kebutuhan peserta didik penyandang disabilitas?',
                'answer_type' => 'sudah_belum',
            ],

            // D. Sarana Pembelajaran (Pasal 5, 6)
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_SMP',
                'order' => 16,
                'question' => 'Apakah sarana pembelajaran (bahan ajar, alat peraga, media pembelajaran) sudah memadai untuk mendukung proses belajar mengajar?',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_SMP',
                'order' => 17,
                'question' => 'Apakah peralatan laboratorium (IPA, IPS, Bahasa) tersedia dan dalam kondisi baik untuk praktik peserta didik?',
                'answer_type' => 'sudah_belum',
            ],

            // E. Kondisi Bangunan dan Keselamatan (Pasal 8, 9)
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_SMP',
                'order' => 18,
                'question' => 'Apakah bangunan sekolah memenuhi standar keselamatan dengan konstruksi yang kuat dan tahan bencana?',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_SMP',
                'order' => 19,
                'question' => 'Apakah sekolah memiliki jalur evakuasi dan penunjuk arah yang jelas untuk keadaan darurat?',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_SMP',
                'order' => 20,
                'question' => 'Apakah instalasi listrik dan sumber energi lainnya memenuhi standar keamanan dan keselamatan?',
                'answer_type' => 'sudah_belum',
            ],

            // F. Sanitasi dan Kesehatan (Pasal 9, 20)
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_SMP',
                'order' => 21,
                'question' => 'Apakah toilet dalam kondisi bersih, terpelihara, dan berfungsi dengan baik?',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_SMP',
                'order' => 22,
                'question' => 'Apakah tersedia fasilitas cuci tangan dengan air mengalir dan sabun di tempat yang strategis?',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_SMP',
                'order' => 23,
                'question' => 'Apakah kantin memenuhi standar kesehatan dengan lokasi yang aman dari potensi pencemaran?',
                'answer_type' => 'sudah_belum',
            ],

            // G. Lahan dan Lingkungan (Pasal 8)
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_SMP',
                'order' => 24,
                'question' => 'Apakah sekolah memiliki ruang terbuka hijau yang mendukung proses pembelajaran dan fungsi ekologis?',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_SMP',
                'order' => 25,
                'question' => 'Apakah lokasi sekolah berada di lingkungan yang nyaman dan terhindar dari potensi bahaya?',
                'answer_type' => 'sudah_belum',
            ],

            // H. Kebutuhan Khusus SMP
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_SMP',
                'order' => 26,
                'question' => 'Apakah ruang laboratorium dapat menampung peralatan praktik untuk mata pelajaran IPA, IPS, dan Bahasa?',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_SMP',
                'order' => 27,
                'question' => 'Apakah tempat bermain/olahraga dilengkapi dengan peralatan yang sesuai dengan kurikulum pendidikan jasmani?',
                'answer_type' => 'sudah_belum',
            ],
            [
                'created_at' => now(),
                'created_by' => 'system',
                'is_disabled' => false,
                'spm_level_id' => 'SPM_SMP',
                'order' => 28,
                'question' => 'Apakah ruang administrasi dilengkapi dengan peralatan dan perlengkapan pendukung pengelolaan satuan pendidikan?',
                'answer_type' => 'sudah_belum',
            ]
        ];
        
        DB::table('survey_question')->insert($data);
    }
}