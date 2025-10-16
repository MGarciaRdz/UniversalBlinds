<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;


class RegistroController extends Controller
{
    //
        public function create()
    {
        return view('registro');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:usuarios',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Aquí puedes agregar la lógica para almacenar el usuario en la base de datos
        $usuario = new Usuario();
        $usuario->name = $request->input('name');
        $usuario->email = $request->input('email');
        $usuario->password = Hash::make($request->input('password'));
        $usuario->save();



        return redirect()->route('registro.create')->with('success', 'Registro exitoso.');
    }

}
