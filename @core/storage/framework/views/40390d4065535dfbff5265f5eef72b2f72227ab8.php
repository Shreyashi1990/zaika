<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('User Dashboard')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('section'); ?>
    <div class="row">
        <div class="col-lg-6">
            <div class="user-dashboard-card style-01 ">
                <div class="icon"><i class="las la-calendar-alt"></i></div>
                <div class="content">
                    <h4 class="title"><?php echo e(__('Total Orders')); ?></h4>
                    <span class="number"><?php echo e($product_count); ?></span>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="user-dashboard-card style-01 ">
                <div class="icon"><i class="las la-calendar-alt"></i></div>
                <div class="content">
                    <h4 class="title"><?php echo e(__('Support Tickets')); ?></h4>
                    <span class="number"><?php echo e($support_ticket_count); ?></span>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.user.dashboard.user-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bytesed/public_html/laravel/zaika/@core/resources/views/frontend/user/dashboard/user-home.blade.php ENDPATH**/ ?>