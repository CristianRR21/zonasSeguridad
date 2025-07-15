@extends('layout.usuarios')
@section('contenido')

<div class="container mt-5">
    <h2 class="text-center mb-5">Zonas Seguras Registradas</h2>
    <div class="row">
        @foreach($zonas as $index => $zonaTmp)
        <div class="col-md-4 ftco-animate mb-4">
            <div class="project-wrap card shadow-sm h-100 ">
                <div class="text p-4">
                    <span class="days">Zona Segura #{{ $index + 1 }}</span>
                    <h3>{{ $zonaTmp->nombre }}</h3>
                    <ul class="list-unstyled">
                        <li style="color: inherit;">
                            <span class="fa fa-users"></span> Tipo: {{ $zonaTmp->tipo_seguridad }} 
                        </li>
                        
                        <li>
                            <span class="fa fa-map-marker"></span> 
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#zonaModal"
                            data-lat="{{ $zonaTmp->latitud }}"
                            data-lng="{{ $zonaTmp->longitud }}"
                            data-radio="{{ $zonaTmp->radio }}"
                            data-nombre="{{ $zonaTmp->nombre }}"
                            data-tipo="{{ $zonaTmp->tipo_seguridad }}">
                            Ver Mapa
                        </button>

                        </li>
                    </ul>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<div class="modal fade" id="zonaModal" tabindex="-1" aria-labelledby="zonaModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="zonaModalLabel">Ubicación de la Zona Segura</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <h4 id="zonaNombre"></h4>
        <div id="mapaZona" style="border:2px solid black; height:450px; width:100%;"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
    let mapaModal;
    let circuloModal;
    let infoWindowModal;

    function initMapaZonaSegura(lat, lng, radio, nombre, tipo) {
        const centro = { lat: parseFloat(lat), lng: parseFloat(lng) };

        mapaModal = new google.maps.Map(document.getElementById('mapaZona'), {
            center: centro,
            zoom: 15,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        const color = {
            'BAJA': '#dc3545',
            'MEDIA': '#ffc107',
            'ALTA': '#28a745'
        }[tipo] || '#000';

        circuloModal = new google.maps.Circle({
            strokeColor: color,
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: color,
            fillOpacity: 0.35,
            map: mapaModal,
            center: centro,
            radius: parseFloat(radio)
        });

        infoWindowModal = new google.maps.InfoWindow({
            content: `
                <strong>${nombre}</strong><br>
                Tipo: ${tipo}<br>
                Radio: ${radio} m
            `,
            position: centro
        });

        infoWindowModal.open(mapaModal);
        document.getElementById('zonaNombre').textContent = nombre;
    }

    // Evento al abrir el modal
    document.getElementById('zonaModal').addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;

        const lat = button.getAttribute('data-lat');
        const lng = button.getAttribute('data-lng');
        const radio = button.getAttribute('data-radio');
        const nombre = button.getAttribute('data-nombre');
        const tipo = button.getAttribute('data-tipo');

        setTimeout(() => {
            initMapaZonaSegura(lat, lng, radio, nombre, tipo);
        }, 300);
    });
</script>



@endsection