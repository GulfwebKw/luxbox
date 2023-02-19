<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="shortcut icon" href="<?php echo e(asset('/uploads/settings/'.$settings['favicon'])); ?>">
<title><?php echo e(__('adminMessage.websiteName')); ?> | <?php echo e($data['headTitle']); ?></title>

<!--css files -->
<?php echo $__env->make('gwc.css.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
      integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
      crossorigin=""/>
      
<!-- token -->
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>"><?php /**PATH /home/luqqvtwm/private/resources/views/gwc/templateIncludes/head.blade.php ENDPATH**/ ?>