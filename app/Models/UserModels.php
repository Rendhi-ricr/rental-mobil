<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModels extends Model
{
    protected $table = 'tabel_user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['nama', 'email', 'password', 'role'];

    // Fungsi untuk mendapatkan data user berdasarkan email
    public function getUserByEmail($email)
    {
        return $this->where('email', $email)->first();
    }
}
