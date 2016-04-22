<html>
    <title>Authentication system</title>
    <body>
        @if(Session::has('global'))
        <p>{{Session::get('global')}}</p>
        @endif
        @include('layouts.navigation')
        @yield('content')
    </body>
</html>


