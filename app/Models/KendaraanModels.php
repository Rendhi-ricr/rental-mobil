<?php

namespace App\Models;

use CodeIgniter\Model;

class KendaraanModels extends Model
{
    protected $table = 'tabel_kendaraan';
    protected $primaryKey = 'id_kendaraan';
    protected $allowedFields = ['nama_kendaraan', 'nomber_kendaraan', 'tipe_kendaraan', 'harga_perhari', 'gambar'];

    public function data_kendaraan($id_kendaraan)
    {
        return $this->find($id_kendaraan);
    }

    public function update_data($data, $id_kendaraan)
    {
        $query = $this->db->table($this->table)->update(
            $data,
            array('id_kendaraan' => $id_kendaraan)
        );
        return $query;
    }

    public function delete_data($id_kendaraan)
    {
        $query = $this->db->table($this->table)->delete(array('id_kendaraan' => $id_kendaraan));
        return $query;
    }

    public function getTopKendaraan($limit = 3)
    {
        return $this->select('tabel_kendaraan.*, COUNT(tabel_transaksi.id_transaksi) AS total_transaksi')
            ->join('tabel_transaksi', 'tabel_transaksi.id_kendaraan = tabel_kendaraan.id_kendaraan', 'left')
            ->groupBy('tabel_kendaraan.id_kendaraan')
            ->orderBy('total_transaksi', 'DESC')
            ->limit((int) $limit)
            ->get()
            ->getResultArray();
    }
}
