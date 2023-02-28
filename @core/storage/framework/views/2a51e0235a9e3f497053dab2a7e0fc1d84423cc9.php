<?php
    if(is_null(optional($cmProduct)->product)){
        return;
    }
    $item = $cmProduct->product;
    // campaign data check
    $campaign_product = !is_null($item->campaignProduct) ? $item->campaignProduct : getCampaignProductById($item->id);
    $sale_price = $campaign_product ? optional($campaign_product)->campaign_price : $item->sale_price;
    $deleted_price = !is_null($campaign_product) ? $item->sale_price : $item->price;

    $campaign_percentage = !is_null($campaign_product) ? getPercentage($item->sale_price, $sale_price) : false;
    $attributes = $cmProduct->attributes ? json_decode($cmProduct->attributes, true) : null;
?>


<!-- product countdown area start -->
<div class="new-product-countdown-area-wrapper" data-padding-top="<?php echo e($padding_top); ?>" data-padding-bottom="<?php echo e($padding_bottom); ?>">
    <div class="container custom-container-1410">
        <div class="row">
            <div class="col-lg-7">
                <div class="new-product-countdown-inner round-shadow-01">
                    <div class="img-box">
                        <?php echo render_image_markup_by_attachment_id($item->image,"main-image"); ?>


                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="content">


                    <h3 class="title"><?php echo $title; ?></h3>

                    <div class="flash-countdown-1 flash-countdown product-sale-style-two" data-date="<?php echo e($ending_date); ?>">
                        <div class="single-box">
                            <span class="counter-days item">00</span>
                            <span class="label">Days</span>
                        </div>
                        <div class="single-box">
                            <span class="counter-hours item">00</span>
                            <span class="label">Hour</span>
                        </div>
                        <div class="single-box">
                            <span class="counter-minutes item">00</span>
                            <span class="label">Min</span>
                        </div>
                        <div class="single-box">
                            <span class="counter-seconds item">00</span>
                            <span class="label">Sec</span>
                        </div>
                    </div>

                    <h4 class="sub-title"><?php echo e($item->title); ?></h4>
                    <p class="info"><?php echo e($item->summary); ?></p>
                    <div class="pricing-box">
                        <p class="price"><?php echo e(float_amount_with_currency_symbol($sale_price)); ?></p>
                        <del><?php echo e(float_amount_with_currency_symbol($deleted_price)); ?></del>
                    </div>
                    <div class="btn-wrapper">
                        <?php if(is_array($attributes) && count($attributes)): ?>
                            <a class="default-btn color-orange" href="<?php echo e(route('frontend.products.single', $item->slug)); ?>">
                                <i class="las la-shopping-cart icon"></i> Add to Cart
                            </a>
                        <?php else: ?>
                            <a href="#" data-attributes="<?php echo e($item->attributes); ?>" data-id="<?php echo e($item->id); ?>"
                               class="default-btn color-orange add_to_cart_ajax">
                                <i class="las la-shopping-cart icon"></i> Add to Cart
                            </a>
                        <?php endif; ?>


                        <a href="#" data-id="<?php echo e($item->id); ?>"
                           data-route="<?php echo e(route('frontend.products.single', $item->slug)); ?>"
                           data-attributes="<?php echo e((is_array($attributes) && count($attributes)) ? 1 : 0); ?>"
                           class="default-btn outline-btn cart add_to_buy_now_ajax"><?php echo e(__('Buy Now')); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- product countdown area end --><?php /**PATH /home/bytesed/public_html/laravel/zaika/@core/app/Providers/../PageBuilder/views/product/product_sale_style_two.blade.php ENDPATH**/ ?>