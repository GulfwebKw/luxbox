<!-- begin:: Header Mobile -->
<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
    <div class="kt-header-mobile__logo">
        <a href="<?php echo e(url('/gwc/home')); ?>">
            <?php if($settings['logo']): ?>
                <img alt="<?php echo e(__('adminMessage.websiteName')); ?>" src="<?php echo url('uploads/settings/'.$settings['logo']); ?>" height="40"/>
            <?php endif; ?>
        </a>
    </div>
    <div class="kt-header-mobile__toolbar">
        <button class="kt-header-mobile__toggler kt-header-mobile__toggler--left" id="kt_aside_mobile_toggler">
            <span></span>
        </button>
        <button class="kt-header-mobile__topbar-toggler" id="kt_header_mobile_topbar_toggler">
            <i class="flaticon-more"></i>
        </button>
    </div>
</div>
<!-- end:: Header Mobile --><?php /**PATH /home/luqqvtwm/private/resources/views/gwc/templateIncludes/headerMobile.blade.php ENDPATH**/ ?>