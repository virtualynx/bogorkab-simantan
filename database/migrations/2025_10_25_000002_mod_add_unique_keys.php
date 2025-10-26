<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('survey_question', function (Blueprint $table) {
            $table->unique(['spm_level_id', 'order'], 'survey_question_spm_level_order_unique');
        });
        
        Schema::table('survey_custom_answer_option', function (Blueprint $table) {
            $table->unique(['survey_question_id', 'order'], 'survey_cao_unique');
        });
        
        Schema::table('answer', function (Blueprint $table) {
            $table->unique(['period_year', 'school_id', 'survey_question_id'], 'answer_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('survey_question', function (Blueprint $table) {
            $table->dropUnique('survey_question_spm_level_order_unique');
        });

        Schema::table('survey_custom_answer_option', function (Blueprint $table) {
            $table->dropUnique('survey_cao_unique');
        });

        Schema::table('answer', function (Blueprint $table) {
            $table->dropUnique('answer_unique');
        });
    }
};
