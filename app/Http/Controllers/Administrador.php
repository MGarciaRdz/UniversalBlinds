<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Administrador extends Controller
{
    public function index()
    {
        return view('admin.admin');
    }
}
