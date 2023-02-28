<!-- blog new area start -->
<div class="blog-grid-new-area-wrapper" data-padding-top="<?php echo e($padding_top); ?>" data-padding-bottom="<?php echo e($padding_bottom); ?>">
    <div class="container custom-container-1410">
        <div class="row">
            <?php $__currentLoopData = $all_blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-sm-6 col-md-4 col-lg-4">
                    <div class="single-blog-gird-new-item">
                        <div class="img-wrap">
                            <a href="#">
                                <div class="product-bg-img bg-size"
                                     <?php echo render_background_image_markup_by_attachment_id($item->image); ?> data-width="100%"
                                     data-height="318"></div>
                            </a>
                        </div>
                        <div class="content">
                            <h4 class="title">
                                <a href="<?php echo e(route('frontend.blog.single', $item->slug)); ?>"><?php echo e(Str::limit(purify_html(strip_tags($item->title)),120)); ?></a>
                            </h4>

                            <div class="post-meta">
                                <ul class="post-meta-list">
                                    <li class="post-meta-item">
                                        <a href="<?php echo e(route('frontend.blog.single', $item->slug)); ?>">
                                            <span class="text"><?php echo e($item->author); ?></span>
                                        </a>
                                    </li>
                                    <li class="post-meta-item date">
                                        <span class="text"><?php echo e($item->created_at->format("d F Y")); ?></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<!-- blog new area end -->
<?php /**PATH /home/bytesed/public_html/laravel/zaika/@core/app/Providers/../PageBuilder/views/blogs/grid_style_two.blade.php ENDPATH**/ ?>