<footer class="footer footer-1">
    <div class="footer-center">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-3 footer-widget widget-about">
                    <div class="footer-logo"><img class="footer-logo" src="<?php echo e(asset('/uploads/settings/'.getSetting('setting')->logo)); ?>" alt="logo"></div>
                    <p>&nbsp;</p>
                    <div class="widget-content">
                        <p><?php echo e(getSetting('setting')['seo_description_'.$lang]); ?></p>

                        <div class="module module-social">
                            <a class="share-facebook" href="<?php echo e(getSetting('setting')['social_facebook']); ?>"><i class="fab fa-facebook-f"> </i></a>
                            <a class="share-instagram" href="<?php echo e(getSetting('setting')['social_instagram']); ?>"><i class="fab fa-instagram"></i></a>
                            <a class="share-twitter" href="<?php echo e(getSetting('setting')['social_twitter']); ?>"><i class="fab fa-twitter"></i></a>
                        </div>

                    </div>
                </div>

                <div class="col-sm-6 col-md-6 col-lg-3 offset-lg-1 footer-widget widget-links">
                    <div class="footer-widget-title">
                        <h5><?php echo e(__('website.menu.services')); ?></h5>
                    </div>
                    <div class="widget-content">
                        <ul>
                            <?php $__empty_1 = true; $__currentLoopData = \App\Service::limit(6)->orderBy('display_order')->where('is_active' , 1 )->get()->toArray(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <li><a href="/service/<?php echo e($service['id']); ?>"><?php echo e($service['title_'.$lang]); ?></a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-6 col-md-6 col-lg-2 footer-widget widget-links">
                    <div class="footer-widget-title">
                        <h5><?php echo e(__('website.menu.Main_Menu')); ?> </h5>
                    </div>
                    <div class="widget-content">
                        <ul>
                            <li><a href="<?php echo e(url('/')); ?>"><?php echo e(__('website.menu.Home')); ?></a></li>
                            <li><a href="/shipping"><?php echo e(__('website.menu.Shipping_Cost')); ?></a></li>
                            <li><a href="/works"><?php echo e(__('website.menu.How_it_Works')); ?></a></li>
                            <li><a href="/services"><?php echo e(__('website.menu.services')); ?></a></li>
                            <li><a href="/about-us"><?php echo e(__('website.menu.About-us')); ?></a></li>
                            <li><a href="/faq"><?php echo e(__('website.menu.FAQ')); ?></a></li>
                            <li><a href="/contact-us"><?php echo e(__('website.menu.Contact_Us')); ?></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-6 col-md-6 col-lg-3 footer-widget widget-contact">
                    <div class="footer-widget-title">
                        <h5><?php echo e(__('website.content.Quick_Contact')); ?></h5>
                    </div>
                    <div class="widget-content">
                        <p><?php echo e(__('website.content.Quick_Contact_description')); ?></p>
                        <ul>
                            <li class="phone"><a href="tel:<?php echo e(getSetting('setting')['phone']); ?>" target="_blank"><i class="fa fa-phone fa-lg"></i> <?php echo e(getSetting('setting')['phone']); ?></a></li>
                            <li class="address"><?php echo e(getSetting('setting')['address_'.$lang]); ?></li>
                        </ul>
                    </div>
                </div>

            </div>
            <div class="clearfix"></div>
        </div>

    </div>

    <div class="footer-bottom">
        <div class="row">
            <div class="col-md-12 col-md-12 text--center footer-copyright">
                <div class="copyright"><span>&copy; Copyright <?php echo e(date('Y')); ?>, All Rights Reserved, </span><a href="/"><?php echo e(getSetting('setting')['name_en']); ?></a></div>
            </div>
        </div>

    </div>

</footer>
<div class="backtop" id="back-to-top"><i class="fas fa-chevron-up"></i></div><?php /**PATH /home/luqqvtwm/private/resources/views/front/partials/footer.blade.php ENDPATH**/ ?>