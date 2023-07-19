@extends('front.layouts.master')
@section('content')
    @include('front.partials.preloader')
    <div class="wrapper clearfix" id="wrapperParallax1">

        <header class="header header-1 header-transparent" id="navbar-spy">
            <nav class="navbar navbar-expand-lg  navbar-bordered navbar-sticky" id="primary-menu">
                <a class="navbar-brand ml-3" href="{{ url('/') }}">
                    <img class="logo logo-light ml-3" src="{{asset('uploads/settings/'.getSetting('setting')->logo)}}"
                         alt="{{getSetting('setting')['name_'.$lang]}}"/><img class="logo logo-dark ml-3"
                                                                              src="{{asset('/uploads/settings/'.getSetting('setting')->logo)}}"
                                                                              alt="{{getSetting('setting')['name_'.$lang]}}"/></a>
                <div class="ml-5">
                    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                            data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false"
                            aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

                    <div class="collapse navbar-collapse" id="navbarContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item"><a href="{{ url('/') }}"><span>{{ __('website.menu.Home') }}</span></a>
                            </li>
                            @if( env('IS_SHIPPING_CALCULATOR_ACTIVE' , true )  )
                                <li class="nav-item"><a
                                            href="{{ url('/shipping') }}"><span>{{ __('website.menu.Shipping_Cost') }}</span></a>
                                </li>
                            @endif
                            <li class="nav-item"><a
                                        href="{{ url('/works') }}"><span>{{ __('website.menu.How_it_Works') }}</span></a>
                            </li>
                            <li class="nav-item "><a
                                        href="{{ url('/services') }}"><span>{{ __('website.menu.services') }}</span></a>
                            </li>
                            <li class="nav-item"><a
                                        href=" {{ url('/about-us') }} "><span>{{ __('website.menu.About-us') }}</span></a>
                            </li>
                            <li class="nav-item"><a
                                        href=" {{ url('/stores') }} "><span>{{ __('website.menu.stores') }}</span></a>
                            </li>
                            <li class="nav-item"><a
                                        href="{{ url('/faq') }}"><span>{{ __('website.menu.FAQ') }}</span></a></li>
                            <li class="nav-item"><a href="{{ url('/blog') }}"><span>{{ __('website.menu.Blog') }}</span></a>
                            </li>
                            <li class="nav-item"><a
                                        href="{{ url('/contact-us') }}"><span>{{ __('website.menu.Contact_Us') }}</span></a>
                            </li>
                            @if(Auth::guard('member')->check())
                                <li class="nav-item active"><a
                                            href="{{ url('/my-account') }}"><span>{{ __('website.menu.My_Account') }}</span></a>
                                </li>
                                <li class="nav-item"><a
                                            href="{{ route('user.logout') }}"><span>{{ __('website.menu.Logout') }}</span></a>
                                </li>
                        </ul>
                        @else
                            <div class="module-container">

                                <div class="module-contact"><a class="btn btn--primary"
                                                               href="{{ url('/login') }}">{{ __('website.menu.Login_and_Register') }}</a>
                                </div>
                                @endif

                                <div class="module module-language">
                                    <div class="selected ml-1"><span>{{ $lang }} </span><i
                                                class="fas fa-chevron-down"></i></div>
                                    <div class="lang-list">
                                        <ul>
                                            <li>
                                                <a href="{{ route('changeLocale' , ['en']) }}">{{ __('website.menu.english') }}</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('changeLocale' , ['ar']) }}">{{ __('website.menu.arabic') }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                    </div>

                </div>

            </nav>
        </header>

        <section class="page-title bg-overlay bg-overlay-dark bg-parallax" id="page-title">
            <div class="bg-section"><img src="assets/images/page-titles/3.jpg" alt="Background"/></div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <div class="title text-lg-left">
                            <div class="title-heading">
                                <h1>{{ __('website.member.MyAccount') }}</h1>
                            </div>
                            <div class="clearfix"></div>
                            <ol class="breadcrumb justify-content-lg-start">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('website.menu.Home') }}</a>
                                </li>
                                <li class="breadcrumb-item">{{ __('website.member.MyAccount') }}</li>
                                <li class="breadcrumb-item active"
                                    aria-current="page">{{ __('website.member.ReceivedPackages') }}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="my_section  mt-50">
            <div class="container">
                <div class="row">
                    <div class="myaccount"><a href="{{route('my-account')}}"><img src="assets/images/package.png" alt=""
                                                                                  style="margin:0 10px 0 0;"> {{ __('website.member.ReceivedPackages') }}
                        </a></div>
                    <div class="myaccount"><a href="{{route('shipped-packages')}}"><img src="assets/images/ship.png"
                                                                                        alt=""
                                                                                        style="margin:0 10px 0 0;"> {{ __('website.member.ShippedPackages') }}
                        </a></div>
                    <div class="myaccount"><a href="{{route('invoices')}}"><img src="assets/images/invoice.png" alt=""
                                                                                style="margin:0 10px 0 0;"> {{ __('website.member.Invoices') }}
                        </a></div>
                    <div class="myaccount"><a href="{{route('account-information')}}"><img
                                    src="assets/images/account.png" alt=""
                                    style="margin:0 10px 0 0;"> {{ __('website.member.AccountInformation') }}</a></div>

                </div>
            </div>
        </section>


        <section class="bg-parllax my_section">
            <div class="cases-standard">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">{{ __('Package Details') }}</div>

                                <div class="card-body">
                                    <ul class="my_list">
                                        <li>Order: <strong class="body_color">#{{$package->order}}</strong></li>
                                        <li>Order Created: <strong
                                                    class="body_color">{{$package->created_at->format('y-m-d')}}</strong></li>
                                        <li>Order Total: <strong
                                                    class="body_color">{{'$'.$package['invoice']->shipping_cost}}</strong></li>
                                        <li>Number of Packages: <strong class="body_color">{{$package->boxes_count}}</strong>
                                        </li>
                                        <li>Order Status: <strong class="body_color">{{$package->order_status}}</strong></li>
                                        <li>Order Weight: <strong
                                                    class="body_color">{{$package->weight . ' '. $package->weight_type}}</strong>
                                        </li>
                                        <li>Goods Value: <strong class="body_color">{{'$'.$package->goods_value}}</strong></li>
                                        <li>Shipping Method: <strong class="body_color">{{$package->shipping_method}}</strong>
                                        </li>
                                        <li>Number Of Consolidated Boxes: <strong
                                                    class="body_color">{{$package->boxes_count}}</strong></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">{{ __('Pay Invoice') }}</div>

                                <div class="card-body">
                                    <form method="POST" action="{{ route('pay-invoice') }}">
                                        <input type="hidden" value="{{ request()->get('id') }}" name="id"  >
                                        @csrf
                                        <div class="form-group row">
                                            <label for="card_number" class="col-md-4 col-form-label text-md-right">{{ __('Card Number') }}</label>

                                            <div class="col-md-6">
                                                <input id="card_number" type="text" class="form-control @error('card_number') is-invalid @enderror" name="card_number" required autocomplete="card_number" autofocus>

                                                @error('card_number')
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="expiry_date" class="col-md-4 col-form-label text-md-right">{{ __('Expiry Date') }}</label>

                                            <div class="col-md-3">
                                                <input type="text" class="form-control @error('expiry_date_year') is-invalid @enderror" name="expiry_date_year" placeholder="{{ __('Year') }}" required autocomplete="expiry_date_year">

                                                @error('expiry_date_year')
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-3">
                                                <input type="text" class="form-control @error('expiry_date_month') is-invalid @enderror" name="expiry_date_month" placeholder="{{ __('Month') }}" required autocomplete="expiry_date_month">

                                                @error('expiry_date_month')
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="cvv" class="col-md-4 col-form-label text-md-right">{{ __('CVV') }}</label>

                                            <div class="col-md-6">
                                                <input id="cvv" type="text" class="form-control @error('cvv') is-invalid @enderror" name="cvv" required autocomplete="cvv">

                                                @error('cvv')
                                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Pay Now') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        @include('front.partials.footer')
    </div>
@endsection