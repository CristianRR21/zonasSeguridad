

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

@extends('layout.administrador')
@section('contenido')

    <h1>DESDE LA VISTA DE INDEX</h1>
    <br><br><br><br><br><br>
    <div>
    <a href="{{route('riesgos.create') }}">Crear nueva zona de riesgo</a>
    </div>

</body>
</html>

@endsection