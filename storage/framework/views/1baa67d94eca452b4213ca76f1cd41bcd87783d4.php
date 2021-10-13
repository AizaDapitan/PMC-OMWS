

<?php $__env->startSection('pageCSS'); ?>

    <link href="google.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(env('APP_URL')); ?>/themes/metronic/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(env('APP_URL')); ?>/themes/metronic/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(env('APP_URL')); ?>/themes/metronic/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo e(env('APP_URL')); ?>/themes/metronic/assets/global/plugins/select2/select2.css"/>
    <link href="<?php echo e(env('APP_URL')); ?>/themes/metronic/assets/global/css/components.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(env('APP_URL')); ?>/themes/metronic/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(env('APP_URL')); ?>/themes/metronic/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
    <link id="style_color" href="<?php echo e(env('APP_URL')); ?>/themes/metronic/assets/admin/layout/css/themes/default.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(env('APP_URL')); ?>/themes/metronic/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(env('APP_URL')); ?>/themes/metronic/assets/global/plugins/bootstrap-datepicker/css/datepicker.css"/ rel="stylesheet" type="text/css">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">

        <div class="col-md-12">

            <h3 class="page-title"> Batch Posting Module Per Transaction ID </h3>

            
                <div class="row">
                    <form method="get">
                    <div class="col-md-3">
                        <div class="form-group">Transaction ID:                                                                             
                            <input type="text" name="transaction_id" class="form-control" style="text-align:right;">   
                        </div>                                  
                    </div>
                    <div class="col-md-3">
                        <input type="submit" class="btn blue" value="GO" style="margin-top: 17px;">  
                    </div>
                    </form>
                    <div class="col-md-6" style="text-align: right;">
                        <div class="form-group">
                            <?php if(count($transactions)): ?> 
                                <form method="POST" action="<?php echo e(route('transaction-batch-per-id.update', request()->transaction_id)); ?>">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PATCH'); ?>
                                    <input type="hidden" name="seq" value="<?php echo e(request()->transaction_id); ?>">
                                    <button class="btn blue text-right" type="submit" style="margin-top: 17px;"> Post All </button>
                                </form>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            

            <div class="portlet box blue">

                <div class="portlet-title">
                    <div class="caption">
                        <i class=" icon-list"></i>Transaction List
                    </div>                    
                </div>

                <div class="portlet-body">
                   
                    <table class="table table-hover">   
                        <thead>                        
                            <tr>
                                <th>Transaction #</th>
                                <th>Contractor</th>                          
                                <th>Location</th>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>                               
                        </thead>                                
                        <tbody>

                            <?php $__empty_1 = true; $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                                <?php $__currentLoopData = $transaction->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="odd gradeX" onclick='$("#detailsd"+<?php echo $transaction->id; ?>).toggle()'>
                                        <td><?php echo e($transaction->transId); ?> </td>
                                        <td>
                                            <?php if($transaction->contractor): ?>
                                                <?php echo e($transaction->contractor->lname); ?> , <?php echo e($transaction->contractor->fname); ?> <?php echo e($transaction->contractor->mname); ?>

                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if($transaction->locationz): ?>
                                                <?php echo e($transaction->locationz->name); ?>

                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php echo e($transaction->docDate); ?>

                                        </td>
                                        <td>
                                            <?php echo e($transaction->status); ?>

                                        </td>
                                    </tr>

                                    <tr class='detailsd' id="detailsd<?php echo e($transaction->id); ?>"style="display: none;">
                                        <td colspan='7' >
                                        <div class='portlet box grey-cascade'>
                                            <div class='portlet-title'>
                                            <div class='caption'>
                                                <i class='fa fa-globe'></i><?php echo e($transaction->contractor ? $transaction->contractor->lname:''); ?>, <?php echo e($transaction->contractor ? $transaction->contractor->fname:''); ?> <?php echo e($transaction->contractor ? $transaction->contractor->mname :''); ?>

                                            </div>
                                        </div>
                                        <div class='portlet-body'>

                                            <table width='80%' class='table table-striped table-bordered table-hover' style='font-size:12px;'>
                                                <thead>
                                                    <tr>
                                                        <th>Item Code</th>
                                                        <th>Item</th>
                                                        <th>Cost Code</th>
                                                        <th>Qty</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $__currentLoopData = $transaction->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>    
                                                        <td><?php echo e($detail->itemz ? $detail->itemz->code:''); ?></td>
                                                        <td><?php echo e($detail->itemz ? $detail->itemz->name:''); ?></td>
                                                        <td><?php echo e($detail->cost_code); ?></td>
                                                        <td><?php echo e($detail->qty); ?></td>
                                                    </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>    
                                            </table> 

                                        </div>                     
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="5" style="text-align: center;"> No Transaction Found </td>
                                </tr>
                            <?php endif; ?>

                        </tbody>                                
                    </table>

                </div>

            </div>

        </div>

    </div>

    

<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageJS'); ?>
    
    <script src="<?php echo e(env('APP_URL')); ?>/themes/metronic/assets/global/plugins/jquery-1.11.0.min.js" type="text/javascript"></script>
    <script src="<?php echo e(env('APP_URL')); ?>/themes/metronic/assets/global/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
    <script src="<?php echo e(env('APP_URL')); ?>/themes/metronic/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo e(env('APP_URL')); ?>/themes/metronic/assets/global/plugins/select2/select2.min.js"></script>
    <script src="<?php echo e(env('APP_URL')); ?>/themes/metronic/assets/global/scripts/metronic.js" type="text/javascript"></script>
    <script src="<?php echo e(env('APP_URL')); ?>/themes/metronic/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
    <script src="<?php echo e(env('APP_URL')); ?>/themes/metronic/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
    <script src="<?php echo e(env('APP_URL')); ?>/themes/metronic/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webfocusprod/cms4.webfocusprod.wsiph2.com/pmc_p1/PMCP1-OMWS/PMC-OMWS/resources/views/pages/transactions/post-per-id.blade.php ENDPATH**/ ?>