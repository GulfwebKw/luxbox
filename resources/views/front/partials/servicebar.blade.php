<section class="services-bar" id="servicesBar">
    <div class="container">
        <div class="row no-gutters">
            @foreach ($duty as $servicebar)
                <div class="col-12 col-md-6 col-lg-3 services-bar-card"><img src="{{ asset('uploads/duties/'.$servicebar->image) }}" alt="" style="margin:0 15px 0 0; " width="60" height="60"/>
                    <div class="thumb-body">
                        <br>
                        <h3 class="mb-10 mr-2 ml-2">{!! $servicebar['title_'.$lang] !!}</h3>
                        <p class="lh-20 mr-2 ml-2">{{ \Illuminate\Support\Str::limit(strip_tags($servicebar['description_'.$lang]), 30) }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>