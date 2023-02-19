<!DOCTYPE html>
<html lang="en">

<!-- begin::Head -->
<head>
    <meta charset="utf-8" />
    <title><?php echo e(__('adminMessage.websiteName')); ?>|<?php echo e(__('adminMessage.login')); ?></title>
    <meta name="description" content="Login page example">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--css files -->
    <?php echo $__env->make('gwc.css.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
</head>
<!-- end::Head -->

<!-- begin::Body -->
<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

<!-- begin:: Page -->
<div class="kt-grid kt-grid--ver kt-grid--root">
    <div class="kt-grid kt-grid--hor kt-grid--root kt-login kt-login--v2 kt-login--signin" id="kt_login">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" style="background-image: url(<?php echo asset('admin_assets/assets/media/bg/bg-1.jpg'); ?>);">
            <div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
                <div class="kt-login__container">
                    <div class="kt-login__logo">
                        <a href="<?php echo e(url('/')); ?>">
                            <?php if($settings['logo']): ?>
                                <img style="max-width:200px;"
                                     alt="<?php echo e(__('adminMessage.websiteName')); ?>"
                                     src="<?php echo asset('uploads/settings/'.$settings['logo']); ?>" />
                            <?php endif; ?>
                        </a>
                    </div>

                    <div class="kt-login__signin">
                        <div class="kt-login__head">
                            <h3 class="kt-login__title"><?php echo e(__('adminMessage.signinadminpanel')); ?></h3>
                        </div>

                        <form class="kt-form" name="AdmloginForm" id="AdmloginForm" method="POST" action='<?php echo e(route("adminLogin")); ?>'>
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

                            <?php if($errors->has('invalidLogin')): ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo e($errors->first('invalidLogin')); ?>

                                </div>
                            <?php endif; ?>

                            <?php if(session('info')): ?>
                                <div class="alert alert-success" role="alert">
                                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                    <?php echo e(session('info')); ?>

                                </div>
                            <?php endif; ?>

                            <div class="input-group">
                                <input value="<?php echo e(old('username') ?? ''); ?>"
                                       class="form-control <?php if($errors->has('username')): ?> is-invalid <?php endif; ?>"
                                       type="text"
                                       placeholder="<?php echo e(__('adminMessage.enter_username')); ?>"
                                       name="username"
                                       id="username"
                                       autocomplete="off"
                                       required
                                >
                                <?php if($errors->has('username')): ?>
                                    <div class="invalid-feedback"><?php echo e($errors->first('username')); ?></div>
                                <?php endif; ?>
                            </div>

                            <div class="input-group ">
                                <input
                                        value="<?php echo e(old('password') ?? ''); ?>"
                                        class="form-control <?php if($errors->has('password')): ?> is-invalid <?php endif; ?>"
                                        type="password"
                                        placeholder="<?php echo e(__('adminMessage.enter_password')); ?>"
                                        name="password"
                                        id="password"
                                        autocomplete="off"
                                        required
                                >
                                <?php if($errors->has('password')): ?>
                                    <div class="invalid-feedback"><?php echo e($errors->first('password')); ?></div>
                                <?php endif; ?>
                            </div>

                            <div class="row kt-login__extra">
                                <div class="col">
                                    <label class="kt-checkbox">
                                        <input <?php echo e(old('remember') ? 'checked' : ''); ?>

                                                type="checkbox"
                                                name="remember"
                                                id="remember"
                                        >
                                        <?php echo e(__('adminMessage.rememberme')); ?>

                                        <span></span>
                                    </label>
                                    <a style="color:#FFFFFF;" href="<?php echo e(url('gwc/forgot')); ?>" class="pull-right"><?php echo e(__('adminMessage.forgot_password')); ?>?</a>
                                </div>
                            </div>

                            <div class="kt-login__actions">
                                <button type="submit" id="" class="btn btn-pill kt-login__btn-primary"><?php echo e(__('adminMessage.signin')); ?></button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end:: Page -->

<!-- js files -->
<?php echo $__env->make('gwc.js.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>
</html><?php /**PATH /home/luqqvtwm/private/resources/views/gwc/auth/login.blade.php ENDPATH**/ ?>