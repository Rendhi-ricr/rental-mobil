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
                        <tr>
                            <td>1</td>
                            <td>Andi Pratama</td>
                            <td>Toyota Avanza</td>
                            <td>2024-12-01</td>
                            <td>2024-12-03</td>
                            <td>1,000,000</td>
                            <td>
                                <button>Edit</button>
                                <button>Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Budi Santoso</td>
                            <td>Honda Jazz</td>
                            <td>2024-12-02</td>
                            <td>2024-12-04</td>
                            <td>900,000</td>
                            <td>
                                <button>Edit</button>
                                <button>Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Citra Lestari</td>
                            <td>Suzuki Ertiga</td>
                            <td>2024-12-01</td>
                            <td>2024-12-05</td>
                            <td>1,920,000</td>
                            <td>
                                <button>Edit</button>
                                <button>Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Dian Purnama</td>
                            <td>Mitsubishi Pajero</td>
                            <td>2024-12-03</td>
                            <td>2024-12-06</td>
                            <td>2,700,000</td>
                            <td>
                                <button>Edit</button>
                                <button>Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Eva Susanti</td>
                            <td>Daihatsu Xenia</td>
                            <td>2024-12-02</td>
                            <td>2024-12-03</td>
                            <td>470,000</td>
                            <td>
                                <button>Edit</button>
                                <button>Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Fajar Rahman</td>
                            <td>Toyota Fortuner</td>
                            <td>2024-12-04</td>
                            <td>2024-12-06</td>
                            <td>2,000,000</td>
                            <td>
                                <button>Edit</button>
                                <button>Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>Gita Andayani</td>
                            <td>Honda Civic</td>
                            <td>2024-12-01</td>
                            <td>2024-12-02</td>
                            <td>750,000</td>
                            <td>
                                <button>Edit</button>
                                <button>Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>Hendra Putra</td>
                            <td>Nissan Livina</td>
                            <td>2024-12-03</td>
                            <td>2024-12-06</td>
                            <td>1,560,000</td>
                            <td>
                                <button>Edit</button>
                                <button>Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>Intan Permata</td>
                            <td>Toyota HiAce</td>
                            <td>2024-12-01</td>
                            <td>2024-12-04</td>
                            <td>3,600,000</td>
                            <td>
                                <button>Edit</button>
                                <button>Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>Joko Saputra</td>
                            <td>Hyundai Stargazer</td>
                            <td>2024-12-02</td>
                            <td>2024-12-05</td>
                            <td>1,800,000</td>
                            <td>
                                <button>Edit</button>
                                <button>Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td>11</td>
                            <td>Kiki Ramadhan</td>
                            <td>Suzuki Carry Pick-Up</td>
                            <td>2024-12-03</td>
                            <td>2024-12-04</td>
                            <td>400,000</td>
                            <td>
                                <button>Edit</button>
                                <button>Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td>12</td>
                            <td>Lina Wijaya</td>
                            <td>Isuzu Elf</td>
                            <td>2024-12-01</td>
                            <td>2024-12-03</td>
                            <td>3,000,000</td>
                            <td>
                                <button>Edit</button>
                                <button>Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td>13</td>
                            <td>Miko Prasetyo</td>
                            <td>Toyota Camry</td>
                            <td>2024-12-02</td>
                            <td>2024-12-04</td>
                            <td>1,700,000</td>
                            <td>
                                <button>Edit</button>
                                <button>Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td>14</td>
                            <td>Nina Kusuma</td>
                            <td>Mitsubishi Triton</td>
                            <td>2024-12-03</td>
                            <td>2024-12-06</td>
                            <td>2,100,000</td>
                            <td>
                                <button>Edit</button>
                                <button>Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td>15</td>
                            <td>Oki Nugroho</td>
                            <td>Wuling Confero</td>
                            <td>2024-12-01</td>
                            <td>2024-12-02</td>
                            <td>450,000</td>
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