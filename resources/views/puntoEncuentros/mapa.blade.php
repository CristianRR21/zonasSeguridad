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
        <div id="mapa-puntos" style="border:1px solid black; height:550px;"></div><br>
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
            mapTypeId:google.maps.MapTypeId.ROADMAP,
            preserveDrawingBuffer: true 
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

<script>
  document.getElementById('btnDescargarMapa').addEventListener('click', function() {
    const btn = this;
    btn.disabled = true;
    btn.textContent = 'Generando imagen...';

    // Configuración básica
    const center = "-0.9374805,-78.6161327";
    const zoom = "8";
    const size = "800x600";
    const mapType = "roadmap";
    const apiKey = "AIzaSyB53X59XDdO0JExB0Zi_bChS_2WDghlPzw";

    // Generar marcadores
    let markers = "";
    @foreach($puntoEncuentros as $puntoTmp)
        markers += `&markers=icon:https://icons.iconarchive.com/icons/hopstarter/sleek-xp-basic/48/User-Group-icon.png|{{$puntoTmp->latitud}},{{$puntoTmp->longitud}}`;
    @endforeach

    // Construir URL
    const staticMapUrl = `https://maps.googleapis.com/maps/api/staticmap?center=${center}&zoom=${zoom}&size=${size}&maptype=${mapType}${markers}&key=${apiKey}`;
    
    // Crear imagen
    const img = new Image();
    img.crossOrigin = "Anonymous";
    img.src = staticMapUrl;
    
    img.onload = function() {
        const canvas = document.createElement('canvas');
        canvas.width = img.width;
        canvas.height = img.height;
        const ctx = canvas.getContext('2d');
        ctx.drawImage(img, 0, 0);
        
        const link = document.createElement('a');
        link.download = 'mapa_puntos.png';
        link.href = canvas.toDataURL('image/png');
        link.click();
        
        btn.disabled = false;
        btn.textContent = 'Descargar imagen del mapa';
    };
});
</script>
@endsection