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
        Schema::create('tb_pengembalian', function (Blueprint $table) {
            $table->id('pengembalian_id');
            $table->string('pengembalian_pinjam');
            $table->string('pengembalian_foto_sebelum');
            $table->string('pengembalian_foto_sesudah');
            $table->time('pengembalian_waktu');
            $table->string('pengembalian_admin')->nullable();
            $table->enum('pengembalian_status', ['Waiting', 'Ditolak', 'Disetujui'])->default('Waiting');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_pengembalian');
    }
};
