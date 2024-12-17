<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KendaraanModels;


class Mobil extends BaseController
{
    protected $mobil;

    public function __construct()
    {
        $this->mobil = new KendaraanModels();
    }

    public function index()
    {
        $mobil = $this->mobil->findAll();
        $data = [
            'title' => 'Data mobil',
            'mobil' => $mobil
        ];
        return view('admin/mobil/index', $data);
    }

    public function tambah()
    {
        return view('admin/mobil/tambah');
    }

    public function simpan()
    {
        $model = new KendaraanModels();

        // Validasi input
        $validation = $this->validate([
            'nama_kendaraan' => 'required|min_length[3]',
            'nomor_kendaraan' => 'required',
            'tipe_kendaraan' => 'required|min_length[3]',
            'harga_perhari' => 'required|numeric',
            'gambar' => 'uploaded[gambar]|is_image[gambar]|max_size[gambar,2048]', // Validasi untuk file gambar
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Upload file gambar
        $gambar = $this->request->getFile('gambar');
        if ($gambar->isValid() && !$gambar->hasMoved()) {
            $namaGambar = $gambar->getRandomName();
            $gambar->move(ROOTPATH . 'public/img/kendaraan', $namaGambar); // Pastikan folder 'public/img/kendaraan' ada
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal mengunggah gambar');
        }

        // Simpan data ke database
        $data = [
            'nama_kendaraan' => $this->request->getPost('nama_kendaraan'),
            'nomber_kendaraan' => $this->request->getPost('nomor_kendaraan'),
            'tipe_kendaraan' => $this->request->getPost('tipe_kendaraan'),
            'harga_perhari' => $this->request->getPost('harga_perhari'),
            'gambar' => $namaGambar, // Nama file gambar
        ];

        $model->save($data);

        return redirect()->to('/admin/mobil')->with('success', 'Data kendaraan berhasil disimpan');
    }

    public function edit($id_kendaraan)
    {
        $kendaraan = $this->mobil->data_kendaraan($id_kendaraan);
        $data = [
            'title' => 'Edit Data User',
            'kendaraan' => $kendaraan,
        ];

        return view('admin/mobil/edit', $data);
    }

    public function update($id_kendaraan)
    {
        $model = new KendaraanModels();

        // Validasi input
        $validation = $this->validate([
            'nama_kendaraan' => 'required|min_length[3]',
            'nomor_kendaraan' => 'required',
            'tipe_kendaraan' => 'required|min_length[3]',
            'harga_perhari' => 'required|numeric',
            'gambar' => 'if_exist|is_image[gambar]|max_size[gambar,2048]', // Validasi untuk file gambar
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Upload file gambar jika ada
        $gambar = $this->request->getFile('gambar');
        $kendaraan = $model->find($id_kendaraan);
        $namaGambar = $kendaraan['gambar']; // Gambar lama

        if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {
            // Hapus gambar lama jika ada
            if ($namaGambar && file_exists(ROOTPATH . 'public/img/kendaraan/' . $namaGambar)) {
                unlink(ROOTPATH . 'public/img/kendaraan/' . $namaGambar);
            }

            $namaGambar = $gambar->getRandomName();
            $gambar->move(ROOTPATH . 'public/img/kendaraan', $namaGambar);
        }

        // Update data ke database
        $data = [
            'nama_kendaraan' => $this->request->getPost('nama_kendaraan'),
            'nomber_kendaraan' => $this->request->getPost('nomor_kendaraan'),
            'tipe_kendaraan' => $this->request->getPost('tipe_kendaraan'),
            'harga_perhari' => $this->request->getPost('harga_perhari'),
            'gambar' => $namaGambar,
        ];

        $model->update($id_kendaraan, $data);

        return redirect()->to('/admin/mobil')->with('success', 'Data kendaraan berhasil diupdate');
    }

    public function delete($id_kendaraan)
    {
        // penghapusan database
        $this->mobil->delete_data($id_kendaraan);

        // mengakses halaman berita
        return redirect()->to('admin/mobil');
    }
}
