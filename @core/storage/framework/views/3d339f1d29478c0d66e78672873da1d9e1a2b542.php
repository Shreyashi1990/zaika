<?php
    $attributes = optional($product)->attributes ? json_decode($product->attributes, true) : null;
    $column_class = isset($column) ? $column : 'col-md-4';
?>

<div class="col-sm-6 <?php echo e($column_class); ?>">
    <div class="single-new-collection-item single-product-item">
        <div class="product-img-box">
           <?php if(isset($isCampaign) && $isCampaign): ?>
                <?php
                    $campaignItemInfo = getCampaignItemStockInfo($product->id, $campaignId);
                    $percentage = $campaignItemInfo['sold_count'] / $campaignItemInfo['in_stock_count'] * 100;
                    $price_percentage = getCampaignPricePercentage($campaignId, $product->id, $product->sale_price);
                ?>   
            <?php endif; ?>
            <?php
                $campaign_product = getCampaignProductById($product->id);
                $sale_price = $campaign_product ? $campaign_product->campaign_price : $product->sale_price;
                $deleted_price = $campaign_product ? $product->sale_price : $product->price;
                $campaign_percentage = $campaign_product ? getPercentage($product->sale_price, $sale_price) : false;
            ?>
            <?php if($campaign_percentage): ?>
             <span class="discount-tag"> <?php echo e(round($campaign_percentage, 2)); ?>%</span>
            <?php endif; ?>
            <?php if(!empty($product->badge)): ?>
                <span class="sale"><?php echo e($product->badge); ?></span>
            <?php endif; ?>

            <a href="<?php echo e(route('frontend.products.single', html_entity_decode($product->slug))); ?>">
                <?php echo render_image_markup_by_attachment_id($product->image, '', 'grid'); ?>

            </a>
            <div class="hover">
                <ul class="list">
                    <li>
                        <a href="#" id="quickview" class="quick-view" <?php echo getQuickViewDataMarkup($product); ?>><?php echo e(__('Quickview')); ?> <i class="lar la-eye icon"></i></a>
                    </li>

                    <?php if($attributes && count($attributes)): ?> 
                    <li>
                        <a href="<?php echo e(route('frontend.products.single', $product->slug)); ?>"><?php echo e(__('Add to Wish List')); ?> <i class="lar la-heart icon"></i></a>
                    </li>
                    <?php else: ?>
                    <li>
                        <a href="#" data-attributes="<?php echo e($product->attributes); ?>" data-id="<?php echo e($product->id); ?>" class="add_to_wishlist_ajax"><?php echo e(__('Add to Wish List')); ?> <i class="lar la-heart icon"></i></a>
                    </li>
                    <?php endif; ?>

                    <li>
                        <a href="#" data-id="<?php echo e($product->id); ?>" class="add_to_compare_ajax"><?php echo e(__('Compare')); ?> <i class="las la-retweet icon"></i></a></li>

                    <?php if($attributes && count($attributes)): ?>
                        <li>
                            <a href="<?php echo e(route('frontend.products.single', $product->slug)); ?>"><?php echo e(__('View Options')); ?> <i class="las la-eye"></i></a></li>
                    <?php else: ?>
                        <li>
                            <a href="#" data-attributes="<?php echo e($product->attributes); ?>" data-id="<?php echo e($product->id); ?>" class="add_to_cart_ajax"><?php echo e(__('Add to Cart')); ?> <i class="las la-shopping-cart icon"></i></a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>

        <div class="product-details-wrap">
            <h3 class="product-title"><a href="<?php echo e(route('frontend.products.single', $product->slug)); ?>"><?php echo e(Str::limit(html_entity_decode($product->title), 23)); ?></a></h3>
            <div class="product-price-details">
                <ul class="list">
                    <li class="price"><?php echo e(float_amount_with_currency_symbol($sale_price)); ?></li>
                    <?php if(!empty($deleted_price) && $deleted_price != 0): ?>
                    <li class="price"><del><?php echo e(float_amount_with_currency_symbol($deleted_price)); ?></del></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>

        <?php if(isset($isCampaign) && $isCampaign): ?>
            <div class="campaign-progress-wrap">
                <div class="d-flex justify-content-between">
                    <small class="left"><b><?php echo e(__('Sold ') . $campaignItemInfo['sold_count']); ?></b></small>
                    <small class="right"><b><?php echo e(__('Total ') . $campaignItemInfo['in_stock_count']); ?></b></small>
                </div>
                <div class="progress campaign_item_progress">
                    <div class="progress-bar" role="progressbar" style="width: <?php echo e($percentage); ?>%;" aria-valuenow="<?php echo e($percentage); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>

            <?php if($campaignProductEndDate): ?>
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.frontend.product.campaign-countdown','data' => ['countdownTime' => $campaignProductEndDate]]); ?>
<?php $component->withName('frontend.product.campaign-countdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['countdownTime' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($campaignProductEndDate)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH /home/bytesed/public_html/laravel/zaika/@core/resources/views/components/frontend/product/product-card.blade.php ENDPATH**/ ?>