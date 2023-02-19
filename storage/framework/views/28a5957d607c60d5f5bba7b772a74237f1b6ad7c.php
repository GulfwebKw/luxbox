<?php $__env->startSection('createContent'); ?>
    <form name="tFrm" id="form_validation" method="post" class="kt-form" enctype="multipart/form-data" action="<?php echo e(route($data['storeRoute'])); ?>">
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
        <div class="kt-portlet__body">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <?php $__env->startComponent('gwc.components.createTextInput', [
                            'label' => 'Name',
                            'name' => 'name',
                            'required' => true
                        ]); ?> <?php echo $__env->renderComponent(); ?>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group row">
                            <!-- is active? -->
                            <label class="col-3 col-form-label pr-2"><?php echo e(__('adminMessage.isactive')); ?></label>
                            <div class="col-3">
                                <?php $__env->startComponent('gwc.components.createIsActive'); ?> <?php echo $__env->renderComponent(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>



        <?php $__env->startComponent('gwc.templateIncludes.createEditFooter', ['url' => $data['url']]); ?> <?php echo $__env->renderComponent(); ?>

    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('gwc.template.createTemplate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/luqqvtwm/private/resources/views/gwc/order-status/create.blade.php ENDPATH**/ ?>