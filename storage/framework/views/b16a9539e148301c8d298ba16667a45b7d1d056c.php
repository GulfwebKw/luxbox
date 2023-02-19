<section class="about" id="about-1">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-5">
                <div class="about-img about-img-left">
                    <div class="about-img-warp bg-overlay">
                        <div class="bg-section"><img src="<?php echo e(asset('uploads/abouts/'.$about->image)); ?>" alt="about Image" /></div>
                    </div>
                    <div class="counter">
                        <div class="counter-icon"> <i class="flaticon-018-packaging"></i></div>
                        <div class="counter-num"> <span class="counting"><?php echo e($about->counter); ?></span>
                            <p>m</p>
                        </div>
                        <div class="counter-name">
                            <h6><?php echo e(__('website.content.delivered_goods')); ?></h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-7">
                <div class="heading heading-3">
                    <h2 class="heading-title"><?php echo $about['title_'.$lang]; ?></h2>
                </div>
                <div class="about-block">
                    <div class="row">
                        <div class="col-12 col-lg-12">
                            <div class="block-left">
                                <p><?php echo $about['description_'.$lang]; ?></p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section><?php /**PATH /home/luqqvtwm/private/resources/views/front/partials/aboutus.blade.php ENDPATH**/ ?>