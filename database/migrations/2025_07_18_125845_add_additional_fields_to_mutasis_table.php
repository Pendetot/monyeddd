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
        Schema::table('mutasis', function (Blueprint $table) {
            $table->boolean('data_personal_berubah')->default(false);
            $table->boolean('jaminan_seragam_mutasi')->default(false);
            $table->enum('seragam_mutasi', ['sudah_diberikan', 'belum_diberikan', 'tidak_ada'])->default('tidak_ada');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mutasis', function (Blueprint $table) {
            $table->dropColumn(['data_personal_berubah', 'jaminan_seragam_mutasi', 'seragam_mutasi']);
        });
    }
};