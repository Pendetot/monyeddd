<!-- resources/views/karyawan/lap_dokumens/edit.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Edit Laporan Dokumen</title>
</head>
<body>
    <h2>Edit Laporan Dokumen</h2>
    <form method="POST" action="{{ route('karyawan.lap-dokumens.update', $lapDokumen->id) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="karyawan_id">Karyawan ID</label>
            <input type="text" id="karyawan_id" name="karyawan_id" value="{{ $lapDokumen->karyawan_id }}" required>
        </div>
        <div>
            <label for="nama_dokumen">Nama Dokumen</label>
            <input type="text" id="nama_dokumen" name="nama_dokumen" value="{{ $lapDokumen->nama_dokumen }}" required>
        </div>
        <div>
            <label for="file_path">File Path</label>
            <input type="text" id="file_path" name="file_path" value="{{ $lapDokumen->file_path }}" required>
        </div>
        <button type="submit">Update</button>
    </form>
</body>
</html>
