<?php echo $__env->make('frontend.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php if(isset($page_post)): ?>
        <?php if(optional($page_post)->breadcrumb_status): ?>
            <?php echo $__env->make('frontend.partials.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    <?php else: ?>
    <?php echo $__env->make('frontend.partials.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php echo $__env->yieldContent('content'); ?>
<?php echo $__env->make('frontend.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /home/bytesed/public_html/laravel/zaika/@core/resources/views/frontend/frontend-page-master.blade.php ENDPATH**/ ?>