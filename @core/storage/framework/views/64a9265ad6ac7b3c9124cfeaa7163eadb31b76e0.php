

<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Checkout')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/common/css/toastr.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/payment.css')); ?>">

    <style>
        .error-wrap li {
            text-transform: capitalize;
        }
    </style>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.loader.css','data' => []]); ?>
<?php $component->withName('loader.css'); ?>
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

<?php $__env->startSection('content'); ?>

    <?php if(!empty($all_cart_items) && count($all_cart_items)): ?>
        <div class="checkout-area-wrapper widt-coupon">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="checkout-inner-content">
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

                            
                            <form id="global_settings">
                                <input type="hidden" name="gs_tax_amount" id="gs_tax_amount" value="<?php echo e($tax); ?>" />
                                <input type="hidden" name="gs_selected_shipping_id" id="gs_selected_shipping_id" value="<?php echo e(optional($default_shipping)->id); ?>" />
                                <input type="hidden" name="gs_selected_shipping_amount" id="gs_selected_shipping_amount" value="<?php echo e($default_shipping_cost); ?>" />
                                <input type="hidden" name="gs_coupon_text" id="gs_coupon_text" value="<?php echo e(request()->coupon); ?>" />
                                <input type="hidden" name="gs_coupon_amount" id="gs_coupon_amount" value="<?php echo e($coupon_amount); ?>" />
                                <input type="hidden" name="gs_subtotal" id="gs_subtotal" value="<?php echo e($subtotal); ?>" />

                                <input type="hidden" name="gs_selected_country" id="gs_selected_country" value="<?php echo e($subtotal); ?>" />
                                <input type="hidden" name="gs_selected_state" id="gs_selected_state" value="<?php echo e($subtotal); ?>" />
                            </form>
                            
                            <?php if(!$user): ?>
                                <p class="query">
                                    <i class="las la-exclamation-circle icon"></i>
                                    <?php echo filter_static_option_value('returning_customer_text', $setting_text, __('Returning customer?')); ?>

                                    <a href="#" id="toggle_login"><?php echo filter_static_option_value('toggle_login_text', $setting_text, __('Click here to login')); ?></a>
                                </p>
                                
                                <div class="discount-coupon-area margin-bottom-30 d-none" id="login_container">
                                    <h4 class="title"><?php echo filter_static_option_value('signin_title', $setting_text, __('Sign in')); ?></h4>
                                    <p class="info">
                                        <?php echo filter_static_option_value('signin_subtitle', $setting_text, __('Login to buy the product as user')); ?>

                                    </p>
                                    <form class="form-wrapper" id="login_form_order_page">
                                        <div class="error-wrap text-center"></div>
                                        <div class="row">
                                            <div class="form-group col-lg-6 col-12">
                                                <input type="text" class="form-control" id="exampleInputEmail1" name="username"
                                                        aria-describedby="emailHelp" placeholder="User Name or Email"
                                                />
                                            </div>
                                            <div class="form-group col-lg-6 col-12">
                                                <input type="password" class="form-control" id="exampleInputPassword1"
                                                    name="password" placeholder="Password">
                                            </div>
                                        </div>
                                        <div class="form-group form-check">
                                            <div class="box-wrap">
                                                <div class="left">
                                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember">
                                                    <label class="form-check-label" for="exampleCheck1">
                                                        <?php echo filter_static_option_value('remember_text', $setting_text, __('Remember me')); ?>

                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="btn-wrapper">
                                            <button type="submit" id="login_btn" class="default-btn"><?php echo filter_static_option_value('remember_signin_btn_text', $setting_text, __('Sign in')); ?></button>
                                        </div>
                                        <div class="sign-in-with">
                                            <?php if(get_static_option('enable_google_login')): ?>
                                            <a href="<?php echo e(route('login.google.redirect')); ?>" class="special-account">
                                                <img src="<?php echo e(asset('assets/frontend/img/icon/google-icon.svg')); ?>"
                                                    alt="icon">
                                            </a>
                                            <?php endif; ?>
                                            <?php if(get_static_option('enable_facebook_login')): ?>
                                            <a href="<?php echo e(route('login.facebook.redirect')); ?>" class="special-account">
                                                <img src="<?php echo e(asset('assets/frontend/img/icon/Facebook-icon.svg')); ?>"
                                                    alt="icon">
                                            </a>
                                            <?php endif; ?>
                                        </div>
                                    </form>
                                </div>
                                
                            <?php endif; ?>
                            <p class="query">
                                <i class="las la-exclamation-circle icon"></i>
                                <?php echo filter_static_option_value('have_coupon_text', $setting_text, __('Have a coupon?')); ?>

                                <a href="#" class="toggle_coupon"><?php echo filter_static_option_value('enter_coupon_text', $setting_text, __('Click here to enter your code')); ?></a>
                            </p>
                            <!-- discount coupon area -->
                            <div class="discount-coupon-area margin-bottom-50 margin-top-20 coupon_section d-none">
                                <h4 class="title"><?php echo filter_static_option_value('coupon_title', $setting_text, __('coupon discount')); ?></h4>
                                <p class="info">
                                    <?php echo filter_static_option_value('coupon_subtitle', $setting_text, 
                                            __('There are many variations of passages of Lorem Ipsum available, but the
                                            majority have suffered alteration in some.'
                                            )
                                        ); ?>

                                </p>

                                <form action="<?php echo e(route('frontend.checkout.apply.coupon')); ?>" method="get" class="discount-coupon">
                                    <div class="form-group">
                                        <input type="text" name="coupon" class="form-control"
                                            placeholder="<?php echo filter_static_option_value('coupon_placeholder', $setting_text, __('Enter your coupon code')); ?>"
                                            value="<?php echo e(old('coupon') ?? request()->coupon); ?>">
                                    </div>
                                    <div class="btn-wrapper">
                                        <button class="default-btn" type="submit"><?php echo filter_static_option_value('apply_coupon_btn_text', $setting_text, __('apply coupon')); ?> </button>
                                    </div>
                                </form>
                            </div>

                            <!-- billing details area -->
                            <div class="billing-details-area-wrapper">
                                <h3 class="title"><?php echo filter_static_option_value('checkout_page_title', $setting_text, __('Billing detail')); ?></h3>
                                <form action="<?php echo e(route('frontend.checkout')); ?>" method="POST" id="billing_info" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="coupon" id="coupon_code" value="<?php echo e(old('coupon') ?? request()->coupon); ?>">
                                    <input type="hidden" name="tax_amount">
                                    <input type="hidden" name="selected_shipping_option" value="<?php echo e($default_shipping->id ?? ''); ?>">
                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label for="country"><?php echo e(__('Country')); ?></label>
                                            <select name="country" id="country">
                                                <option value=""><?php echo e(__('Select Country')); ?></option>
                                                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($country->id); ?>" 
                                                        <?php if(isset($user) && isset($user->country) 
                                                            && $user->country == $country->id
                                                        ): ?> selected <?php endif; ?>
                                                    ><?php echo e($country->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>

                                        <div class="form-group col-12">
                                            <label for="f-name"><?php echo e(__('Full name')); ?></label>
                                            <input type="text" id="f-name" name="name" value="<?php echo e(old('name') ?? $user->name ?? ''); ?>">
                                        </div>

                                        <div class="form-group col-lg-12 col-12">
                                            <label for="address_amail"><?php echo e(__('Email')); ?></label>
                                            <input type="email" id="email" name="email" value="<?php echo e(old('email') ?? $user->email ?? ''); ?>" />
                                        </div>

                                        <div class="form-group col-lg-12 col-12">
                                            <label for="address_phone"><?php echo e(__('Phone')); ?></label>
                                            <input type="text" id="phone" name="phone" value="<?php echo e(old('phone') ?? $user->phone ?? ''); ?>" />
                                        </div>

                                        <div class="form-group col-12">
                                            <label for="address_01"><?php echo e(__('Address')); ?></label>
                                            <input type="text" id="address_01" name="address"
                                                value="<?php echo e(old('address') ?? $user->address ?? ''); ?>">
                                        </div>

                                        <div class="form-group col-12">
                                            <label for="address_03"><?php echo e(__('City/Town')); ?></label>
                                            <input type="text" id="city" name="city" value="<?php echo e(old('city') ?? $user->city ?? ''); ?>">
                                        </div>

                                        <div class="form-group col-lg-6 col-12">
                                            <label for="address_province_ship"><?php echo e(__('State')); ?></label>
                                            <select id="state" name="state">
                                                <option value=""><?php echo e(__('Select State')); ?></option>
                                                <?php if(isset($user) && isset($user->country)): ?>
                                                    <?php
                                                        $states = \App\Country\State::where("country_id",$user->country)->where("status","publish")->select("id","name")->get();
                                                    ?>
                                                    <?php $__currentLoopData = $states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($state->id); ?>" <?php echo e($state->id == $user->state ? "selected" : ""); ?>><?php echo e($state->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>

                                        <div class="form-group col-lg-6 col-12">
                                            <label for="address_zip_ship_2"><?php echo e(__('Zip Code')); ?></label>
                                            <input type="text" id="zipcode" name="zipcode"
                                                value="<?php echo e(old('zipcode') ?? $user->zipcode ?? ''); ?>" />
                                        </div>

                                        <?php if(!$user): ?>
                                            <div class="form-group form-check col-12">
                                                <input type="checkbox" id="create_account" name="create_account"
                                                    class="form-check-input">
                                                <label class="form-check-label" for="create_account">
                                                    <?php echo filter_static_option_value('create_account_text', $setting_text, __('Create an Account?')); ?>

                                                </label>
                                            </div>
                                            <div class="form-group col-lg-12 col-12" style="display: none">
                                                <label for="username"><?php echo e(__('username')); ?></label>
                                                <input type="text" name="username" class="form-control" id="username">
                                            </div>
                                            <div class="form-group col-lg-6 col-12" style="display: none">
                                                <label for="password"><?php echo e(__('Password')); ?></label>
                                                <input type="password" name="password" class="form-control" id="password">
                                            </div>
                                            <div class="form-group col-lg-6 col-12" style="display: none">
                                                <label for="confirm_password"><?php echo e(__('Confirmed Password')); ?></label>
                                                <input type="password" name="password_confirmation" class="form-control"
                                                    id="confirm_password">
                                            </div>
                                        <?php endif; ?>

                                        <div class="form-group col-12">
                                            <label for="order_note"><?php echo e(__('Order Note')); ?></label>
                                            <textarea class="form-control" id="order_note" name="order_note" rows="3"></textarea>
                                        </div>
                                        <?php if(auth('web')->check()): ?>
                                        <input type="hidden" name="shipping_address_id" id="shipping_address_id">
                                        <div class="form-group form-check col-12">
                                            <input type="checkbox" class="form-check-input" id="ship_another_address">
                                            <label class="form-check-label" for="ship_another_address">
                                                <?php echo filter_static_option_value('ship_to_another_text', $setting_text, __('Ship to another address')); ?>

                                            </label>
                                        </div>
                                        <div id="user_shipping_address_container" class="container-fluid" style="display: none">
                                            <div id="all_user_shipping_address_container">
                                                <?php if($all_user_shipping): ?>
                                                    <?php echo $__env->make('frontend.cart.checkout-user-shipping', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                                <?php endif; ?>
                                            </div>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div id="user_shipping_address_form">
                                                        <div class="form-group">
                                                            <label for="user_shipping_name"><?php echo e(__('Name')); ?></label>
                                                            <input type="text" class="form-control" id="user_shipping_name">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="user_shipping_address"><?php echo e(__('Address')); ?></label>
                                                            <textarea id="user_shipping_address" cols="30" rows="5"></textarea>
                                                        </div>
                                                        <button id="new_user_shipping_address_form_submit_btn" class="btn btn-primary px-3"><?php echo e(__('Add New Shipping Address')); ?></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5" id="checkout_total_containeraaa">
                        <div class="order cart-total">
                            <div id="checkout_total_container">
                                <?php echo $__env->make('frontend.cart.checkout-partial', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                            <div id="payment_method_input">
                                <?php echo render_payment_gateway_for_form(); ?>

                                <?php if(!empty(get_static_option('manual_payment_gateway'))): ?>
                                    <div class="form-group manual_payment_transaction_field" style="display: none">
                                        <div class="label"><?php echo e(__('Transaction ID')); ?></div>
                                        <input type="text" name="transaction_id" placeholder="<?php echo e(__('Transaction ID')); ?>"
                                                class="form-control">
                                        <span class="help-info"><?php echo get_manual_payment_description(); ?></span>
                                    </div>
                                <?php endif; ?>
                                <?php if(!empty(get_static_option('bank_payment_gateway'))): ?>
                                    <div class="form-group bank_payment_transaction_field" style="display: none">
                                        <div class="label"><?php echo e(__('Bank Payment Image')); ?></div>
                                        <input type="file" name="bank_payment_input" class="form-control-file">
                                        <span class="help-info"><?php echo get_manual_payment_description('bank_payment'); ?></span>
                                    </div>
                                <?php endif; ?>
                                <?php if(!empty(get_static_option('cheque_payment_gateway'))): ?>
                                    <div class="form-group cheque_payment_transaction_field" style="display: none">
                                        <div class="label"><?php echo e(__('Cheque Payment Image')); ?></div>
                                        <input type="file" name="cheque_payment_input" class="form-control-file">
                                        <span class="help-info"><?php echo get_manual_payment_description('cheque_payment'); ?></span>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="sum-bar"></div>
                            <div class="form-group form-check col-12">
                                <?php
                                    $checkout_page_terms_text = get_static_option('checkout_page_terms_text');
                                    $checkout_page_terms_link_url = get_static_option('checkout_page_terms_link_url');
                                    $checkout_page_terms_link_url = $checkout_page_terms_link_url ? url($checkout_page_terms_link_url) : "#";
                            
                                    $terms_text = str_replace(['[lnk]', '[/lnk]'], ["<a class='terms' href='$checkout_page_terms_link_url'>", "</a>"], $checkout_page_terms_text);
                                ?>
                                <input type="checkbox" class="form-check-input" name="agree" id="Checkhh">
                                <label class="form-check-label" for="Checkhh">
                                    <?php echo $terms_text; ?>

                                </label>
                            </div>
                            <div class="btn-wrapper btn-top">
                                <button type="submit" class="default-btn"><?php echo filter_static_option_value('proceed_to_checkout_btn_text', $setting_text, __('Proceed to checkout')); ?></button>
                            </div>
                            <div class="btn-wrapper ">
                                <a href="<?php echo e(route('frontend.products.cart')); ?>" class="default-btn reverse">
                                    <?php echo filter_static_option_value('return_to_cart_btn_text', $setting_text, __('Return to Cart')); ?>

                                </a>
                            </div>
                        </div>

                    </div>
                   
                    </form>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="only-img-page-wrapper cart">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="img-box">
                            <?php echo render_image_markup_by_attachment_id(get_static_option('empty_cart_image')); ?>

                        </div>
                        <div class="content">
                            <p class="info"><?php echo filter_static_option_value('checkout_page_no_product_text', $setting_text, __('No products in your cart!')); ?></p>
                            <div class="btn-wrapper">
                                <a href="<?php echo e(route('homepage')); ?>" class="default-btn"><?php echo filter_static_option_value('back_to_home_btn_text', $setting_text, __('Back to home')); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.loader.html','data' => []]); ?>
<?php $component->withName('loader.html'); ?>
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
<?php $__env->startSection('scripts'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/js/toastr.min.js')); ?>">
    <?php echo $__env->make('frontend.partials.scripts.checkout-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script>
        $(document).ready(function (){
            let id = $("#state").val();
            $.get('<?php echo e(route('state.info.ajax')); ?>', {
                id: id
            }).then(function(data) {
                $('#tax_amount').text(site_currency_symbol + Number(data.tax).toFixed(
                    2));
                calculateTotal();
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bytesed/public_html/laravel/zaika/@core/resources/views/frontend/cart/checkout.blade.php ENDPATH**/ ?>