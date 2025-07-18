<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('plantilla/administrador/build/assets/img/apple-icon.png') }}" />
    <link rel="icon" type="image/png" href="{{ asset('plantilla/administrador/build/assets/img/favicon.png') }}" />
    <title>Sistema de Seguridad</title>
        <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

    <!-- Font Awesome CDN (puedes dejarlo igual si no lo descargaste local) -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    <!-- Nucleo Icons -->
    <link href="{{ asset('plantilla/administrador/build/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('plantilla/administrador/build/assets/css/nucleo-svg.css') }}" rel="stylesheet" />

    <!-- PopperJS desde CDN -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>

    <!-- jQuery primero (si lo necesitas) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- jQuery Validation -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/localization/messages_es.min.js"></script>

    <!-- Google Maps API -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBG_To8UqS__6eQgWi_lDrb0rOtdw1bQGo&libraries=places&callback=initMap"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Main CSS -->
    <link href="{{ asset('plantilla/administrador/build/assets/css/argon-dashboard-tailwind.css') }}" rel="stylesheet" />
  
    <!--Importar file input drag on drop para pdf  cdnjs  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.5.4/js/fileinput.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.5.4/css/fileinput.min.css">
        
    <!--Idioma español para fileinput-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.5.0/js/locales/es.min.js"></script>

    <!-- DataTables CSS y JS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.min.css">
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.min.js"></script>

    <!-- Librerías para exportación -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.3/js/buttons.print.min.js"></script>

      <!-- CSS para los botones -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.2.3/css/buttons.dataTables.min.css">

    <!-- HTML2Canvas para capturar el mapa -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

  
  </head>

  <body class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-gray-50 text-slate-500">
    <div class="absolute w-full bg-blue-500 dark:hidden min-h-75"></div>
    
    <!-- sidenav  -->
    <aside class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-y-auto antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-xl dark:shadow-none dark:bg-slate-850 max-w-64 ease-nav-brand z-990 xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0" aria-expanded="false">
      <div class="h-19">
        <i class="absolute top-0 right-0 p-4 opacity-50 cursor-pointer fas fa-times dark:text-white text-slate-400 xl:hidden" sidenav-close></i>
        <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap dark:text-white text-slate-700" href="/riesgos">
          <img src="{{ asset('plantilla/administrador/build/assets/img/logo-ct-dark.png') }}"
            class="inline h-full max-w-full transition-all duration-200 dark:hidden ease-nav-brand max-h-8"
            alt="main_logo" />
          <img src="{{ asset('plantilla/administrador/build/assets/img/logo-ct.png') }}"
            class="hidden h-full max-w-full transition-all duration-200 dark:inline ease-nav-brand max-h-8"
            alt="main_logo" />
          <span class="ml-1 font-semibold transition-all duration-200 ease-nav-brand">Sistema de Seguridad</span>
        </a>
      </div>

      <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />

      <div class="items-center block w-auto max-h-screen overflow-auto h-sidenav grow basis-full">
        <ul class="flex flex-col pl-0 mb-0">

          <li class="mt-0.5 w-full">
            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors 
              {{ request()->routeIs('riesgos.*') ? 'bg-blue-500/13 dark:text-white dark:opacity-80 font-semibold text-slate-700' : 'dark:text-white dark:opacity-80' }}" 
              href="{{ route('riesgos.index') }}">
              <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                <i class="relative top-0 text-sm leading-normal text-red-500 fas fa-exclamation-triangle"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Zonas de Riesgo</span>
            </a>
          </li>

          <li class="mt-0.5 w-full">
            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors 
              {{ request()->routeIs('zonas.*') ? 'bg-blue-500/13 dark:text-white dark:opacity-80 font-semibold text-slate-700' : 'dark:text-white dark:opacity-80' }}" 
              href="{{ route('zonas.index') }}">
              <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                <i class="relative top-0 text-sm leading-normal text-green-500 fas fa-shield-alt"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Zonas Seguras</span>
            </a>
          </li>

          <li class="mt-0.5 w-full">
            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors 
              {{ request()->routeIs('puntoEncuentros.*') ? 'bg-blue-500/13 dark:text-white dark:opacity-80 font-semibold text-slate-700' : 'dark:text-white dark:opacity-80' }}" 
              href="{{ route('puntoEncuentros.index') }}">
              <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                <i class="relative top-0 text-sm leading-normal text-blue-500 fas fa-map-marker-alt"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Puntos de Encuentro</span>
            </a>
          </li>


          <li class="mt-0.5 w-full">
            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors 
              {{ request()->routeIs('riesgos.*') ? 'bg-blue-500/13 dark:text-white dark:opacity-80 font-semibold text-slate-700' : 'dark:text-white dark:opacity-80' }}" 
              href="{{ route('reportes.mapa-general') }}">
              <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                <i class="relative top-0 text-sm leading-normal text-red-500 fas fa-chart-bar"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Reporte</span>
            </a>
          </li>




          <li class="mt-0.5 w-full">
            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors 
              {{ request()->routeIs('usuarios.*') ? 'bg-blue-500/13 dark:text-white dark:opacity-80 font-semibold text-slate-700' : 'dark:text-white dark:opacity-80' }}" 
              href="{{ url('admin/Index') }}">
              <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                <i class="relative top-0 text-sm leading-normal text-red-500 fa-solid fa-user"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Gestionar Usuario</span>
            </a>
          </li>

        </ul>
      </div>

       <!-- boton de cerrar sesion -->
      <div class="mx-4 mt-auto mb-4">
        <form method="POST" action="{{ route('logout') }}" class="w-full">
          @csrf
        <button type="submit" class="w-full py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors dark:text-white dark:opacity-80 hover:bg-red-500/10 rounded-lg">
          <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
            <i class="relative top-0 text-sm leading-normal text-red-500 fas fa-sign-out-alt"></i>
          </div>
          <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Cerrar Sesión</span>
        </button>
        </form>
      </div>
    </aside>

    <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
      <!-- Navbar -->
      <nav class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all ease-in shadow-none duration-250 rounded-2xl lg:flex-nowrap lg:justify-start" navbar-main navbar-scroll="false">
        <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
          <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
            <div class="flex items-center md:ml-auto md:pr-4">
              
            </div>
            <ul class="flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full">
              <li class="flex items-center">

              </li>
            </ul>
          </div>
        </div>
      </nav>

      <!-- Contenido principal -->
      <div class="w-full px-6 py-6 mx-auto">
        <div class="flex flex-wrap -mx-3">
          <div class="w-full">
            @yield('contenido')
          </div>
        </div>
      </div>
    </main>

