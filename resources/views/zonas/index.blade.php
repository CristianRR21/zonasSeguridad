@extends('layout.administrador')

@section('contenido')
<br><br><br><br><br>
<div class="container mt-4">
    <h1 class="text-center">Listado de Zonas Seguras</h1>

    @if(session('success'))
        <script>
            Swal.fire({
                title: "CONFIRMACIÓN",
                text: "{{ session('success') }}",
                icon: "success",
            });
        </script>
    @endif
    <br>
    <div class="text-end mb-3">
        <a href="{{ route('zonas.create') }}" class="btn btn-outline-success">
            <i class="fa fa-map-marker-alt"></i> Nueva Zona Segura
        </a>
    </div>
    <br>
    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Radio (m)</th>
                    <th>Latitud</th>
                    <th>Longitud</th>
                    <th>Tipo de Seguridad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($zonas as $zona)
                    <tr>
                        <td>{{ $zona->id }}</td>
                        <td>{{ $zona->nombre }}</td>
                        <td>{{ $zona->radio }}</td>
                        <td>{{ $zona->latitud }}</td>
                        <td>{{ $zona->longitud }}</td>
                        <td>{{ $zona->tipo_seguridad }}</td>
                        <td>
                            <a href="{{ route('zonas.edit', $zona->id) }}" class="btn btn-outline-warning btn-sm">
                                <i class="fa fa-pen"></i>
                            </a>

                            <form action="{{ route('zonas.destroy', $zona->id) }}" method="POST" style="display:inline;" class="form-eliminar">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm btn-eliminar">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                @if($zonas->isEmpty())
                    <tr>
                        <td colspan="7" class="text-center">No hay zonas registradas.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.btn-eliminar').forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                Swal.fire({
                    title: '¿Estás seguro de eliminar esta zona?',
                    text: 'Esta acción no se puede deshacer.',
                    icon: 'warning',
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
