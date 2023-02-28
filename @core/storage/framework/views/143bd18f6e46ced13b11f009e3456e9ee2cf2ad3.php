
<?php $__env->startSection('section'); ?>
<h5 class="mb-3"><?php echo e(__('Add Shipping Address')); ?></h5>
<div class="text-right">
    <a href="<?php echo e(route('user.shipping.address.all')); ?>" class="btn btn-primary"><?php echo e(__('All Shipping Address')); ?></a>
</div>
<div class="dashboard-form-wrapper">
    <form action="<?php echo e(route("frontend.add.user.shipping.address")); ?>" method="POST" id="new_user_shipping_address_form">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="name"><?php echo e(__('Name')); ?></label>
            <input type="text" class="form-control" name="name" id="name">
        </div>
        <div class="form-group">
            <label for="address"><?php echo e(__('Address')); ?></label>
            <textarea name="address" id="address" class="form-control" cols="30" rows="5"></textarea>
        </div>
        <button class="default-btn default-theme-btn"><?php echo e(__('Submit')); ?></button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.user.dashboard.user-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bytesed/public_html/laravel/zaika/@core/resources/views/frontend/user/dashboard/shipping/new.blade.php ENDPATH**/ ?>