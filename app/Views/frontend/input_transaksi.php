<?= $this->extend('layouts-front/base') ?>
<?= $this->section('title') ?>Booking<?= $this->endSection() ?>
<?= $this->section('content') ?>
<section class="py-5">
    <div class="container">
        <div class="form-container">
            <h3 class="text-center text-primary fw-bold mb-4">Formulir Transaksi</h3>
            <form action="<?= base_url('booking/simpan') ?>" method="post" id="formTransaksi">
                <?= csrf_field() ?>
                <!-- Nama -->
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="nama" value="<?= $nama ?>" readonly>
                </div>
                <!-- Alamat -->
                <div class="mb-3">
                    <label for="address" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="address" name="alamat" value="<?= $alamat ?>" readonly>
                </div>
                <!-- Tanggal Mulai Sewa -->
                <div class="mb-3">
                    <label for="startDate" class="form-label">Tanggal Mulai Sewa</label>
                    <input type="date" class="form-control" id="startDate" name="tglsewa_mulai" required>
                </div>
                <!-- Tanggal Akhir Sewa -->
                <div class="mb-3">
                    <label for="endDate" class="form-label">Tanggal Akhir Sewa</label>
                    <input type="date" class="form-control" id="endDate" name="tglsewa_akhir" required>
                </div>
                <!-- Pilih Mobil -->
                <div class="mb-3">
                    <label for="car" class="form-label">Pilih Mobil</label>
                    <select name="id_kendaraan" class="form-select" id="car" required>
                        <option value="">Pilih Mobil</option>
                        <?php foreach ($mobil as $m) : ?>
                            <option value="<?= $m['id_kendaraan']; ?>"
                                data-harga="<?= $m['harga_perhari']; ?>"
                                <?= isset($selectedMobil) && $selectedMobil['id_kendaraan'] == $m['id_kendaraan'] ? 'selected' : '' ?>>
                                <?= $m['nama_kendaraan']; ?> - Rp <?= number_format($m['harga_perhari'], 0, ',', '.'); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <!-- Total Harga -->
                <div class="mb-3">
                    <label for="totalPrice" class="form-label">Total Harga</label>
                    <input type="text" class="form-control" id="totalPrice" name="total_harga" readonly>
                </div>
                <!-- Tombol Submit -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Sewa Sekarang</button>
                </div>
            </form>
        </div>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const startDate = document.getElementById("startDate"); // Input tanggal mulai sewa
        const endDate = document.getElementById("endDate"); // Input tanggal akhir sewa
        const carSelect = document.getElementById("car"); // Dropdown pilihan mobil
        const totalPrice = document.getElementById("totalPrice"); // Input total harga

        function calculateTotal() {
            const hargaPerhari = carSelect.selectedOptions[0]?.getAttribute("data-harga") || 0;
            // Mendapatkan harga per hari dari mobil yang dipilih
            const tglMulai = new Date(startDate.value);
            const tglAkhir = new Date(endDate.value);

            if (tglMulai && tglAkhir && tglMulai <= tglAkhir) {
                const diffTime = Math.abs(tglAkhir - tglMulai);
                const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1;
                // Menghitung jumlah hari termasuk hari pertama dan terakhir
                totalPrice.value = diffDays * hargaPerhari; // Menghitung total harga
            } else {
                totalPrice.value = ""; // Kosongkan total harga jika validasi gagal
            }
        }

        // Event Listener untuk memicu perhitungan saat input berubah
        startDate.addEventListener("change", calculateTotal);
        endDate.addEventListener("change", calculateTotal);
        carSelect.addEventListener("change", calculateTotal);
    });
</script>
<?= $this->endSection() ?>