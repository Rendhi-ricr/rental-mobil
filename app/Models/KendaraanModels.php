<?php

namespace App\Models;

use CodeIgniter\Model;

class KendaraanModels extends Model
{
    protected $table = 'tabel_kendaraan';
    protected $primaryKey = 'id_kendaraan';
    protected $allowedFields = ['nama_kendaraan', 'nomber_kendaraan', 'tipe_kendaraan', 'harga_perhari', 'gambar'];

    public function data_user($id_user)
    {
        return $this->find($id_user);
    }

    public function update_data($data, $id_user)
    {
        $query = $this->db->table($this->table)->update(
            $data,
            array('id_user' => $id_user)
        );
        return $query;
    }

    public function delete_data($id_user)
    {
        $query = $this->db->table($this->table)->delete(array('id_user' => $id_user));
        return $query;
    }
}
