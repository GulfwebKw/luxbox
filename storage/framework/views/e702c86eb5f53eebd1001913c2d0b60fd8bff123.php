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
<div class="bg-section"><img src="assets/images/page-titles/3.jpg" alt="Background" /></div>
<div class="container">
<div class="row">
<div class="col-sm-12 col-md-12 col-lg-6">
<div class="title text-lg-left">
<div class="title-heading">
<h1><?php echo e(__('website.member.MyAccount')); ?></h1>
</div>
<div class="clearfix"></div>
<ol class="breadcrumb justify-content-lg-start">
<li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>"><?php echo e(__('website.menu.Home')); ?></a></li>
<li class="breadcrumb-item"><?php echo e(__('website.member.MyAccount')); ?></li>
<li class="breadcrumb-item active" aria-current="page"><?php echo e(__('website.member.ReceivedPackages')); ?></li>
</ol>
</div>
</div>
</div>
</div>
</section>

<section class="my_section  mt-50">
<div class="container">
<div class="row">
	<div class="myaccount"><a href="<?php echo e(route('my-account')); ?>"><img src="assets/images/package.png" alt="" style="margin:0 10px 0 0;"> <?php echo e(__('website.member.ReceivedPackages')); ?></a></div>
	<div class="myaccount"><a href="<?php echo e(route('shipped-packages')); ?>"><img src="assets/images/ship.png" alt="" style="margin:0 10px 0 0;"> <?php echo e(__('website.member.ShippedPackages')); ?></a></div>
	<div class="myaccount"><a href="<?php echo e(route('invoices')); ?>"><img src="assets/images/invoice.png" alt="" style="margin:0 10px 0 0;"> <?php echo e(__('website.member.Invoices')); ?></a></div>
	<div class="myaccount"><a href="<?php echo e(route('account-information')); ?>"><img src="assets/images/account.png" alt="" style="margin:0 10px 0 0;"> <?php echo e(__('website.member.AccountInformation')); ?></a></div>
</div>
</div>
</section>


	<section class="bg-parllax my_section">
		<div class="cases-standard">
			<div class="container">
				<div class="row">

					<div class="col-12 col-lg-12"><h5 class="heading-title">ACCOUNT INFO</h5></div>

					<div class="col-12 col-lg-12 mt-50">
						<div class="locations" id="locations">
							<div class="row">
								<div class="col-12 col-lg-6">
									<div class="address">
										<div class="office">
											<h6>MY US SHIPPING ADDRESS</h6>
										</div>
										<ul class="list-unstyled info">
											<li><span class="fas fa-map-marker-alt"></span><a href="javascript:void(0)"><?php echo e(getSetting('setting')['address_'.$lang]); ?></a></li>
											<li><span class="fas fa-phone-alt"></span><a href="tel:	+965-221-23456"><?php echo e(getSetting('setting')->phone); ?></a></li>
										</ul>
									</div>
								</div>

								<div class="col-12 col-lg-6">
									<div class="address">
										<div class="office">
											<h6>MY ADDRESS <small>(Main Address)</small></h6>
										</div>
										<ul class="list-unstyled info">
											<li><strong><?php echo e($user->fullname); ?></strong></li>
											<li><span class="fas fa-map-marker-alt"></span><a href="javascript:void(0)"><?php echo e($user->getAddress()); ?></a></li>
											<li><span class="fas fa-envelope"></span><a href=""><span><?php echo e($user->email); ?></span></a></li>
											<li><span class="fas fa-phone-alt"></span><a href="tel:+965-221-23456"><?php echo e($user->phone | $user->mobile); ?></a></li>
										</ul>
									</div>
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
<?php echo $__env->make('front.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/luqqvtwm/private/resources/views/member/account-information.blade.php ENDPATH**/ ?>