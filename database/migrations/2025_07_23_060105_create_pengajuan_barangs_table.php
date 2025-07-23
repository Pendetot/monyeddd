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
        Schema::create('pengajuan_barangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hrd_id')->constrained('users')->onDelete('cascade');
            $table->string('item_name');
            $table->integer('quantity');
            $table->text('notes')->nullable(); // New column for HRD notes
            $table->enum('status', ['pending_logistic_approval', 'pending_superadmin_approval', 'rejected', 'approved', 'item_not_ready', 'item_ready'])->default('pending_logistic_approval');
            $table->text('logistic_notes')->nullable();
            $table->text('superadmin_notes')->nullable();
            $table->timestamp('logistic_approved_at')->nullable();
            $table->timestamp('superadmin_approved_at')->nullable();
            $table->enum('rejected_by', ['logistic', 'superadmin'])->nullable();
            $table->timestamp('rejected_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_barangs');
    }
};