<!-- resources/views/karyawan/kpis/create.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Tambah KPI</title>
</head>
<body>
    <h2>Tambah KPI</h2>
    <form method="POST" action="{{ route('karyawan.kpis.store') }}">
        @csrf
        <div>
            <label for="karyawan_id">Karyawan ID</label>
            <input type="text" id="karyawan_id" name="karyawan_id" required>
        </div>
        <div>
            <label for="periode">Periode</label>
            <input type="text" id="periode" name="periode" required>
        </div>
        <div>
            <label for="nilai_kpi">Nilai KPI</label>
            <input type="number" id="nilai_kpi" name="nilai_kpi" required>
        </div>
        <div>
            <label for="evaluasi">Evaluasi</label>
            <textarea id="evaluasi" name="evaluasi"></textarea>
        </div>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
