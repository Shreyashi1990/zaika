<!-- call to action area start -->
<div class="new-call-to-action-area-wrapper style-01 bg-color-cta-01" data-padding-top="<?php echo e($padding_top); ?>" data-padding-bottom="<?php echo e($padding_bottom); ?>">
    <div class="container custom-container-1410">
        <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="new-call-to-action-inner">
                    <div class="content">
                        <p class="highlight-text"><?php echo e($sub_title); ?></p>
                        <h3 class="main-title"><?php echo e(html_entity_decode($title)); ?></h3>
                        <p class="info"><?php echo e($summary); ?></p>


                        <div class="btn-wrapper">
                            <a href="<?php echo e(url($url)); ?>" class="default-btn color-black"><?php echo e($btn_text); ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <div class="new-call-to-action-inner round-shadow-01">
                    <div class="img-box">
                        <?php echo render_image_markup_by_attachment_id($image); ?>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- call to action area end -->
<?php /**PATH /home/bytesed/public_html/laravel/zaika/@core/app/Providers/../PageBuilder/views/product/banner_style_five.blade.php ENDPATH**/ ?>