
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
      <div class="container">
        <a class="navbar-brand" href="{{ route('index') }}"><i class="flaticon-helmet"></i><span>C.B. La Arboleda</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item {{ Route::currentRouteNamed('index') ? 'active' : '' }}"><a href="{{ route('index') }}" class="nav-link">Inicio</a></li>
            <li class="nav-item"><a href="about.html" class="nav-link">El Club</a></li>
            <li class="nav-item {{ Route::currentRouteNamed('teams') ? 'active' : '' }} {{ Route::currentRouteNamed('teams.show') ? 'active' : '' }}"><a href="{{ route('teams') }}" class="nav-link">Equipos</a></li>
            <li class="nav-item {{ Route::currentRouteNamed('results') ? 'active' : '' }}"><a href="{{ route('results') }}" class="nav-link">Resultados</a></li>
            <li class="nav-item {{ Route::currentRouteNamed('contact') ? 'active' : '' }}"><a href="{{ route('contact') }}" class="nav-link">Contacto</a></li>


            @if (Auth::user())
            <li class="nav-item"><a href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                   Logout
               </a>

               <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                   @csrf
               </form>

            @else
            <li class="nav-item cta"><a href="{{ route('login') }}" class="nav-link">Iniciar sesión</a></li>

            @endif

          </ul>
        </div>
      </div>
    </nav>
  <!-- END nav -->
