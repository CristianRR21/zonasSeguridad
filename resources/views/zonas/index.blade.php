@extends('layout.administrador')

@section('contenido')
<div class="container mt-5">
    <div class="card shadow-lg p-4">
        <h1 class="text-center mb-4">Listado de Zonas Seguras</h1>

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
            <a href="{{ url('zonas/mapa') }}" class="btn btn-outline-primary shadow">
                <i class="fa fa-globe"></i>&nbsp;&nbsp; Mapa de Zonas Seguras
            </a>
            &nbsp;&nbsp;
            <a href="{{ route('zonas.create') }}" class="btn btn-outline-success shadow">
                <i class="fa fa-plus-circle"></i>&nbsp;&nbsp; Nueva Zona Segura
            </a>
        </div>

        <div class="table-responsive">
            <table id ="tbl-zonas" class="table table-hover align-middle table-bordered text-center shadow-sm">
                <thead class="table-success">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Radio (m)</th>
                        <th>Coordenadas</th>
                        <th>Seguridad</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($zonas as $zona)
                        <tr>
                            <td>{{ $zona->id }}</td>
                            <td>{{ $zona->nombre }}</td>
                            <td>{{ $zona->radio }}</td>
                            <td>
                                <span class="text-muted small">
                                    Lat: {{ $zona->latitud }}, Lng: {{ $zona->longitud }}
                                </span>
                            </td>
                            <td>
                                <span class="badge 
                                    @if($zona->tipo_seguridad === 'ALTA') bg-success 
                                    @elseif($zona->tipo_seguridad === 'MEDIA') bg-warning text-dark 
                                    @else bg-danger 
                                    @endif">
                                    {{ $zona->tipo_seguridad }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('zonas.edit', $zona->id) }}" class="btn btn-outline-warning btn-sm me-1" title="Editar">
                                    <i class="fa fa-pen"></i>
                                </a>
                                <form action="{{ route('zonas.destroy', $zona->id) }}" method="POST" class="d-inline form-eliminar">
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
                            <td colspan="6" class="text-center text-muted">No hay zonas registradas aún.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    let table = new DataTable('#tbl-zonas', {
    layout: {
        topStart: {
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        }
    },
    language: {
        url: 'https://cdn.datatables.net/plug-ins/2.3.2/i18n/es-ES.json',
    },
});
</script>
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
