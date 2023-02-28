<?php if($all_user_shipping): ?>
    <?php $__currentLoopData = $all_user_shipping; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user_shipping): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card mb-3 user_shipping_address" data-id="<?php echo e($user_shipping->id); ?>">
            <div class="card-body">
                <div class="h5"><?php echo e($user_shipping->name); ?></div>
                <p><?php echo e($user_shipping->address); ?></p>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH /home/bytesed/public_html/laravel/zaika/@core/resources/views/frontend/cart/checkout-user-shipping.blade.php ENDPATH**/ ?>