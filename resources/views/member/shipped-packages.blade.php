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
							<h1>Shipped Packages</h1>
						</div>
						<div class="clearfix"></div>
						<ol class="breadcrumb justify-content-lg-start">
							<li class="breadcrumb-item"><a href="index.html">Home</a></li>
							<li class="breadcrumb-item"><a href="myaccount.html">My Account</a></li>
							<li class="breadcrumb-item active" aria-current="page">Shipped Packages</li>
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


	<section class="bg-parllax my_section">
		<div class="cases-standard">
			<div class="container">
				<div class="row">
@foreach($packages as $package)
					<table class="table table-striped">
						<tr>
							<th>ORDER # <span class="my_order">{{$package->order}}</span></th>
							<th>ORDER CREATED: <span class="my_order">{{$package->created_at->format('Y-m-d')}}</span></th>
							<th>ORDER TOTAL: <span class="my_order">{{'$'.$package['invoice']->shipping_cost}}</span></th>
							<th># OF PACKAGES: <span class="my_order">{{$package->boxes_count}}</span></th>
						</tr>
					</table>
					<div class="col-sm-12 col-md-12 col-lg-7">
						<div class="container">
							<div class="row">

								@if($package->images)
									<ul class="pic pt-2" style="display:contents;">
										@foreach(explode(',', $package->images) as $image)
											<div class="case-item col-sm-12 col-md-12 col-lg-4 work-item">
												<div class="case-img"><div class="work-item-container"><div class="work-img"><img src="{{asset('/uploads/packages/'.$image)}}" alt="post" />
															<div class="work-hover"><div class="work-action"><div class="work-zoom"><a class="img-gallery-item" href="{{asset('/uploads/packages/'.$image)}}" title="Post"></a></div></div></div></div></div></div></div>
										@endforeach
									</ul>
								@endif
							</div>
						</div>
					</div>

					<div class="col-sm-12 col-md-12 col-lg-5">
						<ul class="my_list">
							<li>Order Status: <strong class="body_color">{{$package->order_status}}</strong></li>
							<li>Order Weight: <strong class="body_color">{{$package->weight . ' '. $package->weight_type}}</strong></li>
							<li>Goods Value: <strong class="body_color">{{'$'.$package->goods_value}}</strong></li>
							<li>Shipping Method: <strong class="body_color">{{$package->shipping_method}}</strong></li>
							<li>Number Of Consolidated Boxes: <strong class="body_color">{{$package->boxes_count}}</strong></li></ul>

						<button class="btn_blue" onclick="window.location.href='{{route('view-order', $package->id)}}'"><i class="fa fa-eye"></i> View Order</button> &nbsp;&nbsp;
						<button class="btn_blue" onclick="window.location.href='track.html'"><i class="fa fa-ship"></i> Track Order</button> &nbsp;&nbsp;
						@if($package->invoice->status =='pending')
						<span style="display:inline-block">
										<form action="{{route('payment')}}" method="post">
											@csrf
											<input type="hidden" name="id" value="{{$package->invoice->id}}">
								&nbsp;&nbsp; <button type="submit" class="btn_blue">Pay Now</button>
										</form>
									@endif
									</span>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</section>

	@include('front.partials.footer')
</div>
@endsection