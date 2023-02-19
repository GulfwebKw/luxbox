

<?php $__env->startSection('editContent'); ?>
    <form name="tFrm" id="form_validation" method="post" class="kt-form" enctype="multipart/form-data"
          action="<?php echo e(route($data['updateRoute'], $resource->id)); ?>">
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
        <?php echo method_field('PUT'); ?>
        <div class="kt-portlet__body">

            <!-- name -->
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <?php $__env->startComponent('gwc.components.editTextInput', [
                            'label' => 'Civil Id',
                            'name' => 'civil_id',
                            'value'=>$resource->civil_id,
                            'required' => true
                        ]); ?> <?php echo $__env->renderComponent(); ?>
                    </div>
                    <div class="col-md-4">
                        <?php $__env->startComponent('gwc.components.editTextInput', [
                            'label' => 'First Name',
                            'name' => 'first_name',
                            'value'=>$resource->first_name,
                            'required' => true
                        ]); ?> <?php echo $__env->renderComponent(); ?>
                    </div>
                    <div class="col-md-4">
                        <?php $__env->startComponent('gwc.components.editTextInput', [
                            'label' => 'Last Name',
                            'name' => 'last_name',
                            'value'=>$resource->last_name,
                            'required' => true
                        ]); ?> <?php echo $__env->renderComponent(); ?>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <?php $__env->startComponent('gwc.components.editTextInput', [
                            'label' => 'Company Name',
                            'name' => 'company_name',
                            'value'=>$resource->company_name,
                        ]); ?> <?php echo $__env->renderComponent(); ?>
                    </div>
                    <div class="col-md-4">
                        <?php $__env->startComponent('gwc.components.editTextInput', [
                            'label' => 'phone',
                            'name' => 'phone',
                            'value'=>$resource->phone,
                            'required' => true
                        ]); ?> <?php echo $__env->renderComponent(); ?>
                    </div>
                    <div class="col-md-4">
                        <?php $__env->startComponent('gwc.components.editTextInput', [
                            'label' => 'Mobile',
                            'name' => 'mobile',
                            'value'=>$resource->mobile,
                            'required' => true
                        ]); ?> <?php echo $__env->renderComponent(); ?>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <?php $__env->startComponent('gwc.components.editTextInput', [
                            'label' => 'Twitter',
                            'name' => 'twitter',
                            'value'=> $resource->twitter,
                        ]); ?> <?php echo $__env->renderComponent(); ?>
                    </div>
                    <div class="col-md-6">
                        <?php $__env->startComponent('gwc.components.editTextInput', [
                            'label' => 'Instagram',
                            'name' => 'instagram',
                            'value'=> $resource->instagram,
                        ]); ?> <?php echo $__env->renderComponent(); ?>
                    </div>
                    <div class="col-md-6">
                        <?php $__env->startComponent('gwc.components.editTextInput', [
                            'label' => 'Snapchat',
                            'name' => 'snapchat',
                            'value'=> $resource->snapchat,
                        ]); ?> <?php echo $__env->renderComponent(); ?>
                    </div>
                    <div class="col-md-6">
                        <?php $__env->startComponent('gwc.components.editTextInput', [
                            'label' => 'TikTok',
                            'name' => 'tiktok',
                            'value'=> $resource->tiktok,
                        ]); ?> <?php echo $__env->renderComponent(); ?>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <label>Account Type</label>
                        <select name="account_type"  class="form-control" required>
                            <?php $__currentLoopData = $accountTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($type->id); ?>" <?php if($type->id==$resource->account_type): ?> selected  <?php endif; ?>><?php echo e($type->type_en); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label>Choose Your Language</label>
                        <select name="language_id"  class="form-control" required>
                            <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($language->id); ?>" <?php if($language->id==$resource->language_id): ?> selected  <?php endif; ?>><?php echo e($language->name_en); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <?php $__env->startComponent('gwc.components.editTextInput', [
                            'label' => 'Referral Code',
                            'name' => 'referral_code',
                            'value'=>$resource->referral_code,
                            'required' => true
                        ]); ?> <?php echo $__env->renderComponent(); ?>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label>Country</label>
                        <select name="country" onchange="getCities(this.value)" id=""  class="form-control" required>
                            <option value="">None</option>
                            <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($r->title_en); ?>" <?php if($r->title_en==$resource->country): ?> selected <?php endif; ?>><?php echo e($r->title_en); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label>State</label>
                        <select name="city" id="city-list" onchange="getAreas(this.value)"  class="form-control" required>
                            <option value="">None</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label>Area</label>
                        <select name="area" id="area-list"  class="form-control" required>
                            <option value="">None</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <?php $__env->startComponent('gwc.components.editTextInput', [
                            'label' => 'Block',
                            'name' => 'block',
                            'value'=>$resource->block,
                            'required' => true
                        ]); ?> <?php echo $__env->renderComponent(); ?>
                    </div>
                    <div class="col-md-4">
                        <?php $__env->startComponent('gwc.components.editTextInput', [
                            'label' => 'Street',
                            'name' => 'street',
                            'value'=>$resource->street,
                            'required' => true
                        ]); ?> <?php echo $__env->renderComponent(); ?>
                    </div>
                    <div class="col-md-4">
                        <?php $__env->startComponent('gwc.components.editTextInput', [
                            'label' => 'Jaddeh',
                            'name' => 'avenue',
                            'value'=>$resource->avenue,
                            'required' => true
                        ]); ?> <?php echo $__env->renderComponent(); ?>
                    </div>
                    <div class="col-md-4">
                        <?php $__env->startComponent('gwc.components.editTextInput', [
                            'label' => 'Home PACI',
                            'name' => 'home_paci',
                            'value'=>$resource->home_paci,
                            'required' => true
                        ]); ?> <?php echo $__env->renderComponent(); ?>
                    </div>

                </div>
            </div>

            <!-- email -->
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <?php $__env->startComponent('gwc.components.editTextInput', [
                            'label' => 'phone',
                            'name' => 'phone',
                            'value'=>$resource->phone,
                            'required' => true
                        ]); ?> <?php echo $__env->renderComponent(); ?>
                    </div>
                    <div class="col-md-6">
                        <?php $__env->startComponent('gwc.components.editTextInput', [
                            'label' => 'Mobile',
                            'name' => 'mobile',
                            'value'=>$resource->mobile,
                            'required' => true
                        ]); ?> <?php echo $__env->renderComponent(); ?>
                    </div>
                </div>
            </div>

            <!-- auth -->
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <?php $__env->startComponent('gwc.components.editTextInput', [
                            'label' => 'Email',
                            'name' => 'email',
                            'type' => 'email',
                            'value'=>$resource->email,
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

            <div class="form-group row">
                <!-- is active? -->
                <label class="col-3 col-form-label"><?php echo e(__('adminMessage.isactive')); ?></label>
                <div class="col-3">
                    <?php $__env->startComponent('gwc.components.createIsActive'); ?> <?php echo $__env->renderComponent(); ?>
                </div>
            </div>

        </div>

        <?php $__env->startComponent('gwc.templateIncludes.createEditFooter', ['url' => $data['url']]); ?> <?php echo $__env->renderComponent(); ?>

    </form>

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            $.ajax({
                type: "POST",
                url: "/gwc/get-country-cities-edit",
                data: {country_id: <?php echo json_encode($resource->country, 15, 512) ?>, id: '<?php echo e($resource->city); ?>'},
                beforeSend: function () {
                    $("#city-list").addClass("loader");
                },
                success: function (data) {
                    $("#city-list").html(data);
                    $("#city-list").prop('disabled', false);
                    $("#city-list").removeClass("loader");
                    document.getElementById('city-list').value=<?php echo json_encode($resource->city, 15, 512) ?>;
                    $.ajax({
                        type: "POST",
                        url: "/gwc/get-city-areas",
                        data: 'city_id=' + <?php echo json_encode($resource->city, 15, 512) ?>,
                        beforeSend: function () {
                            $("#area-list").addClass("loader");
                        },
                        success: function (data) {
                            $("#area-list").html(data);
                            $("#area-list").prop('disabled', false);
                            $("#area-list").removeClass("loader");
                            document.getElementById('area-list').value=<?php echo json_encode($resource->area, 15, 512) ?>;
                        }
                    });
                }
            });
        });


        function getUsCities(val) {
            $.ajax({
                type: "POST",
                url: "/gwc/get-country-cities",
                data: 'country_id=' + val,
                beforeSend: function () {
                    $("#city-list").addClass("loader");
                },
                success: function (data) {
                    $("#city-list").html(data);
                    $("#city-list").prop('disabled', false);
                    $("#city-list").removeClass("loader");
                }
            });
        }

        function getUsAreas(val) {
            $.ajax({
                type: "POST",
                url: "/gwc/get-city-areas",
                data: 'city_id=' + val,
                beforeSend: function () {
                    $("#area-list").addClass("loader");
                },
                success: function (data) {
                    $("#area-list").html(data);
                    $("#area-list").prop('disabled', false);
                    $("#area-list").removeClass("loader");
                }
            });
        }

        function getCities(val) {
            $.ajax({
                type: "POST",
                url: "/gwc/get-country-cities",
                data: 'country_id=' + val,
                beforeSend: function () {
                    $("#city-list").addClass("loader");
                },
                success: function (data) {
                    $("#city-list").html(data);
                    $("#city-list").prop('disabled', false);
                    $("#city-list").removeClass("loader");
                }
            });
        }

        function getAreas(val) {
            $.ajax({
                type: "POST",
                url: "/gwc/get-city-areas",
                data: 'city_id=' + val,
                beforeSend: function () {
                    $("#area-list").addClass("loader");
                },
                success: function (data) {
                    $("#area-list").html(data);
                    $("#area-list").prop('disabled', false);
                    $("#area-list").removeClass("loader");
                }
            });
        }
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('gwc.template.editTemplate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/luqqvtwm/private/resources/views/gwc/users/edit.blade.php ENDPATH**/ ?>