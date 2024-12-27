<?= $this->extend('layouts/base') ?>
<?= $this->section('title') ?>Tambah User<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data User</h1>
    </div>
    <div class="mb-3">
        <div class="row">
            <div class="col-md-6">
                <h1 class="h3 d-inline align-middle">Data User</h1>
            </div>
            <div class="col-md-6">
                <div class="text-right">
                    <a href="<?= base_url('admin/user') ?>" class="btn btn-primary"><i class="fa fa-arrow-left fa-sm"></i> Kembali</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <form action="<?= base_url('admin/user/simpan') ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="card-body">
                        <?php if (session()->getFlashdata('errors')): ?>
                            <div class="alert alert-danger">
                                <i class="fa fa-exclamation-circle"></i> Ada kesalahan dalam pengisian form:
                                <ul class="mt-2">
                                    <?php foreach (session()->getFlashdata('errors') as $error): ?>
                                        <li><?= $error ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        <?php if (session()->getFlashdata('error')): ?>
                            <div class="alert alert-danger">
                                <i class="fa fa-exclamation-circle"></i> <?= session()->getFlashdata('error') ?>
                            </div>
                        <?php endif; ?>
                        <div class="form-group">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" required value="<?= old('nama') ?>">
                        </div>
                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control" required value="<?= old('email') ?>">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="sandi" class="form-label">Sandi</label>
                                <input type="password" name="sandi" id="sandi" class="form-control" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="sandi_konfirmasi" class="form-label">Konfirmasi Sandi</label>
                                <input type="password" name="sandi_konfirmasi" id="sandi_konfirmasi" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="role" class="form-label">Role</label>
                            <select name="role" id="role" class="form-control">
                                <option value="" selected>Pilih Role</option>
                                <option <?= (old('role') == 'admin') ? 'selected' : '' ?> value="admin">Admin</option>
                                <option <?= (old('role') == 'pelanggan') ? 'selected' : '' ?> value="pelanggan">Pelanggan</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="button" class="btn btn-primary" id="btnSubmit">
                            <i class="fa fa-save mr-2"></i>Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('btnSubmit').addEventListener('click', function() {
        Swal.fire({
            title: 'Apakah Anda yakin akan menyimpan data ini?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit form jika pengguna mengonfirmasi
                document.querySelector('form').submit();
            }
        });
    });
</script>
<?= $this->endSection() ?>