<?php

namespace App\Controllers;

use App\Models\KendaraanModels;

class Home extends BaseController
{
    protected $mobil;

    public function __construct()
    {
        $this->mobil = new KendaraanModels();
    }

    public function index()
    {
        // Ambil 3 mobil dengan transaksi terbanyak
        $mobilPopuler = $this->mobil->getTopKendaraan(3);

        $data = [
            'mobil' => $mobilPopuler, // Hanya 3 mobil populer
            'isLoggedIn' => session()->has('id_user'),
        ];

        return view('frontend/home', $data);
    }
}
