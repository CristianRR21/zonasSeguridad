@extends('layout.administrador')
@section('contenido')

<br>
<h1 style="text-align:center">Mapa de Zonas de Riesgo</h1>
<div class="container mt-5">
        <div class="card shadow-lg p-4">
    <label for="filtroRiesgo" class="form-label fw-bold">Filtrar por Nivel de Riesgo:</label>
    <div class="mb-3">
    <select id="filtroRiesgo" class="form-select w-auto mb-3">
        <option value="TODOS">Mostrar todos</option>
        <option value="ALTO">ALTO</option>
        <option value="MEDIO">MEDIO</option>
        <option value="BAJO">BAJO</option>
    </select>
         </div>
    <div id="mapa-riesgos" style="height: 500px; border: 2px solid #ccc;"></div>
    <div class="d-flex justify-content-end mt-4">
            <a href="{{ route('riesgos.index') }}" class="btn btn-outline-primary shadow" title="Volver">
                <i class="fa fa-home"></i>
            </a>
        
    </div>
     </div>
</div>

<script>
    const riesgos = @json($riesgos);
</script>

<script>
    let mapa;
    let zonas = [];

    function initMap() {
        const centro = new google.maps.LatLng(-0.9374805, -78.6161327);
        mapa = new google.maps.Map(document.getElementById('mapa-riesgos'), {
            center: centro,
            zoom: 14,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        mostrarZonas("TODOS");
    }

    function mostrarZonas(nivel) {
        // Eliminar zonas anteriores
        zonas.forEach(z => z.setMap(null));
        zonas = [];

        riesgos.forEach(r => {
            if (nivel === "TODOS" || r.nivel === nivel) {
                const puntos = [
                    { lat: parseFloat(r.latitudUno), lng: parseFloat(r.longitudUno) },
                    { lat: parseFloat(r.latitudDos), lng: parseFloat(r.longitudDos) },
                    { lat: parseFloat(r.latitudTres), lng: parseFloat(r.longitudTres) },
                    { lat: parseFloat(r.latitudCuatro), lng: parseFloat(r.longitudCuatro) },
                    { lat: parseFloat(r.latitudCinco), lng: parseFloat(r.longitudCinco) }
                ];

                const color = getColor(r.nivel);

                const zona = new google.maps.Polygon({
                    paths: puntos,
                    strokeColor: color,
                    strokeOpacity: 0.8,
                    strokeWeight: 2,
                    fillColor: color,
                    fillOpacity: 0.4
                });

                zona.setMap(mapa);
                zonas.push(zona);

                const info = new google.maps.InfoWindow();
                google.maps.event.addListener(zona, 'click', function (event) {
                    info.setContent(`<strong>${r.nombre}</strong><br>${r.descripcion}<br><em>Nivel: ${r.nivel}</em>`);
                    info.setPosition(event.latLng);
                    info.open(mapa);
                });
            }
        });
    }

    function getColor(nivel) {
        switch (nivel) {
            case 'ALTO': return '#FF0000';
            case 'MEDIO': return '#FFA500';
            case 'BAJO': return '#28a745';
            default: return '#000000';
        }
    }

    // Iniciar mapa y escuchar cambios
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('filtroRiesgo').addEventListener('change', function () {
            mostrarZonas(this.value);
        });

        initMap();
    });
</script>

<!-- API Google Maps -->

@endsection
