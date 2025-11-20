@extends('layouts.app')

@section('title', 'Edit Laporan - WARTA.ID')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Header -->
            <div class="mb-4">
                <h2 class="fw-bold mb-2">
                    <i class="fa fa-edit" style="color: #667eea;"></i> Edit Laporan
                </h2>
                <p class="text-muted">Perbarui detail laporan Anda</p>
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

                    <form action="{{ route('laporan.update', $laporan->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <!-- Judul Laporan -->
                        <div class="mb-4">
                            <label for="judul" class="form-label fw-bold mb-2">
                                <i class="fa fa-heading" style="color: #667eea;"></i> Judul Laporan
                            </label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" 
                                   id="judul" name="judul" value="{{ old('judul', $laporan->judul) }}" 
                                   placeholder="Masukkan judul laporan" required>
                            @error('judul')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tujuan Laporan -->
                        <div class="mb-4">
                            <label for="tujuan" class="form-label fw-bold mb-2">
                                <i class="fa fa-location-arrow" style="color: #667eea;"></i> Tujuan Laporan
                            </label>
                            <select class="form-select @error('tujuan') is-invalid @enderror" 
                                    id="tujuan" name="tujuan" required>
                                <option value="">-- Pilih Tujuan Laporan --</option>
                                <option value="pemerintah" {{ old('tujuan', $laporan->tujuan ?? '') == 'pemerintah' ? 'selected' : '' }}>
                                    Pemerintah
                                </option>
                                <option value="dinas" {{ old('tujuan', $laporan->tujuan ?? '') == 'dinas' ? 'selected' : '' }}>
                                    Dinas/Instansi
                                </option>
                                <option value="polisi" {{ old('tujuan', $laporan->tujuan ?? '') == 'polisi' ? 'selected' : '' }}>
                                    Kepolisian
                                </option>
                                <option value="kejaksaan" {{ old('tujuan', $laporan->tujuan ?? '') == 'kejaksaan' ? 'selected' : '' }}>
                                    Kejaksaan
                                </option>
                                <option value="media" {{ old('tujuan', $laporan->tujuan ?? '') == 'media' ? 'selected' : '' }}>
                                    Media Massa
                                </option>
                                <option value="publik" {{ old('tujuan', $laporan->tujuan ?? '') == 'publik' ? 'selected' : '' }}>
                                    Publik
                                </option>
                            </select>
                            @error('tujuan')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Isi Laporan -->
                        <div class="mb-4">
                            <label for="isi_laporan" class="form-label fw-bold mb-2">
                                <i class="fa fa-file-alt" style="color: #667eea;"></i> Isi Laporan
                            </label>
                            <textarea class="form-control @error('isi_laporan') is-invalid @enderror" 
                                      id="isi_laporan" name="isi_laporan" rows="10" 
                                      placeholder="Jelaskan secara detail apa yang ingin Anda laporkan" 
                                      required>{{ old('isi_laporan', $laporan->isi_laporan) }}</textarea>
                            @error('isi_laporan')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Timestamps Info -->
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <small class="text-muted d-block">
                                    <i class="fa fa-calendar"></i> Dibuat: 
                                    @if(isset($laporan->created_at))
                                        {{ $laporan->created_at->format('d M Y H:i') }}
                                    @else
                                        N/A
                                    @endif
                                </small>
                            </div>
                            <div class="col-md-6">
                                <small class="text-muted d-block">
                                    <i class="fa fa-refresh"></i> Terakhir diubah: 
                                    @if(isset($laporan->updated_at))
                                        {{ $laporan->updated_at->format('d M Y H:i') }}
                                    @else
                                        N/A
                                    @endif
                                </small>
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fa fa-save"></i> Perbarui Laporan
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
