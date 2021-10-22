

<?php $__env->startSection('pageCSS'); ?>

    <link href="google.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(env('APP_URL')); ?>/themes/metronic/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(env('APP_URL')); ?>/themes/metronic/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(env('APP_URL')); ?>/themes/metronic/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(env('APP_URL')); ?>/themes/metronic/assets/global/plugins/select2/select2.css" rel="stylesheet" type="text/css" />
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

            <h3 class="page-title"> Add New Issuance </h3>

            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="/">Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Add Issuance Request</a>
                </li>
                
            </ul>

            <div class="portlet box blue">

                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>Add Form
                    </div>                    
                </div>

                    <div class="portlet-body form">
                        
                        <!-- BEGIN FORM-->
                        <form action="<?php echo e(route('ppe-transaction.store')); ?>" id="ppe-create"  method="post" class="horizontal-form" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="contractor_id" value="<?php echo e($transaction->contractorId); ?>">
                            <input type="hidden" name="trans_id" value="<?php echo e($transaction->id); ?>">
                            <input type="hidden" name="t1" id="t1">
                            <div class="form-body">                                 
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">                                               
                                            <table width="90%" style="margin-left:20px;">
                                                <tr>
                                                    <td width="50%" valign="top">
                                                        <table width="100%">                                                                                
                                                            <tr>
                                                                <td valign="top">Contractor:&nbsp;&nbsp;&nbsp;</td>
                                                                <td>        
                                                                    <div class="form-group">            
                                                                    <input type="text" name="contractor" value="<?php echo e($transaction->receiver); ?>" class="form-control" readonly>
                                                                    </div>     
                                                                </td>                                                       
                                                            </tr>
                                                            <tr>
                                                                <td valign="top">Location:&nbsp;&nbsp;&nbsp;</td>
                                                                <td id="loclist">
                                                                    <div class="form-group">
                                                                    <select class="form-control select2me" name='location' id="location" data-placeholder="Select...">
                                                                            <option ></option>
                                                                        <?php $__empty_1 = true; $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                                            <option value="<?php echo e($location->id); ?>">
                                                                                <?php echo e($location->name); ?>

                                                                            </option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                                        <?php endif; ?>
                                                                    </select> 
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td valign="top">Date:</td>
                                                                <td>
                                                                    
                                                                    <div class="form-group">                                                                                
                                                                        <div class="input-group date date-picker margin-bottom-5" data-date-format="yyyy-mm-dd" data-date-start-date="">
                                                                            <input type="text" class="form-control form-filter" readonly name="docdate" id="docdate" value="<?php echo e(date('Y-m-d')); ?>">
                                                                            <span class="input-group-btn">
                                                                            <button class="btn  default" type="button"><i class="fa fa-calendar"></i></button>
                                                                            </span>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                    
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td valign="top">Transaction#:&nbsp;&nbsp;&nbsp;<span style="color: red;">*</span></td>
                                                                <td>
                                                                    <?php if(count($open_sequences)>1): ?>
                                                                        <select class="form-control" name="seq" id="seq">
                                                                            <?php $__currentLoopData = $open_sequences; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sequence): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <option value="<?php echo e($sequence->sequence_id); ?>" <?php if($sequence->is_fabricated == 0 && Carbon\Carbon::parse($sequence->date_created)->format('Y-m-d')==Carbon\Carbon::now()->format('Y-m-d')): ?> selected <?php endif; ?>><?php echo e($sequence->sequence_id); ?></option>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        </select>
                                                                    <?php else: ?>
                                                                        <input class="form-control" name="seq" id="seq" value="<?php echo e($open_sequences[0]->sequence_id); ?>" readonly>                     
                                                                    <?php endif; ?>  <br>
                                                                </td>                                                       
                                                            </tr>                                                           
                                                            <tr>
                                                                <td valign="top">Files:&nbsp;&nbsp;&nbsp;</td>
                                                                <td>
                                                                    <input type="file" id="file" name="file" accept="image/*" class="form-control" />           
                                                                </td>                                                       
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <td width="50%" valign="top" style="padding-right:50px;padding-left:20px;">
                                                        <table width="100%">    

                                                            <tr>
                                                                <td valign="top">MWS#:&nbsp;&nbsp;&nbsp;<span style="color: red;">*</span></td>
                                                                <td>
                                                                    <input class="form-control" name="mws" id="mws" value="<?php echo e($transaction->controlNum); ?>">                              
                                                                    <br>
                                                                </td>                                                       
                                                            </tr>
                                                            <tr>
                                                                <td valign="top">Receiver:&nbsp;&nbsp;&nbsp;<span style="color: red;">*</span></td>
                                                                <td>     
                                                                    <input type="text" name="receiver" class="form-control" value="<?php echo e($transaction->receiverId); ?>" readonly>
                                                                    <br> 
                                                                </td>                                                       
                                                            </tr>
                                                            <tr>
                                                                <td valign="top">Approver:&nbsp;&nbsp;&nbsp;<span style="color: red;">*</span></td>
                                                                <td>      
                                                                    <div class="form-group">              
                                                                    <select class="form-control select2me" name='approver' id="approver" data-placeholder="Select...">
                                                                        <option></option>
                                                                        <option value="ED CASTRO" selected="selected">ED CASTRO</option>
                                                                        <?php $__currentLoopData = $approvers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $approver): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <option value="<?php echo e($approver->name); ?>"><?php echo e($approver->name); ?></option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </select>    
                                                                    </div>
                                                                </td>                                                       
                                                            </tr>
                                                            <tr>
                                                                <td valign="top">Issuer:&nbsp;&nbsp;&nbsp;<span style="color: red;">*</span></td>
                                                                <td>
                                                                    <input class="form-control" name="issuer" id="issuer"><br>
                                                                </td>                                                       
                                                            </tr>
                                                            <tr>
                                                                <td valign="top">Remarks:&nbsp;&nbsp;&nbsp;</td>
                                                                <td>
                                                                    <textarea class="form-control" name="remarks" id="remarks" rows="5"></textarea>     
                                                                </td>                                                       
                                                            </tr>

                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>                                                

                                        </div>
                                    </div>
                                    
                                </div>
                                <!--/row-->
                            
                                <h3 class="form-section">Items</h3>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                    <div class="portlet box blue">
                                        
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-gift"></i>
                                            </div>
                                            <div class="tools">
                                                <a href="javascript:;" class="collapse">
                                                </a>                                                        
                                            </div>
                                        </div>

                                        <div class="portlet-body form">
                                            <div class="table-container">                                                   
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <td>Option</td>
                                                            <td>Request</td>
                                                            <td>Color</td>
                                                            <td>Size</td>
                                                            <td>Remarks</td>
                                                            <td>Item</td>
                                                            <td>Code</td>
                                                            <td>Qty</td>
                                                            <td>Deduction</td>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="e_items_table">
                                                        <?php $__currentLoopData = $transaction->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php 
                                                                $bal = $detail->qty - $detail->qtyReleased;
                                                            ?>
                                                            <?php if($bal>0): ?>
                                                            <tr data-id="<?php echo e($detail->id); ?>">
                                                                <td>
                                                                    <?php if($detail->noPAR == 1 ): ?>
                                                                        Release without par <?php echo e($detail->id); ?>

                                                                    <?php else: ?> 
                                                                        <a href="<?php echo e(route('item-no-par', $detail->id)); ?>" class="btn btn-sm green">Release w/out PAR</a>
                                                                    <?php endif; ?>
                                                                </td>
                                                                <td><?php echo e($detail->itemDesc); ?></td>
                                                                <td><?php echo e($detail->itemColor); ?></td>
                                                                <td><?php echo e($detail->itemSize); ?></td>
                                                                <td><?php echo e($detail->remarks); ?></td>
                                                                <td width="40%">
                                                                    <select class="form-control select2me" id="itemzz<?php echo e($detail->id); ?>" name="item<?php echo e($detail->id); ?>" data-placeholder="Select...">
                                                                        <option></option>
                                                                        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <option value="<?php echo e($item->id); ?>"><?php echo e($item->code); ?> - <?php echo e($item->name); ?></option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select class="form-control" name="ccode<?php echo e($detail->id); ?>">
                                                                        <option value="365" selected>6.06.36.097.501</option>
                                                                        <?php $__currentLoopData = $costcodes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <option value="<?php echo e($code->name); ?>"><?php echo e($code->name); ?></option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    
                                                                    <div class="form-group">
                                                                    <select class="form-control" name="qty<?php echo e($detail->id); ?>">
                                                                        <?php if($bal>0): ?>
                                                                            <?php for($x=1; $x<=$bal; $x++): ?>
                                                                                <option value="<?php echo e($x); ?>" <?php if($bal == $x): ?> selected <?php endif; ?>><?php echo e($x); ?></option>
                                                                            <?php endfor; ?>
                                                                        <?php endif; ?>
                                                                    </select>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" name="deduction<?php echo e($detail->id); ?>" class="form-control">
                                                                </td>
                                                            </tr>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                    </div>

                                </div>              
                                
                            </div>

                            <div class="form-actions right">
                                <a href="<?php echo e(route('transactions')); ?>"><button type="button" class="btn default">Cancel</button></a>
                                <button type="button" id="save-ppe" class="btn blue"><i class="fa fa-check"></i> Save</button>
                            </div>
                        </form>
                        <!-- END FORM-->
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
    
    
    <script type="text/javascript">
        var initPickers = function () {
            //init date pickers
            $('.date-picker').datepicker({
                rtl: Metronic.isRTL(),
                autoclose: true
            });
        }
        initPickers();

        $('#save-ppe').click(function(e) {

            e.preventDefault();
            let no_selected_item  = false;

            if($('.e_items_table > tr').length > 0) {
                console.log('woot');
                $('.e_items_table > tr').each(function(index, tr) {
                    let e_item_id = $(tr).data('id');
                    console.log(e_item_id);
                    if( typeof e_item_id !== 'undefined' ) {
                        console.log('defined');
                        if( $('#itemzz'+e_item_id).val() == 0 ) {
                            no_selected_item = true;
                        }

                    }

                });
            }

            if(no_selected_item){ 
                alert('Please select the requested item');
                return false 
            }

            $('#ppe-create').submit();

        });

    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PERSONAL\SC\PMC PROJECT\omws\resources\views/pages/transactions/ppe-create.blade.php ENDPATH**/ ?>