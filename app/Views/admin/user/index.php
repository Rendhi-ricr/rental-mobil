<?= $this->extend('layouts/base') ?>
<?= $this->section('title') ?>Kelola User<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola Data User</h1>
        <a href="<?= base_url('admin/user/tambah') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-500"></i> Tambah</a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No Telepon</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No Telepon</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?= $no = 1 ?>
                        <?php foreach ($user as $u) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $u['nama'] ?></td>
                                <td><?= $u['email'] ?></td>
                                <td><?= $u['no_hp'] ?></td>
                                <td><?= $u['alamat'] ?></td>
                                <td>
                                    <a href="<?= base_url('admin/user/edit/' . $u['id_user']) ?>" class="btn btn-warning"><i class="fa fa-edit me-2"></i>Edit</a>
                                    <a href="<?= base_url('admin/user/delete/' . $u['id_user']) ?>" class="btn btn-danger"><i class="fa fa-trash me-2"></i>Hapus</a>
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