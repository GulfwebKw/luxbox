<div class="kt-portlet__head-toolbar">
    <div class="kt-portlet__head-wrapper">
        <div class="kt-portlet__head-actions">
            <?php if(auth()->guard('admin')->user()->can($data['listPermission'])): ?>
                <a href="<?php echo e(url($data['url'])); ?>" class="btn btn-brand btn-elevate btn-icon-sm">
                    <i class="la la-list-ul"></i>
                    <?php echo e($data['listTitle']); ?>

                </a>
            <?php endif; ?>
        </div>
    </div>
</div><?php /**PATH /home/luqqvtwm/private/resources/views/gwc/templateIncludes/portletHeadToolbar.blade.php ENDPATH**/ ?>