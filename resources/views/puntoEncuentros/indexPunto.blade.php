@extends('layout.administrador')
@section('contenido')
<div class="container mt-5">
    <div class="card shadow-lg p-4">
    <h1>Puntos de Encuentro</h1>
    <div class="flex flex-col gap-4">
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('puntoEncuentros.create') }}" class="btn btn-outline-success shadow">
                <i class="fa fa-plus-circle"></i>&nbsp;&nbsp; Nuevo Punto de Encuentro
            </a>
        </div>
        <div class="table-responsive">
        <table class="table table-hover align-middle table-bordered text-center shadow-sm">
            <thead class="table-primary">
                <tr>
                    <th>#</th>
                    <th>PUNTO DE ENCUENTRO</th>
                    <th>CAPACIDAD</th>
                    <th>COORDENADAS</th>
                    <th>RESPONSABLE</th>
                    <th>ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                @forelse($puntoEncuentros as $puntoTemp)
                    <tr>
                        <td>{{ $puntoTemp->id }}</td>
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
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">No hay puntos de encuentro registrados aún.</td>
                        </tr>
                @endforelse
            </tbody>
        </table>
        </div>
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