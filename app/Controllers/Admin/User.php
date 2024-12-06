<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModels;

class User extends BaseController
{
    protected $user;
    public function __construct()
    {
        $this->user = new UserModels();
    }

    public function index()
    {
        $user = $this->user->findAll();
        $data = [
            'title' => 'Data User',
            'user' => $user
        ];
        return view('admin/user/index', $data);
    }

    public function tambah()
    {
        return view('admin/user/tambah');
    }

    public function simpan()
    {
        $res  = $this->user->save([
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('sandi'), PASSWORD_DEFAULT),
            'role' => $this->request->getPost('role'),
        ]);
        if ($res) {
            return redirect()->to('admin/user')->with('success', 'Data berhasil di tambahkan!');
        } else {
            return redirect()->back()->with('error', 'Data gagal di tambahkan!');
        }
    }

    public function edit($id_user)
    {
        $user = $this->user->data_user($id_user);
        $data = [
            'title' => 'Edit Data User',
            'user' => $user,
        ];

        return view('admin/user/edit', $data);
    }

    public function update($id)
    {
        // Validasi input
        $rules = [
            'nama' => 'required',
            'email' => 'required|valid_email',
            'role' => 'required',
        ];

        // Tambahkan validasi untuk password jika diisi
        if ($this->request->getPost('sandi')) {
            $rules['sandi'] = 'required|min_length[6]';
            $rules['sandi_konfirmasi'] = 'matches[sandi]';
        }

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Ambil data input
        $data = [
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'role' => $this->request->getPost('role'),
        ];

        // Jika password diisi, tambahkan ke data
        if ($this->request->getPost('sandi')) {
            $data['sandi'] = password_hash($this->request->getPost('sandi'), PASSWORD_DEFAULT);
        }

        // Update data user ke database
        $updated = $this->user->update($id, $data);

        if ($updated) {
            return redirect()->to('admin/user')->with('success', 'Data user berhasil diperbarui.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }
    }

    public function delete($id_user)
    {
        // penghapusan database
        $this->user->delete_data($id_user);

        // mengakses halaman berita
        return redirect()->to('admin/user');
    }
}
