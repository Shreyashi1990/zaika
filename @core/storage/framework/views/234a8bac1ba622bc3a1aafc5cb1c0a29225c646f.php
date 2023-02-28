<?php $__env->startSection('site-title'); ?>
    <?php echo e(get_static_option('faq_page_name')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-title'); ?>
    <?php echo e(get_static_option('faq_page_name')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('page-meta-data'); ?>
    <meta name="description" content="<?php echo e(get_static_option('faq_page_meta_description')); ?>">
    <meta name="tags" content="<?php echo e(get_static_option('faq_page_meta_tags')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo \App\PageBuilder\PageBuilderSetup::render_frontend_pagebuilder_content_by_location('faqpage'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script>
    (function ($) {
        'use strict'

        $(document).ready(function () {
            $(document).on('submit', '.custom-form-builder-form', function (e) {
                e.preventDefault();
                var form = $(this);
                var formID = form.attr('id');
                var msgContainer =  form.find('.error-message');
                var formSelector = document.getElementById(formID);
                var formData = new FormData(formSelector);
                msgContainer.html('');
                $.ajax({
                    url: "<?php echo e(route('frontend.form.builder.custom.submit')); ?>",
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>",
                    },
                    beforeSend:function (){
                        form.find('.ajax-loading-wrap').addClass('show').removeClass('hide');
                    },
                    processData: false,
                    contentType: false,
                    data:formData,
                    success: function (data) {
                        form.find('.ajax-loading-wrap').removeClass('show').addClass('hide');
                        msgContainer.html('<div class="alert alert-'+data.type+'">' + data.msg + '</div>');
                    },
                    error: function (data) {
                        form.find('.ajax-loading-wrap').removeClass('show').addClass('hide');
                        var errors = data.responseJSON.errors;
                        var markup = '<ul class="alert alert-danger">';
                        $.each(errors,function (index,value){
                            markup += '<li>'+value+'</li>';
                        })
                        markup += '</ul>';
                        msgContainer.html(markup);
                    }
                });
            });
        })
    })(jQuery)
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bytesed/public_html/laravel/zaika/@core/resources/views/frontend/pages/faq-page.blade.php ENDPATH**/ ?>