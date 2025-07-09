@extends('layout.administrador')
@section('contenido')
<div class="container mt-5">
    <div class="card shadow-lg p-4">
        <h1 class="text-center mb-4">Nuevo Punto de Encuentro</h1>
        <form action="{{ route('puntoEncuentros.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre" required>
            </div>
            <div class="mb-3">
                <label for="capacidad" class="form-label">Capacidad</label>
                <input type="text" name="capacidad" id="capacidad" class="form-control" placeholder="Capacidad" required>
            </div>
            <div class="mb-3">
                <label for="latitud" class="form-label">Latitud</label>
                <input type="text" name="latitud" id="latitud" class="form-control" placeholder="Latitud" required>
            </div>
            <div class="mb-3">
                <label for="longitud" class="form-label">Longitud</label>
                <input type="text" name="longitud" id="longitud" class="form-control" placeholder="Longitud" required>
            </div>
            <div class="mb-3">
                <label for="responsable" class="form-label">Responsable</label>
                <input type="text" name="responsable" id="responsable" class="form-control" placeholder="Responsable" required>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Crear Punto de Encuentro</button>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    function initMap() {
        var latitud = -0.9374805;
        var longitud = -78.6161327;

        var latitud_longitud = new google.maps.LatLng(latitud, longitud);
        var mapa = new google.maps.Map(document.getElementById('mapa_cliente'), {
            center: latitud_longitud,
            zoom: 15,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        var marcador = new google.maps.Marker({
            icon: "https://icons.iconarchive.com/icons/hopstarter/sleek-xp-basic/48/User-Group-icon.png",
            position: latitud_longitud,
            map: mapa,
            title: "Seleccione la dirección",
            draggable: true
        });

        google.maps.event.addListener(marcador, 'dragend', function(event) {
            document.getElementById("latitud").value = this.getPosition().lat();
            document.getElementById("longitud").value = this.getPosition().lng();
        });
    }
    
    window.onload = function() {
        initMap();
    };
</script>
@endsection