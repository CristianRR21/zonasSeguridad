<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\PuntoEncuentro;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = User::all();
        return view('users.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */



   
public function store(Request $request)
{
    
    // Validación
    

    // Adaptado usando un array como en RiesgoController
    $datos = [
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 'visitante', // Valor fijo por defecto
    ];

    User::create($datos);

    // Redirección al login con mensaje
    return redirect()->route('login')->with('success', 'Usuario registrado correctamente.');
}   


    /**
     * Store a newly created resource in storage.
     */


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

  
  public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $usuario = Auth::user();

            if ($usuario->role === 'admin') {
                return redirect('/admin/inicio');
            } elseif ($usuario->role === 'visitante') {
                return redirect('/visitante/inicio');
            }

            Auth::logout();
            return back()->withErrors(['email' => 'Rol no permitido.']);
        }

        return back()->withErrors(['email' => 'Credenciales incorrectas.']);
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function usuarioPunto()
    {
        //ver todos los puntos de encuentro
        $puntoEncuentros=PuntoEncuentro::all();
        return view('usuariosVista.usuarioPunto',compact('puntoEncuentros'));
    }
}