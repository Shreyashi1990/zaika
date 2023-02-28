<div class="user-select-option">
    <?php if($product->attributes && $product->attributes != 'null'): ?>
        <?php $product_attributes = decodeProductAttributesOld($product->attributes); ?>
        <?php $__currentLoopData = $product_attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="size section attribute_row">
            <span class="name"><?php echo e($attribute['name']); ?></span>
            <div class="checkbox-color ">
                <?php $__currentLoopData = $attribute['terms']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $term["attribute_image"] = get_attachment_image_by_id($term["attribute_image"])["img_url"] ?? null;
                    ?>
                <div class="single-checkbox-wrap attribute">
                    <label>
                        <input type="radio" name="attr_<?php echo e($attribute['name']); ?>" data-attr="<?php echo e(json_encode($term)); ?>" class="quickViewCheckbox">
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
            <button class="btn btn-sm clear-quick-view-attributes" style="display: none">Clear</button>
        </div>
    <?php endif; ?>
</div>
<div class="d-flex add_to_cart_info">
    <div class="input-group">
        <input class="quantity form-control" type="number" min="1" max="10000000" value="1">
    </div>
    <div class="add-cart-btn">
        <a href="#" data-id="<?php echo e($product->id); ?>" class="add-to-cart modal_add_to_cart"><?php echo e(__('add to cart')); ?></a>
    </div>
    <div class="add-cart-btn">
        <a href="#" data-id="<?php echo e($product->id); ?>" class="add-to-cart buy_now ml-1"><?php echo e(__('Buy Now')); ?></a>
    </div>
</div>
<?php /**PATH /home/bytesed/public_html/laravel/zaika/@core/resources/views/frontend/partials/product-attributes.blade.php ENDPATH**/ ?>