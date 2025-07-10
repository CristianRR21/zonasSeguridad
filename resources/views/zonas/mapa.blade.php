@extends('layout.administrador')

@section('contenido')
<div class="container mt-5">
    <div class="card shadow-lg p-4">
        <h1 class="text-center mb-4">Mapa de Zonas Seguras</h1>

        <div class="mb-3">
            <label for="filtroTipo" class="form-label fw-bold">Filtrar por tipo de seguridad:</label>
            <select id="filtroTipo" class="form-select w-auto">
                <option value="TODOS">Mostrar todos</option>
                <option value="ALTA">ALTA</option>
                <option value="MEDIA">MEDIA</option>
                <option value="BAJA">BAJA</option>
            </select>
        </div>

        <div id="mapa_general" style="height: 500px; border: 2px solid #ccc;"></div>

        <div class="d-flex justify-content-end mt-4">
            <a href="{{ route('zonas.index') }}" class="btn btn-outline-primary shadow" title="Volver">
                <i class="fa fa-home"></i>
            </a>
        </div>
    </div>
</div>

<script>
    let mapa;
    let circulos = [];
    let infoWindow;

    window.initMap = function () {
        mapa = new google.maps.Map(document.getElementById("mapa_general"), {
            center: { lat: -0.9374805, lng: -78.6161327 },
            zoom: 15
        });

        infoWindow = new google.maps.InfoWindow();
        renderizarZonas('TODOS');

        // Escuchar cambios del filtro
        document.getElementById('filtroTipo').addEventListener('change', function () {
            renderizarZonas(this.value);
        });
    };

    function renderizarZonas(filtro) {
        // Eliminar círculos existentes
        circulos.forEach(c => c.setMap(null));
        circulos = [];

        const zonas = @json($zonas);

        zonas.forEach(zona => {
            if (!zona.latitud || !zona.longitud || !zona.radio) return;

            if (filtro !== 'TODOS' && zona.tipo_seguridad !== filtro) return;

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

            // Mostrar información en hover
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

            circulos.push(circulo);
        });
    }
    window.initMap();
</script>
@endsection
