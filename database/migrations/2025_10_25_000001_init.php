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
        // Schema::create('headmaster', function (Blueprint $table) {
        //     $table->id();

        //     $table->timestamps();
        //     $table->unsignedBigInteger('created_by')->nullable();
        //     $table->unsignedBigInteger('updated_by')->nullable();
        //     $table->boolean('is_disabled')->default('0');

        //     $table->string('name');
        //     $table->string('nip')->nullable();
        //     $table->timestamp('started_at');
        //     $table->timestamp('ended_at')->nullable();
        // });

        Schema::create('school', function (Blueprint $table) {
            $table->uuid('school_id')->primary();

            $table->timestamps();
            $table->string('created_by', 36)->nullable();
            $table->string('updated_by', 36)->nullable();
            $table->boolean('is_disabled')->default('0');

            $table->string('name');
            $table->string('NPSN')->nullable();
            $table->string('headmaster_name')->nullable();
            $table->string('headmaster_nip')->nullable();
            $table->string('accreditation')->nullable();
            $table->decimal('lat', 10, 8)->nullable();
            $table->decimal('lng', 11, 8)->nullable();
            $table->string('address', 9999)->nullable();
        });

        // Schema::create('question_category', function (Blueprint $table) {
        //     $table->string('question_category_id')->primary();

        //     $table->timestamps();
        //     $table->unsignedBigInteger('created_by')->nullable();
        //     $table->unsignedBigInteger('updated_by')->nullable();
        //     $table->boolean('is_disabled')->default('0');

        //     $table->string('name');
        //     $table->integer('order');
        // });

        Schema::create('spm_level', function (Blueprint $table) {
            $table->string('spm_level_id')->primary();

            $table->timestamps();
            $table->string('created_by', 36)->nullable();
            $table->string('updated_by', 36)->nullable();
            $table->boolean('is_disabled')->default('0');

            $table->string('name');
        });

        Schema::create('survey_question', function (Blueprint $table) {
            $table->id('survey_question_id');

            $table->timestamps();
            $table->string('created_by', 36)->nullable();
            $table->string('updated_by', 36)->nullable();
            $table->boolean('is_disabled')->default('0');

            $table->string('spm_level_id');
            $table->integer('order');
            $table->string('question', 9999);
            $table->enum('answer_type', ['yes_no', 'sudah_belum', 'text', 'custom'])->default('yes_no');

        });

        Schema::create('survey_custom_answer_option', function (Blueprint $table) {
            $table->id('survey_cao_id');

            $table->timestamps();
            $table->string('created_by', 36)->nullable();
            $table->string('updated_by', 36)->nullable();
            $table->boolean('is_disabled')->default('0');

            $table->unsignedBigInteger('survey_question_id');
            $table->integer('order');
            $table->string('option');
            $table->decimal('value')->default('0');
        });

        Schema::create('answer', function (Blueprint $table) {
            $table->uuid('answer_id')->primary();

            $table->timestamps();
            $table->string('created_by', 36)->nullable();
            $table->string('updated_by', 36)->nullable();
            $table->boolean('is_disabled')->default('0');

            $table->integer('period_year');
            $table->uuid('school_id');
            $table->unsignedBigInteger('survey_question_id');
            $table->string('answer');
            $table->decimal('value')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school');
        Schema::dropIfExists('spm_level');
        Schema::dropIfExists('survey_question');
        Schema::dropIfExists('survey_custom_answer_option');
        Schema::dropIfExists('answer');
    }
};
