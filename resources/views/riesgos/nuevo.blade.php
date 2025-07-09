@extends('layout.administrador')
@section('contenido')
<div class="container mt-5">
    <div class="card shadow-lg p-4">
    
    <div class='row'>
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <h1 class="text-center mb-4">Nueva Zona de Riesgo</h1>
            <form action="" method="POST" id="frm_riesgo">
                @csrf
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre de la zona de riesgo</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese el nombre ">
                </div>
                <div class="mb-3">
                    <label for="descripion" class="form-label">Descripcion</label>
                    <input type="text" name="descripcion" id="descripcion" class="form-control" placeholder="Ingrese la descripcion" >
                </div>
                 <div class="mb-3">
                    <label for="nivel" class="form-label">Nivel de riesgo </label>
                    <input type="text" name="nivel" id="nivel" class="form-control" placeholder="Ingrese el nivel" >
                </div>
                
                <div class="row">
                    <div class="col-md-5">
                        <label for=""><b>COORDENADA N° 1</b></label> <br>
                        <label for=""><b>Latitud:</b></label><br>
                        <input type="number" name="latitudUno" id="latitudUno"
                        class="form-control" readonly placeholder="Seleccione la latitud ..."><br>
                        <label for=""><b>Longitud:</b></label><br>
                        <input type="number" name="longitudUno" id="longitudUno"
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
                        <input type="number" name="latitudDos" id="latitudDos"
                        class="form-control" readonly placeholder="Seleccione la latitud ..."><br>
                        <label for=""><b>Longitud:</b></label><br>
                        <input type="number" name="longitudDos" id="longitudDos"
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
                        <input type="number" name="latitudTres" id="latitudTres"
                        class="form-control" readonly placeholder="Seleccione la latitud ..."><br>
                        <label for=""><b>Longitud:</b></label><br>
                        <input type="number" name="longitudTres" id="longitudTres"
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
                        <input type="number" name="latitudCuatro" id="latitudCuatro"
                        class="form-control" readonly placeholder="Seleccione la latitud ..."><br>
                        <label for=""><b>Longitud:</b></label><br>
                        <input type="number" name="longitudCuatro" id="longitudCuatro"
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
                        <input type="number" name="latitudCinco" id="latitudCinco"
                        class="form-control" readonly placeholder="Seleccione la latitud ..."><br>
                        <label for=""><b>Longitud:</b></label><br>
                        <input type="number" name="longitudCinco" id="longitudCinco"
                        class="form-control" readonly placeholder="Seleccione la longitud ...">
                    </div>
                    <div class="col-md-7">
                        <div id="mapaCinco" style="height:180px; 
                        width:100%; border:2px solid black;"></div>
                    </div>
                </div>
                <br>


               
                <center>
                    <button type="submit" class="btn btn-outline-success">
                        <i class="fa fa-save"></i> Guardar
                    </button>
                    &nbsp;&nbsp;&nbsp;
                    <a href="{{ route('riesgos.index') }}" class="btn btn-outline-danger">
                        <i class="fa fa-times"></i> Cancelar
                    </a>
                </center>
            </form>
        </div>
    </div>
    </div>
</div>
@endsection