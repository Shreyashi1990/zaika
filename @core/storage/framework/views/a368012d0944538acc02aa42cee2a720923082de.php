<div id="top_cart_item_box">
    <?php $__currentLoopData = $all_cart_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php $product = $products->find($key); ?>
        <?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $item_attributes = '';
            $attribute_count = 0;
            if ($cart_item['attributes']) {
                $item_attributes .= ' (';
                foreach ($cart_item['attributes'] as $key => $attribute) {
                    if ($key != 'price') {
                        $item_attributes .= $attribute . ', ';
                        $attribute_count += 1;
                    }
                }
                $item_attributes = $attribute_count ? substr($item_attributes, 0, -2) . ')' : '';
            }
            $price = $cart_item['attributes']['price'] ?? $product->sale_price;
        ?>
        <div class="single-row">
            <div class="img-box">
                <?php echo render_image_markup_by_attachment_id($product->image, '', 'grid'); ?>

            </div>
            <div class="disc">
                <a href="<?php echo e(route('frontend.products.single', $product->slug)); ?>">
                    <span class="info"><?php echo e($product->title); ?></span>
                </a>
            </div>
            <div class="quant">
                <span class="quant-num"><?php echo e($cart_item['quantity']); ?></span>
            </div>
            <div class="price-box">
                <span class="price">
                    <?php echo e(float_amount_with_currency_symbol($price)); ?>

                </span>
                <?php if(!empty($product->price) && $product->price != 0): ?>
                <span class="price">
                    <del><?php echo e(float_amount_with_currency_symbol($product->price)); ?></del>
                </span>
                <?php endif; ?>
            </div>
            <div class="remove-box">
                <a href="#" class="remove_cart_item" data-id="<?php echo e($cart_item['id']); ?>" data-attr="<?php echo e(json_encode($cart_item['attributes'])); ?>">
                    <i class="las la-trash"></i>
                </a>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<div class="total-pricing">
    <div class="total">
        <span class="total"><?php echo e(__('SUB TOTAL:')); ?></span>
        <span class="amount" id="top_cart_subtotal"><?php echo e(float_amount_with_currency_symbol($subtotal)); ?></span>
    </div>
</div>
<?php /**PATH /home/bytesed/public_html/laravel/zaika/@core/resources/views/frontend/partials/mini-cart.blade.php ENDPATH**/ ?>