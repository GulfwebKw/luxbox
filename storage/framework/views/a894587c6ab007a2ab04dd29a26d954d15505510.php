

<?php $__env->startSection('createContent'); ?>
    <form name="tFrm" id="form_validation" method="post" class="kt-form" enctype="multipart/form-data" action="<?php echo e(route($data['storeRoute'])); ?>">
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
        <div class="kt-portlet__body">

            <!-- name -->
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <?php $__env->startComponent('gwc.components.createTextInput', [
                            'label' => 'Name',
                            'name' => 'name',
                            'required' => true
                        ]); ?> <?php echo $__env->renderComponent(); ?>
                    </div>
                    <div class="col-md-4">
                        <?php $__env->startComponent('gwc.components.createTextInput', [
                            'label' => 'Email',
                            'name' => 'email',
                            'type' => 'email',
                            'required' => true
                        ]); ?> <?php echo $__env->renderComponent(); ?>
                    </div>
                    <div class="col-md-4">
                        <?php $__env->startComponent('gwc.components.createTextInput', [
                            'label' => 'Mobile',
                            'name' => 'mobile',
                            'required' => true
                        ]); ?> <?php echo $__env->renderComponent(); ?>
                    </div>
                </div>
            </div>

            <!-- auth -->
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <?php $__env->startComponent('gwc.components.createTextInput', [
                            'label' => 'Username',
                            'name' => 'username',
                            'required' => true
                        ]); ?> <?php echo $__env->renderComponent(); ?>
                    </div>
                    <div class="col-md-6">
                        <?php $__env->startComponent('gwc.components.createTextInput', [
                            'label' => 'Password',
                            'name' => 'password',
                            'type' => 'password',
                            'required' => true
                        ]); ?> <?php echo $__env->renderComponent(); ?>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-lg-6">
                        <!-- image -->
                        <?php $label = "Image"; ?>
                        <?php $field = 'image'; ?>
                        <?php $__env->startComponent('gwc.components.createImageUpload', [
                            'label' => $label,
                            'name' => $field,
                            'required' => true
                        ]); ?> <?php echo $__env->renderComponent(); ?>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group row">
                            <!-- is active? -->
                            <label class="col-3 col-form-label"><?php echo e(__('adminMessage.isactive')); ?></label>
                            <div class="col-3">
                                <?php $__env->startComponent('gwc.components.createIsActive'); ?> <?php echo $__env->renderComponent(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- roles -->
            <div class="form-group row">
                <div class="col-12">
                    <label><?php echo e(__('adminMessage.roles')); ?></label>
                    <select name="roles[]" class="form-control" multiple <?php if($errors->has('roles')): ?> is-invalid <?php endif; ?> required>
                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($role); ?>">
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('gwc.template.createTemplate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/luqqvtwm/private/resources/views/gwc/admins/create.blade.php ENDPATH**/ ?>