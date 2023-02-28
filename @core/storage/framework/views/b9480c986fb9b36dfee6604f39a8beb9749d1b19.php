

<?php $__env->startSection('page-title'); ?>
    <?php echo e(__("All Products")); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>

<?php $__env->stopSection(); ?>

<?php
    $sidebar_visibility = isset($sidebar_position);
    $product_section_width = $sidebar_position ? 'col-lg-9' : 'col-lg-12';
    $sidebar_section_width = $sidebar_position ? 'col-lg-3' : 'd-none';
    $item_style = $style;

    $sidebar_position = $sidebar_position == 'right' ? '' : 'order-md-2';

    $product_column = 'col-md-3';
    $product_column_count = 3;
    if ($product_column_count) {
        $col_class = 12 / $product_column_count;
        $product_column = 'col-md-' . $col_class;
    }
?>

<?php $__env->startSection('content'); ?>
<div class="shop-area-wrapper grid-only" id="shop">
    <div class="container">
        <div class="row">
            <div class="<?php echo e($product_section_width); ?> <?php echo e($sidebar_position); ?>">
                <div class="toolbox-wrapper">
                    <div class="toolbox-left">
                        <div class="toolbox-item toolbox-layout">
                            <ul class="layout-list">
                                <li class="layout-item">
                                    <a href="<?php echo e(route('frontend.products.all', ['s' => 'grid'])); ?>" data-style="grid" class="grid-layout <?php if($item_style == 'grid'): ?> current <?php endif; ?>">
                                        <i class="las la-border-all icon"></i>
                                    </a>
                                </li>
                                <li class="layout-item">
                                    <a href="<?php echo e(route('frontend.products.all', ['s' => 'list'])); ?>" data-style="list" class="list-layout <?php if($item_style == 'list'): ?> current <?php endif; ?>">
                                        <i class="las la-list icon"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="toolbox-right">
                        <div class="toolbox-item toolbox-show">
                            <label for="set_item_to_show"><?php echo e(__('show')); ?>:</label>
                            <select id="set_item_to_show" class="select-box">
                                <option value="8"<?php if($display_item_count == 8): ?> selected <?php endif; ?>><?php echo e(__('8')); ?></option>
                                <option value="12"<?php if($display_item_count == 12): ?> selected <?php endif; ?>><?php echo e(__('12')); ?></option>
                                <option value="16"<?php if($display_item_count == 16): ?> selected <?php endif; ?>><?php echo e(__('16')); ?></option>
                                <option value="20"<?php if($display_item_count == 20): ?> selected <?php endif; ?>><?php echo e(__('20')); ?></option>
                            </select>
                        </div>
                        <div class="toolbox-item toolbox-sort">
                            <label for="set_item_sort_by"><?php echo e(__('sort by')); ?>:</label>
                            <select id="set_item_sort_by" class="select-box">
                                <option value="default" <?php if($sort_by == 'default'): ?> selected <?php endif; ?>><?php echo e(__('Default sorting')); ?></option>
                                <option value="popularity" <?php if($sort_by == 'popularity'): ?> selected <?php endif; ?>><?php echo e(__('Sort by popularity')); ?></option>
                                <option value="latest" <?php if($sort_by == 'latest'): ?> selected <?php endif; ?>><?php echo e(__('Sort by latest')); ?></option>
                                <option value="price_low" <?php if($sort_by == 'price_low'): ?> selected <?php endif; ?>><?php echo e(__('Sort by pric: low to high')); ?></option>
                                <option value="price_high" <?php if($sort_by == 'price_high'): ?> selected <?php endif; ?>><?php echo e(__('Sort by pric: high to low')); ?></option>
                            </select>
                        </div>
                    </div>
                </div>

                <?php if(isset($style) && $style == 'list'): ?>
                <div class="product-wrap">
                    <?php $__currentLoopData = $all_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.frontend.product.product-list','data' => ['product' => $product]]); ?>
