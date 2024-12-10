<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModels extends Model
{
    protected $table = 'tabel_transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $allowedFields = ['id_user', 'id_kendaraan', 'tglsewa_mulai', 'tglsewa_akhir', 'total_harga'];
}