@if(session('mensaje'))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Swal.fire({
            title: 'Confirmación!',
            text: "{{ session('mensaje') }}",
            icon: 'success',
            confirmButtonText: 'OK',
            confirmButtonColor: '#3085d6',
            customClass: {
                confirmButton: 'btn-confirmacion'
            },
            buttonsStyling: false
        });
    </script>
@endif

<style>
  .btn-confirmacion{
      background-color:  #7464e4  !important;
      border-radius: 7px;
      height:40px;
      width:95px;
      color: white !important;


  }
    .no-hover-confirm {
        background-color: #dc3545 !important;
        color: white !important;
        border: none !important;
        
    }
    .no-hover-confirm:hover,
    .no-hover-confirm:focus {
        background-color: #b52a37 !important;
        color: white !important;
    }

    .no-hover-cancel {
        background-color: #6c757d !important;
        color: white !important;
        border: none !important;
        
    }
    .no-hover-cancel:hover,
    .no-hover-cancel:focus {
        background-color: #565e64 !important;
        color: white !important;
    }

    .error {
        color: red;
        font-family: 'Montserrat';
    }

    .form-control.error {
        border: 1px solid red;
    }
</style>


    <!-- Script principal -->
    <script src="{{ asset('plantilla/administrador/build/assets/js/argon-dashboard-tailwind.js') }}" async></script>
  </body>
</html>