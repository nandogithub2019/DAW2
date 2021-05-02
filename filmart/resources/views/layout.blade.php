<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/filmart.css">
    <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
    
    <title>Film Art</title>
  </head>
  <body class="bg-dark">
    

    <div class="container-fluid bg-dark">
        {{-- NAVBAR --}}
        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                  <a class="navbar-brand" href="#"><span id="logo" class="fas fa-2x fa-film"></span>  <span id="film">FILM</span>  <span id="art">ART</span></a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                      <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('inicio') }}">Inicio</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ url('categories') }}">Películas</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ url('categories') }}">Categorías</a>
                      </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Más
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                          <li><a class="dropdown-item" href="#">Festivales</a></li>
                          <li><a class="dropdown-item" href="#">Últimas subidas</a></li>
                          <li><hr class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="#">Sobre Nosotros</a></li>
                          <li><a class="dropdown-item" href="{{ url('contacta') }}">Contacta</a></li>
                        </ul>
                      </li>
                    </ul>
                    <form class="d-flex">
                      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                      <button class="btn btn-outline-success colorLogo" type="submit">Search</button>
                    </form>
                    <ul class="navbar-nav mr-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                      @if (Route::has('login'))
                {{-- <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block"> --}}
                        @auth
                          @if (Auth::user()->isAdmin)
                          <li class="nav-item text-sm colorLogo">{{-- text-white --}}
                            <a class="nav-link" href="{{ route('panelAdmin') }}" class="text-sm text-gray-700 underline">Panel Admin</a>
                          </li>
                          @endif
                        <li class="nav-item text-sm colorLogo">{{-- text-white --}}
                            <a class="nav-link" href="{{ url('/perfilUsuario') }}" class="text-sm text-gray-700 underline">{{ Auth::user()->name }}</a>
                        </li>
                        
                          <!-- Authentication -->
                        <li class="nav-item text-sm colorLogo"> 
                           
                          <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-responsive-nav-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log out') }}
                            </x-responsive-nav-link>
                          </form>
                        
                        </li>
                    
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}" class="text-sm text-gray-700 underline">Entra</a>
                    </li>      
                        @if (Route::has('register'))
                        <li class="nav-item">    
                            <a class="nav-link" href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Suscríbete</a>
                        </li>
                        @endif
                    @endauth
                {{-- </div> --}}
                    @endif
                      
                    </ul>
                  </div>
                </div>
            </nav>

        </div>
        {{-- **** CARRUSEL **** --}}
        {{-- <div class="row"> --}}
          @yield('inicio')
        {{-- </div> --}}
        {{-- **** VISTA PELICULA **** --}}
        {{-- <div class="row"> --}}
          @yield('pelicula')
        {{-- </div> --}}
        {{-- **** CUADRÍCULA DE IMAGENES **** --}}
        <div class="row">
          @yield('categories')   
        </div>
        {{-- **** FORMULARIO DE CONTACTO **** --}}
        <div class="row bg-light">
          @yield('contacta')   
        </div>
        {{-- **** FORMULARIO DE PANELADMIN **** --}}
        <div class="row bg-light">
          @yield('panelAdmin')   
        </div>
        {{-- **** FOOTER **** --}}
        <div class="row bg-dark">
          <nav class="navbar navbar-expand-lg navbar-dark justify-content-center">
            
              <ul class="navbar-nav">
                <li class="nav-item active">
                  <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Preguntas Frecuentes</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('contacta') }}">Contacta</a>
                </li>
                
              </ul>
              <div class="social-icons px-5">
                <a class="social-icon" href="#"><i class="fab fa-2x fa-linkedin-in"></i></a>
                <a class="social-icon" href="#"><i class="fab fa-2x fa-github"></i></a>
                <a class="social-icon" href="#"><i class="fab fa-2x fa-twitter"></i></a>
                <a class="social-icon" href="#"><i class="fab fa-2x fa-facebook-f"></i></a>
              </div>
          </nav>
        </div>


    </div>




    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>
