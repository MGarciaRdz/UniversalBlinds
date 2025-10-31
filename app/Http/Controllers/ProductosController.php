<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Productos;

class ProductosController extends Controller
{

    public function create()
    {
        return view('Agregar_producto');
    }

    public function index()
    {
        $productos = Productos::all();
        return view('index', compact('productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            
        ]);

        $producto = new Productos();
        $producto->nombre = $request->input('nombre');
        $producto->descripcion = $request->input('descripcion');
        $producto->precio = $request->input('precio');
        $ruta = $request->file('imagen')->store('imagen', 'public');
        $producto->imagen = $ruta;
        $producto->save();

        return redirect()->route('productos.create')->with('success', 'Producto agregado exitosamente.');
    }


}
