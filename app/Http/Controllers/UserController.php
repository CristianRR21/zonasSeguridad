<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\PuntoEncuentro;
use App\Models\Riesgo;
use App\Models\ZonaSegura;


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



    public function adminIndex()
    {
        $usuarios = User::where('role', 'admin')->get(); 
        return view('administradores.index', compact('usuarios'));
    }

   
public function store(Request $request)
{
    
    // Validación
    
   
    if (User::where('email', $request->email)->exists()) {
    return redirect()->back()
        ->withInput()
        ->with('error_email', 'El correo ya está registrado.');
    }

    $datos = [
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => $request->role,
    ];

    User::create($datos);

    if ($request->role === 'admin') {
        return redirect('/admin/Index')->with('mensaje', 'Administrador creado correctamente.');
       
    }

    return redirect()->route('login')->with('mensaje', 'Usuario registrado correctamente.');

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
                return redirect('/usuariosVista/usuarioRiesgo');
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
        //ver todos los puntos de encuentro USUARIOS
        $puntoEncuentros=PuntoEncuentro::all();
        return view('usuariosVista.usuarioPunto',compact('puntoEncuentros'));
    }

    public function usuarioRiesgo()
    {
        //ver todos las zonas de riesgos USUARIOS
        $riesgos=Riesgo::all();
        return view('usuariosVista.usuarioRiesgo',compact('riesgos'));
    }


    public function usuarioZona()
    {
        //ver todos las zonas de riesgos USUARIOS
        $zonas=ZonaSegura::all();
        return view('usuariosVista.usuarioZona',compact('zonas'));
    }
    
    

}