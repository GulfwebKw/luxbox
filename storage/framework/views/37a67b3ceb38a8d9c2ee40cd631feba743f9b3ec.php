<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/css/leaflet.css')); ?>" />
<script src="<?php echo e(asset('assets/js/leaflet.js')); ?>"></script>
<?php echo $__env->make('front.partials.preloader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="wrapper clearfix" id="wrapperParallax1">
    <header class="header header-1 header-transparent" id="navbar-spy">
        <nav class="navbar navbar-expand-lg  navbar-bordered navbar-sticky" id="primary-menu">
            <a class="navbar-brand <?php if( $lang == "ar" ): ?> mr-30 <?php else: ?> ml-3 <?php endif; ?>" href="<?php echo e(url('/')); ?>">
                <img class="logo logo-light <?php if( $lang == "ar" ): ?> mr-30 <?php else: ?> ml-3 <?php endif; ?>" src="<?php echo e(asset('uploads/settings/'.$setting->logo)); ?>" alt="<?php echo e(getSetting('setting')['name_'.$lang]); ?>" /><img class="logo logo-dark <?php if( $lang == "ar" ): ?> mr-30 <?php else: ?> ml-3 <?php endif; ?>" src="<?php echo e(asset('/uploads/settings/'.getSetting('setting')->logo)); ?>" alt="<?php echo e(getSetting('setting')['name_'.$lang]); ?>" /></a>
            <div class="ml-5">
                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

                <div class="collapse navbar-collapse" id="navbarContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a href="<?php echo e(url('/')); ?>"><span><?php echo e(__('website.menu.Home')); ?></span></a></li>
                        <li class="nav-item"><a href="<?php echo e(url('/shipping')); ?>"><span><?php echo e(__('website.menu.Shipping_Cost')); ?></span></a></li>
                        <li class="nav-item"><a href="<?php echo e(url('/works')); ?>"><span><?php echo e(__('website.menu.How_it_Works')); ?></span></a></li>
                        <li class="nav-item"><a href="<?php echo e(url('/services')); ?>"><span><?php echo e(__('website.menu.services')); ?></span></a></li>
                        <li class="nav-item"><a href=" <?php echo e(url('/about-us')); ?> "><span><?php echo e(__('website.menu.About-us')); ?></span></a></li>
                        <li class="nav-item"><a href="<?php echo e(url('/faq')); ?>"><span><?php echo e(__('website.menu.FAQ')); ?></span></a></li>
                        <li class="nav-item"><a href="<?php echo e(url('/blog')); ?>"><span><?php echo e(__('website.menu.Blog')); ?></span></a></li>
                        <li class="nav-item active"><a href="<?php echo e(url('/contact-us')); ?>"><span><?php echo e(__('website.menu.Contact_Us')); ?></span></a></li>
                        <?php if(Auth::guard('member')->check()): ?>
                            <li class="nav-item"><a href="<?php echo e(url('/my-account')); ?>"><span><?php echo e(__('website.menu.My_Account')); ?></span></a></li>
                        <li class="nav-item"><a href="<?php echo e(route('user.logout')); ?>"><span><?php echo e(__('website.menu.Logout')); ?></span></a></li>
                        <li class="nav-item"></li>
                    </ul>
                    <?php else: ?>
                        <div class="module-container">

                            <div class="module-contact"><a class="btn btn--primary" href="<?php echo e(url('/login')); ?>"><?php echo e(__('website.menu.Login_and_Register')); ?></a></div>
                            <?php endif; ?>

                            <div class="module module-language">
                                <div class="selected ml-1"><span><?php echo e($lang); ?> </span><i class="fas fa-chevron-down"></i></div>
                                <div class="lang-list">
                                    <ul>
                                        <li> <a href="<?php echo e(route('changeLocale' , ['en'])); ?>"><?php echo e(__('website.menu.english')); ?></a></li>
                                        <li> <a href="<?php echo e(route('changeLocale' , ['ar'])); ?>"><?php echo e(__('website.menu.arabic')); ?></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                </div>

            </div>

        </nav>
    </header>

    <section class="page-title bg-overlay bg-overlay-dark bg-parallax" id="page-title">
        <div class="bg-section"><img src="<?php echo e(asset('uploads/headers/'.$header->image_header_services)); ?>" alt="Background" /></div>
        <div class="container">
        <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-6">
        <div class="title text-lg-left">
        <div class="title-heading">
        <h1><?php echo e($header['title_contactus_'.$lang]); ?></h1>
        </div>
        <div class="clearfix"></div>
        <ol class="breadcrumb justify-content-lg-start">
        <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>"><?php echo e(__('website.menu.Home')); ?></a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo e($header['title_contactus_'.$lang]); ?></li>
        </ol>
        </div>
        </div>
        </div>
        </div>
        </section>
        
        <section class="services" id="services-1">
        <div class="container">
        <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-8 offset-lg-2">
        <div class="heading text--center">
        <h2 class="heading-title"><?php echo $description['title_'.$lang]; ?></h2>
        <p>&nbsp;</p>
        <p><?php echo $description['description_'.$lang]; ?></p>
        </div>
        </div>
        </div>



        
        <section class="col-12">
           
            <div id="map" style="width:1400px; height: 500px;" class="col-12"></div>
            <br>
            <a href="https://maps.google.com/?q=<?php echo e($map->lat); ?>,<?php echo e($map->lang); ?>" class="btn btn-primary <?php if( $lang == "ar" ): ?> mr-30 <?php else: ?> ml-3 <?php endif; ?> col-12"><?php echo e(__('website.contact-us.Go_to_Direction')); ?></a>
            
        </section>
        <script>

            var token = 'pk.eyJ1Ijoic29oZWlsdmFpbyIsImEiOiJja2kxcnUyYTUwNW03MnhudDNsOGRwNG94In0.h3EW-3gLt4EccaIq9tImIw';
            var lat = '<?php echo e($map->lat); ?>'
            var long = '<?php echo e($map->lang); ?>'
            var sender = L.map('map').setView([lat, long], 15);
            var markersender = L.marker([lat, long]).addTo(sender);
        
        
        
            L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
                attribution: 'LuxBox',
                maxZoom: 18,
                id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1,
                accessToken: token
            }).addTo(sender);
        </script>
        <section class="contact-info">
        <div class="container">
        <div class="row">
        <div class="col-12 col-lg-4">
        <div class="row">
        <div class="col-12 col-sm-6 col-lg-12">
        <div class="contact-details">
        <h6><?php echo e(__('website.contact-us.contact_details')); ?></h6>
        <ul class="list-unstyled info">
        <li><span class="fas fa-map-marker-alt"></span><a href="javascript:void(0)"><?php echo $setting['address_'.$lang]; ?></a></li>
        <li><span class="fas fa-envelope"></span><a href="#"><span class="__cf_email__" data-cfemail="4f0a3e3a263b2e0f78203d202029612c2022"><?php echo $setting->email; ?></span></a></li>
        <li <?php if($lang != "en" ): ?> style="direction: ltr;" <?php endif; ?>><span class="fas fa-phone-alt <?php if($lang != "en" ): ?> float-right <?php endif; ?>"></span><a href="tel:<?php echo $setting->phone; ?>"><?php echo $setting->phone; ?></a></li>
        </ul>
        </div>
        </div>
        <div class="col-12 col-sm-6 col-lg-12">
        <div class="opening-hours">
        <h6><?php echo e(__('website.contact-us.opening_hours')); ?></h6>
        <ul class="list-unstyled">
        <li> <span><?php echo e(__('website.contact-us.Monday_friday')); ?></span><span><?php echo $description->time_mon_fir; ?></span></li>
        <li> <span><?php echo e(__('website.contact-us.saturday')); ?></span><span><?php echo $description->time_sat; ?></span></li>
        <li> <span><?php echo e(__('website.contact-us.sunday')); ?></span><span><?php echo $description->time_sun; ?></span></li>
        </ul>
        </div>
        </div>
        </div>
        </div>
        <div class="col-12 col-lg-8 mb-5">
        <h6><?php echo e(__('website.contact-us.Ask_a_question')); ?></h6>
        <form  method="post" action="<?php echo e(route('store.message')); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
        <div class="row">
        <div class="col-12 col-lg-4">
        <input class="form-control" type="text" name="name" placeholder="<?php echo e(__('website.contact-us.name')); ?>" required />
        </div>
        <div class="col-12 col-lg-4">
        <input class="form-control" type="email" name="email" placeholder="<?php echo e(__('website.contact-us.email')); ?>" required />
        </div>
        <div class="col-12 col-lg-4">
        <input class="form-control" type="text" name="website" placeholder="<?php echo e(__('website.contact-us.website')); ?>" required />
        </div>
        <div class="col-12 col-lg-4">
            <input class="form-control" type="text" name="subject" placeholder="<?php echo e(__('website.contact-us.subject')); ?>" required />
            </div>
        <div class="col-12">
        <textarea class="form-control" name="message" cols="30" rows="2" placeholder="<?php echo e(__('website.contact-us.message')); ?>" required></textarea>
        </div>
        <div class="col-4 col-lg-4<?php echo e($errors->has('captcha') ? ' has-error' : ''); ?>">
            <div class="captcha btn-refresh">
                <span><?php echo captcha_img(); ?></span>
               
            
        </div>
        
        
        
        <input id="captcha" type="text" class="form-control mt-1" placeholder="<?php echo e(__('website.contact-us.captcha')); ?>" name="captcha">
                  <?php if($errors->has('captcha')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('captcha')); ?></strong>
                                    </span>
                                <?php endif; ?>
    </div>
    <br>
        <div class="col-12">
        <input class="btn btn--primary" type="submit" value="<?php echo e(__('website.contact-us.Submit')); ?>" />
        </div>
        </div>
        </form>
        </div>
        </div>
        
        </div>

        </div>
        </section>
        <?php echo $__env->make('front.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/luqqvtwm/private/resources/views/front/pages/contact-us.blade.php ENDPATH**/ ?>