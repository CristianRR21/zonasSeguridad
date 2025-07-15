
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
            <a href="{{ url('riesgos/mapa') }}" class="btn btn-outline-primary shadow">
                <i class="fa fa-globe"></i>&nbsp;&nbsp; Mapa de Zonas de Riesgo
            </a>
            &nbsp;&nbsp;
            <a href="{{route('riesgos.create') }}" class="btn btn-outline-success shadow">
                <i class="fa fa-plus-circle"></i>&nbsp;&nbsp; Nueva Zona de Riesgo
            </a>             
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle table-bordered text-center shadow-sm" id="tbl_riesgos">
                <thead class="table-success">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Nivel</th>
                        <th>Coordenadas Uno</th>
                        <th>Coordenadas Dos</th>
                        <th>Coordenadas Tres</th>
                        <th>Coordenadas Cuatro</th>
                        <th>Coordenadas Cinco</th>                       
              
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($riesgos as $riesgo)
                        <tr>
                            <td>{{ $riesgo->id }}</td>
                            <td>{{ $riesgo->nombre }}</td>
                            <td>{{ $riesgo->descripcion }}</td>
                            <td>
                                    <span class="badge 
                                    @if($riesgo->nivel === 'BAJO') bg-success 
                                    @elseif($riesgo->nivel === 'MEDIO') bg-warning text-dark 
                                    @elseif($riesgo->nivel === 'ALTO') bg-danger }
                                    @else bg-secondary
                                    @endif">   
                                    {{ $riesgo->nivel }}                                
                                     </span>
                            </td>                            
                            <td>Latitud:{{ $riesgo->latitudUno }} <br>Longuitud:{{ $riesgo->longitudUno }}</td>
                            <td>Latitud:{{ $riesgo->latitudDos }}<br>Longuitud:{{ $riesgo->longitudDos }}</td>
                            <td>Latitud:{{ $riesgo->latitudTres }}<br>Longuitud:{{ $riesgo->longitudTres }}</td>
                            <td>Latitud:{{ $riesgo->latitudCuatro }}<br>Longuitud:{{ $riesgo->longitudCuatro }}</td>
                            <td>Latitud:{{ $riesgo->latitudCinco }}<br>Longuitud:{{ $riesgo->longitudCinco }}</td>
                                               
                               
                          
                            <td>
                                <a href="{{ route('riesgos.edit', $riesgo->id) }}" class="btn btn-outline-warning btn-sm me-1" title="Editar">
                                    <i class="fa fa-pen"></i>
                                </a>
                                <form action="{{ route('riesgos.destroy', $riesgo->id) }}" method="POST" class="d-inline form-eliminar">
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
    let table = new DataTable('#tbl_riesgos', {
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
                    cancelButtonText: 'Cancelar',
                    
                   customClass: {
                        confirmButton: 'no-hover-confirm ',
                        cancelButton: 'no-hover-cancel '
                    }
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
