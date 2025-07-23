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
        Schema::table('pelamars', function (Blueprint $table) {
            $table->string('nik')->after('nama');
            $table->string('no_kk')->after('nik');
            $table->text('pengalaman')->after('alamat');
            $table->string('foto_formal')->after('pengalaman');
            $table->string('penempatan')->after('foto_formal');
            $table->string('nama_pt')->after('penempatan');
            $table->string('ijazah_sma')->after('nama_pt');
            $table->string('ijazah_gp')->nullable()->after('ijazah_sma');
            $table->string('sertifikat_lsp')->nullable()->after('ijazah_gp');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pelamars', function (Blueprint $table) {
            $table->dropColumn(['nik', 'no_kk', 'pengalaman', 'foto_formal', 'penempatan', 'nama_pt', 'ijazah_sma', 'ijazah_gp', 'sertifikat_lsp']);
        });
    }
};