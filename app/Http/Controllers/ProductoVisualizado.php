<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;

class ProductoVisualizado extends Controller
{
    //

    public function show($id)
    {
        //
        $Producto = Productos::find($id);
        return view('Producto-Visualizado', compact('Producto'));
         
    }
}
