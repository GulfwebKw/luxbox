@extends('front.layouts.master')
@section('content')
    @include('front.partials.preloader')
    <div class="wrapper clearfix">
        @include('front.partials.header')
@include('front.partials.slideshow')
@include('front.partials.servicebar')
    @include('front.partials.aboutus')
    @include('front.partials.video')
    @include('front.partials.services')
    @include('front.partials.footer')
    </div>
@endsection