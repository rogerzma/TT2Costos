<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Login') }}</title>

    <!-- Fonts -->
    <link href="/favicon.ico" rel="shortcut icon">
    <link href="https://framework-gb.cdn.gob.mx/assets/styles/main.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">

        <nav class="navbar navbar-inverse sub-navbar navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#subenlaces">
                     <span class="sr-only">Interruptor de Navegación</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"></a>
                  </div>
                  <div class="collapse navbar-collapse" id="subenlaces">
                    <ul class="nav navbar-nav navbar-right">
                <li class="landing-btn"><a href="https://www.gob.mx/inifap/archivo/articulos">Blog</a></li>
                <li class="landing-btn"><a href="https://www.gob.mx/inifap/archivo/multimedia">Multimedia</a></li>
                <li class="landing-btn"><a href="https://www.gob.mx/inifap/archivo/prensa">
                      Prensa            </a>
                  </li>
                  <li class="landing-btn">
                          <a href="https://www.gob.mx/inifap/archivo/agenda">
                        Agenda            </a>
                    </li>
                <li class="landing-btn">
                        <a href="https://www.gob.mx/inifap/archivo/acciones_y_programas">
                      Acciones y programas            </a>
                  </li>
                <li class="landing-btn">
                        <a href="https://www.gob.mx/inifap/archivo/documentos">
                      Documentos            </a>
                  </li>
                  <li class="landing-btn">
                          <a href="https://vun.inifap.gob.mx/portalweb/_Transparencia">
                        Transparencia            </a>
                    </li>
                <li class="landing-btn">
                        <a href="https://www.gob.mx/agricultura/es/#344">
                      Contacto            </a>
                  </li>
                  </ul>
                </div>
                </div>
              </nav>
                  
      
              <div class="container">
                  <ol class="breadcrumb top-buffer">
                      <li><a href="http://www.gob.mx"><i class="icon icon-home"></i></a></li>
                      <li><a href="http://www.gob.mx/inifap">Instituto Nacional de Investigaciones Forestales, Agrícolas y Pecuarias</a></li>
                      <li><a href="http://www.gob.mx/inifap">Inifap C.E. Zacatecas</a></li>
                      <li><a href="http://www.gob.mx/inifap">Agrocostos</a></li>
                      <li class="active">Iniciar sesión</li>
                  </ol>
              </div>

        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <p>
    <script src="https://framework-gb.cdn.gob.mx/gobmx.js"></script>
    </p>

</body>
</html>