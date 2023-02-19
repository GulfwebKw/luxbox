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
                        <li class="nav-item active"><a href="<?php echo e(url('/shipping')); ?>"><span><?php echo e(__('website.menu.Shipping_Cost')); ?></span></a></li>
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


    <section class="cta bg-overlay bg-overlay-dark2 mb-450" id="cta-1">
        <div class="bg-section"><img src="<?php echo e(asset('uploads/headers/'.$header->image_header_shipping)); ?>" alt="background" /></div>
        <div class="container">
        <div class="row">
        <div class="col-12 col-lg-6">
        <div class="title text-lg-left">
        <div class="title-heading">
        <h1 style="color:#fff;"><?php echo e($header['title_shipping_cost_'.$lang]); ?></h1>
        </div>
        <div class="clearfix"></div>
        <ol class="breadcrumb justify-content-lg-start">
        <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>"><?php echo e(__('website.menu.Home')); ?></a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo e($header['title_shipping_cost_'.$lang]); ?></li>
        </ol>
        </div>
        </div>
        
        <div class="col-12 col-lg-6">
        <div class="icon-set">
        <div class="icon-panel"> <i class="icon flaticon-016-payment-terminal"></i><span><?php echo e(__('website.shipping.transparent_pricing')); ?></span></div>
        <div class="icon-panel"> <i class="icon flaticon-014-box-3"></i><span><?php echo e(__('website.shipping.fast_efficient_delivery')); ?></span></div>
        <div class="icon-panel"> <i class="icon flaticon-001-scale-1"></i><span><?php echo e(__('website.shipping.warehouse_storage')); ?></span></div>
        </div>
        </div>
        
        <div class="col-12">
        <div class="contact-panel">
        <div class="contact-types">
        <a class="button quote-btn active" href=""> <i class="flaticon-020-order"> </i><span><?php echo e(__('website.shipping.SHIPPING_RATE_CALCULATOR')); ?></span></a></div>
        
        <div class="contact-card">
        <div class="contact-body">
        <div class="row">
        <div class="col-12 col-lg-12">

        <div class="row">
        <div class="col-12 col-lg-6">
        <h5 class="card-heading"><?php echo e(__('website.shipping.Shipping_to')); ?></h5>
        <div class="select-container">
        <select class="form-control w-100" id="country">
        <option value="default"><?php echo e(__('website.shipping.Select_the_Country')); ?></option>
        <option value="KU"><?php echo e(__('website.shipping.Kuwait')); ?></option>
        <option value="US"><?php echo e(__('website.shipping.usa')); ?></option>
        </select>
        </div>
        </div>
        <div class="col-12 col-md-6 col-lg-6">
        <h5 class="card-heading"><?php echo e(__('website.shipping.zipcode')); ?></h5>
        <input class="form-control" type="text" id="zipcode" placeholder="<?php echo e(__('website.shipping.zipcode')); ?>" required="" />
        </div>
        <div class="col-12 col-lg-3">
        <div class="select-container">
        <input class="form-control" type="number" id="weight" placeholder="<?php echo e(__('website.shipping.Weight')); ?>" required="" />
        </div>
        </div>
        
        <div class="col-12 col-lg-1">
        <div class="select-container">
        <select class="form-control" id="weightC">
        <option value="AL"><?php echo e(__('website.shipping.lb')); ?></option>
        <option value="AK"><?php echo e(__('website.shipping.kg')); ?></option>
        </select>
        </div>
        </div>
        <div class="col-12 col-md-2">
        <input class="form-control" type="number" id="length" placeholder="<?php echo e(__('website.shipping.length')); ?>" required="" />
        </div>
        <div class="col-12 col-md-2">
        <input class="form-control" type="number" id="weight2" placeholder="<?php echo e(__('website.shipping.Weight')); ?>" required="" />
        </div>
        <div class="col-12 col-md-2">
        <input class="form-control" type="number" id="height" placeholder="<?php echo e(__('website.shipping.Height')); ?>" required="" />
        </div>
        <div class="col-12 col-lg-2">
        <div class="select-container">
        <select class="form-control" id="heightC">
        <option value="AL"><?php echo e(__('website.shipping.inches')); ?></option>
        <option value="AK"><?php echo e(__('website.shipping.Centimeters')); ?></option>
        </select>
        </div>
        </div>
        
        
        <div class="clearfix"></div>
        

        
        <div class="col-12">
        <input class="btn btn--secondary btn--block" onclick="findcost()" type="submit" value="<?php echo e(__('website.shipping.Calculate')); ?>" />
        </div>
        <div class="col-12">
        <div class="shipping-result"></div>
        </div>
        </div>

        </div>
        </div>
        </div>
        
        </div>
        
        </div>
        </div>
        
        </div>
        
        </div>
        
        </section>
        <div class="clearfix"></div>
    <?php echo $__env->make('front.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
    <script>
        function replaceAll(str, find, replace) {
            return str.replace(new RegExp(find, 'g'), replace);
        }
        function  findcost(){
            var query = '<?php echo str_replace(["'" , "\\"] , [ "\"" , "\\\\"] , getSetting('setting')['google_analytics'] ); ?>';
            query = replaceAll(query , '{country}' , "'"+$('#country').val()+"'" );
            query = replaceAll(query , '{zipcode}' , "'"+$('#zipcode').val()+"'" );
            query = replaceAll(query , '{weight}' , parseFloat($('#weight').val()) );
            query = replaceAll(query , '{weightC}' , "'"+$('#weightC').val()+"'" );
            query = replaceAll(query , '{length}' , parseFloat($('#length').val()) );
            query = replaceAll(query , '{weight2}' , parseFloat($('#weight2').val()) );
            query = replaceAll(query , '{height}' , parseFloat($('#height').val()) );
            query = replaceAll(query , '{heightC}' , "'"+$('#heightC').val()+"'" );
            query = replaceAll(query , '{lang}' , "'<?php echo e($lang); ?>'" );
            var result ;
            try {
                result = eval(query);
            } catch (e) {
                $('.shipping-result').html('<div class="alert alert-danger m-3" ><?php echo e(__('website.content.Error_happened')); ?></div>');
                return false;
            }
            if ( result.toString().search("NaN") !== -1  )
                $('.shipping-result').html('<div class="alert alert-danger m-3" ><?php echo e(__('website.content.Error_happened')); ?></div>');
            else
                if ((new Intl.NumberFormat('en-US', { style: 'currency', currency: '<?php echo e(__('website.content.currency')); ?>'}).format(result)).toString().search("NaN") !== -1   )
                    $('.shipping-result').html('<div class="alert alert-success m-3" ><?php echo e(__('website.content.Delivery_cost')); ?> '+result.toString() +'</div>');
                else
                    $('.shipping-result').html('<div class="alert alert-success m-3" ><?php echo e(__('website.content.Delivery_cost')); ?> '+(new Intl.NumberFormat('en-US', { style: 'currency', currency: '<?php echo e(__('website.content.currency')); ?>'}).format(result))  +'</div>');
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/luqqvtwm/private/resources/views/front/pages/shpping-cost.blade.php ENDPATH**/ ?>