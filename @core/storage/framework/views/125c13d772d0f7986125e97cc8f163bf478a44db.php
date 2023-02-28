<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Payment Success')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php 
$mainTitle = $payment_details->payment_gateway === 'cash_on_delivery' ? __('Order Successful') : __('Payment Successful');
$amountTitle = $payment_details->payment_gateway === 'cash_on_delivery' ? __('Amount') : __('Amount Paid');
?>
<div class="patment-success-area padding-top-100 padding-bottom-100">
    <div class="container">
        <div class="payment-success-wrapper">
            <div class="payment-contents">
                <h4 class="title"> <?php echo e($mainTitle); ?> </h4>
                <div class="icon">
                    <i class="las la-check"></i>
                </div>
                <ul class="payment-list margin-top-40">
                    <li><?php echo e(__('Payment Gateway')); ?> <span class="payment-strong"><?php echo e(str_replace(['-','_'],[' ',' '],$payment_details->payment_gateway)); ?></span></li>
                    <li><?php echo e(__('Phone')); ?> <span class="payment-strong"><?php echo e($payment_details->phone); ?></span></li>
                    <li><?php echo e(__('Name')); ?> <span class="payment-strong"><?php echo e($payment_details->name); ?></span></li>
                    <li><?php echo e(__('Email')); ?> <span class="payment-strong"><?php echo e($payment_details->email); ?></span></li>
                </ul>
                <ul class="payment-list payment-list-two margin-top-30">
                    <li><span class="list-bold"><?php echo e($amountTitle); ?></span> <span class="payment-strong payment-bold"><?php echo e(float_amount_with_currency_symbol($payment_details->total_amount)); ?></span></li>
                    <li><?php echo e(__('Transaction ID')); ?><span class="payment-strong"><?php echo e($payment_details->transaction_id); ?></span></li>
                </ul>
                <div class="btn-wrapper margin-top-40">
                    <?php if(auth('web')->check()): ?>
                    <a href="<?php echo e(route('user.home')); ?>" class="default-btn color-one"><?php echo e(__('Go to Dashboard')); ?></a>
                    <?php else: ?>
                    <a href="<?php echo e(route('homepage')); ?>" class="default-btn outline-one"><?php echo e(__('Back to Home')); ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bytesed/public_html/laravel/zaika/@core/resources/views/frontend/payment/payment-success.blade.php ENDPATH**/ ?>