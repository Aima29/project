<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - WARTA.ID</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Arial', sans-serif;
        }
        .register-card {
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
            border-radius: 12px;
            background-color: #ffffff;
            max-width: 500px;
            width: 100%;
        }
        .card-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
            text-align: center;
            padding: 2rem 1rem;
        }
        .card-header h3 {
            margin-bottom: 0.5rem;
            font-size: 1.8rem;
            font-weight: 700;
        }
        .card-header p {
            margin: 0;
            font-size: 0.95rem;
            opacity: 0.9;
        }
        .card-body {
            padding: 2rem;
        }
        .form-control, .form-select {
            border-radius: 8px;
            border: 1px solid #ced4da;
            padding: 0.75rem 1rem;
        }
        .form-control:focus, .form-select:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }
        .btn-primary {
            border-radius: 8px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            padding: 0.75rem 2rem;
            font-weight: 600;
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #5568d3 0%, #6a3e95 100%);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
        }
        .card-footer {
            background-color: #f8f9fa;
            text-align: center;
            padding: 1.5rem;
            border-bottom-left-radius: 12px;
            border-bottom-right-radius: 12px;
        }
        .card-footer p {
            margin: 0;
            font-size: 0.95rem;
            color: #6c757d;
        }
        .card-footer a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
        }
        .card-footer a:hover {
            color: #5568d3;
            text-decoration: underline;
        }
        .form-label {
            font-weight: 600;
            color: #333;
            margin-bottom: 0.5rem;
        }
        .invalid-feedback {
            display: block;
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }
        .alert {
            border-radius: 8px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="register-card">
        <div class="card-header">
            <h3><i class="fa fa-user-plus me-2"></i>Daftar Akun</h3>
            <p>Bergabunglah dengan WARTA.ID</p>
        </div>
        <div class="card-body">

            {{-- Alert untuk success/error --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fa fa-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fa fa-exclamation-circle me-2"></i>{{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            {{-- Tampilkan error validasi --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <h6 class="alert-heading mb-2"><i class="fa fa-exclamation-triangle me-1"></i>Terjadi Kesalahan</h6>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register.submit') }}" method="POST">
                @csrf
                
                <div class="mb-4">
                    <label for="name" class="form-label">
                        <i class="fa fa-user me-1" style="color: #667eea;"></i>Nama Lengkap
                    </label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                           id="name" placeholder="Masukkan nama lengkap Anda" value="{{ old('name') }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="form-label">
                        <i class="fa fa-envelope me-1" style="color: #667eea;"></i>Email
                    </label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                           id="email" placeholder="Masukkan email Anda" value="{{ old('email') }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label">
                        <i class="fa fa-lock me-1" style="color: #667eea;"></i>Password
                    </label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" 
                           id="password" placeholder="Minimal 6 karakter" required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="form-label">
                        <i class="fa fa-lock me-1" style="color: #667eea;"></i>Konfirmasi Password
                    </label>
                    <input type="password" name="password_confirmation" class="form-control" 
                           id="password_confirmation" placeholder="Ulangi password Anda" required>
                </div>

                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="fa fa-user-check me-2"></i>Daftar Sekarang
                    </button>
                </div>
            </form>
        </div>
        <div class="card-footer">
            <p>Sudah punya akun? <a href="{{ route('login') }}"><i class="fa fa-sign-in-alt me-1"></i>Login di sini</a></p>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
