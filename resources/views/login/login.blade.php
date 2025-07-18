<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('plantilla/administrador/build/assets/img/apple-icon.png') }}" />
    <link rel="icon" type="image/png" href="{{ asset('plantilla/administrador/build/assets/img/favicon.png') }}" />
    <title>Iniciar Sesión</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Nucleo Icons -->
    <link href="{{ asset('plantilla/administrador/build/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('plantilla/administrador/build/assets/css/nucleo-svg.css') }}" rel="stylesheet" />

    <script src="{{ asset('plantilla/administrador/build/assets/js/argon-dashboard-tailwind.js') }}" async></script>

    <!-- Main Styling -->
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

  <body class="m-0 font-sans antialiased font-normal bg-white text-start text-base leading-default text-slate-500">
    <div class="container sticky top-0 z-sticky">
      <div class="flex flex-wrap -mx-3">
        <div class="w-full max-w-full px-3 flex-0">
          <!-- Navbar -->
         
        </div>
      </div>
    </div>
    <main class="mt-0 transition-all duration-200 ease-in-out">
      <section>
        <div class="relative flex items-center min-h-screen p-0 overflow-hidden bg-center bg-cover">
          <div class="container z-1">
            <div class="flex flex-wrap -mx-3">
              <div class="flex flex-col w-full max-w-full px-3 mx-auto lg:mx-0 shrink-0 md:flex-0 md:w-7/12 lg:w-5/12 xl:w-4/12">
                <div class="relative flex flex-col min-w-0 break-words bg-transparent border-0 shadow-none lg:py4 dark:bg-gray-950 rounded-2xl bg-clip-border">
                  <div class="p-6 pb-0 mb-0">
                    <h4 class="font-bold">Iniciar Sesión</h4>
                  </div>
                  <div class="flex-auto p-6">
                      <form method="POST" action="{{ route('users.login') }}" id="login">
                            @csrf
                      <div class="mb-4">
                        <p class="mb-0">Email</p>
                        <input type="email" placeholder="Email" name="email" class="focus:shadow-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding p-3 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" />
                      </div>
                      <div class="mb-4">
                        <p class="mb-0">Contraseña</p>
                        <input type="password" placeholder="Contraseña" name="password" class="focus:shadow-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 dark:text-white/80 text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding p-3 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" />
                      </div>
                      
                      <div class="text-center">
                        <button  type= "submit" class="inline-block w-full px-16 py-3.5 mt-6 mb-0 font-bold leading-normal text-center text-white align-middle transition-all bg-blue-500 border-0 rounded-lg cursor-pointer hover:-translate-y-px active:opacity-85 hover:shadow-xs text-sm ease-in tracking-tight-rem shadow-md bg-150 bg-x-25">Iniciar Sesión</button>
                      </div>
                    </form>
                  </div>
                  <div class="border-black/12.5 rounded-b-2xl border-t-0 border-solid p-6 text-center pt-0 px-1 sm:px-6">
                    <p class="mx-auto mb-6 leading-normal text-sm">
                      <a href="{{ url('/registrarse') }}" class="font-semibold text-transparent bg-clip-text bg-gradient-to-tl from-blue-500 to-violet-500">Registrarse</a>
                    </p>
                  </div>
                </div>
              </div>
  
<div class="absolute top-0 right-0 flex-col justify-center hidden w-6/12 h-full max-w-full px-3 pr-0 my-auto text-center flex-0 lg:flex">
  <div
    class="relative flex flex-col justify-center h-full px-24 m-4 overflow-hidden rounded-xl"
    style="
      background-image: url('{{ asset('plantilla/administrador/build/assets/img/logo.png') }}');
      background-position: center;
      background-repeat: no-repeat;
      background-size: contain;
    "
  >
    <span class="absolute top-0 left-0 w-full h-full bg-center bg-cover bg-gradient-to-tl from-blue-500 to-violet-500 opacity-60"></span>
  </div>
</div>

   

            </div>
          </div>
        </div>
      </section>
    </main>
    <footer class="py-12">
      <div class="container">
        <div class="flex flex-wrap -mx-3">
          
          <div class="flex-shrink-0 w-full max-w-full mx-auto mt-2 mb-6 text-center lg:flex-0 lg:w-8/12">
            <a href="javascript:;" target="_blank" class="mr-6 text-slate-400">
              <span class="text-lg fab fa-dribbble"></span>
            </a>
            <a href="javascript:;" target="_blank" class="mr-6 text-slate-400">
              <span class="text-lg fab fa-twitter"></span>
            </a>
            <a href="javascript:;" target="_blank" class="mr-6 text-slate-400">
              <span class="text-lg fab fa-instagram"></span>
            </a>
            <a href="javascript:;" target="_blank" class="mr-6 text-slate-400">
              <span class="text-lg fab fa-pinterest"></span>
            </a>
            <a href="javascript:;" target="_blank" class="mr-6 text-slate-400">
              <span class="text-lg fab fa-github"></span>
            </a>
          </div>
        </div>
        <div class="flex flex-wrap -mx-3">
          <div class="w-8/12 max-w-full px-3 mx-auto mt-1 text-center flex-0">

          </div>
        </div>
      </div>
    </footer>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>

  <script>
      $("#login").validate({
        rules: {
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
          email: {
            required: "Por favor ingresa tu correo",
            email: "Ingresa un correo válido"
          },
          password: {
            required: "Por favor ingresa tu contraseña",
            minlength: "Mínimo 6 caracteres"
          }
        }
      });

  </script>
    <!-- plugin for scrollbar  -->
  <script src="{{ asset('plantilla/administrador/build/assets/js/plugins/perfect-scrollbar.min.js') }}" async></script>
  <!-- main script file  -->
  <script src="{{ asset('plantilla/administrador/build/assets/js/argon-dashboard-tailwind.js?v=1.0.1') }}" async></script>
  </body>

</html>
