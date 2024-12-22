<?= $this->extend('layouts/base') ?>
<?= $this->section('title') ?>Histori Transaksi<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php elseif (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Histori Transaksi</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-500"></i> Tambah</a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Transaksi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Histori Transaksi</th>
                            <th>ID Transaksi</th>
                            <th>Tanggal Dikembalikan</th>
                            <th>Telat Hari</th>
                            <th>Total Denda</th>
                            <th>ID User</th>
                            <th>ID Kendaraan</th>
                            <th>Tanggal Sewa Mulai</th>
                            <th>Tanggal Sewa Akhir</th>
                            <th>Total Harga</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>ID Histori Transaksi</th>
                            <th>ID Transaksi</th>
                            <th>Tanggal Dikembalikan</th>
                            <th>Telat Hari</th>
                            <th>Total Denda</th>
                            <th>ID User</th>
                            <th>ID Kendaraan</th>
                            <th>Tanggal Sewa Mulai</th>
                            <th>Tanggal Sewa Akhir</th>
                            <th>Total Harga</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php if (!empty($historiTransaksi)): ?>
                            <?php foreach ($historiTransaksi as $index => $item): ?>
                                <tr>
                                    <td><?= $index + 1 ?></td>
                                    <td><?= esc($item['id_histori_transaksi']) ?></td>
                                    <td><?= esc($item['id_transaksi']) ?></td>
                                    <td><?= esc($item['tanggal_dikembalikan']) ?></td>
                                    <td><?= esc($item['telat_hari']) ?> hari</td>
                                    <td>Rp<?= number_format($item['total_denda'], 0, ',', '.') ?></td>
                                    <td><?= esc($item['id_user']) ?></td>
                                    <td><?= esc($item['id_kendaraan']) ?></td>
                                    <td><?= esc($item['tglsewa_mulai']) ?></td>
                                    <td><?= esc($item['tglsewa_akhir']) ?></td>
                                    <td>Rp<?= number_format($item['total_harga'], 0, ',', '.') ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="11" class="text-center">Tidak ada data histori transaksi</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- <script>
    function confirmAcc(id) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data transaksi akan di-ACC!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, ACC sekarang!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect ke URL aksi Acc
                window.location.href = "<?= base_url('admin/transaksi/acc/') ?>" + id;
            }
        })
    }

    function selesai(id) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Data transaksi diselesaikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Selesaikan sekarang!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect ke URL aksi Acc
                window.location.href = "<?= base_url('admin/transaksi/selesaiTransaksi/') ?>" + id;
            }
        })
    }
</script> -->

<?= $this->endSection() ?>