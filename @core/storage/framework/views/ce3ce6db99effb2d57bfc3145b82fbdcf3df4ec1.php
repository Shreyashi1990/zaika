<?php
    $category_url = route('frontend.blog.category',  ['id' => optional($blog->category)->id, 'name' => optional($blog->category)->title]) ?? '';
?>

<div class="single-blog-item">
    <div class="img-box">
        <?php echo render_image_markup_by_attachment_id($blog->image); ?>

    </div>
    <div class="content">
        <ul class="post-meta">
            <li class="meta-item">
                <a href="<?php echo e(route('frontend.blog.single', $blog->slug)); ?>">
                    <i class="las la-calendar icon"></i>
                    <?php echo e(date_format($blog->created_at, 'Y F Y')); ?>

                </a>
            </li>
            <li class="meta-item">
                <a href="<?php echo e($category_url); ?>">
                    <i class="las la-tag icon"></i>
                    <?php echo e(optional($blog->category)->name); ?>

                </a>
            </li>
        </ul>
        <h4 class="title">
            <a href="<?php echo e(route('frontend.blog.single', $blog->slug)); ?>"><?php echo Str::limit(purify_html_raw($blog->title), 15); ?></a>
        </h4>
        <p class="info"><?php echo Str::words(purify_html_raw(strip_tags($blog->blog_content)), 35); ?></p>
        <div class="btn-wrapper">
            <a href="<?php echo e(route('frontend.blog.single', $blog->slug)); ?>" class="borderless-btn"><?php echo e($readMoreBtnText); ?></a>
        </div>
    </div>
</div>
<?php /**PATH /home/bytesed/public_html/laravel/zaika/@core/resources/views/components/frontend/blog/list.blade.php ENDPATH**/ ?>