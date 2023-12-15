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
        Schema::create('tb_peminjaman', function (Blueprint $table) {
            $table->id('peminjaman_id');
            $table->string('peminjaman_pjmk');
            $table->string('peminjaman_ruangkelas');
            $table->string('peminjaman_matakuliah');
            $table->string('peminjaman_admin')->nullable();
            $table->integer('peminjaman_fasilitas')->nullable();
            $table->date('peminjaman_tanggal');
            $table->time('peminjaman_waktu_mulai');
            $table->time('peminjaman_waktu_selesai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_peminjaman');
    }
};
