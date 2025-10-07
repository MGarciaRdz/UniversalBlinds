<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;

class IndexController extends Controller
{
    public function index()
    {
        $productos = Productos::all();
        return view('index', compact('productos'));
    }

}
