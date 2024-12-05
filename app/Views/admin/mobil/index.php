<?= $this->extend('layouts/base') ?>
<?= $this->section('title') ?>Kelola Mobil<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelola Data Mobil</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
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
                        <tr>
                            <td>1</td>
                            <td>Toyota Avanza</td>
                            <td>B 1234 XYZ</td>
                            <td>MPV</td>
                            <td>500,000</td>
                            <td><img src="https://via.placeholder.com/100x60" alt="Toyota Avanza"></td>
                            <td>
                                <button>Edit</button>
                                <button>Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Honda Jazz</td>
                            <td>B 5678 ABC</td>
                            <td>Hatchback</td>
                            <td>450,000</td>
                            <td><img src="https://via.placeholder.com/100x60" alt="Honda Jazz"></td>
                            <td>
                                <button>Edit</button>
                                <button>Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Suzuki Ertiga</td>
                            <td>B 8765 CDE</td>
                            <td>MPV</td>
                            <td>480,000</td>
                            <td><img src="https://via.placeholder.com/100x60" alt="Suzuki Ertiga"></td>
                            <td>
                                <button>Edit</button>
                                <button>Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Mitsubishi Pajero</td>
                            <td>B 3456 FGH</td>
                            <td>SUV</td>
                            <td>900,000</td>
                            <td><img src="https://via.placeholder.com/100x60" alt="Mitsubishi Pajero"></td>
                            <td>
                                <button>Edit</button>
                                <button>Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Daihatsu Xenia</td>
                            <td>B 2345 GHI</td>
                            <td>MPV</td>
                            <td>470,000</td>
                            <td><img src="https://via.placeholder.com/100x60" alt="Daihatsu Xenia"></td>
                            <td>
                                <button>Edit</button>
                                <button>Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Toyota Fortuner</td>
                            <td>B 5432 JKL</td>
                            <td>SUV</td>
                            <td>1,000,000</td>
                            <td><img src="https://via.placeholder.com/100x60" alt="Toyota Fortuner"></td>
                            <td>
                                <button>Edit</button>
                                <button>Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>Honda Civic</td>
                            <td>B 6789 MNO</td>
                            <td>Sedan</td>
                            <td>750,000</td>
                            <td><img src="https://via.placeholder.com/100x60" alt="Honda Civic"></td>
                            <td>
                                <button>Edit</button>
                                <button>Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>Nissan Livina</td>
                            <td>B 1122 PQR</td>
                            <td>MPV</td>
                            <td>520,000</td>
                            <td><img src="https://via.placeholder.com/100x60" alt="Nissan Livina"></td>
                            <td>
                                <button>Edit</button>
                                <button>Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>Toyota HiAce</td>
                            <td>B 2211 STU</td>
                            <td>Van</td>
                            <td>1,200,000</td>
                            <td><img src="https://via.placeholder.com/100x60" alt="Toyota HiAce"></td>
                            <td>
                                <button>Edit</button>
                                <button>Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>Hyundai Stargazer</td>
                            <td>B 3344 VWX</td>
                            <td>MPV</td>
                            <td>600,000</td>
                            <td><img src="https://via.placeholder.com/100x60" alt="Hyundai Stargazer"></td>
                            <td>
                                <button>Edit</button>
                                <button>Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td>11</td>
                            <td>Suzuki Carry Pick-Up</td>
                            <td>B 4455 YZA</td>
                            <td>Pick-Up</td>
                            <td>400,000</td>
                            <td><img src="https://via.placeholder.com/100x60" alt="Suzuki Carry Pick-Up"></td>
                            <td>
                                <button>Edit</button>
                                <button>Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td>12</td>
                            <td>Isuzu Elf</td>
                            <td>B 5566 BCD</td>
                            <td>Minibus</td>
                            <td>1,500,000</td>
                            <td><img src="https://via.placeholder.com/100x60" alt="Isuzu Elf"></td>
                            <td>
                                <button>Edit</button>
                                <button>Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td>13</td>
                            <td>Toyota Camry</td>
                            <td>B 6677 EFG</td>
                            <td>Sedan</td>
                            <td>850,000</td>
                            <td><img src="https://via.placeholder.com/100x60" alt="Toyota Camry"></td>
                            <td>
                                <button>Edit</button>
                                <button>Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td>14</td>
                            <td>Mitsubishi Triton</td>
                            <td>B 7788 HIJ</td>
                            <td>Pick-Up</td>
                            <td>700,000</td>
                            <td><img src="https://via.placeholder.com/100x60" alt="Mitsubishi Triton"></td>
                            <td>
                                <button>Edit</button>
                                <button>Hapus</button>
                            </td>
                        </tr>
                        <tr>
                            <td>15</td>
                            <td>Wuling Confero</td>
                            <td>B 8899 KLM</td>
                            <td>MPV</td>
                            <td>450,000</td>
                            <td><img src="https://via.placeholder.com/100x60" alt="Wuling Confero"></td>
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