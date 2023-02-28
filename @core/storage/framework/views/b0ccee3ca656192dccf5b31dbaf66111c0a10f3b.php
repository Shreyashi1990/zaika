

<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<?php
    $campaign_product = getCampaignProductById($item->id);
    $sale_price = $campaign_product ? $campaign_product->campaign_price : $item->sale_price;
    $campaign_percentage = $campaign_product ? getPercentage($item->sale_price, $sale_price) : false;
?>

<div class="col-sm-6 col-md-4 col-lg-3 new">
    <div class="single-our-store-wrapper single-new-design-wrapper single-product-item">
        <div class="product-img-box">
            <?php if(!empty($item->badge)): ?>
            <span class="sale"><?php echo e($item->badge); ?></span>
            <?php endif; ?>
            <?php if($campaign_percentage): ?>
                <span class="discount-tag">-<?php echo e(round($campaign_percentage, 2)); ?>%</span>
            <?php endif; ?>
            <a href="<?php echo e(route('frontend.products.single', $item->slug)); ?>">
                <?php echo render_image_markup_by_attachment_id($item->image, '', 'grid'); ?>

            </a>
            <div class="hover">
                <?php $attributes = $item->attributes ? json_decode($item->attributes, true) : null; ?>
                <div class="left">
                    <ul>
                        <li>
                            <?php if(is_array($attributes) && count($attributes)): ?>
                            <a href="<?php echo e(route('frontend.products.single', $item->slug)); ?>" class="add-to-cart"><?php echo e(__('View Options')); ?></a>
                            <?php else: ?>
                            <a href="#" data-attributes="<?php echo e($item->attributes); ?>" data-id="<?php echo e($item->id); ?>" class="add-to-cart add_to_cart_ajax"><?php echo e(__('Add to Cart')); ?></a>
                            <?php endif; ?>
                        </li>
                    </ul>
                </div>
                <div class="right">
                    <ul>
                        <li>
                            <?php if(is_array($attributes) && count($attributes)): ?>
                            <a href="<?php echo e(route('frontend.products.single', $item->slug)); ?>"> <i class="lar la-heart icon"></i></a>
                            <?php else: ?>
                            <a href="#" data-attributes="<?php echo e($item->attributes); ?>" data-id="<?php echo e($item->id); ?>" class="add_to_wishlist_ajax"> <i class="lar la-heart icon"></i></a>
                            <?php endif; ?>

                            <?php
                                $quick_view_data = getQuickViewDataMarkup($item);
                            ?>
                            <a href="#" data-id="<?php echo e($item->id); ?>" class="add_to_compare_ajax"> <i class="las la-retweet icon"></i></a>
                            <a href="#" id="quickview" class="quick-view" <?php echo $quick_view_data; ?>>
                                <i class="lar la-eye icon"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="product-details-wrap">
            <h4 class="product-title">
                <a href="<?php echo e(route('frontend.products.single', $item->slug)); ?>"><?php echo e($item->title); ?></a>
            </h4>
            
            <div class="product-price-details">
                <ul class="list">
                    <li class="price"><?php echo e(float_amount_with_currency_symbol($sale_price)); ?></li>
                    <?php if(!empty($item->price) && $item->price != 0): ?>
                        <li class="price"><del><?php echo e(float_amount_with_currency_symbol($item->price)); ?></del></li>
                    <?php endif; ?>
                        
                    
                </ul>
            </div>
        </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /home/bytesed/public_html/laravel/zaika/@core/resources/views/frontend/partials/filter-item.blade.php ENDPATH**/ ?>