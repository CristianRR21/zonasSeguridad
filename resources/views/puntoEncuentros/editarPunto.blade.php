@extends('layout.administrador')
@section('contenido')
<div class="container mt-5">
    <div class="card shadow-lg p-4">
        <h1 class="text-center mb-4">Editar Punto de Encuentro</h1>
        <form action="{{ route('puntoEncuentros.update', $punto->id) }}" method="POST" id="frm_punto">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $punto->id }}">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del punto de encuentro</label>
                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese el nombre elegido" value="{{ $punto->nombre }}">
            </div>
            <div class="mb-3">
                <label for="responsable" class="form-label">Responsable</label>
                <input type="text" name="responsable" id="responsable" class="form-control" placeholder="Ingrese el nombre completo del responsable" value="{{ $punto->responsable }}">
            </div>
            <div class="mb-3">
                <label for="capacidad" class="form-label">Capacidad</label>
                <input type="number" step="1" name="capacidad" id="capacidad" class="form-control" placeholder="Número de capacidad de personas" value="{{ $punto->capacidad }}">
            </div>
            <label for="mapa_cliente" class="form-label">Ubicación del punto de encuentro</label>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="latitud" class="form-label">Latitud</label>
                        <input type="text" name="latitud" id="latitud" class="form-control" readonly value="{{ $punto->latitud }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="longitud" class="form-label">Longitud</label>
                        <input type="text" name="longitud" id="longitud" class="form-control" readonly value="{{ $punto->longitud }}">
                    </div>
                </div>
            </div>
            <div id="mapa_puntos" class="mt-3" style="border:1px solid black; height:300px;"></div><br>
            <center>
                <button type="submit" class="btn btn-outline-success">
                    <i class="fa fa-save"></i> Actualizar
                </button>
                &nbsp;&nbsp;&nbsp;
                <a href="{{ route('puntoEncuentros.index') }}" class="btn btn-outline-danger">
                    <i class="fa fa-times"></i> Cancelar
                </a>
            </center>
        </form>
    </div>
</div>

<script type="text/javascript">
    function initMap() {
        var latitud = parseFloat(document.getElementById("latitud").value);
        var longitud = parseFloat(document.getElementById("longitud").value);

        if (isNaN(latitud) || isNaN(longitud)) {
            latitud = "{{ $punto->latitud }}";
            longitud = "{{ $punto->longitud }}";
        }

        var latitud_longitud = new google.maps.LatLng(latitud, longitud);
        var mapa = new google.maps.Map(document.getElementById('mapa_puntos'), {
            center: latitud_longitud,
            zoom: 12,
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

<script>
    $('#frm_punto').validate({
        rules: {
            nombre: {
                required: true,
                minlength: 5,
                maxlength: 150,
            },
            responsable: {
                required: true,
                minlength: 5,
                maxlength: 150,
            },
            capacidad: {
                required: true,
                number: true,
                step:1,
                min: 1,
                max: 80,
            },
        },
        messages: {
            nombre: {
                required: "Ingrese el nombre del punto de encuentro",
                minlength: "Ingrese un nombre de al menos 5 caracteres",
                maxlength: "Ingrese un nombre de no mas de 150 caracteres"
            },
            responsable: {
                required: "Ingrese el nombre completo del responsable",
                minlength: "Ingrese un nombre de al menos 5 caracteres",
                maxlength: "Ingrese un nombre de no mas de 150 caracteres"
            },
            capacidad: {
                required: "Ingrese el número de capacidad",
                number: "Ingrese un número válido",
                step: "Ingrese un número entero",
                min: "La capacidad de personas debe ser mayor o igual a 1",
                max: "La capacidad de personas no puede ser mayor a 80"
            },
        }
    });
</script>
@endsection