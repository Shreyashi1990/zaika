<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Payment Failed')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="patment-success-area padding-top-100 padding-bottom-100">
    <div class="container">
        <div class="payment-success-wrapper">
            <div class="payment-contents">
                <h4 class="title"> <?php echo e(__('Payment Failed')); ?> </h4>
                <div class="icon">
                    <i class="las la-times"></i>
                </div>
                <div class="my-5">
                    <?php echo e(__('Sorry, something went wrong. Your transaction failed.')); ?>

                </div>
                <div class="btn-wrapper margin-top-40">
                    <?php if(auth('web')->check()): ?>
                    <a href="<?php echo e(route('user.home')); ?>" class="default-btn color-one"><?php echo e(__('Go to Dashboard')); ?></a>
                    <?php else: ?>
                    <a href="<?php echo e(route('homepage')); ?>" class="default-btn outline-one"><?php echo e(__('Back to Home')); ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bytesed/public_html/laravel/zaika/@core/resources/views/frontend/payment/payment-cancel.blade.php ENDPATH**/ ?>