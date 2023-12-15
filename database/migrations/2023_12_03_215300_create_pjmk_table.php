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
        Schema::create('tb_pjmk', function (Blueprint $table) {
            $table->string('pjmk_nim')->primary();
            $table->string('pjmk_nama');
            $table->string('pjmk_kelas');
            $table->string('pjmk_prodi');
            $table->string('pjmk_phone');
            $table->string('pjmk_email');
            $table->string('pjmk_img')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_pjmk');
    }
};
