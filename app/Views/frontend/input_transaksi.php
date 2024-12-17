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
        const formTransaksi = document.getElementById("formTransaksi");

        function formatRupiah(angka) {
            return new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR",
                minimumFractionDigits: 0
            }).format(angka);
        }

        function calculateTotal() {
            const hargaPerhari = carSelect.selectedOptions[0]?.getAttribute("data-harga") || 0;
            const tglMulai = startDate.value ? new Date(startDate.value) : null;
            const tglAkhir = endDate.value ? new Date(endDate.value) : null;

            if (!tglMulai || !tglAkhir) {
                totalPrice.value = "";
                return;
            }

            if (tglMulai <= tglAkhir) {
                const diffTime = Math.abs(tglAkhir - tglMulai);
                const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1;
                const total = diffDays * hargaPerhari;
                totalPrice.value = formatRupiah(total);
            } else {
                totalPrice.value = "";
            }
        }

        startDate.addEventListener("change", calculateTotal);
        endDate.addEventListener("change", calculateTotal);
        carSelect.addEventListener("change", calculateTotal);

        // Event listener untuk form submission
        // formTransaksi.addEventListener("submit", function(event) {
        //     event.preventDefault(); // Mencegah submit form default

        //     // Ambil data untuk WhatsApp
        //     const nama = document.getElementById("name").value;
        //     const alamat = document.getElementById("address").value;
        //     const tglMulai = startDate.value;
        //     const tglAkhir = endDate.value;
        //     const mobil = carSelect.selectedOptions[0]?.text || "";
        //     const total = totalPrice.value;

        //     // Tampilkan SweetAlert
        //     Swal.fire({
        //         title: "Sukses!",
        //         text: "Transaksi berhasil, ingin melanjutkan ke WhatsApp?",
        //         icon: "success",
        //         showCancelButton: true,
        //         confirmButtonText: "Ya, Lanjutkan",
        //         cancelButtonText: "Tidak",
        //     }).then((result) => {
        //         if (result.isConfirmed) {
        //             const waLink = `https://wa.me/6285222258509`;

        //             // Arahkan ke WhatsApp
        //             window.location.href = waLink;
        //         }
        //     });
        // });
    });
</script>

<?= $this->endSection() ?>