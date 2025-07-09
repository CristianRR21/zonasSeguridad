
@extends('layout.administrador')
@section('contenido')
<div class="container mt-5">
    <div class="card shadow-lg p-4">
        <h1 class="text-center mb-4">Listado de Zonas de Riesgo</h1>

        @if(session('success'))
            <script>
                Swal.fire({
                    title: "Éxito",
                    text: "{{ session('success') }}",
                    icon: "success",
                });
            </script>
        @endif

        <div class="d-flex justify-content-end mb-3">
            <a href="" class="btn btn-outline-primary shadow">
                <i class="fa fa-globe"></i>&nbsp;&nbsp; Mapa de Zonas de Riesgo
            </a>
            &nbsp;&nbsp;
            <a href="{{route('riesgos.create') }}" class="btn btn-outline-success shadow">
                <i class="fa fa-plus-circle"></i>&nbsp;&nbsp; Nueva Zona de Riesgo
            </a>             
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle table-bordered text-center shadow-sm">
                <thead class="table-success">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Nivel de Riesgo</th>
                        <th>LatitudUno</th>
                        <th>LatitudDos</th>
                        <th>LatitudTres</th>
                        <th>LatitudCuatro</th>
                        <th>LatitudCinco</th>
                        <th>LongitudUno</th>
                        <th>LongitudDos</th>
                        <th>LongitudTres</th>
                        <th>LongitudCuatro</th>
                        <th>LongitudCinco</th>
              
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($riesgos as $riesgo)
                        <tr>
                            <td>{{ $riesgo->id }}</td>
                            <td>{{ $riesgo->nombre }}</td>
                            <td>{{ $riesgo->descripcion }}</td>
                            <td>{{ $riesgo->nivel }}</td>
                            <td>{{ $riesgo->latitudUno }}</td>
                            <td>{{ $riesgo->latitudDos }}</td>
                            <td>{{ $riesgo->latitudTres }}</td>
                            <td>{{ $riesgo->latitudCuatro }}</td>
                            <td>{{ $riesgo->latitudCinco }}</td>
                            <td>{{ $riesgo->longitudUno }}</td>
                            <td>{{ $riesgo->longitudDos }}</td>
                            <td>{{ $riesgo->longitudTres }}</td>
                            <td>{{ $riesgo->longitudCuatro }}</td>
                            <td>{{ $riesgo->longitudCinco }}</td>
                          
                               
                          
                            <td>
                                <a href="" class="btn btn-outline-warning btn-sm me-1" title="Editar">
                                    <i class="fa fa-pen"></i>
                                </a>
                                <form action="" method="POST" class="d-inline form-eliminar">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm btn-eliminar" title="Eliminar">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">No hay zonas de riesgo registradas aún.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.btn-eliminar').forEach(button => {
            button.addEventListener('click', function (event) {
                event.preventDefault();
                Swal.fire({
                    title: '¿Eliminar esta zona?',
                    text: 'Esta acción no se puede deshacer.',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.closest('form').submit();
                    }
                });
            });
        });
    });
</script>
@endsection
