<?php

namespace App\Controllers;

use App\Models\KendaraanModels;
use App\Models\TransaksiModels;

class Booking extends BaseController
{
    protected $mobil;
    protected $transaksi;

    public function __construct()
    {
        $this->mobil = new KendaraanModels();
        $this->transaksi = new TransaksiModels();
    }

    public function index()
    {
        $id_kendaraan = $this->request->getGet('id_kendaraan'); // Ambil ID kendaraan dari URL
        $mobil = $this->mobil->findAll();
        $nama = session()->get('nama');
        $alamat = session()->get('alamat');

        // Cari data kendaraan berdasarkan ID jika ada
        $selectedMobil = $id_kendaraan ? $this->mobil->find($id_kendaraan) : null;

        $data = [
            'mobil' => $mobil,
            'nama' => $nama,
            'alamat' => $alamat,
            'selectedMobil' => $selectedMobil // Kirim data kendaraan terpilih ke view
        ];

        return view('frontend/input_transaksi', $data);
    }


    public function simpan()
    {
        // Validasi Input
        if (!$this->validate([
            'id_kendaraan' => 'required',
            'tglsewa_mulai' => 'required|valid_date',
            'tglsewa_akhir' => 'required|valid_date'
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Ambil data input
        $id_user = session()->get('id_user'); // Ambil ID User dari session
        $id_kendaraan = $this->request->getPost('id_kendaraan');
        $tglsewa_mulai = $this->request->getPost('tglsewa_mulai');
        $tglsewa_akhir = $this->request->getPost('tglsewa_akhir');

        // Ambil data kendaraan berdasarkan id_kendaraan
        $kendaraan = $this->mobil->find($id_kendaraan);

        if (!$kendaraan) {
            return redirect()->back()->withInput()->with('errors', ['id_kendaraan' => 'Kendaraan tidak ditemukan.']);
        }

        $harga_perhari = $kendaraan['harga_perhari']; // Ambil harga_perhari dari kendaraan

        // Hitung total hari
        $tanggal_mulai = new \DateTime($tglsewa_mulai);
        $tanggal_akhir = new \DateTime($tglsewa_akhir);
        $selisih_hari = $tanggal_mulai->diff($tanggal_akhir)->days + 1; // Tambahkan 1 hari untuk menyertakan hari pertama

        // Hitung total harga
        $total_harga = $harga_perhari * $selisih_hari;

        // Simpan ke database
        $this->transaksi->insert([
            'id_user' => $id_user,
            'id_kendaraan' => $id_kendaraan,
            'tglsewa_mulai' => $tglsewa_mulai,
            'tglsewa_akhir' => $tglsewa_akhir,
            'total_harga' => $total_harga
        ]);

        // Redirect dengan pesan sukses
        return redirect()->to('/home')->with('success', 'Data berhasil disimpan.');
    }
}
