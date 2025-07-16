<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reporte General de Zonas</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        h1 { color: #2c3e50; text-align: center; }
        h2 { color: #3498db; border-bottom: 1px solid #eee; padding-bottom: 5px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 15px; }
        th, td { border: 1px solid #ddd; padding: 6px; text-align: left; }
        th { background-color: #f2f2f2; }
        .qr-container { text-align: center; margin: 15px 0; }
        .footer { text-align: center; margin-top: 20px; font-size: 10px; color: #7f8c8d; }
        .mapa-container { text-align: center; margin: 15px 0; }
        .mapa-img { max-width: 100%; height: auto; border: 1px solid #ddd; }
        .badge {
            padding: 3px 6px;
            border-radius: 3px;
            font-weight: bold;
            color: white;
            display: inline-block;
        }
        .bg-success { background-color: #28a745; }
        .bg-warning { background-color: #ffc107; color: #000 !important; }
        .bg-danger { background-color: #dc3545; }
        .bg-secondary { background-color: #6c757d; }
        .bg-primary { background-color: #007bff; }
        .page-break { page-break-after: always; }
    </style>
</head>
<body>
    <h1>Reporte General de Zonas</h1>
    <p style="text-align: right;">Generado el: {{ now()->format('d/m/Y H:i:s') }}</p>
    
    <!-- Zonas Seguras -->
    @if($zonasSeguras->count() > 0)
    <h2>Zonas Seguras</h2>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Coordenadas</th>
                <th>Radio (m)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($zonasSeguras as $zona)
            <tr>
                <td>{{ $zona->nombre }}</td>
                <td>{{ $zona->tipo_seguridad }}</td>
                <td>Lat: {{ $zona->latitud }}<br>Lng: {{ $zona->longitud }}</td>
                <td>{{ $zona->radio }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
    
    <!-- Zonas de Riesgo -->
    @if($zonasRiesgo->count() > 0)
    <h2>Zonas de Riesgo</h2>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Nivel</th>
                <th>Coordenadas</th>
            </tr>
        </thead>
        <tbody>
            @foreach($zonasRiesgo as $riesgo)
            <tr>
                <td>{{ $riesgo->nombre }}</td>
                <td>{{ $riesgo->descripcion }}</td>
                <td>
                    <span class="badge 
                        @if($riesgo->nivel === 'BAJO') bg-success 
                        @elseif($riesgo->nivel === 'MEDIO') bg-warning 
                        @elseif($riesgo->nivel === 'ALTO') bg-danger 
                        @else bg-secondary 
                        @endif">
                        {{ $riesgo->nivel }}
                    </span>
                </td>
                <td>
                    @for($i = 1; $i <= 5; $i++)
                        @if($riesgo->{'latitud'.$i} && $riesgo->{'longitud'.$i})
                            Punto {{ $i }}: Lat {{ $riesgo->{'latitud'.$i} }}, Lng {{ $riesgo->{'longitud'.$i} }}<br>
                        @endif
                    @endfor
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
    
    <!-- Puntos de Encuentro -->
    @if($puntosEncuentro->count() > 0)
    <h2>Puntos de Encuentro</h2>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Capacidad</th>
                <th>Coordenadas</th>
                <th>Responsable</th>
            </tr>
        </thead>
        <tbody>
            @foreach($puntosEncuentro as $punto)
            <tr>
                <td>{{ $punto->nombre }}</td>
                <td>{{ $punto->capacidad }}</td>
                <td>Lat: {{ $punto->latitud }}<br>Lng: {{ $punto->longitud }}</td>
                <td>{{ $punto->responsable }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
    
    @if($imagenMapa)
    <div class="page-break"></div>
    <h2>Mapa General</h2>
    <div class="mapa-container">
        <img src="{{ $imagenMapa }}" class="mapa-img" alt="Mapa general de zonas">
    </div>
    @endif
    
    <h2>Consulta el mapa en línea</h2>
    <div class="qr-container">
        <p>Escanea este código QR para acceder al mapa interactivo:</p>
        <img src="{{ $qrBase64 }}" alt="QR Code" style="width: 120px; height: 120px;">
        <p>URL: {{ $urlMapa }}</p>
    </div>
    
    <div class="footer">
        Sistema de Gestión de Zonas - {{ config('app.name') }} &copy; {{ date('Y') }}
    </div>
</body>
</html>