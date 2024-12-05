<?php

namespace App\Controllers;

use App\Models\UserModels;

class Auth extends BaseController
{
    public function index()
    {
        return view('login.php');
    }

    public function login()
    {
        // Ambil data dari form login
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Panggil model untuk melakukan pengecekan login
        $usermodel = new UserModels();
        $user = $usermodel->where('email', $email)->first();

        // Jika user ditemukan
        if ($user) {
            // Verifikasi password
            if (password_verify($password, $user['password'])) {
                // Simpan data user ke dalam session
                $session = session();
                $session->set([
                    'id_user' => $user['id_user'],
                    'nama' => $user['nama'],
                    'email' => $user['email'],
                    'role' => $user['role'],
                    'isLoggedIn' => true
                ]);

                // Redirect ke halaman dashboard
                return redirect()->to('/admin');
            } else {
                // Password salah
                return redirect()->back()->with('error', 'Password salah');
            }
        } else {
            // User tidak ditemukan
            return redirect()->back()->with('error', 'Email tidak ditemukan');
        }
    }

    public function tambah()
    {
        // Tampilkan halaman registrasi
        return view('register.php');
    }

    public function register()
    {
        $userModel = new UserModels();

        // Ambil data dari form registrasi
        $data = [
            'nama'     => $this->request->getPost('nama'),
            'email'    => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'role'     => 1, // Default role
        ];

        // Validasi password dan confirm password
        $confirmPassword = $this->request->getPost('confirm_password');
        if ($data['password'] !== $confirmPassword) {
            return redirect()->back()->withInput()->with('error', 'Password dan konfirmasi password tidak cocok.');
        }

        // Enkripsi password
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        // Simpan data ke database
        if ($userModel->save($data)) {
            return redirect()->to('/auth')->with('success', 'Registrasi berhasil. Silakan login.');
        } else {
            // Ambil error dari validasi model
            $errors = $userModel->errors();
            return redirect()->back()->withInput()->with('error', implode(', ', $errors));
        }
    }

    // public function register()
    // {
    //     // Ambil data dari form registrasi
    //     $data = [
    //         'nama_lengkap' => $this->request->getPost('nama_lengkap'),
    //         'email' => $this->request->getPost('email'),
    //         'fakultas' => $this->request->getPost('fakultas'),
    //         'no_hp' => $this->request->getPost('no_hp'),
    //         'password' => $this->request->getPost('password'),
    //         'confirm_password' => $this->request->getPost('confirm_password'),
    //         'level' => 'mahasiswa' // Set level otomatis sebagai 'mahasiswa'
    //     ];

    //     // Validasi password dan confirm password
    //     if ($data['password'] !== $data['confirm_password']) {
    //         return redirect()->back()->with('error', 'Password dan konfirmasi password tidak cocok');
    //     }

    //     // Enkripsi password
    //     $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
    //     unset($data['confirm_password']); // Hapus confirm_password dari data yang akan disimpan

    //     // Simpan data ke dalam database
    //     $userModel = new UserModel();
    //     $userModel->save($data);

    //     // Redirect ke halaman login dengan pesan sukses
    //     return redirect()->to('/login')->with('success', 'Registrasi berhasil. Silakan login.');
    // }


    // public function dashboard()
    // {
    //     // Cek apakah user sudah login
    //     $session = session();
    //     if (!$session->get('isLoggedIn')) {
    //         // Jika belum login, redirect ke halaman login
    //         return redirect()->to('login');
    //     }

    //     // Ambil data user dari session
    //     $data['nama_lengkap'] = $session->get('nama_lengkap');
    //     $data['level'] = $session->get('level');

    //     // Tampilkan halaman dashboard
    //     return view('dashboard', $data);
    // }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/auth');
    }
}
