<?php $__env->startSection('editContent'); ?>
    <form name="tFrm" id="form_validation" method="post" class="kt-form" enctype="multipart/form-data"
          action="<?php echo e(route($data['updateRoute'],$resource->id)); ?>">
        <?php echo method_field('PUT'); ?>
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
        <div class="kt-portlet__body">

            <!-- title -->
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <?php $__env->startComponent('gwc.components.editTextInput', [
                            'label' => 'name',
                            'name' => 'name',
                            'value'=>$resource->name,
                            'required' => true
                        ]); ?> <?php echo $__env->renderComponent(); ?>
                    </div>
                    <div class="col-md-6">
                        <?php $__env->startComponent('gwc.components.editTextInput', [
                            'label' => 'Cost',
                            'name' => 'cost',
                            'type' => 'number',
                            'value'=>$resource->cost,
                            'required' => true
                        ]); ?> <?php echo $__env->renderComponent(); ?>
                    </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label class="col-3 col-form-label"><?php echo e(__('adminMessage.isactive')); ?></label>
                        <div class="col-3">
                            <?php $__env->startComponent('gwc.components.editIsActive',[
                             'value'=>$resource->is_active
                            ]); ?> <?php echo $__env->renderComponent(); ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <?php $__env->startComponent('gwc.templateIncludes.createEditFooter', ['url' => $data['url']]); ?> <?php echo $__env->renderComponent(); ?>

    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('gwc.template.editTemplate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/luqqvtwm/private/resources/views/gwc/shipping-method/edit.blade.php ENDPATH**/ ?>