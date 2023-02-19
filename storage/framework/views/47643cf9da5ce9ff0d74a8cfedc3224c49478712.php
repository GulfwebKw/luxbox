

<?php $__env->startSection('formContent'); ?>
    <form name="tFrm" action="<?php echo e(route($data['updateRoute'])); ?>" id="form_validation" method="post" class="kt-form" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

        <div class="row">
            <div class="col-md-12">
                <!-- begin::Portlet -->
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                <?php echo e(__('adminMessage.storedetails')); ?>

                            </h3>
                        </div>
                    </div>

                    <!-- begin portlet body -->
                    <div class="kt-portlet__body">

                        <!-- is language active -->








                        <!-- logo -->
                        <div class="form-group">
                            <div class="row">
                                <?php $label = "Logo"; ?>
                                <?php $field = 'logo'; ?>
                                <?php $__env->startComponent('gwc.components.editImageUpload', [
                                    'label' => $label,
                                    'name' => $field,
                                    'value' => $resource->$field,
                                    'required' => true,
                                    'folder' => $data['imageFolder'] . '/thumb/',
                                    'deletePath' => 'gwc/' . $data['path'] . '/deleteimage/' . $field,
                                ]); ?> <?php echo $__env->renderComponent(); ?>
                            </div>
                        </div>

                        <!-- email logo -->
                        <div class="form-group">
                            <div class="row">
                                <?php $label = "Email Logo"; ?>
                                <?php $field = 'email_logo'; ?>
                                <?php $__env->startComponent('gwc.components.editImageUpload', [
                                    'label' => $label,
                                    'name' => $field,
                                    'value' => $resource->$field,
                                    'required' => true,
                                    'folder' => $data['imageFolder'] . '/thumb/',
                                    'deletePath' => 'gwc/' . $data['path'] . '/deleteimage/' . $field,
                                ]); ?> <?php echo $__env->renderComponent(); ?>
                            </div>
                        </div>

                        <!-- favicon -->
                        <div class="form-group">
                            <div class="row">
                                <?php $label = "Favicon"; ?>
                                <?php $field = 'favicon'; ?>
                                <?php $__env->startComponent('gwc.components.editImageUpload', [
                                    'label' => $label,
                                    'name' => $field,
                                    'value' => $resource->$field,
                                    'required' => true,
                                    'folder' => $data['imageFolder'] . '/thumb/',
                                    'deletePath' => 'gwc/' . $data['path'] . '/deleteimage/' . $field,
                                ]); ?> <?php echo $__env->renderComponent(); ?>
                            </div>
                        </div>

                        <br><br><br>

                        <div class="form-group ">
                            <h5><?php echo e(__('adminMessage.seo')); ?></h5>
                        </div>

                        <!-- seo description en -->
                        <div class="form-group">
                            <?php $__env->startComponent('gwc.components.editTextInput', [
                                'label' => 'SEO Description (en)',
                                'name' => 'seo_description_en',
                                'value' => $resource->seo_description_en,
                                'required' => true,
                            ]); ?> <?php echo $__env->renderComponent(); ?>
                        </div>

                        <!-- seo description ar -->
                        <div class="form-group">
                            <?php $__env->startComponent('gwc.components.editTextInput', [
                                'label' => 'SEO Description (ar)',
                                'name' => 'seo_description_ar',
                                'value' => $resource->seo_description_ar,
                                'required' => true,
                            ]); ?> <?php echo $__env->renderComponent(); ?>
                        </div>

                        <!-- seo keywords en -->
                        <div class="form-group">
                            <?php $__env->startComponent('gwc.components.editTextInput', [
                                'label' => 'SEO Keywords (en)',
                                'name' => 'seo_keywords_en',
                                'value' => $resource->seo_keywords_en,
                                'required' => true,
                            ]); ?> <?php echo $__env->renderComponent(); ?>
                        </div>

                        <!-- seo keywords ar -->
                        <div class="form-group">
                            <?php $__env->startComponent('gwc.components.editTextInput', [
                                'label' => 'SEO Keywords (ar)',
                                'name' => 'seo_keywords_ar',
                                'value' => $resource->seo_keywords_ar,
                                'required' => true,
                            ]); ?> <?php echo $__env->renderComponent(); ?>
                        </div>

                        <br><br><br>

                        <div class="form-group ">
                            <h5><?php echo e(__('adminMessage.site_name')); ?></h5>
                        </div>

                        <!-- website name -->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <?php $__env->startComponent('gwc.components.editTextInput', [
                                        'label' => 'Name (en)',
                                        'name' => 'name_en',
                                        'value' => $resource->name_en,
                                        'required' => true
                                    ]); ?> <?php echo $__env->renderComponent(); ?>
                                </div>
                                <div class="col-md-6">
                                    <?php $__env->startComponent('gwc.components.editTextInput', [
                                        'label' => 'Name (ar)',
                                        'name' => 'name_ar',
                                        'value' => $resource->name_ar,
                                        'required' => true
                                    ]); ?> <?php echo $__env->renderComponent(); ?>
                                </div>
                            </div>
                        </div>

                        <br><br><br>

                        <div class="form-group ">
                            <h5><?php echo e(__('adminMessage.address')); ?></h5>
                        </div>

                        <!-- Address -->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <?php $__env->startComponent('gwc.components.editTextInput', [
                                        'label' => 'Address (en)',
                                        'name' => 'address_en',
                                        'value' => $resource->address_en,
                                        'required' => true
                                    ]); ?> <?php echo $__env->renderComponent(); ?>
                                </div>
                                <div class="col-md-6">
                                    <?php $__env->startComponent('gwc.components.editTextInput', [
                                        'label' => 'Address (ar)',
                                        'name' => 'address_ar',
                                        'value' => $resource->address_ar,
                                        'required' => true
                                    ]); ?> <?php echo $__env->renderComponent(); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <!-- Email -->
                                <div class="col-md-6">
                                    <?php $__env->startComponent('gwc.components.editTextInput', [
                                        'label' => 'Email',
                                        'name' => 'email',
                                        'value' => $resource->email,
                                        'required' => true
                                    ]); ?> <?php echo $__env->renderComponent(); ?>
                                </div>
                                <!-- Mobile -->
                                <div class="col-md-6">
                                    <?php $__env->startComponent('gwc.components.editTextInput', [
                                        'label' => 'Mobile',
                                        'name' => 'mobile',
                                        'value' => $resource->mobile,
                                        'required' => true
                                    ]); ?> <?php echo $__env->renderComponent(); ?>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="row">
                                <!-- Phone -->
                                <div class="col-md-6">
                                    <?php $__env->startComponent('gwc.components.editTextInput', [
                                        'label' => 'Phone',
                                        'name' => 'phone',
                                        'value' => $resource->phone,
                                        'required' => true
                                    ]); ?> <?php echo $__env->renderComponent(); ?>
                                </div>
                                <!-- Fax -->
                                <div class="col-md-6">
                                    <?php $__env->startComponent('gwc.components.editTextInput', [
                                        'label' => 'Fax',
                                        'name' => 'fax',
                                        'value' => $resource->fax,
                                        'required' => true
                                    ]); ?> <?php echo $__env->renderComponent(); ?>
                                </div>
                            </div>
                        </div>

                        <br><br><br>

                        <div class="form-group">
                            <h5><?php echo e(__('adminMessage.fromemailandname')); ?></h5>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <!-- From Email -->
                                <div class="col-md-6">
                                    <?php $__env->startComponent('gwc.components.editTextInput', [
                                        'label' => 'From Email',
                                        'name' => 'from_email',
                                        'value' => $resource->from_email,
                                        'required' => true
                                    ]); ?> <?php echo $__env->renderComponent(); ?>
                                </div>
                                <!-- From Name -->
                                <div class="col-md-6">
                                    <?php $__env->startComponent('gwc.components.editTextInput', [
                                        'label' => 'From Name',
                                        'name' => 'from_name',
                                        'value' => $resource->from_name,
                                        'required' => true
                                    ]); ?> <?php echo $__env->renderComponent(); ?>
                                </div>
                            </div>
                        </div>

                        <br><br><br>

                        <div class="form-group ">
                            <h5><?php echo e(__('adminMessage.sociallinks')); ?></h5>
                        </div>

                        <!-- google plus -->
                        <div class="form-group">
                            <?php $__env->startComponent('gwc.components.editTextInput', [
                                'label' => 'Google Plus',
                                'name' => 'social_google_plus',
                                'value' => $resource->social_google_plus,
                                'required' => true
                            ]); ?> <?php echo $__env->renderComponent(); ?>
                        </div>

                        <!-- facebook -->
                        <div class="form-group">
                            <?php $__env->startComponent('gwc.components.editTextInput', [
                                'label' => 'Facebook',
                                'name' => 'social_facebook',
                                'value' => $resource->social_facebook,
                                'required' => true
                            ]); ?> <?php echo $__env->renderComponent(); ?>
                        </div>

                        <!-- twitter -->
                        <div class="form-group">
                            <?php $__env->startComponent('gwc.components.editTextInput', [
                                'label' => 'Twitter',
                                'name' => 'social_twitter',
                                'value' => $resource->social_twitter,
                                'required' => true
                            ]); ?> <?php echo $__env->renderComponent(); ?>
                        </div>

                        <div class="form-group">
                            <?php $__env->startComponent('gwc.components.editTextInput', [
                                'label' => 'Instagram',
                                'name' => 'social_instagram',
                                'value' => $resource->social_instagram,
                                'required' => true
                            ]); ?> <?php echo $__env->renderComponent(); ?>
                        </div>

                        <!-- linked in -->
                        <div class="form-group">
                            <?php $__env->startComponent('gwc.components.editTextInput', [
                                'label' => 'Linked in',
                                'name' => 'social_linkedin',
                                'value' => $resource->social_linkedin,
                                'required' => true
                            ]); ?> <?php echo $__env->renderComponent(); ?>
                        </div>

                        <br><br><br>


                        <!-- Google Analytics -->
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php $__env->startComponent('gwc.components.editTextarea', [
                                        'label' => 'SHIPPING RATE CALCULATOR',
                                        'name' => 'google_analytics',
                                        'value' => $resource->google_analytics,
                                        'required' => true
                                    ]); ?> <?php echo $__env->renderComponent(); ?>
                                    <div class="btn btn-info m-3" onclick="$(this).parent().find('textarea').val($(this).parent().find('textarea').val() + '{country}');">country</div>
                                    <div class="btn btn-info m-3" onclick="$(this).parent().find('textarea').val($(this).parent().find('textarea').val() + '{zipcode}');">zipcode</div>
                                    <div class="btn btn-info m-3" onclick="$(this).parent().find('textarea').val($(this).parent().find('textarea').val() + '{weight}');">weight</div>
                                    <div class="btn btn-info m-3" onclick="$(this).parent().find('textarea').val($(this).parent().find('textarea').val() + '{weightC}');">weightC</div>
                                    <div class="btn btn-info m-3" onclick="$(this).parent().find('textarea').val($(this).parent().find('textarea').val() + '{length}');">length</div>
                                    <div class="btn btn-info m-3" onclick="$(this).parent().find('textarea').val($(this).parent().find('textarea').val() + '{weight2}');">weight2</div>
                                    <div class="btn btn-info m-3" onclick="$(this).parent().find('textarea').val($(this).parent().find('textarea').val() + '{height}');">height</div>
                                    <div class="btn btn-info m-3" onclick="$(this).parent().find('textarea').val($(this).parent().find('textarea').val() + '{heightC}');">heightC</div>
                                    <div class="btn btn-info m-3" onclick="$(this).parent().find('textarea').val($(this).parent().find('textarea').val() + '{lang}');">Lang</div>
                                </div>
                            </div>
                        </div>























                        <!-- Push Notification -->
                        <div class="form-group">
                            <?php $__env->startComponent('gwc.components.editTextInput', [
                                //'label' => 'Push Notification Settings',
                                'label' => '',
                                'name' => 'web_server_key',
                                'value' => $resource->web_server_key,
                                'type' => 'hidden',
                                //'required' => true
                            ]); ?> <?php echo $__env->renderComponent(); ?>
                        </div>

                    </div>
                    <!-- end portlet body -->



                    <!-- begin portlet foot -->
                    <?php $__env->startComponent('gwc.templateIncludes.formFooter'); ?> <?php echo $__env->renderComponent(); ?>
                    <!-- end portlet foot -->

                </div>
                <!--end::Portlet-->
            </div>
        </div>

    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('gwc.template.formTemplate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/luqqvtwm/private/resources/views/gwc/settings/form.blade.php ENDPATH**/ ?>