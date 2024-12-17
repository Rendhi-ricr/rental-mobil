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

    public function acc($id_transaksi)
    {
        $transaksi = $this->transaksi = new TransaksiModels();
        // Update data transaksi, ubah keterangan menjadi "Mobil Sudah Diambil"
        $transaksi->update($id_transaksi, ['keterangan' => 'Mobil Sudah Diambil']);

        // Redirect kembali ke halaman transaksi dengan pesan sukses
        return redirect()->to(base_url('admin/transaksi'))->with('success', 'Transaksi berhasil di-ACC.');
    }
}
