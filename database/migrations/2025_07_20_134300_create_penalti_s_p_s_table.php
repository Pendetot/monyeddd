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
        Schema::create('penalti_s_p_s', function (Blueprint $table) {
            $table->id();
            $table->foreignId('surat_peringatan_id')->constrained('surat_peringatans')->onDelete('cascade');
            $table->foreignId('karyawan_id')->constrained('karyawans')->onDelete('cascade');
            $table->decimal('jumlah_penalti', 15, 2);
            $table->date('tanggal_pencatatan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penalti_s_p_s');
    }
};