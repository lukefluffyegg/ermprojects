<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    @include('layouts.partials.head')
</head>
<body>
    <div id="app">
        @include('layouts.partials.nav')
        @yield('content')
    </div>

    @include('layouts.partials.footer')
</body>
</html>
