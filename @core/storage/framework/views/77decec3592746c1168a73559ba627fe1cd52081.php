<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Dashboard')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php
    $statistics = [
        ['title' => __('Total Admin'),'value' => $total_admin, 'icon' => 'lar la-user'],
        ['title' => __('Total Customer'),'value' => $total_user, 'icon' => 'lar la-user'],
        ['title' => __('Total Blog'),'value' => $all_blogs_count, 'icon' => 'lar la-edit'],
        ['title' => __('Total Products'),'value' => $all_products_count, 'icon' => 'las la-box'],
        ['title' => __('Completed Sale'),'value' => $all_completed_sell_count, 'icon' => 'las la-boxes'],
        ['title' => __('Pending Sale'),'value' => $all_pending_sell_count, 'icon' => 'las la-history'],
        ['title' => __('Sold Amount'),'value' => $total_sold_amount, 'icon' => 'las la-coins'],
        ['title' => __('Ongoing Campaign'),'value' => $total_ongoing_campaign, 'icon' => 'las la-gifts'],
    ];
?>
    <div class="main-content-inner">
        <div class="row">
            <!-- seo fact area start -->
            <div class="col-lg-12">
                <div class="row mt-3">
                    <?php
                        $bg_colors = [
                            'bg-blue',
                            'bg-green',
                            'bg-yellow',
                            'bg-pink',
                            'bg-lime',
                            'bg-brown',
                        ];
                    ?>
                    <?php $__currentLoopData = $statistics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-3 my-3">
                            <div class="dash-box text-white <?php echo e($bg_colors[$key % count($bg_colors)]); ?>">
                                <h1 class="dash-icon">
                                    <i class="<?php echo e($data['icon']); ?>"></i>
                                </h1>
                                <div class="dash-content">
                                    <h5 class="mb-0 mt-1"><?php echo e($data['value']); ?></h5>
                                    <small class="font-light"><?php echo e(__($data['title'])); ?></small>
                                </div>
                                <span class="bg-icon"><i class="<?php echo e($data['icon']); ?>"></i></span>
                            </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="row my-5">
                    <div class="col-lg-6 my-4">
                        <div class="chart-wrapper margin-top-40">
                            <h2 class="chart-title"><?php echo e(__("Earned Per Month In")); ?> <?php echo e(date('Y')); ?></h2>
                            <canvas id="monthlyEarned"></canvas>
                        </div>
                    </div>
                    <div class="col-lg-6 my-4">
                        <div class="chart-wrapper margin-top-40">
                            <h2 class="chart-title"><?php echo e(__("Earned Per Day In Last 30 Days")); ?></h2>
                           <div>
                               <canvas id="monthlyEarnedPerDay"></canvas>
                           </div>
                        </div>
                    </div>
                    <div class="col-lg-6 my-4">
                        <div class="chart-wrapper margin-top-40">
                            <h2 class="chart-title"><?php echo e(__("Product Order Per Day In Last 30 Days")); ?></h2>
                           <div>
                               <canvas id="monthlyOrderCountPerDay"></canvas>
                           </div>
                        </div>
                    </div>
                    <div class="col-lg-6 my-4">
                        <div class="chart-wrapper margin-top-40">
                            <h2 class="chart-title"><?php echo e(__("Product Sold Per Day In Last 30 Days")); ?></h2>
                           <div>
                               <canvas id="monthlySoldCountPerDay"></canvas>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('assets/backend/js/chart.js')); ?>"></script>
    <script>
        $.ajax({
            url: '<?php echo e(route('admin.home.chart.data')); ?>',
            type: 'POST',
            async: false,
            data: {
                _token : "<?php echo e(csrf_token()); ?>"
            },
            success: function (data) {
                labels = data.labels;
                chartdata = data.data;
                new Chart(
                    document.getElementById('monthlyEarned'),
                    {
                        type: 'bar',
                        data: {
                            labels: data.labels,
                            datasets: [{
                                label: '<?php echo e(__("Amount Earned")); ?>',
                                backgroundColor: '#fcb11a',
                                borderColor: '#f5cb62',
                                data: data.data,
                                
                                 backgroundColor: [
                          'rgba(255, 99, 132, 0.2)',
                          'rgba(255, 159, 64, 0.2)',
                          'rgba(255, 205, 86, 0.2)',
                          'rgba(75, 192, 192, 0.2)',
                          'rgba(54, 162, 235, 0.2)',
                          'rgba(153, 102, 255, 0.2)',
                          'rgba(201, 203, 207, 0.2)'
                        ],
                        borderColor: [
                          'rgb(255, 99, 132)',
                          'rgb(255, 159, 64)',
                          'rgb(255, 205, 86)',
                          'rgb(75, 192, 192)',
                          'rgb(54, 162, 235)',
                          'rgb(153, 102, 255)',
                          'rgb(201, 203, 207)'
                        ],
                        borderWidth: 1
                        
                            }]
                        },
                        
                        options: {
                         scales: {
                          x: {
                            grid: {
                               drawOnChartArea:false
                             }
                          },
                           y: {
                            grid: {
                               drawOnChartArea:false
                             }
                          }
                        }
                       }
                    },
                    
                );
            }
        });

        $.ajax({
            url: '<?php echo e(route('admin.home.chart.data.by.day')); ?>',
            type: 'POST',
            async: false,
            data: {
                _token : "<?php echo e(csrf_token()); ?>"
            },
            success: function (data) {
                labels = data.labels;
                chartdata = data.data;
                new Chart(
                    document.getElementById('monthlyEarnedPerDay'),
                    {
                        type: 'line',
                        data: {
                            labels: data.labels,
                            datasets: [{
                                label: '<?php echo e(__("Amount Earned")); ?>',
                                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                borderColor: 'rgba(255, 99, 132,0.2)',
                                data: data.data,
                                fill: true,
                            }]
                        },
                        options: {
                         scales: {
                          x: {
                            grid: {
                               drawOnChartArea:false
                             }
                          },
                           y: {
                            grid: {
                               drawOnChartArea:false
                             }
                          }
                        }
                       }
                    }
                );
            }
        });

        $.ajax({
            url: '<?php echo e(route('admin.home.chart.sale.count.per.day')); ?>',
            type: 'POST',
            async: false,
            data: {
                _token : "<?php echo e(csrf_token()); ?>"
            },
            success: function (data) {
                labels = data.labels;
                chartdata = data.data;
                new Chart(
                    document.getElementById('monthlySoldCountPerDay'),
                    {
                        type: 'line',
                        data: {
                            labels: data.labels,
                            datasets: [{
                                label: '<?php echo e(__("Product Sales")); ?>',
                                backgroundColor: 'rgba(255, 159, 64, 0.2)',
                                borderColor: 'rgba(255, 159, 64, 0.2)',
                                data: data.data,
                                fill: true,
                            }]
                        },
                        options: {
                         scales: {
                          x: {
                            grid: {
                               drawOnChartArea:false
                             }
                          },
                           y: {
                            grid: {
                               drawOnChartArea:false
                             }
                          }
                        }
                       }
                    }
                );
            }
        });

        $.ajax({
            url: '<?php echo e(route("admin.home.chart.order.count.per.day")); ?>',
            type: 'POST',
            async: false,
            data: {
                _token : "<?php echo e(csrf_token()); ?>"
            },
            success: function (data) {
                labels = data.labels;
                chartdata = data.data;
                new Chart(
                    document.getElementById('monthlyOrderCountPerDay'),
                    {
                        type: 'line',
                        data: {
                            labels: data.labels,
                            datasets: [{
                                label: '<?php echo e(__("Product Order")); ?>',
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                borderColor: 'rgba(75, 192, 192, 0.2)',
                                data: data.data,
                                fill: true,
                            }]
                        },
                        options: {
                         scales: {
                          x: {
                            grid: {
                               drawOnChartArea:false
                             }
                          },
                           y: {
                            grid: {
                               drawOnChartArea:false
                             }
                          }
                        }
                       }
                    }
                );
            }
        });

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/bytesed/public_html/laravel/zaika/@core/resources/views/backend/admin-home.blade.php ENDPATH**/ ?>