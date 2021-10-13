

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
    <style type="text/css">
        table td {
            padding-bottom: 10px;
        }
    </style> 

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">

        <div class="col-md-12">

            <h3 class="page-title"> Issuance Transaction </h3>            

            <ul class="page-breadcrumb breadcrumb">
                <li>                            
                    <a class="btn blue" href="<?php echo e(route('transaction-new')); ?>" style="color:white;">Add New</a>                            
                </li>                       
            </ul>

            <div class="portlet box blue">

                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i> Transactions
                    </div>       

                </div>

                <div class="portlet-body">
                    
                    
                    <form action="<?php echo e(route('transactions')); ?>" method="get" class="form-inline">
                        <input type="hidden" value="search" name="act">
                        <span class="form-control form-inline col-md-2 col-sm-2" style="font-weight:bold;">Search:</span>
                        <input type="text" name="search_txt" class="form-control form-inline col-md-3 col-sm-3" placeholder="search here..">
                        <select class="form-control form-inline col-md-3 col-sm-3" name='search_type' style="margin-right: 5px;">
                            <option value="contractor" <?php if(request()->search_type == 'contractor'): ?> selected <?php endif; ?>>Contractor</option>
                            <option value="location" <?php if(request()->search_type == 'location'): ?> selected <?php endif; ?>>Location</option>
                            <option value="seq" <?php if(request()->search_type == 'seq'): ?> selected <?php endif; ?>>Transaction No.</option>
                            <option value="transId" <?php if(request()->search_type == 'transId'): ?> selected <?php endif; ?>>Transaction ID</option>
                            <option value="mws" <?php if(request()->search_type == 'mws'): ?> selected <?php endif; ?>>MWS</option>
                            <option value="receiver" <?php if(request()->search_type == 'receiver'): ?> selected <?php endif; ?>>Receiver</option>
                            <option value="approver" <?php if(request()->search_type == 'approver'): ?> selected <?php endif; ?>>Approver</option>
                            <option value="issuer" <?php if(request()->search_type == 'issuer'): ?> selected <?php endif; ?>>Issuer</option>
                            <option value="rq" <?php if(request()->search_type == 'rq'): ?> selected <?php endif; ?>>RQ</option>
                            <option value="batch" <?php if(request()->search_type == 'batch'): ?> selected <?php endif; ?>>Batch</option>                        
                            <option value="item" <?php if(request()->search_type == 'item'): ?> selected <?php endif; ?>>Item</option>                                      
                            <option value="costcode" <?php if(request()->search_type == 'costcode'): ?> selected <?php endif; ?>>Cost Code</option>     
                            <option value="status" <?php if(request()->search_type == 'status'): ?> selected <?php endif; ?>>Status</option>                                                                      
                        </select>
                        <input value="Search" type="submit" class="btn yellow">
                        <a href="<?php echo e(route('transactions')); ?>"  class="btn green">Reset</a>
                    </form>
                       
                    <br>

                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Trans#</th>                                                                     
                                <th>Contractor</th>                             
                                <th>Location</th>                                   
                                <th>Date</th>                               
                                <th>Status</th>
                                <th>Actions</th>                           
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="odd gradeX" onclick='$("#detailsd"+<?php echo $transaction->id; ?>).toggle()'>
                                <td><?php echo e($transaction->transId); ?></td>
                                <td><?php echo e($transaction->contractor ? $transaction->contractor->lname:''); ?>, <?php echo e($transaction->contractor ? $transaction->contractor->fname:''); ?> <?php echo e($transaction->contractor? $transaction->contractor->mname:''); ?> </td>
                                <td><?php echo e($transaction->locationz ? $transaction->locationz->name : ''); ?></td>
                                <td><?php echo e(\Carbon\Carbon::parse($transaction->docDate)->toFormattedDateString()); ?></td>
                                <td><?php echo e($transaction->status); ?></td>
                                <td>

                                    <?php if($transaction->status == 'SAVED'): ?>
                                    <a href="<?php echo e(route('transaction.edit', $transaction->id)); ?>" class="btn green btn-xs" title="Edit Issuance"><i class="fa fa-edit"></i> </a>
                                    
                                    <a href="#modalPost" data-id="<?php echo e($transaction->id); ?>" data-toggle="modal" data-backdrop="static" class="btn blue postb btn-xs btn-post" title="POST Transaction" ><i class="fa fa-check-circle-o"></i> </a>
                                    
                                    <a href="#modalPost" data-id="<?php echo e($transaction->id); ?>" class="btn red btn-cancel btn-xs" title="CANCEL Transaction" data-toggle="modal" data-backdrop="static"><i class="fa fa-times"></i> </a>
                                    <?php endif; ?>      
                                    <?php if($transaction->status != 'CANCELLED'): ?>                                                              
                                    <a href="<?php echo e(route('transactions')); ?>?print=true&transId=<?php echo e($transaction->id); ?>" target="_blank" class="btn purple btn-xs" title="Print Issuance"><i class="fa fa-print"></i> </a>

                                    <a data-toggle="modal" href="#modalClassic" data-id="<?php echo e($transaction->id); ?>" data-rq="<?php echo e($transaction->rq); ?>" data-transac="<?php echo e($transaction->transId); ?>" data-batch="<?php echo e($transaction->batch); ?>" class="btn green btn-xs btn-classic" title="Update Classic Info"><i class="fa fa-info"></i> Classic</a>
                                    <?php endif; ?>
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

    <div class="modal fade" id="modalPost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" id="post-form">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PATCH'); ?>
                <input type="hidden" name="status" id="form-status">
            <div class="modal-content">
                
                <div class="modal-body">

                    <h3 id="form-text"></h3>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="modal_action">OK</button>
                </div>
            </div>
            </form>
        </div>
    </div>


    <div class="modal fade" id="modalClassic" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" id="classic-form">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PATCH'); ?>
                <input type="hidden" name="status" id="classic-status">
            <div class="modal-content">
                
                <div class="modal-header">
                    <h3 class="modal-title" id="classic-title">Update Classic data of - <span id="classic-transID"></span></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <h3 id="form-text"></h3>

                    <table width="100%">
                        <tr>
                            <td width="150"><label>Batch #:</label></td>
                            <td><input type="text" id="f_batch" name="batch" class="form-control col-md-4 input inline" ></td>
                        </tr>
                        <tr>
                            <td width="150"><label>Classic RQ:</label></td>
                            <td><input type="text" id="f_rq" name="rq" class="form-control col-md-4 input inline"></td>
                        </tr>                                       
                    </table>    

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="modal_action">UPDATE</button>
                </div>
            </div>
            </form>
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
        
        $('.btn-post').click(function() {

            let transaction_id = $(this).data('id');
            let url = '<?php echo route('transactions'); ?>';

            $('#form-status').val("POSTED");
            $('#form-text').text('Are you sure you want to post this transaction ?');
            $('#post-form').attr('action', url+'/'+transaction_id);

        });

        $('.btn-cancel').click(function() {

            let transaction_id = $(this).data('id');
            let url = '<?php echo route('transactions'); ?>';

            $('#form-status').val("CANCELLED");
            $('#form-text').text('Are you sure you want to cancel this transaction ?');
            $('#post-form').attr('action', url+'/'+transaction_id);

        });

        $('.btn-classic').click(function() {

            let transaction_id = $(this).data('id');
            let transID = $(this).data('transac');
            let rq = $(this).data('rq');
            let batch = $(this).data('batch');
            let url = '<?php echo route('transactions'); ?>';

            $('#classic-status').val("CLASSIC");
            $('#classic-transID').text(transID);
            $('#f_batch').val(batch);
            $('#f_rq').val(rq);
            $('#classic-form').attr('action', url+'/'+transaction_id);

        });


    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\owms_v2\resources\views/pages/transactions/transactions.blade.php ENDPATH**/ ?>