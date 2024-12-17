<?php

namespace App\Models;

use CodeIgniter\Model;

class HistoriTransaksiModels extends Model
{
    protected $table = 'tabel_histori_transaksi';
    protected $primaryKey = 'id_histori_transaksi';
    protected $allowedFields = ['id_transaksi', 'tanggal_dikembalikan', 'telat_hari', 'total_denda'];
}
