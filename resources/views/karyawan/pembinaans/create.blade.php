<!-- resources/views/karyawan/pembinaans/create.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Pembinaan</title>
</head>
<body>
    <h2>Tambah Pembinaan</h2>
    <form method="POST" action="{{ route('karyawan.pembinaans.store') }}">
        @csrf
        <div>
            <label for="karyawan_id">Karyawan ID</label>
            <input type="text" id="karyawan_id" name="karyawan_id" required>
        </div>
        <div>
            <label for="tanggal_pembinaan">Tanggal Pembinaan</label>
            <input type="date" id="tanggal_pembinaan" name="tanggal_pembinaan" required>
        </div>
        <div>
            <label for="catatan">Catatan</label>
            <textarea id="catatan" name="catatan"></textarea>
        </div>
        <div>
            <label for="hasil">Hasil</label>
            <input type="text" id="hasil" name="hasil" required>
        </div>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
