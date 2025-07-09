<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Riesgo;

class RiesgoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $riesgos=Riesgo::all();
        return view('riesgos.index',compact("riesgos"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('riesgos.nuevo');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
         $datos=[
            'nombre'=>$request->nombre,
            'descripcion'=>$request->descripcion,
            'nivel'=>$request->nivel,
            'latitudUno'=>$request->latitudUno,
            'longitudUno'=>$request->longitudUno,

            'latitudDos'=>$request->latitudDos,
            'longitudDos'=>$request->longitudDos,

            'latitudTres'=>$request->latitudTres,
            'longitudTres'=>$request->longitudTres,

            'latitudCuatro'=>$request->latitudCuatro,
            'longitudCuatro'=>$request->longitudCuatro,

            'latitudCinco'=>$request->latitudCinco,
            'longitudCinco'=>$request->longitudCinco,
        ];
        Riesgo::create($datos);
        return redirect()->route('riesgos.index')->with('mensaje', 'Zona de riesgo creada con éxito');

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
        $riesgo = Riesgo::findOrFail($id);
        return view('riesgos.editar', compact('riesgo'));
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

        $riesgo = Riesgo::findOrFail($id);
        $riesgo->delete();

        return redirect()->route('riesgos.index')->with('success', 'Zona de riesgo eliminada correctamente.');
    }
}
