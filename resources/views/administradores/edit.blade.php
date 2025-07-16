@extends('layout.administrador')
@section('contenido')

<div class="container mt-5">
  <div class="row g-4">
    <div class="col-md-12">
      <div class="card shadow border-0">
        <div class="card-body">
       
    <h3>Editar Administrador</h3>

    <form action="{{ route('users.update', $usuario->id) }}" method="POST" id="form">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="name" value="{{ $usuario->name }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Correo</label>
            <input type="email" name="email" value="{{ $usuario->email }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Contraseña (dejar en blanco para no cambiar)</label>
            <input type="password" name="password" class="form-control">
        </div>

        <button type="submit" class="btn btn-outline-primary">Actualizar</button>
        <a href="{{ url('/admin/Index') }}" class="btn btn-outline-danger">Cancelar</a>
    </form>
  </div>
      </div>
    </div>

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
        }
      }
    });
 
</script>

@endsection
