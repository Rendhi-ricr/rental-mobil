<?= $this->extend('layouts-front/base') ?>
<?= $this->section('title') ?>Beranda<?= $this->endSection() ?>
<?= $this->section('content') ?>

<section class="py-5">
    <div class="container">
        <section class="container py-5">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="fw-bold">Kami Menyiapkan Mobil Untuk Perjalanan Anda</h1>
                    <p class="mt-3 text-muted">
                        Kami memiliki banyak jenis mobil yang siap Anda bawa bepergian ke mana saja dan kapan saja.
                    </p>
                    <div class="mt-4">
                        <a href="#" class="btn btn-primary me-2">Hubungi Kami</a>
                        <a href="#" class="btn btn-outline-primary">Mobil Kami</a>
                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <img src="<?= base_url('img/mobil_header.png') ?>" alt="Mobil Biru" class="img-fluid" style="max-width: 100%;">
                </div>
            </div>
        </section>

        <section class="container py-5">
            <div class="text-center mb-5">
                <h6 class="text-primary">MOBIL POPULER</h6>
                <h2 class="fw-bold">Pilih Mobil yang Cocok untuk Anda</h2>
                <p class="text-muted">Kami menghadirkan mobil-mobil populer yang disewa oleh pelanggan untuk memaksimalkan kenyamanan Anda dalam perjalanan jauh.</p>
            </div>
            <div class="row">
                <?php
                foreach ($mobil as $m) : ?>
                    <!-- Card 1 -->
                    <div class="col-md-4 mb-4">
                        <div class="card text-center">
                            <img src="<?= base_url('img/kendaraan/' . $m['gambar']) ?>" alt="<?= $m['nama_kendaraan'] ?>">
                            <div class="card-body">
                                <h5 class="card-title fw-bold"><?= $m['nama_kendaraan']; ?></h5>
                                <p class="text-primary fw-bold mb-1">Rp <?= $m['harga_perhari']; ?><span class="text-muted fw-normal">/Hari</span></p>
                                <a href="<?= base_url('booking') ?>" class="btn btn-primary w-100">Sewa sekarang</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>


    </div>
</section>
<?= $this->endSection() ?>