<?php

namespace App\Controllers;

use App\Models\KendaraanModels;
use App\Models\TransaksiModels;
use App\Models\UserModels;

class Booking extends BaseController
{
    protected $mobil;
    protected $transaksi;
    protected $user;

    public function __construct()
    {
        $this->mobil = new KendaraanModels();
        $this->transaksi = new TransaksiModels();
        $this->user = new UserModels();
    }

    public function index()
    {
        $id_kendaraan = $this->request->getGet('id_kendaraan'); // Ambil id_kendaraan dari query string

        // Ambil data mobil dari database
        $mobil = $this->mobil->findAll();

        // Cek apakah id_kendaraan ada dan valid
        $selectedMobil = null;
        if ($id_kendaraan) {
            $selectedMobil = $this->mobil->find($id_kendaraan);
        }

        // Kirim data ke view
        return view('frontend/input_transaksi', [
            'mobil' => $mobil,
            'selectedMobil' => $selectedMobil,
            'nama' => session()->get('nama'),
        ]);
    }

    public function simpan()
    {
        // Validasi Input
        if (!$this->validate([
            'id_kendaraan' => 'required',
            'tglsewa_mulai' => 'required|valid_date',
            'tglsewa_akhir' => 'required|valid_date',
            'alamat' => 'required',
            'denda' => 'required'
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Ambil data input
        $id_user = session()->get('id_user');
        $id_kendaraan = $this->request->getPost('id_kendaraan');
        $tglsewa_mulai = $this->request->getPost('tglsewa_mulai');
        $tglsewa_akhir = $this->request->getPost('tglsewa_akhir');
        $alamat = $this->request->getPost('alamat'); // Ambil alamat dari form input
        $denda = $this->request->getPost('denda'); // Ambil alamat dari form input

        // Ambil data kendaraan berdasarkan id_kendaraan
        $kendaraan = $this->mobil->find($id_kendaraan);
        if (!$kendaraan) {
            return redirect()->back()->withInput()->with('errors', ['id_kendaraan' => 'Kendaraan tidak ditemukan.']);
        }

        $harga_perhari = $kendaraan['harga_perhari'];
        $tanggal_mulai = new \DateTime($tglsewa_mulai);
        $tanggal_akhir = new \DateTime($tglsewa_akhir);
        $selisih_hari = $tanggal_mulai->diff($tanggal_akhir)->days + 1;

        // Hitung total harga
        $total_harga = $harga_perhari * $selisih_hari;
        // Simpan transaksi ke database
        $this->transaksi->insert([
            'id_user' => $id_user,
            'id_kendaraan' => $id_kendaraan,
            'tglsewa_mulai' => $tglsewa_mulai,
            'tglsewa_akhir' => $tglsewa_akhir,
            'total_harga' => str_replace(['Rp', '.', ','], '', $total_harga),
            'denda' => $denda,
            'keterangan' => 'Mobil Belum Diambil',
        ]);

        // Update alamat user di tabel t_user
        $this->user->update($id_user, ['alamat' => $alamat]);

        // Redirect dengan pesan sukses
        return redirect()->to('/home')->with('success', 'Data transaksi dan alamat berhasil disimpan.');
    }
}
