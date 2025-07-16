    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>Reporte de Zonas Seguras</title>
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
        </style>
    </head>
    <body>
        <h1>Reporte de Zonas Seguras</h1>
        <p style="text-align: right;">Generado el: {{ now()->format('d/m/Y H:i:s') }}</p>
        @if($tipoSeleccionado !== 'TODOS')
            <p><strong>Filtro aplicado:</strong> {{ $tipoSeleccionado }}</p>
        @endif
        
        <h2>Lista de Zonas</h2>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Latitud</th>
                    <th>Longitud</th>
                    <th>Radio (m)</th>
                </tr>
            </thead>
            <tbody>
                @foreach($zonas as $zona)
                <tr>
                    <td>{{ $zona->nombre }}</td>
                    <td>{{ $zona->tipo_seguridad }}</td>
                    <td>{{ $zona->latitud }}</td>
                    <td>{{ $zona->longitud }}</td>
                    <td>{{ $zona->radio }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        @if($imagenMapa)
        <h2>Mapa de Zonas</h2>
        <div class="mapa-container">
            <img src="{{ $imagenMapa }}" class="mapa-img" alt="Mapa de zonas seguras">
        </div>
        @endif
        
        <h2>Consulta el mapa en línea</h2>
        <div class="qr-container">
            <p>Escanea este código QR para acceder al mapa interactivo:</p>
            <img src="{{ $qrBase64 }}" alt="QR Code">
            <p>URL: {{ $urlMapa }}</p>
        </div>
        
        <div class="footer">
            Sistema de Gestión de Zonas Seguras - {{ config('app.name') }}
        </div>
    </body>
    </html>