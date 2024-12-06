<?= $this->extend('layouts/base') ?>
<?= $this->section('title') ?>Kelola Mobil<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola Data Mobil</h1>
        <a href="<?= base_url('admin/mobil/tambah') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-500"></i> Tambah</a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Mobil</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kendaraan</th>
                            <th>Nomor Kendaraan</th>
                            <th>Tipe Kendaraan</th>
                            <th>Harga per Hari (Rp)</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama Kendaraan</th>
                            <th>Nomor Kendaraan</th>
                            <th>Tipe Kendaraan</th>
                            <th>Harga per Hari (Rp)</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?= $no = 1; ?>
                        <?php foreach ($mobil as $m) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $m['nama_kendaraan']; ?></td>
                                <td><?= $m['nomber_kendaraan']; ?></td>
                                <td><?= $m['tipe_kendaraan']; ?></td>
                                <td><?= $m['harga_perhari']; ?></td>
                                <td><img src="<?= base_url('img/kendaraan/' . $m['gambar']) ?>" alt="Toyota Avanza" style="width: 200px; heigh:10px;"></td>
                                <td>
                                    <button>Edit</button>
                                    <button>Hapus</button>
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