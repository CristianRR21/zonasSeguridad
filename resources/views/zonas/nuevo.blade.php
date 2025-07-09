@extends('layout.administrador')

@section('contenido')
<div class="d-flex justify-content-center align-items-center flex-column">
    <div class="card p-4 shadow" style="width: 50%;">
        <br><br><br><br>
        <h1 class="text-center">Nueva Zona Segura</h1>
        <form action="{{ route('zonas.store') }}" method="POST" id="form_nueva_zona">
            @csrf

            <label for="nombre"><b>Nombre de la Zona:</b></label>
            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ej: Zona Escolar, Parque Central"> <br>

            <label for="radio"><b>Radio de Seguridad (metros):</b></label>
            <input type="number" name="radio" id="radio" class="form-control" placeholder="Ej: 200" min="1" step="0.1"> <br>

            <label for="tipo_seguridad"><b>Tipo de Seguridad:</b></label>
            <select name="tipo_seguridad" id="tipo_seguridad" class="form-control">
                <option value="">-- Seleccione un tipo --</option>
                <option value="ALTA">Alta</option>
                <option value="MEDIA">Media</option>
                <option value="BAJA">Baja</option>
            </select> <br>

            <label><b>Ubicación Geográfica:</b></label>
            <div class="row">
                <div class="col-md-6">
                    <label for="latitud"><b>Latitud:</b></label>
                    <input type="number" name="latitud" id="latitud" class="form-control" readonly> <br>
                </div>
                <div class="col-md-6">
                    <label for="longitud"><b>Longitud:</b></label>
                    <input type="number" name="longitud" id="longitud" class="form-control" readonly> <br>
                </div>
            </div>

            <div id="mapa_zona" style="border:2px solid black; height:300px; width:100%;"></div><br>

            <center>
                <button type="submit" class="btn btn-outline-success">
                    <i class="fa fa-save"></i> Guardar
                </button>
                &nbsp;&nbsp;&nbsp;
                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalMapaZona" onclick="graficarZona()">
                    Graficar
                </button>
                &nbsp;&nbsp;&nbsp;
                <a href="{{ route('zonas.index') }}" class="btn btn-outline-danger">
                    <i class="fa fa-times"></i> Cancelar
                </a>
            </center>
        </form>

        <!-- Modal -->
        <div class="modal fade" id="modalMapaZona" tabindex="-1" aria-labelledby="labelMapaZona" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="labelMapaZona">Visualización del Área Segura</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                        <div id="mapa-circulo-zona" style="border:2px solid blue; height:300px; width:100%;"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Aceptar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $("#form_nueva_zona").validate({
            rules: {
                nombre: {
                    required: true,
                    minlength: 2,
                    maxlength: 100
                },
                radio: {
                    required: true,
                    number: true,
                    min: 1
                },
                tipo_seguridad: {
                    required: true
                },
                latitud: {
                    required: true,
                    number: true
                },
                longitud: {
                    required: true,
                    number: true
                }
            },
            messages: {
                nombre: {
                    required: "El nombre es obligatorio",
                    minlength: "Mínimo 2 caracteres",
                    maxlength: "Máximo 100 caracteres"
                },
                radio: {
                    required: "El radio es obligatorio",
                    number: "Debe ser un número",
                    min: "Debe ser mayor que 0"
                },
                tipo_seguridad: {
                    required: "Debe seleccionar un tipo"
                },
                latitud: {
                    required: "Debe seleccionar una ubicación",
                    number: "Debe ser un número válido"
                },
                longitud: {
                    required: "Debe seleccionar una ubicación",
                    number: "Debe ser un número válido"
                }
            },
        });
    });
</script>

<!-- Script de Google Maps -->
<script>
    function initMapaZona() {
        const ubicacionInicial = new google.maps.LatLng(-0.9374805, -78.6161327);
        const mapa = new google.maps.Map(document.getElementById('mapa_zona'), {
            center: ubicacionInicial,
            zoom: 15,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        const marcador = new google.maps.Marker({
            position: ubicacionInicial,
            map: mapa,
            title: "Seleccione la ubicación de la zona",
            draggable: true
        });

        marcador.addListener('dragend', function () {
            const lat = this.getPosition().lat();
            const lng = this.getPosition().lng();
            document.getElementById("latitud").value = lat;
            document.getElementById("longitud").value = lng;
        });
    }

    function graficarZona() {
        const radio = parseFloat(document.getElementById('radio').value);
        const lat = parseFloat(document.getElementById('latitud').value);
        const lng = parseFloat(document.getElementById('longitud').value);

        if (!radio || !lat || !lng) {
            alert("Por favor, seleccione una ubicación y un radio válido.");
            return;
        }

        const centro = new google.maps.LatLng(lat, lng);
        const mapaCirculo = new google.maps.Map(document.getElementById('mapa-circulo-zona'), {
            center: centro,
            zoom: 15,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        new google.maps.Marker({
            position: centro,
            map: mapaCirculo,
            title: "Centro de la zona segura"
        });

        new google.maps.Circle({
            strokeColor: "#28a745",
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: "#28a745",
            fillOpacity: 0.4,
            map: mapaCirculo,
            center: centro,
            radius: radio
        });
    }

    window.onload = initMapaZona;
</script>
@endsection
