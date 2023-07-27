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
                    <div class="row">
                        <div class="col-12 col-lg-12"><h5
                                    class="heading-title">{{ __('website.member.RECENTPACKAGES') }}</h5></div>
                        @foreach($packages as $package)
                            <div class="case-item col-sm-12 col-md-12 col-lg-4 work-item">
                                <div class="case-item-warp">
                                    <div class="case-img">
                                        <div class="work-item-container">
                                            <div class="work-img">
                                                <img src="{{asset('/uploads/packages/'. $package->image)}}" alt="{{$package->package_type}}"/>
                                                <div class="work-hover">
                                                    <div class="work-action">
                                                        <div class="work-zoom"></div>
                                                    </div>
                                                </div>
                                                <a href="{{route('view-order', $package->id)}}">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="case-content">
                                        <div class="case-desc text--center">
                                            <p><strong class="body_color">{{$package->package_type}}</strong><br/>
                                                Package #: {{$package->order}}<br/>
                                                Quantity: {{$package->boxes_count}}<br/>
                                                Original track id: <strong
                                                        class="gray_color">{{$package->original_track_id}}</strong> <br/>
                                                {{ __('adminMessage.good_value') }}: {!! $package->goods_value ? '$'.$package->goods_value. ( $package->canUpdateGoodValue() ? '<button class="btn-sm btn-warning mx-1 text-light" data-toggle="modal" data-target="#good_value_'.$package->id.'"><i class="fa fa-pencil"></i></button>' : '' ) : "Unknown" !!}<br/>
                                            </p>
                                        </div>
                                        <div class="case-more text--center">
                                            {{--											<button class="btn_blue">View Picture</button>--}}

                                            @if ( $package->canUpdateGoodValue() )
                                                @if( ! $package->goods_value )
                                                    <button class="btn_blue m-1" data-toggle="modal" data-target="#good_value_{{ $package->id }}">
                                                        <i class="fa fa-list-alt"></i> Enter {{ __('adminMessage.good_value') }}
                                                    </button>
                                                @endif
                                                <!-- Modal -->
                                                <div class="modal fade" id="good_value_{{ $package->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalCenterTitle">{{ __('adminMessage.good_value') }}</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ route('updateGoodsValue' , $package) }}" method="POST">
                                                                    @csrf
                                                                    <label>Enter {{ __('adminMessage.good_value') }} (USD $)</label>
                                                                    <input class="form-control" name="good_value" required placeholder="USD $" type="number" />

                                                                    <input class="btn btn--primary" type="submit" value="{{ __('webMessage.sendnow') }}"/>

                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            <button class="btn_blue  m-1"
                                                    onclick="window.location.href='{{route('view-order', $package->id)}}'">
                                                <i
                                                        class="fa fa-eye"></i> View Order
                                            </button> &nbsp;&nbsp;
                                            {{--						<button class="btn_blue" onclick="window.location.href='track.html'"><i class="fa fa-ship"></i> Track Order</button> &nbsp;&nbsp;--}}
                                            @if(optional($package->invoice)->status =='pending')
                                                <span class="m-1" style="display:inline-block">
												<form action="{{route('payment')}}" method="post">
													@csrf
													<input type="hidden" name="id" value="{{$package->invoice->id}}">
											&nbsp;&nbsp; 		<button type="submit" class="btn_blue">Pay Now</button>
												</form>
												</span>
                                            @endif

                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>

        </section>
        @include('front.partials.footer')
    </div>
@endsection