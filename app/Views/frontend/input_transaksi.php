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
                    <textarea name="alamat" id="alamat" class="form-control" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="no_hp" class="form-label">Nomor Handphone</label>
                    <input type="number" class="form-control" id="no_hp" name="no_hp">
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
                    <label for="penaltyFee" class="form-label">Denda /Hari <small class="text-danger">*Denda aktif jika telat mengembalikan mobil dari perjanjian sebelumnya</small></label>
                    <input type="text" class="form-control" id="penaltyFee" name="denda" readonly>
                </div>
                <!-- Tombol Submit -->
                <div class="d-grid">
                    <button type="button" id="btnSubmit" class="btn btn-primary">Sewa Sekarang</button>
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

        // Format angka ke dalam bentuk Rupiah
        function formatRupiah(angka) {
            return new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR",
                minimumFractionDigits: 0,
            }).format(angka);
        }

        // Hapus format Rupiah ke angka murni
        function parseRupiahToNumber(value) {
            return parseInt(value.replace(/[^0-9]/g, ""), 10) || 0;
        }

        // Hitung total harga sewa
        function calculateTotal() {
            const hargaPerhari = parseInt(carSelect.selectedOptions[0]?.getAttribute("data-harga") || 0, 10);
            const tglMulai = startDate.value ? new Date(startDate.value) : null;
            const tglAkhir = endDate.value ? new Date(endDate.value) : null;

            if (!tglMulai || !tglAkhir || tglMulai > tglAkhir) {
                totalPrice.value = "";
                return;
            }

            const diffTime = Math.abs(tglAkhir - tglMulai);
            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1; // Hari dihitung termasuk hari mulai
            const total = diffDays * hargaPerhari;

            totalPrice.value = formatRupiah(total); // Format ke Rupiah untuk tampilan
            totalPrice.dataset.rawValue = total; // Simpan nilai mentah untuk dikirim ke server
        }

        // Hitung denda berdasarkan harga mobil
        function calculatePenalty() {
            const hargaPerhari = parseInt(carSelect.selectedOptions[0]?.getAttribute("data-harga") || 0, 10);
            let denda = 0;

            if (hargaPerhari < 1000000) {
                denda = 100000;
            } else if (hargaPerhari < 2000000) {
                denda = 300000;
            } else if (hargaPerhari < 5000000) {
                denda = 500000;
            }

            penaltyFee.value = formatRupiah(denda); // Format ke Rupiah untuk tampilan
            penaltyFee.dataset.rawValue = denda; // Simpan nilai mentah untuk dikirim ke server
        }

        // Trigger calculations on page load if a car is pre-selected
        if (carSelect.value) {
            calculatePenalty();
        }

        // Event listeners
        startDate.addEventListener("change", calculateTotal);
        endDate.addEventListener("change", calculateTotal);
        carSelect.addEventListener("change", function() {
            calculateTotal();
            calculatePenalty();
        });

        // Validasi sebelum submit
        document.querySelector("form").addEventListener("submit", function(event) {
            if (!penaltyFee.value || !totalPrice.value) {
                event.preventDefault();
                alert("Denda atau total harga belum dihitung. Pastikan data sudah lengkap.");
            } else {
                totalPrice.value = totalPrice.dataset.rawValue || 0; // Kirim nilai mentah
                penaltyFee.value = penaltyFee.dataset.rawValue || 0; // Kirim nilai mentah
            }
        });

        // SweetAlert konfirmasi submit
        const form = document.getElementById("formTransaksi");
        const btnSubmit = document.getElementById("btnSubmit");

        btnSubmit.addEventListener("click", function() {
            Swal.fire({
                title: 'Konfirmasi Transaksi',
                text: "Apakah Anda yakin ingin menyewa mobil ini?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Sewa Sekarang!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Pastikan nilai mentah dikirim sebelum submit
                    totalPrice.value = totalPrice.dataset.rawValue || 0;
                    penaltyFee.value = penaltyFee.dataset.rawValue || 0;
                    form.submit();
                }
            });
        });

    });
</script>
<?= $this->endSection() ?>