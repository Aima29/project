@extends('layouts.app')

@section('title', 'Buat Laporan Baru - WARTA.ID')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Header -->
            <div class="mb-4">
                <h2 class="fw-bold mb-2">
                    <i class="fa fa-pencil-alt" style="color: #667eea;"></i> Buat Laporan Baru
                </h2>
                <p class="text-muted">Sampaikan isu atau keluhan Anda dengan detail yang jelas dan lengkap</p>
            </div>

            <div class="card">
                <div class="card-body p-4">
                    @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <h5 class="alert-heading mb-2">
                                <i class="fa fa-exclamation-circle"></i> Terjadi Kesalahan
                            </h5>
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('laporan.store') }}" method="POST">
                        @csrf
                        
                        <!-- Judul Laporan -->
                        <div class="mb-4">
                            <label for="judul" class="form-label fw-bold mb-2">
                                <i class="fa fa-heading" style="color: #667eea;"></i> Judul Laporan
                            </label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" 
                                   id="judul" name="judul" value="{{ old('judul') }}" 
                                   placeholder="Contoh: Jalan Rusak di Jl. Sudirman" required>
                            @error('judul')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                            <small class="text-muted d-block mt-2">Gunakan judul yang singkat dan deskriptif</small>
                        </div>

                        <!-- Tujuan Laporan -->
                        <div class="mb-4">
                            <label for="tujuan" class="form-label fw-bold mb-2">
                                <i class="fa fa-location-arrow" style="color: #667eea;"></i> Tujuan Laporan
                            </label>
                            <select class="form-select @error('tujuan') is-invalid @enderror" 
                                    id="tujuan" name="tujuan" required>
                                <option value="">-- Pilih Tujuan Laporan --</option>
                                <option value="pemerintah" {{ old('tujuan') == 'pemerintah' ? 'selected' : '' }}>
                                    <i class="fa fa-university"></i> Pemerintah
                                </option>
                                <option value="dinas" {{ old('tujuan') == 'dinas' ? 'selected' : '' }}>
                                    <i class="fa fa-building"></i> Dinas/Instansi
                                </option>
                                <option value="polisi" {{ old('tujuan') == 'polisi' ? 'selected' : '' }}>
                                    <i class="fa fa-shield-alt"></i> Kepolisian
                                </option>
                                <option value="kejaksaan" {{ old('tujuan') == 'kejaksaan' ? 'selected' : '' }}>
                                    <i class="fa fa-gavel"></i> Kejaksaan
                                </option>
                                <option value="media" {{ old('tujuan') == 'media' ? 'selected' : '' }}>
                                    <i class="fa fa-newspaper"></i> Media Massa
                                </option>
                                <option value="publik" {{ old('tujuan') == 'publik' ? 'selected' : '' }}>
                                    <i class="fa fa-users"></i> Publik
                                </option>
                            </select>
                            @error('tujuan')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                            <small class="text-muted d-block mt-2">Pilih instansi yang paling sesuai dengan laporan Anda</small>
                        </div>

                        <!-- Isi Laporan -->
                        <div class="mb-4">
                            <label for="isi_laporan" class="form-label fw-bold mb-2">
                                <i class="fa fa-file-alt" style="color: #667eea;"></i> Isi Laporan
                            </label>
                            <textarea class="form-control @error('isi_laporan') is-invalid @enderror" 
                                      id="isi_laporan" name="isi_laporan" rows="10" 
                                      placeholder="Jelaskan secara detail apa yang ingin Anda laporkan. Sertakan:
- Deskripsi masalah
- Lokasi
- Waktu kejadian
- Nama/identitas pihak terkait (opsional)
- Bukti atau dokumentasi lainnya" 
                                      required>{{ old('isi_laporan') }}</textarea>
                            @error('isi_laporan')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                            <small class="text-muted d-block mt-2">
                                <i class="fa fa-info-circle"></i> Semakin detail laporan Anda, semakin cepat ditindaklanjuti
                            </small>
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fa fa-paper-plane"></i> Kirim Laporan
                            </button>
                            <a href="{{ route('laporan.index') }}" class="btn btn-outline-secondary btn-lg">
                                <i class="fa fa-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
