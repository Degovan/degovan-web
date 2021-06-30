<!DOCTYPE html>
<html lang="en">
<head>
    @include('web.layouts.partials.head')
    @yield('stylesheet')
    <title>{{ $title }} - Jasa Pembuatan Aplikasi, Website, dll</title>
</head>
<body class="d-flex flex-column h-100">
    {{-- @if (Route::currentRouteName() == 'web.home') --}}
        @include('web.layouts.partials.navbar')
    {{-- @endif --}}
    <main class="flex-shrink-0">
        @yield('content')
    </main>

    @include('web.layouts.partials.footer')
    @include('web.layouts.partials.script')
    @yield('script')
</body>
</html>