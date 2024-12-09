<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand fw-bold text-primary" href="#">
            Elha Rent Car
        </a>

        <!-- Toggle Button for Mobile View -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <?php if (session()->get('isLoggedIn')): ?>
                    <!-- Menu untuk User yang Sudah Login -->
                    <li class="nav-item">
                        <a class="nav-link" href="#tentang-kami">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#daftar-mobil">Daftar Mobil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#histori-transaksi">Histori Transaksi</a>
                    </li>
                <?php else: ?>
                    <!-- Menu Default untuk User yang Belum Login -->
                    <li class="nav-item">
                        <a class="nav-link" href="#tentang-kami">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#daftar-mobil">Daftar Mobil</a>
                    </li>
                <?php endif; ?>
            </ul>

            <!-- Tombol Login/Logout -->
            <div>
                <?php if (session()->get('isLoggedIn')): ?>
                    <a href="<?= base_url('auth/logout') ?>" class="btn btn-primary">Logout</a>
                <?php else: ?>
                    <a href="<?= base_url('auth') ?>" class="btn btn-primary">Login</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>