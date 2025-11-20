<!-- Navbar Partial -->
<nav class="navbar navbar-expand-lg navbar-light" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold text-white" href="/" style="font-size: 1.8rem; letter-spacing: 1px;">
            <i class="fa fa-newspaper"></i> WARTA.ID
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                @if(Auth::check())
                    <li class="nav-item">
                        <a class="nav-link text-white fw-500 " href="{{ route('tentang') }}">
                        <i class="fa fa-info-circle"></i> Tentang WARTA.ID
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-500" href="{{ route('dashboard') }}">
                            <i class="fa fa-home"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white fw-500" href="{{ route('laporan.index') }}">
                            <i class="fa fa-newspaper"></i> Laporan Saya
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white fw-500" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="fa fa-user-circle"></i> {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#"><i class="fa fa-cog"></i> Pengaturan</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="fa fa-sign-out-alt"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link text-white fw-500" href="{{ route('login') }}">
                            <i class="fa fa-sign-in-alt"></i> Login
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
