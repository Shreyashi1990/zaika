<?php $__env->startSection('page-title'); ?>
    <?php echo e(html_entity_decode($product->title)); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
<link rel="stylesheet" href="<?php echo e(asset('assets/common/css/font-awesome.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/magnific-popup.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php
    $product_img_url = null;
    $product_image = get_attachment_image_by_id($product->image,"full", false);
    $product_img_url = !empty($product_image) ? $product_image['img_url'] : '';
    $site_title = get_static_option('site_title');
?>
<?php $__env->startSection('page-meta-data'); ?>
<meta property="og:title" content="<?php echo e($product->title); ?>" />
<meta property="og:url" content="<?php echo e(url()->current()); ?>" />
<meta property="og:description" content="<?php echo e($product->summary); ?>" />
<meta property="og:image" content="<?php echo e($product_img_url); ?>" />
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="<?php echo e('@'.$site_title); ?>">
<meta name="twitter:title" content="<?php echo e($product->title); ?>">
<meta name="twitter:description" content="<?php echo e($product->summary); ?>">
<meta name="twitter:creator" content="<?php echo e('@'.$site_title); ?>">
<meta name="twitter:image" content="<?php echo e($product_img_url); ?>">
<meta name="twitter:domain" content="<?php echo e(url()->current()); ?>">


<?php $__env->stopSection(); ?> 
<?php $__env->startSection('content'); ?>

    <input id="product-image" type="hidden" value="<?php echo e(get_attachment_image_by_id($product->image)["img_url"] ?? null); ?>">

<div class="shop-details-area-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="product-view-wrap">
                    <div class="shop-details-gallery-slider" id="myTabContent">
                        <div class="single-main-image">
                            <?php if(!empty($product->badge)): ?>
                                <span class="sale"><?php echo e($product->badge); ?></span>
                            <?php endif; ?>
                            <a href="<?php echo e(get_image_url($product->image)); ?>" class="long-img magnific" data-key="1">
                                <i class="las la-search-plus"></i>
                            </a>

                            <?php echo render_image_markup_by_attachment_id($product->image, 'img-fluid', 'thumbnail'); ?>

                        </div>
                        <?php
                            $product_image_gallery = $product->product_image_gallery && $product->product_image_gallery != 'null'
                                                        ? json_decode($product->product_image_gallery, true)
                                                        : [];
                        ?>
                        <?php if($product_image_gallery && count($product_image_gallery)): ?>
                            <?php $__currentLoopData = $product_image_gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery_image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="single-main-image">
                                <?php if(!empty($product->badge)): ?>
                                    <span class="sale"><?php echo e($product->badge); ?></span>
                                <?php endif; ?>
                                <a href="<?php echo e(optional(get_attachment_image_by_id($gallery_image, 'full'))['img_url']); ?>" class="long-img magnific" data-key="<?php echo e($loop->iteration + 1); ?>">
                                    <i class="las la-search-plus"></i>
                                </a>

                                <?php echo render_image_markup_by_attachment_id($gallery_image, 'img-fluid', 'thumbnail'); ?>

                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>

                    <div class="thumb-wrap">
                        <ul class="shop-details-gallery-nav">
                            <li class="single-thumb">
                                <a class="thumb-link" aria-selected="true">
                                    <?php echo render_image_markup_by_attachment_id($product->image, '', 'thumbnail'); ?>

                                </a>
                            </li>
                            <?php if($product_image_gallery && count($product_image_gallery)): ?>
                                <?php $__currentLoopData = $product_image_gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery_image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="single-thumb">
                                    <a class="thumb-link"  aria-selected="true">
                                        <?php echo render_image_markup_by_attachment_id($gallery_image, '', 'thumbnail'); ?>

                                    </a>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.msg.flash','data' => []]); ?>
