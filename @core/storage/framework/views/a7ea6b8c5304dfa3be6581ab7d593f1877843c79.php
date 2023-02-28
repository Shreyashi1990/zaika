

<?php $__env->startSection('style'); ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.media.css','data' => []]); ?>
<?php $component->withName('media.css'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Checkout Page Settings')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.msg.success','data' => []]); ?>
<?php $component->withName('msg.success'); ?>
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
            </div>
            <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title"><?php echo e(__('Checkout Page Settings')); ?></h4>
                        <form action="<?php echo e(route('admin.page.settings.checkout')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <h5 class="mt-5 mb-3"><?php echo e(__('Login Section')); ?></h5>
                            <div class="form-group">
                                <label for="returning_customer_text"><?php echo e(__('Returning Customer Text')); ?></label>
                                <input type="text" class="form-control" id="returning_customer_text" name="returning_customer_text" value="<?php echo e(get_static_option('returning_customer_text')); ?>">
                            </div>
                            <div class="form-group">
                                <label for="toggle_login_text"><?php echo e(__('Toggle Login Text')); ?></label>
                                <input type="text" class="form-control" id="toggle_login_text" name="toggle_login_text" value="<?php echo e(get_static_option('toggle_login_text')); ?>">
                            </div>
                            <div class="form-group">
                                <label for="signin_title"><?php echo e(__('Sign-in Title')); ?></label>
                                <input type="text" class="form-control" id="signin_title" name="signin_title" value="<?php echo e(get_static_option('signin_title')); ?>">
                            </div>
                            <div class="form-group">
                                <label for="signin_subtitle"><?php echo e(__('Sign-in Subtitle')); ?></label>
                                <input type="text" class="form-control" id="signin_subtitle" name="signin_subtitle" value="<?php echo e(get_static_option('signin_subtitle')); ?>">
                            </div>
                            <div class="form-group">
                                <label for="remember_text"><?php echo e(__('Remember Text')); ?></label>
                                <input type="text" class="form-control" id="remember_text" name="remember_text" value="<?php echo e(get_static_option('remember_text')); ?>">
                            </div>
                            <div class="form-group">
                                <label for="remember_signin_btn_text"><?php echo e(__('Signin Button Text')); ?></label>
                                <input type="text" class="form-control" id="remember_signin_btn_text" name="remember_signin_btn_text" value="<?php echo e(get_static_option('remember_signin_btn_text')); ?>">
                            </div>

                            <h5 class="mt-5 mb-3"><?php echo e(__('Coupon Section')); ?></h5>
                            <div class="form-group">
                                <label for="have_coupon_text"><?php echo e(__('Have Coupon Text')); ?></label>
                                <input type="text" class="form-control" id="have_coupon_text" name="have_coupon_text" value="<?php echo e(get_static_option('have_coupon_text')); ?>">
                            </div>
                            <div class="form-group">
                                <label for="enter_coupon_text"><?php echo e(__('Enter Coupon Toggle Text')); ?></label>
                                <input type="text" class="form-control" id="enter_coupon_text" name="enter_coupon_text" value="<?php echo e(get_static_option('enter_coupon_text')); ?>">
                            </div>
                            <div class="form-group">
                                <label for="coupon_title"><?php echo e(__('Coupon Title')); ?></label>
                                <input type="text" class="form-control" id="coupon_title" name="coupon_title" value="<?php echo e(get_static_option('coupon_title')); ?>">
                            </div>
                            <div class="form-group">
                                <label for="coupon_subtitle"><?php echo e(__('Coupon Subtitle')); ?></label>
                                <input type="text" class="form-control" id="coupon_subtitle" name="coupon_subtitle" value="<?php echo e(get_static_option('coupon_subtitle')); ?>">
                            </div>
                            <div class="form-group">
                                <label for="coupon_placeholder"><?php echo e(__('Coupon Placeholder')); ?></label>
                                <input type="text" class="form-control" id="coupon_placeholder" name="coupon_placeholder" value="<?php echo e(get_static_option('coupon_placeholder')); ?>">
                            </div>
                            <div class="form-group">
                                <label for="apply_coupon_btn_text"><?php echo e(__('Apply Button Text')); ?></label>
                                <input type="text" class="form-control" id="apply_coupon_btn_text" name="apply_coupon_btn_text" value="<?php echo e(get_static_option('apply_coupon_btn_text')); ?>">
                            </div>

                            <h5 class="mt-5 mb-3"><?php echo e(__('Billing Info Login Section')); ?></h5>
                            <div class="form-group">
                                <label for="checkout_page_title"><?php echo e(__('Page Title')); ?></label>
                                <input type="text" class="form-control" id="checkout_page_title" name="checkout_page_title" value="<?php echo e(get_static_option('checkout_page_title')); ?>">
                            </div>
                            <div class="form-group">
                                <label for="create_account_text"><?php echo e(__('Create Account Text')); ?></label>
                                <input type="text" class="form-control" id="create_account_text" name="create_account_text" value="<?php echo e(get_static_option('create_account_text')); ?>">
                            </div>
                            <div class="form-group">
                                <label for="ship_to_another_text"><?php echo e(__('Ship to another address')); ?></label>
                                <input type="text" class="form-control" id="ship_to_another_text" name="ship_to_another_text" value="<?php echo e(get_static_option('ship_to_another_text')); ?>">
                            </div>

                            <h5 class="mt-5 mb-3"><?php echo e(__('Right Section')); ?></h5>
                            <div class="form-group">
                                <label for="order_summary_title"><?php echo e(__('Order Summary Title')); ?></label>
                                <input type="text" class="form-control" id="order_summary_title" name="order_summary_title" value="<?php echo e(get_static_option('order_summary_title')); ?>">
                            </div>
                            <div class="form-group">
                                <label for="subtotal_text"><?php echo e(__('Subtotal Text')); ?></label>
                                <input type="text" class="form-control" id="subtotal_text" name="subtotal_text" value="<?php echo e(get_static_option('subtotal_text')); ?>">
                            </div>
                            <div class="form-group">
                                <label for="shipping_text"><?php echo e(__('Shipping Text')); ?></label>
                                <input type="text" class="form-control" id="shipping_text" name="shipping_text" value="<?php echo e(get_static_option('shipping_text')); ?>">
                            </div>
                            <div class="form-group">
                                <label for="vat_text"><?php echo e(__('VAT Text')); ?></label>
                                <input type="text" class="form-control" id="vat_text" name="vat_text" value="<?php echo e(get_static_option('vat_text')); ?>">
                            </div>
                            <div class="form-group">
                                <label for="discount_text"><?php echo e(__('Discount Text')); ?></label>
                                <input type="text" class="form-control" id="discount_text" name="discount_text" value="<?php echo e(get_static_option('discount_text')); ?>">
                            </div>
                            <div class="form-group">
                                <label for="coupon_text"><?php echo e(__('Coupon Text')); ?></label>
                                <input type="text" class="form-control" id="coupon_text" name="coupon_text" value="<?php echo e(get_static_option('coupon_text')); ?>">
                            </div>
                            <div class="form-group">
                                <label for="total_text"><?php echo e(__('Total Text')); ?></label>
                                <input type="text" class="form-control" id="total_text" name="total_text" value="<?php echo e(get_static_option('total_text')); ?>">
                            </div>

                            <div class="form-group">
                                <label for="proceed_to_checkout_btn_text"><?php echo e(__('Proceed to Checkout Button Text')); ?></label>
                                <input type="text" class="form-control" id="proceed_to_checkout_btn_text" name="proceed_to_checkout_btn_text" value="<?php echo e(get_static_option('proceed_to_checkout_btn_text')); ?>">
                            </div>
                            <div class="form-group">
                                <label for="return_to_cart_btn_text"><?php echo e(__('Return to Cart Button Text')); ?></label>
                                <input type="text" class="form-control" id="return_to_cart_btn_text" name="return_to_cart_btn_text" value="<?php echo e(get_static_option('return_to_cart_btn_text')); ?>">
                            </div>
                            <div class="form-group">
                                <label for="checkout_page_terms_text"><?php echo e(__('Terms & Conditions Text')); ?></label>
                                <input type="text" class="form-control" id="checkout_page_terms_text" name="checkout_page_terms_text" value="<?php echo e(get_static_option('checkout_page_terms_text')); ?>">
                                <small><?php echo e(__('Embrace the part of text you want to make a link with ')); ?> <b>[lnk]</b> <?php echo e(__(' and ')); ?> <b>[/lnk]</b>.</small>
                                <small><?php echo __('For example: I have read and agree to the Website <b>[lnk]</b>terms & conditions<b>[/lnk]</b>.'); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="checkout_page_terms_link_url"><?php echo e(__('Terms & Conditions Link URL')); ?></label>
                                <input type="text" class="form-control" id="checkout_page_terms_link_url" name="checkout_page_terms_link_url" value="<?php echo e(get_static_option('checkout_page_terms_link_url')); ?>">
                            </div>
                            <div class="form-group">
                                <label for="checkout_page_no_product_text"><?php echo e(__('No Product Text')); ?></label>
                                <input type="text" class="form-control" id="checkout_page_no_product_text" name="checkout_page_no_product_text" value="<?php echo e(get_static_option('checkout_page_no_product_text')); ?>">
                            </div>
                            <div class="form-group">
                                <label for="back_to_home_btn_text"><?php echo e(__('Back to Home Button Text')); ?></label>
                                <input type="text" class="form-control" id="back_to_home_btn_text" name="back_to_home_btn_text" value="<?php echo e(get_static_option('back_to_home_btn_text')); ?>">
                            </div>

                            <h5 class="mt-5 mb-3"><?php echo e(__('Error messege')); ?></h5>
                            <div class="form-group">
                                <label for="shipping_option_invalid_msg"><?php echo e(__('Shipping minimum amount not reached')); ?></label>
                                <input type="text" class="form-control" id="shipping_option_invalid_msg" name="shipping_option_invalid_msg" value="<?php echo e(get_static_option('shipping_option_invalid_msg')); ?>">
                            </div>
                            <button class="btn btn-primary"><?php echo e(__('Save Settings')); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.media.markup','data' => []]); ?>
<?php $component->withName('media.markup'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.media.js','data' => []]); ?>
<?php $component->withName('media.js'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bytesed/public_html/laravel/zaika/@core/resources/views/backend/settings/checkout.blade.php ENDPATH**/ ?>