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
        Schema::create('tb_ruangkelas', function (Blueprint $table) {
            $table->string('ruangkelas_code')->primary();
            $table->string('ruangkelas_kapasitas');
            $table->string('ruangkelas_prodi');
            $table->string('ruangkelas_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_ruangkelas');
    }
};
