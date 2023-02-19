<?php $__env->startSection('editContent'); ?>

    <form name="tFrm" id="form_validation" method="post" class="kt-form" enctype="multipart/form-data" action="<?php echo e(url('gwc/headers/update/'.$resource->id)); ?>">
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
        <div class="kt-portlet__body">

            <div class="kt-portlet__head-toolbar">
                <ul class="nav nav-tabs nav-tabs-bold nav-tabs-line-brand" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#english" role="tab">
                            Title English
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#Arabic" role="tab">
                            Title Arabic
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#image" role="tab">
                            Background Images
                        </a>
                    </li>
                </ul>
            </div>


            <div class="tab-content">
                <div id="english" class="tab-pane  active">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <?php $__env->startComponent('gwc.components.editTextInput', [
                                    'label' => 'title shipping cost en',
                                    'name' => 'title_shipping_cost_en',
                                    'value'=>$resource->title_shipping_cost_en,
                                    'required' => true
                                ]); ?> <?php echo $__env->renderComponent(); ?>
                            </div>
                            <div class="col-md-6">
                                <?php $__env->startComponent('gwc.components.editTextInput', [
                                    'label' => 'title how it work en',
                                    'name' => 'title_how_it_work_en',
                                    'value'=>$resource->title_how_it_work_en,
                                    'required' => true
                                ]); ?> <?php echo $__env->renderComponent(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <?php $__env->startComponent('gwc.components.editTextInput', [
                                    'label' => 'title services en',
                                    'name' => 'title_services_en',
                                    'value'=>$resource->title_services_en,
                                    'required' => true
                                ]); ?> <?php echo $__env->renderComponent(); ?>
                            </div>
                            <div class="col-md-6">
                                <?php $__env->startComponent('gwc.components.editTextInput', [
                                    'label' => 'title services details en',
                                    'name' => 'title_services_details_en',
                                    'value'=>$resource->title_services_details_en,
                                    'required' => true
                                ]); ?> <?php echo $__env->renderComponent(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <?php $__env->startComponent('gwc.components.editTextInput', [
                                    'label' => 'title aboutus en',
                                    'name' => 'title_aboutus_en',
                                    'value'=>$resource->title_aboutus_en,
                                    'required' => true
                                ]); ?> <?php echo $__env->renderComponent(); ?>
                            </div>
                            <div class="col-md-6">
                                <?php $__env->startComponent('gwc.components.editTextInput', [
                                    'label' => 'title faq en',
                                    'name' => 'title_faq_en',
                                    'value'=>$resource->title_faq_en,
                                    'required' => true
                                ]); ?> <?php echo $__env->renderComponent(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <?php $__env->startComponent('gwc.components.editTextInput', [
                                    'label' => 'title blog en',
                                    'name' => 'title_blog_en',
                                    'value'=>$resource->title_blog_en,
                                    'required' => true
                                ]); ?> <?php echo $__env->renderComponent(); ?>
                            </div>
                            <div class="col-md-6">
                                <?php $__env->startComponent('gwc.components.editTextInput', [
                                    'label' => 'title blog details en',
                                    'name' => 'title_blog_details_en',
                                    'value'=>$resource->title_blog_details_en,
                                    'required' => true
                                ]); ?> <?php echo $__env->renderComponent(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <?php $__env->startComponent('gwc.components.editTextInput', [
                                    'label' => 'title contactus en',
                                    'name' => 'title_contactus_en',
                                    'value'=>$resource->title_contactus_en,
                                    'required' => true
                                ]); ?> <?php echo $__env->renderComponent(); ?>
                            </div>
                            <div class="col-md-6">
                                <?php $__env->startComponent('gwc.components.editTextInput', [
                                    'label' => 'title login en',
                                    'name' => 'title_login_en',
                                    'value'=>$resource->title_login_en,
                                    'required' => true
                                ]); ?> <?php echo $__env->renderComponent(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <?php $__env->startComponent('gwc.components.editTextInput', [
                                    'label' => 'title register en',
                                    'name' => 'title_register_en',
                                    'value'=>$resource->title_register_en,
                                    'required' => true
                                ]); ?> <?php echo $__env->renderComponent(); ?>
                            </div>


                        </div>
                    </div>
                </div>
                <div id="Arabic" class="tab-pane fade">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <?php $__env->startComponent('gwc.components.editTextInput', [
                                    'label' => 'title shipping cost ar',
                                    'name' => 'title_shipping_cost_ar',
                                    'value'=>$resource->title_shipping_cost_ar,
                                    'required' => true
                                ]); ?> <?php echo $__env->renderComponent(); ?>
                            </div>

                            <div class="col-md-6">
                                <?php $__env->startComponent('gwc.components.editTextInput', [
                                    'label' => 'title how it work ar',
                                    'name' => 'title_how_it_work_ar',
                                    'value'=>$resource->title_how_it_work_ar,
                                    'required' => true
                                ]); ?> <?php echo $__env->renderComponent(); ?>
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <?php $__env->startComponent('gwc.components.editTextInput', [
                                    'label' => 'title services ar',
                                    'name' => 'title_services_ar',
                                    'value'=>$resource->title_services_ar,
                                    'required' => true
                                ]); ?> <?php echo $__env->renderComponent(); ?>
                            </div>
                            <div class="col-md-6">
                                <?php $__env->startComponent('gwc.components.editTextInput', [
                                    'label' => 'title services details ar',
                                    'name' => 'title_services_details_ar',
                                    'value'=>$resource->title_services_details_ar,
                                    'required' => true
                                ]); ?> <?php echo $__env->renderComponent(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <?php $__env->startComponent('gwc.components.editTextInput', [
                                    'label' => 'title aboutus ar',
                                    'name' => 'title_aboutus_ar',
                                    'value'=>$resource->title_aboutus_ar,
                                    'required' => true
                                ]); ?> <?php echo $__env->renderComponent(); ?>
                            </div>
                            <div class="col-md-6">
                                <?php $__env->startComponent('gwc.components.editTextInput', [
                                    'label' => 'title faq ar',
                                    'name' => 'title_faq_ar',
                                    'value'=>$resource->title_faq_ar,
                                    'required' => true
                                ]); ?> <?php echo $__env->renderComponent(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <?php $__env->startComponent('gwc.components.editTextInput', [
                                    'label' => 'title blog ar',
                                    'name' => 'title_blog_ar',
                                    'value'=>$resource->title_blog_ar,
                                    'required' => true
                                ]); ?> <?php echo $__env->renderComponent(); ?>
                            </div>
                            <div class="col-md-6">
                                <?php $__env->startComponent('gwc.components.editTextInput', [
                                    'label' => 'title blog details ar',
                                    'name' => 'title_blog_details_ar',
                                    'value'=>$resource->title_blog_details_ar,
                                    'required' => true
                                ]); ?> <?php echo $__env->renderComponent(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <?php $__env->startComponent('gwc.components.editTextInput', [
                                    'label' => 'title contactus ar',
                                    'name' => 'title_contactus_ar',
                                    'value'=>$resource->title_contactus_ar,
                                    'required' => true
                                ]); ?> <?php echo $__env->renderComponent(); ?>
                            </div>
                            <div class="col-md-6">
                                <?php $__env->startComponent('gwc.components.editTextInput', [
                                    'label' => 'title login ar',
                                    'name' => 'title_login_ar',
                                    'value'=>$resource->title_login_ar,
                                    'required' => true
                                ]); ?> <?php echo $__env->renderComponent(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <?php $__env->startComponent('gwc.components.editTextInput', [
                                    'label' => 'title register ar',
                                    'name' => 'title_register_ar',
                                    'value'=>$resource->title_register_ar,
                                    'required' => true
                                ]); ?> <?php echo $__env->renderComponent(); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="image" class="tab-pane fade">
                    <br>
                    <div class="container">
                        <!-- image -->
                        <?php $label = "Image Header Shipping"; ?>
                        <?php $field = 'image_header_shipping'; ?>
                        <?php $__env->startComponent('gwc.components.editImageUpload', [
                            'label' => $label,
                            'name' => $field,
                            'value'=>$resource->image_header_shipping,
                        ]); ?> <?php echo $__env->renderComponent(); ?>
                    </div>
                    <br>
                    <div class="ml-5">
                        <img src="<?php echo asset('uploads/headers/' . $resource->image_header_shipping); ?>" width="80">
                    </div>
                    <br>
                    <div class="container">
                        <!-- image -->
                        <?php $label = "Image Header How It Work"; ?>
                        <?php $field = 'image_header_how_it_work'; ?>
                        <?php $__env->startComponent('gwc.components.editImageUpload', [
                            'label' => $label,
                            'name' => $field,
                            'value'=>$resource->image_header_how_it_work,
                        ]); ?> <?php echo $__env->renderComponent(); ?>
                    </div>
                    <br>
                    <div class="ml-5">
                        <img src="<?php echo asset('uploads/headers/' . $resource->image_header_how_it_work); ?>" width="80">
                    </div>
                    <br>
                    <div class="container">
                        <!-- image -->
                        <?php $label = "Image Header Services"; ?>
                        <?php $field = 'image_header_services'; ?>
                        <?php $__env->startComponent('gwc.components.editImageUpload', [
                            'label' => $label,
                            'name' => $field,
                            'value'=>$resource->image_header_services,
                        ]); ?> <?php echo $__env->renderComponent(); ?>
                    </div>
                    <br>
                    <div class="ml-5">
                        <img src="<?php echo asset('uploads/headers/' . $resource->image_header_services); ?>" width="80">
                    </div>
                    <br>
                    <div class="container">
                        <!-- image -->
                        <?php $label = "Image Header Aboutus"; ?>
                        <?php $field = 'image_header_aboutus'; ?>
                        <?php $__env->startComponent('gwc.components.editImageUpload', [
                            'label' => $label,
                            'name' => $field,
                            'value'=>$resource->image_header_aboutus,
                        ]); ?> <?php echo $__env->renderComponent(); ?>
                    </div>
                    <br>
                    <div class="ml-5">
                        <img src="<?php echo asset('uploads/headers/' . $resource->image_header_aboutus); ?>" width="80">
                    </div>
                    <br>
                    <div class="container">
                        <!-- image -->
                        <?php $label = "Image Header Faq"; ?>
                        <?php $field = 'image_header_faq'; ?>
                        <?php $__env->startComponent('gwc.components.editImageUpload', [
                            'label' => $label,
                            'name' => $field,
                            'value'=>$resource->image_header_faq,
                        ]); ?> <?php echo $__env->renderComponent(); ?>
                    </div>
                    <br>
                    <div class="ml-5">
                        <img src="<?php echo asset('uploads/headers/' . $resource->image_header_faq); ?>" width="80">
                    </div>
                    <br>
                    <div class="container">
                        <!-- image -->
                        <?php $label = "Image Header Blog"; ?>
                        <?php $field = 'image_header_blog'; ?>
                        <?php $__env->startComponent('gwc.components.editImageUpload', [
                            'label' => $label,
                            'name' => $field,
                            'value'=>$resource->image_header_blog,
                        ]); ?> <?php echo $__env->renderComponent(); ?>
                    </div>
                    <br>
                    <div class="ml-5">
                        <img src="<?php echo asset('uploads/headers/' . $resource->image_header_blog); ?>" width="80">
                    </div>
                    <br>
                    <div class="container">
                        <!-- image -->
                        <?php $label = "Image Header Contactus"; ?>
                        <?php $field = 'image_header_contactus'; ?>
                        <?php $__env->startComponent('gwc.components.editImageUpload', [
                            'label' => $label,
                            'name' => $field,
                            'value'=>$resource->image_header_contactus,
                        ]); ?> <?php echo $__env->renderComponent(); ?>
                    </div>
                    <br>
                    <div class="ml-5">
                        <img src="<?php echo asset('uploads/headers/' . $resource->image_header_contactus); ?>" width="80">
                    </div>
                    <br>
                    <div class="container">
                        <!-- image -->
                        <?php $label = "Image Header Login"; ?>
                        <?php $field = 'image_header_login'; ?>
                        <?php $__env->startComponent('gwc.components.editImageUpload', [
                            'label' => $label,
                            'name' => $field,
                            'value'=>$resource->image_header_login,
                        ]); ?> <?php echo $__env->renderComponent(); ?>
                    </div>
                    <br>
                    <div class="ml-5">
                        <img src="<?php echo asset('uploads/headers/' . $resource->image_header_login); ?>" width="80">
                    </div>
                    <br>
                    <div class="container">
                        <!-- image -->
                        <?php $label = "Image Header Register"; ?>
                        <?php $field = 'image_header_register'; ?>
                        <?php $__env->startComponent('gwc.components.editImageUpload', [
                            'label' => $label,
                            'name' => $field,
                            'value'=>$resource->image_header_register,
                        ]); ?> <?php echo $__env->renderComponent(); ?>
                    </div>
                    <br>
                    <div class="ml-5">
                        <img src="<?php echo asset('uploads/headers/' . $resource->image_header_register); ?>" width="80">
                    </div>
                    <br>
                </div>

            </div>
        </div>





        <?php $__env->startComponent('gwc.templateIncludes.createEditFooter', ['url' => $data['url']]); ?> <?php echo $__env->renderComponent(); ?>

    </form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('gwc.template.editTemplate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/luqqvtwm/private/resources/views/gwc/headers/edit.blade.php ENDPATH**/ ?>