@if (Auth::user()->role == 1 || Auth::user()->role == 2)
    @include('users.configAdmin')
@else
    @include('users.configPublic')
@endif


