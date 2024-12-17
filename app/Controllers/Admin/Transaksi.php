<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TransaksiModels;

class Transaksi extends BaseController
{
    protected $transaksi;

    public function __construct()
    {
        $this->transaksi = new TransaksiModels();
    }

    public function index()
    {
        // Ambil data transaksi terbaru dari model
        $data['transaksi'] = $this->transaksi->getAll();

        // Kirim data ke view
        return view('admin/transaksi/index', $data);
    }
}
