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
            $table->string('final_decision')->nullable(); // MS or TMS
            $table->text('final_notes')->nullable();
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
            $table->dropColumn(['final_decision', 'final_notes']);
        });
    }
};