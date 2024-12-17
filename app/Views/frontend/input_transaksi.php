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
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control"></textarea>
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
                <!-- Denda -->
                <div class="mb-3">
                    <label for="penaltyFee" class="form-label">Denda</label>
                    <input type="text" class="form-control" id="penaltyFee" name="denda" readonly>
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
        const startDate = document.getElementById("startDate");
        const endDate = document.getElementById("endDate");
        const carSelect = document.getElementById("car");
        const totalPrice = document.getElementById("totalPrice");
        const penaltyFee = document.getElementById("penaltyFee");

        // Format angka ke Rupiah
        function formatRupiah(angka) {
            return new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR",
                minimumFractionDigits: 0
            }).format(angka);
        }

        // Hitung total harga sewa
        function calculateTotal() {
            const hargaPerhari = carSelect.selectedOptions[0]?.getAttribute("data-harga") || 0;
            const tglMulai = startDate.value ? new Date(startDate.value) : null;
            const tglAkhir = endDate.value ? new Date(endDate.value) : null;

            if (!tglMulai || !tglAkhir || tglMulai > tglAkhir) {
                totalPrice.value = "";
                return;
            }

            const diffTime = Math.abs(tglAkhir - tglMulai);
            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1;
            const total = diffDays * hargaPerhari;
            totalPrice.value = formatRupiah(total);
        }

        // Hitung denda berdasarkan harga mobil
        function calculatePenalty() {
            const hargaPerhari = carSelect.selectedOptions[0]?.getAttribute("data-harga") || 0;
            let denda = 0;

            if (hargaPerhari < 1000000) {
                denda = 100000;
            } else if (hargaPerhari < 2000000) {
                denda = 300000;
            } else if (hargaPerhari < 5000000) {
                denda = 500000;
            }

            penaltyFee.value = formatRupiah(denda);
        }

        // Event listeners
        startDate.addEventListener("change", calculateTotal);
        endDate.addEventListener("change", calculateTotal);
        carSelect.addEventListener("change", function() {
            calculateTotal();
            calculatePenalty();
        });
    });
</script>
<?= $this->endSection() ?>