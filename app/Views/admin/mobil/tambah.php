<?= $this->extend('layouts/base') ?>
<?= $this->section('title') ?>Tambah Kendaraan<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Kendaraan</h1>
    </div>
    <div class="mb-3">
        <div class="row">
            <div class="col-md-6">
                <h1 class="h3 d-inline align-middle">Data Kendaraan</h1>
            </div>
            <div class="col-md-6">
                <div class="text-right">
                    <a href="<?= base_url('admin/mobil') ?>" class="btn btn-primary"><i class="fa fa-arrow-left fa-sm"></i> Kembali</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <form action="<?= base_url('admin/mobil/simpan') ?>" method="post" enctype="multipart/form-data">
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
                            <label for="nama_kendaraan">Nama Kendaraan</label>
                            <input type="text" class="form-control" id="nama_kendaraan" name="nama_kendaraan" placeholder="Masukkan nama kendaraan">
                        </div>
                        <div class="form-group">
                            <label for="nomor_kendaraan">Nomor Kendaraan</label>
                            <input type="text" class="form-control" id="nomor_kendaraan" name="nomor_kendaraan" placeholder="Masukkan nomor kendaraan">
                        </div>
                        <div class="form-group">
                            <label for="tipe_kendaraan">Kategori</label>
                            <select name="tipe_kendaraan" class="form-control" id="tipe_kendaraan">
                                <option value="">Pilih Tipe Mobil</option>
                                <option value="Mobil SUV">Mobil SUV</option>
                                <option value="Mobil MPV">Mobil MPV</option>
                                <option value="Mobil Crossover">Mobil Crossover</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="harga_perhari">Harga Per Hari (Rp)</label>
                            <input type="number" class="form-control" id="harga_perhari" name="harga_perhari" placeholder="Masukkan harga per hari">
                        </div>
                        <div class="form-group">
                            <label for="gambar">Gambar Kendaraan</label>
                            <input type="file" class="form-control-file mb-3" id="gambar" name="gambar" accept="image/*">
                            <img id="preview" class="img-preview d-none" alt="Preview Gambar">
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save mr-2"></i>Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>