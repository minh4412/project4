
@if (Session::exists('id'))
    @include('layouts.navbars.navs.auth')
@else
    @include('layouts.navbars.navs.guest')
@endif
