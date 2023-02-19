@extends('front.layouts.master')
@section('content')
	@include('front.partials.preloader')
<div class="wrapper clearfix" id="wrapperParallax1">

	<header class="header header-1 header-transparent" id="navbar-spy">
		<nav class="navbar navbar-expand-lg  navbar-bordered navbar-sticky" id="primary-menu">
			<a class="navbar-brand ml-3" href="{{ url('/') }}">
				<img class="logo logo-light ml-3" src="{{asset('uploads/settings/'.getSetting('setting')->logo)}}" alt="{{getSetting('setting')['name_'.$lang]}}" /><img class="logo logo-dark ml-3" src="{{asset('/uploads/settings/'.getSetting('setting')->logo)}}" alt="{{getSetting('setting')['name_'.$lang]}}" /></a>
			<div class="ml-5">
				<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

				<div class="collapse navbar-collapse" id="navbarContent">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item"><a href="{{ url('/') }}"><span>{{ __('website.menu.Home') }}</span></a></li>
						@if( env('IS_SHIPPING_CALCULATOR_ACTIVE' , true )  ) <li class="nav-item"><a href="{{ url('/shipping') }}"><span>{{ __('website.menu.Shipping_Cost') }}</span></a></li> @endif
						<li class="nav-item"><a href="{{ url('/works') }}"><span>{{ __('website.menu.How_it_Works') }}</span></a></li>
						<li class="nav-item "><a href="{{ url('/services') }}"><span>{{ __('website.menu.services') }}</span></a></li>
						<li class="nav-item"><a href=" {{ url('/about-us') }} "><span>{{ __('website.menu.About-us') }}</span></a></li>
						<li class="nav-item"><a href="{{ url('/faq') }}"><span>{{ __('website.menu.FAQ') }}</span></a></li>
						<li class="nav-item"><a href="{{ url('/blog') }}"><span>{{ __('website.menu.Blog') }}</span></a></li>
						<li class="nav-item"><a href="{{ url('/contact-us') }}"><span>{{ __('website.menu.Contact_Us') }}</span></a></li>
						@if(Auth::guard('member')->check())
							<li class="nav-item active"><a href="{{ url('/my-account') }}"><span>{{ __('website.menu.My_Account') }}</span></a></li>
							<li class="nav-item"><a href="{{ route('user.logout') }}"><span>{{ __('website.menu.Logout') }}</span></a></li>
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
<div class="bg-section"><img src="assets/images/page-titles/3.jpg" alt="Background" /></div>
<div class="container">
<div class="row">
<div class="col-sm-12 col-md-12 col-lg-6">
<div class="title text-lg-left">
<div class="title-heading">
<h1>{{ __('website.member.MyAccount') }}</h1>
</div>
<div class="clearfix"></div>
<ol class="breadcrumb justify-content-lg-start">
<li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('website.menu.Home') }}</a></li>
<li class="breadcrumb-item">{{ __('website.member.MyAccount') }}</li>
<li class="breadcrumb-item active" aria-current="page">{{ __('website.member.ReceivedPackages') }}</li>
</ol>
</div>
</div>
</div>
</div>
</section>

<section class="my_section  mt-50">
<div class="container">
<div class="row">
	<div class="myaccount"><a href="{{route('my-account')}}"><img src="assets/images/package.png" alt="" style="margin:0 10px 0 0;"> {{ __('website.member.ReceivedPackages') }}</a></div>
	<div class="myaccount"><a href="{{route('shipped-packages')}}"><img src="assets/images/ship.png" alt="" style="margin:0 10px 0 0;"> {{ __('website.member.ShippedPackages') }}</a></div>
	<div class="myaccount"><a href="{{route('invoices')}}"><img src="assets/images/invoice.png" alt="" style="margin:0 10px 0 0;"> {{ __('website.member.Invoices') }}</a></div>
	<div class="myaccount"><a href="{{route('account-information')}}"><img src="assets/images/account.png" alt="" style="margin:0 10px 0 0;"> {{ __('website.member.AccountInformation') }}</a></div>
</div>
</div>
</section>

{{--{{dd($user->getMainAddress())}}--}}
	<section class="bg-parllax my_section">
		<div class="cases-standard">
			<div class="container">
				<div class="row">

					<div class="col-12 col-lg-12"><h5 class="heading-title">ACCOUNT INFO</h5></div>

					<div class="col-12 col-lg-12 mt-50">
						<div class="locations" id="locations">
							<div class="row">
								<div class="col-12 col-lg-6">
									<div class="address">
										<div class="office">
											<h6>MY US SHIPPING ADDRESS</h6>
										</div>
										<ul class="list-unstyled info">
											<li><span class="fas fa-map-marker-alt"></span><a href="javascript:void(0)">{{getSetting('setting')['address_'.$lang]}}</a></li>
											<li><span class="fas fa-phone-alt"></span><a href="tel:	+965-221-23456">{{getSetting('setting')->phone}}</a></li>
										</ul>
									</div>
								</div>

								<div class="col-12 col-lg-6">
									<div class="address">
										<div class="office">
											<h6>MY ADDRESS <small>(Main Address)</small></h6>
										</div>
										<ul class="list-unstyled info">
											<li><strong>{{$user->fullname}}</strong></li>
											<li><span class="fas fa-map-marker-alt"></span><a href="javascript:void(0)">{{$user->getAddress()}}</a></li>
											<li><span class="fas fa-envelope"></span><a href=""><span>{{$user->email}}</span></a></li>
											<li><span class="fas fa-phone-alt"></span><a href="tel:+965-221-23456">{{$user->phone | $user->mobile}}</a></li>
										</ul>
									</div>
								</div>
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