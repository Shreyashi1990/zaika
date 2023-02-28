<?php
    // campaign data check
    $campaign_product = !is_null($item->campaignProduct) ? $item->campaignProduct : getCampaignProductById($item->id);
    $sale_price = $campaign_product ? optional($campaign_product)->campaign_price : $item->sale_price;
    $deleted_price = !is_null($campaign_product) ? $item->sale_price : $item->price;
    $campaign_percentage = !is_null($campaign_product) ? getPercentage($item->sale_price, $sale_price) : false;
    $buttons = \App\PageBuilder\Services\ProductItemServices::product_hover_button($item);

    $attributes = $item->attributes ? json_decode($item->attributes, true) : null;
    $quick_view_data = getQuickViewDataMarkup($item);
    $quick_view_markup = '<a href="#" id="quickview" class="quick-view" '.$quick_view_data.'}><i class="lar la-eye icon"></i></a>';
?>

<div class="single-new-popular-dress-item">
    <div class="img-box bg-color-off-white">
        <span class="tag-box-new top-right flex-column">
            <?php if(!empty($item->badge)): ?>
                <span class="tag-new bg-black"> <?php echo e($item->badge); ?> </span>
            <?php endif; ?>

            <?php if(!empty($campaign_percentage)): ?>
                <span class="tag-new bg-black mt-0">
                    -<?php echo e(round($campaign_percentage,2)); ?>%
                </span>
            <?php endif; ?>
        </span>
        <?php echo render_image_markup_by_attachment_id($item->image); ?>

        <div class="hover">
            <ul class="product-interaction-list">
                <li>
                    <?php if(is_array($attributes) && count($attributes)): ?>
                        <a href="<?php echo e(route('frontend.products.single', $item->slug)); ?>">
                            <i class="las la-shopping-cart icon"></i>
                        </a>
                    <?php else: ?>
                        <a href="#" data-attributes="<?php echo e($item->attributes); ?>" data-id="<?php echo e($item->id); ?>"
                           class="add_to_cart_ajax">
                            <i class="las la-shopping-cart icon"></i>
                        </a>
                    <?php endif; ?>
                </li>
                <li>
                    <?php if(is_array($attributes) && count($attributes)): ?>
                        <a href="<?php echo e(route('frontend.products.single', $item->slug)); ?>">
                            <i class="lar la-heart icon"></i>
                        </a>
                    <?php else: ?>
                        <a href="#" data-attributes="<?php echo e($item->attributes); ?>" data-id="<?php echo e($item->id); ?>"
                           class="add_to_wishlist_ajax">
                            <i class="lar la-heart icon"></i></a>
                        </a>
                    <?php endif; ?>
                </li>
                <li>
                    <a href="#" data-id="<?php echo e($item->id); ?>" class="add_to_compare_ajax"> <i class="las la-retweet icon"></i></a>
                </li>
                <li>
                    <?php echo $quick_view_markup; ?>

                </li>
            </ul>
        </div>
    </div>
    <div class="content">
        <h3 class="title">
            <a href="<?php echo e(route('frontend.products.single', $item->slug)); ?>"><?php echo e($item->title); ?></a>
        </h3>
        <ul class="pricing">
            <li class="on-price"><?php echo e(float_amount_with_currency_symbol($sale_price)); ?></li>
            <li class="off-price">
                <del><?php echo e(float_amount_with_currency_symbol($deleted_price)); ?></del>
            </li>
        </ul>
        <div class="details">
            <div class="left-content">
                <?php if(is_array($attributes) && count($attributes)): ?>
                    <a href="<?php echo e(route('frontend.products.single', $item->slug)); ?>" class=" add-to-cart-new">
                        Add to Cart
                    </a>
                <?php else: ?>
                    <a href="#" data-attributes="<?php echo e($item->attributes); ?>" data-id="<?php echo e($item->id); ?>"
                       class="add_to_cart_ajax add-to-cart-new">
                        Add to Cart
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/bytesed/public_html/laravel/zaika/@core/resources/views/components/frontend/product/product-card-02.blade.php ENDPATH**/ ?>