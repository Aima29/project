<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - WARTA.ID</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Segoe UI', sans-serif;
        }
        .navbar-brand {
            font-weight: bold;
            font-size: 1.4rem;
        }
        .card-custom {
            border: none;
            border-radius: 15px;
            box-shadow: 0px 4px 12px rgba(0,0,0,0.08);
            transition: 0.3s;
        }
        .card-custom:hover {
            transform: translateY(-5px);
        }
        .stat-icon {
            font-size: 35px;
            margin-bottom: 8px;
        }
        .table-custom {
            border-radius: 10px;
            overflow: hidden;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">📢 WARTA.ID</a>
        </div>
    </nav>

    <!-- Content -->
    <div class="container my-5">
        <h2 class="mb-4 fw-bold">📊 Dashboard Laporan</h2>

        <!-- Statistik -->
        <div class="row g-4 mb-4">
            <div class="col-md-3">
                <div class="card card-custom text-center p-3">
                    <div class="stat-icon">📑</div>
                    <h6>Total Laporan</h6>
                    <h2 class="fw-bold text-primary">{{ $total }}</h2>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-custom text-center p-3">
                    <div class="stat-icon">✅</div>
                    <h6>Selesai</h6>
                    <h2 class="fw-bold text-success">{{ $selesai }}</h2>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-custom text-center p-3">
                    <div class="stat-icon">⏳</div>
                    <h6>Proses</h6>
                    <h2 class="fw-bold text-warning">{{ $proses }}</h2>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card card-custom text-center p-3">
                    <div class="stat-icon">🆕</div>
                    <h6>Baru</h6>
                    <h2 class="fw-bold text-danger">{{ $baru }}</h2>
                </div>
            </div>
        </div>

        <!-- Tabel Ringkasan -->
        <div class="card card-custom">
            <div class="card-header bg-primary text-white fw-bold">
                📝 Ringkasan Laporan Terbaru
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-hover align-middle table-custom">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>🚧 Jalan Rusak di Jalan Sudirman</td>
                            <td><span class="badge bg-warning text-dark">Diproses</span></td>
                            <td>01 Oktober 2025</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>♻️ Sampah Menumpuk di Pasar Pagi</td>
                            <td><span class="badge bg-success">Selesai</span></td>
                            <td>29 September 2025</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>💡 Penerangan Jalan Padam</td>
                            <td><span class="badge bg-danger">Baru</span></td>
                            <td>30 September 2025</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</body>
</html>
