<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Mobil extends BaseController
{
    public function index()
    {
        return view('admin/mobil/index');
    }
}
