@extends('layout.administrador')

@section('contenido')
<div class="container mt-5">
    <div class="card shadow-lg p-4">
        <h1>Mapa de Zonas de Riesgo</h1><br>
        <div id="mapa-riesgos" style="border:1px solid black; height:400px;"></div><br>
    </div>
</div>


<script type="text/javascript">
    function initMap() {
        
        var centro = new google.maps.LatLng(-0.9374805, -78.6161327);
        var mapa = new google.maps.Map(document.getElementById('mapa-riesgos'), {
            center: centro,
            zoom: 10,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

 
        @foreach($riesgos as $riesgo)
            var coordenadas = [
             
                { lat: {{ $riesgo->latitudUno }}, lng: {{ $riesgo->longitudUno }} },
         
             
                { lat: {{ $riesgo->latitudDos }}, lng: {{ $riesgo->longitudDos }} },
              
                { lat: {{ $riesgo->latitudTres }}, lng: {{ $riesgo->longitudTres }} },
                
            
                { lat: {{ $riesgo->latitudCuatro }}, lng: {{ $riesgo->longitudCuatro }} },
                
               
                { lat: {{ $riesgo->latitudCinco }}, lng: {{ $riesgo->longitudCinco }} }
                
            ];

            
            var zonaRiesgo = new google.maps.Polygon({
                paths: coordenadas,
                strokeColor: "#FF0000",
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: "#FF0000",
                fillOpacity: 0.35
            });

            zonaRiesgo.setMap(mapa);

           
            google.maps.event.addListener(zonaRiesgo, 'click', function(event) {
                var info = new google.maps.InfoWindow({
                    content: `<strong>{{ $riesgo->nombre }}</strong><br>{{ $riesgo->descripcion }}<br><em>Nivel: {{ $riesgo->nivel }}</em>`,
                    position: event.latLng
                });
                info.open(mapa);
            });
        @endforeach
    }

    window.onload = initMap;
</script>
@endsection


            