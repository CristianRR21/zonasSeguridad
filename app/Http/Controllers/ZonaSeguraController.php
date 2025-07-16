<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ZonaSegura;
use PDF;
use QrCode;

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
    public function generarReporte(Request $request)
    {
        $tipoSeleccionado = $request->input('tipoSeleccionado', 'TODOS');

        $zonas = ($tipoSeleccionado && $tipoSeleccionado !== 'TODOS')
            ? ZonaSegura::where('tipo_seguridad', $tipoSeleccionado)->get()
            : ZonaSegura::all();

        // Generar URL para el QR
        $urlMapa = route('zonas.mapa');
        
        // Generar QR en formato SVG
        $qrSvg = QrCode::format('svg')
            ->size(120)
            ->generate($urlMapa);
        
        $qrBase64 = 'data:image/svg+xml;base64,' . base64_encode($qrSvg);
        
        // Imagen del mapa capturada
        $imagenMapa = $request->input('imagenMapa');

        // Pasar todas las variables necesarias a la vista
        return PDF::loadView('zonas.reporte', [
            'zonas' => $zonas,
            'imagenMapa' => $imagenMapa,
            'qrBase64' => $qrBase64,
            'tipoSeleccionado' => $tipoSeleccionado,
            'urlMapa' => $urlMapa  // Asegúrate de pasar esta variable
        ])->setPaper('A4', 'portrait')
        ->download('reporte_zonas_seguras_' . now()->format('Ymd_His') . '.pdf');
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
