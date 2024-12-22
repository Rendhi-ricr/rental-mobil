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
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Histori Transaksi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pelanggan</th>
                            <th>Nama Kendaraan</th>
                            <th>Tanggal Sewa</th>
                            <th>Tanggal Akhir Sewa</th>
                            <th>Tanggal Dikembalikan</th>
                            <th>Telat Hari</th>
                            <th>Total Denda</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama Pelanggan</th>
                            <th>Nama Kendaraan</th>
                            <th>Tanggal Sewa</th>
                            <th>Tanggal Akhir Sewa</th>
                            <th>Tanggal Dikembalikan</th>
                            <th>Telat Hari</th>
                            <th>Total Denda</th>
                            <th>Keterangan</th>
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
                                <td><?= $value->nama_kendaraan ?></td>
                                <td><?= date('d-m-Y', strtotime($value->tglsewa_mulai)) ?></td>
                                <td><?= date('d-m-Y', strtotime($value->tglsewa_akhir)) ?></td>
                                <td><?= date('d-m-Y', strtotime($value->tanggal_dikembalikan)) ?></td>
                                <td><?= $value->telat_hari; ?> Hari</td>
                                <td>Rp <?= number_format($value->total_denda, 0, ',', '.');  ?></td>
                                <td><?= $value->keterangan ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>