<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SimulatedAnswerDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currentYear = date('Y');
        
        // Get all schools
        $schools = DB::table('school')->get();
        
        // Get all questions for each SPM level
        $spmQuestions = [
            'SPM_TK' => DB::table('survey_question')->where('spm_level_id', 'SPM_TK')->get(),
            'SPM_KB' => DB::table('survey_question')->where('spm_level_id', 'SPM_KB')->get(),
            'SPM_SPS' => DB::table('survey_question')->where('spm_level_id', 'SPM_SPS')->get(),
            'SPM_SD' => DB::table('survey_question')->where('spm_level_id', 'SPM_SD')->get(),
            'SPM_SMP' => DB::table('survey_question')->where('spm_level_id', 'SPM_SMP')->get()
        ];

        $answerData = [];
        $completionRatesData = [];

        foreach ($schools as $school) {
            // Skip if this school already has answers for current year
            $existingSchoolAnswers = DB::table('answer')
                ->where('school_id', $school->school_id)
                ->where('period_year', $currentYear)
                ->exists();
                
            if ($existingSchoolAnswers) {
                continue; // Skip to next school
            }

            $completionRate = $this->getTargetCompletionRate($school->spm_level_id);
            $questions = $spmQuestions[$school->spm_level_id];
            
            $answeredCount = 0;
            $totalQuestions = $questions->count();
            
            foreach ($questions as $question) {
                // Determine if this question should be answered based on completion rate
                $shouldAnswer = (mt_rand(1, 100) <= $completionRate);
                
                if ($shouldAnswer) {
                    $answeredCount++;
                    
                    $answerData[] = [
                        'answer_id' => Str::uuid(),
                        'school_id' => $school->school_id,
                        'survey_question_id' => $question->survey_question_id,
                        'period_year' => $currentYear,
                        'answer' => $this->generateAnswer($question->answer_type),
                        'value' => $this->generateAnswerValue($question->answer_type),
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }
            }
            
            // Calculate actual completion rate for this school
            $actualCompletionRate = $totalQuestions > 0 ? round(($answeredCount / $totalQuestions) * 100) : 0;
            
            $completionRatesData[] = [
                'school_id' => $school->school_id,
                'period_year' => $currentYear,
                'completion_rate' => $actualCompletionRate,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Insert answers
        DB::table('answer')->insert($answerData);
        
        // Update completion rates
        DB::table('completion_rates')->insert($completionRatesData);
        
        $this->command->info('Successfully seeded simulated answer data for ' . count($schools) . ' schools!');
        $this->command->info('Generated ' . count($answerData) . ' answer records.');
    }

    /**
     * Get target completion rate based on school type
     */
    private function getTargetCompletionRate($spmLevelId): int
    {
        $rates = [
            'SPM_TK' => 76,  // 76% of questions answered
            'SPM_KB' => 71,   // 71% of questions answered  
            'SPM_SPS' => 74,  // 74% of questions answered
            'SPM_SD' => 81,   // 81% of questions answered
            'SPM_SMP' => 78   // 78% of questions answered
        ];
        
        // Add some variation (±5%)
        $variation = mt_rand(-5, 5);
        return max(65, min(95, $rates[$spmLevelId] + $variation));
    }

    /**
     * Generate realistic answer value based on answer type
     */
    private function generateAnswer($answerType): string
    {
        switch ($answerType) {
            case 'sudah_belum':
                // For "sudah_belum" type, return "Sudah" or "Belum" with realistic probability
                // Higher probability for "Sudah" (60-70%) to reflect positive progress
                return mt_rand(1, 100) <= 70 ? 'Sudah' : 'Belum';
                
            case 'numeric':
                return (string) mt_rand(1, 100);
                
            case 'percentage':
                return (string) mt_rand(50, 100);
                
            case 'boolean':
                return mt_rand(0, 1) ? '1' : '0';
                
            case 'scale_1_5':
                return (string) mt_rand(1, 5);
                
            case 'text_short':
                $options = ['Ya', 'Tidak', 'Kadang-kadang', 'Sering', 'Selalu'];
                return $options[array_rand($options)];
                
            case 'text_long':
                return 'Data sudah terisi sesuai dengan kondisi sekolah';
                
            case 'currency':
                return (string) mt_rand(1000000, 50000000);
                
            default:
                return 'Sudah'; // Default fallback for "sudah_belum"
        }
    }
    

    /**
     * Generate realistic answer value based on answer type
     */
    private function generateAnswerValue($answerType): string
    {
        switch ($answerType) {
            case 'sudah_belum':
                // For "sudah_belum" type, return "Sudah" or "Belum" with realistic probability
                // Higher probability for "Sudah" (60-70%) to reflect positive progress
                return mt_rand(1, 100) <= 70 ? 1 : 0;
                
            case 'numeric':
                return (string) mt_rand(1, 100);
                
            case 'percentage':
                return (string) mt_rand(50, 100);
                
            case 'boolean':
                return mt_rand(0, 1) ? '1' : '0';
                
            case 'scale_1_5':
                return (string) mt_rand(1, 5);
                
            case 'text_short':
                $options = ['Ya', 'Tidak', 'Kadang-kadang', 'Sering', 'Selalu'];
                return $options[array_rand($options)];
                
            case 'text_long':
                return 'Data sudah terisi sesuai dengan kondisi sekolah';
                
            case 'currency':
                return (string) mt_rand(1000000, 50000000);
                
            default:
                return 'Sudah'; // Default fallback for "sudah_belum"
        }
    }
}