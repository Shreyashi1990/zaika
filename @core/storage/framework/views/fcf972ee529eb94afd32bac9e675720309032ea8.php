<?php
    $category_url = route('frontend.blog.category',  ['id' => optional($blog->category)->id, 'name' => optional($blog->category)->title]) ?? '';
    $read_more_btn_text = get_static_option('blog_page_read_more_btn_text');
?>

<div class="col-md-6 col-lg-4">
    <div class="single-blog-item">
        <div class="img-box">
            <?php echo render_image_markup_by_attachment_id($blog->image); ?>

        </div>
        <div class="content">
            <ul class="post-meta">
                <li class="meta-item">
                    <a href="<?php echo e(route('frontend.blog.single', $blog->slug)); ?>">
                        <i class="las la-calendar icon"></i>
                        <?php echo e($blog->created_at->format('D M Y')); ?>

                    </a>
                </li>
                <li class="meta-item">
                    <a href="<?php echo e($category_url); ?>">
                        <i class="las la-tag icon"></i>
                        <?php echo e(optional($blog->category)->name); ?>

                    </a>
                </li>
            </ul>
            <h4 class="title"><a href="<?php echo e(route('frontend.blog.single', $blog->slug)); ?>"><?php echo Str::limit(purify_html_raw(strip_tags($blog->title)), 55); ?></a></h4>
            <div class="btn-wrapper">
                <a href="<?php echo e(route('frontend.blog.single', $blog->slug)); ?>" class="borderless-btn"><?php echo e($readMoreBtnText); ?></a>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/bytesed/public_html/laravel/zaika/@core/resources/views/components/frontend/blog/grid.blade.php ENDPATH**/ ?>