<!-- popular dress area start -->
<div class="popular-dress-area-wrapper" data-padding-top="50" data-padding-bottom="50">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="section-title-wrapper style-02-new">
                    <h2 class="main-title"><?php echo e($title); ?></h2>
                    <p class="sub-title"><?php echo e($description); ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="container custom-container-1618 filter-two-main-container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="our-stor-isotop-btn-wrapper">
                    <ul class="our-stor-btn-list">
                        <li data-filter="new-items" class="product_filter_style_two active">New items</li>
                        <li data-filter="top-rated" class="product_filter_style_two">Top Rated</li>
                        <li data-filter="top-selling" class="product_filter_style_two">Top Selling</li>
                        <li data-filter="campaign" class="product_filter_style_two">Campaign</li>
                        <li data-filter="discounted" class="product_filter_style_two">Discounted</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="our-store-item-wrap product-filter-style-two-product-wrapper" data-item-limit="<?php echo e($items); ?>">
            <div class="filter-style-block-preloader lds-ellipsis">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>

            <div class="row filter-item-wrap">
                <?php $__currentLoopData = $all_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.frontend.product.product-card-03','data' => ['item' => $item]]); ?>
<?php $component->withName('frontend.product.product-card-03'); ?>
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
    </div>
</div>
<!-- popular dress area end -->
<?php /**PATH /home/bytesed/public_html/laravel/zaika/@core/app/Providers/../PageBuilder/views/product/product_filter_style_two.blade.php ENDPATH**/ ?>