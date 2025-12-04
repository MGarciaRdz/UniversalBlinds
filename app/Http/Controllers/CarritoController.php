<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;

class CarritoController extends Controller
{
    public function index()
    {
        $carrito = session()->get('carrito', []);
        $normalized = [];
        $subtotal = 0;

        foreach ($carrito as $productoId => $item) {

            // Si es formato viejo (INT = cantidad)
            if (is_int($item)) {

                $producto = Productos::find($productoId);
                if (!$producto) continue;

                $normalized[$productoId] = [
                    'id'       => $producto->id,
                    'nombre'   => $producto->nombre,
                    'precio'   => (float)$producto->precio,
                    'cantidad' => $item,
                    'imagen'   => $producto->imagen,
                ];

                $subtotal += $producto->precio * $item;
                continue;
            }

            // Si es formato normal (array)
            if (is_array($item)) {

                $producto = Productos::find($productoId);
                if (!$producto) continue;

                $cantidad = isset($item['cantidad']) ? (int)$item['cantidad'] : 1;

                $normalized[$productoId] = [
                    'id'       => $producto->id,
                    'nombre'   => $producto->nombre,
                    'precio'   => (float)$producto->precio,
                    'cantidad' => $cantidad,
                    'imagen'   => $producto->imagen,
                ];

                $subtotal += $producto->precio * $cantidad;
            }
        }

        session()->put('carrito', $normalized);
        session()->put('subtotal', $subtotal);

        return view('Carrito', compact('normalized', 'subtotal'));
    }


    public function agregarProducto(Request $request)
    {
        $productoId = $request->input('producto_id');
        $cantidad   = (int) $request->input('cantidad', 1);

        $producto = Productos::findOrFail($productoId);

        $carrito = session()->get('carrito', []);

        // Si existe pero está en formato viejo (INT), normalizarlo
        if (isset($carrito[$productoId]) && is_int($carrito[$productoId])) {

            $carrito[$productoId] = [
                'id'       => $producto->id,
                'nombre'   => $producto->nombre,
                'precio'   => (float)$producto->precio,
                'cantidad' => (int) $carrito[$productoId], // cantidad antigua
                'imagen'   => $producto->imagen,
            ];
        }

        // Si ya existe y es array
        if (isset($carrito[$productoId])) {

            $carrito[$productoId]['cantidad'] += $cantidad;

        } else { // si no existe, crearlo
            $carrito[$productoId] = [
                'id'       => $producto->id,
                'nombre'   => $producto->nombre,
                'precio'   => (float)$producto->precio,
                'cantidad' => $cantidad,
                'imagen'   => $producto->imagen,
            ];
        }

        session()->put('carrito', $carrito);

        return redirect()->route('carrito.index')
                         ->with('success', 'Producto agregado al carrito.');
    }
}
