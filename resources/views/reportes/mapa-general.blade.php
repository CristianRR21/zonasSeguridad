@extends('layout.administrador')

@section('contenido')
<div class="container mt-5">
    <div class="card shadow-lg p-4">
        <h1 class="text-center mb-4">Mapa General de Seguridad</h1>
        
        <!-- Selector de capas -->
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="toggleZonasSeguras" checked>
                    <label class="form-check-label" for="toggleZonasSeguras">Zonas Seguras</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="toggleZonasRiesgo" checked>
                    <label class="form-check-label" for="toggleZonasRiesgo">Zonas de Riesgo</label>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="togglePuntosEncuentro" checked>
                    <label class="form-check-label" for="togglePuntosEncuentro">Puntos de Encuentro</label>
                </div>
            </div>
        </div>

        <!-- Filtros adicionales -->
        <div class="row mb-4">
            <div class="col-md-4">
                <label for="filtroSeguridad" class="form-label">Filtrar Zonas Seguras:</label>
                <select id="filtroSeguridad" class="form-select">
                    <option value="TODOS">Todos</option>
                    <option value="ALTA">ALTA</option>
                    <option value="MEDIA">MEDIA</option>
                    <option value="BAJA">BAJA</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="filtroRiesgo" class="form-label">Filtrar Zonas de Riesgo:</label>
                <select id="filtroRiesgo" class="form-select">
                    <option value="TODOS">Todos</option>
                    <option value="ALTO">ALTO</option>
                    <option value="MEDIO">MEDIO</option>
                    <option value="BAJO">BAJO</option>
                </select>
            </div>
        </div>

        <!-- Contenedor del mapa -->
        <div id="mapa-general" style="height: 600px; border: 2px solid #ccc;"></div>

        <!-- Botones de acción -->
        <div class="d-flex justify-content-between mt-4">
            <form method="POST" action="{{ route('reportes.generar') }}" id="formReporte">
                @csrf
                <input type="hidden" name="imagenMapa" id="imagenMapa">
                <button type="button" id="btnGenerarPDF" class="btn btn-outline-success shadow">
                    <i class="fas fa-file-pdf"></i> Generar Reporte PDF
                </button>
            </form>
            
            <a href="{{ route('riesgos.index') }}" class="btn btn-outline-danger shadow">
                <i class="fas fa-arrow-left"></i>
            </a>
        </div>
    </div>
</div>

<!-- Incluir partials -->
@include('reportes.mapa-seguras')
@include('reportes.mapa-riesgos')
@include('reportes.mapa-puntos')


<script>
    // Variables globales
    let mapa;
    let capas = {
        seguras: [],
        riesgos: [],
        puntos: []
    };

    // Inicialización del mapa
    function initMap() {
        const centro = { lat: -0.9374805, lng: -78.6161327 };
        mapa = new google.maps.Map(document.getElementById("mapa-general"), {
            center: centro,
            zoom: 14,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        // Cargar todas las capas inicialmente
        cargarZonasSeguras('TODOS');
        cargarZonasRiesgo('TODOS');
        cargarPuntosEncuentro();
        
        // Configurar eventos de los filtros
        document.getElementById('filtroSeguridad').addEventListener('change', function() {
            cargarZonasSeguras(this.value);
        });
        
        document.getElementById('filtroRiesgo').addEventListener('change', function() {
            cargarZonasRiesgo(this.value);
        });
        
        // Configurar eventos de los toggles
        document.getElementById('toggleZonasSeguras').addEventListener('change', function() {
            toggleCapas('seguras', this.checked);
        });
        
        document.getElementById('toggleZonasRiesgo').addEventListener('change', function() {
            toggleCapas('riesgos', this.checked);
        });
        
        document.getElementById('togglePuntosEncuentro').addEventListener('change', function() {
            toggleCapas('puntos', this.checked);
        });
    }

    // Función para mostrar/ocultar capas
    function toggleCapas(tipo, mostrar) {
        capas[tipo].forEach(item => {
            item.setMap(mostrar ? mapa : null);
        });
    }

    // Configurar el botón de generación de PDF
    document.getElementById('btnGenerarPDF').addEventListener('click', function() {
        const btn = this;
        btn.disabled = true;
        btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Generando...';

        html2canvas(document.getElementById('mapa-general'), {
            useCORS: true,
            allowTaint: false,
            scale: 1,
            logging: false
        }).then(canvas => {
            document.getElementById('imagenMapa').value = canvas.toDataURL('image/png');
            document.getElementById('formReporte').submit();
        }).catch(error => {
            console.error('Error al capturar el mapa:', error);
            alert('Error al generar el reporte. Intente nuevamente.');
            btn.disabled = false;
            btn.innerHTML = '<i class="fas fa-file-pdf"></i> Generar Reporte PDF';
        });
    });

    // Iniciar el mapa cuando el DOM esté listo
    document.addEventListener('DOMContentLoaded', initMap);
</script>
@endsection