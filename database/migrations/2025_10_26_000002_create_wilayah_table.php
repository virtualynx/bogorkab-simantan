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
        Schema::create('master_provinces', function (Blueprint $table) {
            $table->string('province_id', 25)->primary();
            $table->string('name');
        });

        Schema::create('master_regencies', function (Blueprint $table) {
            $table->string('regency_id', 25)->primary();
            $table->string('province_id', 25);
            $table->string('name');
            
            $table
                ->foreign('province_id')
                ->references('province_id')
                ->on('master_provinces')
                ->onDelete('restrict');
        });

        Schema::create('master_districts', function (Blueprint $table) {
            $table->string('district_id', 25)->primary();
            $table->string('regency_id', 25);
            $table->string('name');
            
            $table
                ->foreign('regency_id')
                ->references('regency_id')
                ->on('master_regencies')
                ->onDelete('restrict');
        });

        Schema::create('master_villages', function (Blueprint $table) {
            $table->string('village_id', 25)->primary();
            $table->string('district_id', 25);
            $table->string('name');
            
            $table
                ->foreign('district_id')
                ->references('district_id')
                ->on('master_districts')
                ->onDelete('restrict');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_provinces');
        Schema::dropIfExists('master_regencies');
        Schema::dropIfExists('master_districts');
        Schema::dropIfExists('master_villages');
    }
};
