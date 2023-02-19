@extends('front.layouts.master')
@section('content')
<link rel="stylesheet" href="{{asset('assets/css/leaflet.css')}}" />
<script src="{{asset('assets/js/leaflet.js')}}"></script>
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
                        <li class="nav-item"><a href="{{ url('/faq') }}"><span>{{ __('website.menu.FAQ') }}</span></a></li>
                        <li class="nav-item"><a href="{{ url('/blog') }}"><span>{{ __('website.menu.Blog') }}</span></a></li>
                        <li class="nav-item active"><a href="{{ url('/contact-us') }}"><span>{{ __('website.menu.Contact_Us') }}</span></a></li>
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
        <div class="bg-section"><img src="{{asset('uploads/headers/'.$header->image_header_services)}}" alt="Background" /></div>
        <div class="container">
        <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-6">
        <div class="title text-lg-left">
        <div class="title-heading">
        <h1>{{$header['title_contactus_'.$lang]}}</h1>
        </div>
        <div class="clearfix"></div>
        <ol class="breadcrumb justify-content-lg-start">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('website.menu.Home') }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$header['title_contactus_'.$lang]}}</li>
        </ol>
        </div>
        </div>
        </div>
        </div>
        </section>
        
        <section class="services" id="services-1">
        <div class="container">
        <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-8 offset-lg-2">
        <div class="heading text--center">
        <h2 class="heading-title">{!! $description['title_'.$lang] !!}</h2>
        <p>&nbsp;</p>
        <p>{!! $description['description_'.$lang] !!}</p>
        </div>
        </div>
        </div>



        
        <section class="col-12">
           
            <div id="map" style="width:1400px; height: 500px;" class="col-12"></div>
            <br>
            <a href="https://maps.google.com/?q={{ $map->lat }},{{ $map->lang }}" class="btn btn-primary @if ( $lang == "ar" ) mr-30 @else ml-3 @endif col-12">{{ __('website.contact-us.Go_to_Direction') }}</a>
            
        </section>
        <script>

            var token = 'pk.eyJ1Ijoic29oZWlsdmFpbyIsImEiOiJja2kxcnUyYTUwNW03MnhudDNsOGRwNG94In0.h3EW-3gLt4EccaIq9tImIw';
            var lat = '{{ $map->lat }}'
            var long = '{{ $map->lang }}'
            var sender = L.map('map').setView([lat, long], 15);
            var markersender = L.marker([lat, long]).addTo(sender);
        
        
        
            L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
                attribution: 'LuxBox',
                maxZoom: 18,
                id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1,
                accessToken: token
            }).addTo(sender);
        </script>
        <section class="contact-info">
        <div class="container">
        <div class="row">
        <div class="col-12 col-lg-4">
        <div class="row">
        <div class="col-12 col-sm-6 col-lg-12">
        <div class="contact-details">
        <h6>{{ __('website.contact-us.contact_details') }}</h6>
        <ul class="list-unstyled info">
        <li><span class="fas fa-map-marker-alt"></span><a href="javascript:void(0)">{!! $setting['address_'.$lang] !!}</a></li>
        <li><span class="fas fa-envelope"></span><a href="#"><span class="__cf_email__" data-cfemail="4f0a3e3a263b2e0f78203d202029612c2022">{!! $setting->email !!}</span></a></li>
        <li @if($lang != "en" ) style="direction: ltr;" @endif><span class="fas fa-phone-alt @if($lang != "en" ) float-right @endif"></span><a href="tel:{!! $setting->phone !!}">{!! $setting->phone !!}</a></li>
        </ul>
        </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-12">
        <div class="opening-hours">
        <h6>{{ __('website.contact-us.opening_hours') }}</h6>
        <ul class="list-unstyled">
        <li> <span>{{ __('website.contact-us.Monday_friday') }}</span><span>{!! $description->time_mon_fir !!}</span></li>
        <li> <span>{{ __('website.contact-us.saturday') }}</span><span>{!! $description->time_sat !!}</span></li>
        <li> <span>{{ __('website.contact-us.sunday') }}</span><span>{!! $description->time_sun !!}</span></li>
        </ul>
        </div>
        </div>
        </div>
        </div>
        <div class="col-12 col-lg-8 mb-5">
        <h6>{{ __('website.contact-us.Ask_a_question') }}</h6>
        <form  method="post" action="{{ route('store.message') }}" enctype="multipart/form-data">
            @csrf
        <div class="row">
        <div class="col-12 col-lg-4">
        <input class="form-control" type="text" name="name" placeholder="{{ __('website.contact-us.name') }}" required />
        </div>
        <div class="col-12 col-lg-4">
        <input class="form-control" type="email" name="email" placeholder="{{ __('website.contact-us.email') }}" required />
        </div>
        <div class="col-12 col-lg-4">
        <input class="form-control" type="text" name="website" placeholder="{{ __('website.contact-us.website') }}" required />
        </div>
        <div class="col-12 col-lg-4">
            <input class="form-control" type="text" name="subject" placeholder="{{ __('website.contact-us.subject') }}" required />
            </div>
        <div class="col-12">
        <textarea class="form-control" name="message" cols="30" rows="2" placeholder="{{ __('website.contact-us.message') }}" required></textarea>
        </div>
        <div class="col-4 col-lg-4{{ $errors->has('captcha') ? ' has-error' : '' }}">
            <div class="captcha btn-refresh">
                <span>{!! captcha_img() !!}</span>
               
            
        </div>
        
        
        
        <input id="captcha" type="text" class="form-control mt-1" placeholder="{{ __('website.contact-us.captcha') }}" name="captcha">
                  @if ($errors->has('captcha'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('captcha') }}</strong>
                                    </span>
                                @endif
    </div>
    <br>
        <div class="col-12">
        <input class="btn btn--primary" type="submit" value="{{ __('website.contact-us.Submit') }}" />
        </div>
        </div>
        </form>
        </div>
        </div>
        
        </div>

        </div>
        </section>
        @include('front.partials.footer')
</div>

@endsection