

<?php $__env->startSection('pageCSS'); ?>

    <link href="google.css" rel="stylesheet" type="text/css"/>
    <link href="/themes/metronic/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="/themes/metronic/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
    <link href="/themes/metronic/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

    <link href="/themes/metronic/assets/global/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" type="text/css" />

    <link href="/themes/metronic/assets/global/css/components.css" rel="stylesheet" type="text/css"/>
    <link href="/themes/metronic/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
    <link href="/themes/metronic/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
    <link id="style_color" href="/themes/metronic/assets/admin/layout/css/themes/default.css" rel="stylesheet" type="text/css"/>
    <link href="/themes/metronic/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
    <link href="/themes/metronic/assets/global/plugins/select2/select2.css" rel="stylesheet" type="text/css" /> 
    <link href="/themes/metronic/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">

        <div class="col-md-12">

            <h3 class="page-title"> Transaction Report </h3>

            <div class="col-md-12">
                <div class="row">
                    <form action="<?php echo e(route('rpt.transaction-all')); ?>" method="get">
                        <input type="hidden" name="act" value="gen">
                        
                        <table  width="100%">
                            <tr>
                                <td width="30%">
                                    <label class="control-label">Start<span class="required"> * </span></label>
                                    <div class="input-group date date-picker" style="width:80%" data-date-format="yyyy-mm-dd">
                                        <input type="text" class="form-control form-filter" readonly name="start" id="start" value="<?php echo e(request()->has('start') ? request()->start : date('Y-m-d')); ?>">
                                        <span class="input-group-btn">
                                        <button class="btn  default" type="button"><i class="fa fa-calendar"></i></button>                      
                                        
                                    </div>
                                </td>

                                <td>
                                    <label class="control-label">Location<span class="required"> * </span></label>
                                    <select class="form-control input-large select2me" name='location' id="location">
                                        <option></option>
                                        <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($location->id); ?>" <?php if($location->id == request()->location): ?> selected <?php endif; ?>><?php echo e($location->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>   
                                </td>
                                
                                <td><input type="checkbox" name="ckb" <?php if(request()->has('ckb')): ?> checked <?php endif; ?>> Deductible items only</td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="control-label">End:<span class="required"> * </span></label>
                                    <div class="input-group date date-picker" style="width:80%" data-date-format="yyyy-mm-dd">
                                        <input type="text" class="form-control form-filter" readonly name="end" id="end" value="<?php echo e(request()->has('end') ? request()->end : date('Y-m-d')); ?>">
                                        <span class="input-group-btn">
                                        <button class="btn  default" type="button"><i class="fa fa-calendar"></i></button>                                  
                                    </div>                                  
                                </td>
                                <td>                                
                                    <label class="control-label">Contractor<span class="required"> * </span></label>
                                    <select class="form-control input-large select2me" name='contractor' id="contractor">
                                        <option></option>
                                        <<?php $__currentLoopData = $contractors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contractor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($contractor->id); ?>" <?php if($contractor->id == request()->contractor): ?> selected <?php endif; ?>><?php echo e($contractor->lname); ?>, <?php echo e($contractor->fname); ?> <?php echo e($contractor->mname); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </td>
                                <td><input type="submit" class="btn blue form-control" value="Generate"></td>
                            </tr>
                        </table>
                    </form>

                </div>
            </div>

            <br><br>
            <div class="clearfix"></div>

            <div class="col-md-12"  style="margin-top: 10px;">
                <div class="row">
                    <?php 
                        $query_string = url()->full();
                        $q_string = explode("?", $query_string);
                        $q = "";
                        if(count($q_string) > 1)
                            $q = "&".$q_string[1];
                    ?>
                    <a href="<?php echo e(route('rpt.transaction-all')); ?>?excel=true<?php echo e($q); ?>" target="_blank" class="btn green"><i class="fa fa-file-excel-o"></i> Export to Excel</a>
                    <a href="<?php echo e(route('rpt.transaction-all')); ?>?print=true<?php echo e($q); ?>" target="_blank" class="btn purple"><i class="fa fa-print"></i> &nbsp;&nbsp;Print&nbsp;&nbsp;&nbsp;&nbsp;</a>
                </div>
            </div>

            <br><br>
            <div class="clearfix"></div>

            <div class="col-md-12">
                <div class="row">
                    <div class="table-scrollable">
                        
                        <table class="table table-hover">

                            <thead>
                                <tr>
                                    <th>Contractor Code</th>                                   
                                    <th>Name</th>
                                    <th>Location</th>
                                    <th>Date</th>                                   
                                    <th>Receiver</th>
                                    <th>Transaction #</th>
                                    <th>RQ</th>
                                    <th>Batch</th>
                                    <th>MWS</th>
                                    <th>Item Code</th>
                                    <th>Description</th>
                                    <th>Cost Code</th>
                                    <th>Remarks</th>
                                    <th>Qty</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $total = 0; ?>
                                <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $__currentLoopData = $transaction->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transac_d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $total = $total + $transac_d->qty; ?>
                                        <tr>
                                            <td><?php echo e($transaction->contractor->code); ?></td>
                                            <td><?php echo e($transaction->contractor->lname); ?>, <?php echo e($transaction->contractor->fname); ?> <?php echo e($transaction->contractor->mname); ?> </td>
                                            <td><?php echo e($transaction->locationz? $transaction->locationz->name:''); ?></td>
                                            <td><?php echo e(\Carbon\Carbon::parse($transaction->docDate)->toFormattedDateString()); ?></td>
                                            <td><?php echo e($transaction->receiver); ?></td>
                                            <td><?php echo e($transaction->transId); ?></td>
                                            <td><?php echo e($transaction->rq); ?></td>
                                            <td><?php echo e($transaction->batch); ?></td>
                                            <td><?php echo e($transaction->mws); ?></td>
                                            <td><?php echo e($transac_d->itemz ? $transac_d->itemz->code: ''); ?></td>
                                            <td><?php echo e($transac_d->itemz ? $transac_d->itemz->name: ''); ?></td>
                                            <td><?php echo e($transac_d->cost_code); ?></td>
                                            <td><?php echo e($transaction->remarks); ?></td>
                                            <td><?php echo e($transac_d->qty); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                                <tr>
                                    <td><strong>Total</strong></td>
                                    <td colspan="12"></td>
                                    <td><strong><?php echo e($total); ?></strong></td>
                                </tr>
                            </tbody>

                        </table>

                    </div>
                </div>
            </div>

        </div>

    </div>

    

<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageJS'); ?>
    
    <script src="/themes/metronic/assets/global/plugins/jquery-1.11.0.min.js" type="text/javascript"></script>
    <script src="/themes/metronic/assets/global/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
    <script src="/themes/metronic/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

    <script src="/themes/metronic/assets/global/scripts/metronic.js" type="text/javascript"></script>
    <script src="/themes/metronic/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
    <script src="/themes/metronic/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>

    <script src="/themes/metronic/assets/global/plugins/select2/select2.min.js" type="text/javascript" ></script>
    <script src="/themes/metronic/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript" ></script>

    <script type="text/javascript">
        var initPickers = function () {
            //init date pickers
            $('.date-picker').datepicker({
                rtl: Metronic.isRTL(),
                autoclose: true
            });
        }
        initPickers();
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\owms_v2\resources\views/pages/reports/transactions.blade.php ENDPATH**/ ?>