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
        Schema::table('school', function (Blueprint $table) {
            $table->integer('teacher_count')->nullable();
            $table->integer('teacher_s3_count')->nullable();
            $table->integer('teacher_s2_count')->nullable();
            $table->integer('teacher_s1_count')->nullable();
            $table->integer('teacher_dipl_count')->nullable();
            $table->integer('teacher_sma_count')->nullable();
            $table->integer('teacher_smp_count')->nullable();
            $table->integer('teacher_sd_count')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    }
};
