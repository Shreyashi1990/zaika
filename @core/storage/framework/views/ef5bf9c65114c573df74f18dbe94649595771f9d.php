<div class="cart-area-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php if(isset($quantity_msg) && is_array($quantity_msg)): ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-center">
                                <?php $__currentLoopData = $quantity_msg; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $messege): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="alert alert-warning"><?php echo $messege; ?></div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="cart-box">
                    <table>
                        <thead>
                            <tr>
                                <th><?php echo e(__('product name')); ?></th>
                                <th><?php echo e(__('unit price')); ?></th>
                                <th><?php echo e(__('quantity')); ?></th>
                                <th><?php echo e(__('total')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $all_cart_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $product = $products->find($key);
                                ?>
                                <?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $item_attributes = '';
                                    $attribute_count = 0;
                                    if ($cart_item['attributes']) {
                                        $item_attributes .= ' (';
                                        foreach ($cart_item['attributes'] as $key => $attribute) {
                                            if ($key != 'price' && $key != 'user_id') {
                                                $item_attributes .= $attribute . ', ';
                                                $attribute_count += 1;
                                            }
                                        }
                                        $item_attributes = $attribute_count ? substr($item_attributes, 0, -2) . ')' : '';
                                    }
                                ?>
                                <tr>
                                    <td>
                                        <div class="thumb">
                                            <a href="<?php echo e(route('frontend.products.single', $product->slug)); ?>">
                                                <?php echo render_image_markup_by_attachment_id($product->image, '', 'grid'); ?>

                                            </a>
                                            <a href="<?php echo e(route('frontend.products.single', ['slug' => $product->slug])); ?>" class="product-name"><?php echo e($product->title . $item_attributes); ?></a>
                                        </div>
                                    </td>
                                    <?php
                                        $price = isset($cart_item['attributes']['price']) ? $cart_item['attributes']['price'] : $product->sale_price;
                                    ?>
                                    <td>
                                        <div class="price-box">
                                            <span class="price"><?php echo e(float_amount_with_currency_symbol($price)); ?></span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input class="quantity form-control item_quantity_info" type="number" min="1" max="10000000" data-id="<?php echo e($cart_item['id']); ?>" data-attr="<?php echo e(json_encode($cart_item['attributes'])); ?>" value="<?php echo e($cart_item['quantity']); ?>">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="total">
                                            <span class="price"><?php echo e(float_amount_with_currency_symbol($price * $cart_item['quantity'])); ?></span>
                                            <a href="#" class="remove_cart_item" data-id="<?php echo e($cart_item['id']); ?>" data-attr="<?php echo e(json_encode($cart_item['attributes'])); ?>">
                                                <i class="las la-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <div class="cart-btn-wrapper one">
                    <div class="left">
                        <a href="#" class="default-btn clear_cart"><?php echo e(get_static_option('clear_cart_text', __('Clear Cart'))); ?></a>
                        <a href="#" class="default-btn update_cart"><?php echo e(get_static_option('update_cart_text', __('Update cart'))); ?></a>
                    </div>
                    <div class="right">
                        <a href="<?php echo e(route('frontend.products.all')); ?>" class="default-btn"><?php echo e(get_static_option('cart_continue_shopping_text',__('Continue shopping'))); ?></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-7">
                <!-- discount coupon area -->
                <div class="discount-coupon-area">
                    <h4 class="title"><?php echo e(get_static_option('cart_coupon_discount_title', __('coupon discount'))); ?> </h4>
                    <p class="info"><?php echo e(get_static_option('cart_coupon_discount_subtitle', __('No products in your cart!'))); ?></p>
                    <form action="<?php echo e(route('frontend.products.cart.apply.coupon')); ?>" method="POST" class="discount-coupon">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <input type="text" name="coupon" id="coupon_input" class="form-control" placeholder="<?php echo e(get_static_option('cart_coupon_discount_placeholder', __('Enter your coupon code'))); ?>" value="<?php echo e(request()->coupon ?? ''); ?>">
                        </div>
                        <button type="submit"><?php echo e(get_static_option('cart_apply_coupon_text',__('apply coupon'))); ?></button>
                    </form>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="cart-total">
                    <h4 class="title"><?php echo e(get_static_option('cart_total_title',__('cart total'))); ?></h4>
                    <div class="cost-name-amount">
                        <span class="same sub"><?php echo e(get_static_option('cart_sub_total_text', __('sub total'))); ?>:</span>
                        
                        <span class="same sub-amount"><?php echo e(float_amount_with_currency_symbol($total)); ?></span>
                    </div>
                    <div class="btn-wrapper">
                        <form action="<?php echo e(route('frontend.checkout')); ?>">
                            <input type="hidden" name="coupon" class="form-control" placeholder="Enter your coupon code" value="<?php echo e(request()->coupon ?? ''); ?>">
                            <button class="default-btn"><?php echo e(get_static_option('cart_proceed_to_checkout_text',__('Proceed to checkout') )); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/bytesed/public_html/laravel/zaika/@core/resources/views/frontend/cart/cart-partial.blade.php ENDPATH**/ ?>