@extends('layout.administrador')
@section('contenido')
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBG_To8UqS__6eQgWi_lDrb0rOtdw1bQGo&libraries=places&callback=initMap"></script>

<div class="container mt-5">
    <div class="card shadow-lg p-4">
    
    <div class='row'>
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <h1 class="text-center mb-4">Editar Zona de Riesgo</h1>
            <form action="{{ route('riesgos.update' ,$riesgo->id) }}" method="POST" id="frm_riesgo">
                @csrf
                @method('PUT') 
                <input type="hidden" id="id" name="name" value="{{$riesgo->id}}">

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre de la zona de riesgo</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $riesgo->nombre }}" placeholder="Ingrese el nombre ">
                </div>
                <div class="mb-3">
                    <label for="descripion" class="form-label">Descripción</label>
                    <input type="text" name="descripcion" id="descripcion" class="form-control" value="{{ $riesgo->descripcion }}"placeholder="Ingrese la descripcion" >
                </div>


                <div class="mb-3">
                    <label for="nivel" class="form-label">Nivel de riesgo</label>
                    <select name="nivel" id="nivel" class="form-control">
                        <option value="">---Seleccione una opción---</option>
                        <option value="ALTO" {{ $riesgo->nivel === 'ALTO' ? 'selected' : '' }}>ALTO</option>
                        <option value="MEDIO" {{ $riesgo->nivel === 'MEDIO' ? 'selected' : '' }}>MEDIO</option>
                        <option value="BAJO" {{ $riesgo->nivel === 'BAJO' ? 'selected' : '' }}>BAJO</option>
                    </select>
                </div>

                
                <div class="row">
                    <div class="col-md-5">
                        <label for=""><b>COORDENADA N° 1</b></label> <br>
                        <label for=""><b>Latitud:</b></label><br>
                        <input type="number" name="latitudUno" id="latitudUno" value="{{$riesgo->latitudUno}}"
                        class="form-control" readonly placeholder="Seleccione la latitud ..."><br>
                        <label for=""><b>Longitud:</b></label><br>
                        <input type="number" name="longitudUno" id="longitudUno" value="{{$riesgo->longitudUno}}"
                        class="form-control" readonly placeholder="Seleccione la longitud ...">
                    </div>
                    <div class="col-md-7">
                        <div id="mapaUno" style="height:180px; 
                        width:100%; border:2px solid black;"></div>
                    </div>
                </div>

                <br>

                    <div class="row">
                    <div class="col-md-5">
                        <label for=""><b>COORDENADA N° 2</b></label> <br>
                        <label for=""><b>Latitud:</b></label><br>
                        <input type="number" name="latitudDos" id="latitudDos" value="{{$riesgo->latitudDos}}"
                        class="form-control" readonly placeholder="Seleccione la latitud ..."><br>
                        <label for=""><b>Longitud:</b></label><br>
                        <input type="number" name="longitudDos" id="longitudDos" value="{{$riesgo->longitudDos}}"
                        class="form-control" readonly placeholder="Seleccione la longitud ...">
                    </div>
                    <div class="col-md-7">
                        <div id="mapaDos" style="height:180px; 
                        width:100%; border:2px solid black;"></div>
                    </div>
                </div>
                <br>

                       <div class="row">
                    <div class="col-md-5">
                        <label for=""><b>COORDENADA N° 3</b></label> <br>
                        <label for=""><b>Latitud:</b></label><br>
                        <input type="number" name="latitudTres" id="latitudTres" value="{{$riesgo->latitudTres}}"
                        class="form-control" readonly placeholder="Seleccione la latitud ..."><br>
                        <label for=""><b>Longitud:</b></label><br>
                        <input type="number" name="longitudTres" id="longitudTres" value="{{$riesgo->longitudTres}}"
                        class="form-control" readonly placeholder="Seleccione la longitud ...">
                    </div>
                    <div class="col-md-7">
                        <div id="mapaTres" style="height:180px; 
                        width:100%; border:2px solid black;"></div>
                    </div>
                </div>
                <br>
                       <div class="row">
                    <div class="col-md-5">
                        <label for=""><b>COORDENADA N° 4</b></label> <br>
                        <label for=""><b>Latitud:</b></label><br>
                        <input type="number" name="latitudCuatro" id="latitudCuatro" value="{{$riesgo->latitudCuatro}}"
                        class="form-control" readonly placeholder="Seleccione la latitud ..."><br>
                        <label for=""><b>Longitud:</b></label><br>
                        <input type="number" name="longitudCuatro" id="longitudCuatro" value="{{$riesgo->longitudCuatro}}"
                        class="form-control" readonly placeholder="Seleccione la longitud ...">
                    </div>
                    <div class="col-md-7">
                        <div id="mapaCuatro" style="height:180px; 
                        width:100%; border:2px solid black;"></div>
                    </div>
                </div>
                <br>
                       <div class="row">
                    <div class="col-md-5">
                        <label for=""><b>COORDENADA N° 5</b></label> <br>
                        <label for=""><b>Latitud:</b></label><br>
                        <input type="number" name="latitudCinco" id="latitudCinco" value="{{$riesgo->latitudCinco}}"
                        class="form-control" readonly placeholder="Seleccione la latitud ..."><br>
                        <label for=""><b>Longitud:</b></label><br>
                        <input type="number" name="longitudCinco" id="longitudCinco" value="{{$riesgo->longitudCinco}}"
                        class="form-control" readonly placeholder="Seleccione la longitud ...">
                    </div>
                    <div class="col-md-7">
                        <div id="mapaCinco" style="height:180px; 
                        width:100%; border:2px solid black;"></div>
                    </div>
                </div>
                <br>

                <div class="row">
                    <div class="col-md-12">
                        <div id="mapa-poligono" 
                        style="height:500px; width:100%;
                          border:2px solid blue;">

                        </div>
                              <br>
                    </div>
               
     
                <center>
                    <button type="submit" class="btn btn-outline-success">
                        <i class="fa fa-save"></i> Actualizar
                        
                    </button>
                    &nbsp;&nbsp;&nbsp;
                    <a href="{{ route('riesgos.index') }}" class="btn btn-outline-danger">
                        <i class="fa fa-times"></i> Cancelar
                    </a>
                    &nbsp;&nbsp;&nbsp;
                      <button type="button" class="btn btn-outline-primary" 
                        onclick="graficarZona();">
                        Graficar Zona de Riesgo
                     </button>
                </center>
            </form>
        </div>
    </div>
    </div>

