<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModels extends Model
{
    protected $table = 'tabel_transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $allowedFields = ['id_user', 'id_kendaraan', 'tglsewa_mulai', 'tglsewa_akhir', 'total_harga', 'keterangan'];

    public function getAll()
    {
        $builder = $this->db->table($this->table);
        $builder->join('tabel_user', 'tabel_user.id_user = tabel_transaksi.id_user')
            ->join('tabel_kendaraan', 'tabel_kendaraan.id_kendaraan = tabel_transaksi.id_kendaraan')
            ->orderBy('tabel_transaksi.tglsewa_mulai', 'DESC'); // Data terbaru di atas
        $query = $builder->get();
        return $query->getResult();
    }
}
