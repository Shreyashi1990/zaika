
<!-- trendy collection area start -->
<div class="trendy-collection-new-area-wrapper" data-padding-top="<?php echo e($padding_top); ?>" data-padding-bottom="<?php echo e($padding_bottom); ?>">
    <div class="container custom-container-1410">
        <div class="row justify-content-center">
            <div class="col-sm-8 col-md-6 col-lg-5">
                <div class="section-title-wrapper style-02-new">
                    <h2 class="main-title"><?php echo e($section_title); ?></h2>
                    <p class="sub-title"><?php echo e($section_summary); ?></p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="slick-main global-slick-init arrow-style-02" data-infinite="true" data-arrows="true"
                     data-dots="false" data-slidesToShow="4" data-slidesToScroll="1" data-swipeToSlide="true"
                     data-autoplay="true" data-autoplaySpeed="2500" data-appendArrows="#trendy_coll_02"
                     data-prevArrow='<div class="prev-icon"><i class="las la-arrow-left"></i></div>'
                     data-nextArrow='<div class="next-icon"><i class="las la-arrow-right"></i></div>'
                     data-responsive='[
                            {"breakpoint": 1200,"settings": {"slidesToShow": 4}},
                            {"breakpoint": 992,"settings": {"slidesToShow": 3}},
                            {"breakpoint": 768, "settings": {"slidesToShow": 2}},
							{"breakpoint": 451, "settings": {"slidesToShow": 1}}
                            ]'>

                    <?php $__currentLoopData = $all_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="slick-item">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.frontend.product.product-card-04','data' => ['item' => $item]]); ?>
<?php $component->withName('frontend.product.product-card-04'); ?>
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
</div>
<!-- bag-and-shoe area end --><?php /**PATH /home/bytesed/public_html/laravel/zaika/@core/app/Providers/../PageBuilder/views/product/product_slider_style_for.blade.php ENDPATH**/ ?>