
<?php $__env->startSection('page-title'); ?>
    <?php echo e($campaign->title); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="shop-area-wrapper grid-only" id="shop">
    <div class="container">
        <div class="row">
            <?php $campaign_products = $campaign->products; ?>
            <?php if($campaign_products && $campaign_products->count()): ?>
                <?php $__currentLoopData = $campaign_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $campaign_product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $end_date = $campaign_product->end_date; ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.frontend.product.product-card','data' => ['product' => $campaign_product->product,'column' => 'col-md-4','isCampaign' => true,'campaignProductEndDate' => $end_date,'campaignId' => $campaign->id]]); ?>
<?php $component->withName('frontend.product.product-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['product' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($campaign_product->product),'column' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('col-md-4'),'isCampaign' => true,'campaignProductEndDate' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($end_date),'campaignId' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($campaign->id)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
            <div class="col-md-12">
                <div class="text-center">
                    <h1><?php echo e(__('No products to show')); ?></h1>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bytesed/public_html/laravel/zaika/@core/resources/views/frontend/campaign/index.blade.php ENDPATH**/ ?>