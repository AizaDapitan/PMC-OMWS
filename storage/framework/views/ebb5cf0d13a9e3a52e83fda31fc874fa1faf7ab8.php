

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
                    <form action="<?php echo e(route('rpt.item-issuance')); ?>" method="get">
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
                                    <select class="form-control input-large select2me" name='location' id="location" data-placeholder="Select...">
                                        <option></option>
                                        <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($location->id); ?>" <?php if($location->id == request()->location): ?> selected <?php endif; ?>><?php echo e($location->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>   
                                </td>
                                
                                <td>
                                    <label for="item"> Item </label>
                                    <input type="text" name="item" class="form-control" value="<?php echo e(request()->item); ?>">
                                </td>
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
                                    <select class="form-control input-large select2me" name='contractor' id="contractor" data-placeholder="Select...">
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
                    <a href="<?php echo e(route('rpt.item-issuance')); ?>?excel=true<?php echo e($q); ?>" target="_blank" class="btn green"><i class="fa fa-file-excel-o"></i> Export to Excel</a>
                    <a href="<?php echo e(route('rpt.item-issuance')); ?>?print=true<?php echo e($q); ?>" target="_blank" class="btn purple"><i class="fa fa-print"></i> &nbsp;&nbsp;Print&nbsp;&nbsp;&nbsp;&nbsp;</a>
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
                                    <th>Item Code</th>                                   
                                    <th>Description</th>
                                    <th>QTY</th>   
                                </tr>
                            </thead>

                            <tbody>
                                <?php $total = 0; $subtotal = 0;  ?>
                                <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td colspan="3"><strong>
                                            <?php if($transaction->first()->contractor): ?>
                                            <?php echo e($transaction->first()->contractor->lname); ?>, <?php echo e($transaction->first()->contractor->fname); ?> <?php echo e($transaction->first()->contractor->mname); ?>

                                            <?php endif; ?>
                                        </strong></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><strong style="color: blue;"><?php echo e($transaction->first()->locationz ? $transaction->first()->locationz->name : ''); ?></strong></td>
                                    </tr>
                                    <?php $subtotal = 0;  ?>
                                    <?php $__currentLoopData = $transaction; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trans): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                        
                                    <?php $__currentLoopData = $trans->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $total = $total + $detail->qty; ?>  
                                        <?php $subtotal = $subtotal + $detail->qty; ?>                                      
                                        <?php if(is_null($detail->itemz)) continue;  ?>
                                        <tr>
                                            <td><?php echo e($detail->itemz ? $detail->itemz->code:''); ?></td>
                                            <td><?php echo e($detail->itemz ? $detail->itemz->name:''); ?></td>
                                            <td><?php echo e($detail->qty); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td colspan="2" style="text-align: right;"><strong>Sub Total:</strong></td>
                                        <td><strong><?php echo e(number_format($subtotal,2)); ?></strong></td>
                                    </tr>
                                    <tr><td colspan="3">&nbsp;</td></tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><strong>Total</strong></td>
                                    <td colspan="1"></td>
                                    <td><strong><?php echo e(number_format($total, 2)); ?></strong></td>
                                </tr>
                                <tr><td colspan="3">&nbsp;</td></tr>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\owms_v2\resources\views/pages/reports/item-issuance.blade.php ENDPATH**/ ?>