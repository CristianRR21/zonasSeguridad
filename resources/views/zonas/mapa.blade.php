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

        <form method="POST" action="{{ route('zonas.reporte') }}" id="formReporte">
            @csrf
            <input type="hidden" name="imagenMapa" id="imagenMapa">
            <input type="hidden" name="tipoSeleccionado" id="tipoSeleccionado">

            <div class="d-flex justify-content-between mt-4">
                <button type="button" id="btnGenerarPDF" class="btn btn-outline-success shadow">
                    <i class="fas fa-file-pdf"></i> Generar Reporte PDF
                </button>
                
                <a href="{{ route('zonas.index') }}" class="btn btn-outline-primary shadow" title="Volver">
                    <i class="fa fa-home"></i> Volver
                </a>
            </div>
        </form>
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
            const tipo = this.value;
            document.getElementById('tipoSeleccionado').value = tipo;
            renderizarZonas(tipo);
        });

        // Configurar el valor inicial del tipo seleccionado
        document.getElementById('tipoSeleccionado').value = 'TODOS';
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

    // Capturar el mapa y enviar el formulario
    document.getElementById('btnGenerarPDF').addEventListener('click', function() {
        const btn = this;
        btn.disabled = true;
        btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Generando...';

        html2canvas(document.getElementById('mapa_general'), {
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

    window.initMap();
</script>
@endsection