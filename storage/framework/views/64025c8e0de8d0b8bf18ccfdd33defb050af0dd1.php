<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('front.partials.preloader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="wrapper clearfix" id="wrapperParallax1">

        <header class="header header-1 header-transparent" id="navbar-spy">
            <nav class="navbar navbar-expand-lg  navbar-bordered navbar-sticky" id="primary-menu"><div class="container">
                    <a class="navbar-brand ml-3" href="<?php echo e(url('/')); ?>">
                        <img class="logo logo-light ml-3" src="<?php echo e(asset('uploads/settings/'.$setting->logo)); ?>"
                             alt="<?php echo e(getSetting('setting')['name_'.$lang]); ?>"/><img class="logo logo-dark ml-3"
                                                                                  src="<?php echo e(asset('/uploads/settings/'.getSetting('setting')->logo)); ?>"
                                                                                  alt="<?php echo e(getSetting('setting')['name_'.$lang]); ?>"/></a>
                    <div class="ml-5-temp">
                        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                                data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false"
                                aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

                        <div class="collapse navbar-collapse" id="navbarContent">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item"><a href="<?php echo e(url('/')); ?>"><span><?php echo e(__('website.menu.Home')); ?></span></a>
                                </li>
                                <li class="nav-item"><a
                                            href="<?php echo e(url('/shipping')); ?>"><span><?php echo e(__('website.menu.Shipping_Cost')); ?></span></a>
                                </li>
                                <li class="nav-item"><a
                                            href="<?php echo e(url('/works')); ?>"><span><?php echo e(__('website.menu.How_it_Works')); ?></span></a>
                                </li>
                                <li class="nav-item"><a
                                            href="<?php echo e(url('/services')); ?>"><span><?php echo e(__('website.menu.services')); ?></span></a>
                                </li>
                                <li class="nav-item"><a
                                            href=" <?php echo e(url('/about-us')); ?> "><span><?php echo e(__('website.menu.About-us')); ?></span></a>
                                </li>
                                <li class="nav-item"><a
                                            href="<?php echo e(url('/faq')); ?>"><span><?php echo e(__('website.menu.FAQ')); ?></span></a></li>
                                <li class="nav-item"><a href="<?php echo e(url('/blog')); ?>"><span><?php echo e(__('website.menu.Blog')); ?></span></a>
                                </li>
                                <li class="nav-item"><a
                                            href="<?php echo e(url('/contact-us')); ?>"><span><?php echo e(__('website.menu.Contact_Us')); ?></span></a>
                                </li>

                                <div class="module module-language">
                                    <div class="selected ml-1"><span><?php echo e($lang); ?> </span><i
                                                class="fas fa-chevron-down"></i></div>
                                    <div class="lang-list">
                                        <ul>
                                            <li>
                                                <a href="<?php echo e(route('changeLocale' , ['en'])); ?>"><?php echo e(__('website.menu.english')); ?></a>
                                            </li>
                                            <li>
                                                <a href="<?php echo e(route('changeLocale' , ['ar'])); ?>"><?php echo e(__('website.menu.arabic')); ?></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                        </div>

                    </div>

                </div>

            </nav>
        </header>

        <section class="page-title bg-overlay bg-overlay-dark bg-parallax" id="page-title">
            <div class="bg-section"><img src="<?php echo e(asset('uploads/headers/'.$header->image_header_register)); ?>"
                                         alt="Background"/></div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <div class="title text-lg-left">
                            <div class="title-heading">
                                <h1><?php echo e($header['title_register_'.$lang]); ?></h1>
                            </div>
                            <div class="clearfix"></div>
                            <ol class="breadcrumb justify-content-lg-start">
                                <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>"><?php echo e(__('website.menu.Home')); ?></a>
                                </li>
                                <li class="breadcrumb-item active"
                                    aria-current="page"><?php echo e($header['title_register_'.$lang]); ?></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-12">
                        <h6><?php echo e(__('website.member.AccountInformation')); ?></h6>
                        <hr class="my_hr">
                        <?php if($errors->any()): ?>
                            <div class="alert alert-danger"><?php echo implode('', $errors->all('<div>:message</div>')); ?></div>
                        <?php endif; ?>
                        <form action="<?php echo e(url('register/store')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="col-12 col-lg-3">
                                    <label><?php echo e(__('website.member.Email_Address')); ?> <span>*</span></label>
                                    <input class="form-control" type="text" name="email" value="<?php echo e(old('email')); ?>"
                                           placeholder="<?php echo e(__('website.member.Email_Address')); ?>" required/>
                                </div>
                                <div class="col-12 col-lg-3">
                                    <label><?php echo e(__('website.member.confirm')); ?> <?php echo e(__('website.member.Email_Address')); ?> <span>*</span></label>
                                    <input class="form-control" type="text" name="email_confirmation" value="<?php echo e(old('email_confirmation')); ?>"
                                           placeholder="<?php echo e(__('website.member.confirm')); ?>  <?php echo e(__('website.member.Email_Address')); ?>" required/>
                                </div>
                                <div class="col-12 col-lg-3">
                                    <label><?php echo e(__('website.member.Password')); ?> <span>*</span></label>
                                    <input class="form-control" type="password" name="password"
                                           placeholder="<?php echo e(__('website.member.Password')); ?>" required/>
                                </div>
                                <div class="col-12 col-lg-3">
                                    <label><?php echo e(__('website.member.confirm')); ?> <?php echo e(__('website.member.Password')); ?> <span>*</span></label>
                                    <input class="form-control" type="password" name="password_confirmation"
                                           placeholder="<?php echo e(__('website.member.confirm')); ?> <?php echo e(__('website.member.Password')); ?>" required/>
                                </div>

                                <div class="col-12 col-lg-4">
                                    <label><?php echo e(__('website.member.AccountType')); ?> <span>*</span></label>
                                    <div class="select-container">
                                        <select class="form-control my_select" name="account_type_id">
                                            <?php $__currentLoopData = $accountType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($type->id); ?>" <?php if(old('account_type_id') == $type->id): ?> selected <?php endif; ?>><?php echo e($lang == "en" ? $type->type_en : $type->type_ar); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select></div>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <label><?php echo e(__('website.member.YourLanguage')); ?> <span>*</span></label>
                                    <div class="select-container">
                                        <select class="form-control my_select" name="lang_id">
                                            <?php $__currentLoopData = $language; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $langCode): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($langCode->id); ?>" ><?php echo e($lang == "en" ? $langCode->name_en : $langCode->name_ar); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select></div>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <label><?php echo e(__('website.member.ReferralCode')); ?> </label>
                                    <input class="form-control" type="text" name="referral_code" value="<?php echo e(old('referral_code')); ?>"
                                           placeholder="<?php echo e(__('website.member.ReferralCode')); ?>"/>
                                </div>

                                <div class="col-12 col-lg-12">&nbsp;</div>

                                <div class="col-12 col-lg-12"><h6><?php echo e(__('website.member.MyInformation')); ?></h6>
                                    <hr class="my_hr">
                                </div>

                                <div class="col-12 col-lg-3">
                                    <label><?php echo e(__('website.member.CivilId')); ?> <span>*</span></label>
                                    <input class="form-control" type="text" name="civil_id" value="<?php echo e(old('civil_id')); ?>"
                                           placeholder="<?php echo e(__('website.member.CivilId')); ?>" required/>
                                </div>

                                <div class="col-12 col-lg-3">
                                    <label><?php echo e(__('website.member.FirstName')); ?> <span>*</span></label>
                                    <input class="form-control" type="text" name="first_name" value="<?php echo e(old('first_name')); ?>"
                                           placeholder="<?php echo e(__('website.member.FirstName')); ?>" required/>
                                </div>
                                <div class="col-12 col-lg-3">
                                    <label><?php echo e(__('website.member.LastName')); ?> <span>*</span></label>
                                    <input class="form-control" type="text" name="last_name" value="<?php echo e(old('last_name')); ?>"
                                           placeholder="<?php echo e(__('website.member.LastName')); ?>" required/>
                                </div>
                                <div class="col-12 col-lg-3">
                                    <label><?php echo e(__('website.member.Phone')); ?> <span>*</span></label>
                                    <input class="form-control" type="text" name="phone" value="<?php echo e(old('phone')); ?>"
                                           placeholder="<?php echo e(__('website.member.Phone')); ?>" required/>
                                </div>
                                <div class="col-12 col-lg-3">
                                    <label><?php echo e(__('website.member.CompanyName')); ?> </label>
                                    <input class="form-control" type="text" name="company_name" value="<?php echo e(old('company_name')); ?>"
                                           placeholder="<?php echo e(__('website.member.CompanyName')); ?>"/>
                                </div>
                                <div class="col-12 col-lg-3">
                                    <label><?php echo e(__('website.member.Twitter')); ?></label>
                                    <input class="form-control" type="text" name="twitter" value="<?php echo e(old('twitter')); ?>"
                                           placeholder="<?php echo e(__('website.member.Twitter')); ?>"/>
                                </div>

                                <div class="col-12 col-lg-3">
                                    <label><?php echo e(__('website.member.Instagram')); ?></label>
                                    <input class="form-control" type="text" name="instagram" value="<?php echo e(old('instagram')); ?>"
                                           placeholder="<?php echo e(__('website.member.Instagram')); ?>"/>
                                </div>

                                <div class="col-12 col-lg-3">
                                    <label><?php echo e(__('website.member.Snapchat')); ?></label>
                                    <input class="form-control" type="text" name="snapchat" value="<?php echo e(old('snapchat')); ?>"
                                           placeholder="<?php echo e(__('website.member.Snapchat')); ?>"/>
                                </div>

                                <div class="col-12 col-lg-3">
                                    <label><?php echo e(__('website.member.TikTok')); ?></label>
                                    <input class="form-control" type="text" name="tiktok" value="<?php echo e(old('tiktok')); ?>"
                                           placeholder="<?php echo e(__('website.member.TikTok')); ?>"/>
                                </div>


                                <div class="col-12 col-lg-12">&nbsp;</div>
                                <div class="col-12 col-lg-12"><h6><?php echo e(__('website.member.MyAddress')); ?></h6>
                                    <hr class="my_hr">
                                </div>
                                <div class="col-12 col-lg-4">
                                    <label><?php echo e(__('website.member.Select_The_Country')); ?> <span>*</span></label>
                                    <div class="select-container">
                                        <select class="form-control my_select" name="country" onchange="getCities(this.value)">
                                            <option><?php echo e(__('website.member.Select_The_Country')); ?></option>
                                            <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $con): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($con->title_en); ?>" <?php if(old('country') == $con->title_en ): ?> selected <?php endif; ?>><?php echo e($lang == "en" ? $con->title_en : $con->title_ar); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <label><?php echo e(__('website.member.Select_The_State')); ?> <span>*</span></label>
                                    <div class="select-container" id="city-list">
                                        <select name="city" id="city-list" onchange="getAreas(this.value)" class="form-control my_select">
                                            <option><?php echo e(__('website.member.Select_The_State')); ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <label><?php echo e(__('website.member.Select_The_Area')); ?> <span>*</span></label>
                                    <div class="select-container" id="area-list">
                                        <select class="form-control my_select" name="area" >
                                            <option><?php echo e(__('website.member.Select_The_Area')); ?></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <label><?php echo e(__('website.member.Block')); ?> <span>*</span></label>
                                    <input class="form-control" type="text" name="block" value="<?php echo e(old('block')); ?>"
                                           placeholder="<?php echo e(__('website.member.Block')); ?>" required/>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <label><?php echo e(__('website.member.Street')); ?> <span>*</span></label>
                                    <input class="form-control" type="text" name="street" value="<?php echo e(old('street')); ?>"
                                           placeholder="<?php echo e(__('website.member.Street')); ?>" required/>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <label><?php echo e(__('website.member.Avenue')); ?> <span>*</span></label>
                                    <input class="form-control" type="text" name="avenue" value="<?php echo e(old('avenue')); ?>"
                                           placeholder="<?php echo e(__('website.member.Avenue')); ?>" required/>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <label><?php echo e(__('website.member.Home_PACI')); ?> <i data-toggle="modal" data-target="#homePCAIHelp" class="fa fa-question-circle ml-1 mr-1" style="cursor: pointer;" ></i><span>*</span></label>
                                    <input class="form-control" type="text" name="home_paci" value="<?php echo e(old('home_paci')); ?>"
                                           placeholder="<?php echo e(__('website.member.Home_PACI')); ?>" required/>
                                </div>
                                <div class="col-12 col-lg-12"></div>
                                <div class="col-12">&nbsp;</div>
                                <div class="col-12">
                                    <input class="btn btn--primary" type="submit"
                                           value="<?php echo e(__('website.member.Register')); ?>"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>


        <?php echo $__env->make('front.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
        <!-- Modal -->
        <div id="homePCAIHelp" class="modal fade" role="dialog">
          <div class="modal-dialog">
        
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img class="m-1 w-100" src="<?php echo e(asset('/assets/images/paci/PACI_1.png')); ?>"/>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <img class="m-1 w-100" src="<?php echo e(asset('/assets/images/paci/PACI_2.png')); ?>"/>
                                </div>
                                <div class="col-md-12">
                                    <img class="m-1 w-100" src="<?php echo e(asset('/assets/images/paci/PACI_3.png')); ?>"/>
                                </div>
                            </div>
                        </div>
                    </div>
              </div>
            </div>
        
          </div>
        </div>


    </div>
    <script>
        function getCities(val) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "/get-country-cities",
                data: 'country_id=' + val,
                beforeSend: function () {
                    $("#city-list .list").addClass("loader");
                },
                success: function (data) {
                    $("#city-list select").html(data.op);
                    $("#city-list .list").html(data.lis);
                    $("#city-list .list").prop('disabled', false);
                    $("#city-list .list").removeClass("loader");
                }
            });
        }

        function getAreas(val) {
            $.ajax({
                type: "POST",
                url: "/get-city-areas",
                data: 'city_id=' + val,
                beforeSend: function () {
                    $("#area-list .list").addClass("loader");
                },
                success: function (data) {
                    $("#area-list select").html(data.op);
                    $("#area-list .list").html(data.lis);
                    $("#area-list .list").prop('disabled', false);
                    $("#area-list .list").removeClass("loader");
                }
            });
        }
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/luqqvtwm/private/resources/views/member/register.blade.php ENDPATH**/ ?>