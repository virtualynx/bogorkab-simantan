<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('completion_rates', function (Blueprint $table) {
            $table->id();
            $table->uuid('school_id');
            $table->integer('period_year');
            $table->decimal('completion_rate', 5, 2);
            $table->timestamps();
            
            $table->foreign('school_id')->references('school_id')->on('school')->onDelete('cascade');
            $table->unique(['school_id', 'period_year']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('completion_rates');
    }
};