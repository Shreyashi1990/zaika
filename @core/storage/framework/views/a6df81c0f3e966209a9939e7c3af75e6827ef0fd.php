

<?php if((get_static_option('home_page_variant') != '05' || (request()->routeIs('frontend.dynamic.page') && isset($page_post->navbar_variant) && $page_post->navbar_variant != 5)) == false): ?>
<div class="topbar-area">
    <div class="container custom-container-1790">
        <div class="row">
            <div class="col-lg-12">
                <div class="topbar-inner">
                    <div class="left-content">
                        <div class="select-option">
                            <?php $all_language = get_all_language(); ?>
                            <select class="lang" id="langchange">
                                <?php $__currentLoopData = $all_language; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $lang_name = explode('(',$lang->name);
                                        $data = array_shift($lang_name);
                                    ?>
                                    <option <?php if(get_user_lang() == $lang->slug): ?> selected <?php endif; ?> value="<?php echo e($lang->slug); ?>"><?php echo e($data); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="social-icon">
                            <ul class="social-icon-list">
                                <?php $__currentLoopData = $all_social_item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="item"><a href="<?php echo e($social_item->url); ?>"><i class="<?php echo e($social_item->icon); ?> icon"></i></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                    <div class="right-content">
                        <div class="info">
                            <ul class="list">
                                 <?php if(!empty(get_static_option('navbar_right_faq_text'))): ?>
                                <li class="item">
                                    <a href="<?php echo e(get_static_option('navbar_right_faq_url')); ?>"><?php echo e(get_static_option('navbar_right_faq_text')); ?></a>
                                </li>
                                 <?php endif; ?>
                                <?php if(!empty(get_static_option('navbar_right_text'))): ?>
                                <li class="item">
                                    <a href="#"><?php echo e(get_static_option('navbar_right_text')); ?>: <?php echo e(get_static_option('navbar_right_info')); ?></a>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                        <div class="social-icon">
                            <ul class="social-icon-list">
                                <?php $__currentLoopData = $all_social_item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="item"><a href="<?php echo e($social_item->url); ?>"><i class="<?php echo e($social_item->icon); ?> icon"></i></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<?php /**PATH /home/bytesed/public_html/laravel/zaika/@core/resources/views/frontend/partials/topbar.blade.php ENDPATH**/ ?>