</div>
</div>

<script>
lat1= {{$riesgo->latitudUno}};
lng1= {{$riesgo->longitudUno}};

lat2= {{$riesgo->latitudDos}};
lng2= {{$riesgo->longitudDos}};

lat3= {{$riesgo->latitudTres}};
lng3= {{$riesgo->longitudTres}};

lat4= {{$riesgo->latitudCuatro}};
lng4= {{$riesgo->longitudCuatro}};

lat5= {{$riesgo->latitudCinco}};
lng5= {{$riesgo->longitudCinco}};

</script>
<script type="text/javascript">

     var mapaPoligono;//Variable Global

      function initMap(){
       // alert("mapa ok");
        var latitud_longitud= new google.maps.LatLng(-0.9374805,-78.6161327);

        //INICIO COORDENADA 1
        var mapaUno=new google.maps.Map(
          //var latitud_longitud= new google.maps.LatLng("{{$riesgo->latitudUno}}","{{$riesgo->longitudUno}}");

          document.getElementById('mapaUno'),
          {
            center:{lat: lat1, lng: lng1},
            zoom:15,
            mapTypeId:google.maps.MapTypeId.ROADMAP
          }
        );
        var marcadorUno=new google.maps.Marker({
          position:{lat: lat1, lng: lng1},
          map:mapaUno,
          title:"Seleccione la coordenada 1",
          draggable:true
        });
        google.maps.event.addListener(
          marcadorUno,
          'dragend',
          function(event){
            var latitud=this.getPosition().lat();
            var longitud=this.getPosition().lng();
            document.getElementById("latitudUno").value=latitud;
            document.getElementById("longitudUno").value=longitud;
          }
        );
        //FIN COORDENADA 1

        //INICIO COORDENADA 2
        var mapaDos=new google.maps.Map(
          document.getElementById('mapaDos'),
          {
            center:{lat: lat2, lng: lng2},
            zoom:15,
            mapTypeId:google.maps.MapTypeId.ROADMAP
          }
        );
        var marcadorDos=new google.maps.Marker({
          position:{lat: lat2, lng: lng2},
          map:mapaDos,
          title:"Seleccione la coordenada 2",
          draggable:true
        });
        google.maps.event.addListener(
          marcadorDos,
          'dragend',
          function(event){
            var latitud=this.getPosition().lat();
            var longitud=this.getPosition().lng();
            document.getElementById("latitudDos").value=latitud;
            document.getElementById("longitudDos").value=longitud;
          }
        );
        //FIN COORDENADA 2


        //INICIO COORDENADA 3
        var mapaTres=new google.maps.Map(
          document.getElementById('mapaTres'),
          {
            center:{lat: lat3, lng: lng3},
            zoom:15,
            mapTypeId:google.maps.MapTypeId.ROADMAP
          }
        );
        var marcadorTres=new google.maps.Marker({
          position:{lat: lat3, lng: lng3},
          map:mapaTres,
          title:"Seleccione la coordenada 3",
          draggable:true
        });
        google.maps.event.addListener(
          marcadorTres,
          'dragend',
          function(event){
            var latitud=this.getPosition().lat();
            var longitud=this.getPosition().lng();
            document.getElementById("latitudTres").value=latitud;
            document.getElementById("longitudTres").value=longitud;
          }
        );
        //FIN COORDENADA 3



        //INICIO COORDENADA 4
        var mapaCuatro=new google.maps.Map(
          document.getElementById('mapaCuatro'),
          {
            center:{lat: lat4, lng: lng4},
            zoom:15,
            mapTypeId:google.maps.MapTypeId.ROADMAP
          }
        );
        var marcadorCuatro=new google.maps.Marker({
          position:{lat: lat4, lng: lng4},
          map:mapaCuatro,
          title:"Seleccione la coordenada 4",
          draggable:true
        });
        google.maps.event.addListener(
          marcadorCuatro,
          'dragend',
          function(event){
            var latitud=this.getPosition().lat();
            var longitud=this.getPosition().lng();
            document.getElementById("latitudCuatro").value=latitud;
            document.getElementById("longitudCuatro").value=longitud;
          }
        );
        //FIN COORDENADA 4

        var mapaCinco=new google.maps.Map(
          document.getElementById('mapaCinco'),
          {
            center:{lat: lat5, lng: lng5},
            zoom:15,
            mapTypeId:google.maps.MapTypeId.ROADMAP
          }
        );
        var marcadorCinco=new google.maps.Marker({
          position:{lat: lat5, lng: lng5},
          map:mapaCinco,
          title:"Seleccione la coordenada 5",
          draggable:true
        });
        google.maps.event.addListener(
          marcadorCinco,
          'dragend',
          function(event){
            var latitud=this.getPosition().lat();
            var longitud=this.getPosition().lng();
            document.getElementById("latitudCinco").value=latitud;
            document.getElementById("longitudCinco").value=longitud;
          }
        );

        //Dibujando el mapa del poligono
        mapaPoligono = new google.maps.Map(
               document.getElementById("mapa-poligono"), {
          zoom: 15,
          center: latitud_longitud, 
          mapTypeId:google.maps.MapTypeId.ROADMAP
        });

      }


      function graficarZona(){
            //alert("Graficando");

            //Capturando coordenadas seleccionas en el mapa
            var coordenada1=new google.maps.LatLng(
                    document.getElementById('latitudUno').value,
                    document.getElementById('longitudUno').value
            );

            var coordenada2=new google.maps.LatLng(
                    document.getElementById('latitudDos').value,
                    document.getElementById('longitudDos').value
            );

            var coordenada3=new google.maps.LatLng(
                    document.getElementById('latitudTres').value,
                    document.getElementById('longitudTres').value
            );
            
            var coordenada4=new google.maps.LatLng(
                    document.getElementById('latitudCuatro').value,
                    document.getElementById('longitudCuatro').value
            );
              var coordenada5=new google.maps.LatLng(
                    document.getElementById('latitudCinco').value,
                    document.getElementById('longitudCinco').value
            );
            
            //Arreglo con las 4 coordenadas
            var coordenadas = [
                coordenada1,
                coordenada2,
                coordenada3,
                coordenada4,
                coordenada5
            ];

            // Crear el polígono
            var poligono = new google.maps.Polygon({
                paths: coordenadas,
                strokeColor: "#FF0000",
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: "#00FF00",
                fillOpacity: 0.35,
            });

            poligono.setMap(mapaPoligono);
      }

    </script>


