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
            $table->integer('rombel_count')->nullable();
            $table->integer('class_count')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('school', function (Blueprint $table) {
            $table->dropColumn('rombel_count');
            $table->dropColumn('class_count');

        });
    }
};
