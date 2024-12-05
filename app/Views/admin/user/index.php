<?= $this->extend('layouts/base') ?>
<?= $this->section('title') ?>Kelola User<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola Data User</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
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
                        <tr>
                            <td>1</td>
                            <td>John Doe</td>
                            <td>johndoe@example.com</td>
                            <td>081234567890</td>
                            <td>Jl. Merdeka No. 1</td>
                            <td>
                                <button>Edit</button>
                                <button>Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Jane Smith</td>
                            <td>janesmith@example.com</td>
                            <td>081234567891</td>
                            <td>Jl. Kebangsaan No. 2</td>
                            <td>
                                <button>Edit</button>
                                <button>Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Ali Akbar</td>
                            <td>ali.akbar@example.com</td>
                            <td>081234567892</td>
                            <td>Jl. Mawar No. 3</td>
                            <td>
                                <button>Edit</button>
                                <button>Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Aisyah Karim</td>
                            <td>aisyah.karim@example.com</td>
                            <td>081234567893</td>
                            <td>Jl. Melati No. 4</td>
                            <td>
                                <button>Edit</button>
                                <button>Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Budi Santoso</td>
                            <td>budi.santoso@example.com</td>
                            <td>081234567894</td>
                            <td>Jl. Anggrek No. 5</td>
                            <td>
                                <button>Edit</button>
                                <button>Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Citra Dewi</td>
                            <td>citra.dewi@example.com</td>
                            <td>081234567895</td>
                            <td>Jl. Kenanga No. 6</td>
                            <td>
                                <button>Edit</button>
                                <button>Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>Dani Firmansyah</td>
                            <td>dani.firmansyah@example.com</td>
                            <td>081234567896</td>
                            <td>Jl. Dahlia No. 7</td>
                            <td>
                                <button>Edit</button>
                                <button>Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>Eka Pratama</td>
                            <td>eka.pratama@example.com</td>
                            <td>081234567897</td>
                            <td>Jl. Flamboyan No. 8</td>
                            <td>
                                <button>Edit</button>
                                <button>Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>Fahmi Aziz</td>
                            <td>fahmi.aziz@example.com</td>
                            <td>081234567898</td>
                            <td>Jl. Cemara No. 9</td>
                            <td>
                                <button>Edit</button>
                                <button>Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>Gina Hapsari</td>
                            <td>gina.hapsari@example.com</td>
                            <td>081234567899</td>
                            <td>Jl. Cendana No. 10</td>
                            <td>
                                <button>Edit</button>
                                <button>Hapus</button>
                            </td>
                        </tr>
                        <!-- Tambahkan hingga data ke-30 -->
                        <tr>
                            <td>11</td>
                            <td>Hendra Kusuma</td>
                            <td>hendra.kusuma@example.com</td>
                            <td>081234567900</td>
                            <td>Jl. Jati No. 11</td>
                            <td>
                                <button>Edit</button>
                                <button>Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td>12</td>
                            <td>Indah Permata</td>
                            <td>indah.permata@example.com</td>
                            <td>081234567901</td>
                            <td>Jl. Pinus No. 12</td>
                            <td>
                                <button>Edit</button>
                                <button>Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td>13</td>
                            <td>Joko Widodo</td>
                            <td>joko.widodo@example.com</td>
                            <td>081234567902</td>
                            <td>Jl. Mahoni No. 13</td>
                            <td>
                                <button>Edit</button>
                                <button>Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td>14</td>
                            <td>Kartika Sari</td>
                            <td>kartika.sari@example.com</td>
                            <td>081234567903</td>
                            <td>Jl. Akasia No. 14</td>
                            <td>
                                <button>Edit</button>
                                <button>Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td>15</td>
                            <td>Laila Amalia</td>
                            <td>laila.amalia@example.com</td>
                            <td>081234567904</td>
                            <td>Jl. Beringin No. 15</td>
                            <td>
                                <button>Edit</button>
                                <button>Hapus</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>