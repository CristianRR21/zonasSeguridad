<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PuntoEncuentro;

class PuntoEncuentroController extends Controller
{
    public function index()
    {
        //
        $puntoEncuentros = PuntoEncuentro::all();
        return view('puntoEncuentros.indexPunto', compact('puntoEncuentros')); 
    }

    public function mapa()
    {
        //ver todos los puntos de encuentro
        $puntoEncuentros=PuntoEncuentro::all();
        return view('puntoEncuentros.mapa',compact('puntoEncuentros'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('puntoEncuentros.nuevoPunto');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $datos=[
            'nombre' => $request->nombre,
            'capacidad' => $request->capacidad,
            'latitud' => $request->latitud,
            'longitud' => $request->longitud,
            'responsable' => $request->responsable,
        ];
        PuntoEncuentro::create($datos);
        return redirect()->route('puntoEncuentros.index');
    }

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
        $punto = PuntoEncuentro::findOrFail($id);
        return view('puntoEncuentros.editarPunto', compact('punto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //actualizar al editar los datos
        $punto = PuntoEncuentro::findOrFail($id);
        $punto->update($request->all());
        return redirect()->route('puntoEncuentros.index')->with('success', 'Punto de Encuentro actualizado correctamente.');
    }

    public function destroy(string $id)
    {
        //eliminar
        $punto = PuntoEncuentro::findOrFail($id);
        $punto->delete();
        return redirect()->route('puntoEncuentros.index')->with('success', 'Punto de Encuentro eliminado correctamente.');
    }
}
