
<ul class="sub-menu mega-menu-inner style-two-category-wrapper">
    <?php $__currentLoopData = $mega_menu_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <li class="mega-menu-single-section custom">
            <ul class="mega-menu-main">
                <li class="round-menu-product">
                    <a href="<?php echo e(route("frontend.products.subcategory",["id" => $item->id,"title" => $item])); ?>">
                        <?php if(!empty($item->image)): ?>
                            <?php echo render_image_markup_by_attachment_id($item->image); ?>

                        <?php else: ?>
                            <img src="<?php echo e(asset('assets/uploads/no-image.png')); ?>">
                        <?php endif; ?>
                    </a>
                </li>
                <li>
                    <h5 class="menu-title-x style-two-category-heading"><?php echo e(html_entity_decode($item->title)); ?></h5>
                </li>
            </ul>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>

<style>
    .style-two-category-heading{
        -webkit-line-clamp: 2;
        width: 100px;
        line-height: 24px;
        text-overflow: ellipsis;
        overflow: hidden;
        height: 48px;
        text-align: center;
    }
    .style-two-category-wrapper{
        width: 669px;
        display: flex;
        flex-wrap: wrap;
        text-align: center;
    }
</style><?php /**PATH /home/bytesed/public_html/laravel/zaika/@core/app/Providers/../MenuBuilder/CategoryMenu/views/style_two_category_menu.blade.php ENDPATH**/ ?>