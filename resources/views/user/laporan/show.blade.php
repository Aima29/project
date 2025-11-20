@extends('layouts.app')

@section('title', 'Detail Laporan - WARTA.ID')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h3 class="mb-2 fw-bold">{{ $laporan->judul }}</h3>
                            <div class="mb-2">
                                @if($laporan->tujuan)
                                    @php
                                        $tujuanBadge = [
                                            'pemerintah' => 'info',
                                            'dinas' => 'primary',
                                            'polisi' => 'warning',
                                            'kejaksaan' => 'danger',
                                            'media' => 'secondary',
                                            'publik' => 'success'
                                        ];
                                        $color = $tujuanBadge[$laporan->tujuan] ?? 'light';
                                    @endphp
                                    <span class="badge bg-{{ $color }} me-2">
                                        <i class="fa fa-location-arrow"></i> {{ ucfirst($laporan['tujuan']) }}
                                    </span>
                                @endif
                                @php
                                    $status = $laporan->status ?? 'baru';
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
                            </div>
                        </div>
                        <div class="btn-group" role="group">
                            <a href="{{ route('laporan.edit', $laporan->id) }}" class="btn btn-warning btn-sm">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                            <a href="{{ route('laporan.index') }}" class="btn btn-secondary btn-sm">
                                <i class="fa fa-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-4">
                        <div class="row">
                            <div class="col-md-6">
                                <small class="text-muted d-block">
                                    <i class="fa fa-calendar-alt"></i> Dibuat:
                                </small>
                                <small>
                                    @if(isset($laporan->created_at))
                                        {{ $laporan->created_at->format('d M Y H:i') }}
                                    @else
                                        N/A
                                    @endif
                                </small>
                            </div>
                            <div class="col-md-6">
                                <small class="text-muted d-block">
                                    <i class="fa fa-sync-alt"></i> Terakhir diubah:
                                </small>
                                <small>
                                    @if(isset($laporan->updated_at))
                                        {{ $laporan->updated_at->format('d M Y H:i') }}
                                    @else
                                        N/A
                                    @endif
                                </small>
                            </div>
                        </div>
                    </div>
                    
                    <hr class="my-3">
                    
                    <div class="laporan-content">
                        <h5 class="fw-bold mb-3">
                            <i class="fa fa-file-alt" style="color: #667eea;"></i> Isi Laporan
                        </h5>
                        <div class="p-3" style="background-color: #f8f9fa; border-radius: 8px; border-left: 4px solid #667eea;">
                            {!! nl2br(e($laporan->isi_laporan)) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
