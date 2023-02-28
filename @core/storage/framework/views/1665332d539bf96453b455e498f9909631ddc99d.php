<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/bootstrap-tagsinput.css')); ?>">
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.summernote.css','data' => []]); ?>
<?php $component->withName('summernote.css'); ?>
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
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.media.css','data' => []]); ?>
<?php $component->withName('media.css'); ?>
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
<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Edit Blog Post')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.msg.success','data' => []]); ?>
<?php $component->withName('msg.success'); ?>
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
            </div>
            <div class="col-lg-12 mt-t">
                <div class="card">
                    <div class="card-body">
                        <div class="header-wrapp">
                            <h4 class="header-title"><?php echo e(__('Edit Blog Post')); ?>  </h4>
                            <div class="header-title">
                                <a href="<?php echo e(route('admin.blog')); ?>"
                                   class="btn btn-primary mt-4 pr-4 pl-4"><?php echo e(__('All Blog Post')); ?></a>
                            </div>
                        </div>
                        <form action="<?php echo e(route('admin.blog.update',$blog_post->id)); ?>" method="post"
                              enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>


                            <div class="form-group">
                                <label for="title"><?php echo e(__('Title')); ?></label>
                                <input type="text" class="form-control" name="title"
                                       value="<?php echo e($blog_post->title); ?>">
                            </div>
                            <div class="form-group">
                                <label><?php echo e(__('Blog Content')); ?></label>
                                <input type="hidden" name="blog_content" value="<?php echo e($blog_post->blog_content); ?>">
                                <div class="summernote" data-content="<?php echo e($blog_post->blog_content); ?>"></div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="author"><?php echo e(__('Author')); ?></label>
                                    <input type="text" class="form-control" name="author"
                                           value="<?php echo e($blog_post->author); ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="slug"><?php echo e(__('Slug')); ?></label>
                                    <input type="text" class="form-control" name="slug"
                                           value="<?php echo e($blog_post->slug); ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="title"><?php echo e(__('Blog Tags')); ?></label>
                                    <input type="text" class="form-control" name="tags"
                                           data-role="tagsinput" value="<?php echo e($blog_post->tags); ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="meta_tags"><?php echo e(__('Meta Tags')); ?></label>
                                    <input type="text" class="form-control" name="meta_tags"
                                           data-role="tagsinput" value="<?php echo e($blog_post->meta_tags); ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="title"><?php echo e(__('Excerpt')); ?></label>
                                    <textarea name="excerpt" id="excerpt" class="form-control max-height-150" cols="30"
                                              rows="10"><?php echo e($blog_post->excerpt); ?></textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="meta_title"><?php echo e(__('Meta Title')); ?></label>
                                    <input type="text" class="form-control" name="meta_title"
                                           value="<?php echo e($blog_post->meta_title); ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="og_meta_title"><?php echo e(__('Og Meta Title')); ?></label>
                                    <input type="text" class="form-control" name="og_meta_title"
                                           value="<?php echo e($blog_post->og_meta_title); ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="meta_description"><?php echo e(__('Meta Description')); ?></label>
                                    <textarea type="text" class="form-control" name="meta_description"
                                              rows="5" cols="10"><?php echo e($blog_post->meta_description); ?></textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="og_meta_description"><?php echo e(__('Og Meta Description')); ?></label>
                                    <textarea type="text" class="form-control"
                                              name="og_meta_description" rows="5"
                                              cols="10"><?php echo e($blog_post->og_meta_description); ?> </textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-lg-6">
                                    <label for="image"><?php echo e(__('Blog Image')); ?></label>
                                    <div class="media-upload-btn-wrapper">
                                        <div class="img-wrap">
                                            <?php
                                                $image = get_attachment_image_by_id($blog_post->image,null,true);
                                                $image_btn_label = 'Upload Image';
                                            ?>
                                            <?php if(!empty($image)): ?>
                                                <div class="attachment-preview">
                                                    <div class="thumbnail">
                                                        <div class="centered">
                                                            <img class="avatar user-thumb" src="<?php echo e($image['img_url']); ?>"
                                                                 alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php  $image_btn_label = 'Change Image'; ?>
                                            <?php endif; ?>
                                        </div>
                                        <input type="hidden" id="image" name="image"
                                               value="<?php echo e($blog_post->image); ?>">
                                        <button type="button" class="btn btn-info media_upload_form_btn"
                                                data-btntitle="<?php echo e(__('Select Image')); ?>"
                                                data-modaltitle="<?php echo e(__('Upload Image')); ?>" data-toggle="modal"
                                                data-target="#media_upload_modal">
                                            <?php echo e(__($image_btn_label)); ?>

                                        </button>
                                    </div>
                                    <small class="form-text text-muted"><?php echo e(__('allowed image format: jpg,jpeg,png')); ?></small>
                                </div>
                                <div class="form-group col-md-6 col-lg-6">
                                    <label for="og_meta_image"><?php echo e(__('Og Meta Image')); ?></label>
                                    <div class="media-upload-btn-wrapper">
                                        <div class="img-wrap">
                                            <?php
                                                $image = get_attachment_image_by_id($blog_post->og_meta_image,null,true);
                                                $image_btn_label = 'Upload Image';
                                            ?>
                                            <?php if(!empty($image)): ?>
                                                <div class="attachment-preview">
                                                    <div class="thumbnail">
                                                        <div class="centered">
                                                            <img class="avatar user-thumb" src="<?php echo e($image['img_url']); ?>"
                                                                 alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php  $image_btn_label = 'Change Image'; ?>
                                            <?php endif; ?>
                                        </div>
                                        <input type="hidden" id="og_meta_image" name="og_meta_image"
                                               value="<?php echo e($blog_post->og_meta_image); ?>">
                                        <button type="button" class="btn btn-info media_upload_form_btn"
                                                data-btntitle="<?php echo e(__('Select Image')); ?>"
                                                data-modaltitle="<?php echo e(__('Upload Image')); ?>" data-toggle="modal"
                                                data-target="#media_upload_modal">
                                            <?php echo e(__($image_btn_label)); ?>

                                        </button>
                                    </div>
                                    <small class="form-text text-muted"><?php echo e(__('allowed image format: jpg,jpeg,png')); ?></small>
                                </div>

                            </div>

                            <div class="row">
                                <div class="form-group  col-md-6">
                                    <label for="category"><?php echo e(__('Category')); ?></label>
                                    <select name="category" class="form-control" id="category">
                                        <option value=""><?php echo e(__("Select Category")); ?></option>
                                        <?php $__currentLoopData = $all_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php if($category->id == $blog_post->blog_categories_id): ?> selected
                                                    <?php endif; ?>  value="<?php echo e($category->id); ?>"><?php echo e(purify_html($category->name)); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="status"><?php echo e(__('Status')); ?></label>
                                    <select name="status" class="form-control" id="status">
                                        <option value="draft" <?php echo e(($blog_post->status == 'draft' )? 'selected' : ''); ?>><?php echo e(__("Draft")); ?></option>
                                        <option value="publish" <?php echo e(($blog_post->status  == 'publish')? 'selected' : ''); ?>><?php echo e(__("Publish")); ?></option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" id="update"
                                    class="btn btn-primary mt-4 pr-4 pl-4"><?php echo e(__('Update Post')); ?></button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.media.markup','data' => []]); ?>
