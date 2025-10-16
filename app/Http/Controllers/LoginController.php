<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario; // Asegúrate de tener este modelo

class LoginController extends Controller
{
    public function create()
    {
        return view('login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        $usuario = Usuario::where('email', $request->email)->first();

        if ($usuario && Hash::check($request->password, $usuario->password)) {
            // Aquí puedes guardar datos en sesión si lo necesitas
            session(['usuario_id' => $usuario->id]);
            return redirect()->route('index')->with('success', 'Inicio de sesión exitoso')->with('info', 'Bienvenido ' . $usuario->name);
        } else {
            return back()->withErrors(['email' => 'Credenciales incorrectas'])->withInput();
        }
    }
}
