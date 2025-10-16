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
        // Validar los datos de entrada
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        // Buscar el usuario por email
        $usuario = Usuario::where('email', $request->email)->first();
        
        // Verificar si el usuario existe y la contraseña es correcta
        if (!$usuario || !Hash::check($request->password, $usuario->password)) {
            return back()->withErrors(['email' => 'Credenciales incorrectas'])->withInput();
        }


        //Autenticar el tipo de usuario 
        Auth::login($usuario);
        $request->session()->regenerate();
        
        //identificar el tipo de rol del usuario
        $rol = strtolower($usuario->rol ?? $usuario->role ?? 'cliente');

        // Redirigir según el rol del usuario 
        if ($rol === 'admin' || $rol === 'admin') {
            return redirect()->route('admin.index');
        } else if ($rol === 'cliente') {
            return redirect()->route('index');
        } 

    }
}
