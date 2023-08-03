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
            <div class="bg-section"><img src="/assets/images/page-titles/3.jpg" alt="Background"/></div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <div class="title text-lg-left">
                            <div class="title-heading">
                                <h1>{{ __('website.shipping.View_Order') }} #{{$package->order}}</h1>
                            </div>
                            <div class="clearfix"></div>
                            <ol class="breadcrumb justify-content-lg-start">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('website.menu.Home') }}</a>
                                </li>
                                <li class="breadcrumb-item">{{ __('website.member.MyAccount') }}</li>
                                <li class="breadcrumb-item active"
                                    aria-current="page">{{ __('website.shipping.View_Order') }} #{{$package->order}}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="my_section  mt-50">
            <div class="container">
                <div class="row">
                    <div class="myaccount"><a href="{{route('my-account')}}"><img src="/assets/images/package.png"
                                                                                  alt=""
                                                                                  style="margin:0 10px 0 0;"> {{ __('website.member.ReceivedPackages') }}
                        </a></div>
                    <div class="myaccount"><a href="{{route('shipped-packages')}}"><img src="/assets/images/ship.png"
                                                                                        alt=""
                                                                                        style="margin:0 10px 0 0;"> {{ __('website.member.ShippedPackages') }}
                        </a></div>
                    <div class="myaccount"><a href="{{route('invoices')}}"><img src="/assets/images/invoice.png" alt=""
                                                                                style="margin:0 10px 0 0;"> {{ __('website.member.Invoices') }}
                        </a></div>
                    <div class="myaccount"><a href="{{route('account-information')}}"><img
                                    src="/assets/images/account.png" alt=""
                                    style="margin:0 10px 0 0;"> {{ __('website.member.AccountInformation') }}</a></div>
                </div>
            </div>
        </section>


        <section class="bg-parllax my_section">
            <div class="cases-standard">
                <div class="container">
                    <div class="row">

                        <div class="col-sm-12 col-md-12 col-lg-9">
                            <div class="container">
                                <div class="row">
                                    @if($package->image)
                                        <div class="case-item col-sm-12 col-md-12 col-lg-4 work-item">
                                                <div class="case-img">
                                                    <div class="work-item-container">
                                                        <div class="work-img"><img
                                                                    src="{{asset('/uploads/packages/'. $package->image)}}"
                                                                    alt="post"/>
                                                            <div class="work-hover">
                                                                <div class="work-action">
                                                                    <div class="work-zoom"><a class="img-gallery-item"
                                                                                              href="{{asset('/uploads/packages/'. $package->image)}}"
                                                                                              title="Post"></a></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    @endif
                                    @if($package->images)
                                        @foreach(explode(',', $package->images) as $image)
                                            <div class="case-item col-sm-12 col-md-12 col-lg-4 work-item">
                                                <div class="case-img">
                                                    <div class="work-item-container">
                                                        <div class="work-img"><img
                                                                    src="{{asset('/uploads/packages/'.$image)}}"
                                                                    alt="post"/>
                                                            <div class="work-hover">
                                                                <div class="work-action">
                                                                    <div class="work-zoom"><a class="img-gallery-item"
                                                                                              href="{{asset('/uploads/packages/'.$image)}}"
                                                                                              title="Post"></a></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-12 col-lg-3">
                            <ul class="my_list">
                                <li>{{ __('website.shipping.ORDER') }}: <strong class="body_color">#{{$package->order}}</strong></li>
                                <li>{{ __('website.shipping.ORDER_CREATED') }}: <strong
                                            class="body_color">{{$package->created_at->format('y-m-d')}}</strong></li>
                                @if( $package['invoice'] != null)
                                <li>{{ __('website.shipping.ORDER_TOTAL') }}: <strong
                                            class="body_color">{{'$'.$package['invoice']->shipping_cost}}</strong></li>
                                @endif
                                <li>{{ __('website.shipping.OF_PACKAGES') }}: <strong class="body_color">{{$package->boxes_count}}</strong>
                                </li>
                                <li>{{ __('website.shipping.Order_Status') }}: <strong class="body_color">{{$package->order_status}}</strong></li>
                                <li>{{ __('website.shipping.Order_Weight') }}: <strong
                                            class="body_color">{{$package->weight . ' '. $package->weight_type}}</strong>
                                </li>
                                <li>{{ __('website.member.goods_value') }}:
                                    <strong class="body_color">{!! $package->goods_value ? '$'.$package->goods_value. ( $package->canUpdateGoodValue() ? '<button class="btn-sm btn-warning mx-1 text-light" data-toggle="modal" data-target="#good_value_'.$package->id.'"><i class="fa fa-pencil"></i></button>' : '' ) : "Unknown" !!}</strong>
                                    @if ( $package->canUpdateGoodValue() and ! $package->goods_value )
                                        <button class="btn_blue m-1" data-toggle="modal" data-target="#good_value_{{ $package->id }}">
                                            <i class="fa fa-list-alt"></i> {{ __('website.Enter') }} {{ __('website.member.goods_value') }}
                                        </button>
                                    @endif
                                </li>
                                <li>{{ __('website.shipping.Shipping_Method') }}: <strong class="body_color">{{$package->shipping_method}}</strong>
                                </li>
                                <li>{{ __('website.shipping.Number_Of_Consolidated_Boxes') }}: <strong
                                            class="body_color">{{$package->boxes_count}}</strong></li>
                            </ul>

                            {{--						<button class="btn_blue" onclick="window.location.href='track.html'"><i class="fa fa-ship"></i> Track Order</button>--}}

                        </div>
                        @if ( $package->canUpdateGoodValue())
                            <!-- Modal -->
                            <div class="modal fade" id="good_value_{{ $package->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"
                                                id="exampleModalCenterTitle">{{ __('website.member.goods_value') }}</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close"
                                                    @if(app()->getLocale() == "ar") style="margin: -1rem -1rem -1rem -1rem;" @endif>
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('updateGoodsValue' , $package) }}"
                                                  method="POST">
                                                @csrf
                                                <label>{{ __('website.Enter') }} {{ __('website.member.goods_value') }}
                                                    (USD $)</label>
                                                <input class="form-control" name="good_value"
                                                       dir="ltr" required placeholder="USD $"
                                                       type="number"/>

                                                <input class="btn btn--primary" type="submit"
                                                       value="{{ __('webMessage.sendnow') }}"/>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif


                        <!-- <div class="col-12 col-lg-12 mt-50"><h5 class="heading-title">PACKAGES IN ORDER</h5> </div>

                            <div class="case-item col-sm-12 col-md-12 col-lg-3 work-item">
                            <div class="case-item-warp">
                            <div class="case-img">
                                <div class="work-item-container"><div class="work-img"><img src="assets/images/work/full/post.png" alt="post" />
                                <div class="work-hover"><div class="work-action"><div class="work-zoom"><a class="img-gallery-item" href="assets/images/work/full/post.png" title="Post"></a></div></div></div></div></div>
                            </div>
                            <div class="case-content">
                            <div class="case-desc text--center">
                            <p><strong class="body_color">ENVELOPE</strong><br/>
                                Package #: 311437<br/>
                                Quantity: 1<br/>
                                Original track id: <strong class="gray_color">PS0000</strong> <a href="#" title="Copy Original Track ID"> &nbsp;<i class="far fa-copy"></i></a><br/>
                                Value: $1.00</p>
                            </div>
                            <div class="warn"><small><i class="fas fa-exclamation-triangle"></i> <strong>CUSTOMS & INSURANCE</strong> will be based on the above price</small></div>
                            </div></div></div>

                            <div class="case-item col-sm-12 col-md-12 col-lg-3 work-item">
                            <div class="case-item-warp">
                            <div class="case-img">
                                <div class="work-item-container"><div class="work-img"><img src="assets/images/work/full/post.png" alt="post" />
                                <div class="work-hover"><div class="work-action"><div class="work-zoom"><a class="img-gallery-item" href="assets/images/work/full/post.png" title="Post"></a></div></div></div></div></div>
                            </div>
                            <div class="case-content">
                            <div class="case-desc text--center">
                            <p><strong class="body_color">URBO BAG</strong><br/>
                                Package #: 311437<br/>
                                Quantity: 1<br/>
                                Original track id: <strong class="gray_color">PS0000</strong> <a href="#" title="Copy Original Track ID"> &nbsp;<i class="far fa-copy"></i></a><br/>
                                Value: $5.00</p>
                            </div>
                            <div class="warn"><small><i class="fas fa-exclamation-triangle"></i> <strong>CUSTOMS & INSURANCE</strong> will be based on the above price</small></div>
                            </div></div></div>

                            <div class="case-item col-sm-12 col-md-12 col-lg-3 work-item">
                            <div class="case-item-warp">
                            <div class="case-img">
                                <div class="work-item-container"><div class="work-img"><img src="assets/images/work/full/post.png" alt="post" />
                                <div class="work-hover"><div class="work-action"><div class="work-zoom"><a class="img-gallery-item" href="assets/images/work/full/post.png" title="Post"></a></div></div></div></div></div>
                            </div>
                            <div class="case-content">
                            <div class="case-desc text--center">
                            <p><strong class="body_color">WATCH BAND</strong><br/>
                                Package #: 311437<br/>
                                Quantity: 1<br/>
                                Original track id: <strong class="gray_color">PS0000</strong> <a href="#" title="Copy Original Track ID"> &nbsp;<i class="far fa-copy"></i></a><br/>
                                Value: $10.00</p>
                            </div>
                            <div class="warn"><small><i class="fas fa-exclamation-triangle"></i> <strong>CUSTOMS & INSURANCE</strong> will be based on the above price</small></div>
                            </div></div></div>

                            <div class="case-item col-sm-12 col-md-12 col-lg-3 work-item">
                            <div class="case-item-warp">
                            <div class="case-img">
                                <div class="work-item-container"><div class="work-img"><img src="assets/images/work/full/post.png" alt="post" />
                                <div class="work-hover"><div class="work-action"><div class="work-zoom"><a class="img-gallery-item" href="assets/images/work/full/post.png" title="Post"></a></div></div></div></div></div>
                            </div>
                            <div class="case-content">
                            <div class="case-desc text--center">
                            <p><strong class="body_color">DRINK STOPPER</strong><br/>
                                Package #: 311437<br/>
                                Quantity: 1<br/>
                                Original track id: <strong class="gray_color">PS0000</strong> <a href="#" title="Copy Original Track ID"> &nbsp;<i class="far fa-copy"></i></a><br/>
                                Value: $5.00</p>
                            </div>
                            <div class="warn"><small><i class="fas fa-exclamation-triangle"></i> <strong>CUSTOMS & INSURANCE</strong> will be based on the above price</small></div>
                            </div></div></div> -->


                    </div>
                </div>
            </div>
        </section>


        @include('front.partials.footer')
    </div>
@endsection