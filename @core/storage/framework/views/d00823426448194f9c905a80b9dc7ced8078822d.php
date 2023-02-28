<?php
    $attributes = $product->attributes ? json_decode($product->attributes, true) : null;
?>
<div class="single-shop-list-item">
    <div class="product-img-box">
        <?php echo render_image_markup_by_attachment_id($product->image, '', 'thumbnail'); ?>

    </div>
    <div class="product-details-wrap">
        <div class="ratings">
            <?php for($i = 0; $i < $product->rating_avg_rating; $i++): ?>
                <i class="las la-star icon"></i>
            <?php endfor; ?>
        </div>
        <h3 class="product-title"><a href="<?php echo e(route('frontend.products.single', $product->slug)); ?>"><?php echo e(html_entity_decode(Str::limit($product->title, 23))); ?></a></h3>
        <p class="info"><?php echo e(Str::limit(html_entity_decode($product->summary), 130)); ?></p>
        <div class="pricing">
            <span class="price"><?php echo e(float_amount_with_currency_symbol($product->sale_price)); ?></span>
             <?php if(!empty($product->price) && $product->price != 0): ?>
            <del> <?php echo e(float_amount_with_currency_symbol($product->price)); ?></del>
            <?php endif; ?>
        </div>
        <div class="cart-option">
            <?php if($attributes && count($attributes)): ?>
            <a href="<?php echo e(route('frontend.products.single', $product->slug)); ?>" class="add-cart"><?php echo e(__('View Options')); ?></a>
            <?php else: ?>
            <a href="#" class="wishlist add_to_cart_ajax" data-attributes="<?php echo e($product->attributes); ?>" data-id="<?php echo e($product->id); ?>"><?php echo e(__('Add to Cart')); ?></a>
            <a href="#" class="wishlist add_to_wishlist_ajax" data-attributes="<?php echo e($product->attributes); ?>" data-id="<?php echo e($product->id); ?>"><?php echo e(__('Add to Wishlist')); ?></a>
            <a href="#" class="wishlist add_to_compare_ajax" data-id="<?php echo e($product->id); ?>"><?php echo e(__('Add to Compare')); ?></a>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH /home/bytesed/public_html/laravel/zaika/@core/resources/views/components/frontend/product/product-list.blade.php ENDPATH**/ ?>