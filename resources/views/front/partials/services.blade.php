<section class="cases-clients bg-parllax" id="cases-clients-1" style="padding-top:70px;">
    <div class="cases-standard">
        <div class="container">
            <div class="heading text-center">
                <h2 class="heading-title">{{ __('website.content.Featured_Services') }}</h2>
            </div>
            <div class="row">
                <div class="col-12">
                   
                    <div class="carousel owl-carousel carousel-navs carousel-dots" data-slide="3" data-slide-rs="1" data-autoplay="true" data-nav="true" data-dots="false" data-space="30" data-loop="true" data-speed="3000">
                        @foreach ($services as $service)
                        <div class="case-item">
                            <div class="case-item-warp">
                                <div class="case-img"><img src="{{ asset('uploads/services/'.$service->image) }}" alt="Addresses" /></div>

                                <div class="case-content">
                                    <div class="case-title">
                                        <h4><a href="{{ route('service' , [$service->id]) }}">{!! $service['title_'.$lang] !!}</a></h4>
                                    </div>
                                    <div class="case-desc">
                                        <p>{!! \Illuminate\Support\Str::limit($service['description_'.$lang], 50) !!}</p>
                                    </div>
                                    <div class="case-more"><a href="{{ route('service' , [$service->id]) }}"><i class="icon-arrow-right"></i> {{__('website.content.Read_more')}}</a></div>
                                </div>

                            </div>
                        </div>
                        @endforeach
                    
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>