<?php $component->withName('media.markup'); ?>
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
<?php $__env->startSection('script'); ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.summernote.js','data' => []]); ?>
<?php $component->withName('summernote.js'); ?>
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
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.media.js','data' => []]); ?>
<?php $component->withName('media.js'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <script src="<?php echo e(asset('assets/backend/js/bootstrap-tagsinput.js')); ?>"></script>
    <script>
        (function ($) {
            "use strict";
            $(document).ready(function () {
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.btn.update','data' => []]); ?>
<?php $component->withName('btn.update'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                $('.summernote').summernote({
                    height: 400,   //set editable area's height
                    codemirror: { // codemirror options
                        theme: 'monokai'
                    },
                    callbacks: {
                        onChange: function (contents, $editable) {
                            $(this).prev('input').val(contents);
                        }
                    }
                });
                if ($('.summernote').length > 0) {
                    $('.summernote').each(function (index, value) {
                        $(this).summernote('code', $(this).data('content'));
                    });
                }

                $(document).on("keyup","input[name='slug']",function (){
                    $("input[name='slug']").val(convertToSlug($("input[name='slug']").val()));
                });

                function convertToSlug(slug) {
                    let finalSlug = slug.replace(/[^a-zA-Z0-9]/g, ' ');
                    //remove multiple space to single
                    finalSlug = slug.replace(/  +/g, ' ');
                    // remove all white spaces single or multiple spaces
                    finalSlug = slug.replace(/\s/g, '-').toLowerCase().replace(/[^\w-]+/g, '-');
                    return finalSlug;
                }
            });
        })(jQuery)
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bytesed/public_html/laravel/zaika/@core/resources/views/backend/blog/edit.blade.php ENDPATH**/ ?>