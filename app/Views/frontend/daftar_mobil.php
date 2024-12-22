<?= $this->extend('layouts-front/base') ?>
<?= $this->section('title') ?>Daftar Mobil<?= $this->endSection() ?>
<?= $this->section('content') ?>

<section class="py-2 mb-5 content">
    <div class="container text-center">
        <h1 class="fw-bold">Daftar Mobil</h1>
        <hr class="border border-dark mx-auto w-50 mb-5">
        <div class="row g-4 mb-4">
            <?php foreach ($mobil as $mob) : ?>
                <div class="col-md-4">
                    <div class="card h-100">
                        <img src="<?= base_url('img/kendaraan/' . $mob['gambar']) ?>" class="card-img-top" alt="<?= esc($mob['nama_kendaraan']) ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $mob['nama_kendaraan']; ?></h5>
                            <p class="card-text">Rp <?= number_format($mob['harga_perhari'], 0, ',', '.'); ?> / Hari</p>
                            <button
                                class="btn btn-primary w-100 btn-sewa"
                                data-is-logged-in="<?= $isLoggedIn ? 'true' : 'false' ?>"
                                data-login-url="<?= base_url('auth') ?>"
                                data-booking-url="<?= base_url('booking') ?>?id_kendaraan=<?= $mob['id_kendaraan']; ?>"
                                data-id-kendaraan="<?= $mob['id_kendaraan']; ?>">
                                Sewa sekarang
                            </button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?= $this->endSection() ?>