<?php $component->withName('frontend.product.product-list'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['product' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php else: ?>
                <div class="row">
                    <?php $__currentLoopData = $all_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.frontend.product.product-card','data' => ['product' => $product,'column' => $product_column]]); ?>
<?php $component->withName('frontend.product.product-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['product' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product),'column' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product_column)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php endif; ?>
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="pagination-default">
                            <?php echo $all_products->links(); ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="<?php echo e($sidebar_section_width); ?>">
                <div class="widget-area-wrapper">
                    <div class="widget widget-search">
                        <h5 class="widget-title"><?php echo e(__('Product Search')); ?></h5>
                        <form class="form-inline" id="search_form">
                            <div class="form-group">
                                <input type="search" class="form-control" id="search_query" name="search_query" placeholder="<?php echo e(__('search...')); ?>" value="<?php echo e(request()->q ?? ''); ?>">
                            </div>
                            <button type="submit" class="form-btn-1"><i class="las la-search"></i></button>
                        </form>
                    </div>

                    <div class="widget widget-range">
                        <h5 class="widget-title"><?php echo e(__('filter by price')); ?></h5>
                        <div id="slider-range"></div>
                        <div class="range">
                            <div class="range-details">
                                <span class="min_filter_price min"><?php echo e(amount_with_currency_symbol($min_price)); ?></span>
                                <span class="max_filter_price max"><?php echo e(amount_with_currency_symbol($max_price)); ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="widget widget-category">
                        <h5 class="widget-title"><?php echo e(__('category')); ?></h5>
                        <div class="widget-check-box checkbox-catagory">
                            <?php $__currentLoopData = $all_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="single-checkbox-wrap">
                                <label>
                                    <input type="radio" name="product_cat" class="radio" <?php if(request()->cat == $category->id): ?> checked <?php endif; ?> value="<?php echo e($category->id); ?>">
                                    <span class="checkmark"><?php echo e($category->title); ?></span>
                                </label>
                                <div class="widget-check-box checkbox-catagory ml-4">
                                    <?php $__currentLoopData = $category->subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="single-checkbox-wrap">
                                        <label>
                                            <input type="radio" name="product_subcat" class="radio" <?php if(request()->subcat == $subcategory->id): ?> checked <?php endif; ?> value="<?php echo e($subcategory->id); ?>">
                                            <span class="checkmark"><?php echo e($subcategory->title); ?></span>
                                        </label>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>

                    <?php $__currentLoopData = $all_attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $attributes = json_decode($attribute, true);
                            $attribute_terms = json_decode($attributes['terms'], true);
                            // selected attributes for filter
                            $selected_attrbutes = [];
                            if (request()->attr) {
                                $filter_attributes = json_decode(request()->attr, true);
                                if (is_array($filter_attributes)) {
                                    foreach ($filter_attributes as $key => $attr) {
                                        if (isset($attr['id']) && isset($attr['attribute'])) {
                                            $selected_attrbutes[$attr['id']] = $attr['attribute'];
                                        }
                                    }
                                }
                            }
                        ?>
                        <?php if($attribute_terms && count($attribute_terms)): ?>
                        <div class="widget widget-color">
                            <h5 class="widget-title"><?php echo e($attribute->title); ?></h5>
                            <div class="checkbox-size">
                                <?php $__currentLoopData = $attribute_terms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $term): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="single-checkbox-wrap attribute">
                                    <label>
                                        <input type="radio" name="<?php echo e($attribute->title); ?>" 
                                            class="checkbox attribute_item" 
                                            data-attr-type="<?php echo e($attribute->id); ?>" value="<?php echo e($term); ?>"
                                            <?php if(count($selected_attrbutes) && isset($selected_attrbutes[$attribute->id]) && $selected_attrbutes[$attribute->id] == $term): ?>
                                                checked
                                            <?php endif; ?>
                                        >
                                        <span class="size-code"><?php echo e($term); ?></span>
                                    </label>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <div class="widget widget-rating">
                        <h5 class="widget-title"><?php echo e(__('Average Rating')); ?></h5>
                        <?php
                        $searched_rating = 0;
                            if(isset(request()->rt) && request()->rt > 0 && request()->rt < 6) {
                                $searched_rating = request()->rt;
                            }
                        ?>
                        <div class="widget-check-box checkbox-rating">
                            <div class="single-checkbox-wrap">
                                <label>
                                    <input type="radio" name="filter_rating" data-value="5" class="checkbox filter_rating" <?php if($searched_rating == 5): ?> checked <?php endif; ?>>
                                    <span class="checkmark">
                                        <i class="las la-star"></i>
                                        <i class="las la-star"></i>
                                        <i class="las la-star"></i>
                                        <i class="las la-star"></i>
                                        <i class="las la-star"></i>
                                    </span>
                                </label>
                            </div>
                            <div class="single-checkbox-wrap">
                                <label>
                                    <input type="radio" name="filter_rating" data-value="4" class="checkbox filter_rating" <?php if($searched_rating == 4): ?> checked <?php endif; ?>>
                                    <span class="checkmark">
                                        <i class="las la-star"></i>
                                        <i class="las la-star"></i>
                                        <i class="las la-star"></i>
                                        <i class="las la-star"></i>
                                        <i class="lar la-star"></i>
                                    </span>
                                </label>
                            </div>
                            <div class="single-checkbox-wrap">
                                <label>
                                    <input type="radio" name="filter_rating" data-value="3" class="checkbox filter_rating" <?php if($searched_rating == 3): ?> checked <?php endif; ?>>
                                    <span class="checkmark">
                                        <i class="las la-star"></i>
                                        <i class="las la-star"></i>
                                        <i class="las la-star"></i>
                                        <i class="lar la-star"></i>
                                        <i class="lar la-star"></i>
                                    </span>
                                </label>
                            </div>
                            <div class="single-checkbox-wrap">
                                <label>
                                    <input type="radio" name="filter_rating" data-value="2" class="checkbox filter_rating" <?php if($searched_rating == 2): ?> checked <?php endif; ?>>
                                    <span class="checkmark">
                                        <i class="las la-star"></i>
                                        <i class="las la-star"></i>
                                        <i class="lar la-star"></i>
                                        <i class="lar la-star"></i>
                                        <i class="lar la-star"></i>
                                    </span>
                                </label>
                            </div>
                            <div class="single-checkbox-wrap">
                                <label>
                                    <input type="radio" name="filter_rating" data-value="1" class="checkbox filter_rating" <?php if($searched_rating == 1): ?> checked <?php endif; ?>>
                                    <span class="checkmark">
                                        <i class="las la-star"></i>
                                        <i class="lar la-star"></i>
                                        <i class="lar la-star"></i>
                                        <i class="lar la-star"></i>
                                        <i class="lar la-star"></i>
                                    </span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="widget widget-tag">
                        <h5 class="widget-title"><?php echo e(__('tags')); ?></h5>
                        <div class="tag">
                            <?php $__currentLoopData = $all_tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="#" class="tag-btn <?php if(request()->t == $tag->tag_text): ?> selected <?php endif; ?>"><?php echo e($tag->tag_text); ?></a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<form action="" id="sort_form" style="display: none">
    <input type="hidden" id="count" name="count" value="<?php echo e(request()->count ?? ''); ?>">
    <input type="hidden" id="sort" name="sort" value="<?php echo e(request()->sort ?? ''); ?>">
    <input type="hidden" id="pr" name="pr" value="<?php echo e(request()->pr ?? ''); ?>">
    <input type="hidden" id="pr_min" name="pr_min" value="<?php echo e(request()->pr_min ?? ''); ?>">
    <input type="hidden" id="pr_max" name="pr_max" value="<?php echo e(request()->pr_max ?? ''); ?>">
    <input type="hidden" id="s" name="s" value="<?php echo e(request()->s ? request()->s : ''); ?>">
    <input type="hidden" id="q" name="q" value="<?php echo e(request()->q ? request()->q : ''); ?>">
    <input type="hidden" id="cat" name="cat" value="<?php echo e(request()->cat ? request()->cat : ''); ?>">
    <input type="hidden" id="subcat" name="subcat" value="<?php echo e(request()->subcat ? request()->subcat : ''); ?>">
    <input type="hidden" id="attr" name="attr" value="<?php echo e(request()->attr ? request()->attr : ''); ?>">
    <input type="hidden" id="rt" name="rt" value="<?php echo e(request()->rt ? request()->rt : ''); ?>">
    <input type="hidden" id="t" name="t" value="<?php echo e(request()->t ? request()->t : ''); ?>">
</form>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/jquery-ui.min.css')); ?>">
<script src="<?php echo e(asset('assets/common/js/jquery-ui.min.js')); ?>"></script>

<script>
    (function ($) {
        $(document).ready(function () {
            $( "#slider-range" ).slider({
                range: true,
                min: 0,
                max: "<?php echo e($maximum_available_price); ?>",
                values: [ "<?php echo e($min_price); ?>", "<?php echo e($max_price); ?>" ],
                slide: function( event, ui ) {
                    var min_price = ui.values[0];
                    var max_price = ui.values[1];
                    var siteGlobalCurrency = "<?php echo e(site_currency_symbol()); ?>";
                    $('.min_filter_price').text(siteGlobalCurrency+min_price);
                    $('.max_filter_price').text(siteGlobalCurrency+max_price);
                    $('#pr_min').val(min_price);
                    $('#pr_max').val(max_price);
                    $('#sort_form').trigger('submit');
                }
            });

            $('#set_item_to_show').on('change', function () {
                let val = $(this).val();
                $('#count').val(val);
                $('#sort_form').trigger('submit');
            });

            $('#set_item_sort_by').on('change', function () {
                let val = $(this).val();
                $('#sort').val(val);
                $('#sort_form').trigger('submit');
            });

            $('#search_query').on('change', function () {
                let val = $(this).val();
                $('#q').val(val);
            });

            $('input[name=product_cat]').on('change', function (e) {
                let val = $('input[name=product_cat]:checked').val();
                $('#cat').val(val);
                $('#sort_form').trigger('submit');
            });

            $('input[name=product_subcat]').on('change', function (e) {
                let val = $('input[name=product_subcat]:checked').val();
                $('#subcat').val(val);
                $('#sort_form').trigger('submit');
            });

            $('.attribute_item').on('change', function () {
                let selected_attributes = $('.attribute_item:checked');
                let selected_attributes_arr = [];
                let selected_attributes_json = '';
                for (let i = 0; i < selected_attributes.length; i++) {
                    selected_attributes_arr.push({
                        id: $(selected_attributes[i]).data('attr-type'),
                        attribute: $(selected_attributes[i]).val()
                    });
                }
                selected_attributes_json = JSON.stringify(selected_attributes_arr);
                $('#attr').val(selected_attributes_json);
                $('#sort_form').trigger('submit');
            });

            $('.filter_rating').on('change', function () {
                let seletected_rating = $('.filter_rating:checked').data('value');
                $('#rt').val(seletected_rating);
                $('#sort_form').trigger('submit');
            });

            $('.tag-btn').on('click', function (e) {
                e.preventDefault();
                let seletected_tag = $(this).text();
                $('#t').val(seletected_tag);
                $('#sort_form').trigger('submit');
            });

            $('.grid-layout').on('click', function (e) {
                e.preventDefault();
                let display_style = $(this).data('style')
                $('#s').val(display_style);
                $('#sort_form').trigger('submit');
            });

            $('.list-layout').on('click', function (e) {
                e.preventDefault();
                let display_style = $(this).data('style')
                $('#s').val(display_style);
                $('#sort_form').trigger('submit');
            });

            $('#search_form').on('submit', function (e) {
                e.preventDefault();
                $('#sort_form').trigger('submit');
            });
        });     
    })(jQuery)
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bytesed/public_html/laravel/zaika/@core/resources/views/landing/shop.blade.php ENDPATH**/ ?>