<?php $component->withName('msg.flash'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.msg.error','data' => []]); ?>
<?php $component->withName('msg.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <div class="product-summery">
                    <?php if($avg_rating): ?>
                    <div class="rating-wrap">
                        <div class="ratings">
                            <?php for($i = 0; $i < $avg_rating; $i++): ?>
                                <i class="las la-star icon"></i>
                            <?php endfor; ?>
                            <?php for($i = $avg_rating; $i < 5; $i++): ?>
                                <i class="lar la-star icon"></i>
                            <?php endfor; ?>
                        </div>
                        <p class="total-ratings">(<?php echo e($ratings->count() .' '. __('Customer Review')); ?>)</p>
                    </div>
                    <?php endif; ?>
                    <?php
                    $campaign_product = getCampaignProductById($product->id);
                    $sale_price = $campaign_product ? $campaign_product->campaign_price : $product->sale_price;
                    $deleted_price = $campaign_product ? $product->sale_price : $product->price;
                    $campaign_percentage = $campaign_product ? getPercentage($product->sale_price, $sale_price) : false;
                    ?>
                    <div class="price-wrap">
                        <span class="price" data-main-price="<?php echo e($sale_price); ?>" id="price"><?php echo e(float_amount_with_currency_symbol($sale_price)); ?></span>
                        <?php if(!empty($deleted_price) && $deleted_price != 0): ?>
                        <del class="del-price"><?php echo e(float_amount_with_currency_symbol($deleted_price)); ?></del>
                        <?php endif; ?>
                        <?php if($campaign_percentage): ?>
                            <span class="discount-tag">-<?php echo e(round($campaign_percentage, 2)); ?>%</span>
                        <?php endif; ?>
                    </div>
                    <div class="short-description">
                        <p class="info"><?php echo e($product->summary); ?></p>
                    </div>

                    <div class="user-select-option">
                        <?php if($product->attributes && $product->attributes != 'null'): ?>
                            <?php $product_attributes = decodeProductAttributes($product->attributes); ?>
                            <?php $__currentLoopData = $product_attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="size section attribute_row">
                                <span class="name"><?php echo e($attribute['name']); ?></span>
                                <div class="checkbox-color ">
                                    <?php $__currentLoopData = $attribute['terms']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="single-checkbox-wrap attribute">
                                            <label>
                                                <input type="radio" name="attr_<?php echo e($attribute['name']); ?>" data-attr="<?php echo e(json_encode($term)); ?>" data-attr-image="<?php echo e(isset($term['attribute_image']) ? get_image_url($term['attribute_image']) : ''); ?>" class="checkbox">
                                                <span data-name="<?php echo e($attribute['name']); ?>" data-extra="<?php echo e($term['additional_price']); ?>" class="size-code">
                                                    <?php echo e($term['name']); ?> <?php if(isset($term['additional_price']) && $term['additional_price'] > 0): ?> (+<?php echo e(float_amount_with_currency_symbol($term['additional_price'])); ?>) <?php endif; ?>
                                                </span>
                                            </label>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <div class="size section attribute_row my-4">
                                <button class="btn btn-sm clear-attributes">Clear</button>
                            </div>
                        <?php endif; ?>

                        <?php
                            $item_in_stock = optional($product->inventory)->stock_count;
                        ?>
                        <div class="product_related_info mt-5">
                            <?php if($item_in_stock): ?>
                                <?php $item_stock_count = $item_in_stock ?? 0; ?>
                                <div class="text-success"><span>(<?php echo e($item_stock_count.') '.Str::of('item')->plural($item_stock_count). ' ' . __('available in stock')); ?></span></div>
                            <?php else: ?>
                                <div class="text-secondary text-danger"><span>(<?php echo e(__('Item is not available in stock')); ?>)</span></div>
                            <?php endif; ?>
                        </div>

                        <div class="quantity-add-cart add_to_cart_info mt-4">
                            <?php if($item_in_stock): ?>
                                <div class="quantity">
                                    <div class="input-group w-200 d-flex justify-content-between">
                                        <button class="prd-quantity-btn btn btn-outline-info" data-button-type="minus"><i class="las la-minus"></i></button>
                                        <input class="form-control quantity" id="quantity" type="number" min="1" max="10000000" value="1">
                                        <button class="prd-quantity-btn btn btn-outline-info" data-button-type="plus"><i class="las la-plus"></i></button>
                                    </div>
                                </div>
                                <div class="cart-option mt-4">
                                    <a href="#" data-id="<?php echo e($product->id); ?>" class="cart add_to_cart"><?php echo e(__('add to cart')); ?></a>
                                    <a href="#" data-id="<?php echo e($product->id); ?>" class="cart add_to_wishlist"><?php echo e(__('wishlist')); ?></a>
                                    <a href="#" data-id="<?php echo e($product->id); ?>" class="cart add_to_compare_ajax"><?php echo e(__('Compare')); ?></a>
                                    <a href="#" data-id="<?php echo e($product->id); ?>" class="cart buy_now"><?php echo e(__('Buy Now')); ?></a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>


                    <div class="product-attr-container mt-4">
                        <?php if($product->category && $product->category->id): ?>
                            <div class="product-attr">
                                <?php echo e(__('Category: ')); ?>

                                <a href="<?php echo e(route('frontend.products.category', [
                                    'id' => optional($product->category)->id,
                                    'slug' => \Str::slug(optional($product->category)->title ?? '')
                                ])); ?>">
                                    <?php echo e(optional($product->category)->title); ?>

                                </a>
                            </div>
                        <?php endif; ?>

                        <?php $all_subcategory_arr = getAllProductSubcategory($product); ?>
                        <?php if($all_subcategory_arr && count($all_subcategory_arr)): ?>
                            <div class="product-attr">
                                <?php echo e(__('Subcategory: ')); ?>

                                <?php $__currentLoopData = $all_subcategory_arr; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $seperator = $key != count($all_subcategory_arr) - 1 ? ',' : '';
                                    ?>
                                    <a href="<?php echo e($subcategory['url'] ?? ''); ?>"><?php echo e($subcategory['name'] . $seperator); ?></a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php endif; ?>

                        <?php if($product->inventory): ?>
                            <div class="product-attr">
                                <?php echo e(__('SKU: ')); ?><?php echo e(optional($product->inventory)->sku); ?>

                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="social-link mt-4">
                        <ul class="list">
                            <?php echo single_post_share(route('frontend.products.single', purify_html($product->slug)), purify_html($product->title), $product_img_url); ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="product-details-tab">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                                role="tab" aria-controls="pills-home" aria-selected="true"><?php echo e(__('Description')); ?></a>
                        </li>
                        <?php if($product->additionalInfo && $product->additionalInfo->count()): ?>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                                role="tab" aria-controls="pills-profile" aria-selected="false"><?php echo e(__('Additional Information')); ?></a>
                        </li>
                        <?php endif; ?>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact"
                                role="tab" aria-controls="pills-contact" aria-selected="false"><?php echo e(__('Reviews')); ?></a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab">
                            <div class="description">
                                <h4 class="title"><?php echo e(__('Description')); ?> </h4>
                                <?php echo $product->description; ?>

                            </div>
                        </div>
                        <?php if($product->additionalInfo && $product->additionalInfo->count()): ?>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                            aria-labelledby="pills-profile-tab">
                            <div class="aditional-info">
                                <h4 class="title"><?php echo e(__('Additional Information')); ?></h4>
                                <div class="table-wrap">
                                    <table class="add-info">
                                        <tbody>
                                            <?php $__currentLoopData = $product->additionalInfo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $additionalInfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                            <tr>
                                                <th><?php echo e(optional($additionalInfo)->title); ?></th>
                                                <td>
                                                    <p><?php echo e(optional($additionalInfo)->text); ?></p>
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                            aria-labelledby="pills-contact-tab">
                            <!-- feedback area start -->
                            <div class="feedback-section">
                                <?php if($user_has_item): ?>
                                <div class="feedback">
                                    <h4 class="feedback-title"><?php echo e(__('Leave a review')); ?></h4>
                                    <form method="POST" action="<?php echo e(route('frontend.products.ratings.store')); ?>">
                                        <?php echo csrf_field(); ?>
                                        <div class="form-group">
                                            <label><?php echo e(__('Ratings')); ?></label>
                                            <input type="number" name="rating" class="rating text-warning" />
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="id" value="<?php echo e($product->id); ?>">
                                            <label for="comment"><?php echo e(__('Your review')); ?>&nbsp;
                                                <span class="required">*</span>
                                            </label>
                                            <textarea class="form-control" name="comment" id="comment" required></textarea>
                                        </div>
                                        <button type="submit" class="default-btn"><?php echo e(__('Submit')); ?></button>
                                    </form>
                                </div>
                                <?php endif; ?>
                                <div class="feedback">
                                    <h4 class="feedback-title"><?php echo e(__('Customer Review')); ?></h4>
                                    <?php if(!auth()->check()): ?>
                                    <div class="row">
                                        <div class="col-sm-6 ">
                                            <form action="<?php echo e(route('user.login')); ?>" method="post" class="register-form" id="login_form_order_page">
                                                <?php echo csrf_field(); ?>
                                                <div class="error-wrap"></div>
                                                <div class="row">
                                                    <div class="form-group col-12">
                                                        <label for="login_email"><?php echo e(__('Username')); ?>

                                                        <span class="ex">*</span></label>
                                                        <input class="form-control" type="text" name="username" id="login_email" required />
                                                    </div>
                                                    <div class="form-group col-12">
                                                        <label for="login_password"><?php echo e(__('Password')); ?><span class="ex">*</span></label>
                                                        <input class="form-control" type="password" name="password" id="login_password" required />
                                                    </div>
                                                    <div class="form-group form-check col-12">
                                                        <input type="checkbox" name="remember" class="form-check-input" id="login_remember">
                                                        <label class="form-check-label" for="remember"><?php echo e(__('Remember me')); ?> </label>
                                                    </div>
                                                </div>
                                                <div class="btn-pair">
                                                    <div class="btn-wrapper">
                                                        <button type="button" class="default-btn" id="login_btn"><?php echo e(__('SIGN IN')); ?></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    <div class="client-feedback">
                                        <ul class="client-feedbck-list">
                                            <?php $__empty_1 = true; $__currentLoopData = $ratings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rating): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <li class="single-feedback mb-5">
                                                <h5 class="client-name"><?php echo e(optional($rating->user)->name); ?></h5>
                                                <p class="publish-date"> <?php echo e(optional($rating->created_at)->format('D m, Y')); ?></p>
                                                <div class="rating-box">
                                                    <a href="#">
                                                        <?php for($i = 0; $i < $rating->rating; $i++): ?>
                                                        <i class="las la-star"></i>
                                                        <?php endfor; ?>
                                                    </a>
                                                </div>
                                                <p class="comment"><?php echo e($rating->review_msg); ?></p>
                                            </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <h4 class="text-secondary"><?php echo e(__('No rating to show yet, Login to leave ratings')); ?></h4>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- feedback area end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- shop details area start -->

