<?= $this->extend('layouts/base') ?>
<?= $this->section('title') ?>Kelola Transaksi<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola Data Transaksi</h1>
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
                            <th>Nama Pelanggan</th>
                            <th>Nama Kendaraan</th>
                            <th>Tanggal Sewa</th>
                            <th>Tanggal Akhir Sewa</th>
                            <th>Total Harga (Rp)</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama Pelanggan</th>
                            <th>Nama Kendaraan</th>
                            <th>Tanggal Sewa</th>
                            <th>Tanggal Akhir Sewa</th>
                            <th>Total Harga (Rp)</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($transaksi as $key => $value) :
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $value->nama ?></td>
                                <td><?= $value->nama_kendaraan ?></td>
                                <td><?= $value->tglsewa_mulai ?></td>
                                <td><?= $value->tglsewa_akhir ?></td>
                                <td><?= $value->total_harga ?></td>
                                <td>
                                    <button>Selesai</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>