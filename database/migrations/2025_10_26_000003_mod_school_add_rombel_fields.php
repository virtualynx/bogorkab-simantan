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
            $table->string('spm_level_id')->after('NPSN');

            $table->integer('student_count')->nullable();
            $table->integer('rombel_a_count')->nullable();
            $table->integer('rombel_b_count')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('school', function (Blueprint $table) {
            $table->dropColumn('spm_level_id');

            $table->dropColumn('student_count');
            $table->dropColumn('rombel_a_count');
            $table->dropColumn('rombel_b_count');

        });
    }
};
