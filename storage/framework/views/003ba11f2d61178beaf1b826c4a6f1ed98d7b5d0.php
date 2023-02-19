

<?php $__env->startSection('createContent'); ?>
    <form name="tFrm" id="form_validation" method="post" class="kt-form" enctype="multipart/form-data"
          action="<?php echo e(route($data['storeRoute'])); ?>">
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
        <div class="kt-portlet__body">

            <!-- name -->
            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <?php $__env->startComponent('gwc.components.createTextInput', [
                            'label' => 'Civil Id',
                            'name' => 'civil_id',
                            'required' => true
                        ]); ?> <?php echo $__env->renderComponent(); ?>
                    </div>
                    <div class="col-md-4">
                        <?php $__env->startComponent('gwc.components.createTextInput', [
                            'label' => 'First Name',
                            'name' => 'first_name',
                            'required' => true
                        ]); ?> <?php echo $__env->renderComponent(); ?>
                    </div>
                    <div class="col-md-4">
                        <?php $__env->startComponent('gwc.components.createTextInput', [
                            'label' => 'Last Name',
                            'name' => 'last_name',
                            'required' => true
                        ]); ?> <?php echo $__env->renderComponent(); ?>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <?php $__env->startComponent('gwc.components.createTextInput', [
                            'label' => 'Company Name',
                            'name' => 'company_name',
                        ]); ?> <?php echo $__env->renderComponent(); ?>
                    </div>
                    <div class="col-md-4">
                        <?php $__env->startComponent('gwc.components.createTextInput', [
                            'label' => 'phone',
                            'name' => 'phone',
                            'required' => true
                        ]); ?> <?php echo $__env->renderComponent(); ?>
                    </div>
                    <div class="col-md-4">
                        <?php $__env->startComponent('gwc.components.createTextInput', [
                            'label' => 'Mobile',
                            'name' => 'mobile',
                            'required' => true
                        ]); ?> <?php echo $__env->renderComponent(); ?>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <?php $__env->startComponent('gwc.components.createTextInput', [
                            'label' => 'Twitter',
                            'name' => 'twitter',
                        ]); ?> <?php echo $__env->renderComponent(); ?>
                    </div>
                    <div class="col-md-6">
                        <?php $__env->startComponent('gwc.components.createTextInput', [
                            'label' => 'Instagram',
                            'name' => 'instagram',
                        ]); ?> <?php echo $__env->renderComponent(); ?>
                    </div>
                    <div class="col-md-6">
                        <?php $__env->startComponent('gwc.components.createTextInput', [
                            'label' => 'Snapchat',
                            'name' => 'snapchat',
                        ]); ?> <?php echo $__env->renderComponent(); ?>
                    </div>
                    <div class="col-md-6">
                        <?php $__env->startComponent('gwc.components.createTextInput', [
                            'label' => 'TikTok',
                            'name' => 'tiktok',
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
                            <option value="<?php echo e($type->id); ?>"><?php echo e($type->type_en); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label>Choose Your Language</label>
                        <select name="language_id"  class="form-control" required>
                            <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($language->id); ?>"><?php echo e($language->name_en); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <?php $__env->startComponent('gwc.components.createTextInput', [
                            'label' => 'Referral Code',
                            'name' => 'referral_code',
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
                            <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resource): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($resource->title_en); ?>"><?php echo e($resource->title_en); ?></option>
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
                        <?php $__env->startComponent('gwc.components.createTextInput', [
                            'label' => 'Block',
                            'name' => 'block',
                            'required' => true
                        ]); ?> <?php echo $__env->renderComponent(); ?>
                    </div>
                    <div class="col-md-4">
                        <?php $__env->startComponent('gwc.components.createTextInput', [
                            'label' => 'Street',
                            'name' => 'street',
                            'required' => true
                        ]); ?> <?php echo $__env->renderComponent(); ?>
                    </div>
                    <div class="col-md-4">
                        <?php $__env->startComponent('gwc.components.createTextInput', [
                            'label' => 'Jaddeh',
                            'name' => 'avenue',
                            'required' => true
                        ]); ?> <?php echo $__env->renderComponent(); ?>
                    </div>
                    <div class="col-md-4">
                        <?php $__env->startComponent('gwc.components.createTextInput', [
                            'label' => 'Home PACI',
                            'name' => 'home_paci',
                            'required' => true
                        ]); ?> <?php echo $__env->renderComponent(); ?>
                    </div>

                </div>
            </div>

            <!-- auth -->
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <?php $__env->startComponent('gwc.components.createTextInput', [
                            'label' => 'Email',
                            'name' => 'email',
                            'type' => 'email',
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
        function getUsCities(val) {
            $.ajax({
                type: "POST",
                url: "/gwc/get-country-cities",
                data: 'country_id=' + val,
                beforeSend: function () {
                    $("#us_city-list").addClass("loader");
                },
                success: function (data) {
                    $("#us_city-list").html(data);
                    $("#us_city-list").prop('disabled', false);
                    $("#us_city-list").removeClass("loader");
                }
            });
        }

        function getUsAreas(val) {
            $.ajax({
                type: "POST",
                url: "/gwc/get-city-areas",
                data: 'city_id=' + val,
                beforeSend: function () {
                    $("#us_area-list").addClass("loader");
                },
                success: function (data) {
                    $("#us_area-list").html(data);
                    $("#us_area-list").prop('disabled', false);
                    $("#us_area-list").removeClass("loader");
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
<?php echo $__env->make('gwc.template.createTemplate', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/luqqvtwm/private/resources/views/gwc/users/create.blade.php ENDPATH**/ ?>