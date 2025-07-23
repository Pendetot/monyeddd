<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pelamars', function (Blueprint $table) {
            $table->string('waktu_interview')->nullable();
            $table->string('via_interview')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pelamars', function (Blueprint $table) {
            $table->dropColumn(['waktu_interview', 'via_interview']);
        });
    }
};
