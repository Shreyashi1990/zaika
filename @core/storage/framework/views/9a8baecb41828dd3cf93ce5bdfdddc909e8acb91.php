
<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('All Campaign')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="campaign-page-area padding-top-bottom-100">
        <div class="container custom-container-1618">
            <div class="row position-relative">
                <?php $__currentLoopData = $all_campaigns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $campaign): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4">
                        <div class="campaign-contents-left">
                            <div class="bg-campaign-item"
                                <?php echo render_background_image_markup_by_attachment_id($campaign->image); ?>

                            ></div>
                            <div class="campaign-content">
                                <div class="campaign-content-inner">
                                    <a href="<?php echo e(route('frontend.products.campaign', $campaign->id)); ?>" class="campaign-tags"><?php echo e(Str::limit($campaign->title, 27)); ?></p>
                                    <h3 class="campaign-offer-title"> <a href="<?php echo e(route('frontend.products.campaign', $campaign->id)); ?>"><?php echo e(Str::limit($campaign->subtitle, 27)); ?></a> </h3>
                                    <div class="btn-wrapper">
                                        <a href="<?php echo e(route('frontend.products.campaign', $campaign->id)); ?>" class="default-btn"> <?php echo e(__('Shop Now')); ?> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bytesed/public_html/laravel/zaika/@core/resources/views/frontend/campaign/all-campaign.blade.php ENDPATH**/ ?>