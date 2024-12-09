<?php

namespace App\Controllers;

use App\Models\KendaraanModels;

class Home extends BaseController
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
            'mobil' => $mobil,
            'isLoggedIn' => session()->has('id_user')
        ];
        return view('frontend/home', $data);
    }
}
