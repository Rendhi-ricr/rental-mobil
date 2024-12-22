<?php

namespace App\Models;

use CodeIgniter\Model;

class HistoriTransaksiModels extends Model
{
    protected $table = 'tabel_histori_transaksi';
    protected $primaryKey = 'id_histori_transaksi';
    protected $allowedFields = [
        'id_transaksi',
        'tanggal_dikembalikan',
        'telat_hari',
        'total_denda'
    ];

    public function getHistoriTransaksi()
    {
        return $this->db->table($this->table)
            ->select('
                tabel_histori_transaksi.id_histori_transaksi, 
                tabel_histori_transaksi.id_transaksi, 
                tabel_histori_transaksi.tanggal_dikembalikan, 
                tabel_histori_transaksi.telat_hari, 
                tabel_histori_transaksi.total_denda, 
                tabel_transaksi.id_user, 
                tabel_transaksi.id_kendaraan, 
                tabel_transaksi.tglsewa_mulai, 
                tabel_transaksi.tglsewa_akhir, 
                tabel_transaksi.total_harga
            ')
            ->join('tabel_transaksi', 'tabel_transaksi.id_transaksi = tabel_histori_transaksi.id_transaksi')
            ->get()
            ->getResultArray();
    }
}
