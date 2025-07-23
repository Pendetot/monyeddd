<!-- resources/views/karyawan/kpis/edit.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Edit KPI</title>
</head>
<body>
    <h2>Edit KPI</h2>
    <form method="POST" action="{{ route('karyawan.kpis.update', $kpi->id) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="karyawan_id">Karyawan ID</label>
            <input type="text" id="karyawan_id" name="karyawan_id" value="{{ $kpi->karyawan_id }}" required>
        </div>
        <div>
            <label for="periode">Periode</label>
            <input type="text" id="periode" name="periode" value="{{ $kpi->periode }}" required>
        </div>
        <div>
            <label for="nilai_kpi">Nilai KPI</label>
            <input type="number" id="nilai_kpi" name="nilai_kpi" value="{{ $kpi->nilai_kpi }}" required>
        </div>
        <div>
            <label for="evaluasi">Evaluasi</label>
            <textarea id="evaluasi" name="evaluasi">{{ $kpi->evaluasi }}</textarea>
        </div>
        <button type="submit">Update</button>
    </form>
</body>
</html>
