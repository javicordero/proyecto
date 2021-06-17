 <!-- top navigation -->
 <div class="top_nav">
     <div class="nav_menu">
         <nav>
             <div class="nav toggle">
                 <a id="menu_toggle"><i class="fa fa-bars"></i></a>
             </div>
             <ul class="nav navbar-nav navbar-right">
                 <li class="">
                     <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                         <img src="{{ Auth::user()->image_path }}" alt="">{{ Auth::user()->name }}
                         <span class=" fa fa-angle-down"></span>
                     </a>
                     <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li><a class="dropdown-item" href="{{ route('users.config') }}">Configuración</a></li>
                         <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                                 Cerrar sesión
                             </a>
                             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                 @csrf
                             </form>
                         </li>
                     </ul>
                 </li>
                 <li><a href="{{ route('messages.index') }}" class="dropdown-toggle info-number" aria-expanded="false">
                         <i class="fa fa-envelope-o"></i>
                         @if ( count(Auth::user()->messagesReceived()->where('read', 0)->get()) > 0)
                         <span class="badge bg-green">{{ count(Auth::user()->messagesReceived()->where('read', 0)->get()) }}</span>
                         @endif
                     </a>
                 </li>
             </ul>
         </nav>
     </div>
 </div>
 <!-- /top navigation -->
