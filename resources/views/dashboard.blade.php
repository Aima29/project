<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - WARTA.ID</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container my-5">
        <h2 class="mb-4">📊 Dashboard WARTA.ID</h2>

        <!-- Statistik -->
        <div class="row g-4 mb-4">
            <div class="col-md-3">
                <div class="card text-center p-3">
                    <h6>Total Laporan</h6>
                    <h2 class="text-primary">{{ $total }}</h2>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center p-3">
                    <h6>Selesai</h6>
                    <h2 class="text-success">{{ $selesai }}</h2>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center p-3">
                    <h6>Proses</h6>
                    <h2 class="text-warning">{{ $proses }}</h2>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center p-3">
                    <h6>Baru</h6>
                    <h2 class="text-danger">{{ $baru }}</h2>
                </div>
            </div>
        </div>

        <!-- Tabel Laporan Terbaru -->
        <div class="card">
            <div class="card-header bg-primary text-white fw-bold">📝 Laporan Terbaru</div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($laporan as $index => $item)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $item['judul'] }}</td>
                            <td>
                                @if($item['status'] == 'Selesai')
                                    <span class="badge bg-success">Selesai</span>
                                @elseif($item['status'] == 'Diproses')
                                    <span class="badge bg-warning text-dark">Diproses</span>
                                @else
                                    <span class="badge bg-danger">Baru</span>
                                @endif
                            </td>
                            <td>{{ $item['tanggal'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</body>
</html>
