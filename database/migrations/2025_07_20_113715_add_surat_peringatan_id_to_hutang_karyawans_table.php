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
        Schema::table('hutang_karyawans', function (Blueprint $table) {
            $table->foreignId('surat_peringatan_id')->nullable()->constrained('surat_peringatans')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hutang_karyawans', function (Blueprint $table) {
            $table->dropForeign(['surat_peringatan_id']);
            $table->dropColumn('surat_peringatan_id');
        });
    }
};
