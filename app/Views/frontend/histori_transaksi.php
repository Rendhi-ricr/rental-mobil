<?= $this->extend('layouts-front/base') ?>
<?= $this->section('title') ?>Histori Transaksi<?= $this->endSection() ?>
<?= $this->section('content') ?>

<section class="py-5 d-flex flex-column min-vh-100">
    <div class="container">
        <h3 class="mb-5">Histori Transaksi <?= $nama; ?></h3>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kendaraan</th>
                    <th>Tanggal Sewa Mulai</th>
                    <th>Tanggal Sewa Akhir</th>
                    <th>Tanggal Dikembalikan</th>
                    <th>Denda</th>
                    <th>Telat Hari</th>
                    <th>Total Denda</th>
                    <th>Total Harga</th>
                    <th>Status Pengembalian</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($htransaksi as $h): ?>
                    <?php
                    // Hitung total harga + denda
                    $totalHargaDenda = $h->total_harga + $h->total_denda;
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $h->nama_kendaraan; ?></td>
                        <td><?= $h->tglsewa_mulai; ?></td>
                        <td><?= $h->tglsewa_akhir; ?></td>
                        <td><?= $h->tanggal_dikembalikan; ?></td>
                        <td>Rp <?= number_format($h->denda, 0, ',', '.'); ?></td>
                        <td><?= $h->telat_hari; ?> Hari</td>
                        <td>Rp <?= number_format($h->total_denda, 0, ',', '.'); ?></td>
                        <td>Rp <?= number_format($totalHargaDenda, 0, ',', '.'); ?></td>
                        <td>
                            <?php if ($h->tanggal_dikembalikan == 0000 - 00 - 00): ?>
                                Belum Dikembalikan
                            <?php else: ?>
                                Sudah Dikembalikan
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
<?= $this->endSection() ?>