<script>
    $("#frm_riesgo").validate({
        rules: {
            nombre: {
                required: true,
                minlength: 5,
                maxlength: 50
            },
            descripcion: {
                required: true,
                minlength: 5,
                maxlength: 255
            },
            nivel: {
                required: true
            },
            latitudUno: 
            { required: true },
            longitudUno: 
            { required: true },
            latitudDos: 
            { required: true },
            longitudDos:
            { required: true },
            latitudTres: 
            { required: true },
            longitudTres: 
            { required: true },
            latitudCuatro:
            { required: true },
            longitudCuatro: 
            { required: true },
            latitudCinco: 
            { required: true },
            longitudCinco: 
            { required: true }
        },
        messages: {
            nombre: {
                required: "Por favor ingrese el nombre de la zona",
                minlength: "El nombre debe tener al menos 5 caracteres",
                maxlength: "El nombre no debe superar los 50 caracteres"
            },
            descripcion: {
                required: "Por favor ingrese una descripción",
                minlength: "La descripción debe tener al menos 5 caracteres",
                maxlength: "La descripción no debe superar los 255 caracteres"
            },
            nivel: {
                required: "Por favor seleccione el nivel de riesgo"
            },
            latitudUno: 
            { required: "Seleccione la coordenada 1 en el mapa" },
            longitudUno: 
            { required: "Seleccione la coordenada 1 en el mapa" },
            latitudDos: 
            { required: "Seleccione la coordenada 2 en el mapa" },
            longitudDos: 
            { required: "Seleccione la coordenada 2 en el mapa" },
            latitudTres: 
            { required: "Seleccione la coordenada 3 en el mapa" },
            longitudTres: 
            { required: "Seleccione la coordenada 3 en el mapa" },
            latitudCuatro: 
            { required: "Seleccione la coordenada 4 en el mapa" },
            longitudCuatro: 
            { required: "Seleccione la coordenada 4 en el mapa" },
            latitudCinco: 
            { required: "Seleccione la coordenada 5 en el mapa" },
            longitudCinco: 
            { required: "Seleccione la coordenada 5 en el mapa" }
        },
        errorClass: "text-danger",
        errorElement: "small"
    });
</script>

@endsection