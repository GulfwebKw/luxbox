<section class="bg-overlay bg-overlay-dark2" style="padding:0;">
    <div class="row">
        <div class="col-12 col-lg-12">

            <div class="video bg-overlay bg-overlay-dark" id="video1">
                <div class="bg-section"><img src="{{ asset('uploads/videos/'.$video->image) }}" alt="background" /></div>
                <div class="player"><a class="popup-video" href="{{ app()->getLocale() == "ar" ? $video->link_youtube_ar : $video->link_youtube }}"> <i class="fas fa-play"></i></a></div>
            </div>

        </div>
    </div>
</section>