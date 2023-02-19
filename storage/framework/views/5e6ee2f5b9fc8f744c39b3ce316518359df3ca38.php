

<?php $__env->startSection('editContent'); ?>
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-toolbar">
            <ul class="nav nav-tabs  nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand" role="tablist">
                <li class="nav-item">
                    <a class="nav-link <?php if(Request::segment(4)=='edit'): ?> active <?php endif; ?>" href="<?php echo e(url('gwc/admins/'.$id.'/edit')); ?>" role="tab">
                        <i class="flaticon-avatar"></i> <?php echo e(__('adminMessage.profile')); ?>

                    </a>
                </li>
                <?php if(auth()->guard('admin')->user()->can('admins-changepass')): ?>
                <li class="nav-item">
                    <a class="nav-link <?php if(Request::segment(3)=='changepass'): ?> active <?php endif; ?>" href="<?php echo e(url('gwc/admins/changepass/'.$id)); ?>" role="tab">
                        <i class="flaticon-lock"></i> <?php echo e(__('adminMessage.changepassword')); ?>

                    </a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>

    <div class="kt-portlet__body">
        <div class="tab-content">

            <!-- edit tab -->
            <div class="tab-pane <?php if(Request::segment(4)=='edit'): ?> active <?php endif; ?>" id="edit">
                <div class="kt-form kt-form--label-right">
                    <?php if(auth()->guard('admin')->user()->can($data['editPermission'])): ?>
                        <form name="tFrm" id="form_validation" method="post" class="kt-form" enctype="multipart/form-data"
                              action="<?php echo e(route($data['updateRoute'],$resource->id)); ?>">
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                            <div class="kt-portlet__body">

                                <!-- avatar -->
                                <div class="form-group">
                                    <div class="row text-center">
                                        <div class="col-12 mx-auto">
                                            <div class="kt-avatar kt-avatar--outline kt-avatar--circle- <?php if($errors->has('image')): ?> is-invalid <?php endif; ?>" id="kt_user_edit_avatar">
                                                <?php if(isset($resource->image) && !empty($resource->image)): ?>
                                                    <div class="kt-avatar__holder" style="background-image: url('<?php echo asset('/uploads/admins/'.$resource->image); ?>');"></div>
                                                <?php else: ?>
                                                    <div class="kt-avatar__holder" style="background-image: url('<?php echo asset('admin_assets/assets/media/users/default.jpg'); ?>');"></div>
                                                <?php endif; ?>
                                                <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
                                                    <i class="fa fa-pen"></i>
                                                    <input type="file" name="image" accept=".png, .jpg, .jpeg">
                                                </label>
                                                <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                                                <i class="fa fa-times"></i>
                                            </span>
                                            </div>
                                            <?php if($errors->has('image')): ?>
                                                <div class="invalid-feedback"><?php echo e($errors->first('image')); ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>

                                <!-- name -->
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <?php $__env->startComponent('gwc.components.editTextInput', [
                                                'label' => 'Name',
                                                'name' => 'name',
                                                'value' => $resource->name,
                                                'required' => true
                                            ]); ?> <?php echo $__env->renderComponent(); ?>
                                        </div>
                                        <div class="col-md-4">
                                            <?php $__env->startComponent('gwc.components.editTextInput', [
                                                'label' => 'Email',
                                                'name' => 'email',
                                                'value' => $resource->email,
                                                'type' => 'email',
                                                'required' => true
                                            ]); ?> <?php echo $__env->renderComponent(); ?>
                                        </div>
                                        <div class="col-md-4">
                                            <?php $__env->startComponent('gwc.components.editTextInput', [
                                                'label' => 'Mobile',
                                                'name' => 'mobile',
                                                'value' => $resource->mobile,
                                                'required' => true
                                            ]); ?> <?php echo $__env->renderComponent(); ?>
                                        </div>
                                    </div>
                                </div>

                                <!-- roles -->
                                <div class="form-group row">
                                    <div class="col-12">
                                        <label class=""><?php echo e(__('adminMessage.roles')); ?></label>
                                        <select name="roles[]" class="form-control" multiple <?php if($errors->has('roles')): ?> is-invalid <?php endif; ?>>
                                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($role); ?>" <?php echo e(in_array($role, $userRoles) ? 'selected' : ''); ?>>
                                                    <?php echo e($role); ?>

                                                </option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('roles')): ?>
                                            <div class="invalid-feedback"><?php echo e($errors->first('roles')); ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                            </div>

                            <?php $__env->startComponent('gwc.templateIncludes.createEditFooter', ['url' => $data['url']]); ?> <?php echo $__env->renderComponent(); ?>

                        </form>
                    <?php endif; ?>
                </div>
            </div>
            <!-- end edit tab -->

            <!-- change pass tab -->
            <?php if(auth()->guard('admin')->user()->can('admins-changepass')): ?>
                <div class="tab-pane <?php if(Request::segment(3)=='changepass'): ?> active <?php endif; ?>" id="changepass">
                    <div class="kt-form kt-form--label-right">
                        <form name="tFrmpass" id="tFrmpass" method="post" class="uk-form-stacked" enctype="multipart/form-data" action="<?php echo e(route('adminChangePass',$resource->id)); ?>">
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                            <div class="kt-form__body">
                                <div class="kt-section kt-section--first">
                                    <div class="kt-section__body">

                                        <!-- current password -->
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <?php $__env->startComponent('gwc.components.editTextInput', [
                                                        'label' => 'Current Password',
                                                        'name' => 'current_password',
                                                        'value' => "",
                                                        'type' => 'password',
                                                        'required' => true
                                                    ]); ?> <?php echo $__env->renderComponent(); ?>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- new password -->
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <?php $__env->startComponent('gwc.components.editTextInput', [
                                                        'label' => 'New Password',
                                                        'name' => 'new_password',
                                                        'value' => "",
                                                        'type' => 'password',
                                                        'required' => true
                                                    ]); ?> <?php echo $__env->renderComponent(); ?>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- confirm password -->
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <?php $__env->startComponent('gwc.components.editTextInput', [
                                                        'label' => 'Confirm Password',
                                                        'name' => 'confirm_password',
                                                        'value' => "",
                                                        'type' => 'password',
                                                        'required' => true
                                                    ]); ?> <?php echo $__env->renderComponent(); ?>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <?php $__env->startComponent('gwc.templateIncludes.createEditFooter', ['url' => $data['url']]); ?> <?php echo $__env->renderComponent(); ?>

                        </form>

                    </div>
                </div>
            <?php endif; ?>
            <!-- end change pass tab -->

        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('gwc.template.editTemplate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/luqqvtwm/private/resources/views/gwc/admins/edit.blade.php ENDPATH**/ ?>