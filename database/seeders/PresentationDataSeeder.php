<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PresentationDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID'); // Indonesian locale
        $schools = [];
        $currentYear = date('Y');

        // Completion rate targets by school type
        $completionRates = [
            'SPM_TK' => 76,
            'SPM_KB' => 71, 
            'SPM_SPS' => 74,
            'SPM_SD' => 81,
            'SPM_SMP' => 78
        ];

        // TK (28 schools) - Real TK names in Ciomas area
        $tkNames = [
            'TK Negeri Pembina Ciomas', 'TK Al-Hidayah Ciomas', 'TK Pertiwi Ciomas', 'TK Kartika XIX-10 Ciomas',
            'TK Islam Terpadu Bina Insani', 'TK Mutiara Hati Ciomas', 'TK Bina Bangsa Ciomas', 'TK Harapan Bangsa',
            'TK Ceria Ciomas', 'TK Pelita Hati Ciomas', 'TK Bunda Pertiwi Ciomas', 'TK Islam Al-Amanah',
            'TK Kemala Bhayangkari', 'TK Tunas Harapan Ciomas', 'TK Mawar Sharon Ciomas', 'TK Bina Anak Sholeh',
            'TK Kartini Ciomas', 'TK Al-Ikhlas Ciomas', 'TK Bina Putra Mandiri', 'TK Cahaya Bunda Ciomas',
            'TK Islam Nurul Falah', 'TK Bintang Kecil Ciomas', 'TK Permata Bunda', 'TK As-Salam Ciomas',
            'TK Bina Generasi Cerdas', 'TK Islam Al-Fath', 'TK Harapan Bunda Ciomas', 'TK Nurul Hikmah Ciomas'
        ];

        foreach ($tkNames as $index => $name) {
            $schoolId = Str::uuid();
            $schools[] = [
                'school_id' => $schoolId,
                'name' => $name,
                'NPSN' => '697' . str_pad($index + 1, 5, '0', STR_PAD_LEFT),
                'spm_level_id' => 'SPM_TK',
                'headmaster_name' => $this->generateIndonesianName($faker, 'female'),
                'headmaster_nip' => '196' . str_pad($index + 1, 12, '0', STR_PAD_LEFT),
                'accreditation' => ['A', 'B', 'B'][array_rand(['A', 'B', 'B'])],
                // 'lat' => -6.5900 + (mt_rand(-300, 300) / 10000),
                // 'lng' => 106.7600 + (mt_rand(-300, 300) / 10000),
                'lat' => -6.6033 + (mt_rand(-900, 900) / 100000),  // ~10km radius
'lng' => 106.7621 + (mt_rand(-900, 900) / 100000),
                'address' => $this->generateAddress($faker, 'Ciomas', $index + 1),
                'address_village_code' => '320117000' . ($index % 10 + 1),
                'student_count' => mt_rand(40, 120),
                'rombel_count' => mt_rand(3, 6),
                'class_count' => mt_rand(3, 6),
                'teacher_count' => mt_rand(5, 15),
                'teacher_s3_count' => 0,
                'teacher_s2_count' => mt_rand(1, 3),
                'teacher_s1_count' => mt_rand(3, 8),
                'teacher_dipl_count' => mt_rand(1, 3),
                'teacher_sma_count' => mt_rand(1, 2),
                'teacher_smp_count' => 0,
                'teacher_sd_count' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            // Add completion rate for this school
            // $this->addCompletionRate($schoolId, $currentYear, $completionRates['SPM_TK']);
        }

        // KB (19 schools) - Real KB names
        $kbNames = [
            'KB Al-Fath', 'KB Mutiara Hati', 'KB Bunda Pertiwi', 'KB Ceria Asyik', 'KB Pelangi Nusantara',
            'KB Bina Anak Sholeh', 'KB Tunas Bangsa', 'KB Harapan Bunda', 'KB Bintang Kecil', 'KB Cahaya Mentari',
            'KB Permata Hati', 'KB Anak Cerdas', 'KB Bina Generasi', 'KB Mawar Melati', 'KB As-Salam',
            'KB Nurul Iman', 'KB Bina Kreasi', 'KB Ceria Ceria', 'KB Anak Pintar'
        ];

        foreach ($kbNames as $index => $name) {
            $schoolId = Str::uuid();
            $schools[] = [
                'school_id' => $schoolId,
                'name' => $name,
                'NPSN' => '698' . str_pad($index + 1, 5, '0', STR_PAD_LEFT),
                'spm_level_id' => 'SPM_KB',
                'headmaster_name' => $this->generateIndonesianName($faker, 'female'),
                'headmaster_nip' => '197' . str_pad($index + 1, 12, '0', STR_PAD_LEFT),
                'accreditation' => ['B', 'B', 'C'][array_rand(['B', 'B', 'C'])],
                // 'lat' => -6.5850 + (mt_rand(-400, 400) / 10000),
                // 'lng' => 106.7550 + (mt_rand(-400, 400) / 10000),
                'lat' => -6.6000 + (mt_rand(-850, 850) / 100000),  // ~9.5km radius
'lng' => 106.7600 + (mt_rand(-850, 850) / 100000),
                'address' => $this->generateAddress($faker, 'Ciomas', $index + 1),
                'address_village_code' => '320117000' . ($index % 10 + 1),
                'student_count' => mt_rand(25, 60),
                'rombel_count' => mt_rand(2, 4),
                'class_count' => mt_rand(2, 4),
                'teacher_count' => mt_rand(3, 8),
                'teacher_s3_count' => 0,
                'teacher_s2_count' => mt_rand(0, 1),
                'teacher_s1_count' => mt_rand(2, 4),
                'teacher_dipl_count' => mt_rand(1, 2),
                'teacher_sma_count' => mt_rand(1, 2),
                'teacher_smp_count' => 0,
                'teacher_sd_count' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            // $this->addCompletionRate($schoolId, $currentYear, $completionRates['SPM_KB']);
        }

        // SPS (11 schools) - Real SPS names
        $spsNames = [
            'SPS Bina Anak Sholeh', 'SPS Tunas Harapan', 'SPS Mutiara Hati', 'SPS Pelangi Kasih', 
            'SPS Bunda Pertiwi', 'SPS Cahaya Bunda', 'SPS Anak Ceria', 'SPS Bina Generasi', 
            'SPS Harapan Bangsa', 'SPS Permata Hati', 'SPS Bintang Kecil'
        ];

        foreach ($spsNames as $index => $name) {
            $schoolId = Str::uuid();
            $schools[] = [
                'school_id' => $schoolId,
                'name' => $name,
                'NPSN' => '699' . str_pad($index + 1, 5, '0', STR_PAD_LEFT),
                'spm_level_id' => 'SPM_SPS',
                'headmaster_name' => $this->generateIndonesianName($faker, 'female'),
                'headmaster_nip' => '198' . str_pad($index + 1, 12, '0', STR_PAD_LEFT),
                'accreditation' => ['B', 'C'][array_rand(['B', 'C'])],
                // 'lat' => -6.5800 + (mt_rand(-500, 500) / 10000),
                // 'lng' => 106.7500 + (mt_rand(-500, 500) / 10000),
                'lat' => -6.6050 + (mt_rand(-800, 800) / 100000),  // ~9km radius
'lng' => 106.7640 + (mt_rand(-800, 800) / 100000),
                'address' => $this->generateAddress($faker, 'Ciomas', $index + 1),
                'address_village_code' => '320117000' . ($index % 10 + 1),
                'student_count' => mt_rand(20, 45),
                'rombel_count' => mt_rand(2, 3),
                'class_count' => mt_rand(2, 3),
                'teacher_count' => mt_rand(2, 5),
                'teacher_s3_count' => 0,
                'teacher_s2_count' => 0,
                'teacher_s1_count' => mt_rand(1, 2),
                'teacher_dipl_count' => mt_rand(1, 2),
                'teacher_sma_count' => mt_rand(1, 2),
                'teacher_smp_count' => mt_rand(0, 1),
                'teacher_sd_count' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            // $this->addCompletionRate($schoolId, $currentYear, $completionRates['SPM_SPS']);
        }

        // SD (32 schools) - Real SD names in Ciomas
        $sdNames = [
            'SD Negeri 1 Ciomas', 'SD Negeri 2 Ciomas', 'SD Negeri 3 Ciomas', 'SD Negeri 4 Ciomas',
            'SD Negeri 5 Ciomas', 'SD Negeri 1 Pagelaran', 'SD Negeri 2 Pagelaran', 'SD Negeri 3 Pagelaran',
            'SD Negeri 1 Sukaharja', 'SD Negeri 2 Sukaharja', 'SD Negeri 3 Sukaharja', 'SD Negeri 1 Laladon',
            'SD Negeri 2 Laladon', 'SD Negeri 1 Sukamaju', 'SD Negeri 2 Sukamaju', 'SD Negeri 1 Ciapus',
            'SD Negeri 2 Ciapus', 'SD Negeri 1 Gunung Geulis', 'SD Negeri 2 Gunung Geulis', 'SD IT Nurul Hikmah',
            'SD Islam Al-Amanah', 'SD Kristen Penabur Ciomas', 'SD Santa Maria Ciomas', 'SD Muhammadiyah Ciomas',
            'SD Plus Al-Kautsar', 'SD Bhakti Pertiwi', 'SD Bina Bangsa', 'SD Harapan Bangsa', 
            'SD Tunas Mulia', 'SD Mutiara Hati', 'SD Cahaya Bunda', 'SD Bunda Pertiwi'
        ];

        foreach ($sdNames as $index => $name) {
            $schoolId = Str::uuid();
            $schools[] = [
                'school_id' => $schoolId,
                'name' => $name,
                'NPSN' => '202' . str_pad($index + 1, 5, '0', STR_PAD_LEFT),
                'spm_level_id' => 'SPM_SD',
                'headmaster_name' => $this->generateIndonesianName($faker, 'male'),
                'headmaster_nip' => '196' . str_pad($index + 1, 12, '0', STR_PAD_LEFT),
                'accreditation' => ['A', 'A', 'B'][array_rand(['A', 'A', 'B'])],
                // 'lat' => -6.5950 + (mt_rand(-600, 600) / 10000),
                // 'lng' => 106.7450 + (mt_rand(-600, 600) / 10000),
                'lat' => -6.6020 + (mt_rand(-950, 950) / 100000),  // ~10.5km radius
'lng' => 106.7580 + (mt_rand(-950, 950) / 100000),
                'address' => $this->generateAddress($faker, 'Ciomas', $index + 1),
                'address_village_code' => '320117000' . ($index % 10 + 1),
                'student_count' => mt_rand(150, 400),
                'rombel_count' => mt_rand(6, 12),
                'class_count' => mt_rand(6, 12),
                'teacher_count' => mt_rand(12, 25),
                'teacher_s3_count' => 0,
                'teacher_s2_count' => mt_rand(2, 5),
                'teacher_s1_count' => mt_rand(8, 15),
                'teacher_dipl_count' => mt_rand(1, 3),
                'teacher_sma_count' => mt_rand(1, 2),
                'teacher_smp_count' => 0,
                'teacher_sd_count' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            // $this->addCompletionRate($schoolId, $currentYear, $completionRates['SPM_SD']);
        }

        // SMP (10 schools) - Real SMP names in Ciomas
        $smpNames = [
            'SMP Negeri 1 Ciomas', 'SMP Negeri 2 Ciomas', 'SMP Negeri 3 Ciomas', 'SMP IT Al-Amanah',
            'SMP Kristen Penabur Ciomas', 'SMP Muhammadiyah Ciomas', 'SMP Bina Bangsa', 'SMP Harapan Bangsa',
            'SMP Tunas Mulia', 'SMP Plus Al-Kautsar'
        ];

        foreach ($smpNames as $index => $name) {
            $schoolId = Str::uuid();
            $schools[] = [
                'school_id' => $schoolId,
                'name' => $name,
                'NPSN' => '201' . str_pad($index + 1, 5, '0', STR_PAD_LEFT),
                'spm_level_id' => 'SPM_SMP',
                'headmaster_name' => $this->generateIndonesianName($faker, 'male'),
                'headmaster_nip' => '197' . str_pad($index + 1, 12, '0', STR_PAD_LEFT),
                'accreditation' => ['A', 'A', 'B'][array_rand(['A', 'A', 'B'])],
                // 'lat' => -6.5750 + (mt_rand(-700, 700) / 10000),
                // 'lng' => 106.7350 + (mt_rand(-700, 700) / 10000),
                'lat' => -6.5980 + (mt_rand(-920, 920) / 100000),  // ~10.2km radius
'lng' => 106.7660 + (mt_rand(-920, 920) / 100000),
                'address' => $this->generateAddress($faker, 'Ciomas', $index + 1),
                'address_village_code' => '320117000' . ($index % 10 + 1),
                'student_count' => mt_rand(300, 600),
                'rombel_count' => mt_rand(9, 18),
                'class_count' => mt_rand(9, 18),
                'teacher_count' => mt_rand(20, 35),
                'teacher_s3_count' => mt_rand(1, 3),
                'teacher_s2_count' => mt_rand(5, 10),
                'teacher_s1_count' => mt_rand(12, 20),
                'teacher_dipl_count' => mt_rand(1, 2),
                'teacher_sma_count' => 0,
                'teacher_smp_count' => 0,
                'teacher_sd_count' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            // $this->addCompletionRate($schoolId, $currentYear, $completionRates['SPM_SMP']);
        }

        // Insert all schools
        DB::table('school')->insert($schools);

        // Insert completion rates after schools are created
        $completionRatesData = [];

        // Get all inserted schools from database
        $insertedSchools = DB::table('school')->get();

        foreach ($insertedSchools as $school) {
            $baseRate = $completionRates[$school->spm_level_id];
            $variation = mt_rand(-5, 5);
            $rate = max(65, min(95, $baseRate + $variation));
            
            $completionRatesData[] = [
                'school_id' => $school->school_id,
                'period_year' => $currentYear,
                'completion_rate' => $rate,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('completion_rates')->insert($completionRatesData);
        
        $this->command->info('Successfully seeded 100 schools with completion rates!');
    }

    /**
     * Generate realistic Indonesian name
     */
    private function generateIndonesianName($faker, $gender = 'male'): string
    {
        $firstNames = [
            'male' => ['Ahmad', 'Budi', 'Dwi', 'Eko', 'Hendra', 'Joko', 'Mulyadi', 'Rudi', 'Slamet', 'Tri', 'Yoga'],
            'female' => ['Ani', 'Dewi', 'Endang', 'Fitri', 'Indah', 'Kartika', 'Lestari', 'Maya', 'Nur', 'Sari', 'Wati']
        ];
        
        $lastNames = ['Santoso', 'Wijaya', 'Pratama', 'Setiawan', 'Kusuma', 'Hidayat', 'Saputra', 'Gunawan', 'Rahman', 'Nugroho'];
        
        $firstName = $faker->randomElement($firstNames[$gender]);
        $lastName = $faker->randomElement($lastNames);
        
        return $firstName . ' ' . $lastName;
    }

    /**
     * Generate realistic address in Ciomas
     */
    private function generateAddress($faker, $area, $number): string
    {
        $streets = ['Jl. Pendidikan', 'Jl. Merdeka', 'Jl. Raya Ciomas', 'Jl. Sukabudi', 'Jl. Pemuda', 
                   'Jl. Anggrek', 'Jl. Melati', 'Jl. Kenanga', 'Jl. Flamboyan', 'Jl. Cendana'];
        
        $villages = ['Ciomas', 'Pagelaran', 'Sukaharja', 'Laladon', 'Sukamaju', 'Ciapus', 'Gunung Geulis'];
        
        $street = $faker->randomElement($streets);
        $village = $faker->randomElement($villages);
        
        return $street . ' No.' . $number . ', ' . $village . ', Kec. Ciomas, Kab. Bogor, Jawa Barat';
    }

    /**
     * Add completion rate for a school
     */
    private function addCompletionRate($schoolId, $year, $baseRate): void
    {
        $variation = mt_rand(-5, 5); // ±5% variation
        $completionRate = max(65, min(95, $baseRate + $variation)); // Keep between 65-95%
        
        DB::table('completion_rates')->insert([
            'school_id' => $schoolId,
            'period_year' => $year,
            'completion_rate' => $completionRate,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}