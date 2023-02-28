<ul class="sub-menu mega-menu-inner">
    <li class="mega-menu-single-section">
        <ul class="mega-menu-main">
            <li>
                <h5 class="menu-title"><?php echo e(html_entity_decode($title)); ?></h5>
                <hr class="my-1">
            </li>
            <?php $__currentLoopData = $mega_menu_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="round-menu-product">
                    <a href="<?php echo e(route("frontend.products.subcategory",["id" => $item->id,"title" => $item])); ?>">
                        <?php echo e(html_entity_decode($item->title)); ?>

                    </a>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </li>
</ul><?php /**PATH /home/bytesed/public_html/laravel/zaika/@core/app/Providers/../MenuBuilder/CategoryMenu/views/style_three_category_menu.blade.php ENDPATH**/ ?>