
<?php $__env->startSection('section'); ?>
    <?php if($all_shipping_address && $all_shipping_address->count()): ?>
        <h4 class="mb-5"><?php echo e(__('My Shipping Address')); ?></h4>
        <div class="text-right mb-3">
            <a href="<?php echo e(route('user.shipping.address.new')); ?>" class="btn btn-primary"><?php echo e(__('Add Shipping Address')); ?></a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo e(__('Name')); ?></th>
                    <th><?php echo e(__('Address')); ?></th>
                    <th><?php echo e(__('Action')); ?></th>
                </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $all_shipping_address; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($address->name); ?></td>
                        <td><?php echo e($address->address); ?></td>
                        <td>
                            <a class="btn btn-danger btn-xs mb-3 mr-1 edit_shipping" data-id="<?php echo e($address->id); ?>" data-name="<?php echo e($address->name); ?>" data-address="<?php echo e($address->address); ?>">
                                <i class="las la-edit"></i>
                            </a>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.table.btn.swal.delete','data' => ['route' => route('shipping.address.delete', $address->id),'class' => 'las la-trash']]); ?>
<?php $component->withName('table.btn.swal.delete'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['route' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('shipping.address.delete', $address->id)),'class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('las la-trash')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="alert alert-warning">
            <?php echo e(__('No Shipping Address Found. ')); ?>

            <a class="btn btn-link" href="<?php echo e(route('user.shipping.address.new')); ?>"><?php echo e(__('Create New?')); ?></a>
        </div>
    <?php endif; ?>

    <div class="modal fade" id="edit_shipping_modal" tabindex="-1" role="dialog" aria-labelledby="edit_shipping_modal_label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit_shipping_modal_label"><?php echo e(__('Edit Shipping')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo e(route("user.shipping.address.edit")); ?>" method="POST" id="new_user_shipping_address_form">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" class="form-control" name="id" id="edit_id">
                        <div class="form-group">
                            <label for="name"><?php echo e(__('Name')); ?></label>
                            <input type="text" class="form-control" name="name" id="edit_name">
                        </div>
                        <div class="form-group">
                            <label for="address"><?php echo e(__('Address')); ?></label>
                            <textarea name="address" id="edit_address" class="form-control" cols="30" rows="5"></textarea>
                        </div>
                        <div class="text-right">
                            <button class="default-btn default-theme-btn"><?php echo e(__('Submit')); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('assets/backend/js/sweetalert2.js')); ?>"></script>
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
    <script>
        (function ($) {
            $(document).ready(function () {
                $('.edit_shipping').on('click', function (e) {
                    e.preventDefault();
                    $('#edit_id').val($(this).data('id'));
                    $('#edit_name').val($(this).data('name'));
                    $('#edit_address').val($(this).data('address'));
                    $('#edit_shipping_modal').modal('show');
                });
                $(document).on('click', '.mobile_nav', function(e) {
                    e.preventDefault();
                    $(this).parent().toggleClass('show');
                });
            })
        })(jQuery)
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.user.dashboard.user-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bytesed/public_html/laravel/zaika/@core/resources/views/frontend/user/dashboard/shipping/all.blade.php ENDPATH**/ ?>