<section class="slider slider-1" id="slider-1">
    <div class="container-fluid pr-0 pl-0">
        <div class="carousel owl-carousel custom-carousel carousel-navs carousel-dots" data-slide="1" data-slide-rs="1" data-autoplay="false" data-nav="true" data-dots="true" data-space="0" data-loop="true" data-speed="800" data-slider-id="#custom-carousel">
            @foreach ($slideShow as $show)
            <div class="slide d-flex align-items-center bg-overlay bg-overlay-dark">
                <div class="bg-section"><img src="{{ asset('uploads/slideshows/'.$show->image) }}" alt="Background" /></div>
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-7">
                           
                                
                            
                            <div class="slide-content">
                                <p class="slide-subheadline">{!! $show['title_'.$lang] !!}</p>
                                <h1 class="slide-headline">{!! $show['description_'.$lang] !!}</h1>

                            </div>
                            
                        </div>
                    </div>

                </div>
            </div>
            @endforeach

        

        </div>
    </div>

</section>