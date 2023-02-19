<section class="services-bar" id="servicesBar">
    <div class="container">
        <div class="row no-gutters">
            <?php $__currentLoopData = $duty; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $servicebar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-12 col-md-6 col-lg-3 services-bar-card"><img src="<?php echo e(asset('uploads/duties/'.$servicebar->image)); ?>" alt="" style="margin:0 15px 0 0; " width="60" height="60"/>
                    <div class="thumb-body">
                        <br>
                        <h3 class="mb-10 mr-2 ml-2"><?php echo $servicebar['title_'.$lang]; ?></h3>
                        <p class="lh-20 mr-2 ml-2"><?php echo e(\Illuminate\Support\Str::limit(strip_tags($servicebar['description_'.$lang]), 30)); ?></p>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section><?php /**PATH /home/luqqvtwm/private/resources/views/front/partials/servicebar.blade.php ENDPATH**/ ?>