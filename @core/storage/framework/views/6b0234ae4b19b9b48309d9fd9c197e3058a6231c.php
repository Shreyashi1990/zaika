

<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Wishlist')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php if(empty($all_wishlist_items)): ?>
<div class="only-img-page-wrapper cart">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="img-box">
                    <?php echo render_image_markup_by_attachment_id(get_static_option('empty_wishlist_image')); ?>

                </div>
                <div class="content">
                    <p class="info"><?php echo e(get_static_option('empty_wishlist_text', __('No products added to the wishlist'))); ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php else: ?>
<div class="cart-area-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
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
                            <?php $__currentLoopData = $all_wishlist_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $product = $products->find($key);
                                ?>
                                <?php $__currentLoopData = $item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wishlist_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $item_attributes = '';
                                    if ($wishlist_item['attributes']) {
                                        $item_attributes .= ' (';
                                        foreach ($wishlist_item['attributes'] as $key => $attribute) {
                                            if ($key != 'price') {
                                                $item_attributes .= $attribute . ', ';
                                            }
                                        }
                                        $item_attributes = strlen($item_attributes) ? substr($item_attributes, 0, -2) . ')' : '';
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
                                    <td>
                                        <div class="price-box">
                                            <span class="price"><?php echo e(amount_with_currency_symbol($product->sale_price)); ?></span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input class="quantity form-control item_quantity_info" type="number" min="1" max="10000000" data-id="<?php echo e($wishlist_item['id']); ?>" data-attr="<?php echo e(json_encode($wishlist_item['attributes'])); ?>" value="<?php echo e($wishlist_item['quantity']); ?>">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="total">
                                            <span class="price"><?php echo e(amount_with_currency_symbol($product->sale_price * $wishlist_item['quantity'])); ?></span>
                                            <a href="#" class="remove_wishlist_item" data-id="<?php echo e($wishlist_item['id']); ?>" data-attr="<?php echo e(json_encode($wishlist_item['attributes'])); ?>">
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
                <div class="cart-btn-wrapper two margin-bottom-0">
                    <div class="left">
                        <a href="#" class="default-btn clear_wishlist"><?php echo e(get_static_option('clear_wishlist_text', __('Clear Wishlist'))); ?></a>
                    </div>
                    <div class="right">
                        <form action="<?php echo e(route('frontend.products.wishlist.send.to.cart')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <button class="default-btn"><?php echo e(get_static_option('send_to_cart_text', __('Add to cart all'))); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    (function ($) {
        'use script'
        $(document).ready(function () {
            $('.remove_wishlist_item').on('click', function (e) {
                e.preventDefault();
                let id = $(this).data('id');
                let attributes = $(this).data('attr');
                $.ajax({
                    url: '<?php echo e(route("frontend.products.wishlist.ajax.remove")); ?>',
                    type: 'POST',
                    data: {
                        _token: '<?php echo e(csrf_token()); ?>',
                        id: id,
                        product_attributes: attributes
                    },
                    success: function (data) {
                        if (data.type == 'success') {
                            toastr.success(data.msg);
                            setTimeout(function () {
                                location.reload();
                            }, 500);
                        }
                    },
                    error: function (err) {
                        toastr.error('<?php echo e(__("An error occurred")); ?>');
                    }
                });
            });
    
            $('.clear_wishlist').on('click', function (e) {
                e.preventDefault();
                $.ajax({
                    url: '<?php echo e(route("frontend.products.wishlist.ajax.clear")); ?>',
                    type: 'POST',
                    data: {
                        _token: '<?php echo e(csrf_token()); ?>',
                    },
                    success: function (data) {
                        if (data.type == 'success') {
                            toastr.success(data.msg);
                            setTimeout(function () {
                                location.reload();
                            }, 500);
                        }
                    },
                    error: function (err) {
                        toastr.error('<?php echo e(__("An error occurred")); ?>');
                    }
                });
            });
        });
    })(jQuery)
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bytesed/public_html/laravel/zaika/@core/resources/views/frontend/wishlist/all.blade.php ENDPATH**/ ?>