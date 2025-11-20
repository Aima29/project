@extends('layouts.app')

@section('title', 'Laporan Saya - WARTA.ID')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <h2 class="fw-bold mb-1">
                        <i class="fa fa-list" style="color: #667eea;"></i> Laporan Saya
                    </h2>
                    <p class="text-muted mb-0">Kelola dan pantau semua laporan Anda</p>
                </div>
                <a href="{{ route('laporan.create') }}" class="btn btn-primary btn-lg">
                    <i class="fa fa-plus-circle"></i> Buat Laporan Baru
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if(empty($laporan))
                        <div class="text-center py-5">
                            <i class="fa fa-inbox fa-4x mb-3" style="color: #ddd;"></i>
                            <p class="text-muted mb-3">Anda belum membuat laporan apapun</p>
                            <a href="{{ route('laporan.create') }}" class="btn btn-primary">
                                <i class="fa fa-plus-circle"></i> Mulai Buat Laporan Sekarang
                            </a>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Judul Laporan</th>
                                        <th>Tujuan</th>
                                        <th>Status</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($laporan as $index => $item)
                                        <tr>
                                            <td class="fw-bold" style="color: #667eea;">{{ $index + 1 }}</td>
                                            <td>
                                                <strong>{{ Str::limit($item->judul, 50) }}</strong>
                                                @if($item->tujuan)
                                                    <br>
                                                    <small class="text-muted">ke: {{ ucfirst($item->tujuan) }}</small>
                                                @endif
                                            </td>
                                            <td>
                                                @if(isset($item['tujuan']))
                                                    @php
                                                        $tujuanBadge = [
                                                            'pemerintah' => 'info',
                                                            'dinas' => 'primary',
                                                            'polisi' => 'warning',
                                                            'kejaksaan' => 'danger',
                                                            'media' => 'secondary',
                                                            'publik' => 'success'
                                                        ];
                                                        $color = $tujuanBadge[$item->tujuan] ?? 'light';
                                                    @endphp
                                                    <span class="badge bg-{{ $color }}">{{ ucfirst($item['tujuan']) }}</span>
                                                @else
                                                    <span class="badge bg-light text-dark">-</span>
                                                @endif
                                            </td>
                                            <td>
                                                @php
                                                    $status = $item->status ?? 'baru';
                                                    $statusBadge = [
                                                        'baru' => 'info',
                                                        'proses' => 'warning',
                                                        'selesai' => 'success'
                                                    ];
                                                    $color = $statusBadge[$status] ?? 'light';
                                                    $statusLabel = [
                                                        'baru' => '🔵 Baru',
                                                        'proses' => '🟡 Diproses',
                                                        'selesai' => '✅ Selesai'
                                                    ];
                                                @endphp
                                                <span class="badge bg-{{ $color }}">{{ $statusLabel[$status] ?? ucfirst($status) }}</span>
                                            </td>
                                            <td>
                                                <small class="text-muted">
                                                    {{ $item->created_at->format('d M Y H:i') }}
                                                </small>
                                            </td>
                                            <td>
                                                <div class="btn-group btn-group-sm" role="group">
                                                    <a href="{{ route('laporan.show', $item->id) }}" class="btn btn-outline-info" title="Lihat">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('laporan.edit', $item->id) }}" class="btn btn-outline-warning" title="Edit">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('laporan.destroy', $item->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus laporan ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-outline-danger" title="Hapus">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
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
    </div>
</div>
@endsection
