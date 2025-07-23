<!-- resources/views/karyawan/pembinaans/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pembinaan</title>
</head>
<body>
    <h2>Daftar Pembinaan</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Karyawan ID</th>
                <th>Tanggal Pembinaan</th>
                <th>Catatan</th>
                <th>Hasil</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pembinaans as $pembinaan)
                <tr>
                    <td>{{ $pembinaan->id }}</td>
                    <td>{{ $pembinaan->karyawan_id }}</td>
                    <td>{{ $pembinaan->tanggal_pembinaan }}</td>
                    <td>{{ $pembinaan->catatan }}</td>
                    <td>{{ $pembinaan->hasil }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
