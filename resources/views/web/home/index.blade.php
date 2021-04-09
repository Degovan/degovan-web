@extends('web.layouts.app')

@section('content')

    @include('web.home.components.header')

    {{-- @include('web.home.components.why-us') --}}

    @include('web.home.components.services')

    @include('web.home.components.our-team')

    @include('web.home.components.blog')
    
    @include('web.home.components.testimonials')
    
@endsection