<!-- related item area start -->
<div class="related-item-area-wrapper new-collection-area-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="section-title-wrapper">
                    <h2 class="main-title"><?php echo e(__('Related')); ?> <span class="ex"><?php echo e(__('item')); ?></span></h2>
                </div>
            </div>
        </div>
        <div class="row related-item-slider-main-full">
            <?php $__empty_1 = true; $__currentLoopData = $related_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="col-lg-12">
                <?php
                    $attributes = $product->attributes ? json_decode($product->attributes, true) : null;
                ?>
                <div class="single-new-collection-item single-product-item">
                    <div class="product-img-box">
                        <a href="<?php echo e(route('frontend.products.single', $product->slug)); ?>">
                            <?php echo render_image_markup_by_attachment_id($product->image, '', 'grid'); ?>

                        </a>
                        <div class="hover">
                            <ul class="list">
                                <li><a href="#" id="quickview" class="quick-view" <?php echo getQuickViewDataMarkup($product); ?>><?php echo e(__('Quickview')); ?> <i class="lar la-eye icon"></i></a></li>
                                <?php if($attributes && count($attributes)): ?> 
                                <li><a href="<?php echo e(route('frontend.products.single', $product->slug)); ?>"><?php echo e(__('Add to Wish List')); ?> <i class="lar la-heart icon"></i></a></li>
                                <?php else: ?>
                                <li><a href="#" data-attributes="<?php echo e($product->attributes); ?>" data-id="<?php echo e($product->id); ?>" class="add_to_wishlist_ajax"><?php echo e(__('Add to Wish List')); ?> <i class="lar la-heart icon"></i></a></li>
                                <?php endif; ?>
                                <li><a href="#" data-id="<?php echo e($product->id); ?>" class="add_to_compare_ajax"><?php echo e(__('Compare')); ?> <i class="las la-retweet icon"></i></a></li>
                                <?php if($attributes && count($attributes)): ?>
                                <li><a href="<?php echo e(route('frontend.products.single', $product->slug)); ?>"><?php echo e(__('View Options')); ?> <i class="las la-eye"></i></a></li>
                                <?php else: ?>
                                <li><a href="#" data-attributes="<?php echo e($product->attributes); ?>" data-id="<?php echo e($product->id); ?>" class="add_to_cart_ajax"><?php echo e(__('Add to Cart')); ?> <i class="las la-shopping-cart icon"></i></a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="product-details-wrap">
                        <h3 class="product-title"><a href="<?php echo e(route('frontend.products.single', $product->slug)); ?>"><?php echo e(Str::limit(html_entity_decode($product->title), 23)); ?></a></h3>
                        <div class="product-price-details">
                            <?php
                            $campaign_product = getCampaignProductById($product->id);
                            $related_sale_price = $campaign_product ? $campaign_product->campaign_price : $product->sale_price;
                            $related_deleted_price = $campaign_product ? $product->sale_price : $product->price;
                            ?>
                            <ul class="list">
                                <li class="price"><?php echo e(float_amount_with_currency_symbol($related_sale_price)); ?></li>
                                <?php if(!empty($related_deleted_price) && $related_deleted_price != 0): ?>
                                <li class="price"><del><?php echo e(float_amount_with_currency_symbol($related_deleted_price)); ?></del></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-lg-12">
                <div class="text-center"><?php echo e(__('No Related Products')); ?></div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(asset('assets/frontend/js/bootstrap4-rating-input.js')); ?>"></script>
