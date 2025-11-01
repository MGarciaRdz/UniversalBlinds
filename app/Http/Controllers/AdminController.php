<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;

class AdminController extends Controller
{

    public function index()
    {
        $productos = Productos::orderBy('created_at', 'desc')->get();
        return view('admin.admin', compact('productos'));
    }

    public function show($id)
    {
        $producto = Productos::findOrFail($id);
        return view('admin.admin', compact('producto'));
    }


    public function destroy($id)
    {
        $producto = Productos::findOrFail($id);

        // Eliminar la imagen asociada si existe
        if ($producto->imagen) {
            $imagePath = public_path('images/' . $producto->imagen);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $producto->delete();

        return redirect()->route('admin.index')->with('success', 'Producto eliminado correctamente.');
    }

  
   
}
