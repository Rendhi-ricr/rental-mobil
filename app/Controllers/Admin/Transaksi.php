<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TransaksiModels;

class Transaksi extends BaseController
{
    protected $transaksi;
    public function __construct()
    {
        $this->transaksi = new transaksiModels();
    }

    public function index()
    {
        $data['transaksi'] = $this->transaksi->getAll();
        return view('admin/transaksi/index', $data);
    }
}
