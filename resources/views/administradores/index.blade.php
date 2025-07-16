@extends('layout.administrador')

@section('contenido')

<div class="container mt-5">
  <div class="row g-4">

    <!-- Formulario para crear administrador -->
    <div class="col-md-6">
      <div class="card shadow border-0">
        <div class="card-body">
          <h4 class="card-title mb-4">Registrar Nuevo Administrador</h4>

          @if ($errors->any())
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <ul class="mb-0">
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
              </div>
          @endif

          @if(session('mensaje'))
              <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
              <script>
                  Swal.fire({
                      icon: 'success',
                      title: '{{ session("mensaje") }}',
                      showConfirmButton: false,
                      timer: 2000,
                      toast: true,
                      position: 'top-end'
                  });
              </script>
          @endif

          <form action="{{ route('users.store') }}" method="POST">
              @csrf
              <div class="mb-3">
                  <label for="name" class="form-label">Nombre completo</label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="Nombre del administrador" required>
              </div>

              <div class="mb-3">
                  <label for="email" class="form-label">Correo electrónico</label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="correo@ejemplo.com" required>
              </div>

              <div class="mb-3">
                  <label for="password" class="form-label">Contraseña</label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="********" required>
              </div>

              <input type="hidden" name="role" value="admin">

              <div class="text-end">
                  <button type="submit" class="btn btn-primary">
                      Crear Administrador
                  </button>
              </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Tabla de usuarios -->
    <div class="col-md-6">
      <div class="card shadow border-0">
        <div class="card-body">
          <h4 class="card-title mb-4">Administradores Registrados</h4>
          <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle">
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
                            <a href="">Editar</a>
                            <a href="">Eliminar</a>
                        </td>
                    </tr>
                @endforeach
        
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

@endsection
