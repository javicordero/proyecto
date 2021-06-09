@include('admin.layouts.head')

@include('admin.layouts.menu')

@include('admin.layouts.top_navigation')

@yield('contentHeader')

@yield('content')

@yield('contentCerrarDivs')


@include('admin.layouts.footer')

@include('admin.layouts.jsIncludes')

@yield('customJs')

