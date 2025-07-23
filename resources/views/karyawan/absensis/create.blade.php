<!-- resources/views/karyawan/absensis/create.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Absensi</title>
</head>
<body>
    <h2>Tambah Absensi</h2>
    <form method="POST" action="{{ route('karyawan.absensis.store') }}">
        @csrf
        <div>
            <label for="karyawan_id">Karyawan ID</label>
            <input type="text" id="karyawan_id" name="karyawan_id" required>
        </div>
        <div>
            <label for="tanggal">Tanggal</label>
            <input type="date" id="tanggal" name="tanggal" required>
        </div>
        <div>
            <label for="status_absensi">Status Absensi</label>
            <select id="status_absensi" name="status_absensi" required>
                <option value="hadir">Hadir</option>
                <option value="izin">Izin</option>
                <option value="sakit">Sakit</option>
                <option value="alpha">Alpha</option>
            </select>
        </div>
        <div>
            <label for="keterangan">Keterangan</label>
            <textarea id="keterangan" name="keterangan"></textarea>
        </div>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
