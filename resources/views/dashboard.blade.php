@extends('layouts.app')

@section('title', 'Dashboard - WARTA.ID')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h2 class="fw-bold mb-1">Halo, {{ Auth::user()->name }}! 👋</h2>
            <p class="text-muted mb-0">Ringkasan aktivitas pelaporan Anda</p>
        </div>
        <div>
            <a href="{{ route('laporan.create') }}" class="btn btn-primary">
                <i class="fa fa-plus-circle me-1"></i> Buat Laporan
            </a>
        </div>
    </div>

    @php
        $all = Auth::user()->laporans;
        $totalCount = $all->count();
        $selesai = $all->where('status', 'selesai')->count();
        $proses = $all->where('status', 'proses')->count();
        $baru = $all->where('status', 'baru')->count();
        $recent = $all->sortByDesc('created_at')->take(5);
    @endphp

    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center">
                    <small class="text-muted">Total Laporan</small>
                    <h3 class="fw-bold text-primary">{{ $totalCount }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center">
                    <small class="text-muted">Selesai</small>
                    <h3 class="fw-bold text-success">{{ $selesai }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center">
                    <small class="text-muted">Proses</small>
                    <h3 class="fw-bold text-warning">{{ $proses }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm h-100">
                <div class="card-body text-center">
                    <small class="text-muted">Baru</small>
                    <h3 class="fw-bold text-info">{{ $baru }}</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div class="fw-bold">
                <i class="fa fa-history me-2 text-primary"></i> Laporan Terbaru
            </div>
            <a href="{{ route('laporan.index') }}" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
        </div>
        <div class="card-body">
            @if($recent->isEmpty())
                <div class="text-center py-4">
                    <i class="fa fa-inbox fa-3x text-muted mb-2"></i>
                    <p class="text-muted mb-0">Belum ada laporan. <a href="{{ route('laporan.create') }}">Buat laporan sekarang</a></p>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th style="width:60px">No</th>
                                <th>Judul</th>
                                <th style="width:140px">Status</th>
                                <th style="width:160px">Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recent as $i => $item)
                                @php
                                    $status = strtolower($item->status ?? 'baru');
                                    $map = ['baru' => ['label' => 'Baru', 'class' => 'info'], 'proses' => ['label' => 'Diproses', 'class' => 'warning'], 'selesai' => ['label' => 'Selesai', 'class' => 'success']];
                                    $badge = $map[$status] ?? ['label' => ucfirst($status), 'class' => 'secondary'];
                                @endphp
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>
                                        <strong>{{ Str::limit($item->judul, 70) }}</strong>
                                        @if($item->tujuan)
                                            <div><small class="text-muted">ke: {{ ucfirst($item->tujuan) }}</small></div>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge bg-{{ $badge['class'] }}">{{ $badge['label'] }}</span>
                                    </td>
                                    <td>
                                        <small class="text-muted">{{ $item->created_at->format('d M Y') }}</small>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>

</div>
@endsection
