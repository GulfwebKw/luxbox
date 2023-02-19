<header class="header header-1 header-transparent" id="navbar-spy">
    <nav class="navbar navbar-expand-lg  navbar-bordered navbar-sticky" id="primary-menu">
        <a class="navbar-brand <?php if( $lang == "ar" ): ?> mr-30 <?php else: ?> ml-3 <?php endif; ?>" href="<?php echo e(url('/')); ?>">
            <img class="logo logo-light <?php if( $lang == "ar" ): ?> mr-30 <?php else: ?> ml-3 <?php endif; ?>" src="<?php echo e(asset('uploads/settings/'.$setting->logo)); ?>" alt="<?php echo e(getSetting('setting')['name_'.$lang]); ?>" /><img class="logo logo-dark <?php if( $lang == "ar" ): ?> mr-30 <?php else: ?> ml-3 <?php endif; ?>" src="<?php echo e(asset('/uploads/settings/'.getSetting('setting')->logo)); ?>" alt="<?php echo e(getSetting('setting')['name_'.$lang]); ?>" /></a>
        <div class="ml-5">
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="<?php echo e(url('/')); ?>"><span><?php echo e(__('website.menu.Home')); ?></span></a></li>
                    <li class="nav-item"><a href="<?php echo e(url('/shipping')); ?>"><span><?php echo e(__('website.menu.Shipping_Cost')); ?></span></a></li>
                    <li class="nav-item"><a href="<?php echo e(url('/works')); ?>"><span><?php echo e(__('website.menu.How_it_Works')); ?></span></a></li>
                    <li class="nav-item"><a href="<?php echo e(url('/services')); ?>"><span><?php echo e(__('website.menu.services')); ?></span></a></li>
                    <li class="nav-item"><a href=" <?php echo e(url('/about-us')); ?> "><span><?php echo e(__('website.menu.About-us')); ?></span></a></li>
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
<?php /**PATH /home/luqqvtwm/private/resources/views/front/partials/header.blade.php ENDPATH**/ ?>