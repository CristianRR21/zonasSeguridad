<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ZonaSegura;

class ZonaSeguraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $zonas = ZonaSegura::all();
        return view('zonas.index', compact('zonas'));
    }

    public function mapa()
    {
        $zonas = ZonaSegura::all();
        return view('zonas.mapa', compact('zonas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('zonas.nuevo');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'radio' => 'required|numeric|min:0.1',
            'latitud' => 'required|numeric',
            'longitud' => 'required|numeric',
            'tipo_seguridad' => 'required|in:ALTA,MEDIA,BAJA',
        ]);

        ZonaSegura::create($request->all());

        return redirect()->route('zonas.index')->with('mensaje', 'Zona segura creada correctamente.');
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
        $zona = ZonaSegura::findOrFail($id);
        return view('zonas.editar', compact('zona'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'radio' => 'required|numeric|min:0.1',
            'latitud' => 'required|numeric',
            'longitud' => 'required|numeric',
            'tipo_seguridad' => 'required|in:ALTA,MEDIA,BAJA',
        ]);

        $zona = ZonaSegura::findOrFail($id);
        $zona->update($request->all());

        return redirect()->route('zonas.index')->with('mensaje', 'Zona segura actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $zona = ZonaSegura::findOrFail($id);
        $zona->delete();

        return redirect()->route('zonas.index')->with('mensaje', 'Zona segura eliminada correctamente.');
    }
}
