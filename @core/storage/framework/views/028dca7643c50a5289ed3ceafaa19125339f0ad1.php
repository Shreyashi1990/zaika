
<!-- nav area start -->
<nav class="navbar navbar-area navbar-expand-lg has-topbar nav-style-01 dark
    <?php if(!empty($page_post->navbar_variant)): ?>
        <?php echo e($page_post->navbar_variant == 1 ||  $page_post->navbar_variant == 2 ||
        (request()->routeIs('frontend.dynamic.page') == false && $page_post->navbar_variant == 3) ? "nav-right-inline" : ""); ?>

    <?php else: ?>
        nav-right-inline
    <?php endif; ?>

    <?php if(!empty($page_post->navbar_variant)): ?>
        <?php if($page_post->navbar_variant == 5): ?>
            home-page-five-slider
        <?php endif; ?>
    <?php endif; ?>
    <?php if(isset($page_post->navbar_variant) && $page_post->navbar_variant == 1): ?>
        nav-style-01
    <?php elseif(isset($page_post->navbar_variant) && $page_post->navbar_variant == 2): ?>
        index-02 dark
    <?php elseif(isset($page_post->navbar_variant) && $page_post->navbar_variant == 3): ?>

        has-topbar new-nav-style-01 new-index-03
    <?php elseif(isset($page_post->navbar_variant) && $page_post->navbar_variant == 4): ?>
        has-topbar new-nav-style-01 new-index-04
    <?php elseif(isset($page_post->navbar_variant) && $page_post->navbar_variant == 5): ?>
        has-topbar new-nav-style-01 new-index-05
    <?php endif; ?>">

    <div class="container home-page-two-container new-nav-container custom-container-1410">
        <div class="responsive-mobile-menu">
            <div class="logo-wrapper">
                <a href="<?php echo e(route('homepage')); ?>" class="logo">
                    <?php if(!empty(filter_static_option_value('site_logo',$global_static_field_data))): ?>
                        <?php echo render_image_markup_by_attachment_id(filter_static_option_value('site_logo',$global_static_field_data)); ?>

                    <?php else: ?>
                        <h2 class="site-title"><?php echo e(filter_static_option_value('site_title',$global_static_field_data)); ?></h2>
                    <?php endif; ?>
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bizcoxx_main_menu"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="bizcoxx_main_menu">
            <ul class="navbar-nav">
                <?php echo render_frontend_menu($primary_menu); ?>

            </ul>
        </div>
        <div class="nav-right-content">
            <ul>
                <li class="search position-relative">
                    <div class="search-open">
                        <i class="las la-search icon"></i>
                    </div>

                    <div class="search-bar">
                        <form class="menu-search-form" id="product_search_form" action="<?php echo e(route('frontend.products.all')); ?>">
                            <div class="search-close"> <i class="las la-times"></i> </div>
                            <input class="item-search" name="q" type="text" placeholder="Search Here.....">
                            <button type="submit"> Search Now </button>
                        </form>
                    </div>
                </li>
                <li class="favicon pr-0">
                    <a href="<?php echo e(route('frontend.products.compare')); ?>">
                        <i class="las la-retweet icon"></i>
                    </a>
                </li>
                <li class="favicon">
                    <a href="<?php echo e(route('frontend.products.wishlist')); ?>">
                        <i class="lar la-heart icon"></i>
                        <span class="cart-badge" id="wishlist_badge"><?php echo e(__('0')); ?></span>
                    </a>
                </li>
                <li class="cart position-relative">
                    <a href="<?php echo e(route('frontend.products.cart')); ?>">
                        <i class="las la-cart-plus icon"></i>
                        <span class="cart-badge" id="cart_badge"><?php echo e(__('0')); ?></span>
                    </a>
                    <div class="quick-cart">
                        <div class="arrow-up"></div>
                        <div id="top_minicart_container">
                            <div id="top_cart_item_box"></div>
                            <div class="total-pricing">
                                <div class="total">
                                    <span class="total"><?php echo e(__('SUB TOTAL:')); ?></span>
                                    <span class="amount" id="top_cart_subtotal">00.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="btn-wrapper">
                            <a href="<?php echo e(route('frontend.checkout')); ?>" class="default-btn"><?php echo e(__('checkout')); ?></a>
                            <a href="<?php echo e(route('frontend.products.cart')); ?>" class="default-btn"><?php echo e(__('view cart')); ?></a>
                        </div>
                    </div>
                </li>
                <li class="account account-option">
                    <?php if(auth('web')->user()): ?>
                    <a href="<?php echo e(route('user.home')); ?>">
                        <span class="text"> <?php echo e(__('Hi, ') . auth('web')->user()->name); ?></span>
                        <i class="lar la-user icon"></i>
                    </a>
                    <div class="name-list">
                        <span class="lists">
                            <a href="<?php echo e(route('user.home')); ?>"><?php echo e(__('Dashboard')); ?></a>
                        </span>
                        <span class="lists"><a href="<?php echo e(route('user.home.edit.profile')); ?>"><?php echo e(__('Edit Profile')); ?></a></span>
                        <span class="lists"><a href="<?php echo e(route('user.home.change.password')); ?>"><?php echo e(__('Change Password')); ?></a></span>
                        <span class="lists"><a href="<?php echo e(route('user.product.order.all')); ?>"><?php echo e(__('My Orders')); ?></a></span>
                        <span class="lists"><a href="<?php echo e(route('user.shipping.address.all')); ?>"><?php echo e(__('Shipping Address')); ?></a></span>
                        <span class="lists"><a href="<?php echo e(route('user.home.support.tickets')); ?>"><?php echo e(__('Support Ticket')); ?></a></span>
                        <span class="lists">
                            <a href="<?php echo e(route('user.logout')); ?>" onclick="event.preventDefault();document.getElementById('logout_submit_btn').dispatchEvent(new MouseEvent('click'));">
                                <?php echo e(__('Logout')); ?>

                            </a>
                            <form id="logout-form" action="<?php echo e(route('user.logout')); ?>" method="POST" style="display: none;">
                                <?php echo csrf_field(); ?>
                                <button id="logout_submit_btn" type="submit"></button>
                            </form>
                        </span>
                    </div>
                    <?php elseif(auth('admin')->user()): ?>
                    <a href="<?php echo e(route('admin.home')); ?>">
                        <span class="text"> <?php echo e(__('Hi, Admin')); ?></span>
                        <i class="lar la-user icon"></i>
                    </a>
                    <div class="name-list">
                        <span class="lists"><a href="<?php echo e(route('admin.home')); ?>"><?php echo e(__('Dashboard')); ?></a></span>
                        <span class="lists">
                            <a href="<?php echo e(route('admin.logout')); ?>" onclick="event.preventDefault();document.getElementById('logout_submit_btn').dispatchEvent(new MouseEvent('click'));">
                                <?php echo e(__('Logout')); ?>

                            </a>
                            <form id="logout-form" action="<?php echo e(route('admin.logout')); ?>" method="GET" style="display: none;">
                                <?php echo csrf_field(); ?>
                                <button id="logout_submit_btn" type="submit"></button>
                            </form>
                        </span>
                    </div>
                    <?php else: ?>
                    <a href="<?php echo e(route('user.login')); ?>">
                        <span class="text"> <?php echo e(__('account')); ?></span>
                        <i class="lar la-user icon"></i>
                    </a>
                    <div class="name-list">
                        <span class="lists"><a href="<?php echo e(route('user.login', ['type' => 'login'])); ?>"><?php echo e(__('Login')); ?></a></span>
                        <span class="lists"><a href="<?php echo e(route('user.register')); ?>"><?php echo e(__('Register')); ?></a></span>
                    </div>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- navbar area end -->
<?php /**PATH /home/bytesed/public_html/laravel/zaika/@core/resources/views/frontend/partials/navbar.blade.php ENDPATH**/ ?>