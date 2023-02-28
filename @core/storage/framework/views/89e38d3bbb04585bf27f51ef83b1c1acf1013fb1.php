<div class="news-update-area-wrapper single-page" data-padding-top="<?php echo e($padding_top); ?>"
    data-padding-bottom="<?php echo e($padding_bottom); ?>">
    <div class="container">
        <div class="row">
            <?php $__currentLoopData = $all_blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.frontend.blog.grid','data' => ['blog' => $blog,'readMoreBtnText' => $readMoreBtnText]]); ?>
<?php $component->withName('frontend.blog.grid'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['blog' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($blog),'readMoreBtnText' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($readMoreBtnText)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="row justify-content-center margin-top-30">
            <div class="col-lg-6">
                <div class="pagination-default">
                    <?php echo $all_blogs->links(); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/bytesed/public_html/laravel/zaika/@core/resources/views/PageBuilder/blog-grid-page.blade.php ENDPATH**/ ?>