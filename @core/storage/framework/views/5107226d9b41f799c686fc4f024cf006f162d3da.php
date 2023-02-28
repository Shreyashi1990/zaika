
<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Product Inventory')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/frontend/css/jquery.fancybox.min.css')); ?>">
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.datatable.css','data' => []]); ?>
<?php $component->withName('datatable.css'); ?>
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
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.bulk-action.css','data' => []]); ?>
<?php $component->withName('bulk-action.css'); ?>
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
<?php $__env->startSection('content'); ?>
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
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
                    <div class="header-wrap d-flex justify-content-between">
                        <div class="left-wrap">
                            <h4 class="header-title"><?php echo e(__('All Product Orders')); ?></h4>
                            <div class="bulk-delete-wrapper">
                                <div class="select-box-wrap">
                                    <select name="bulk_option" id="bulk_option">
                                        <option value=""><?php echo e(__('Bulk Action')); ?></option>
                                        <option value="delete"><?php echo e(__('Delete')); ?></option>
                                    </select>
                                    <button class="btn btn-primary btn-sm"
                                        id="bulk_delete_btn"><?php echo e(__('Apply')); ?></button>
                                </div>
                            </div>
                        </div>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product-order-create')): ?>
                        <div class="righ-wrap">
                            <a href="<?php echo e(route('admin.product.order.new')); ?>" class="btn btn-primary">
                                <?php echo e(__('Create An Order')); ?>

                            </a>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="data-tables datatable-primary table-responsive">
                        <table id="all_user_table">
                            <thead class="text-capitalize">
                                <tr>
                                    <th class="no-sort">
                                        <div class="mark-all-checkbox">
                                            <input type="checkbox" class="all-checkbox">
                                        </div>
                                    </th>
                                    <th><?php echo e(__('Order ID')); ?></th>
                                    <th><?php echo e(__('Billing Name')); ?></th>
                                    <th><?php echo e(__('Billing Email')); ?></th>
                                    <th><?php echo e(__('Total Amount')); ?></th>
                                    <th><?php echo e(__('Package Gateway')); ?></th>
                                    <th><?php echo e(__('Payment Status')); ?></th>
                                    <th><?php echo e(__('Status')); ?></th>
                                    <th><?php echo e(__('Date')); ?></th>
                                    <th><?php echo e(__('Action')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $all_orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <div class="bulk-checkbox-wrapper">
                                                <input type="checkbox" class="bulk-checkbox"
                                                    name="bulk_delete[]" value="<?php echo e($data->id); ?>">
                                            </div>
                                        </td>
                                        <td><?php echo e($data->id); ?></td>
                                        <td><?php echo e($data->name); ?></td>
                                        <td><?php echo e($data->email); ?></td>
                                        <td><?php echo e(float_amount_with_currency_symbol($data->total_amount)); ?></td>
                                        <td><strong><?php echo e(ucwords(str_replace('_', ' ', $data->payment_gateway))); ?></strong>
                                        </td>
                                        <td>
                                            <span class="alert <?php if(in_array($data->payment_status, ['pending', 'canceled', 'in_progress'])): ?> alert-warning <?php else: ?> alert-success <?php endif; ?> text-capitalize"><?php echo e($data->payment_status); ?></span>
                                        </td>
                                        <td>
                                            <?php if($data->status == 'pending'): ?>
                                                <span class="alert alert-warning text-capitalize"><?php echo e($data->status); ?></span>
                                            <?php elseif($data->status == 'in_progress'): ?>
                                                <span class="alert alert-warning d-inline-block text-capitalize"><?php echo e(ucwords(str_replace('_', ' ', $data->status))); ?></span>
                                            <?php elseif($data->status == 'shipped'): ?>
                                                <span class="alert alert-info text-capitalize"><?php echo e($data->status); ?></span>
                                            <?php elseif($data->status == 'complete'): ?>
                                                <span class="alert alert-success text-capitalize"><?php echo e($data->status); ?></span>
                                            <?php elseif($data->status == 'canceled'): ?>
                                                <span class="alert alert-danger text-capitalize"><?php echo e($data->status); ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e(date_format($data->created_at, 'd M Y')); ?></td>
                                        <td>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product-order-delete')): ?>
                                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.delete-popover','data' => ['url' => route('admin.product.order.payment.delete', $data->id)]]); ?>
<?php $component->withName('delete-popover'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['url' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('admin.product.order.payment.delete', $data->id))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product-order-view-details')): ?>
                                                <a href="<?php echo e(route('admin.product.order.view', $data->id)); ?>"
                                                    target="_blank"
                                                    class="btn btn-xs btn-primary btn-sm mb-3 mr-1">
                                                    <i class="ti-eye"></i>
                                                </a>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product-order-update-status')): ?>
                                                <a href="#" data-id="<?php echo e($data->id); ?>"
                                                    data-status="<?php echo e($data->status); ?>" data-toggle="modal"
                                                    data-target="#order_status_change_modal"
                                                    class="btn btn-xs btn-info btn-sm mb-3 mr-1 order_status_change_btn">
                                                    <?php echo e(__('Update Status')); ?>

                                                </a>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product-order-approve-payment')): ?>
                                                <?php if(($data->payment_gateway == 'cash_on_delivery' || $data->payment_gateway == 'manual_payment') && $data->payment_status == 'pending'): ?>
                                                    <a tabindex="0" data-id="<?php echo e($data->id); ?>"
                                                            class="btn btn-xs btn-success btn-sm mb-3 mr-1 approve_payment"
                                                            data-content="
                                                        <h6><?php echo e(__('Are you sure to approve this order?')); ?></h6>
                                                        <form method='post' action='<?php echo e(route('admin.product.order.payment.approve', $data->id)); ?>'>
                                                        <input type='hidden' name='_token' value='<?php echo e(csrf_token()); ?>'>
                                                        <br>
                                                        <input type='submit' class='btn btn-success btn-sm' value='<?php echo e(__('Yes,Please')); ?>'>
                                                        </form>
                                                        " data-original-title="">
                                                            <?php echo e(__('Approve Payment')); ?>

                                                    </a>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product-order-send-alert-mail')): ?>
                                                <?php if(!empty($data->user_id) && $data->payment_status == 'pending'): ?>
                                                    <form action="<?php echo e(route('admin.product.order.reminder')); ?>"
                                                        method="post">
                                                        <?php echo csrf_field(); ?>
                                                        <input type="hidden" name="id"
                                                            value="<?php echo e($data->id); ?>">
                                                        <button class="btn btn-secondary mb-2" type="submit"><i
                                                                class="ti-bell"></i></button>
                                                    </form>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('product-order-generate-invoice')): ?>
                                                <a href="<?php echo e(route('frontend.product.invoice.generate')); ?>" data-id="<?php echo e($data->id); ?>" class="btn btn-xs mb-3 mr-1 btn-secondary download_invoice download_invoice_1" target="_blank"><?php echo e(__('Invoice')); ?></a>
                                            <?php endif; ?>
                                            <?php if($data->payment_gateway == 'bank_transfer' || $data->payment_gateway == 'cheque_payment'): ?>
                                                <a href="<?php echo e(asset($data->checkout_image_path)); ?>" data-fancybox class="btn btn-xs mb-3 mr-1 btn-secondary"><?php echo e(__('Attachment')); ?></a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="view_quote_details_modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="view-quote-details-info" id="view-quote-details-info">
                    <h4 class="title"><?php echo e(__('View Order Details Information')); ?></h4>
                    <div class="view-quote-top-wrap">
                        <div class="status-wrap">
                            <?php echo e(__('Status:')); ?> <span class="quote-status-span"></span>
                        </div>
                        <div class="data-wrap">
                            <?php echo e(__(' Date:')); ?> <span class="quote-date-span"></span>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="quote-all-custom-fields table-striped table-bordered"></table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="order_status_change_modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(__('Order Status Change')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <form action="<?php echo e(route('admin.product.order.status.change')); ?>" method="post"
                    enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <input type="hidden" name="order_id" id="order_id">
                        <div class="form-group">
                            <label for="order_status"><?php echo e(__('order Status')); ?></label>
                            <select name="order_status" class="form-control" id="order_status">
                                <option value="pending"><?php echo e(__('Pending')); ?></option>
                                <option value="in_progress"><?php echo e(__('In Progress')); ?></option>
                                <option value="shipped"><?php echo e(__('Shipped')); ?></option>
                                <option value="canceled"><?php echo e(__('Cancel')); ?></option>
                                <option value="complete"><?php echo e(__('Complete')); ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                        <button type="submit" class="btn btn-primary"><?php echo e(__('Change Status')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
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
    <script src="<?php echo e(asset('assets/frontend/js/jquery.fancybox.min.js')); ?>"></script>
    <script>
        (function ($) {
            'use strict'

            $(document).ready(function($) {
                $(document).on('click', '#bulk_delete_btn', function(e) {
                    e.preventDefault();

                    let bulkOption = $('#bulk_option').val();
                    let allCheckbox = $('.bulk-checkbox:checked');
                    let allIds = [];
                    allCheckbox.each(function(index, value) {
                        allIds.push($(this).val());
                    });
                    if (allIds != '' && bulkOption == 'delete') {
                        $(this).text('<?php echo e(__('Deleting...')); ?>');
                        $.ajax({
                            'type': "POST",
                            'url': "<?php echo e(route('admin.product.order.bulk.action')); ?>",
                            'data': {
                                _token: "<?php echo e(csrf_token()); ?>",
                                ids: allIds
                            },
                            success: function(data) {
                                location.reload();
                            }
                        });
                    }

                });

                $('.all-checkbox').on('change', function(e) {
                    e.preventDefault();
                    let value = $('.all-checkbox').is(':checked');
                    let allChek = $(this).parent().parent().parent().parent().parent().find('.bulk-checkbox');
                    //have write code here fr
                    if (value == true) {
                        allChek.prop('checked', true);
                    } else {
                        allChek.prop('checked', false);
                    }
                });

                $(document).on('click', '#genarate_invoice', function(e) {
                    e.preventDefault();

                    let doc = new jsPDF();
                    let elementHTML = $('#pdf_content_wrapper').html();
                    let specialElementHandlers = {
                        '#elementH': function(element, renderer) {
                            return true;
                        }
                    };
                    doc.fromHTML(elementHTML, 15, 15, {
                        'width': 170,
                        'elementHandlers': specialElementHandlers
                    });

                    // Save the PDF
                    doc.save('sample-document.pdf');

                })

                $(document).on('click', '.view_quote_details_btn', function(e) {
                    e.preventDefault();
                    let el = $(this);
                    let allData = el.data();
                    let parent = $('#view_quote_details_modal');
                    let statusClass = allData.status == 'pending' ? 'alert alert-warning' :
                        'alert alert-success';
                    let allProducts = allData.cart_items;
                    parent.find('.quote-status-span').text(allData.status).addClass(statusClass);
                    parent.find('.quote-date-span').text(allData.date);
                    parent.find('.quote-all-custom-fields').html('');
                    $('#invoice_generate_order_field').val(el.data('order_id'));
                    delete allData.date;
                    delete allData.status;
                    delete allData.target;
                    delete allData.toggle;
                    delete allData.order_id;
                    delete allData.cart_items;
                    $.each(allData, function(index, value) {
                        parent.find('.quote-all-custom-fields').append('<tr><td class="fname">' + index
                            .replace('_', ' ') + '</td> <td class="fvalue">' + value + '</td></tr>');
                    });
                    $.each(allProducts, function(index, value) {
                        parent.find('.quote-all-custom-fields').append(
                            '<tr><td class="fname">Product Name</td> <td class="fvalue">' + value
                            .title + '</td></tr>');
                        parent.find('.quote-all-custom-fields').append(
                            '<tr><td class="fname">Quantity</td> <td class="fvalue">' + value
                            .quantity + '</td></tr>');
                    });
                });

                $('#all_user_table').DataTable({
                    "order": [
                        [1, "desc"]
                    ],
                    'columnDefs': [{
                        'targets': 'no-sort',
                        'orderable': false
                    }]
                });
                $(document).on('click', '.order_status_change_btn', function(e) {
                    e.preventDefault();
                    let el = $(this);
                    let form = $('#order_status_change_modal');
                    form.find('#order_id').val(el.data('id'));
                    form.find('#order_status option[value="' + el.data('status') + '"]').attr('selected', true);
                });
                $(document).on('click', '.download_invoice', function (e) {
                    e.preventDefault();
                    let id = $(this).data('id');
                    $.get('<?php echo e(route("frontend.product.invoice.generate")); ?>', {id: id}).then(function (data) {
                        let mywindow = window.open('', 'new div', 'height=874,width=840');
                        mywindow.document.write(data);
                        mywindow.document.close();
                        mywindow.focus();
                    })
                });

                $(document).on('click', '.approve_payment', function (e) {
                    e.preventDefault();
                    let order_id = $(this).data('id');
                    Swal.fire({
                        title: '<?php echo e(__("Are you sure?")); ?>',
                        text: "<?php echo e(__('You will not be able to revert this!')); ?>",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.post('<?php echo e(route("admin.product.order.payment.approve")); ?>', {
                                    id: order_id, _token: '<?php echo e(csrf_token()); ?>'
                                }).then(function (data) {
                                if (data.type == 'success') {
                                    Swal.fire(data.msg);
                                    setTimeout(function () {
                                        location.reload();
                                    }, 1000);
                                }
                            });
                        }
                    });
                });
            });
        })(jQuery)
        
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bytesed/public_html/laravel/zaika/@core/resources/views/backend/products/order/all.blade.php ENDPATH**/ ?>