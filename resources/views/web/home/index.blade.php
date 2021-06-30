@extends('web.layouts.app')

@section('content')

    @include('web.home.components.header')

    {{-- @include('web.home.components.why-us') --}}

    @include('web.home.components.services')

    {{-- @include('web.home.components.our-team')

    @include('web.home.components.blog')  --}}
    
    @include('web.home.components.testimonials')
    
@endsection


@section('script')
<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

@endsection

