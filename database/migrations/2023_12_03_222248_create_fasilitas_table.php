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
        Schema::create('tb_fasilitas', function (Blueprint $table) {
            $table->string('fasilitas_code', 10);
            $table->string('fasilitas_name');
            $table->string('fasilitas_type');
            $table->string('fasilitas_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_fasilitas');
    }
};
