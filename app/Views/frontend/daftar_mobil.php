<?= $this->extend('layouts-front/base') ?>
<?= $this->section('title') ?>Daftar Mobil<?= $this->endSection() ?>
<?= $this->section('content') ?>

<section class="py-2 mb-5">
    <div class="container text-center">
        <h1 class="fw-bold">Daftar Mobil</h1>
        <hr class="border border-dark mx-auto w-50 mb-5">
        <div class="row g-4 mb-4">
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
<?= $this->endSection() ?>