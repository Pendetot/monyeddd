<!-- resources/views/karyawan/lap_dokumens/create.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Laporan Dokumen</title>
</head>
<body>
    <h2>Tambah Laporan Dokumen</h2>
    <form method="POST" action="{{ route('karyawan.lap-dokumens.store') }}">
        @csrf
        <div>
            <label for="karyawan_id">Karyawan ID</label>
            <input type="text" id="karyawan_id" name="karyawan_id" required>
        </div>
        <div>
            <label for="nama_dokumen">Nama Dokumen</label>
            <input type="text" id="nama_dokumen" name="nama_dokumen" required>
        </div>
        <div>
            <label for="file_path">File Path</label>
            <input type="text" id="file_path" name="file_path" required>
        </div>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