<script src="<?php echo e(asset('assets/frontend/js/jquery.magnific-popup.min.js')); ?>"></script>
<script>
(function ($) {
    'use script'
    let site_currency_symbol = '<?php echo e(site_currency_symbol()); ?>';

    showAndHideClearButton($(".checkbox:checked").length);

    $(document).on("click",".clear-attributes",function (){
        $(".checkbox").removeAttr("checked");
        $("#price").text(site_currency_symbol + parseFloat($("#price").data("main-price")).toFixed(2));

        let old_image = $("#product-image").val();
        $(".attribute_img").attr("src",old_image);

        showAndHideClearButton($(".checkbox:checked").length);
    })

    $(document).on("click",".checkbox",function (){
        showAndHideClearButton($(".checkbox:checked").length);
    });

    // this function will show and hide clear button
    function showAndHideClearButton(length,where = $(".clear-attributes")){
        if(length < 1){
            where.fadeOut();
        }else{
            where.fadeIn();
        }
    }

    $(document).on("click",".prd-quantity-btn",function (){
        if($(this).data("button-type") === "minus"){
            updateQuantity($("#quantity").val(),$(this).data("button-type"));
        }else if($(this).data("button-type") === "plus"){
            updateQuantity($("#quantity").val(),$(this).data("button-type"));
        }
    });

    function updateQuantity(val,type){
        // plus button will add one to previous value
        if(type == "plus"){
            $("#quantity").val(parseInt(val) + 1);
        }else if(type == "minus"){
            if(parseInt(val) > 1){
                $("#quantity").val(parseInt(val) - 1);
            }else{
                $("#quantity").val(1);
            }
        }

    }

    $(document).ready(function() {
        $('.magnific').magnificPopup({type:'image'});

        $('.add_to_cart').on('click', function (e) {
            e.preventDefault();

            let product_id = $(this).data('id');
            let quantity = Number($('#quantity').val().trim());
            let price = $('#price').text().split(site_currency_symbol)[1];
            let attributes = {};

            // get attributes
            let rendered_attributes = $('.attribute_row');
            for (let i = 0; i < rendered_attributes.length; i++) {
                let name = $(rendered_attributes[i]).find('.name').text();
                let selected_attribute = $(rendered_attributes[i]).find('input.checkbox:checked').next().text();
                attributes[name] = selected_attribute;
            }

            attributes['price'] = price;

            let selected_attributes_arr = [];
            let all_selected_attributes = $('.attribute_row input.checkbox:checked');
            all_selected_attributes.map(function (k, v) {
                selected_attributes_arr.push($(v).data('attr'));
            });

            if (attributeSelected(attributes)) {
                $.ajax({
                    url: '<?php echo e(route("frontend.products.add.to.cart.ajax")); ?>',
                    type: 'POST',
                    data: {
                        product_id: product_id,
                        quantity: quantity,
                        product_attributes: selected_attributes_arr,
                        _token: '<?php echo e(csrf_token()); ?>'
                    },
                    success: function (data) {
                        toastr.success(data.msg);
                        if (data.quantity_msg) {
                            toastr.warning(data.quantity_msg)
                        }
                        refreshShippingDropdown();
                    },
                    erorr: function (err) {
                        toastr.error('<?php echo e(__("An error occurred")); ?>');
                    }
                });
            } else {
                toastr.error('<?php echo e(__("Select all attribute to proceed")); ?>');
            }
        });

        $('.add_to_wishlist').on('click', function (e) {
            e.preventDefault();
            let product_id = $(this).data('id');
            let quantity = Number($('#quantity').val().trim());
            let price = $('#price').text().split('$')[1];
            let attributes = {};

            // get attributes
            let rendered_attributes = $('.attribute_row');
            for (let i = 0; i < rendered_attributes.length; i++) {
                let name = $(rendered_attributes[i]).find('.name').text();
                let selected_attributes_arr = [];
                let selected_attribute = $(rendered_attributes[i]).find('input.checkbox:checked').next().text();
                attributes[name] = selected_attribute;
            }

            attributes['price'] = price;

            if (attributeSelected(attributes)) {
                $.ajax({
                    url: '<?php echo e(route("frontend.products.add.to.wishlist.ajax")); ?>',
                    type: 'POST',
                    data: {
                        product_id: product_id,
                        quantity: quantity,
                        product_attributes: attributes,
                        _token: '<?php echo e(csrf_token()); ?>'
                    },
                    success: function (data) {
                        toastr.success(data.msg);
                        refreshWishlistDropdown();
                    },
                    erorr: function (err) {
                        toastr.error('<?php echo e(__("An error occurred")); ?>');
                    }
                });
            } else {
                toastr.error('<?php echo e(__("Select an attribute to proceed")); ?>');
            }
        });

        $(document).on('click', '#login_btn', function (e) {
            var formContainer = $('#login_form_order_page');
            var el = $(this);
            var username = $('#login_form_order_page #login_email').val();
            var password = $('#login_form_order_page #login_password').val();
            var remember = $('#login_form_order_page #login_remember').val();

            el.text('<?php echo e(__("Please Wait")); ?>');

            $.ajax({
                type: 'post',
                url: "<?php echo e(route('user.ajax.login')); ?>",
                data: {
                    _token: "<?php echo e(csrf_token()); ?>",
                    username : username,
                    password : password,
                    remember : remember,
                },
                success: function (data){
                    if(data.status == 'invalid') {
                        el.text('<?php echo e(__("Login")); ?>')
                        formContainer.find('.error-wrap').html('<div class="alert alert-danger">'+data.msg+'</div>');
                    } else {
                        formContainer.find('.error-wrap').html('');
                        el.text('<?php echo e(__("Login Success.. Redirecting ..")); ?>');
                        location.reload();
                    }
                },
                error: function (data) {
                    var response = data.responseJSON.errors;
                    formContainer.find('.error-wrap').html('<ul class="alert alert-danger"></ul>');
                    $.each(response,function (value,index){
                        formContainer.find('.error-wrap ul').append('<li>'+index+'</li>');
                    });
                    el.text('<?php echo e(__("Login")); ?>');
                }
            });
        });
    });

    function refreshShippingDropdown() {
        $.ajax({
            url: '<?php echo e(route("frontend.products.cart.info.ajax")); ?>',
            type: 'GET',
            success: function (data) {
                $('#cart_badge').text(data.item_total);
                $('#top_minicart_container').html(data.cart);
            },
            erorr: function (err) {
                toastr.error('<?php echo e(__("An error occurred")); ?>');
            }
        });
    }

    function refreshWishlistDropdown() {
        // sync changes in details page
        $.ajax({
            url: '<?php echo e(route("frontend.products.wishlist.total")); ?>',
            type: 'GET',
            success: function (data) {
                $('#wishlist_badge').text(data.total);
            },
            erorr: function (err) {
                toastr.error('<?php echo e(__("An error occurred")); ?>');
            }
        });
    }
})(jQuery)
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bytesed/public_html/laravel/zaika/@core/resources/views/frontend/product/details.blade.php ENDPATH**/ ?>