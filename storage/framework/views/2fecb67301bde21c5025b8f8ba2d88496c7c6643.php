<?php $__env->startSection('content'); ?>
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
                        <li class="nav-item active"><a href=" <?php echo e(url('/about-us')); ?> "><span><?php echo e(__('website.menu.About-us')); ?></span></a></li>
                        <li class="nav-item"><a href="<?php echo e(url('/faq')); ?>"><span><?php echo e(__('website.menu.FAQ')); ?></span></a></li>
                        <li class="nav-item"><a href="<?php echo e(url('/blog')); ?>"><span><?php echo e(__('website.menu.Blog')); ?></span></a></li>
                        <li class="nav-item"><a href="<?php echo e(url('/contact-us')); ?>"><span><?php echo e(__('website.menu.Contact_Us')); ?></span></a></li>
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
        <div class="bg-section"><img src="<?php echo e(asset('uploads/headers/'.$header->image_header_aboutus)); ?>" alt="Background" /></div>
        <div class="container">
        <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-6">
        <div class="title text-lg-left">
        <div class="title-heading">
        <h1><?php echo e($header['title_aboutus_'.$lang]); ?></h1>
        </div>
        <div class="clearfix"></div>
        <ol class="breadcrumb justify-content-lg-start">
        <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>"><?php echo e(__('website.menu.Home')); ?></a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo e($header['title_aboutus_'.$lang]); ?></li>
        </ol>
        </div>
        </div>
        </div>
        </div>
        </section>
        
        
        <section class="about about-4" id="about-4">
        <div class="container">
        <div class="row">
        <div class="col-12 col-lg-5">
        <div class="about-img about-img-left">
        <div class="about-img-warp bg-overlay">
        <div class="bg-section"><img class="img-fluid" src="<?php echo e(asset('uploads/abouts/'.$about->image)); ?>" alt="about Image" /></div>
        </div>
        <div class="counter">
        <div class="counter-icon"> <i class="flaticon-018-packaging"></i></div>
        <div class="counter-num"> <span class="counting"><?php echo $about->counter; ?></span>
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
        
        </section>
        
    <?php echo $__env->make('front.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/luqqvtwm/private/resources/views/front/pages/abouts.blade.php ENDPATH**/ ?>