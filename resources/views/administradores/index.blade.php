@extends('layout.administrador')
@section('contenido')

<div class="container mt-5">
  <div class="row g-4">
    <div class="col-md-12">
      <div class="card shadow border-0">
        <div class="card-body">
          <h4 class="card-title mb-4">Registrar Nuevo Administrador</h4>



          <form action="{{ route('users.store') }}" method="POST" id="form">
              @csrf
              <div class="mb-3">
                  <label for="name" class="form-label">Nombre completo</label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="Ingrese el nombre del administrador" >
              </div>

              <div class="mb-3">
                  <label for="email" class="form-label">Correo electrónico</label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="Ingrese el correo del administrador" >
              </div>

              <div class="mb-3">
                  <label for="password" class="form-label">Contraseña</label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="********">
              </div>

              <input type="hidden" name="role" value="admin">

              <div class="text-end">
                  <button type="submit" class="btn btn-outline-primary" >
                      Crear Administrador
                  </button>
              </div>
          </form>
        </div>
      </div>
    </div>

    <div class="col-md-12">
      <div class="card shadow border-0">
        <div class="card-body">
          <h4 class="card-title mb-4">Administradores Registrados</h4>
          <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle" id="tbl-admin">
              <thead class="table-light text-center">
                <tr>
                  <th>#</th>
                  <th>Nombre</th>
                  <th>Correo</th>
                  <th>Rol</th>
                  <th>Acciones</th>

                </tr>
              </thead>
              <tbody>
               @foreach ($usuarios as $usuario)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $usuario->name }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>{{ $usuario->role }}</td>
                        <td>
                            <a href="{{ route('users.edit', $usuario->id) }}" class="btn btn-outline-warning btn-sm me-1" title="Editar">
                                                    <i class="fa fa-pen"></i>
                                                </a>
                                                <form action="{{ route('users.destroy', $usuario->id) }}" method="POST" style="display:inline;" class="form-eliminar">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger btn-sm btn-eliminar">
                                                        <i class="fa fa-trash"></i> Eliminar
                                                        </button>


                                                </form>
                                        </td>
                                    </tr>
                                @endforeach
                        
                            </tbody>
                         <td>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.btn-eliminar').forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                Swal.fire({
                    title: '¿Estás seguro de eliminar este administrador?',
                    text: 'Esta acción no se puede deshacer.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar',
                    customClass: {
                        confirmButton: 'no-hover-confirm',
                        cancelButton: 'no-hover-cancel'
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

<script>
    let table = new DataTable('#tbl-admin', {
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

  
@if(session('error_email'))
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  Swal.fire({
    position: "top-end",
    icon: "error",
    title: "{{ session('error_email') }}",
    showConfirmButton: false,
    timer: 2000,
    width: '500px',
    customClass: {
      title: 'swal2-title-small'
    }
  });
</script>
@endif


<script>
    $("#form").validate({
      rules: {
        name: {
          required: true,
          minlength: 5,
          maxlength: 50
        },
        email: {
          required: true,
          email: true
        },
        password: {
          required: true,
          minlength: 6
        }
      },
      messages: {
        name: {
          required: "Por favor ingrese el nombre",
          minlength: "El nombre debe tener al menos 5 caracteres",
          maxlength: "El nombre no puede superar los 50 caracteres"
        },
        email: {
          required: "Por favor ingrese el correo electrónico",
          email: "Por favor ingresa un correo válido"
        },
        password: {
          required: "Por favor ingrese una contraseña",
          minlength: "La contraseña debe tener al menos 6 caracteres"
        }
      }
    });
 
</script>

          
@endsection
