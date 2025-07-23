<!-- resources/views/karyawan/kpis/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Daftar KPI</title>
</head>
<body>
    <h2>Daftar KPI</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Karyawan ID</th>
                <th>Periode</th>
                <th>Nilai KPI</th>
                <th>Evaluasi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kpis as $kpi)
                <tr>
                    <td>{{ $kpi->id }}</td>
                    <td>{{ $kpi->karyawan_id }}</td>
                    <td>{{ $kpi->periode }}</td>
                    <td>{{ $kpi->nilai_kpi }}</td>
                    <td>{{ $kpi->evaluasi }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
