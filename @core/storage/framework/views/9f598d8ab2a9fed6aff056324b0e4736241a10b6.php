
<ul class="sub-menu mega-menu-inner multi">
    <?php $__currentLoopData = $mega_menu_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $products = \App\Product\Product::whereJsonContains('sub_category_id', "$item->id")->inRandomOrder()->take(2)->get();
        ?>
        <?php if(!empty($products->count())): ?>
            <li class="mega-menu-single-section">
                <ul class="mega-menu-main">
                    <li>
                        <a href="<?php echo e(route("frontend.products.subcategory",["id" => $item->id,"title" => Str::slug($item->title)])); ?>">
                            <h5 class="menu-title font-weight-bold"><?php echo e(html_entity_decode($item->title)); ?></h5>
                        </a>
                        <hr class="mt-1">
                    </li>
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $campaign_product = !is_null($product->campaignProduct) ? $product->campaignProduct : getCampaignProductById($product->id);
                            $sale_price = $campaign_product ? optional($campaign_product)->campaign_price : $product->sale_price;
                            $deleted_price = !is_null($campaign_product) ? $product->sale_price : $product->price;
                            $campaign_percentage = !is_null($campaign_product) ? getPercentage($product->sale_price, $sale_price) : false;
                        ?>
                        <li>
                            <div class="category-menu-product-wrap">
                                <div class="left-side">
                                    <?php echo render_image_markup_by_attachment_id($product->image,'','thumb'); ?>

                                    <?php if(!empty($campaign_percentage)): ?>
                                        <span class="badge badge-danger left-side-badge"><?php echo e($campaign_percentage); ?>%</span>
                                    <?php endif; ?>
                                </div>
                                <div class="right-side">
                                    <h5 class="product-title">
                                        <a href="<?php echo e(route('frontend.products.single', $product->slug)); ?>" class="title-text">
                                            <?php echo html_entity_decode($product->title); ?></a>
                                    </h5>
                                    <div class="price-block mt-0">
                                        <span class="sale-price"><?php echo e(float_amount_with_currency_symbol($sale_price)); ?></span>
                                        <span class="deleted-price"><?php echo e(float_amount_with_currency_symbol($deleted_price)); ?></span>
                                    </div>
                                </div>
                            </div>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </li>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<?php /**PATH /home/bytesed/public_html/laravel/zaika/@core/app/Providers/../MenuBuilder/CategoryMenu/views/style_one_category_menu.blade.php ENDPATH**/ ?>