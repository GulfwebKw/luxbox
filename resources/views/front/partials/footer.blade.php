<footer class="footer footer-1">
    <div class="footer-center">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-3 footer-widget widget-about">
                    <div class="footer-logo"><img class="footer-logo" src="{{asset('/uploads/settings/'.getSetting('setting')->logo)}}" alt="logo"></div>
                    <p>&nbsp;</p>
                    <div class="widget-content">
                        <p>{{getSetting('setting')['seo_description_'.$lang]}}</p>

                        <div class="module module-social">
                            <a class="share-facebook" href="{{getSetting('setting')['social_facebook']}}"><i class="fab fa-facebook-f"> </i></a>
                            <a class="share-instagram" href="{{getSetting('setting')['social_instagram']}}"><i class="fab fa-instagram"></i></a>
                            <a class="share-twitter" href="{{getSetting('setting')['social_twitter']}}"><i class="fab fa-twitter"></i></a>
                        </div>

                    </div>
                </div>

                <div class="col-sm-6 col-md-6 col-lg-3 offset-lg-1 footer-widget widget-links">
                    <div class="footer-widget-title">
                        <h5>{{ __('website.menu.services') }}</h5>
                    </div>
                    <div class="widget-content">
                        <ul>
                            @forelse(\App\Service::limit(6)->orderBy('display_order')->where('is_active' , 1 )->get()->toArray() as $service)
                                <li><a href="/service/{{ $service['id'] }}">{{ $service['title_'.$lang] }}</a></li>
                            @empty
                            @endforelse
                        </ul>
                    </div>
                </div>

                <div class="col-sm-6 col-md-6 col-lg-2 footer-widget widget-links">
                    <div class="footer-widget-title">
                        <h5>{{ __('website.menu.Main_Menu') }} </h5>
                    </div>
                    <div class="widget-content">
                        <ul>
                            <li><a href="{{ url('/') }}">{{ __('website.menu.Home') }}</a></li>
                            <li><a href="/shipping">{{ __('website.menu.Shipping_Cost') }}</a></li>
                            <li><a href="/works">{{ __('website.menu.How_it_Works') }}</a></li>
                            <li><a href="/services">{{ __('website.menu.services') }}</a></li>
                            <li><a href="/about-us">{{ __('website.menu.About-us') }}</a></li>
                            <li><a href="/faq">{{ __('website.menu.FAQ') }}</a></li>
                            <li><a href="/contact-us">{{ __('website.menu.Contact_Us') }}</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-6 col-md-6 col-lg-3 footer-widget widget-contact">
                    <div class="footer-widget-title">
                        <h5>{{ __('website.content.Quick_Contact') }}</h5>
                    </div>
                    <div class="widget-content">
                        <p>{{ __('website.content.Quick_Contact_description') }}</p>
                        <ul>
                            <li class="phone">
                                <a href="tel:{{getSetting('setting')['phone']}}" target="_blank">
                                    @if ( app()->getLocale() == "ar" )
                                        {{getSetting('setting')['phone']}} <i class="fa fa-phone fa-lg"></i>
                                    @else
                                        <i class="fa fa-phone fa-lg"></i> {{getSetting('setting')['phone']}}
                                    @endif
                                </a>
                            </li>
                            <li class="address">{{getSetting('setting')['address_'.$lang]}}</li>
                        </ul>
                    </div>
                </div>

            </div>
            <div class="clearfix"></div>
        </div>

    </div>

    <div class="footer-bottom">
        <div class="row">
            <div class="col-md-12 col-md-12 text--center footer-copyright">
                <div class="copyright"><span>{!! __('webMessage.copyrights' , ['name' => getSetting('setting')['name_'.$lang]]) !!}</span></div>
            </div>
        </div>

    </div>

</footer>
<div class="backtop" id="back-to-top"><i class="fas fa-chevron-up"></i></div>