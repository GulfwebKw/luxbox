<?php $__env->startSection('content'); ?>
<?php echo $__env->make('front.partials.preloader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="wrapper clearfix">
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
                        <li class="nav-item active"><a href="<?php echo e(url('/blog')); ?>"><span><?php echo e(__('website.menu.Blog')); ?></span></a></li>
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
        <div class="bg-section"><img src="<?php echo e(asset('uploads/headers/'.$header->image_header_blog)); ?>" alt="Background" /></div>
        <div class="container">
        <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-6">
        <div class="title text-lg-left">
        <div class="title-heading">
        <h1><?php echo e($header['title_blog_'.$lang]); ?></h1>
        </div>
        <div class="clearfix"></div>
        <ol class="breadcrumb justify-content-lg-start">
        <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>"><?php echo e(__('website.menu.Home')); ?></a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo e($header['title_blog_'.$lang]); ?></li>
        </ol>
        </div>
        </div>
        </div>
        </div>
        </section>
        
        
        <section class="blog blog-grid pb-90" id="blog">
        <div class="container">
        <div class="row">
            <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
            
        <div class=" col-sm-6 col-md-6 col-lg-4">
        <div class="blog-entry">
        <div class="entry-img"><a href="<?php echo e(route('blog' , [$blog->id])); ?>"><img src="<?php echo e(asset('uploads/blogs/'.$blog->image)); ?>" /></a></div>
        
        
        <div class="entry-content">
        <div class="entry-title">
        <h4><a href="#"><?php echo e($blog['title_'.$lang]); ?></a></h4>
        </div>
        <div class="entry-date"><span class="month"><?php echo $blog->created_at; ?></span></div>
        <div class="entry-bio">
        <p><?php echo \Illuminate\Support\Str::limit($blog['description_'.$lang], 50); ?></p>
        </div>
        <div class="entry-more"> <a href="<?php echo e(route('blog' , [$blog->id])); ?>"><?php echo e(__('website.content.Read_more')); ?></a></div>
        </div>
        </div>
        
        </div>
      
      
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 clearfix text--center">
            <ul class="pagination">
            <li class="active"></li>
        <?php echo $blogs->links(); ?>

            </ul>
            </div>
          
            </div>
     
        
        </div>
        
        </section>
    <?php echo $__env->make('front.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/luqqvtwm/private/resources/views/front/pages/blog.blade.php ENDPATH**/ ?>