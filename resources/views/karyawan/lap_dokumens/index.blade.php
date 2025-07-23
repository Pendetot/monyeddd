<!-- resources/views/karyawan/lap_dokumens/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Laporan Dokumen</title>
</head>
<body>
    <h2>Daftar Laporan Dokumen</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Karyawan ID</th>
                <th>Nama Dokumen</th>
                <th>File Path</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lapDokumens as $lapDokumen)
                <tr>
                    <td>{{ $lapDokumen->id }}</td>
                    <td>{{ $lapDokumen->karyawan_id }}</td>
                    <td>{{ $lapDokumen->nama_dokumen }}</td>
                    <td>{{ $lapDokumen->file_path }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
