<?php

namespace App\Controllers;

use App\Models\KendaraanModels;

class Booking extends BaseController
{
    protected $mobil;

    public function __construct()
    {
        $this->mobil = new KendaraanModels();
    }

    public function index()
    {
        $mobil = $this->mobil->findAll();
        $nama = session()->get('nama');
        $alamat = session()->get('alamat');
        $data = [
            'mobil' => $mobil,
            'nama' => $nama,
            'alamat' => $alamat
        ];
        return view('frontend/input_transaksi', $data);
    }
}
