<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elha Rent Car</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .card img {
            height: 200px;
            /* Pastikan gambar memiliki tinggi konsisten */
            object-fit: cover;
            /* Mengisi area gambar tanpa merusak proporsi */
        }
    </style>

</head>

<body>
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

            <!-- Navbar Items -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#tentang-kami">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#daftar-mobil">Daftar Mobil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#histori-transaksi">Histori Transaksi</a>
                    </li>
                </ul>
                <!-- Login Button -->
                <div>
                    <a href="#login" class="btn btn-primary">Login</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Header -->
    <header class="bg-light text-center py-5">
        <div class="container">
            <h1 class="fw-bold">Kami Menyiapkan Mobil Untuk Perjalanan Anda</h1>
            <p class="mb-4">Kami memiliki banyak jenis mobil yang siap Anda bawa bepergian kemana saja dan kapan saja.</p>
            <div>
                <a href="#" class="btn btn-primary me-2">Hubungi Kami</a>
                <a href="#" class="btn btn-outline-primary">Mobil Kami</a>
            </div>
        </div>
    </header>

    <!-- Mobil Populer -->
    <section class="py-5">
        <div class="container text-center">
            <h2 class="fw-bold mb-3">Pilih Mobil yang Cocok untuk Anda</h2>
            <p class="mb-5">Kami menghadirkan mobil-mobil populer yang disewa oleh pelanggan untuk memaksimalkan kenyamanan Anda dalam perjalanan jauh.</p>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100">
                        <img src="<?= base_url('img/kendaraan/m1.png') ?>" class="card-img-top" alt="Lexus CT200H">
                        <div class="card-body">
                            <h5 class="card-title">Lexus CT200H</h5>
                            <p class="card-text">Rp 850.000 / Hari</p>
                            <p><i class="bi bi-geo-alt"></i> Bandung</p>
                            <a href="#" class="btn btn-primary">Sewa sekarang</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100">
                        <img src="<?= base_url('img/kendaraan/m2.png') ?>" class="card-img-top" style="width: 100%;" alt="Lexus CT200H"">
                        <div class=" card-body">
                        <h5 class="card-title">Audi R8</h5>
                        <p class="card-text">Rp 850.000 / Hari</p>
                        <p><i class="bi bi-geo-alt"></i> Bandung</p>
                        <a href="#" class="btn btn-primary">Sewa sekarang</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="BMW M3">
                    <div class="card-body">
                        <h5 class="card-title">BMW M3</h5>
                        <p class="card-text">Rp 850.000 / Hari</p>
                        <p><i class="bi bi-geo-alt"></i> Bandung</p>
                        <a href="#" class="btn btn-primary">Sewa sekarang</a>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <!-- Testimoni -->
    <section class="bg-light py-5">
        <div class="container text-center">
            <h2 class="fw-bold mb-5">Apa yang orang katakan tentang kita?</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card p-3">
                        <p class="mb-4">"Tidak salah memilih layanan rental mobil ini! Pelayanannya sangat ramah, mobilnya bersih dan terawat, serta proses penyewaan sangat cepat dan mudah."</p>
                        <div class="d-flex align-items-center">
                            <img src="https://via.placeholder.com/50" class="rounded-circle me-3" alt="User">
                            <div>
                                <h6 class="mb-0">Jacob Stevan</h6>
                                <small>Bandung</small>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Tambahkan testimoni lain sesuai kebutuhan -->
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-primary text-white text-center py-4">
        <div class="container">
            <p class="mb-0">elha rent car</p>
            <small>
                JL. Ki Hajar Dewantara, Dangdeur, Kabupaten Subang, Jawa Barat | +62 821 5332 233 | info@elharentcar.com | Senin - Minggu, 08:00 - 20:00
            </small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>