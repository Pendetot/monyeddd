<!-- resources/views/karyawan/pembinaans/edit.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Edit Pembinaan</title>
</head>
<body>
    <h2>Edit Pembinaan</h2>
    <form method="POST" action="{{ route('karyawan.pembinaans.update', $pembinaan->id) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="karyawan_id">Karyawan ID</label>
            <input type="text" id="karyawan_id" name="karyawan_id" value="{{ $pembinaan->karyawan_id }}" required>
        </div>
        <div>
            <label for="tanggal_pembinaan">Tanggal Pembinaan</label>
            <input type="date" id="tanggal_pembinaan" name="tanggal_pembinaan" value="{{ $pembinaan->tanggal_pembinaan }}" required>
        </div>
        <div>
            <label for="catatan">Catatan</label>
            <textarea id="catatan" name="catatan">{{ $pembinaan->catatan }}</textarea>
        </div>
        <div>
            <label for="hasil">Hasil</label>
            <input type="text" id="hasil" name="hasil" value="{{ $pembinaan->hasil }}" required>
        </div>
        <button type="submit">Update</button>
    </form>
</body>
</html>
