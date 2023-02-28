
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Login/Register Page Settings')); ?>

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
            <div class="col-lg-12 mt-5">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title"><?php echo e(__('Login/Register Page Settings')); ?></h4>
                        <form action="<?php echo e(route('admin.page.settings.user.auth')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.media-upload','data' => ['id' => get_static_option('user_auth_page_logo'),'name' => 'user_auth_page_logo','dimentions' => '108X61','title' => __('Login/Register page logo')]]); ?>
<?php $component->withName('media-upload'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(get_static_option('user_auth_page_logo')),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('user_auth_page_logo'),'dimentions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('108X61'),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Login/Register page logo'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="toc_page_link"><?php echo e(__('Terms of Service and Conditions Link')); ?></label>
                                <input type="text" class="form-control" id="toc_page_link" name="toc_page_link" value="<?php echo e(get_static_option('toc_page_link')); ?>">
                            </div>
                            <div class="form-group">
                                <label for="privacy_policy_link"><?php echo e(__('Privacy Policy Link')); ?></label>
                                <input type="text" class="form-control" id="privacy_policy_link" name="privacy_policy_link" value="<?php echo e(get_static_option('privacy_policy_link')); ?>">
                            </div>
                            <div class="form-group">
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.media-upload','data' => ['id' => get_static_option('user_auth_page_side_image'),'name' => 'user_auth_page_side_image','dimentions' => '960X1080','title' => __('Login/Register page side image')]]); ?>
<?php $component->withName('media-upload'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(get_static_option('user_auth_page_side_image')),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('user_auth_page_side_image'),'dimentions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('960X1080'),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Login/Register page side image'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for=""><?php echo e(__('Social Icons')); ?></label>
                                <div class="form-row my-1">
                                    <div class="col">
                                        <div class="form-row">
                                            <div class="col-auto">
                                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.iconpicker.input','data' => ['id' => 'social_icon_icon','name' => 'social_icon_icon[]','label' => '']]); ?>
<?php $component->withName('iconpicker.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('social_icon_icon'),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('social_icon_icon[]'),'label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                            </div>
                                            <div class="col">
                                                <input type="text" name="social_icon_link[]" class="form-control" placeholder="<?php echo e(__('Link')); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-primary add_social">+</button>
                                        <button type="button" class="btn btn-danger" disabled>-</button>
                                    </div>
                                </div>
                                <div id="repeater_container">
                                    <?php
                                        $social_links_json = get_static_option('user_auth_page_social_links');
                                        $all_social_links = [];
                                        if ($social_links_json) {
                                            $all_social_links = json_decode($social_links_json, true);
                                        }
                                    ?>
                                    <?php $__currentLoopData = $all_social_links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="form-row my-1">
                                        <div class="col">
                                            <div class="form-row">
                                                <div class="col-auto">
                                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.iconpicker.input','data' => ['id' => 'social_icon_icon_'.$key,'name' => 'social_icon_icon[]','label' => '']]); ?>
<?php $component->withName('iconpicker.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('social_icon_icon_'.$key),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('social_icon_icon[]'),'label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                                </div>
                                                <div class="col">
                                                    <input type="text" name="social_icon_link[]" class="form-control" placeholder="<?php echo e(__('Link')); ?>" value="<?php echo e($social['link']); ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <button type="button" class="btn btn-primary add_social">+</button>
                                            <button type="button" class="btn btn-danger remove_social">-</button>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                            <button class="btn btn-primary"><?php echo e(__('Save Settings')); ?></button>
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
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.iconpicker.js','data' => []]); ?>
<?php $component->withName('iconpicker.js'); ?>
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
            'use script'
            $(document).ready(function () {
                $(document).on('click', '.add_social', function () {
                    let container = $('#repeater_container');
                    let repeater_content = '<div class="form-row my-1">'
                                            + '<div class="col">'
                                                + '<div class="form-row">'
                                                    + '<div class="col-auto">'
                                                        + `<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.iconpicker.input','data' => ['id' => 'social_icon_icon','name' => 'social_icon_icon[]','label' => '']]); ?>
<?php $component->withName('iconpicker.input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('social_icon_icon'),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('social_icon_icon[]'),'label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>`
                                                    + '</div>'
                                                    + '<div class="col">'
                                                        + '<input type="text" name="social_icon_link[]" class="form-control" placeholder="<?php echo e(__('Link')); ?>">'
                                                    + '</div>'
                                                + '</div>'
                                            + '</div>'
                                            + '<div class="col-auto">'
                                                + '<button type="button" class="btn btn-primary add_social">+</button>'
                                                + '<button type="button" class="btn btn-danger remove_social">-</button>'
                                            + '</div>'
                                        + '</div>';
                    container.append(repeater_content);
                });

                $(document).on('click', '.remove_social', function () {
                    $(this).closest('.form-row.my-1').remove();
                });

                <?php $__currentLoopData = $all_social_links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                setSelectedClass('#social_icon_icon_<?php echo e($key); ?>', '<?php echo e($social["icon"]); ?>');
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            });
        })(jQuery)
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bytesed/public_html/laravel/zaika/@core/resources/views/backend/settings/userAuth.blade.php ENDPATH**/ ?>