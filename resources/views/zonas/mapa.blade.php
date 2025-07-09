@extends('layout.administrador')

@section('contenido')
<div class="container mt-5">
    <div class="card shadow-lg p-4">
        <h1 class="text-center mb-4">Mapa de Zonas Seguras</h1>
        <div id="mapa_general" style="height: 500px; border: 2px solid #ccc;"></div>
    </div>
</div>

<script>
    window.initMap = function () {
        const mapa = new google.maps.Map(document.getElementById("mapa_general"), {
            center: { lat: -0.9374805, lng: -78.6161327 },
            zoom: 15
        });

        const zonas = @json($zonas);
        const infoWindow = new google.maps.InfoWindow();

        zonas.forEach(zona => {
            if (!zona.latitud || !zona.longitud || !zona.radio) return;

            const color = {
                'BAJA': '#dc3545',
                'MEDIA': '#ffc107',
                'ALTA': '#28a745'
            }[zona.tipo_seguridad] || '#000';

            const centro = { lat: parseFloat(zona.latitud), lng: parseFloat(zona.longitud) };

            const circulo = new google.maps.Circle({
                strokeColor: color,
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: color,
                fillOpacity: 0.35,
                map: mapa,
                center: centro,
                radius: parseFloat(zona.radio)
            });

            // Mostrar información detallada en InfoWindow
            google.maps.event.addListener(circulo, 'mouseover', function () {
                infoWindow.setContent(`
                    <strong>${zona.nombre}</strong><br>
                    Tipo: ${zona.tipo_seguridad}<br>
                    Radio: ${zona.radio} m<br>
                    Latitud: ${zona.latitud}<br>
                    Longitud: ${zona.longitud}
                `);
                infoWindow.setPosition(centro);
                infoWindow.open(mapa);
            });

            google.maps.event.addListener(circulo, 'mouseout', function () {
                infoWindow.close();
            });
        });
    };
</script>
@endsection
