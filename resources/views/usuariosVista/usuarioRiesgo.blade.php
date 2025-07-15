@extends('layout.usuarios')
@section('contenido')
<div class="container mt-5">
    <h2 class="text-center mb-5">Zonas de Riesgos Registradas</h2>
    <div class="row">
        @foreach($riesgos as $index => $riesgoTmp)
        <div class="col-md-4 ftco-animate mb-4">
            <div class="project-wrap card shadow-sm h-100 ">
                <div class="text p-4">
                    <span class="days">Zona de Riesgo #{{ $index + 1 }}</span>
                    <h3>{{ $riesgoTmp->nombre }}</h3>
                    <ul class="list-unstyled">
                        <li style="color: inherit;">
                            <span class="fa fa-users"></span> Descripcion: {{ $riesgoTmp->descripcion }} 
                        </li>
                        
                        <li style="color: inherit;">
                            <span class="fa fa-users"></span> Nivel: {{ $riesgoTmp->nivel }} 
                        </li>
                        <li>
                            <span class="fa fa-map-marker"></span> 
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#riesgoModal" 

                            data-latUno="{{$riesgoTmp->latitudUno}}"
                            data-lngUno="{{$riesgoTmp->longitudUno}}"

                            data-latDos="{{$riesgoTmp->latitudDos}}"
                            data-lngDos="{{$riesgoTmp->longitudDos}}"

                            data-latTres="{{$riesgoTmp->latitudTres}}"
                            data-lngTres="{{$riesgoTmp->longitudTres}}"

                            data-latCuatro="{{$riesgoTmp->latitudCuatro}}"
                            data-lngCuatro="{{$riesgoTmp->longitudCuatro}}"

                            data-latCinco="{{$riesgoTmp->latitudCinco}}"
                            data-lngCinco="{{$riesgoTmp->longitudCinco}}"

                            data-nombre="{{$riesgoTmp->nombre}}">
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
<div class="modal fade" id="riesgoModal" tabindex="-1" aria-labelledby="riesgoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="riesgoModalLabel">Ubicación de la zona de Riesgo</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h4 id="riesgoNombre"></h4>
        <div id="mapaRiesgo" style="border:2px solid black; height:450px; width:100%;"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
    var mapa;

    function initMapZona(coordenadas, nombre) {
        var centro = coordenadas[0]; // Primer punto como centro

        mapa = new google.maps.Map(document.getElementById('mapaRiesgo'), {
            center: centro,
            zoom: 13,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        
        var zonaRiesgo = new google.maps.Polygon({
            paths: coordenadas,
            strokeColor: "#FF0000",
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: "#FF0000",
            fillOpacity: 0.35
        });

        zonaRiesgo.setMap(mapa);

        
        google.maps.event.addListener(zonaRiesgo, 'click', function (event) {
            var info = new google.maps.InfoWindow({
                content: `<strong>${nombre}</strong>`,
                position: event.latLng
            });
            info.open(mapa);
        });

        document.getElementById('riesgoNombre').textContent = nombre;
    }

 
    document.getElementById('riesgoModal').addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;

        var coordenadas = [
            {
                lat: parseFloat(button.getAttribute('data-latuno')),
                lng: parseFloat(button.getAttribute('data-lnguno'))
            },
            {
                lat: parseFloat(button.getAttribute('data-latdos')),
                lng: parseFloat(button.getAttribute('data-lngdos'))
            },
            {
                lat: parseFloat(button.getAttribute('data-lattres')),
                lng: parseFloat(button.getAttribute('data-lngtres'))
            },
            {
                lat: parseFloat(button.getAttribute('data-latcuatro')),
                lng: parseFloat(button.getAttribute('data-lngcuatro'))
            },
            {
                lat: parseFloat(button.getAttribute('data-latcinco')),
                lng: parseFloat(button.getAttribute('data-lngcinco'))
            }
        ];

        var nombre = button.getAttribute('data-nombre');

        
        setTimeout(() => {
            initMapZona(coordenadas, nombre);
        }, 300);
    });
</script>

@endsection