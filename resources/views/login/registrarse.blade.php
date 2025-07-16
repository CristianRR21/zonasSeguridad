<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('plantilla/administrador/build/assets/img/apple-icon.png') }}" />
    <link rel="icon" type="image/png" href="{{ asset('plantilla/administrador/build/assets/img/favicon.png') }}" />
    <title>Registro</title>

    <!-- Fonts and icons -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>

    <!-- Argon Dashboard Tailwind CSS -->
    <link href="{{ asset('plantilla/administrador/build/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('plantilla/administrador/build/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <link href="{{ asset('plantilla/administrador/build/assets/css/argon-dashboard-tailwind.css?v=1.0.1') }}" rel="stylesheet" />
    <style>

    .error {
        color: red;
        font-family: 'Montserrat';
    }

    .form-control.error {
        border: 1px solid red;
    }
</style>
  </head>

  <body class="m-0 font-sans antialiased font-normal bg-white text-slate-500">

    <main class="mt-0 transition-all duration-200 ease-in-out">
      <section class="min-h-screen">
        <!-- Hero con fondo -->
        <div class="relative flex items-start pt-12 pb-56 m-4 overflow-hidden bg-cover min-h-50-screen rounded-xl bg-[url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signup-cover.jpg')] bg-top">
          <span class="absolute top-0 left-0 w-full h-full bg-gradient-to-tl from-zinc-800 to-zinc-700 opacity-60"></span>
          <div class="container z-10">
            <div class="flex flex-wrap justify-center -mx-3">
              <div class="w-full max-w-full px-3 mx-auto text-center lg:w-5/12">
                <h1 class="mt-12 mb-2 text-white">¡Bienvenido!</h1>
                <p class="text-white">Crea una cuenta para acceder a la aplicación</p>
              </div>
            </div>
          </div>
        </div>

        <!-- Formulario -->
        <div class="container">
          <div class="flex flex-wrap -mx-3 -mt-48 md:-mt-56 lg:-mt-48">
            <div class="w-full max-w-full px-3 mx-auto md:w-7/12 lg:w-5/12 xl:w-4/12">
              <div class="relative z-0 flex flex-col bg-white shadow-xl rounded-2xl p-6">
                <div class="mb-6 text-center">
                  <h5 class="text-lg font-bold text-slate-700">Regístrate</h5>
                </div>

                <form method="POST" action="{{ route('users.store') }}" id="form">
                  @csrf

                  <div class="mb-4">
                    <label for="name" class="block mb-2 text-sm font-medium text-slate-700">Nombre</label>
                    <input name="name" id="name" type="text" placeholder="Ingresa tu nombre" class="w-full px-4 py-2 text-sm border border-slate-300 rounded-lg focus:outline-none focus:ring focus:ring-indigo-300"  />
                  </div>

                  <div class="mb-4">
                    <label for="email" class="block mb-2 text-sm font-medium text-slate-700">Correo electrónico</label>
                    <input name="email" id="email" type="email" placeholder="ejemplo@correo.com" class="w-full px-4 py-2 text-sm border border-slate-300 rounded-lg focus:outline-none focus:ring focus:ring-indigo-300"  />
                  </div>

                  <div class="mb-6">
                    <label for="password" class="block mb-2 text-sm font-medium text-slate-700">Contraseña</label>
                    <input name="password" id="password" type="password" placeholder="Crea una contraseña" class="w-full px-4 py-2 text-sm border border-slate-300 rounded-lg focus:outline-none focus:ring focus:ring-indigo-300"  />
                  </div>

                  <input type="hidden" name="role" value="visitante">


                  <div class="text-center">
                    <button type="submit" class="w-full px-6 py-2 text-sm font-semibold text-white bg-blue-500 rounded-lg hover:bg-blue-600 transition-all duration-200">
                      Registrarse <i class="fas fa-sign-in-alt ml-2 text-white"></i>
                    </button>
                  </div><br>
                  <div class="border-black/12.5 rounded-b-2xl border-t-0 border-solid p-6 text-center pt-0 px-1 sm:px-6">
                    <p class="mx-auto mb-6 leading-normal text-sm">
                      <a href="/" class="font-semibold text-transparent bg-clip-text bg-gradient-to-tl from-blue-500 to-violet-500">Iniciar Sesión</a>
                    </p>
                  </div>                  
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Footer -->
      <footer class="py-12">
        <div class="container">
          <div class="flex-shrink-0 w-full max-w-full mx-auto mb-6 text-center lg:w-8/12">
            <a href="#" class="mr-6 text-slate-400"><span class="text-lg fab fa-dribbble"></span></a>
            <a href="#" class="mr-6 text-slate-400"><span class="text-lg fab fa-twitter"></span></a>
            <a href="#" class="mr-6 text-slate-400"><span class="text-lg fab fa-instagram"></span></a>
            <a href="#" class="mr-6 text-slate-400"><span class="text-lg fab fa-pinterest"></span></a>
            <a href="#" class="mr-6 text-slate-400"><span class="text-lg fab fa-github"></span></a>
          </div>
          <div class="w-8/12 max-w-full px-3 mx-auto mt-1 text-center">
            <p class="mb-0 text-slate-400">
              Copyright ©
              <script>document.write(new Date().getFullYear());</script>
              Sistema de Seguridad.
            </p>
          </div>
        </div>
      </footer>
    </main>

    <!-- Scripts -->
  
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
          required: "Por favor ingresa tu nombre",
          minlength: "El nombre debe tener al menos 5 caracteres",
          maxlength: "El nombre no puede superar los 50 caracteres"
        },
        email: {
          required: "Por favor ingresa tu correo electrónico",
          email: "Por favor ingresa un correo válido"
        },
        password: {
          required: "Por favor ingresa una contraseña",
          minlength: "La contraseña debe tener al menos 6 caracteres"
        }
      }
    });
 
</script>
 <script src="{{ asset('plantilla/administrador/build/assets/js/plugins/perfect-scrollbar.min.js') }}" async></script>
    <script src="{{ asset('plantilla/administrador/build/assets/js/argon-dashboard-tailwind.js?v=1.0.1') }}" async></script>
  </body>

</html>
