@extends('layout.administrador')
@section('contenido')
<div class="container mt-5">
    <div class="card shadow-lg p-4">
        <h1>Mapa de Puntos de Encuentro</h1><br>
        <center>
            <button id="btnDescargarMapa" class="btn btn-primary">
                Descargar imagen del mapa
            </button><br><br>
        </center>
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

<script src="
https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js">
</script>

<script>
document.getElementById('btnDescargarMapa').addEventListener('click', function () {
    const mapaDiv = document.getElementById('mapa-puntos');

    html2canvas(mapaDiv).then(function (canvas) {
        const link = document.createElement('a');
        link.download = 'mapa_puntos.png';
        link.href = canvas.toDataURL();
        link.click();
    });
});
</script>

@endsection