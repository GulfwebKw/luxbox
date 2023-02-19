<?php $__env->startSection('editContent'); ?>
    <form name="tFrm" id="form_validation" method="post" class="kt-form" enctype="multipart/form-data"
          action="<?php echo e(route($data['updateRoute'],$resource->id)); ?>">
        <?php echo method_field('PUT'); ?>
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
        <div class="kt-portlet__body">

            <div class="form-group">
                <div class="row">

                    <?php if(isset(request()->package_order) && request()->package_order!=null): ?>
                        <div class="col-md-6">
                            <label>Packages</label>
                            <select id=""  name="package_id" class="form-control">
                                <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($p->order==request()->package_order): ?>
                                        <option value="<?php echo e($p->id); ?>"><?php echo e($p->order); ?></option>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    <?php else: ?>


                    <div class="col-md-6">
                        <?php $__env->startComponent('gwc.components.editSelectBox', [
                            'label' => 'Packages',
                            'title' => 'order',
                            'name' => 'package_id',
                            'resources' => $packages,
                            'foreign_key'=> $resource->package_id,
                            'required' => true
                        ]); ?> <?php echo $__env->renderComponent(); ?>
                    </div>
                    <?php endif; ?>
                    <div class="col-md-6">
                        <?php $__env->startComponent('gwc.components.editTextInput', [
                            'label' => 'Price',
                            'name' => 'shipping_cost',
                            'value'=>$resource->shipping_cost,
                            'required' => true
                        ]); ?> <?php echo $__env->renderComponent(); ?>
                    </div>

                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <?php $__env->startComponent('gwc.components.editSelectBox', [
                            'label' => 'Status',
                            'title' => 'id',
                            'name' => 'status',
                            'foreign_key'=> $resource->status,
                            'resources' => json_decode(json_encode(array(array('id'=>'pending'), array('id'=>'paid'), array('id'=>'cancel')))),
                            'required' => true
                        ]); ?> <?php echo $__env->renderComponent(); ?>
                    </div>
                    <div class="col-md-6">
                        <?php $__env->startComponent('gwc.components.editSelectBox', [
                            'label' => 'Payment Method',
                            'title' => 'id',
                            'name' => 'payment_method',
                            'foreign_key'=> $resource->payment_method,
                            'resources' => json_decode(json_encode(array(array('id'=>'Paypal')))),
                            'required' => true
                        ]); ?> <?php echo $__env->renderComponent(); ?>
                    </div>

                </div>
            </div>

        </div>

        <?php $__env->startComponent('gwc.templateIncludes.createEditFooter', ['url' => $data['url']]); ?> <?php echo $__env->renderComponent(); ?>

    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('gwc.template.editTemplate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/luqqvtwm/private/resources/views/gwc/package-invoice/edit.blade.php ENDPATH**/ ?>