@extends('layouts.app')

@section('title', 'Pelamar Dashboard')

@section('content')
    <!-- [ Main Content ] start -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Status Lamaran</h5>
                </div>
                <div class="card-body">
                    <p>Status lamaran Anda saat ini adalah: <strong>{{ $pelamar->status ?? 'N/A' }}</strong></p>

                    @if($pelamar && $pelamar->tanggal_interview && $pelamar->status === 'diterima')
                        <p>Anda memiliki jadwal interview. Mohon konfirmasi kehadiran Anda:</p>
                        <a href="{{ route('pelamar.show-confirm-interview', $pelamar->id) }}" class="btn btn-primary">Konfirmasi Kehadiran Interview</a>
                    @endif

                    @if($pelamar && $pelamar->patResult)
                        <hr>
                        <h5>Hasil Tes PAT</h5>
                        <p>Skor: {{ $pelamar->patResult->score }}</p>
                        <p>Catatan: {{ $pelamar->patResult->notes }}</p>
                    @endif

                    @if($pelamar && $pelamar->psikotestResult)
                        <hr>
                        <h5>Hasil Tes Psikotest</h5>
                        <p>Kesimpulan: {{ $pelamar->psikotestResult->conclusion }}</p>
                        @if($pelamar->psikotestResult->scan_path)
                            <p>Scan: <a href="{{ Storage::url($pelamar->psikotestResult->scan_path) }}" target="_blank">Lihat Scan</a></p>
                        @endif
                    @endif

                    @if($pelamar && $pelamar->healthTestResult)
                        <hr>
                        <h5>Hasil Tes Kesehatan</h5>
                        <p>Hasil: {{ $pelamar->healthTestResult->result }}</p>
                        <p>Catatan: {{ $pelamar->healthTestResult->notes }}</p>
                    @endif

                    @if($pelamar && $pelamar->interviewResult)
                        <hr>
                        <h5>Hasil Interview</h5>
                        <p>Keputusan: {{ $pelamar->interviewResult->decision }}</p>
                        <p>Catatan HRD: {{ $pelamar->interviewResult->hrd_notes }}</p>
                        <p>Catatan Operasional: {{ $pelamar->interviewResult->ops_notes }}</p>

                        <h6>Pertanyaan Interview:</h6>
                        <ul>
                            <li><strong>Jelaskan sedikit tentang diri Anda:</strong> {{ $pelamar->interviewResult->q_about_yourself }}</li>
                            <li><strong>Alasan Resign:</strong> {{ $pelamar->interviewResult->q_reason_for_resigning }}</li>
                            <li><strong>Hobi dan Organisasi:</strong> {{ $pelamar->interviewResult->q_hobbies_organizations }}</li>
                            <li><strong>Mengapa Anda tertarik dengan pekerjaan ini:</strong> {{ $pelamar->interviewResult->q_why_interested }}</li>
                            <li><strong>Motivasi:</strong> {{ $pelamar->interviewResult->q_motivation }}</li>
                            <li><strong>Pengalaman Anda:</strong> {{ $pelamar->interviewResult->q_experience }}</li>
                            <li><strong>Keterampilan untuk pekerjaan ini:</strong> {{ $pelamar->interviewResult->q_skills_for_job }}</li>
                            <li><strong>Hal apa yang Anda sukai di pekerjaan ini:</strong> {{ $pelamar->interviewResult->q_what_you_like_about_job }}</li>
                            <li><strong>Gaji yang diinginkan:</strong> {{ $pelamar->interviewResult->q_desired_salary }}</li>
                            <li><strong>Apa yang Anda ketahui dari posisi ini:</strong> {{ $pelamar->interviewResult->q_knowledge_of_position }}</li>
                        </ul>

                        <h6>Kelengkapan Dokumen:</h6>
                        <ul>
                            <li>CV: {{ $pelamar->interviewResult->doc_cv ? 'Ada' : 'Tidak Ada' }}</li>
                            <li>KTP: {{ $pelamar->interviewResult->doc_ktp ? 'Ada' : 'Tidak Ada' }}</li>
                            <li>KK: {{ $pelamar->interviewResult->doc_kk ? 'Ada' : 'Tidak Ada' }}</li>
                            <li>Ijazah: {{ $pelamar->interviewResult->doc_ijazah ? 'Ada' : 'Tidak Ada' }}</li>
                            <li>Paklaring: {{ $pelamar->interviewResult->doc_paklaring ? 'Ada' : 'Tidak Ada' }}</li>
                            <li>SKCK: {{ $pelamar->interviewResult->doc_skck ? 'Ada' : 'Tidak Ada' }}</li>
                            <li>SIM: {{ $pelamar->interviewResult->doc_sim ? 'Ada' : 'Tidak Ada' }}</li>
                            <li>Surat Dokter: {{ $pelamar->interviewResult->doc_surat_dokter ? 'Ada' : 'Tidak Ada' }}</li>
                            <li>Sertifikat Beladiri: {{ $pelamar->interviewResult->doc_sertifikat_beladiri ? 'Ada' : 'Tidak Ada' }}</li>
                            <li>Ijazah GP: {{ $pelamar->interviewResult->doc_ijazah_gp ? 'Ada' : 'Tidak Ada' }}</li>
                            <li>Ijazah GM: {{ $pelamar->interviewResult->doc_ijazah_gm ? 'Ada' : 'Tidak Ada' }}</li>
                            <li>KTA: {{ $pelamar->interviewResult->doc_kta ? 'Ada' : 'Tidak Ada' }}</li>
                        </ul>

                        <h6>Atribut Fisik:</h6>
                        <ul>
                            <li>Ukuran Seragam: {{ $pelamar->interviewResult->uniform_size }}</li>
                            <li>Ukuran Sepatu: {{ $pelamar->interviewResult->shoe_size }}</li>
                            <li>Tinggi Badan: {{ $pelamar->interviewResult->height }} cm</li>
                            <li>Berat Badan: {{ $pelamar->interviewResult->weight }} kg</li>
                        </ul>

                        <h6>Form Penilaian:</h6>
                        <ul>
                            <li>Pendidikan Formal: {{ $pelamar->interviewResult->score_formal_education }}</li>
                            <li>Pengetahuan Teknis: {{ $pelamar->interviewResult->score_technical_knowledge }}</li>
                            <li>Kemampuan Komunikasi: {{ $pelamar->interviewResult->score_communication }}</li>
                            <li>Kerjasama: {{ $pelamar->interviewResult->score_teamwork }}</li>
                            <li>Motivasi: {{ $pelamar->interviewResult->score_motivation }}</li>
                            <li>Ketahanan terhadap stress / tekanan: {{ $pelamar->interviewResult->score_stress_resistance }}</li>
                            <li>Kemandirian: {{ $pelamar->interviewResult->score_independence }}</li>
                            <li>Kepemimpinan: {{ $pelamar->interviewResult->score_leadership }}</li>
                            <li>Etika/Sopan Santun: {{ $pelamar->interviewResult->score_ethics }}</li>
                            <li>Penampilan diri: {{ $pelamar->interviewResult->score_appearance }}</li>
                        </ul>

                        <p>Catatan Akhir: {{ $pelamar->interviewResult->final_notes }}</p>
                        <p>Tanggal Interview: {{ $pelamar->interviewResult->interview_date }}</p>
                        <p>Tanda Tangan Operasional: {{ $pelamar->interviewResult->ops_signature }}</p>
                        <p>Tanda Tangan HRD: {{ $pelamar->interviewResult->hrd_signature }}</p>
                    @endif

                    @if($pelamar && $pelamar->final_decision)
                        <hr>
                        <h5>Keputusan Akhir</h5>
                        <p>Keputusan: <strong>{{ $pelamar->final_decision }}</strong></p>
                        <p>Catatan: {{ $pelamar->final_notes }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
