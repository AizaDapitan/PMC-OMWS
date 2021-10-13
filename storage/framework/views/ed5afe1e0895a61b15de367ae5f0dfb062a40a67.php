

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
            <div class="row">
            <h3 class="page-title"> Issuance Report By Transaction ID </h3>

            <form action="<?php echo e(route('rpt.issuance-by-transactionID')); ?>" method="get">
                <table  width="100%">
                    <tr>
                        <td width="20%" style="padding-right:20px;">
                            <label class="control-label">Transaction ID<span class="required"> * </span></label>
                            <input type="text" name="trans_id" class="form-control">
                        </td>
                        
                        <td width="20%" style="padding-right:20px;">
                            <label class="control-label"> Status <span class="required"> * </span></label>
                            <select class="form-control" name="status">
                                <option value="saved" <?php if(request()->status == "saved"): ?> selected <?php endif; ?>>SAVED</option>
                                <option value="posted" <?php if(request()->status == "posted"): ?> selected <?php endif; ?>>POSTED</option>
                                <option value="cancelled" <?php if(request()->status == "cancelled"): ?> selected <?php endif; ?>>CANCELLED</option>
                            </select>
                        </td>   
                        <td width="10%">
                            <label>&nbsp;</label>
                            <input type="submit" class="btn blue form-control" value="Generate">
                        </td>
                    </tr>
                    <tr>
                                            
                    </tr>
                </table>
            </form>
            </div>
        </div>

        <div class="col-md-12"  style="margin-top: 10px;">
            <div class="row">
                <?php 
                    $query_string = url()->full();
                    $q_string = explode("?", $query_string);
                    $q = "";
                    if(count($q_string) > 1)
                        $q = "&".$q_string[1];
                ?>
                <a href="<?php echo e(route('rpt.issuance-by-transactionID')); ?>?excel=true<?php echo e($q); ?>" target="_blank" class="btn green"><i class="fa fa-file-excel-o"></i> Export to Excel</a>
                <a href="<?php echo e(route('rpt.issuance-by-transactionID')); ?>?print=true<?php echo e($q); ?>" target="_blank" class="btn purple"><i class="fa fa-print"></i> &nbsp;&nbsp;Print&nbsp;&nbsp;&nbsp;&nbsp;</a>
            </div>
        </div>

        <div class="col-md-12">
            
            <div class="row">
                    
                <div class="table-scrollable">
                    
                    <table class="table table-hover">

                        <thead>
                            <tr>
                                <th>Transaction #</th>
                                <th>MWS</th>
                                <th>Contractor</th>                                   
                                <th>Location</th>
                                <th>Date</th>
                                <th>Cost Code</th>
                                <th>Item Code</th>
                                <th>Description</th>
                                <th>Qty</th>
                            </tr>
                        </thead>

                        <tbody>
							<?php $total = 0 ?>
                            <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $__currentLoopData = $transaction->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transac_d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php $total = $total + $transac_d->qty; ?>
                                    <tr>
                                        <td><?php echo e($transaction->transId); ?></td>
                                        <td><?php echo e($transaction->mws); ?></td>
                                        <td>
                                            <?php if( $transaction->contractor ): ?>
                                                <?php echo e($transaction->contractor->lname); ?>, <?php echo e($transaction->contractor->fname); ?> <?php echo e($transaction->contractor->mname); ?>

                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e($transaction->locationz? $transaction->locationz->name:''); ?></td>  
                                        <td><?php echo e(\Carbon\Carbon::parse($transaction->docDate)->toFormattedDateString()); ?></td>                                      
                                        <td><?php echo e($transac_d->cost_code); ?></td>		
                                        <td><?php echo e($transac_d->itemz ? $transac_d->itemz->code: ''); ?></td>
                                        <td><?php echo e($transac_d->itemz ? $transac_d->itemz->name: ''); ?></td>
                                        <td><?php echo e($transac_d->qty); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<tr>
									<td><strong>Total: </strong></td>
									<td colspan="7"></td>
									<td><strong><?php echo e(number_format($total, 2)); ?> </strong></td>
								</tr>
                        </tbody>

                    </table>

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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\owms_v2\resources\views/pages/reports/transaction-by-transid.blade.php ENDPATH**/ ?>