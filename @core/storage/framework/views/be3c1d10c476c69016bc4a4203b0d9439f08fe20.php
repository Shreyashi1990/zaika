<div class="breadcrumb-area 
    <?php if( request()->routeIs('frontend.dynamic.page')  &&  empty($page_post->breadcrumb_status)): ?>
        d-none
    <?php endif; ?>
"
    <?php echo render_background_image_markup_by_attachment_id(get_static_option('site_breadcrumb_bg')); ?>

>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-inner">
                    <h2 class="page-title"><?php echo $__env->yieldContent('page-title'); ?></h2>
                    <ul class="page-list">
                        <li class="list-item"><a href="<?php echo e(url('/')); ?>"><?php echo e(__('Home')); ?></a></li>
                        <?php if(request()->routeIs('frontend.products.campaign')): ?>
                        <li class="list-item"><a href="<?php echo e(route('frontend.products.campaign.list')); ?>"><?php echo e(__('Campaign')); ?></a></li>
                        <?php elseif(request()->routeIs('frontend.products.campaign.list')): ?>
                        <?php elseif(request()->is(get_static_option('product_page_slug').'/*') || request()->is(get_static_option('product_page_slug').'-category'.'/*')): ?>
                        <li class="list-item"><a href="<?php echo e(url('/').'/'.get_static_option('product_page_slug')); ?>"><?php echo e(get_static_option('product_page_slug')); ?></a></li>
                        <?php elseif(request()->is(get_static_option('blog_page_slug').'/*') || request()->is(get_static_option('blog_page_slug').'-category'.'/*')): ?>
                        <li class="list-item"><a href="<?php echo e(url('/').'/'.get_static_option('blog_page_slug')); ?>"><?php echo e(get_static_option('blog_page_name')); ?></a></li>
                        <?php endif; ?>
                        <li class="list-item"><?php echo $__env->yieldContent('page-title'); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/bytesed/public_html/laravel/zaika/@core/resources/views/frontend/partials/breadcrumb.blade.php ENDPATH**/ ?>