<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModels extends Model
{
    protected $table = 'tabel_transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $allowedFields = ['id_user', 'id_kendaraan', 'tglsewa_mulai', 'tglsewa_akhir', 'total_harga', 'denda', 'tanggal_dikembalikan', 'telat_hari', 'total_denda', 'keterangan'];

    public function getAll($ket)
    {
        $builder = $this->db->table($this->table);
        $builder->join('tabel_user', 'tabel_user.id_user = tabel_transaksi.id_user')
            ->join('tabel_kendaraan', 'tabel_kendaraan.id_kendaraan = tabel_transaksi.id_kendaraan')
            ->whereIn('keterangan', $ket) // Filter berdasarkan keterangan
            ->orderBy('tabel_transaksi.tglsewa_mulai', 'DESC'); // Data terbaru di atas
        $query = $builder->get();
        return $query->getResult();
    }

    public function TransaksiBerdasarkanUser()
    {
        $builder = $this->db->table($this->table);
        $builder->join('tabel_user', 'tabel_user.id_user = tabel_transaksi.id_user')
            ->join('tabel_kendaraan', 'tabel_kendaraan.id_kendaraan = tabel_transaksi.id_kendaraan')
            ->where('tabel_transaksi.id_user', session()->get('id_user')) // Filter berdasarkan ID User
            ->orderBy('tabel_transaksi.tglsewa_mulai', 'DESC'); // Urutkan berdasarkan tanggal sewa mulai terbaru
        // Tambahkan kolom untuk total harga + denda
        $builder->select('tabel_transaksi.*, tabel_kendaraan.nama_kendaraan, (total_harga + denda) AS total_harga_denda');
        $query = $builder->get();
        return $query->getResult();
    }
}
