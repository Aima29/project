@extends('layouts.app')

@section('title','Tentang WARTA.ID')

@section('content')
<div class="container py-5">
    <!-- Hero -->
    <div class="card mb-4 shadow-sm" style="border-left:4px solid #667eea;">
        <div class="card-body">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="fw-bold mb-2">Tentang WARTA.ID</h1>
                    <p class="mb-1 text-muted">WARTA.ID adalah platform pelaporan publik yang memudahkan masyarakat untuk menyampaikan isu, keluhan, dan informasi penting secara cepat dan transparan.</p>
                    <p class="mb-0">Kami menghubungkan pelapor dengan pihak terkait sehingga tindak lanjut dapat diproses lebih cepat dan akuntabel.</p>
                </div>
                <div class="col-md-4 text-md-end mt-3 mt-md-0">
                    <a href="{{ route('laporan.create') }}" class="btn btn-primary btn-lg">
                        <i class="fa fa-plus-circle me-2"></i> Buat Laporan
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- About cards -->
    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="fw-bold">Visi</h5>
                    <p class="text-muted mb-0">Mewujudkan pelayanan publik yang responsif, transparan, dan dapat dipercaya melalui partisipasi masyarakat.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="fw-bold">Misi</h5>
                    <ul class="mb-0 text-muted">
                        <li>Menyediakan saluran pelaporan yang mudah diakses.</li>
                        <li>Mendukung keterbukaan dan akuntabilitas proses tindak lanjut.</li>
                        <li>Menghubungkan pelapor dengan instansi terkait secara cepat.</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="fw-bold">Kontak & Dukungan</h5>
                    <p class="text-muted mb-1">Email: <a href="mailto:admin@warta.id">admin@warta.id</a></p>
                    <p class="text-muted mb-0">Jam Operasional: Senin - Jumat, 09:00 - 17:00</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-body">
            <h5 class="fw-bold mb-3">Mengapa WARTA.ID?</h5>
            <p class="text-muted">WARTA.ID dirancang untuk memudahkan masyarakat melaporkan masalah publik tanpa hambatan birokrasi. Sistem kami menyimpan riwayat laporan, memungkinkan pelapor melacak status, dan membantu pihak terkait merespon lebih cepat.</p>
            <p class="mb-0">Mulai berkontribusi sekarang — setiap laporan membantu membuat lingkungan lebih baik.</p>
        </div>
    </div>
</div>
@endsection
