<?= $this->extend('layouts-front/base') ?>
<?= $this->section('title') ?>Booking<?= $this->endSection() ?>
<?= $this->section('content') ?>
<section class="py-5">
    <div class="container">
        <div class="form-container">
            <h3 class="text-center text-primary fw-bold mb-4">Formulir Transaksi</h3>
            <form>
                <!-- Nama -->
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" placeholder="Tulis namamu...">
                </div>
                <!-- Alamat -->
                <div class="mb-3">
                    <label for="address" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="address" placeholder="Alamat..">
                </div>
                <!-- Tanggal Mulai Sewa -->
                <div class="mb-3">
                    <label for="startDate" class="form-label">Tanggal Mulai Sewa</label>
                    <input type="date" class="form-control" id="startDate">
                </div>
                <!-- Tanggal Akhir Sewa -->
                <div class="mb-3">
                    <label for="endDate" class="form-label">Tanggal Akhir Sewa</label>
                    <input type="date" class="form-control" id="endDate">
                </div>
                <!-- Pilih Mobil -->
                <div class="mb-3">
                    <label for="car" class="form-label">Pilih Mobil</label>
                    <select class="form-select" id="car">
                        <option selected>BMW M3</option>
                        <option>Lexus CT200H</option>
                        <option>Audi R8</option>
                    </select>
                </div>
                <!-- Tombol Submit -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Sewa Sekarang</button>
                </div>
            </form>
        </div>
    </div>
</section>
<?= $this->endSection() ?>