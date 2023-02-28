
<?php $__env->startSection('style'); ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.datatable.css','data' => []]); ?>
<?php $component->withName('datatable.css'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <style>
        .max-width-100 {
            max-width: 100px;
        }
        .previous_attachment {
            margin-top: 20px;
            margin-bottom: 20px;
        }
        #continue_checkout_form {
            display: inline;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('My Orders')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('section'); ?>
    <div class="form-header-wrap margin-bottom-50 d-flex justify-content-between">
        <h3 class="mb-3"><?php echo e(__('Order Details')); ?></h3>
    </div>
    <div class="my-3 text-right">
        <a href="<?php echo e(route('user.product.order.all')); ?>" class="btn btn-primary px-4"><?php echo e(__('All Orders')); ?></a>
    </div>
    <div class="row">
        <div class="col-md-12">
            <ul>
                <li><b><?php echo e(__('Order Id:')); ?></b> #<?php echo e($item->id); ?></li>
                <li><b><?php echo e(__('Payment Method:')); ?></b> <?php echo e(ucwords(str_replace('_', ' ', $item->payment_gateway))); ?></li>
                <li>
                    <b><?php echo e(__('Payment Status:')); ?></b>
                    <?php if($item->payment_status == 'complete'): ?>
                        <span class="badge badge-success px-2 py-1"><?php echo e(__('Complete')); ?></span>
                    <?php elseif($item->payment_status == 'pending'): ?>
                        <span class="badge badge-warning px-2 py-1"><?php echo e(__('Pending')); ?></span>
                    <?php elseif($item->payment_status == 'canceled'): ?>
                        <span class="badge badge-danger px-2 py-1"><?php echo e(__('Canceled')); ?></span>
                    <?php endif; ?>
                </li>
                <li>
                    <b><?php echo e(__('Order Status:')); ?></b>
                    <?php if($item->status == 'complete'): ?>
                        <span class="badge badge-success px-2 py-1"><?php echo e(__('Complete')); ?></span>
                    <?php elseif($item->status == 'pending'): ?>
                        <span class="badge badge-warning px-2 py-1"><?php echo e(__('Pending')); ?></span>
                    <?php elseif($item->status == 'in_progress'): ?>
                        <span class="badge badge-warning px-2 py-1"><?php echo e(__('In progress')); ?></span>
                    <?php elseif($item->status == 'shipped'): ?>
                        <span class="badge badge-warning px-2 py-1"><?php echo e(__('Shipped')); ?></span>
                    <?php elseif($item->status == 'canceled'): ?>
                        <span class="badge badge-danger px-2 py-1"><?php echo e(__('Canceled')); ?></span>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
        <div class="col-lg-6 my-5">
            <h3 class="mb-3"><?php echo e(__('Billing Details')); ?></h3>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td><?php echo e(__('Name')); ?></td>
                        <td><?php echo e($item->name); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo e(__('Email')); ?></td>
                        <td><?php echo e($item->email); ?></td>
                    </tr>
                    <tr>
                        <td><?php echo e(__('Address')); ?></td>
                        <td><?php echo e($item->address); ?></td>
                    </tr>
                    <?php if(!is_null($item->address)): ?>
                    <tr>
                        <td><?php echo e(__('Zipcode')); ?></td>
                        <td><?php echo e($item->zipcode); ?></td>
                    </tr>
                    <?php endif; ?>
                    <?php
                        $country = App\Country\Country::find($item->country);
                        $state = App\Country\State::find($item->state);
                    ?>
                    <?php if(!is_null($country)): ?>
                    <tr>
                        <td><?php echo e(__('Country')); ?></td>
                        <td><?php echo e($country->name); ?></td>
                    </tr>
                    <?php endif; ?>
                    <?php if(!is_null($state)): ?>
                    <tr>
                        <td><?php echo e(__('State')); ?></td>
                        <td><?php echo e($state->name); ?></td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="col-lg-6 my-5">
            <?php if(!is_null($user_shipping_address)): ?>
            <h3 class="mb-3"><?php echo e(__('Shipping Details')); ?></h3>
            <h6><?php echo e($user_shipping_address->name); ?></h6>
            <p><?php echo e($user_shipping_address->address); ?></p>
            <?php endif; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 my-5">
            <h3 class="mb-3"><?php echo e(__('Order Summary')); ?></h3>
            <table class="table table-bordered">
                <tbody>
                    <?php
                        $payment_meta = json_decode($item->payment_meta, true);
                    ?>
                    <?php if(isset($item->payment_gateway)): ?>
                    <tr>
                        <td><?php echo e(__('Payment Gateway:')); ?></td>
                        <td><?php echo e(ucfirst(str_replace('_', ' ', $item->payment_gateway))); ?></td>
                    </tr>
                    <?php endif; ?>
                    <tr>
                        <td><?php echo e(__('Transaction ID ')); ?></td>
                        <td><?php echo e($item->transaction_id); ?></td>
                    </tr>
                    <?php if(!is_null($item->coupon)): ?>
                    <tr>
                        <td><?php echo e(__('Coupon Code')); ?></td>
                        <td><?php echo e($item->coupon); ?></td>
                    </tr>
                    <?php endif; ?>
                    <?php if(isset($payment_meta['subtotal'])): ?>
                    <tr>
                        <td><?php echo e(__('Subtotal:')); ?></td>
                        <td><?php echo e(float_amount_with_currency_symbol($payment_meta['subtotal'])); ?></td>
                    </tr>
                    <?php endif; ?>
                    <?php if(isset($payment_meta['shipping_cost'])): ?>
                    <tr>
                        <td><?php echo e(__('Shipping Cost:')); ?></td>
                        <td>(+) <?php echo e(float_amount_with_currency_symbol($payment_meta['shipping_cost'])); ?></td>
                    </tr>
                    <?php endif; ?>
                    <?php if(isset($payment_meta['tax_amount'])): ?>
                    <tr>
                        <td><?php echo e(__('Tax Amount:')); ?></td>
                        <td>(+) <?php echo e(float_amount_with_currency_symbol($payment_meta['tax_amount'])); ?></td>
                    </tr>
                    <?php endif; ?>
                    <?php if(isset($payment_meta['coupon_amount']) && $payment_meta['coupon_amount'] > 0): ?>
                    <tr>
                        <td><?php echo e(__('Coupon Amount:')); ?></td>
                        <td>(-) <?php echo e(float_amount_with_currency_symbol($payment_meta['coupon_amount'])); ?></td>
                    </tr>
                    <?php endif; ?>
                    <tr>
                        <th><?php echo e(__('Total Amount')); ?></th>
                        <td><?php echo e(float_amount_with_currency_symbol($item->total_amount)); ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

        

        <div class="col-md-12 my-5">
            <h3 class="mb-3"><?php echo e(__('Ordered Products')); ?></h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th><?php echo e(__('Image')); ?></th>
                        <th><?php echo e(__('Name')); ?></th>
                        <th><?php echo e(__('Quantity')); ?></th>
                        <th><?php echo e(__('Price')); ?></th>
                        <th><?php echo e(__('Total')); ?></th>
                    </tr>
                </thead>
                <?php $cart_items = json_decode($item->order_details, true); ?>
                <tbody>
                    <?php $__currentLoopData = $cart_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $product = \App\Product\Product::find($id);?>
                        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.table.td-image','data' => ['image' => $product->image]]); ?>
<?php $component->withName('table.td-image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['image' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product->image)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            <td>
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
                                ?>
                                <?php echo e($product->title . ' ' . $item_attributes); ?>

                            </td>
                            <td><?php echo e($cart_item['quantity']); ?></td>
                            <?php
                                $price = $cart_item['attributes']['price'] ?? $product->sale_price;
                            ?>
                            <td><?php echo e(float_amount_with_currency_symbol($price)); ?></td>
                            <td>
                                <?php echo e(float_amount_with_currency_symbol($cart_item['quantity'] * $price)); ?>

                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <div class="text-left">
                <?php if($item->payment_status == 'pending'): ?>
                <a href="#" class="btn btn-danger px-4 cancel_payment"><?php echo e(__('Cancel Order')); ?></a>
                <?php endif; ?>
                <a href="#" class="btn btn-warning px-4 re_order"><?php echo e(__('Reorder')); ?></a>
                <?php if($item->payment_status == 'pending'): ?>
                    <?php if(strlen($item->checkout_image_path)): ?>
                    <div class="previous_attachment: ">
                        <?php
                            $file_name = explode('/', $item->checkout_image_path);
                            $file_name = end($file_name);
                        ?>
                        <span><?php echo e(__('Previous Attachment: ')); ?></span>
                        <a href="<?php echo e(asset($item->checkout_image_path)); ?>" download><?php echo e($file_name); ?></a>
                    </div>
                    <?php endif; ?>
                    <form action="<?php echo e(route('frontend.checkout.continue')); ?>" method="POST" enctype="multipart/form-data" id="continue_checkout_form">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="id" value="<?php echo e($item->id); ?>">
                        <input type="hidden" name="payment_gateway" value="<?php echo e($item->payment_gateway); ?>">
                        <?php if($item->payment_gateway == 'bank_transfer'): ?>
                            <div class="form-group">
                                <label for="bank_transfer_input"><?php echo e(__('Bank Transfer Image')); ?></label>
                                <input type="file" id="bank_transfer_input" name="bank_transfer_input" class="form-control-file">
                            </div>
                        <?php endif; ?>
                        <?php if($item->payment_gateway == 'cheque_payment'): ?>
                            <div class="form-group">
                                <label for="cheque_payment_input"><?php echo e(__('Cheque Image')); ?></label>
                                <input type="file" id="cheque_payment_input" name="cheque_payment_input" class="form-control-file">
                            </div>
                        <?php endif; ?>
                        <button type="submit" class="btn btn-success px-4 complete_payment"><?php echo e(__('Complete Payment')); ?></button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <form action="<?php echo e(route('frontend.checkout.reorder')); ?>" id="reorder_form" method="POST">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="id" value="<?php echo e($item->id); ?>">
    </form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('assets/backend/js/sweetalert2.js')); ?>"></script>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.datatable.js','data' => []]); ?>
<?php $component->withName('datatable.js'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <script>
        (function($) {
            "use strict";
            $(document).ready(function() {
                $(document).on('click', '.mobile_nav', function(e) {
                    e.preventDefault();
                    $(this).parent().toggleClass('show');
                });

                $(document).on('click', '.swal_delete_button', function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: '<?php echo e(__('Are you sure?')); ?>',
                        text: '<?php echo e(__('You would not be able to revert this item!')); ?>',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $(this).next().find('.swal_form_submit_btn').trigger('click');
                        }
                    });
                });
                $('.cancel_payment').on('click', function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: '<?php echo e(__("Are you sure?")); ?>',
                        text: "<?php echo e(__('You will not be able to revert this!')); ?>",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: '<?php echo e(__("Yes, cancel order!")); ?>'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: '<?php echo e(route("frontend.checkout.cancel")); ?>',
                                type: 'POST',
                                data: {
                                    id: '<?php echo e($item->id); ?>',
                                    _token: '<?php echo e(csrf_token()); ?>'
                                },
                                success: function(data) {
                                    if (data) {
                                        Swal.fire(
                                            '<?php echo e(__("Canceled!")); ?>',
                                            '<?php echo e(__("Your order has been cancelled.")); ?>',
                                            'success'
                                        );
                                        setTimeout(() => {
                                            location.reload();
                                        }, 500);
                                    }
                                },
                                error: function (error) {
                                    Swal.fire(
                                        '<?php echo e(__("Error!")); ?>',
                                        '<?php echo e(__("You clicked the button!")); ?>',
                                        'danger'
                                    )
                                }
                            });
                        }
                    })
                });
                $('.re_order').on('click', function(e) {
                    e.preventDefault();
                    $('#reorder_form').trigger('submit');
                });
            });
        })(jQuery)

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(input).next('img').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.user.dashboard.user-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bytesed/public_html/laravel/zaika/@core/resources/views/frontend/user/dashboard/order/details.blade.php ENDPATH**/ ?>