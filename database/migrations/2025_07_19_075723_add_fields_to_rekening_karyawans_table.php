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
        Schema::table('rekening_karyawans', function (Blueprint $table) {
            $table->foreignId('karyawan_id')->constrained('karyawans')->onDelete('cascade');
            $table->string('nama_bank');
            $table->string('nomor_rekening');
            $table->string('atas_nama');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rekening_karyawans', function (Blueprint $table) {
            $table->dropForeign(['karyawan_id']);
            $table->dropColumn(['karyawan_id', 'nama_bank', 'nomor_rekening', 'atas_nama']);
        });
    }
};