@extends('front.layouts.master')
@section('content')
    @include('front.partials.preloader')
    <div class="wrapper clearfix" id="wrapperParallax1">

        <header class="header header-1 header-transparent" id="navbar-spy">
            <nav class="navbar navbar-expand-lg  navbar-bordered navbar-sticky" id="primary-menu"><div class="container">
                    <a class="navbar-brand ml-3" href="{{ url('/') }}">
                        <img class="logo logo-light ml-3" src="{{asset('uploads/settings/'.$setting->logo)}}"
                             alt="{{getSetting('setting')['name_'.$lang]}}"/><img class="logo logo-dark ml-3"
                                                                                  src="{{asset('/uploads/settings/'.getSetting('setting')->logo)}}"
                                                                                  alt="{{getSetting('setting')['name_'.$lang]}}"/></a>
                    <div class="ml-5-temp">
                        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                                data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false"
                                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

                        <div class="collapse navbar-collapse" id="navbarContent">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item"><a href="{{ url('/') }}"><span>{{ __('website.menu.Home') }}</span></a>
                                </li>
                                <li class="nav-item"><a
                                            href="{{ url('/shipping') }}"><span>{{ __('website.menu.Shipping_Cost') }}</span></a>
                                </li>
                                <li class="nav-item"><a
                                            href="{{ url('/works') }}"><span>{{ __('website.menu.How_it_Works') }}</span></a>
                                </li>
                                <li class="nav-item"><a
                                            href="{{ url('/services') }}"><span>{{ __('website.menu.services') }}</span></a>
                                </li>
                                <li class="nav-item"><a
                                            href=" {{ url('/about-us') }} "><span>{{ __('website.menu.About-us') }}</span></a>
                                </li>
                                <li class="nav-item"><a href=" {{ url('/stores') }} "><span>{{ __('website.menu.stores') }}</span></a></li>
                                <li class="nav-item"><a
                                            href="{{ url('/faq') }}"><span>{{ __('website.menu.FAQ') }}</span></a></li>
                                <li class="nav-item"><a href="{{ url('/blog') }}"><span>{{ __('website.menu.Blog') }}</span></a>
                                </li>
                                <li class="nav-item"><a
                                            href="{{ url('/contact-us') }}"><span>{{ __('website.menu.Contact_Us') }}</span></a>
                                </li>

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
            <div class="bg-section"><img src="{{asset('uploads/headers/'.$header->image_header_register)}}"
                                         alt="Background"/></div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <div class="title text-lg-left">
                            <div class="title-heading">
                                <h1>{{$header['title_register_'.$lang]}}</h1>
                            </div>
                            <div class="clearfix"></div>
                            <ol class="breadcrumb justify-content-lg-start">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('website.menu.Home') }}</a>
                                </li>
                                <li class="breadcrumb-item active"
                                    aria-current="page">{{$header['title_register_'.$lang]}}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-12">
                        <h6>{{ __('website.member.AccountInformation') }}</h6>
                        <hr class="my_hr">
                        @if($errors->any())
                            <div class="alert alert-danger">{!!  implode('', $errors->all('<div>:message</div>')) !!}</div>
                        @endif
                        <form action="{{url('register/store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-lg-3">
                                    <label>{{ __('website.member.Email_Address') }} <span>*</span></label>
                                    <input class="form-control" type="text" name="email" value="{{ old('email') }}"
                                           placeholder="{{ __('website.member.Email_Address') }}" required/>
                                </div>
                                <div class="col-12 col-lg-3">
                                    <label>{{ __('website.member.confirm') }} {{ __('website.member.Email_Address') }} <span>*</span></label>
                                    <input class="form-control" type="text" name="email_confirmation" value="{{ old('email_confirmation') }}"
                                           placeholder="{{ __('website.member.confirm') }}  {{ __('website.member.Email_Address') }}" required/>
                                </div>
                                <div class="col-12 col-lg-3">
                                    <label>{{ __('website.member.Password') }} <span>*</span></label>
                                    <input class="form-control" type="password" name="password"
                                           placeholder="{{ __('website.member.Password') }}" required/>
                                </div>
                                <div class="col-12 col-lg-3">
                                    <label>{{ __('website.member.confirm') }} {{ __('website.member.Password') }} <span>*</span></label>
                                    <input class="form-control" type="password" name="password_confirmation"
                                           placeholder="{{ __('website.member.confirm') }} {{ __('website.member.Password') }}" required/>
                                </div>

                                <div class="col-12 col-lg-4">
                                    <label>{{ __('website.member.AccountType') }} <span>*</span></label>
                                    <div class="select-container">
                                        <select class="form-control my_select" name="account_type_id">
                                            @foreach ($accountType as $type)
                                                <option value="{{ $type->id }}" @if(old('account_type_id') == $type->id) selected @endif>{{ $lang == "en" ? $type->type_en : $type->type_ar }}</option>
                                            @endforeach
                                        </select></div>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <label>{{ __('website.member.YourLanguage') }} <span>*</span></label>
                                    <div class="select-container">
                                        <select class="form-control my_select" name="lang_id">
                                            @foreach ($language as $langCode)
                                                <option value="{{ $langCode->id }}" >{{ $lang == "en" ? $langCode->name_en : $langCode->name_ar }}</option>
                                            @endforeach
                                        </select></div>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <label>{{ __('website.member.ReferralCode') }} </label>
                                    <input class="form-control" type="text" name="referral_code" value="{{ old('referral_code') }}"
                                           placeholder="{{ __('website.member.ReferralCode') }}"/>
                                </div>

                                <div class="col-12 col-lg-12">&nbsp;</div>

                                <div class="col-12 col-lg-12"><h6>{{ __('website.member.MyInformation') }}</h6>
                                    <hr class="my_hr">
                                </div>

                                <div class="col-12 col-lg-3">
                                    <label>{{ __('website.member.CivilId') }} <span>*</span></label>
                                    <input class="form-control" type="text" name="civil_id" value="{{ old('civil_id') }}"
                                           placeholder="{{ __('website.member.CivilId') }}" required/>
                                </div>

                                <div class="col-12 col-lg-3">
                                    <label>{{ __('website.member.FirstName') }} <span>*</span></label>
                                    <input class="form-control" type="text" name="first_name" value="{{ old('first_name') }}"
                                           placeholder="{{ __('website.member.FirstName') }}" required/>
                                </div>
                                <div class="col-12 col-lg-3">
                                    <label>{{ __('website.member.LastName') }} <span>*</span></label>
                                    <input class="form-control" type="text" name="last_name" value="{{ old('last_name') }}"
                                           placeholder="{{ __('website.member.LastName') }}" required/>
                                </div>
                                <div class="col-12 col-lg-3">
                                    <label>{{ __('website.member.Phone') }} <span>*</span></label>
                                    <input class="form-control" type="text" name="phone" value="{{ old('phone') }}"
                                           placeholder="{{ __('website.member.Phone') }}" required/>
                                </div>
                                <div class="col-12 col-lg-3">
                                    <label>{{ __('website.member.CompanyName') }} </label>
                                    <input class="form-control" type="text" name="company_name" value="{{ old('company_name') }}"
                                           placeholder="{{ __('website.member.CompanyName') }}"/>
                                </div>
                                <div class="col-12 col-lg-3">
                                    <label>{{ __('website.member.Twitter') }}</label>
                                    <input class="form-control" type="text" name="twitter" value="{{ old('twitter') }}"
                                           placeholder="{{ __('website.member.Twitter') }}"/>
                                </div>

                                <div class="col-12 col-lg-3">
                                    <label>{{ __('website.member.Instagram') }}</label>
                                    <input class="form-control" type="text" name="instagram" value="{{ old('instagram') }}"
                                           placeholder="{{ __('website.member.Instagram') }}"/>
                                </div>

                                <div class="col-12 col-lg-3">
                                    <label>{{ __('website.member.Snapchat') }}</label>
                                    <input class="form-control" type="text" name="snapchat" value="{{ old('snapchat') }}"
                                           placeholder="{{ __('website.member.Snapchat') }}"/>
                                </div>

                                <div class="col-12 col-lg-3">
                                    <label>{{ __('website.member.TikTok') }}</label>
                                    <input class="form-control" type="text" name="tiktok" value="{{ old('tiktok') }}"
                                           placeholder="{{ __('website.member.TikTok') }}"/>
                                </div>


                                <div class="col-12 col-lg-12">&nbsp;</div>
                                <div class="col-12 col-lg-12"><h6>{{ __('website.member.MyAddress') }}</h6>
                                    <hr class="my_hr">
                                </div>
                                <div class="col-12 col-lg-4">
                                    <label>{{ __('website.member.Select_The_Country') }} <span>*</span></label>
                                    <div class="select-container">
                                        <select class="form-control my_select" name="country" onchange="getCities(this.value)">
                                            <option>{{ __('website.member.Select_The_Country') }}</option>
                                            @foreach ($country as $con)
                                                <option value="{{ $con->id }}" @if(old('country') == $con->id ) selected @endif>{{ $lang == "en" ? $con->title_en : $con->title_ar }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <label>{{ __('website.member.Select_The_State') }} <span>*</span></label>
                                    <div class="select-container" id="city-list">
                                        <select name="city" id="city-list" onchange="getAreas(this.value)" class="form-control my_select">
                                            <option>{{ __('website.member.Select_The_State') }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <label>{{ __('website.member.Select_The_Area') }} <span>*</span></label>
                                    <div class="select-container" id="area-list">
                                        <select class="form-control my_select" name="area" >
                                            <option>{{ __('website.member.Select_The_Area') }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <label>{{ __('website.member.Block') }} <span>*</span></label>
                                    <input class="form-control" type="text" name="block" value="{{ old('block') }}"
                                           placeholder="{{ __('website.member.Block') }}" required/>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <label>{{ __('website.member.Street') }} <span>*</span></label>
                                    <input class="form-control" type="text" name="street" value="{{ old('street') }}"
                                           placeholder="{{ __('website.member.Street') }}" required/>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <label>{{ __('website.member.Avenue') }} </label>
                                    <input class="form-control" type="text" name="avenue" value="{{ old('avenue') }}"
                                           placeholder="{{ __('website.member.Avenue') }}" />
                                </div>
                                <div class="col-12 col-lg-4">
                                    <label>{{ __('website.member.Home_PACI') }} <i data-toggle="modal" data-target="#homePCAIHelp" class="fa fa-question-circle ml-1 mr-1" style="cursor: pointer;" ></i><span>*</span></label>
                                    <input class="form-control" type="text" name="home_paci" value="{{ old('home_paci') }}"
                                           placeholder="{{ __('website.member.Home_PACI') }}" required/>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <label>{{ __('website.member.building_number') }} <span>*</span></label>
                                    <input class="form-control" type="text" name="building_number" value="{{ old('building_number') }}"
                                           placeholder="{{ __('website.member.building_number') }}" required/>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <label>{{ __('website.member.floor') }} </label>
                                    <input class="form-control" type="text" name="floor" value="{{ old('floor') }}"
                                           placeholder="{{ __('website.member.floor') }}"/>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <label>{{ __('website.member.apartment_office_number') }} </label>
                                    <input class="form-control" type="text" name="apartment_office_number" value="{{ old('apartment_office_number') }}"
                                           placeholder="{{ __('website.member.apartment_office_number') }}"/>
                                </div>
                                <div class="col-12 col-lg-12"></div>
                                <div class="col-12">&nbsp;</div>
                                <div class="col-12">
                                    <input class="btn btn--primary" type="submit"
                                           value="{{ __('website.member.Register') }}"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>


        @include('front.partials.footer')
        
        <!-- Modal -->
        <div id="homePCAIHelp" class="modal fade" role="dialog">
          <div class="modal-dialog">
        
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img class="m-1 w-100" src="{{asset('/assets/images/paci/PACI_1.png')}}"/>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <img class="m-1 w-100" src="{{asset('/assets/images/paci/PACI_2.png')}}"/>
                                </div>
                                <div class="col-md-12">
                                    <img class="m-1 w-100" src="{{asset('/assets/images/paci/PACI_3.png')}}"/>
                                </div>
                            </div>
                        </div>
                    </div>
              </div>
            </div>
        
          </div>
        </div>


    </div>
    <script>
        function getCities(val) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "/get-country-cities",
                data: 'country_id=' + val,
                beforeSend: function () {
                    $("#city-list .list").addClass("loader");
                },
                success: function (data) {
                    $("#city-list select").html(data.op);
                    $("#city-list .list").html(data.lis);
                    $("#city-list .list").prop('disabled', false);
                    $("#city-list .list").removeClass("loader");
                }
            });
        }

        function getAreas(val) {
            $.ajax({
                type: "POST",
                url: "/get-city-areas",
                data: 'city_id=' + val,
                beforeSend: function () {
                    $("#area-list .list").addClass("loader");
                },
                success: function (data) {
                    $("#area-list select").html(data.op);
                    $("#area-list .list").html(data.lis);
                    $("#area-list .list").prop('disabled', false);
                    $("#area-list .list").removeClass("loader");
                }
            });
        }
    </script>

@endsection
