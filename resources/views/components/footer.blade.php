<footer class="bg-dark text-light pt-5 pb-3 mt-5 shadow-lg">
    <div class="container">
        <div class="row align-items-start">

            <!-- Brand & Description -->
            <div class="col-md-6 mb-4">
                <h4 class="fw-bold mb-2">
                    <i class="fa fa-file-alt me-2 text-info"></i>Sistem Pelaporan
                </h4>
                <p class="text-ligth">
                    Platform digital untuk melaporkan permasalahan secara cepat, akurat, dan efisien.
                </p>
            </div>

            <!-- Quick Links -->
            <div class="col-md-3 mb-4">
                <h6 class="fw-bold text-uppercase text-info">Navigasi</h6>
                <ul class="list-unstyled mt-3">
                    <li><a href="/" class="footer-link">Beranda</a></li>
                    <li><a href="/laporan" class="footer-link">Laporkan Masalah</a></li>
                    <li><a href="/riwayat" class="footer-link">Riwayat</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="col-md-3 mb-4">
                <h6 class="fw-bold text-uppercase text-info">Kontak</h6>
                <ul class="list-unstyled mt-3">
                    <li><i class="fa fa-envelope me-2"></i> support@sistem.com</li>
                    <li><i class="fa fa-phone me-2"></i> +62 812 3456 7890</li>
                    <li><i class="fa fa-map-marker-alt me-2"></i> Pekanbaru, Indonesia</li>
                </ul>
            </div>
        </div>

        <hr class="border-secondary">

        <!-- Bottom -->
        <div class="text-center text-muted small mt-3">
            <div class="d-flex justify-content-center gap-3 mb-2">
                <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
            </div>

            <p class="mb-0 text-light">&copy; 2025 Sistem Pelaporan • All Rights Reserved</p>
            <p class="mb-0 text-light">Versi 1.0 • Last Updated: {{ date('d M Y') }}</p>
        </div>
    </div>
</footer>

<!-- Custom CSS -->
<style>
    footer {
        background: linear-gradient(180deg, #1c1c1c, #111);
    }

    .footer-link {
        color: #bbb;
        text-decoration: none;
        transition: 0.3s;
    }

    .footer-link:hover {
        color: #00d4ff;
        padding-left: 4px;
    }

    .social-link {
        color: #aaa;
        font-size: 1.1rem;
        transition: 0.3s;
    }

    .social-link:hover {
        color: #00d4ff;
        transform: scale(1.2);
    }
</style>
