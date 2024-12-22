<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TransaksiModels;

class Transaksi extends BaseController
{
    protected $transaksi,
        $histori;

    public function __construct()
    {
        $this->transaksi = new TransaksiModels();
    }

    public function index()
    {
        // Ambil data transaksi terbaru dari model
        $data['transaksi'] = $this->transaksi->getAll(['Mobil Belum Diambil', 'Mobil Sudah Diambil']);

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

    public function selesaiTransaksi($id_transaksi)
    {
        // Ambil data transaksi berdasarkan id_transaksi
        $transaksi = $this->transaksi->find($id_transaksi);

        if (!$transaksi) {
            return redirect()->back()->with('error', 'Data transaksi tidak ditemukan!');
        }

        // Hitung tanggal dikembalikan dan keterlambatan
        $tanggalDikembalikan = date('Y-m-d');
        $tanggalAkhirSewa = $transaksi['tglsewa_akhir'];
        $diff = strtotime($tanggalDikembalikan) - strtotime($tanggalAkhirSewa);
        $telatHari = ($diff > 0) ? floor($diff / (60 * 60 * 24)) : 0;

        // Hitung total denda
        $dendaPerHari = $transaksi['denda']; // Kolom denda harus ada di tabel transaksi
        $totalDenda = $telatHari * $dendaPerHari;

        // Masukkan data ke tabel_histori_transaksi
        $data = [
            'tanggal_dikembalikan' => $tanggalDikembalikan,
            'telat_hari' => $telatHari,
            'total_denda' => $totalDenda,
            'keterangan' => "Transaksi Selesai",
        ];
        $this->transaksi->update($id_transaksi, $data);

        return redirect()->back()->with('success', 'Transaksi Telah Diselesaikan');
    }

    public function HTransaksi()
    {
        // Ambil data transaksi terbaru dari model
        $data['transaksi'] = $this->transaksi->getAll(['Transaksi Selesai']);

        // Kirim data ke view
        return view('admin/transaksi/histori', $data);
    }
}
