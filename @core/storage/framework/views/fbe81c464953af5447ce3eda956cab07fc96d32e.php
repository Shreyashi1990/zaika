<h4 class="title">
    <?php echo filter_static_option_value('order_summary_title', $setting_text, __('your order')); ?>

</h4>
<div class="sum-bar"></div>
<?php $__currentLoopData = $all_cart_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php $product = $products->find($key); ?>
    <?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $item_attributes = '';
            if ($cart_item['attributes']) {
                $item_attributes .= ' (';
                $attribute_count = 0;
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
        <div class="cost-name-amount">
            <span class="same sub"><?php echo e($product->title . $item_attributes); ?>

                <span class="details"><?php echo e($cart_item['quantity']); ?> <?php echo e(__('PCS')); ?> *
                    <?php echo e(float_amount_with_currency_symbol($price)); ?></span>
            </span>
            <span
                class="same sub-amount"><?php echo e(float_amount_with_currency_symbol($price * $cart_item['quantity'])); ?></span>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<div class="sum-bar"></div>
<div class="cost-name-amount sub-total-wrap">
    <span class="total"><?php echo filter_static_option_value('subtotal_text', $setting_text, __('sub total')); ?>:</span>
    <span class="total-amount" id="subtotal" data-amount="<?php echo e($subtotal); ?>"><?php echo e(float_amount_with_currency_symbol($subtotal)); ?></span>
</div>
<div class="sum-bar"></div>
<?php
    $default_shipping_cost_amount = isset($default_shipping) && $default_shipping->id ? $default_shipping_cost : 0;
?>
<div class="cost-name-amount sub-total-wrap shipping-container">
    <div class="shipping-option-container">
        <?php if(isset($default_shipping) && $default_shipping->id): ?>
        <div class="cost-name-amount all-shipping-options">
            <span class="same sub">
                <input type="radio" class="mr-2 mt-1 d-inline-block shipping-option" 
                        name="display_shipping_option"
                        data-minimum-amt="<?php echo e(optional($default_shipping->availableOptions)->minimum_order_amount ?? 0); ?>"
                        data-amount="<?php echo e(optional($default_shipping->availableOptions)->cost ?? 0); ?>"
                        value="<?php echo e($default_shipping->id); ?>"
                        <?php if($default_shipping->id): ?> checked <?php endif; ?>
                >
                    <?php echo e($default_shipping->name); ?>


                <?php if(optional($default_shipping->availableOptions)->minimum_order_amount ?? 0): ?>
                    <small class="min-order-text"><?php echo e(__("Minimum order amount: ")); ?>

                        <?php echo e(optional($default_shipping->availableOptions)->minimum_order_amount ?? 0); ?>


                        <?php if(optional($default_shipping->availableOptions)->setting_preset == 'min_order_and_coupon'): ?>
                            <?php echo e(__("And coupon needed.")); ?>

                        <?php elseif(optional($default_shipping->availableOptions)->setting_preset == 'min_order_or_coupon'): ?>
                            <?php echo e(__("Or coupon needed.")); ?>

                        <?php endif; ?>
                    </small>
                <?php endif; ?>
            </span>
            <span class="same sub-amount"><?php echo e(float_amount_with_currency_symbol(optional($default_shipping->availableOptions)->cost ?? 0)); ?></span>
        </div>
        <?php endif; ?>
    </div>
    <div class="shipping-cost">
        <span class="total shipping"><?php echo filter_static_option_value('shipping_text', $setting_text, __('shipping')); ?>:</span>
        <span class="total-amount" id="shipping_charge"><?php echo e(float_amount_with_currency_symbol($default_shipping_cost)); ?></span>
    </div>
</div>
<div class="sum-bar"></div>
<div class="cost-name-amount sub-total-wrap">
    <span class="total vat"><?php echo filter_static_option_value('vat_text', $setting_text, __('vat')); ?>:</span>
    <span class="total-amount">(+)<span id="tax_amount" data-tax-percentage="<?php echo e($tax_percentage); ?>"><?php echo e(float_amount_with_currency_symbol($tax)); ?></span></span>
</div>
<div id="discount_summery" style="display: none">
    <div class="sum-bar"></div>
    <div class="cost-name-amount sub-total-wrap">
        <span class="total discount"><?php echo filter_static_option_value('discount_text', $setting_text, __('discount')); ?> 
        <span class="ex"><?php echo filter_static_option_value('coupon_text', $setting_text, __('coupon')); ?></span></span>
        <strong>
            (-)<span class="total-amount" id="coupon_amount">
                <?php echo e(float_amount_with_currency_symbol($coupon_amount)); ?>

            </span>
        </strong>
    </div>
</div>
<div class="sum-bar"></div>
<div class="cost-name-amount total-wrap">
    <span class="total"> <?php echo filter_static_option_value('total_text', $setting_text, __('Total')); ?>:</span>
    <span class="total-amount">
        <span class="ex"
            id="total_amount"><?php echo e(float_amount_with_currency_symbol($total)); ?></span>
    </span>
</div>
<div class="sum-bar"></div>
<?php /**PATH /home/bytesed/public_html/laravel/zaika/@core/resources/views/frontend/cart/checkout-partial.blade.php ENDPATH**/ ?>