<section class="about" id="about-1">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-5">
                <div class="about-img about-img-left">
                    <div class="about-img-warp bg-overlay">
                        <div class="bg-section"><img src="{{ asset('uploads/stores/'.$stores->image) }}" alt="stores Image" /></div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-7">
                <div class="heading heading-3">
                    <h2 class="heading-title">{!! $stores['title_'.$lang] !!}</h2>
                </div>
                <div class="about-block">
                    <div class="row">
                        <div class="col-12 col-lg-12">
                            <div class="block-left">
                                <p>{!! $stores['description_'.$lang] !!}</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>