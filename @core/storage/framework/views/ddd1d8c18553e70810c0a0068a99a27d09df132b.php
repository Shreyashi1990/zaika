<div class="form-group">
    <?php if($label): ?>
    <label for="icon" class="d-block"><?php echo e(__( $label )); ?></label>
    <?php endif; ?>
    <div class="btn-group ">
        <button type="button" class="btn btn-primary iconpicker-component">
            <i class="fas fa-exclamation-triangle"></i>
        </button>
        <button type="button" class="icp icp-dd btn btn-primary dropdown-toggle"
                data-selected="fas fa-exclamation-triangle" data-toggle="dropdown">
            <span class="caret"></span>
            <span class="sr-only"><?php echo e(__('Toggle Dropdown')); ?></span>
        </button>
        <div class="dropdown-menu"></div>
    </div>
    <input type="hidden" class="form-control"  id="<?php echo e($id); ?>" value="fas fa-exclamation-triangle" name="<?php echo e($name); ?>">
</div>
<?php /**PATH /home/bytesed/public_html/laravel/zaika/@core/resources/views/components/iconpicker/input.blade.php ENDPATH**/ ?>