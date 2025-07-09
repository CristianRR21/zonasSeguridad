@extends('layout.administrador')
@section('contenido')
<div class="container mt-5">
    <div class="card shadow-lg p-4">
        <h1>Mapa de Puntos de Encuentro</h1><br>
        <div id="mapa-puntos" style="border:1px solid black; height:300px;"></div><br>
    </div>
</div>

<script type="text/javascript">
    function initMap() {

        var latitud_longitud= new google.maps.LatLng(-0.9374805,-78.6161327);
        var mapa=new google.maps.Map(
          document.getElementById('mapa-puntos'),
          {
            center:latitud_longitud,
            zoom:8,
            mapTypeId:google.maps.MapTypeId.ROADMAP
          }
        );

        @foreach($puntoEncuentros as $puntoTmp)
        var coordenadaPunto= new google.maps.LatLng({{$puntoTmp->latitud}},{{$puntoTmp->longitud}});
        var marcador=new google.maps.Marker({
          position:coordenadaPunto,
          map:mapa,
          icon:'https://icons.iconarchive.com/icons/hopstarter/sleek-xp-basic/48/User-Group-icon.png',
          title:"{{$puntoTmp->nombre}}",
          draggable:false
        });        
        @endforeach
      }
      window.onload = function() {
        initMap();
    };
</script>
@endsection