<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ZonaSegura;
use App\Models\Riesgo;
use App\Models\PuntoEncuentro;
use PDF;
use QrCode;

class ReporteController extends Controller
{
    public function mapaGeneral()
    {
        $zonasSeguras = ZonaSegura::all();
        $zonasRiesgo = Riesgo::all();
        $puntosEncuentro = PuntoEncuentro::all();

        return view('reportes.mapa-general', compact('zonasSeguras', 'zonasRiesgo', 'puntosEncuentro'));
    }

    public function generarReporte(Request $request)
    {
        $zonasSeguras = ZonaSegura::all();
        $zonasRiesgo = Riesgo::all();
        $puntosEncuentro = PuntoEncuentro::all();

        if ($zonasSeguras->isEmpty() && $zonasRiesgo->isEmpty() && $puntosEncuentro->isEmpty()) {
            return back()->with('error', 'No hay datos para generar el reporte');
        }

        $imagenMapa = $request->input('imagenMapa');
        $urlMapa = route('reportes.mapa-general');
        
        // Generar QR en formato SVG (no requiere extensiones adicionales)
        $qrSvg = QrCode::format('svg')
            ->size(120)
            ->margin(1)
            ->generate($urlMapa);
        
        $qrBase64 = 'data:image/svg+xml;base64,' . base64_encode($qrSvg);

        $data = [
            'imagenMapa' => $imagenMapa,
            'qrBase64' => $qrBase64,
            'urlMapa' => $urlMapa,
            'zonasSeguras' => $zonasSeguras,
            'zonasRiesgo' => $zonasRiesgo,
            'puntosEncuentro' => $puntosEncuentro
        ];

        $pdf = PDF::loadView('reportes.reporte-pdf', $data)
            ->setPaper('A4', 'portrait')
            ->setOption('enable-local-file-access', true)
            ->setOption('images', true);

        return $pdf->download('reporte_general_' . now()->format('Ymd_His') . '.pdf');
    }
}