<?= $this->extend('layouts/base') ?>
<?= $this->section('title') ?>Kelola Transaksi<?= $this->endSection() ?>
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
        <h1 class="h3 mb-0 text-gray-800">Kelola Data Transaksi</h1>
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
                            <th>Nama Pelanggan</th>
                            <th>Alamat</th>
                            <th>No Telpon</th>
                            <th>Nama Kendaraan</th>
                            <th>Tanggal Sewa</th>
                            <th>Tanggal Akhir Sewa</th>
                            <th>Total Harga (Rp)</th>
                            <th>Denda</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama Pelanggan</th>
                            <th>Alamat</th>
                            <th>No Telpon</th>
                            <th>Nama Kendaraan</th>
                            <th>Tanggal Sewa</th>
                            <th>Tanggal Akhir Sewa</th>
                            <th>Total Harga (Rp)</th>
                            <th>Denda</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $no = 1; // Inisialisasi nomor
                        foreach ($transaksi as $key => $value) : // Loop data transaksi
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $value->nama ?></td>
                                <td><?= $value->alamat ?></td>
                                <td><?= $value->no_hp ?></td>
                                <td><?= $value->nama_kendaraan ?></td>
                                <td><?= date('d-m-Y', strtotime($value->tglsewa_mulai)) ?></td>
                                <td><?= date('d-m-Y', strtotime($value->tglsewa_akhir)) ?></td>
                                <td>Rp <?= number_format($value->total_harga, 0, ',', '.'); ?></td>
                                <td>Rp <?= number_format($value->denda, 0, ',', '.');  ?></td>
                                <td><?= $value->keterangan ?></td>
                                <?php if ($value->keterangan === 'Mobil Belum Diambil'): ?>
                                    <td>
                                        <a href="javascript:void(0);" onclick="confirmAcc('<?= $value->id_transaksi ?>')" class="btn btn-primary btn-sm">
                                            Acc
                                        </a>
                                    </td>
                                <?php elseif ($value->keterangan === 'Mobil Sudah Diambil'): ?>
                                    <td>
                                        <a href="javascript:void(0);" onclick="selesai('<?= $value->id_transaksi ?>')" class="btn btn-success btn-sm">
                                            Selesai
                                        </a>
                                    </td>
                                <?php endif; ?>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
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
</script>

<?= $this->endSection() ?>