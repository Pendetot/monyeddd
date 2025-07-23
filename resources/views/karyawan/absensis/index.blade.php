<!-- resources/views/karyawan/absensis/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Absensi</title>
</head>
<body>
    <h2>Daftar Absensi</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Karyawan ID</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($absensis as $absensi)
                <tr>
                    <td>{{ $absensi->id }}</td>
                    <td>{{ $absensi->karyawan_id }}</td>
                    <td>{{ $absensi->tanggal }}</td>
                    <td>{{ $absensi->status_absensi }}</td>
                    <td>{{ $absensi->keterangan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
