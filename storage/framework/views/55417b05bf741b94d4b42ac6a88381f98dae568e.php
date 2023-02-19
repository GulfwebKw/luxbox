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
                            'label' => 'Tilte (en)',
                            'name' => 'title_en',
                            'value'=>$resource->title_en,
                            'required' => true
                        ]); ?> <?php echo $__env->renderComponent(); ?>
                    </div>
                    <div class="col-md-6">
                        <?php $__env->startComponent('gwc.components.editTextInput', [
                            'label' => 'Title (ar)',
                            'name' => 'title_ar',
                            'value'=>$resource->title_ar,
                            'required' => true
                        ]); ?> <?php echo $__env->renderComponent(); ?>
                    </div>
                </div>
            </div>

           


            <!-- Details -->
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <?php $__env->startComponent('gwc.components.editTinyMce', [
                           'label' => 'description (en)',
                           'name' => 'description_en',
                           'value' => $resource->description_en,
                           'required' => true
                        ]); ?> <?php echo $__env->renderComponent(); ?>
                    </div>
                    <div class="col-md-6">
                        <?php $__env->startComponent('gwc.components.editTinyMce', [
                           'label' => 'description (ar)',
                           'name' => 'description_ar',
                           'value' => $resource->description_ar,
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
                        <?php $__env->startComponent('gwc.components.editImageUpload', [
                            'label' => $label,
                            'name' => $field,
                            'value'=>$resource->image,
                            'folder' => 'uploads/abouts/',
                        'deletePath'=> '/gwc/' . $data['path'] . '/deleteimage/' . $resource->id . '/' . $field,
                        ]); ?> <?php echo $__env->renderComponent(); ?>
                    </div>
                    <div class="col-md-2">
                        <img src="<?php echo e('/uploads/'. $data['path']. '/thumb/'.$resource->image); ?>" alt="">
                        
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group row">
                            <label class="col-3 col-form-label"><?php echo e(__('adminMessage.counter')); ?></label>
                            <div class="col-3">
                                <input type="number" class="form-control" placeholder="Enter Counter" name="counter" value="<?php echo e($resource->counter); ?>">
                            </div>
                            <!-- is active? -->
                            <label class="col-3 col-form-label"><?php echo e(__('adminMessage.isactive')); ?></label>
                            <div class="col-3">
                                <?php $__env->startComponent('gwc.components.editIsActive',[
                                 'value'=>$resource->is_active
                                ]); ?> <?php echo $__env->renderComponent(); ?>
                            </div>
                            <!-- display order -->
                            <label class="col-3 col-form-label"><?php echo e(__('adminMessage.displayorder')); ?></label>
                            <div class="col-3">
                                <?php $__env->startComponent('gwc.components.editDisplayOrder', [
                                'lastOrder' => $resource->display_order
                                ]); ?> <?php echo $__env->renderComponent(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <?php $__env->startComponent('gwc.templateIncludes.createEditFooter', ['url' => $data['url']]); ?> <?php echo $__env->renderComponent(); ?>

    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('gwc.template.editTemplate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/luqqvtwm/private/resources/views/gwc/abouts/edit.blade.php ENDPATH**/ ?>