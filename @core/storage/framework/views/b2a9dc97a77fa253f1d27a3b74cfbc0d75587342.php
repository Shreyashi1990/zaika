<?php if(session()->has('msg')): ?>
    <div class="alert alert-<?php echo e(session('type')); ?>">
        <?php echo session('msg'); ?>

    </div>
<?php endif; ?>
<?php /**PATH /var/www/html/@core/resources/views/components/msg/flash.blade.php ENDPATH**/ ?>