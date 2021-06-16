<body class="nav-md ">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="{{ route('admin.index') }}" class="site_title"><i class="fas fa-basketball-ball"></i> </a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="{{ Auth::user()->image_path }}" alt="Imagen del usuario" class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Bienvenido,</span>
                            <h2>{{ Auth::user()->name }}</h2>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>General</h3>
                            <ul class="nav side-menu">

                                <li><a><i class="fas fa-user"></i> Personas <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ route('admin.players.index') }}">Jugadores</a></li>
                                        <li><a href="{{ route('admin.coaches.index') }}">Entrenadores</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ route('admin.teams.index') }}"><i class="fa fa-users"></i>
                                        Equipos</a>
                                </li>
                                <li><a><i class="fas fa-basketball-ball"></i> Partidos <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="{{ route('admin.games.index') }}">Partidos por jugar</a></li>
                                        <li><a href="{{ route('admin.results.index') }}"></i>Resultados</a></li>
                                    </ul>
                                </li>


                            </ul>
                        </div>
                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">


                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>
