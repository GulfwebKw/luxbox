@extends('front.layouts.master')
@section('content')
    @include('front.partials.preloader')
    <div class="wrapper clearfix" id="wrapperParallax1">
        <header class="header header-1 header-transparent" id="navbar-spy">
            <nav class="navbar navbar-expand-lg  navbar-bordered navbar-sticky" id="primary-menu">
                <a class="navbar-brand @if ( $lang == "ar" ) mr-30 @else ml-3 @endif" href="{{ url('/') }}">
                    <img class="logo logo-light @if ( $lang == "ar" ) mr-30 @else ml-3 @endif" src="{{asset('uploads/settings/'.$setting->logo)}}" alt="{{getSetting('setting')['name_'.$lang]}}" /><img class="logo logo-dark @if ( $lang == "ar" ) mr-30 @else ml-3 @endif" src="{{asset('/uploads/settings/'.getSetting('setting')->logo)}}" alt="{{getSetting('setting')['name_'.$lang]}}" /></a>
                <div class="ml-5">
                    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

                    <div class="collapse navbar-collapse" id="navbarContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item"><a href="{{ url('/') }}"><span>{{ __('website.menu.Home') }}</span></a></li>
                            @if( env('IS_SHIPPING_CALCULATOR_ACTIVE' , true )  ) <li class="nav-item"><a href="{{ url('/shipping') }}"><span>{{ __('website.menu.Shipping_Cost') }}</span></a></li> @endif
                            <li class="nav-item"><a href="{{ url('/works') }}"><span>{{ __('website.menu.How_it_Works') }}</span></a></li>
                            <li class="nav-item"><a href="{{ url('/services') }}"><span>{{ __('website.menu.services') }}</span></a></li>
                            <li class="nav-item"><a href=" {{ url('/about-us') }} "><span>{{ __('website.menu.About-us') }}</span></a></li>
                            <li class="nav-item"><a href=" {{ url('/stores') }} "><span>{{ __('website.menu.stores') }}</span></a></li>
                            <li class="nav-item"><a href="{{ url('/faq') }}"><span>{{ __('website.menu.FAQ') }}</span></a></li>
                            <li class="nav-item"><a href="{{ url('/blog') }}"><span>{{ __('website.menu.Blog') }}</span></a></li>
                            <li class="nav-item"><a href="{{ url('/contact-us') }}"><span>{{ __('website.menu.Contact_Us') }}</span></a></li>
                            @if(Auth::guard('member')->check())
                                <li class="nav-item"><a href="{{ url('/my-account') }}"><span>{{ __('website.menu.My_Account') }}</span></a></li>
                                <li class="nav-item"><a href="{{ route('user.logout') }}"><span>{{ __('website.menu.Logout') }}</span></a></li>
                                <li class="nav-item"></li>
                        </ul>
                        @else
                            <div class="module-container">

                                <div class="module-contact"><a class="btn btn--primary" href="{{ url('/login') }}">{{ __('website.menu.Login_and_Register') }}</a></div>
                                @endif

                                <div class="module module-language">
                                    <div class="selected ml-1"><span>{{ $lang }} </span><i class="fas fa-chevron-down"></i></div>
                                    <div class="lang-list">
                                        <ul>
                                            <li> <a href="{{ route('changeLocale' , ['en']) }}">{{ __('website.menu.english') }}</a></li>
                                            <li> <a href="{{ route('changeLocale' , ['ar']) }}">{{ __('website.menu.arabic') }}</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                    </div>

                </div>

            </nav>
        </header>

        <section class="page-title bg-overlay bg-overlay-dark bg-parallax" id="page-title">
            <div class="bg-section"><img src="{{$image}}" alt="Background" /></div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <div class="title text-lg-left">
                            <div class="title-heading">
                                <h1>{{$resource['title_'.$lang]}}</h1>
                            </div>
                            <div class="clearfix"></div>
                            <ol class="breadcrumb justify-content-lg-start">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('website.menu.Home') }}</a></li>
                                <li class="breadcrumb-item"><a href="{{ $lastPageLink }}">{{ $lastPageTitle }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{$resource['title_'.$lang]}}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="services" id="services-1">
            <div class="container">
                <div class="row">
                    {!! $resource['description_'.$lang] !!}
                </div>
            </div>
        </section>
        @include('front.partials.footer')
    </div>
@endsection