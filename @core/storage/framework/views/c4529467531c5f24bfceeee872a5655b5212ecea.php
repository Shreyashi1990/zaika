<section class="invoice-area padding-top-100 padding-bottom-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card my-5">
                    <div class="card-body p-0">
                        <div class="invoice-wrapper">
                            <div class="invoice-flex-contents mb-5">
                                <div class="invoice-logo">
                                    <?php echo render_image_markup_by_attachment_id(get_static_option('site_logo')); ?>

                                </div>
                                <div class="invoice-top">
                                    <h2 class="invoice mt-5"> <?php echo e(__('Invoice')); ?> </h2>
                                    <h6 class="small-title"> <?php echo e(__('Invoice ID')); ?> #<?php echo e($order_details->id); ?> </h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-sm-6 margin-top-40">
                                    <div class="invoice-single-contents">
                                        <h5 class="title"> <?php echo e(__('Customer')); ?> </h5>
                                        <span class="names margin-top-20"> <?php echo e($order_details->name); ?> </span>
                                        <ul class="invoice-address-list">
                                            <li class="list">
                                                <?php if($user_shipping_address): ?>
                                                    <span><b><?php echo e(__('Full Address')); ?>:</b></span> <?php echo e($user_shipping_address); ?>

                                                <?php else: ?>
                                                    <span><b><?php echo e(__('Full Address')); ?>:</b></span> <?php echo e($order_details->address); ?>

                                                <?php endif; ?>
                                            </li>
                                            <li class="list"> <span><b> <?php echo e(__('Phone')); ?>: </b></span> <a href="tel:<?php echo e($order_details->phone); ?>"> <?php echo e($order_details->phone); ?> </a> </li>
                                            <li class="list"> <span><b> <?php echo e(__('Email')); ?>: </b></span> <a href="mailto:<?php echo e($order_details->email); ?>"> <?php echo e($order_details->email); ?> </a> </li>
                                            <?php echo getInvoiceAddressInfo($order_details->zipcode, 'zipcode'); ?>

                                            <?php echo getInvoiceAddressInfo($order_details->city, 'city'); ?>

                                            <?php echo getInvoiceAddressInfo($order_details->state, 'state'); ?>

                                            <?php echo getInvoiceAddressInfo($order_details->country, 'country'); ?>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-summery margin-top-60">
                                <h3 class="common-title-three text-center my-5"> <?php echo e(__('Order Summary')); ?> </h3>
                                <div class="invoice-contents-summery border-1 margin-top-40">
                                    <ul class="invoice-summery-list borders-bottom">
                                        <li class="list">
                                            <span class="list-single list-heading"> <?php echo e(__('Description')); ?> </span>
                                            <span class="list-single list-heading"> <?php echo e(__('Cost')); ?> </span>
                                            <span class="list-single list-heading"> <?php echo e(__('QTY')); ?> </span>
                                            <span class="list-single list-heading"> </span>
                                            <span class="list-single list-heading"> <?php echo e(__('Amount')); ?> </span>
                                        </li>
                                    </ul>
                                    <ul class="invoice-summery-list borders-bottom margin-top-20">
                                        <?php
                                            $shopping_order_details = json_decode($order_details->order_details, true);
                                            $shopping_order_details = is_string($shopping_order_details) ? json_decode($shopping_order_details, true) : $shopping_order_details;
                                            $all_products = \App\Product\Product::whereIn('id', array_keys($shopping_order_details))->get();

                                            $payment_meta = json_decode($order_details->payment_meta, true);
                                        ?>
                                        <?php $__currentLoopData = $shopping_order_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                $product = $all_products->find($item['id']);
                                                if(is_null($product)){
                                                    continue;
                                                }
                                                $item_attributes = '';
                                                $attribute_count = 0;
                                                if (!empty($item['attributes'])) {
                                                    $item_attributes .= ' (';
                                                    foreach ($item['attributes'] as $key => $attribute) {
                                                        if ($key != 'price') {
                                                            $item_attributes .= $key .': '. $attribute . ', ';
                                                            $attribute_count += 1;
                                                        }
                                                    }
                                                    $item_attributes = $attribute_count ? substr($item_attributes, 0, -2) . ')' : '';
                                                }
                                                $price = optional($item['attributes'])['price'] ?? $product->sale_price;

                                            ?>
                                            <li class="list">
                                                <span class="list-single"> <?php echo e($product->title); ?> <?php echo e($item_attributes); ?></span>
                                                <span class="list-single"> <?php echo e(float_amount_with_currency_symbol($product->sale_price)); ?> </span>
                                                <span class="list-single"> <?php echo e($item['quantity']); ?> </span>
                                                <span class="list-single"> </span>
                                                <span class="list-single"> <?php echo e(float_amount_with_currency_symbol($price * $item['quantity'])); ?> </span>
                                            </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                    <div class="invoice-bottom-flex">
                                        <div class="invoice-patment-list">
                                            <div class="checkbox-inlines">
                                                <label class="checkbox-label" for="paypal4"> <?php echo e(__('Payment Gateway : ')); ?> </label>
                                                <b><?php echo e(ucwords($order_details->payment_gateway)); ?></b>
                                            </div>
                                            <?php if($order_details->transaction_id): ?>
                                            <div class="checkbox-inlines">
                                                <label class="checkbox-label" for="paypal4"> <?php echo e(__('Transaction ID : ')); ?> </label>
                                                <b><?php echo e(ucwords($order_details->transaction_id)); ?></b>
                                            </div>
                                            <?php endif; ?>
                                            <?php if($order_details->payment_status): ?>
                                            <div class="checkbox-inlines">
                                                <label class="checkbox-label" for="paypal4"> <?php echo e(__('Payment Status : ')); ?> </label>
                                                <b><?php echo e(ucwords($order_details->payment_status)); ?></b>
                                            </div>
                                            <?php endif; ?>
                                            <?php if($order_details->status): ?>
                                            <div class="checkbox-inlines">
                                                <label class="checkbox-label" for="paypal4"> <?php echo e(__('Order Status : ')); ?> </label>
                                                <b><?php echo e(ucwords($order_details->status)); ?></b>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                        <ul class="total-count-list">
                                            <li class="list">
                                                
                                                <span class="subtotal total"> <?php echo e(__('Subtotal')); ?> </span>
                                                <span class="total-amount total"> <?php echo e(float_amount_with_currency_symbol($payment_meta['subtotal'] ?? 0, false)); ?> </span>
                                            </li>
                                            
                                            <?php if(isset($payment_meta['shipping_cost']) && !empty($payment_meta['shipping_cost'])): ?>
                                            <li class="list">
                                                <span class="subtotal total"> <?php echo e(__('Shipping Cost')); ?> (+)</span>
                                                <span class="total-amount total"> <?php echo e(float_amount_with_currency_symbol($payment_meta['shipping_cost'], false)); ?> </span>
                                            </li>
                                            <?php endif; ?>
                                            <?php if(isset($payment_meta['tax_amount']) && !empty($payment_meta['tax_amount'])): ?>
                                            <li class="list">
                                                <span class="subtotal total"> <?php echo e(__('Tax Amount')); ?> (+)</span>
                                                <span class="total-amount total"> <?php echo e(float_amount_with_currency_symbol($payment_meta['tax_amount'], false)); ?> </span>
                                            </li>
                                            <?php endif; ?>
                                            <?php if(isset($payment_meta['coupon_amount']) && !empty($payment_meta['coupon_amount'])): ?>
                                            <li class="list">
                                                <span class="subtotal total"> <?php echo e(__('Coupon Discount')); ?> (-)</span>
                                                <span class="total-amount total"> <?php echo e(float_amount_with_currency_symbol($payment_meta['coupon_amount'], false)); ?> </span>
                                            </li>
                                            <?php endif; ?>
                                            <li class="list border-top">
                                                <span class="subtotal total"> <strong><?php echo e(__('Total')); ?></strong> </span>
                                                <span class="total-amount total"> <strong><?php echo e(float_amount_with_currency_symbol($payment_meta['total'], false)); ?></strong> </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH /home/bytesed/public_html/laravel/zaika/@core/resources/views/backend/products/order/invoice-partial.blade.php ENDPATH**/ ?>