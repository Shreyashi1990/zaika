
<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Edit Product')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
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
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.product.more-info.css','data' => []]); ?>
<?php $component->withName('product.more-info.css'); ?>
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
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.niceselect.css','data' => []]); ?>
<?php $component->withName('niceselect.css'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/bootstrap-tagsinput.css')); ?>">
    <style>
        #attribute_price_container {
            /* display: none; */
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-lg-12 col-ml-12 padding-bottom-30" id="app">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40">
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
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.msg.flash','data' => []]); ?>
<?php $component->withName('msg.flash'); ?>
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
            </div>
            <div class="col-lg-12">
                <div class="text-right mb-5">
                    <a href="<?php echo e(route('admin.products.all')); ?>" class="btn btn-primary"><?php echo e(__('All Products')); ?></a>
                </div>
                <form action="<?php echo e(route('admin.products.update', $product->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="row mt-3">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body p-5">
                                    <h5 class="mb-5"><?php echo e(__('Product Information')); ?></h5>
                                    <div class="form-group">
                                        <label for="title"><?php echo e(__('Name')); ?></label>
                                        <input type="text" name="title" id="title" class="form-control" value="<?php echo e(html_entity_decode($product->title)); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="slug"><?php echo e(__('Slug')); ?></label>
                                        <input type="text" name="slug" id="slug" class="form-control" value="<?php echo e($product->slug); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="summary"><?php echo e(__('Summary')); ?></label>
                                        <textarea class="form-control" name="summary" id="summary" cols="30" rows="3"><?php echo e($product->summary); ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="description"><?php echo e(__('Description')); ?></label>
                                        <textarea class="form-control summernote" name="description" id="description" cols="30" rows="10"><?php echo e($product->description); ?></textarea>
                                    </div>
                                    <div class="form-group " id="blog_tag_list">
                                        <?php
                                            $tags = $product->tags;
                                            $tags_str = "";
                                            if ($tags) {
                                                foreach ($tags as $key => $product_tag) {
                                                    $seperator = $key != count($tags) - 1 ? "," : "";
                                                    $tags_str .= $product_tag->tag . $seperator;
                                                }
                                            }
                                        ?>
                                        <label for="title"><?php echo e(__('Tag')); ?></label>
                                        <input type="text" class="form-control tags_filed" data-role="tagsinput"
                                               name="tags"  value=" <?php echo e($tags_str); ?>">

                                        <div id="show-autocomplete" style="display: none;">
                                            <ul class="autocomplete-warp" ></ul>
                                        </div>
                                    </div>
                                    <div id="attribute_price_container">
                                        <h5 class="my-3"><?php echo e(__('Attributes')); ?></h5>
                                        <?php
                                            $all_attributes = json_decode($product->attributes, true);
                                        ?>
                                        <?php if(is_array($all_attributes)): ?>
                                            <?php $__empty_1 = true; $__currentLoopData = $all_attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute_id => $attributes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for=""><?php echo e(__('Attribute')); ?></label>
                                                            <input type="hidden" name="attribute_id[]" value="<?php echo e($attribute_id); ?>" />
                                                            <input type="hidden" name="attribute_selected[]" value="<?php echo e($attribute['name']); ?>" />
                                                            <input type="hidden" name="attribute_name[]" value="<?php echo e($attribute['type']); ?>" />
                                                            <input type="text" class="form-control font-weight-bold" value="<?php echo e($attribute['type']); ?>: <?php echo e($attribute['name']); ?>" disabled="">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for=""><?php echo e(__('Additional price amount')); ?></label>
                                                            <input type="number" class="form-control" name="attr_additional_price[]" value="<?php echo e($attribute['additional_price']); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.media-upload','data' => ['title' => __('Attribute Image'),'id' => $attribute['attribute_image'] ?? '','name' => 'attribute_image[]','dimentions' => '1280x1280']]); ?>
<?php $component->withName('media-upload'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Attribute Image')),'id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attribute['attribute_image'] ?? ''),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('attribute_image[]'),'dimentions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('1280x1280')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                                    </div>
                                                    <div class="col-auto">
                                                        <button class="btn btn-sm btn-danger margin-top-30 remove_attribute">-</button>
                                                    </div>
                                                </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                <span id="no_attributes"><?php echo e(__('No Attributes')); ?></span> 
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="card mt-3">
                                <div class="card-body px-5 pb-5">
                                    <div class="additional_info_container">
                                        <h5 class="mb-5"><?php echo e(__('Additional Information')); ?></h5>
                                        <div class="additional_info">
                                            <?php if($product->additionalInfo): ?>
                                                <?php $__currentLoopData = $product->additionalInfo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $additional_info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.product.more-info.repeater','data' => ['infoTitle' => $additional_info->title,'infoText' => $additional_info->text]]); ?>
<?php $component->withName('product.more-info.repeater'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['infoTitle' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($additional_info->title),'infoText' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($additional_info->text)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.product.more-info.repeater','data' => ['isFirst' => true]]); ?>
<?php $component->withName('product.more-info.repeater'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['isFirst' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                            <?php else: ?>
                                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.product.more-info.repeater','data' => ['isFirst' => true]]); ?>
<?php $component->withName('product.more-info.repeater'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['isFirst' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="mb-5 mt-3"><?php echo e(__('Stock Information')); ?></h5>
                                    <div class="form-group">
                                        <label for="sku"><?php echo e(__('Product SKU')); ?></label>
                                        <input type="text" id="sku" name="sku" class="form-control" required value="<?php echo e(optional($product->inventory)->sku ?? ''); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="stock_count"><?php echo e(__('Items in Stock')); ?></label>
                                        <input type="number" id="stock_count" name="stock_count" class="form-control" required value="<?php echo e(optional($product->inventory)->stock_count ?? 0); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="mb-5 mt-3"><?php echo e(__('More Information')); ?></h5>
                                    <div class="form-row mb-3">
                                        <div class="col">
                                            <label for="price"><?php echo e(__('Regular Price')); ?></label>
                                            <input type="number" name="price" id="price" class="form-control" step="0.01"  value="<?php echo e($product->price); ?>">
                                        </div>
                                        <div class="col">
                                            <label for="sale_price"><?php echo e(__('Sale Price')); ?></label>
                                            <input type="number" name="sale_price" id="sale_price" step="0.01" class="form-control" value="<?php echo e($product->sale_price); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="attributes_options"><?php echo e(__('Attributes')); ?></label>
                                        <div class="form-row">
                                            <div class="col">
                                                <select class="form-control" name="attributes_options" id="attributes_options">
                                                    <option value=""><?php echo e(__('Select Attribute')); ?></option>
                                                    <?php $__currentLoopData = $all_attribute; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($attribute->id); ?>" data-terms="<?php echo e($attribute->terms); ?>"><?php echo e($attribute->title); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="attribute_container"></div>
                                    <div class="form-group">
                                        <label for="category_id"><?php echo e(__('Category')); ?></label>
                                        <select class="form-control" name="category_id" id="category_id">
                                            <?php $__currentLoopData = $all_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($category->id); ?>" <?php if($product->category_id == $category->id): ?> selected <?php endif; ?>><?php echo e($category->title); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="sub_category_id"><?php echo e(__('Sub-category')); ?></label>
                                        <?php
                                            $subcategories = json_decode($product->sub_category_id, true);
                                        ?>
                                        <?php if($subcategories): ?>
                                        <select class="form-control nice-select wide" name="sub_category_id[]" id="sub_category_id" multiple>
                                            <?php $__currentLoopData = $all_sub_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($subcategory->id); ?>" <?php if(in_array($subcategory->id, $subcategories)): ?> selected <?php endif; ?>><?php echo e($subcategory->title); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php else: ?>
                                        <select class="form-control nice-select wide" name="sub_category_id[]" id="sub_category_id" multiple>
                                            <option value=""><?php echo e(__("Select Sub-category")); ?></option>
                                            <?php $__currentLoopData = $all_sub_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($subcategory->id); ?>"><?php echo e($subcategory->title); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php endif; ?>
                                        <span class="text-secondary">(<?php echo e(__('Press ')); ?> <kbd><?php echo e(__('Ctrl')); ?></kbd> <?php echo e(__(' and Click to select multiple options')); ?>)</span>
                                    </div>
                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.media-upload','data' => ['title' => __('Image'),'id' => $product->image,'name' => 'image','dimentions' => '1280x1280','multiple' => true,'galleryImages' => $product->product_image_gallery]]); ?>
<?php $component->withName('media-upload'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Image')),'id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product->image),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('image'),'dimentions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('1280x1280'),'multiple' => true,'galleryImages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product->product_image_gallery)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                    <div class="form-group">
                                        <label for="badge"><?php echo e(__('Badge')); ?></label>
                                        <input type="text" name="badge" id="badge" class="form-control" value="<?php echo e($product->badge); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="status"><?php echo e(__('Status')); ?></label>
                                        <select class="form-control" name="status" id="status">
                                            <option value="draft" <?php if($product->status == 'draft'): ?> selected <?php endif; ?>><?php echo e(__('Draft')); ?></option>
                                            <option value="publish" <?php if($product->status == 'publish'): ?> selected <?php endif; ?>><?php echo e(__('Publish')); ?></option>
                                        </select>
                                    </div>
                                    <div class="text-center mt-5">
                                        <button class="btn btn-primary"><?php echo e(__('Update Product')); ?></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
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
<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.product.more-info.js','data' => []]); ?>
<?php $component->withName('product.more-info.js'); ?>
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
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.niceselect.js','data' => []]); ?>
<?php $component->withName('niceselect.js'); ?>
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
<script src="<?php echo e(asset('assets/backend/js/bootstrap-tagsinput.js')); ?>"></script>
<script src="<?php echo e(asset('assets/common/js/typeahead.bundle.min.js')); ?>"></script>
<script>
    (function ($) {
        "use strict"
        $(document).ready(function () {
            $('.summernote').summernote({
                height: 500,   //set editable area's height
                codemirror: { // codemirror options
                    theme: 'monokai'
                },
                callbacks: {
                    onChange: function(contents, $editable) {
                        $(this).prev('input').val(contents);
                    }
                }
            });

            if ($('.nice-select').length) {
                $('.nice-select').niceSelect();
            }

            $('#attributes_options').on('change', function () {
                let title = $('#attributes_options').find(':selected').text();
                let title_id = $('#attributes_options').val();
                let terms = $('#attributes_options').find(':selected').data('terms');
                let options = '';

                terms.forEach(e => {
                    options += `<option value="${e}">${e}</option>`;
                });

                let html =  `<div class="form-group">
                               <label>${title}</label>
                               <select class="form-control" data-attr-id="${title_id}" data-attr-name="${title}" multiple>
                                   ${options}
                               </select>
                               <small class="text-secondary"><?php echo e(__('Double click on an option to add')); ?></small>
                            </div>`;

                $('#attribute_container').html(html);
            });

            $('input[name="slug"]').on('keyup', function () {
                let title_text = $(this).val();
                $('input[name="slug"]').val(convertToSlug(title_text))
            });

            $(document).on('click', '.remove_attribute', function () {
                $(this).closest('.row').remove();
                if ($('#attribute_price_container .row').length < 1) {
                    $('#attribute_price_container').hide();
                }
            });

            $(document).on('dblclick', '#attribute_container select option', function (e) {
                let attribute_title = $(e.target).parent().data('attrName');
                let attribute_id = $(e.target).parent().data('attrId');
                let selected_attribute_value = e.target.value;

                if($('#no_attributes').length) {
                    $('#no_attributes').remove();
                }

                $('#attribute_price_container').append(
                    `<div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for=""><?php echo e(__('Attribute')); ?></label>
                                <input type="hidden" name="attribute_id[]" value="${attribute_id}" />
                                <input type="hidden" name="attribute_selected[]" value="${selected_attribute_value}" />
                                <input type="hidden" name="attribute_name[]" value="${attribute_title}" />
                                <input type="text" class="form-control font-weight-bold" value="${attribute_title}: ${selected_attribute_value}" disabled="">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for=""><?php echo e(__('Additional price amount')); ?></label>
                                <input type="number" class="form-control" name="attr_additional_price[]" value="0">
                            </div>
                        </div>
                        <div class="col">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.media-upload','data' => ['title' => __('Attribute Image'),'name' => 'attribute_image[]','dimentions' => '1280x1280']]); ?>
<?php $component->withName('media-upload'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Attribute Image')),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('attribute_image[]'),'dimentions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('1280x1280')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-sm btn-danger margin-top-30 remove_attribute">-</button>
                        </div>
                    </div>`);
 
                if ($('#attribute_price_container .row').length > 0) {
                    $('#attribute_price_container').show();
                }
            });

            let all_tags = <?php echo json_encode($all_tags->pluck('tag_text')); ?>;

            let bindCarList = function () {
                // Call TagsInput on the input, and set the typeahead source to our data
                $('#tags').tagsinput({
                    typeahead: {
                        source: all_tags
                    }
                });

                $('#tags').on('itemAdded', function (event) {
                    // Hide the suggestions menu
                    $('.typeahead.dropdown-menu').css('display', 'none')
                    // Clear the typed text after a tag is added
                    $('.bootstrap-tagsinput > input').val("");
                });
            }

            function convertToSlug(slug) {
                let finalSlug = slug.replace(/[^a-zA-Z0-9]/g, ' ');
                //remove multiple space to single
                finalSlug = slug.replace(/  +/g, ' ');
                // remove all white spaces single or multiple spaces
                finalSlug = slug.replace(/\s/g, '-').toLowerCase().replace(/[^\w-]+/g, '-');
                return finalSlug;
            }

            var blogTagInput = $('#blog_tag_list .tags_filed');
            var oldTag = '';
            blogTagInput.tagsinput();

            //For Tags
            $(document).on('keyup','#blog_tag_list .bootstrap-tagsinput input[type="text"]',function (e) {
                e.preventDefault();
                var el = $(this);
                var inputValue = $(this).val();
                $.ajax({
                    type: 'get',
                    url :  "<?php echo e(route('admin.products.tag.get.ajax')); ?>",
                    async: false,
                    data: {
                        query: inputValue
                    },

                    success: function (data){
                        oldTag = inputValue;
                        let html = '';
                        var showAutocomplete = '';
                        $('#show-autocomplete').html('<ul class="autocomplete-warp"></ul>');
                        if(el.val() != '' && data.markup != ''){


                            data.result.map(function (tag, key) {
                                html += '<li class="tag_option" data-id="'+tag.id+'" data-val="'+tag.tag+'">' + tag.tag + '</li>'
                            })

                            $('#show-autocomplete ul').html(html);
                            $('#show-autocomplete').show();


                        } else {
                            $('#show-autocomplete').hide();
                            oldTag = '';
                        }

                    },
                    error: function (res){

                    }
                });
            });

            $(document).on('click', '.tag_option', function(e) {
                e.preventDefault();

                let id = $(this).data('id');
                let tag = $(this).data('val');
                blogTagInput.tagsinput('add', tag);
                $(this).parent().remove();
                blogTagInput.tagsinput('remove', oldTag);
            });
        });
    })(jQuery)
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bytesed/public_html/laravel/zaika/@core/resources/views/backend/products/product/edit.blade.php ENDPATH**/ ?>