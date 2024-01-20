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
        Schema::create('tb_jadwal', function (Blueprint $table) {
            $table->id('jadwal_id');
            $table->enum('jadwal_hari', ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'] );
            $table->string('jadwal_matakuliah');
            $table->time('jadwal_waktu_mulai');
            $table->time('jadwal_waktu_selesai');
            $table->string('jadwal_ruangkelas');
            $table->string('jadwal_semester');
            $table->string('jadwal_prodi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_jadwal');
    }
};
