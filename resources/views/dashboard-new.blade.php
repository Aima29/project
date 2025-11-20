@extends('layouts.app')

@section('title', 'Dashboard - WARTA.ID')

@section('content')
<div class="container mt-4">
    <!-- Welcome Section with gradient -->
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card border-0" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);">
                <div class="card-body p-4">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h2 class="card-title fw-bold mb-2">
                                <i class="fa fa-wave-square me-2"></i> Halo, {{ Session::get('user')['name'] }}! 👋
                            </h2>
                            <p class="card-text mb-0 fs-5">
                                Selamat datang di platform pelaporan WARTA.ID. Anda telah membuat <strong>{{ count(Session::get('laporan', [])) }} laporan</strong> hingga saat ini.
                            </p>
                        </div>
                        <div class="col-md-4 text-end d-none d-md-block">
                            <i class="fa fa-newspaper" style="font-size: 5rem; opacity: 0.25;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Stats -->
    <div class="row mb-4">
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card border-0 h-100" style="border-left: 5px solid #667eea;">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <i class="fa fa-file-alt fa-3x" style="color: #667eea;"></i>
                    </div>
                    <h3 class="fw-bold" style="color: #667eea;">
                        @php
                            $allLaporan = Session::get('laporan', []);
                            echo count($allLaporan);
                        @endphp
                    </h3>
                    <p class="text-muted mb-0 fw-500">Total Laporan</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card border-0 h-100" style="border-left: 5px solid #28a745;">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <i class="fa fa-check-circle fa-3x" style="color: #28a745;"></i>
                    </div>
                    <h3 class="fw-bold" style="color: #28a745;">
                        @php
                            $selesai = count(array_filter($allLaporan, function($l) { return ($l['status'] ?? '') === 'selesai'; }));
                            echo $selesai;
                        @endphp
                    </h3>
                    <p class="text-muted mb-0 fw-500">Selesai</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card border-0 h-100" style="border-left: 5px solid #ffc107;">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <i class="fa fa-hourglass-half fa-3x" style="color: #ffc107;"></i>
                    </div>
                    <h3 class="fw-bold" style="color: #ffc107;">
                        @php
                            $proses = count(array_filter($allLaporan, function($l) { return ($l['status'] ?? '') === 'proses'; }));
                            echo $proses;
                        @endphp
                    </h3>
                    <p class="text-muted mb-0 fw-500">Dalam Proses</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card border-0 h-100" style="border-left: 5px solid #17a2b8;">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <i class="fa fa-plus-circle fa-3x" style="color: #17a2b8;"></i>
                    </div>
                    <h3 class="fw-bold" style="color: #17a2b8;">
                        @php
                            $baru = count(array_filter($allLaporan, function($l) { return ($l['status'] ?? '') === 'baru'; }));
                            echo $baru;
                        @endphp
                    </h3>
                    <p class="text-muted mb-0 fw-500">Baru</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="d-flex gap-3 flex-wrap">
                <a href="{{ route('laporan.create') }}" class="btn btn-primary btn-lg" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border: none;">
                    <i class="fa fa-plus-circle me-2"></i> Buat Laporan Baru
                </a>
                <a href="{{ route('laporan.index') }}" class="btn btn-outline-primary btn-lg">
                    <i class="fa fa-list me-2"></i> Lihat Semua Laporan
                </a>
            </div>
        </div>
    </div>

    <!-- Recent Reports -->
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card border-0">
                <div class="card-header bg-light border-0">
                    <h5 class="mb-0 fw-bold">
                        <i class="fa fa-history me-2" style="color: #667eea;"></i> 5 Laporan Terbaru Anda
                    </h5>
                </div>
                <div class="card-body">
                    @php
                        $laporan = Session::get('laporan', []);
                        $recentLaporan = array_slice(array_reverse($laporan), 0, 5);
                    @endphp

                    @if(empty($laporan))
                        <div class="alert alert-info mb-0" role="alert">
                            <i class="fa fa-info-circle me-2"></i> Anda belum membuat laporan apapun. 
                            <a href="{{ route('laporan.create') }}" class="alert-link fw-bold">Mulai buat laporan sekarang</a>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-hover table-borderless mb-0">
                                <thead class="border-bottom">
                                    <tr>
                                        <th class="fw-bold text-uppercase small">No</th>
                                        <th class="fw-bold text-uppercase small">Judul</th>
                                        <th class="fw-bold text-uppercase small">Status</th>
                                        <th class="fw-bold text-uppercase small">Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($recentLaporan as $index => $item)
                                        <tr class="border-bottom">
                                            <td>
                                                <span class="badge bg-secondary">{{ $index + 1 }}</span>
                                            </td>
                                            <td>
                                                <strong>{{ Str::limit($item['judul'], 45) }}</strong>
                                            </td>
                                            <td>
                                                @php
                                                    $status = $item['status'] ?? 'baru';
                                                    $statusBadge = [
                                                        'baru' => 'info',
                                                        'proses' => 'warning',
                                                        'selesai' => 'success'
                                                    ];
                                                    $color = $statusBadge[$status] ?? 'light';
                                                    $statusLabel = [
                                                        'baru' => 'Baru',
                                                        'proses' => 'Diproses',
                                                        'selesai' => 'Selesai'
                                                    ];
                                                @endphp
                                                <span class="badge bg-{{ $color }}">{{ $statusLabel[$status] ?? ucfirst($status) }}</span>
                                            </td>
                                            <td>
                                                <small class="text-muted">
                                                    {{ \Carbon\Carbon::parse($item['created_at'])->format('d M Y') }}
                                                </small>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-3 text-end">
                            <a href="{{ route('laporan.index') }}" class="btn btn-sm btn-outline-primary">
                                Lihat Semua Laporan <i class="fa fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Information Section -->
    <div class="row mb-4">
        <div class="col-md-6 mb-3">
            <div class="card border-0 h-100">
                <div class="card-header bg-light border-0">
                    <h5 class="mb-0 fw-bold">
                        <i class="fa fa-lightbulb me-2" style="color: #ffc107;"></i> Tips Membuat Laporan Baik
                    </h5>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled mb-0">
                        <li class="mb-2">
                            <i class="fa fa-check-circle me-2" style="color: #28a745;"></i> 
                            <span>Jelaskan masalah dengan detail dan jelas</span>
                        </li>
                        <li class="mb-2">
                            <i class="fa fa-check-circle me-2" style="color: #28a745;"></i> 
                            <span>Sertakan lokasi atau waktu kejadian</span>
                        </li>
                        <li class="mb-2">
                            <i class="fa fa-check-circle me-2" style="color: #28a745;"></i> 
                            <span>Cantumkan pihak yang terlibat (jika ada)</span>
                        </li>
                        <li>
                            <i class="fa fa-check-circle me-2" style="color: #28a745;"></i> 
                            <span>Pilih tujuan laporan dengan tepat</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="card border-0 h-100">
                <div class="card-header bg-light border-0">
                    <h5 class="mb-0 fw-bold">
                        <i class="fa fa-question-circle me-2" style="color: #667eea;"></i> FAQ
                    </h5>
                </div>
                <div class="card-body">
                    <p class="mb-2">
                        <strong class="fw-bold">Berapa lama laporan diproses?</strong><br>
                        <small class="text-muted">Laporan kami proses dalam 1-7 hari kerja tergantung jenis laporan.</small>
                    </p>
                    <p class="mb-0">
                        <strong class="fw-bold">Bagaimana cara melacak laporan?</strong><br>
                        <small class="text-muted">Klik menu "Laporan Saya" untuk melihat semua laporan dan status masing-masing.</small>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

