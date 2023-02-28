<?php $__env->startSection('site-title'); ?>
    <?php echo e(get_static_option('about_page_name')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(get_static_option('about_page_name')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-meta-data'); ?>
    <meta name="description" content="<?php echo e(get_static_option('about_page_meta_description')); ?>">
    <meta name="tags" content="<?php echo e(get_static_option('about_page__meta_tags')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo \App\PageBuilder\PageBuilderSetup::render_frontend_pagebuilder_content_by_location('aboutpage'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bytesed/public_html/laravel/zaika/@core/resources/views/frontend/pages/about.blade.php ENDPATH**/ ?>