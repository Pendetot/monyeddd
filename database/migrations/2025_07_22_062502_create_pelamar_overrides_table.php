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
        Schema::create('pelamar_overrides', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pelamar_id')->constrained()->onDelete('cascade');
            $table->string('nik');
            $table->string('nama');
            $table->string('penempatan');
            $table->string('jabatan');
            $table->string('referensi');
            $table->foreignId('authorized_by')->constrained('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelamar_overrides');
    }
};
