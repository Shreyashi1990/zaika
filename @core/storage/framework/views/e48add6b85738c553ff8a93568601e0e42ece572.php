
<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Product Inventory')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/nice-select.css')); ?>">
    <style>
        .margin-top-35 {
            margin-top: 35px;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
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
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product-category-edit')): ?>
            <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-body" x-data="inventoryDetails()">
                        <h4 class="header-title"><?php echo e(__('Edit Product Inventory')); ?></h4>
                        <div class="text-right">
                            <a href="<?php echo e(route('admin.products.inventory.all')); ?>" type="button" class="btn btn-primary"><?php echo e(__('All Product Stock')); ?></a>
                        </div>
                        <form>
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="id" value="<?php echo e($inventory->id); ?>">
                            <div class="form-group">
                                <label for="product"><?php echo e(__('Product Name')); ?></label>
                                <select name="product_id" id="product_id" class="form-control nice-select wide">
                                    <?php $__currentLoopData = $all_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($product->id); ?>" <?php if($inventory->product_id == $product->id): ?> selected <?php endif; ?>><?php echo e($product->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group mt-5">
                                <label for="sku"><?php echo e(__('SKU')); ?></label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><?php echo e(__('SKU -')); ?></div>
                                    </div>
                                    <input type="text" class="form-control" id="sku" name="sku" placeholder="<?php echo e(__('SKU Text')); ?>" value="<?php echo e(str_replace('SKU-', '', $inventory->sku)); ?>" x-model="inventory.sku">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="stock_count"><?php echo e(__('Stock Count')); ?></label>
                                <input type="number" name="stock_count" class="form-control" placeholder="<?php echo e(__('Stock Count')); ?>" value="<?php echo e($inventory->stock_count); ?>" x-model="inventory.stock_count">
                            </div>

                            <p class="h6 mt-5" x-bind:class="inventory.details.length ? 'd-block' : 'd-none'"><?php echo e(__('Stock Details')); ?></p>

                            <template x-for="[details_key, details] in Object.entries(inventory.details)">
                                <div class="row attribute_row">   
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="attribute_id"><?php echo e(__('Attribute Name')); ?></label>
                                            <select name="attribute_id" class="form-control attribute_name"
                                                @change="setData($event.target.value, attributes, details_key)"
                                            >
                                                <template x-for="attribute in attributes">
                                                    <option x-value="attribute.id " x-bind:data-id="attribute.id" x-text="attribute.title"></option>
                                                </template>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="attribute_values"><?php echo e(__('Attribute Value')); ?></label>
                                            <select name="attribute_values" id="attribute_values" class="form-control attribute_value">
                                                <template x-for="value in present_attribute_value[details_key]">
                                                    <option x-value="value" x-text="value"></option>
                                                </template>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-row">
                                            <div class="col">
                                                <label for="stock_count"><?php echo e(__('Stock Count')); ?></label>
                                                <input type="number" class="form-control stock_count" name="stock_count">
                                            </div>
                                            <div class="col-auto">
                                                <div class="margin-top-35">
                                                    <a tabindex="0" class="btn btn-danger btn-xs mb-3 mr-1" @click="deleteDetails(details)">
                                                        <i class="ti-trash"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </template>

                            <div class="text-right">
                                <button type="button" @click="submitForm()" class="btn btn-primary">
                                    <i class="ti-check-box submit-btn"></i>
                                    <?php echo e(__('Update Inventory Details')); ?>

                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.datatable.js','data' => []]); ?>
<?php $component->withName('datatable.js'); ?>
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
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.table.btn.swal.js','data' => []]); ?>
<?php $component->withName('table.btn.swal.js'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <script src="<?php echo e(asset('assets/backend/js/jquery.nice-select.min.js')); ?>"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script>
        function inventoryDetails() {
            return {
                inventory: {
                    product_id: undefined,
                    sku: '<?php echo e($inventory->sku); ?>',
                    stock_count: <?php echo e($inventory->stock_count); ?>,
                    details: [
                        <?php $__currentLoopData = $inventory->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            {
                                id: <?php echo e($details->id); ?>,
                                attribute_id: <?php echo e($details->attribute_id); ?>,
                                attribute_value: '<?php echo e($details->attribute_value); ?>',
                                stock_count: '<?php echo e($details->stock_count); ?>',
                            },
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    ],
                },
                attributes: <?php echo $all_attributes->toJson(); ?>,
                present_attribute_value: [
                    <?php $__currentLoopData = $inventory->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $all_attributes->find($details->attribute_id)->terms; ?>,
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                ],
                addRow() {
                    let attribute = this.attributes[0];
                    this.inventory.details.push({
                        attribute_id: attribute.id,
                        attribute_value: '',
                        stock_count: 0,
                    });
                },
                setData(attribute_value, all_attribute, key) {
                    let present_detail = Object.entries(this.inventory.details)[key];
                    selected_attribute = all_attribute.filter(e => e.title == attribute_value);
                    this.setPresentAttrVal(selected_attribute[0].terms, present_detail, key);
                },
                setPresentAttrVal(data, details, key) {
                    this.present_attribute_value[key] = JSON.parse(data);
                },
                deleteDetails(details) {
                    Swal.fire({
                        title: "<?php echo e(__('Do you want to delete this item?')); ?>",
                        showCancelButton: true,
                        confirmButtonText: 'Delete',
                        confirmButtonColor: '#dd3333',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            let route = '<?php echo e(route("admin.products.inventory.delete")); ?>';
                            $.post(route, {_token: '<?php echo e(csrf_token()); ?>', id: details.id}).then(function (data) {
                                if (data) {
                                    Swal.fire('Deleted!', '', 'success');
                                    setTimeout(function () {
                                        location.reload();
                                    }, 1000);
                                }
                            });
                        }
                    });
                },
                submitForm() {
                    this.inventory.product_id = $('#product_id').val();
                    let all_attributes = $('.attribute_row');
                    let result = {
                        _token : '<?php echo e(csrf_token()); ?>',
                        id: '<?php echo e($inventory->id); ?>',
                        product_id: this.inventory.product_id,
                        sku: this.inventory.sku,
                        stock_count: this.inventory.stock_count,
                        inventory_details: []
                    };

                    for (let i = 0; i < all_attributes.length; i++) {
                        result.inventory_details.push({
                            attribute_id: $($('.attribute_name')[i]).find(':selected').data('id'),
                            attribute_value: $($('.attribute_value')[i]).val(),
                            stock_count: $($('.stock_count')[i]).val(),
                        });
                    };

                    $.ajax({
                        url: `<?php echo e(route('admin.products.inventory.update')); ?>`,
                        method: 'POST',
                        data: result,
                        success: data => {
                            if (data.type == 'success') {
                                Swal.fire('Success!', '', 'success');
                                setTimeout(() => {
                                    location.reload();
                                }, 1000);
                            }
                        },
                        error: err => {
                            if (err.responseJSON.errors) {
                                let err_msg = '';
                                Object.values(err.responseJSON.errors).map(e => {
                                    err_msg += e[0] + '<br>';
                                });
                                Swal.fire(err_msg, '', 'error');
                            }
                        }
                    });
                },
            };
        }
    </script>

    <script>
        (function ($) {
            'user script'
            $(document).ready(function () {
                if ($('.nice-select').length > 0) {
                    $('.nice-select').niceSelect();
                }

                let all_attributes = $('.attribute_row');

                <?php $__currentLoopData = $inventory->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    $($('.attribute_name')[<?php echo e($key); ?>]).val('<?php echo e($all_attributes->find($details->attribute_id)->title); ?>');
                    $($('.stock_count')[<?php echo e($key); ?>]).val(<?php echo e($details->stock_count); ?>);
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            });
        })(jQuery)
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bytesed/public_html/laravel/zaika/@core/resources/views/backend/products/inventory/edit.blade.php ENDPATH**/ ?>