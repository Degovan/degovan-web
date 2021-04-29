<!DOCTYPE html>
<html lang="en">
<head>
    @include('web.layouts.partials.head')
    @yield('stylesheet')
    <title>{{ $title }} - Jasa Pembuatan Aplikasi, Website, dll</title>
</head>
<body>
    @if (Route::currentRouteName() == 'web.home')
        @include('web.layouts.partials.navbar')
    @endif
    <div id="root">
        @yield('content')
    </div>

    @include('web.layouts.partials.footer')
    @include('web.layouts.partials.script')
    @yield('script')
</body>
</html>