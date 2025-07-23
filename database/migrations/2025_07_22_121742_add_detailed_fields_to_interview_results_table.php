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
        Schema::table('interview_results', function (Blueprint $table) {
            // Interview Questions
            $table->text('q_about_yourself')->nullable();
            $table->text('q_reason_for_resigning')->nullable();
            $table->text('q_hobbies_organizations')->nullable();
            $table->text('q_why_interested')->nullable();
            $table->text('q_motivation')->nullable();
            $table->text('q_experience')->nullable();
            $table->text('q_skills_for_job')->nullable();
            $table->text('q_what_you_like_about_job')->nullable();
            $table->string('q_desired_salary')->nullable();
            $table->text('q_knowledge_of_position')->nullable();

            // Document Checklist (boolean for Ada/Tidak Ada)
            $table->boolean('doc_cv')->default(false);
            $table->boolean('doc_ktp')->default(false);
            $table->boolean('doc_kk')->default(false);
            $table->boolean('doc_ijazah')->default(false);
            $table->boolean('doc_paklaring')->default(false);
            $table->boolean('doc_skck')->default(false);
            $table->boolean('doc_sim')->default(false);
            $table->boolean('doc_surat_dokter')->default(false);
            $table->boolean('doc_sertifikat_beladiri')->default(false);
            $table->boolean('doc_ijazah_gp')->default(false);
            $table->boolean('doc_ijazah_gm')->default(false);
            $table->boolean('doc_kta')->default(false);

            // Physical Attributes
            $table->string('uniform_size')->nullable();
            $table->string('shoe_size')->nullable();
            $table->integer('height')->nullable();
            $table->integer('weight')->nullable();

            // Assessment Form (scores 1-5)
            $table->integer('score_formal_education')->nullable();
            $table->integer('score_technical_knowledge')->nullable();
            $table->integer('score_communication')->nullable();
            $table->integer('score_teamwork')->nullable();
            $table->integer('score_motivation')->nullable();
            $table->integer('score_stress_resistance')->nullable();
            $table->integer('score_independence')->nullable();
            $table->integer('score_leadership')->nullable();
            $table->integer('score_ethics')->nullable();
            $table->integer('score_appearance')->nullable();

            // Final Recommendation
            $table->text('final_notes')->nullable();
            $table->date('interview_date')->nullable();
            $table->string('ops_signature')->nullable(); // Store path to signature image or similar
            $table->string('hrd_signature')->nullable(); // Store path to signature image or similar
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('interview_results', function (Blueprint $table) {
            $table->dropColumn([
                'q_about_yourself',
                'q_reason_for_resigning',
                'q_hobbies_organizations',
                'q_why_interested',
                'q_motivation',
                'q_experience',
                'q_skills_for_job',
                'q_what_you_like_about_job',
                'q_desired_salary',
                'q_knowledge_of_position',
                'doc_cv',
                'doc_ktp',
                'doc_kk',
                'doc_ijazah',
                'doc_paklaring',
                'doc_skck',
                'doc_sim',
                'doc_surat_dokter',
                'doc_sertifikat_beladiri',
                'doc_ijazah_gp',
                'doc_ijazah_gm',
                'doc_kta',
                'uniform_size',
                'shoe_size',
                'height',
                'weight',
                'score_formal_education',
                'score_technical_knowledge',
                'score_communication',
                'score_teamwork',
                'score_motivation',
                'score_stress_resistance',
                'score_independence',
                'score_leadership',
                'score_ethics',
                'score_appearance',
                'final_notes',
                'interview_date',
                'ops_signature',
                'hrd_signature',
            ]);
        });
    }
};