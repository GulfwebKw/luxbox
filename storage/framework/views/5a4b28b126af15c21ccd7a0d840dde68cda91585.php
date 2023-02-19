<!doctype html>
<html  <?php if( $lang == "ar" ): ?>lang="ar" class="rtl" <?php else: ?> lang="en" dir="ltr" <?php endif; ?>>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="<?php echo e(getSetting('setting')['name_'.$lang]); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="<?php echo e(getSetting('setting')['seo_description_'.$lang]); ?>" />
    <meta name="keywords" content="<?php echo e(getSetting('setting')['seo_keywords_'.$lang]); ?>">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e(getSetting('setting')['name_'.$lang]); ?></title>
    <link href="<?php echo e(asset('uploads/settings/'.$setting->favicon)); ?>" rel="icon" />

    <link rel="preconnect" href="https://fonts.gstatic.com/" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,700;1,400;1,700&amp;family=Rubik:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&amp;display=swap" rel="stylesheet" />
  
    <link href="<?php echo e(asset('assets/css/vendor.min.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('assets/css/style.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('assets/css/custom.css')); ?>" rel="stylesheet" />
    <?php if( $lang == "ar" ): ?>
    <link href="<?php echo e(asset('assets/css/rtl.css')); ?>" rel="stylesheet" />
    <?php endif; ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php echo $__env->yieldContent('css'); ?>
</head>
<body>
<?php echo $__env->yieldContent('content'); ?>
<script src="<?php echo e(asset('assets/js/vendor/jquery-3.4.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/vendor.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/functions.js')); ?>"></script>
<script type="text/javascript">
    $(".btn-refresh").click(function(){
      $.ajax({
         type:'GET',
         url:'/refresh_captcha',
         success:function(data){
            $(".captcha span").html(data.captcha);
         }
      });
    });
    </script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

     <?php echo Toastr::message(); ?>

</body>
</html><?php /**PATH /home/luqqvtwm/private/resources/views/front/layouts/master.blade.php ENDPATH**/ ?>