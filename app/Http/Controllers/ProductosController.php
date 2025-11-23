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

        public function edit($id)
    {
        $producto = Productos::findOrFail($id);
        return view('admin.EditarProducto', compact('producto'));
    }

    public function update(Request $request, $id)
    {
        $producto = Productos::findOrFail($id);

        $request->validate([
            'nombrenuevo' => 'required|string|max:255',
            'descripcionnuevo' => 'required|string',
            'precionuevo' => 'required|numeric',
            'imagennuevo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $producto->nombre = $request->input('nombrenuevo');
        $producto->descripcion = $request->input('descripcionnuevo');
        $producto->precio = $request->input('precionuevo');

        if ($request->hasFile('imagennuevo')) {
            if ($producto->imagen) {
                $oldImagePath = public_path('images/' . $producto->imagen);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

         
            $ruta = $request->file('imagennuevo')->store('imagen', 'public');
            $producto->imagen = $ruta;
        }

        $producto->save();

        return redirect()->route('admin.index');
    }

}
