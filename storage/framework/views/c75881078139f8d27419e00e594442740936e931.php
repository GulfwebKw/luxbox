<?php $__env->startSection('editContent'); ?>
    <form name="tFrm" id="form_validation" method="post" class="kt-form" enctype="multipart/form-data"
          action="<?php echo e(route($data['updateRoute'],$resource->id)); ?>">
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
        <?php echo method_field('PUT'); ?>
        <div class="kt-portlet__body">

            <!-- title -->
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <?php $__env->startComponent('gwc.components.editTextInput', [
                            'label' => 'Title (en)',
                            'name' => 'title_en',
                            'value' => $resource->title_en,
                            'required' => true
                        ]); ?> <?php echo $__env->renderComponent(); ?>
                    </div>
                    <div class="col-md-6">
                        <?php $__env->startComponent('gwc.components.editTextInput', [
                            'label' => 'Title (ar)',
                            'name' => 'title_ar',
                            'value' => $resource->title_ar,
                            'required' => true
                        ]); ?> <?php echo $__env->renderComponent(); ?>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <?php $__env->startComponent('gwc.components.editTinyMce', [
                           'label' => 'description (en) ',
                           'name' => 'description_en',
                           'value' => $resource->description_en,
                           'required' => true
                        ]); ?> <?php echo $__env->renderComponent(); ?>
                    </div>
                    <div class="col-md-6">
                        <?php $__env->startComponent('gwc.components.editTinyMce', [
                           'label' => 'description (ar) ',
                           'name' => 'description_ar',
                           'value' => $resource->description_ar,
                           'required' => true
                        ]); ?> <?php echo $__env->renderComponent(); ?>
                    </div>
                </div>
            </div>
          
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <?php $__env->startComponent('gwc.components.editTextInput', [
                           'label' => 'Time Monday Friday',
                           'name' => 'time_mon_fir',
                           'value' => $resource->time_mon_fir,
                           'required' => true
                        ]); ?> <?php echo $__env->renderComponent(); ?>
                    </div>
                    <div class="col-md-3">
                        <?php $__env->startComponent('gwc.components.editTextInput', [
                           'label' => 'Time Saturday',
                           'name' => 'time_sat',
                           'value' => $resource->time_sat,
                           'required' => true
                        ]); ?> <?php echo $__env->renderComponent(); ?>
                    </div>
                    <div class="col-md-3">
                        <?php $__env->startComponent('gwc.components.editTextInput', [
                           'label' => 'Time Sunday',
                           'name' => 'time_sun',
                           'value' => $resource->time_sun,
                           'required' => true
                        ]); ?> <?php echo $__env->renderComponent(); ?>
                    </div>
                </div>
            </div>
           
        </div>

        <?php $__env->startComponent('gwc.templateIncludes.createEditFooter', ['url' => $data['url']]); ?> <?php echo $__env->renderComponent(); ?>

    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('gwc.template.editTemplate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/luqqvtwm/private/resources/views/gwc/contact-descrpition/edit.blade.php ENDPATH**/ ?>