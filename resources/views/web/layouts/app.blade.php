<!DOCTYPE html>
<html lang="en">
<head>
    @include('web.layouts.partials.head')
    @yield('stylesheet')
    <title>{{ $title }} | Degovan - Jasa Pembuatan Aplikasi, Website, dll</title>
</head>
<body>
    @include('web.layouts.partials.navbar')
    <div id="root">
        @yield('content')
    </div>

    @include('web.layouts.partials.footer')
    @include('web.layouts.partials.script')
    @yield('script')
</body>
</html>