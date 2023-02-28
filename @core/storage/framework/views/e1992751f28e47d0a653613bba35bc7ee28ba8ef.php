<!DOCTYPE html>
<html class="no-js" lang="<?php echo e(get_default_language()); ?>"  dir="<?php echo e(get_user_lang_direction()); ?>">

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

    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/bootstrap.min-v4.6.0.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/line-awesome.min-v1.3.0.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/fontawesome.all.min-v5.15.3.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/flaticon.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/slick.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/main-style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/main-style-02.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/helpers.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/responsive.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/dynamic-style.css')); ?>">
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

</head>

<?php
    $home_page_variant = $home_page ?? filter_static_option_value('home_page_variant', $global_static_field_data);
?>

<body>
    <?php echo $__env->make('frontend.partials.preloader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend.partials.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend.partials.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php /**PATH /home/bytesed/public_html/laravel/zaika/@core/resources/views/frontend/partials/header.blade.php ENDPATH**/ ?>