<section class="slider slider-1" id="slider-1">
    <div class="container-fluid pr-0 pl-0">
        <div class="carousel owl-carousel custom-carousel carousel-navs carousel-dots" data-slide="1" data-slide-rs="1" data-autoplay="false" data-nav="true" data-dots="true" data-space="0" data-loop="true" data-speed="800" data-slider-id="#custom-carousel">
            <?php $__currentLoopData = $slideShow; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $show): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="slide d-flex align-items-center bg-overlay bg-overlay-dark">
                <div class="bg-section"><img src="<?php echo e(asset('uploads/slideshows/'.$show->image)); ?>" alt="Background" /></div>
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-7">
                           
                                
                            
                            <div class="slide-content">
                                <p class="slide-subheadline"><?php echo $show['title_'.$lang]; ?></p>
                                <h1 class="slide-headline"><?php echo $show['description_'.$lang]; ?></h1>

                            </div>
                            
                        </div>
                    </div>

                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        

        </div>
    </div>

</section><?php /**PATH /home/luqqvtwm/private/resources/views/front/partials/slideshow.blade.php ENDPATH**/ ?>