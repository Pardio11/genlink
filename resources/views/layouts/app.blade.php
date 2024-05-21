<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
    <!-----STILE-FOOTER------>
    <style>
        /*------------------*/
        .popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            z-index: 1000;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .popup-content {
            background: #fff;
            padding: 20px;
            border-radius: 5px;
        }

        /*------------------*/

        .site-footer .social-icons {
            text-align: start;
        }

        .site-footer .social-icons a {
            width: 40px;
            height: 40px;
            line-height: 40px;
            margin-left: 6px;
            margin-right: 0;
            border-radius: 100%;
            background-color: #171718;
        }

        .social-icons {
            padding-left: 0;
            margin-bottom: 0;
            list-style: none;
        }

        .social-icons li {
            display: inline-block;
            margin-bottom: 4px;
        }

        .social-icons li.title {
            /* margin-right:15px; */
            text-transform: uppercase;
            color: #96a2b2;
            font-weight: 700;
            font-size: 13px;
        }

        .social-icons a {
            background-color: #161618;
            color: #818a91;
            font-size: 16px;
            display: inline-block;
            line-height: 44px;
            width: 44px;
            height: 44px;
            text-align: center;
            margin-right: 8px;
            border-radius: 100%;
            -webkit-transition: all .2s linear;
            -o-transition: all .2s linear;
            transition: all .2s linear
        }

        .social-icons a:active,
        .social-icons a:focus,
        .social-icons a:hover {
            color: #fff;
            background-color: #29aafe
        }

        .social-icons.size-sm a {
            line-height: 34px;
            height: 34px;
            width: 34px;
            font-size: 14px
        }

        .social-icons a.facebook:hover {
            background-color: #3b5998
        }

        .social-icons a.twitter:hover {
            background-color: #00aced
        }

        .social-icons a.linkedin:hover {
            background-color: #007bb6
        }

        .social-icons a.instragram:hover {
            background-color: #ea4c89
        }
    </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="font-sans antialiased">
<x-banner />

<div class="flex flex-col min-h-screen bg-gray-100">
    @livewire('navigation-menu')

    <!-- Page Heading -->
    @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endif

    <!-- Page Content -->
    <main class="flex-grow">
        {{ $slot }}
    </main>

    <!---FOOTER---->
    <footer class="bg-[#161618] text-white py-7 md:py-5 text-base leading-6 ">
        <div class="container mx-auto">
            <div class="md:flex md:flex-wrap">
                <div class="md:w-1/2 md:pr-8 text-left">
                    <h6 class="text-lg text-white uppercase ml-11 mb-5 md:mt-0">GenLink</h6>
                    <p class="text-base mt-4 text-gray-400 ml-11 text-justify">GenLink, la solución de vanguardia para tus necesidades de internet. Como líderes en la industria de la conectividad, nos enorgullece brindar a nuestros clientes un acceso rápido y confiable a la web. Nuestro compromiso con la innovación y la calidad nos ha permitido establecer nuevos estándares en el mundo de la tecnología.</p>
                </div>

                <div class="md:w-1/4 text-left">
                    <h6 class="text-lg text-white uppercase">Categorias</h6>
                    <ul class="mt-4">
                        <li><a href="{{ route('dashboard') }}" class="text-sm text-gray-400 hover:text-white px-2 py-1 ">Home</a></li>
                        <li><a href="{{ route('mis-pagos') }}" class="text-sm text-gray-400 hover:text-white px-2 py-1">Mis pagos</a></li>
                        <li><a href="{{ route('preguntas-frecuentes') }}" class="text-sm text-gray-400 hover:text-white px-2 py-1">Preguntas frecuentes</a></li>
                        <li><a href="{{ route('reportes') }}" class="text-sm text-gray-400 hover:text-white px-2 py-1">Reportes</a></li>
                    </ul>
                </div>

                <div class="md:w-1/4 text-left">
                    <h6 class="text-lg text-white uppercase">Accesos rápidos</h6>
                    <ul class="mt-4">
                        @can('cliente')
                        <li><a href="" class="text-sm text-gray-400 hover:text-white px-2 py-1">Número de cliente #{{ Auth::user()->cliente->n_id }} </a></li>
                        @endcan
                        <li><a href="{{ route('profile.show') }}" class="text-sm text-gray-400 hover:text-white px-2 py-1">Perfil</a></li>
                        <li><a href="{{ route('logout') }}" class="text-sm text-gray-400 hover
                          :text-white px-2 py-1">Salir</a></li>
                          <li><a href="" class="text-sm text-gray-400 hover:text-white px-2 py-1">Términos y condiciones</a></li>
                          
                      </ul>
                  </div>
              </div>
          </div>
  
          <hr class="border-t border-gray-700 opacity-50 my-5 md:my-0">
  
          <div class="container mx-auto py-0">
              <div class="md:flex md:flex-wrap md:items-center">
                  <div class="md:w-1/2 md:pr-4 text-left md:text-center">
                      <p class="text-sm">&copy; 2023 Todos los derechos reservados por <a href="#" class="font-bold text-blue-600">GenCode</a>.</p>
                  </div>
  
                  <div class="md:w-1/2 md:text-center p-1 mt-3 ">
                      <ul class="social-icons">
                          <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                          <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                          <li><a class="instragram" href="#"><i class="fa fa-instagram"></i></a></li>
                      </ul>
                  </div>
  
              </div>
          </div>
      </footer>
  </div>
  
  @stack('modals')
  
  @livewireScripts
  </body>
  </html>