

<?php $__env->startSection('pageCSS'); ?>

    <link href="google.css" rel="stylesheet" type="text/css"/>
    <link href="/themes/metronic/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="/themes/metronic/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
    <link href="/themes/metronic/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

    <link href="/themes/metronic/assets/global/css/components.css" rel="stylesheet" type="text/css"/>
    <link href="/themes/metronic/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
    <link href="/themes/metronic/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
    <link id="style_color" href="/themes/metronic/assets/admin/layout/css/themes/default.css" rel="stylesheet" type="text/css"/>
    <link href="/themes/metronic/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
  
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">

        <div class="col-md-12">

            <h3 class="page-title"> Issuance Request Lists </h3>            

            <form method="get">
                <ul class="page-breadcrumb breadcrumb">                     
                    <li>
                        <i class="fa fa-filter"></i>                                                    
                    </li>   
                    <li>
                        <input name="searchtxt" id="searchtxt" class="form-control" style="width:400px;" type="text" placeholder="Input Recipeint, Receiver, or Control#.." value="<?php echo e(request()->searchtxt); ?>">                                
                    </li>
                    <li>
                        <select name="location" id="location" class="form-control">
                            <option value=""> - Select Location -
                            <option value="MINES" <?php echo e(request()->location == 'MINES' ? 'selected' :''); ?>> - MINES -
                            <option value="MILL" <?php echo e(request()->location == 'MILL' ? 'selected' :''); ?>> - MILL -
                        </select>
                    </li>
                    <li>
                        <input type="submit" class="btn green btn-sm" value="Search">
                        <a href="<?php echo e(route('ppe-transactions')); ?>" class="btn blue btn-sm" style="color:white;">Reset</a>
                    </li>
                </ul>
            </form>

            <div class="portlet box blue">

                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i> Transactions
                    </div>       

                </div>

                <div class="portlet-body">
                    
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Control #</th>
                                <th>Recipient</th>
                                <th>Document Date</th>      
                                <th>Location</th>                           
                                <th>Status</th>
                                <th>Actions</th>                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $qty_ordered = $transaction->details()->sum('qty');
                                    $qty_delevered = $transaction->details()->sum('qtyReleased');
                                ?>
                                <tr onclick='$("#detailsd"+<?php echo $transaction->id; ?>).toggle()'>
                                    <td><?php echo e($transaction->controlNum); ?></td>
                                    <td><?php echo e($transaction->receiver); ?></td>
                                    <td><?php echo e(\Carbon\Carbon::parse($transaction->docDate)->toFormattedDateString()); ?></td>
                                    <td><?php echo e($transaction->location); ?></td>
                                    <td><?php echo e($qty_delevered); ?> / <?php echo e($qty_ordered); ?> </td>
                                    <td>
                                        <?php if( $qty_ordered > $qty_delevered ): ?>
                                            <a href="<?php echo e(route('ppe-transaction.create', $transaction->id)); ?>" class="btn btn-xs green-jungle">Process</a>
                                        <?php endif; ?>
                                    </td>
                                </tr>

                                <tr class="detailsd" id="detailsd<?php echo e($transaction->id); ?>" style="display: none;">
                                    <td colspan="7">
                                        
                                        <div class="portlet box grey-cascade">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-globe"></i>Control#: <?php echo e($transaction->controlNum); ?>

                                                </div>
                                            </div>
                                        <div class="portlet-body">
                                
                                            <table width="80%" class="table table-condensed table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Item</th>                           
                                                        <th>Size</th>
                                                        <th>Color</th>
                                                        <th>Last Issue</th>
                                                        <th>Remarks</th>
                                                        <th>Qty</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $__currentLoopData = $transaction->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($detail->itemDesc); ?></td>
                                                        <td><?php echo e($detail->itemSize); ?></td>
                                                        <td><?php echo e($detail->itemColor); ?></td>
                                                        <td><?php echo e($detail->lastissueDate); ?></td>
                                                        <td><?php echo e($detail->remarks); ?></td>
                                                        <td><?php echo e($detail->qty); ?></td>
                                                        <td><?php echo e($detail->qtyReleased); ?> / <?php echo e($detail->qty); ?></td>
                                                    </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                            </table>

                                        </div>

                                    </td>                                        
                                </tr>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>

                    </table>

                </div>

                <div class="col-md-6"></div>
                <div class="col-md-6" style="text-align: right;">
                    <?php echo e($transactions->withQueryString()->links()); ?>

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

    <script type="text/javascript">
        
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\owms_v2\resources\views/pages/transactions/ppe.blade.php ENDPATH**/ ?>