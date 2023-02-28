
<!-- random product area end -->
<div class="random-product-area-wrapper" data-padding-top="<?php echo e($padding_top); ?>" data-padding-bottom="<?php echo e($padding_bottom); ?>">
    <div class="container custom-container-1618">
        <div class="row">
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $category_route = route('frontend.products.category', [
                        'id' => optional($category)->id,
                        'slug' => \Str::slug(optional($category)->title ?? '')
                    ]);
                ?>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="single-random-item">
                        <div class="tag-box">
                            <a href="<?php echo e($category_route); ?>" class="tag"><?php echo e(html_entity_decode(optional($category)->title)); ?></a>
                        </div>
                        <a href="<?php echo e($category_route); ?>">
                            <span class="product-bg-img bg-size-cover" <?php echo render_background_image_markup_by_attachment_id(optional($category)->image); ?> data-width="100%" data-height="400"></span>
                        </a>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<!-- random product area start -->
<?php /**PATH /home/bytesed/public_html/laravel/zaika/@core/app/Providers/../PageBuilder/views/category/category_slider_two.blade.php ENDPATH**/ ?>