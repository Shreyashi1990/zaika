<!DOCTYPE html>
<html class="no-js" lang="<?php echo e(get_default_language()); ?>"  dir="<?php echo e(get_default_language_direction()); ?>">

<head>
    <?php echo $__env->make('frontend.partials.google-analytics', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php if(request()->routeIs('homepage')): ?>
        <meta name="description" content="<?php echo e(filter_static_option_value('site_meta_description', $global_static_field_data)); ?>">
        <meta name="tags" content="<?php echo e(filter_static_option_value('site_meta_tags', $global_static_field_data)); ?>">
    <?php else: ?>
        <?php echo $__env->yieldContent('page-meta-data'); ?>
    <?php endif; ?>
    <?php echo render_favicon_by_id(filter_static_option_value('site_favicon', $global_static_field_data)); ?>

    <?php echo load_google_fonts(); ?>

    <link rel=icon href="<?php echo e(asset('assets/frontend/img/favicon/favicon.png')); ?>" sizes="20x20" type="image/png">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/bootstrap.min-v4.6.0.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/line-awesome.min-v1.3.0.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/flaticon.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/slick.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/main-style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/helpers.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/responsive.css')); ?>">
    <?php echo $__env->make('frontend.partials.css-variable', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('style'); ?>

    <link rel="stylesheet" href="<?php echo e(asset('assets/common/css/toastr.css')); ?>">

    <?php if(!empty(filter_static_option_value('site_rtl_enabled', $global_static_field_data)) || get_user_lang_direction() == 'rtl'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/rtl.css')); ?>">
    <?php endif; ?>
    <?php echo $__env->make('frontend.partials.og-meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script src="<?php echo e(asset('assets/frontend/js/jquery-3.6.0.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/frontend/js/jquery-migrate-3.3.2.js')); ?>"></script>
    <script>var siteurl = "<?php echo e(url('/')); ?>";</script>
    <?php echo filter_static_option_value('site_third_party_tracking_code', $global_static_field_data); ?>


    <link rel="stylesheet" href="<?php echo e(asset('assets/common/css/toastr.css')); ?>">

    <style>
        .error-wrap li {
            display: block;
            font-family: var(--heading-font);
            font-size: 16px;
            font-weight: 400;
            color: #666666;
        }
    </style>
</head>

<body>
    <?php echo $__env->make('frontend.partials.preloader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- register form area start -->
    <div class="register-form-area-wrapper">
        <div class="register-bg"
            <?php echo render_background_image_markup_by_attachment_id(get_static_option('user_auth_page_side_image')); ?>

        ></div>
        <div class="custom-container-1720 container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="content-top">
                        <div class="left">
                            <div class="logo-wrapper">
                                <a href="<?php echo e(route('homepage')); ?>" class="logo">
                                    <?php echo render_image_markup_by_attachment_id(get_static_option('user_auth_page_logo')); ?>

                                </a>
                            </div>
                        </div>
                        <div class="right">
                            <div class="social-icon">
                                <ul class="social-icon-list">
                                    <?php
                                        $social_links_json = get_static_option('user_auth_page_social_links');
                                        $all_social_links = [];
                                        if ($social_links_json) {
                                            $all_social_links = json_decode($social_links_json, true);
                                        }
                                    ?>
                                    <?php $__currentLoopData = $all_social_links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="item"><a href="//<?php echo e($social['link']); ?>"><i class="<?php echo e($social['icon']); ?> icon"></i></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-lg-5">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.msg.error','data' => []]); ?>
<?php $component->withName('msg.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.msg.flash','data' => []]); ?>
<?php $component->withName('msg.flash'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php $fallback_class = empty(request()->type) ? " show active " : ""; ?>
                    <div class="register-form-wrapper">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link <?php if(request()->type && request()->type == 'login'): ?> active <?php endif; ?> <?php echo e($fallback_class); ?>" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                    aria-controls="home" aria-selected="true"><?php echo e(__('sign in')); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php if(request()->type && request()->type == 'register'): ?> active <?php endif; ?>" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                    aria-controls="profile" aria-selected="false"><?php echo e(__('sign up')); ?></a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade <?php if(request()->type && request()->type == 'login'): ?> show active <?php endif; ?> <?php echo e($fallback_class); ?>" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <form action="<?php echo e(route('user.login')); ?>" method="post" class="register-form" id="login_form_order_page">
                                    <?php echo csrf_field(); ?>
                                    <div class="error-wrap"></div>
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label for="login_email"><?php echo e(__('Username')); ?>

                                            <span class="ex">*</span></label>
                                            <input type="text" name="username" id="login_email" required />
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="login_password"><?php echo e(__('Password')); ?><span class="ex">*</span></label>
                                            <input type="password" name="password" class="form-control" id="login_password" required />
                                        </div>
                                        <div class="form-group form-check col-12">
                                            <input type="checkbox" name="remember" class="form-check-input" id="login_remember">
                                            <label class="form-check-label" for="remember"><?php echo e(__('Remember me')); ?> </label>
                                        </div>
                                    </div>
                                    <div class="btn-pair">
                                        <a id="forgot-password" data-toggle="tab" 
                                            href="#forgot_password" role="tab" aria-controls="forgot_password" 
                                            aria-selected="false" class="forgot-btn">
                                            <?php echo e(__('forgot password?')); ?>

                                        </a>

                                        <div class="btn-wrapper">
                                            <button type="button" class="default-btn" id="login_btn"><?php echo e(__('SIGN IN')); ?></button>
                                        </div>
                                    </div>
                                </form>
                                <div class="bar-wrap">
                                    <span class="bar"></span>
                                    <p class="or"><?php echo e(__('or')); ?></p>
                                    <span class="bar"></span>
                                </div>
                                <div class="sin-in-with">
                                    <?php if(get_static_option('enable_google_login')): ?>
                                    <a href="<?php echo e(route('login.google.redirect')); ?>" class="sign-in-btn">
                                        <img src="<?php echo e(asset('assets/frontend/img/icon/google-icon.svg')); ?>" alt="icon">
                                        <?php echo e(__('Sign in with Google')); ?>

                                    </a>
                                    <?php endif; ?>
                                    <?php if(get_static_option('enable_facebook_login')): ?>
                                    <a href="<?php echo e(route('login.facebook.redirect')); ?>" class="sign-in-btn">
                                        <img src="<?php echo e(asset('assets/frontend/img/icon/Facebook-icon.svg')); ?>" alt="icon">
                                        <?php echo e(__('Sign in with Facebook')); ?>

                                    </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="tab-pane fade <?php if(request()->type && request()->type == 'register'): ?> show active <?php endif; ?>" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <form action="<?php echo e(route('user.register')); ?>" method="POST" class="register-form">
                                    <?php echo csrf_field(); ?>
                                    
                                    <input type="hidden" name="captcha_token" id="gcaptcha_token">
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label for="address_amaila"><?php echo e(__('Full Name')); ?><span class="ex">*</span></label>
                                            <input type="text" name="name" id="address_amaila">
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="l-name"><?php echo e(__('Username')); ?><span class="ex">*</span></label>
                                            <input type="text" name="username" id="l-name" value="">
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="address_amailaw"><?php echo e(__('Email')); ?><span class="ex">*</span></label>
                                            <input type="email" name="email" id="address_amailaw" />
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="country"><?php echo e(__('Country')); ?><span class="ex">*</span></label>
                                            <select id="country" class="form-control" name="country">
                                                <?php $__currentLoopData = $all_country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($country); ?>"><?php echo e($country); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-12">
                                            <label for="address_phone"><?php echo e(__('City')); ?><span class="ex">*</span></label>
                                            <input type="text" name="city" id="address_city" />
                                        </div>

                                        <div class="form-group col-lg-6 col-12">
                                            <label for="exampleInputPassword16"><?php echo e(__('Password')); ?><span class="ex">*</span></label>
                                            <input type="password" name="password" class="form-control" id="exampleInputPassword16">
                                        </div>
                                        <div class="form-group col-lg-6 col-12">
                                            <label for="exampleInputPassword15"><?php echo e(__('Confirmed Password')); ?><span
                                                    class="ex">*</span></label>
                                            <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword15">
                                        </div>
                                        <div class="form-group form-check col-12">
                                            <input type="checkbox" class="form-check-input" name="agree_terms" id="Check11">
                                            <label class="form-check-label" for="Check11">
                                                <?php echo e(__('By creating an account, you agree to the')); ?>

                                                <a href="<?php echo e(url(get_static_option('toc_page_link'))); ?>"><?php echo e(__('terms of service and Conditions')); ?>,</a> <?php echo e(__('and')); ?>

                                                <a href="<?php echo e(url(get_static_option('privacy_policy_link'))); ?>"><?php echo e(__('privacy policy')); ?></a>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="btn-wrapper btn-top">
                                        <input type="submit" value="<?php echo e(__('register')); ?>" class="default-btn">
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="forgot_password" role="tabpanel" aria-labelledby="forgot_password">
                                <form action="<?php echo e(route('user.forget.password')); ?>" method="post" class="register-form" id="forgot_password_form">
                                    <?php echo csrf_field(); ?>
                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.msg.error','data' => []]); ?>
<?php $component->withName('msg.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.msg.flash','data' => []]); ?>
<?php $component->withName('msg.flash'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label for="forgot_password_username"><?php echo e(__('Username')); ?><span class="ex">*</span></label>
                                            <input type="text" name="username" id="forgot_password_username">
                                        </div>
                                    </div>
                                    <div class="btn-wrapper btn-top">
                                        <input type="submit" value="<?php echo e(__('Send Reset Mail')); ?>" class="default-btn">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- register form area end -->


    <!-- back to top area start -->
    <div class="scroll-to-top">
        <i class="las la-angle-up"></i>
    </div>
    <!-- back to top area end -->

    <!-- jquery -->
    <script src="<?php echo e(asset('assets/frontend/js/jquery-3.6.0.min.js')); ?>"></script>
    <!-- jquery migrate -->
    <script src="<?php echo e(asset('assets/frontend/js/jquery-migrate-3.3.2.js')); ?>"></script>
    <!-- bootstrap -->
    <script src="<?php echo e(asset('assets/frontend/js/bootstrap.min-v4.6.0.js')); ?>"></script>
    <!-- popper -->
    <script src="<?php echo e(asset('assets/frontend/js/popper.min.js')); ?>"></script>
    <!-- slick js -->
    <script src="<?php echo e(asset('assets/frontend/js/slick.min.js')); ?>"></script>
    <!-- isotope js -->
    <script src="<?php echo e(asset('assets/frontend/js/isotope.pkgd.min-v3.0.6.js')); ?>"></script>
    <!-- countdown js -->
    <script src="<?php echo e(asset('assets/frontend/js/loopcounter.js')); ?>"></script>
    <!-- wow js -->
    <script src="<?php echo e(asset('assets/frontend/js/wow.js')); ?>"></script>
    <!-- main js -->
    <script src="<?php echo e(asset('assets/frontend/js/main.js')); ?>"></script>

    <?php echo $__env->make('frontend.partials.google-captcha', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend.partials.gdpr-cookie', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend.partials.inline-script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend.partials.twakto', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.sweet-alert-msg','data' => []]); ?>
<?php $component->withName('sweet-alert-msg'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <script src="<?php echo e(asset('assets/common/js/toastr.min.js')); ?>"></script>
    <script>
        (function ($) {
            'use strict'
            $(document).ready(function () {
                // 
            });
        })(jQuery);
    </script>

</body>

</html>
    <script>
        (function($) {
            "use strict";
            $(document).on('click', '#login_btn', function (e) {
                var formContainer = $('#login_form_order_page');
                var el = $(this);
                var username = $('#login_form_order_page #login_email').val();
                var password = $('#login_form_order_page #login_password').val();
                var remember = $('#login_form_order_page #login_remember').val();

                el.text('<?php echo e(__("Please Wait")); ?>');

                $.ajax({
                    type: 'post',
                    url: "<?php echo e(route('user.ajax.login')); ?>",
                    data: {
                        _token: "<?php echo e(csrf_token()); ?>",
                        username : username,
                        password : password,
                        remember : remember,
                    },
                    success: function (data){
                        if(data.status == 'invalid') {
                            el.text('<?php echo e(__("Login")); ?>')
                            formContainer.find('.error-wrap').html('<div class="alert alert-danger">'+data.msg+'</div>');
                        } else {
                            formContainer.find('.error-wrap').html('');
                            el.text('<?php echo e(__("Login Success.. Redirecting ..")); ?>');
                            location.reload();
                        }
                    },
                    error: function (data) {
                        var response = data.responseJSON.errors;
                        formContainer.find('.error-wrap').html('<ul class="alert alert-danger"></ul>');
                        $.each(response,function (value,index){
                            formContainer.find('.error-wrap ul').append('<li>'+index+'</li>');
                        });
                        el.text('<?php echo e(__("Login")); ?>');
                    }
                });
            });

            $('.nav-item .nav-link').on('click', function () {
                $('#forgot-password').removeClass('active');
            });
        })(jQuery)
    </script>
<?php /**PATH /home/bytesed/public_html/laravel/zaika/@core/resources/views/frontend/user/login.blade.php ENDPATH**/ ?>