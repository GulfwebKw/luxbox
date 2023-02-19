<?php $__env->startSection('content'); ?>
	<?php echo $__env->make('front.partials.preloader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="wrapper clearfix" id="wrapperParallax1">

	<header class="header header-1 header-transparent" id="navbar-spy">
		<nav class="navbar navbar-expand-lg  navbar-bordered navbar-sticky" id="primary-menu">
			<a class="navbar-brand ml-3" href="<?php echo e(url('/')); ?>">
				<img class="logo logo-light ml-3" src="<?php echo e(asset('uploads/settings/'.getSetting('setting')->logo)); ?>" alt="<?php echo e(getSetting('setting')['name_'.$lang]); ?>" /><img class="logo logo-dark ml-3" src="<?php echo e(asset('/uploads/settings/'.getSetting('setting')->logo)); ?>" alt="<?php echo e(getSetting('setting')['name_'.$lang]); ?>" /></a>
			<div class="ml-5">
				<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

				<div class="collapse navbar-collapse" id="navbarContent">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item"><a href="<?php echo e(url('/')); ?>"><span><?php echo e(__('website.menu.Home')); ?></span></a></li>
						<li class="nav-item"><a href="<?php echo e(url('/shipping')); ?>"><span><?php echo e(__('website.menu.Shipping_Cost')); ?></span></a></li>
						<li class="nav-item"><a href="<?php echo e(url('/works')); ?>"><span><?php echo e(__('website.menu.How_it_Works')); ?></span></a></li>
						<li class="nav-item "><a href="<?php echo e(url('/services')); ?>"><span><?php echo e(__('website.menu.services')); ?></span></a></li>
						<li class="nav-item"><a href=" <?php echo e(url('/about-us')); ?> "><span><?php echo e(__('website.menu.About-us')); ?></span></a></li>
						<li class="nav-item"><a href="<?php echo e(url('/faq')); ?>"><span><?php echo e(__('website.menu.FAQ')); ?></span></a></li>
						<li class="nav-item"><a href="<?php echo e(url('/blog')); ?>"><span><?php echo e(__('website.menu.Blog')); ?></span></a></li>
						<li class="nav-item"><a href="<?php echo e(url('/contact-us')); ?>"><span><?php echo e(__('website.menu.Contact_Us')); ?></span></a></li>
						<?php if(Auth::guard('member')->check()): ?>
							<li class="nav-item active"><a href="<?php echo e(url('/my-account')); ?>"><span><?php echo e(__('website.menu.My_Account')); ?></span></a></li>
							<li class="nav-item"><a href="<?php echo e(route('user.logout')); ?>"><span><?php echo e(__('website.menu.Logout')); ?></span></a></li>
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
		<div class="bg-section"><img src="/assets/images/page-titles/3.jpg" alt="Background" /></div>
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-6">
					<div class="title text-lg-left">
						<div class="title-heading">
							<h1>Shipped Packages</h1>
						</div>
						<div class="clearfix"></div>
						<ol class="breadcrumb justify-content-lg-start">
							<li class="breadcrumb-item"><a href="index.html">Home</a></li>
							<li class="breadcrumb-item"><a href="myaccount.html">My Account</a></li>
							<li class="breadcrumb-item active" aria-current="page">Shipped Packages</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="my_section  mt-50">
		<div class="container">
			<div class="row">
				<div class="myaccount"><a href="<?php echo e(route('my-account')); ?>"><img src="/assets/images/package.png" alt="" style="margin:0 10px 0 0;"> <?php echo e(__('website.member.ReceivedPackages')); ?></a></div>
				<div class="myaccount"><a href="<?php echo e(route('shipped-packages')); ?>"><img src="/assets/images/ship.png" alt="" style="margin:0 10px 0 0;"> <?php echo e(__('website.member.ShippedPackages')); ?></a></div>
				<div class="myaccount"><a href="<?php echo e(route('invoices')); ?>"><img src="/assets/images/invoice.png" alt="" style="margin:0 10px 0 0;"> <?php echo e(__('website.member.Invoices')); ?></a></div>
				<div class="myaccount"><a href="<?php echo e(route('account-information')); ?>"><img src="/assets/images/account.png" alt="" style="margin:0 10px 0 0;"> <?php echo e(__('website.member.AccountInformation')); ?></a></div>
			</div>
		</div>
	</section>


	<section class="bg-parllax my_section">
		<div class="cases-standard">
			<div class="container">
				<div class="row">

					<div class="col-sm-12 col-md-12 col-lg-9">
						<div class="container">
							<div class="row">

								<?php if($package->images): ?>
									<?php $__currentLoopData = explode(',', $package->images); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<div class="case-item col-sm-12 col-md-12 col-lg-4 work-item">
									<div class="case-img"><div class="work-item-container"><div class="work-img"><img src="<?php echo e(asset('/uploads/packages/'.$image)); ?>" alt="post" />
												<div class="work-hover"><div class="work-action"><div class="work-zoom"><a class="img-gallery-item" href="<?php echo e(asset('/uploads/packages/'.$image)); ?>" title="Post"></a></div></div></div></div></div></div></div>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
							</div>
						</div>
					</div>

					<div class="col-sm-12 col-md-12 col-lg-3">
						<ul class="my_list">
							<li>Order: <strong class="body_color">#<?php echo e($package->order); ?></strong></li>
							<li>Order Created: <strong class="body_color"><?php echo e($package->created_at->format('y-m-d')); ?></strong></li>
							<li>Order Total: <strong class="body_color"><?php echo e('$'.$package['invoice']->shipping_cost); ?></strong></li>
							<li>Number of Packages: <strong class="body_color"><?php echo e($package->boxes_count); ?></strong></li>
							<li>Order Status: <strong class="body_color"><?php echo e($package->order_status); ?></strong></li>
							<li>Order Weight: <strong class="body_color"><?php echo e($package->weight . ' '. $package->weight_type); ?></strong></li>
							<li>Goods Value: <strong class="body_color"><?php echo e('$'.$package->goods_value); ?></strong></li>
							<li>Shipping Method: <strong class="body_color"><?php echo e($package->shipping_method); ?></strong></li>
							<li>Number Of Consolidated Boxes: <strong class="body_color"><?php echo e($package->boxes_count); ?></strong></li></ul>

						<button class="btn_blue" onclick="window.location.href='track.html'"><i class="fa fa-ship"></i> Track Order</button>

					</div>


					<!-- <div class="col-12 col-lg-12 mt-50"><h5 class="heading-title">PACKAGES IN ORDER</h5> </div>

                        <div class="case-item col-sm-12 col-md-12 col-lg-3 work-item">
                        <div class="case-item-warp">
                        <div class="case-img">
                            <div class="work-item-container"><div class="work-img"><img src="assets/images/work/full/post.png" alt="post" />
                            <div class="work-hover"><div class="work-action"><div class="work-zoom"><a class="img-gallery-item" href="assets/images/work/full/post.png" title="Post"></a></div></div></div></div></div>
                        </div>
                        <div class="case-content">
                        <div class="case-desc text--center">
                        <p><strong class="body_color">ENVELOPE</strong><br/>
                            Package #: 311437<br/>
                            Quantity: 1<br/>
                            Original track id: <strong class="gray_color">PS0000</strong> <a href="#" title="Copy Original Track ID"> &nbsp;<i class="far fa-copy"></i></a><br/>
                            Value: $1.00</p>
                        </div>
                        <div class="warn"><small><i class="fas fa-exclamation-triangle"></i> <strong>CUSTOMS & INSURANCE</strong> will be based on the above price</small></div>
                        </div></div></div>

                        <div class="case-item col-sm-12 col-md-12 col-lg-3 work-item">
                        <div class="case-item-warp">
                        <div class="case-img">
                            <div class="work-item-container"><div class="work-img"><img src="assets/images/work/full/post.png" alt="post" />
                            <div class="work-hover"><div class="work-action"><div class="work-zoom"><a class="img-gallery-item" href="assets/images/work/full/post.png" title="Post"></a></div></div></div></div></div>
                        </div>
                        <div class="case-content">
                        <div class="case-desc text--center">
                        <p><strong class="body_color">URBO BAG</strong><br/>
                            Package #: 311437<br/>
                            Quantity: 1<br/>
                            Original track id: <strong class="gray_color">PS0000</strong> <a href="#" title="Copy Original Track ID"> &nbsp;<i class="far fa-copy"></i></a><br/>
                            Value: $5.00</p>
                        </div>
                        <div class="warn"><small><i class="fas fa-exclamation-triangle"></i> <strong>CUSTOMS & INSURANCE</strong> will be based on the above price</small></div>
                        </div></div></div>

                        <div class="case-item col-sm-12 col-md-12 col-lg-3 work-item">
                        <div class="case-item-warp">
                        <div class="case-img">
                            <div class="work-item-container"><div class="work-img"><img src="assets/images/work/full/post.png" alt="post" />
                            <div class="work-hover"><div class="work-action"><div class="work-zoom"><a class="img-gallery-item" href="assets/images/work/full/post.png" title="Post"></a></div></div></div></div></div>
                        </div>
                        <div class="case-content">
                        <div class="case-desc text--center">
                        <p><strong class="body_color">WATCH BAND</strong><br/>
                            Package #: 311437<br/>
                            Quantity: 1<br/>
                            Original track id: <strong class="gray_color">PS0000</strong> <a href="#" title="Copy Original Track ID"> &nbsp;<i class="far fa-copy"></i></a><br/>
                            Value: $10.00</p>
                        </div>
                        <div class="warn"><small><i class="fas fa-exclamation-triangle"></i> <strong>CUSTOMS & INSURANCE</strong> will be based on the above price</small></div>
                        </div></div></div>

                        <div class="case-item col-sm-12 col-md-12 col-lg-3 work-item">
                        <div class="case-item-warp">
                        <div class="case-img">
                            <div class="work-item-container"><div class="work-img"><img src="assets/images/work/full/post.png" alt="post" />
                            <div class="work-hover"><div class="work-action"><div class="work-zoom"><a class="img-gallery-item" href="assets/images/work/full/post.png" title="Post"></a></div></div></div></div></div>
                        </div>
                        <div class="case-content">
                        <div class="case-desc text--center">
                        <p><strong class="body_color">DRINK STOPPER</strong><br/>
                            Package #: 311437<br/>
                            Quantity: 1<br/>
                            Original track id: <strong class="gray_color">PS0000</strong> <a href="#" title="Copy Original Track ID"> &nbsp;<i class="far fa-copy"></i></a><br/>
                            Value: $5.00</p>
                        </div>
                        <div class="warn"><small><i class="fas fa-exclamation-triangle"></i> <strong>CUSTOMS & INSURANCE</strong> will be based on the above price</small></div>
                        </div></div></div> -->


				</div>
			</div>
		</div>
	</section>


	<?php echo $__env->make('front.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/luqqvtwm/private/resources/views/member/view-order.blade.php ENDPATH**/ ?>