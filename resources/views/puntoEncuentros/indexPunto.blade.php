@extends('layout.administrador')
@section('contenido')
<div class="container mt-5">
    <div class="card shadow-lg p-4">
    <h1>Puntos de Encuentro</h1>
    <div class="flex flex-col gap-4">
        <a href="{{ route('puntoEncuentros.create') }}" class="btn btn-primary">Crear Punto de Encuentro</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>PUNTO DE ENCUENTRO</th>
                    <th>CAPACIDAD</th>
                    <th>COORDENADAS</th>
                    <th>RESPONSABLE</th>
                    <th>ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                @foreach($puntoEncuentros as $puntoTemp)
                    <tr>
                        <td>{{ $puntoTemp->nombre }}</td>
                        <td>{{ $puntoTemp->capacidad }}</td>
                        <td>{{ $puntoTemp->latitud }} {{ $puntoTemp->longitud }}</td>
                        <td>{{ $puntoTemp->responsable }}</td>
                        <td>
                            <a href="{{ route('puntoEncuentros.edit', $puntoTemp->id) }}" class="btn btn-primary">Editar</a>
                            <form action="{{ route('puntoEncuentros.destroy', $puntoTemp->id) }}" method="POST" class="d-inline form-eliminar">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm btn-eliminar" title="Eliminar">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
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
                    title: '¿Eliminar el siguiente punto de encuentro?',
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