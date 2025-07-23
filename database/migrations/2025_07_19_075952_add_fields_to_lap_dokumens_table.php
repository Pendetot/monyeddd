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
        Schema::table('lap_dokumens', function (Blueprint $table) {
            $table->foreignId('karyawan_id')->constrained('karyawans')->onDelete('cascade');
            $table->string('ijazah_gp')->nullable();
            $table->string('ktp');
            $table->string('bpjs_kes')->nullable();
            $table->string('bpjs_tk')->nullable();
            $table->string('kta')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lap_dokumens', function (Blueprint $table) {
            $table->dropForeign(['karyawan_id']);
            $table->dropColumn(['karyawan_id', 'ijazah_gp', 'ktp', 'bpjs_kes', 'bpjs_tk', 'kta']);
        });
    }
};