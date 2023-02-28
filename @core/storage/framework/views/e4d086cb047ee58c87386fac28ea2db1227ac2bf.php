
<!-- popular dress area start -->
<div class="popular-dress-new-area-wrapper" data-padding-top="<?php echo e($padding_top); ?>" data-padding-bottom="<?php echo e($padding_bottom); ?>">
    <div class="container custom-container-1410">
        <div class="row <?php echo e($image_position == "right" ? "" : "flex-row-reverse"); ?>">
            <div class="col-lg-8">
                <div class="row three-column">
                    <?php $__currentLoopData = $all_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-sm-6 col-md-4 col-lg-4">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.frontend.product.product-card-02','data' => ['item' => $item]]); ?>
<?php $component->withName('frontend.product.product-card-02'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['item' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($item)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="new-add-img-box">
                    <a href="<?php echo e($btn_url); ?>">
                        <?php echo render_image_markup_by_attachment_id($banner_image); ?>

                    </a>
                    <div class="content">
                        <h5 class="catg"><?php echo e($image_title); ?></h5>
                        <div class="btn-wrapper">
                            <a href="<?php echo e($btn_url); ?>" class="borderless-btn"><?php echo e($btn_text); ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- popular dress area end --><?php /**PATH /home/bytesed/public_html/laravel/zaika/@core/app/Providers/../PageBuilder/views/product/product_grid_three.blade.php ENDPATH**/ ?>