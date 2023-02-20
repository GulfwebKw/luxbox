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
                        <li class="nav-item active"><a href="{{ url('/shipping') }}"><span>{{ __('website.menu.Shipping_Cost') }}</span></a></li>
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


    <section class="cta bg-overlay bg-overlay-dark2 mb-450" id="cta-1">
        <div class="bg-section"><img src="{{asset('uploads/headers/'.$header->image_header_shipping)}}" alt="background" /></div>
        <div class="container">
        <div class="row">
        <div class="col-12 col-lg-6">
        <div class="title text-lg-left">
        <div class="title-heading">
        <h1 style="color:#fff;">{{$header['title_shipping_cost_'.$lang]}}</h1>
        </div>
        <div class="clearfix"></div>
        <ol class="breadcrumb justify-content-lg-start">
        <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('website.menu.Home') }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$header['title_shipping_cost_'.$lang]}}</li>
        </ol>
        </div>
        </div>
        
        <div class="col-12 col-lg-6">
        <div class="icon-set">
        <div class="icon-panel"> <i class="icon flaticon-016-payment-terminal"></i><span>{{ __('website.shipping.transparent_pricing') }}</span></div>
        <div class="icon-panel"> <i class="icon flaticon-014-box-3"></i><span>{{ __('website.shipping.fast_efficient_delivery') }}</span></div>
        <div class="icon-panel"> <i class="icon flaticon-001-scale-1"></i><span>{{ __('website.shipping.warehouse_storage') }}</span></div>
        </div>
        </div>
        
        <div class="col-12">
        <div class="contact-panel">
        <div class="contact-types">
        <a class="button quote-btn active" href=""> <i class="flaticon-020-order"> </i><span>{{ __('website.shipping.SHIPPING_RATE_CALCULATOR') }}</span></a></div>
        
        <div class="contact-card">
        <div class="contact-body">
        <div class="row">
        <div class="col-12 col-lg-12">
{{--        <form class="shippingForm quote-form mb-0" method="post" action="#" onsubmit="findcost();return false;" >--}}
        <div class="row">
        <div class="col-12 col-lg-6">
        <h5 class="card-heading">{{ __('website.shipping.Shipping_to') }}</h5>
        <div class="select-container">
        <select class="form-control w-100" id="country">
        <option value="default">{{ __('website.shipping.Select_the_Country') }}</option>
        <option value="KU">{{ __('website.shipping.Kuwait') }}</option>
        <option value="US">{{ __('website.shipping.usa') }}</option>
        </select>
        </div>
        </div>
        <div class="col-12 col-md-6 col-lg-6">
        <h5 class="card-heading">{{ __('website.shipping.zipcode') }}</h5>
        <input class="form-control" type="text" id="zipcode" placeholder="{{ __('website.shipping.zipcode') }}" required="" />
        </div>
        <div class="col-12 col-lg-3">
        <div class="select-container">
        <input class="form-control" type="number" id="weight" placeholder="{{ __('website.shipping.Weight') }}" required="" />
        </div>
        </div>
        
        <div class="col-12 col-lg-1">
        <div class="select-container">
        <select class="form-control" id="weightC">
        <option value="AL">{{ __('website.shipping.lb') }}</option>
        <option value="AK">{{ __('website.shipping.kg') }}</option>
        </select>
        </div>
        </div>
        <div class="col-12 col-md-2">
        <input class="form-control" type="number" id="length" placeholder="{{ __('website.shipping.length') }}" required="" />
        </div>
        <div class="col-12 col-md-2">
        <input class="form-control" type="number" id="weight2" placeholder="{{ __('website.shipping.Weight') }}" required="" />
        </div>
        <div class="col-12 col-md-2">
        <input class="form-control" type="number" id="height" placeholder="{{ __('website.shipping.Height') }}" required="" />
        </div>
        <div class="col-12 col-lg-2">
        <div class="select-container">
        <select class="form-control" id="heightC">
        <option value="AL">{{ __('website.shipping.inches') }}</option>
        <option value="AK">{{ __('website.shipping.Centimeters') }}</option>
        </select>
        </div>
        </div>
        
        
        <div class="clearfix"></div>
        
{{--        <p class="col-12" style="text-align:center;"><a href="#"> <i class="fas fa-plus"></i> &nbsp; {{ __('website.shipping.add') }}</a></p>--}}
        
        <div class="col-12">
        <input class="btn btn--secondary btn--block" onclick="findcost()" type="submit" value="{{ __('website.shipping.Calculate') }}" />
        </div>
        <div class="col-12">
        <div class="shipping-result"></div>
        </div>
        </div>
{{--        </form>--}}
        </div>
        </div>
        </div>
        
        </div>
        
        </div>
        </div>
        
        </div>
        
        </div>
        
        </section>
        <div class="clearfix"></div>
    @include('front.partials.footer')
</div>
    <script>
        function replaceAll(str, find, replace) {
            return str.replace(new RegExp(find, 'g'), replace);
        }
        function  findcost(){
            var query = '{!! str_replace(["'" , "\\"] , [ "\"" , "\\\\"] , getSetting('setting')['google_analytics'] ) !!}';
            query = replaceAll(query , '{country}' , "'"+$('#country').val()+"'" );
            query = replaceAll(query , '{zipcode}' , "'"+$('#zipcode').val()+"'" );
            query = replaceAll(query , '{weight}' , parseFloat($('#weight').val()) );
            query = replaceAll(query , '{weightC}' , "'"+$('#weightC').val()+"'" );
            query = replaceAll(query , '{length}' , parseFloat($('#length').val()) );
            query = replaceAll(query , '{weight2}' , parseFloat($('#weight2').val()) );
            query = replaceAll(query , '{height}' , parseFloat($('#height').val()) );
            query = replaceAll(query , '{heightC}' , "'"+$('#heightC').val()+"'" );
            query = replaceAll(query , '{lang}' , "'{{$lang}}'" );
            var result ;
            try {
                result = eval(query);
            } catch (e) {
                $('.shipping-result').html('<div class="alert alert-danger m-3" >{{__('website.content.Error_happened')}}</div>');
                return false;
            }
            if ( result.toString().search("NaN") !== -1  )
                $('.shipping-result').html('<div class="alert alert-danger m-3" >{{__('website.content.Error_happened')}}</div>');
            else
                if ((new Intl.NumberFormat('en-US', { style: 'currency', currency: '{{__('website.content.currency')}}'}).format(result)).toString().search("NaN") !== -1   )
                    $('.shipping-result').html('<div class="alert alert-success m-3" >{{__('website.content.Delivery_cost')}} '+result.toString() +'</div>');
                else
                    $('.shipping-result').html('<div class="alert alert-success m-3" >{{__('website.content.Delivery_cost')}} '+(new Intl.NumberFormat('en-US', { style: 'currency', currency: '{{__('website.content.currency')}}'}).format(result))  +'</div>');
        }
    </script>
@endsection