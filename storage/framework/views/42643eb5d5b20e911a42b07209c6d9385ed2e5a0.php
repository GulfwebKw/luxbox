

<?php $__env->startSection('editContent'); ?>
    <form name="tFrm" id="form_validation" method="post" class="kt-form" enctype="multipart/form-data"
          action="<?php echo e(route($data['updateRoute'],$resource->id)); ?>">
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
        <div class="kt-portlet__body">

            <!-- name -->
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <?php $__env->startComponent('gwc.components.editTextInput', [
                            'label' => 'Name',
                            'name' => 'name',
                            'value' => $resource->name,
                            'required' => true
                        ]); ?> <?php echo $__env->renderComponent(); ?>
                    </div>
                </div>
            </div>

            <hr>

            <!-- permissions -->
            <div class="form-group row">
                <h4>Permissions</h4>
            </div>

            <div class="form-group row">
                <div class="col-lg-12">
                    <div class="kt-checkbox-list kt-checkbox-inline">
                        <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <fieldset>
                                <legend><?php echo e($group['name']); ?></legend>
                                <div class="row">
                                    <?php $__currentLoopData = $group['permissions']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-lg-3">
                                            <label class="kt-checkbox" for="per-<?php echo e($permission->id); ?>">
                                                <input type="checkbox" name="permissions[]" id="per-<?php echo e($permission->id); ?>" value="<?php echo e($permission->id); ?>"
                                                        <?php echo e(in_array($permission->id, $rolePermissions) ? 'checked' : ''); ?>>
                                                <?php echo e($permission->name); ?>

                                                <span></span>
                                            </label>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </fieldset>
                            <br>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>

        </div>

        <?php $__env->startComponent('gwc.templateIncludes.createEditFooter', ['url' => $data['url']]); ?> <?php echo $__env->renderComponent(); ?>

    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('gwc.template.editTemplate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/luqqvtwm/private/resources/views/gwc/roles/edit.blade.php ENDPATH**/ ?>