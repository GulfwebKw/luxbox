<?php $__env->startSection('editContent'); ?>


    <form name="tFrm" id="form_validation" method="post" class="kt-form" enctype="multipart/form-data" action="<?php echo e(route('how-it-work.update',$resource->id)); ?>">
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
       <?php echo method_field('PUT'); ?>
        <div class="kt-portlet__body">

            <div class="kt-portlet__head-toolbar">
                <ul class="nav nav-tabs nav-tabs-bold nav-tabs-line-brand" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#english" role="tab">
                            English
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#Arabic" role="tab">
                            Arabic
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#image" role="tab">
                            Images
                        </a>
                    </li>
                </ul>
            </div>

  <div class="tab-content">
    <div id="english" class="tab-pane active">
      <br>
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <?php $__env->startComponent('gwc.components.editTinyMce', [
                       'label' => 'description (en) 1',
                       'name' => 'description_en_1',
                       'value' => $resource->description_en_1,
                       'required' => true
                    ]); ?> <?php echo $__env->renderComponent(); ?>
                </div>
            
                <div class="col-md-6">
                    <?php $__env->startComponent('gwc.components.editTinyMce', [
                       'label' => 'description (en) 2',
                       'name' => 'description_en_2',
                       'value' => $resource->description_en_2,
                       'required' => true
                    ]); ?> <?php echo $__env->renderComponent(); ?>
                </div>
                <div class="col-md-6">
                    <?php $__env->startComponent('gwc.components.editTinyMce', [
                       'label' => 'description (en) 3',
                       'name' => 'description_en_3',
                       'value' => $resource->description_en_3,
                       'required' => true
                    ]); ?> <?php echo $__env->renderComponent(); ?>
                </div>
                <div class="col-md-6">
                    <?php $__env->startComponent('gwc.components.editTinyMce', [
                       'label' => 'description (en) 4',
                       'name' => 'description_en_4',
                       'value' => $resource->description_en_4,
                       'required' => true
                    ]); ?> <?php echo $__env->renderComponent(); ?>
                </div>
                <div class="col-md-6">
                    <?php $__env->startComponent('gwc.components.editTinyMce', [
                       'label' => 'description (en) 5',
                       'name' => 'description_en_5',
                       'value' => $resource->description_en_5,
                       'required' => true
                    ]); ?> <?php echo $__env->renderComponent(); ?>
                </div>
            </div>
        </div>
    </div>
    <div id="Arabic" class="tab-pane fade">
        <br>
        <div class="form-group">
            <div class="row">
            <div class="col-md-6">
                <?php $__env->startComponent('gwc.components.editTinyMce', [
                   'label' => 'description (ar) 1',
                   'name' => 'description_ar_1',
                   'value' => $resource->description_ar_1,
                   'required' => true
                ]); ?> <?php echo $__env->renderComponent(); ?>
            </div>

            <div class="col-md-6">
                <?php $__env->startComponent('gwc.components.editTinyMce', [
                   'label' => 'description (ar) 2',
                   'name' => 'description_ar_2',
                   'value' => $resource->description_ar_2,
                   'required' => true
                ]); ?> <?php echo $__env->renderComponent(); ?>
            </div>
            <div class="col-md-6">
                <?php $__env->startComponent('gwc.components.editTinyMce', [
                   'label' => 'description (ar) 3',
                   'name' => 'description_ar_3',
                   'value' => $resource->description_ar_3,
                   'required' => true
                ]); ?> <?php echo $__env->renderComponent(); ?>
            </div>
            <div class="col-md-6">
                <?php $__env->startComponent('gwc.components.editTinyMce', [
                   'label' => 'description (ar) 4',
                   'name' => 'description_ar_4',
                   'value' => $resource->description_ar_4,
                   'required' => true
                ]); ?> <?php echo $__env->renderComponent(); ?>
            </div>
            <div class="col-md-6">
                <?php $__env->startComponent('gwc.components.editTinyMce', [
                   'label' => 'description (ar) 5',
                   'name' => 'description_ar_5',
                   'value' => $resource->description_ar_5,
                   'required' => true
                ]); ?> <?php echo $__env->renderComponent(); ?>
            </div>
            </div>
        </div>
    </div>
    <div id="image" class="tab-pane fade">
        <br>
        <div class="col-lg-6">
            <!-- image -->
            <?php $label = "Image Top"; ?>
            <?php $field = 'image_top'; ?>
            <?php $__env->startComponent('gwc.components.editImageUpload', [
                'label' => $label,
                'name' => $field,
                'value'=>$resource->image_top,
            ]); ?> <?php echo $__env->renderComponent(); ?>
        </div>
        <div class="col-md-2">
            <img src="<?php echo asset('uploads/how-it-work/' . $resource->image_top); ?>" width="80">
        </div>
        <div class="col-lg-6">
            <!-- image -->
            <?php $label = "Image Middle"; ?>
            <?php $field = 'image_middle'; ?>
            <?php $__env->startComponent('gwc.components.editImageUpload', [
                'label' => $label,
                'name' => $field,
                'value'=>$resource->image_middle,
            ]); ?> <?php echo $__env->renderComponent(); ?>
        </div>
        <div class="col-md-2">
            <img src="<?php echo asset('uploads/how-it-work/' . $resource->image_middle); ?>" width="80">
        </div>
        <div class="col-lg-6">
            <!-- image -->
            <?php $label = "Image Buttom"; ?>
            <?php $field = 'image_buttom'; ?>
            <?php $__env->startComponent('gwc.components.editImageUpload', [
                'label' => $label,
                'name' => $field,
                'value'=>$resource->image_buttom,
            ]); ?> <?php echo $__env->renderComponent(); ?>
        </div>
        <div class="col-md-2">
            <img src="<?php echo asset('uploads/how-it-work/' . $resource->image_buttom); ?>" width="80">
        </div>
       
      
    </div>
      
    </div>
  </div>

          
                    
      

        <?php $__env->startComponent('gwc.templateIncludes.createEditFooter', ['url' => $data['url']]); ?> <?php echo $__env->renderComponent(); ?>

    </form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('gwc.template.editTemplate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/luqqvtwm/private/resources/views/gwc/how-it-work/edit.blade.php ENDPATH**/ ?>