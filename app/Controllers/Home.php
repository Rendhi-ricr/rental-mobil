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
            'mobil' => $mobil
        ];
        return view('frontend/home', $data);
    }
}
