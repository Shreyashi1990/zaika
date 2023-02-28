<option value=""><?php echo e(__("Select State")); ?></option>
<?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <option value="<?php echo e($state->id); ?>"><?php echo e($state->name); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH /home/bytesed/public_html/laravel/zaika/@core/resources/views/frontend/user/states.blade.php ENDPATH**/ ?>