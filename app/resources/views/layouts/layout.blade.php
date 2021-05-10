@include('layouts.head')

@include('layouts.menu')

@include('layouts.top_navigation')

@yield('contentHeader')

@yield('content')

@yield('contentCerrarDivs')


@include('layouts.footer')

@yield('customJs')
