<?php if(Session::get('message-success')): ?>
    <div class="alert alert-light alert-success" role="alert">
        <div class="alert-icon">
            <i class="flaticon-alert kt-font-brand"></i>
        </div>
        <div class="alert-text">
            <?php echo e(Session::get('message-success')); ?>

        </div>
    </div>
<?php endif; ?>

<?php if(Session::get('message-error')): ?>
    <div class="alert alert-light alert-danger" role="alert">
        <div class="alert-icon">
            <i class="flaticon-alert kt-font-brand"></i>
        </div>
        <div class="alert-text">
            <?php echo e(Session::get('message-error')); ?>

        </div>
    </div>
<?php endif; ?><?php /**PATH /home/luqqvtwm/private/resources/views/gwc/templateIncludes/successErrorMessage.blade.php ENDPATH**/ ?>