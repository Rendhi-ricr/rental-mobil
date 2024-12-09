<?php

namespace App\Controllers;

class Booking extends BaseController
{
    // protected $mobil;

    // public function __construct()
    // {
    //     $this->mobil = new KendaraanModels();
    // }

    public function index()
    {
        // $mobil = $this->mobil->findAll();
        // $data = [
        //     'mobil' => $mobil
        // ];
        return view('frontend/input_transaksi');
    }
}
