

<?php $__env->startSection('pageCSS'); ?>

    <link href="google.css" rel="stylesheet" type="text/css"/>
    <link href="/themes/metronic/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="/themes/metronic/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
    <link href="/themes/metronic/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="/themes/metronic/assets/global/plugins/select2/select2.css" rel="stylesheet" type="text/css" />
    <link href="/themes/metronic/assets/global/css/components.css" rel="stylesheet" type="text/css"/>
    <link href="/themes/metronic/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
    <link href="/themes/metronic/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
    <link id="style_color" href="/themes/metronic/assets/admin/layout/css/themes/default.css" rel="stylesheet" type="text/css"/>
    <link href="/themes/metronic/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
    <link href="/themes/metronic/assets/global/plugins/bootstrap-datepicker/css/datepicker.css"/ rel="stylesheet" type="text/css">
    <style type="text/css">
        .form-group {
            margin-bottom: 0;
        }
    </style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">

        <div class="col-md-12">

            <h3 class="page-title"> Edit Transaction </h3>   

            <div class="portlet box blue">

                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>Edit Form
                    </div>                    
                </div>

                    <div class="portlet-body form">
                        
                        <!-- BEGIN FORM-->
                        <form action="<?php echo e(route('transaction.update', $transaction->id)); ?>" id="issuance-update" method="post" class="horizontal-form" enctype="multipart/form-data" >
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PATCH'); ?>

                            <input type="hidden" name="itemss" id="itemss">
                            <input type="hidden" name="deleted_items" id="deleted_items">
                            <input type="hidden" name="deducted_items" id="deducted_items">
                            <input type="hidden" name="t1" id="t1">
                            <input type="hidden" name="t2" id="t2" value="<?php echo e(old('t2','[]')); ?>">

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
                                                                    <select class="form-control select2me" name='contractor' id="contractor" data-placeholder="Select..." onchange="getLocation($(this).val())">
                                                                        <option></option>
                                                                        <?php $__currentLoopData = $contractors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contractor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <option value="<?php echo e($contractor->id); ?>"
                                                                                <?php if($contractor->id == old('contractor',$transaction->contractor_id)): ?> selected <?php endif; ?>><?php echo e($contractor->code); ?> - <?php echo e($contractor->lname); ?>, <?php echo e($contractor->fname); ?> <?php echo e($contractor->mname); ?>

                                                                            </option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </select>  
                                                                    </div>
                                                                    <br>
                                                                </td>                                                       
                                                            </tr>
                                                            <tr>
                                                                <td valign="top">Location:&nbsp;&nbsp;&nbsp;</td>
                                                                <td id="loclist">
                                                                    <div class="form-group">
                                                                    <select class="form-control select2me" name='location' id="location" data-placeholder="Select...">
                                                                        <option></option>
                                                                        <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																			<?php if($location->pivot->isActive == 1): ?>
                                                                            <option value="<?php echo e($location->id); ?>" <?php if($location->id == old('location', $transaction->location_id)): ?> selected <?php endif; ?>><?php echo e($location->name); ?></option>
																			<?php endif; ?>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </select> 
                                                                    </div>
                                                                    <br>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td valign="top">Date:</td>
                                                                <td>
                                                                    
                                                                    <div class="form-group">                                                                                
                                                                        <div class="input-group date date-picker margin-bottom-5" data-date-format="yyyy-mm-dd" data-date-start-date="">
                                                                            <input type="text" class="form-control form-filter" readonly name="docdate" id="docdate" value="<?php echo e(\Carbon\Carbon::parse(old('docdate',$transaction->docDate))->format('Y-m-d')); ?>">
                                                                            <span class="input-group-btn">
                                                                            <button class="btn  default" type="button"><i class="fa fa-calendar"></i></button>
                                                                            </span>
                                                                        </div>
                                                                        <br>
                                                                    </div>
                                                                    
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td valign="top">Transaction#:&nbsp;&nbsp;&nbsp;<span style="color: red;">*</span></td>
                                                                <td>
                                                                    <div class="form-group">
                                                                        <input class="form-control" name="seq" id="seq" value="<?php echo e(old('seq',$transaction->seq)); ?>">                 
                                                                    </div> <br>
                                                                </td>                                                       
                                                            </tr>                                                           
                                                            <tr>
                                                                <td>Files:&nbsp;&nbsp;&nbsp;</td>
                                                                <td>
                                                                    <div class="form-group">
                                                                    <input type="file" id="file" class="form-control" name="files" accept="image/*" value="<?php echo e($transaction->files); ?>" />
                                                                    <input type="hidden" name="fild_path" value="<?php echo e($transaction->files); ?>">
                                                                    <a href="<?php echo e($transaction->files); ?>">
                                                                        <img src="<?php echo e($transaction->files); ?>" width="250" />
                                                                    </a>
                                                                    </div>
                                                                </td>                                                       
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <td width="50%" valign="top" style="padding-right:50px;padding-left:20px;">
                                                        <table width="100%">      

                                                            <tr>
                                                                <td valign="top">MWS#:&nbsp;&nbsp;&nbsp;<span style="color: red;">*</span></td>
                                                                <td>
                                                                    <div class="form-group">
                                                                        <input class="form-control" name="mws" id="mws" value="<?php echo e(old('mws',$transaction->mws)); ?>">             
                                                                    </div>
                                                                    <br>
                                                                </td>                                                       
                                                            </tr>
                                                            <tr>
                                                                <td valign="top">Receiver:&nbsp;&nbsp;&nbsp;<span style="color: red;">*</span></td>
                                                                <td>
                                                                    <div class="form-group">
                                                                        <input type="text" name="receiver" class="form-control" value="<?php echo e(old('receiver',$transaction->receiver)); ?>">
                                                                    </div> <br>
                                                                </td>                                                       
                                                            </tr>
                                                            <tr>
                                                                <td valign="top">Approver:&nbsp;&nbsp;&nbsp;</td>
                                                                <td>      
                                                                    <div class="form-group">             
                                                                    <select class="form-control select2me" name='approver' id="approver" data-placeholder="Select...">
                                                                        <option></option>
                                                                        <?php $__currentLoopData = $approvers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $approver): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <option value="<?php echo e($approver->name); ?>" <?php if($approver->name == old('approver', $transaction->approver)): ?> selected <?php endif; ?>><?php echo e($approver->name); ?></option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </select> 
                                                                </div> <br> 
                                                                </td>                                                       
                                                            </tr>
                                                            <tr>
                                                                <td valign="top">Issuer:&nbsp;&nbsp;&nbsp;<span style="color: red;">*</span></td>
                                                                <td>
                                                                    <div class="form-group">
                                                                        <input class="form-control" name="issuer" id="issuer" value="<?php echo e(old('issuer',$transaction->issuer)); ?>">
                                                                    </div> <br>
                                                                </td>                                                       
                                                            </tr>
                                                            <tr>
                                                                <td valign="top">Remarks:&nbsp;&nbsp;&nbsp;</td>
                                                                <td>
                                                                    <div class="form-group">
                                                                        <textarea class="form-control" name="remarks" id="remarks" rows="5"><?php echo e(old('remarks', $transaction->remarks)); ?></textarea>     
                                                                    </div>
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
                                        <div class="portlet box green-meadow">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-search"></i>Existing Items
                                                </div>                                                  
                                            </div>
                                            <div class="portlet-body form">
                                                <div class="table-container">               
                                                    <table width="100%">
                                                        <thead>
                                                        <tr style="font-size:14px;color:blue;" align="center">
                                                            <th style="text-align: center;">Delete</th>
                                                            <th>Code</th>
                                                            <th width="50%">Item</th>
                                                            <th>Cost Code</th>
                                                            <th align="right" width="10%">Qty</th>
                                                            <th style="text-align: center;">Deduction</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody class="e_items_table">
                                                            <?php $__currentLoopData = $transaction->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <tr data-id="<?php echo e($detail->id); ?>" data-code="<?php echo e($detail->itemz? $detail->itemz->code:''); ?>">
                                                                    <td>
                                                                        <div class="checker" style="text-align: center;">
                                                                            <span>
                                                                            <input type="checkbox" data-id="<?php echo e($detail->id); ?>" name="delete<?php echo e($detail->id); ?>" id="isDEL<?php echo e($detail->id); ?>" class="del_items">
                                                                            </span>
                                                                        </div>
                                                                    </td>
                                                                    <td id="isCODE<?php echo e($detail->id); ?>"><?php echo e($detail->itemz ? $detail->itemz->code : ''); ?></td>
                                                                    <td id="isNAME<?php echo e($detail->id); ?>"><?php echo e($detail->itemz ? $detail->itemz->name : ''); ?></td>
                                                                    <td>
                                                                        <div class="form-group">
                                                                            <select class="form-control" id="isCCODE<?php echo e($detail->id); ?>" name="ccode<?php echo e($detail->id); ?>">
                                                                                <?php $__currentLoopData = $costcodes1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $costcode): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                    <option value="<?php echo e($costcode->name); ?>" <?php if($costcode->name == $detail->cost_code): ?> selected <?php endif; ?>><?php echo e($costcode->code); ?> - <?php echo e($costcode->name); ?></option>
                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                            </select>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-goup">
                                                                            <input type="text" id="isQTY<?php echo e($detail->id); ?>" name="qty<?php echo e($detail->id); ?>" value="<?php echo e($detail->qty); ?>" class="form-control" style="text-align: right;">
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="form-group" style="text-align: center;">
                                                                            <input type="checkbox" id="isDDUC<?php echo e($detail->id); ?>" name="is_deduction<?php echo e($detail->id); ?>" <?php if($detail->is_deducted ==1): ?> checked <?php endif; ?> class="deduc_items" data-id="<?php echo e($detail->id); ?>">
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        
                                                        <tr><td colspan="6"><hr></td></tr>
                                                        
                                                        <tr><td>&nbsp;</td></tr>                                                    
                                                        </tbody>
                                                    </table>                                                        
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-md-5 ">
                                        <div class="portlet box green-meadow">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-search"></i>Search from existing items
                                                </div>
                                                <div class="tools">
                                                                                                 
                                                </div>
                                            </div>
                                            <div class="portlet-body form">
                                                <div class="table-container">
                                                    <table class="table table-striped table-bordered table-hover">
                                                        <tr>
                                                            <td>
                                                                <input type="hidden" id="nxtid" name="nxtid" value="">
                                                                <input type="text" name="searchtxtp" id="searchtxtp" class="form-control margin-bottom-10" placeholder="Search anything..">
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <div id="search_result">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-7 ">
                                        <div class="portlet box blue">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-shopping-cart"></i>Added Items
                                                </div>
                                                
                                            </div>
                                            <div class="portlet-body form">
                                                <div class="table-container">                                                       
                                                    <div id="div_item">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>              
                                
                            </div>
                            <div class="form-actions right">
                                <a href="<?php echo e(route('transactions')); ?>"><button type="button" class="btn default">Cancel</button></a>
                                <button type="button" id="issuance-edit" class="btn blue"><i class="fa fa-check"></i> Save</button>
                            </div>
                        </form>
                        <!-- END FORM-->
                    </div>

            </div>

        </div>

    </div>

    

<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageJS'); ?>
    
    <script src="/themes/metronic/assets/global/plugins/jquery-1.11.0.min.js" type="text/javascript"></script>
    <script src="/themes/metronic/assets/global/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
    <script src="/themes/metronic/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="/themes/metronic/assets/global/plugins/select2/select2.min.js"></script>
    <script src="/themes/metronic/assets/global/scripts/metronic.js" type="text/javascript"></script>
    <script src="/themes/metronic/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
    <script src="/themes/metronic/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
    <script src="/themes/metronic/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

    <script type="text/javascript">
        var costCodes = <?php echo $costcodes; ?>;
        var trans_item = [];
        var del_item = [];
        var deduc_item = [];
        var e_items = [];
        var new_items = [];
        var initPickers = function () {
            //init date pickers
            $('.date-picker').datepicker({
                rtl: Metronic.isRTL(),
                autoclose: true
            });
        }
        initPickers();

        var getLocation = function(contractorID) {
            $.ajax({
               type:'GET',
               url:'/api/contractor-locations/'+contractorID,
               data:'_token = <?php echo csrf_token(); ?>',
               success:function(data) {

                    let options = "";
                    if(data.length>0) {
                        options += "<div class='form-group'><select class='form-control select2me' name='location' id='location' data-placeholder='Select...'><option value='0'>N/A</option>";
                        $.each(data, function(i, val) {
							if(val.pivot.isActive == 1) {
								options +="<option value='"+val.name+"'>"+val.name+"</option>"
							}
                        });
                        options +="</select></div>";
                    } else {
                        options +='<div class="alert alert-warning alert-dismissable">';
                        options +='<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>';
                        options +='<strong>No Location Assigned!</strong> Please contact mine engineering dept.</div>'; 
                    }

                    $('#loclist').html(options);

               }
            });
        }

        $('#searchtxtp').keyup(function() {

            //getLocation($('#contractor').val());

            if( $('#location').length == 0 ) {
                alert('Please select a location first');
                return false;
            }

            let itemname = $(this).val();

            $.ajax({
               type:'GET',
               url:'/api/get-item/'+itemname,
               data:'_token = <?php echo csrf_token(); ?>',
               success:function(data) {
                    let result = "";

                        result += '<div class="table-container">';
                        result += '<table class="table" id="sample_1">'
                        result += '<thead>';
                        result += '<tr style="font: 11px arial, sans-serif;">'                  
                        result += '<th>Code</th>';
                        result += '<th>Description</th>';                    
                        result += '<th class="table-checkbox">&nbsp;</th>';                  
                        result += '</tr></thead><tbody>';

                    if(data.length>0) {

                        $.each(data, function(i, val) {
                            result += '<tr>';
                            result += '<td>'+val.code+'</td>';
                            result += '<td>'+val.name+'</td>';
                            result += '<td><a href="#search-item-wrapper" class="add_item" data-itemcode="'+val.code+'" data-itemname="'+val.name+'" data-itemid="'+val.id+'"><i class="fa fa-plus"></i></a></td>';
                            result += '</tr>';
                        });

                        

                    } else {

                        result += '<tr><td colspan="3" style="text-align:center;">No Items Found</td></tr>';

                    }

                    result += '</tbody></table>';

                    $('#search_result').html(result);

               }
            });

        });

        $(document).on('change', '#location', function() {
            costCodes = [];
            $.ajax({
               type:'GET',
               url:'/api/location-costcodes/'+$(this).val(),
               data:'_token = <?php echo csrf_token(); ?>',
               success:function(data) {
                    costCodes = data;
               }
            });

        });

        $(document).on('click', '.add_item', function() {

            let code = $(this).data('itemcode');
            let name = $(this).data('itemname');
            let id   = $(this).data('itemid');
            let isExistingItem = false;

            if($('#added_items_table').length==0) {
                let table = "";
                    table += '<table class="table" id="added_items_table"><thead><tr><th></th><th>Code</th><th>Description</th><th>Cost Code</th><th>Qty</th>';
                    table += '<th>Deduction</th></tr></thead><tbody id="new_itemm"></tbody>';
                    table += '</table>'; 

                $('#div_item').append(table);  
            } 


            if($('.e_items_table > tr').length > 0) {
                $('.e_items_table > tr').each(function(index, tr) {
                    
                    if ($(tr).data('code') == code ) {
                        isExistingItem = true;
                    }

                });
            }

            if(isExistingItem){ 
                alert('item already added'); 
                return false;
            }


            if( $("#itemz"+id).length > 0 ) {
                let newVal = parseInt($("#newwQTY"+id).val());
                $('#newwQTY'+id).val(newVal+1);
                return false;
            }

            let ccodess = '';
                ccodess += '<select class="form-control" id="newwCCODE'+id+'" name="ccodes'+id+'">';
                ccodess += '<option value="0">Select Costcode</option>';
                $.each(costCodes, function(i, val){
                    ccodess += '<option value="'+val.name+'">'+val.name+'</option>';
                });
                ccodess += '</select>';

            let item = '<tr id="itemz'+id+'" data-id="'+id+'">';
                item += '<td><a href="#search-item-wrapper" class="remove_item"><i class="fa fa-times" ></i></a></td>';
                item += '<td id="newwCODE'+id+'">'+code+'<input type="hidden" name="item__id'+id+'" value="'+id+'"></td>';
                item += '<td id="newwNAME'+id+'">'+name+'</td>';
                item += '<td>'+ccodess+'</td>';
                item += '<td><input type="text" name="qty'+id+'" id="newwQTY'+id+'" class="form-control" value="0" style="text-align:right;"> </td>';
                item += '<td style="text-align:center;"><input type="checkbox" id="newwDEDUC'+id+'" name="is_deducted'+id+'"></td>';
                item += '</tr>';  

            $('#added_items_table tbody').append(item);

            trans_item.push(id);
            $('#itemss').val(trans_item);

        });


        $(document).on('click', '.remove_item', function() {
            $(this).closest('tr').remove();
        });

        $('.del_items').click(function () {
            let id = $(this).data('id');

            if($(this).prop('checked')) {
                del_item.push($(this).data('id'));
            } else {

                for(var x = 0; x < del_item.length; x++) {
                    if(del_item[x] == id) {
                        del_item.splice(x, 1);
                    }
                }

            }

            if( del_item.length>0) {
                $('#deleted_items').val(del_item);                
            } else {
                $('#deleted_items').val("");
            }

        });

        $('.deduc_items').click(function () {
            let id = $(this).data('id');

            if($(this).prop('checked')) {
                deduc_item.push($(this).data('id'));
            } else {

                for(var x = 0; x < deduc_item.length; x++) {
                    if(deduc_item[x] == id) {
                        deduc_item.splice(x, 1);
                    }
                }

            }

            if( deduc_item.length>0) {
                $('#deducted_items').val(deduc_item);                
            } else {
                $('#deducted_items').val("");
            }

        });

        $('#issuance-edit').click(function(e) {
            
            let e_item_data = [];
            let new_item_data = [];
            let new_item_has_ccode = true;

            if($('.e_items_table > tr').length > 0) {
                $('.e_items_table > tr').each(function(index, tr) {
                    let e_item_id = $(tr).data('id');

                    if( typeof e_item_id !== 'undefined' ) {

                        let data = {
                            id            : e_item_id ,
                            is_delete     : $('#isDEL'+e_item_id).prop('checked') ? 1: 0 ,
                            code          : $('#isCODE'+e_item_id).text().trim() ,
                            name          : $('#isNAME'+e_item_id).text().trim() ,
                            costcode      : $('#isCCODE'+e_item_id).val() ,
                            qty           : $('#isQTY'+e_item_id).val() ,
                            is_deducted   : $('#isDDUC'+e_item_id).prop('checked') ? 1:0
                        };

                        e_item_data.push(data);

                    }

                });
            }


            if($('#new_itemm > tr').length > 0) {
                $('#new_itemm > tr').each(function(index, tr) {
                    let e_item_id = $(tr).data('id');

                    if( typeof e_item_id !== 'undefined' ) {

                        let data = {
                            id            : e_item_id ,
                            code          : $('#newwCODE'+e_item_id).text().trim() ,
                            name          : $('#newwNAME'+e_item_id).text().trim() ,
                            costcode      : $('#newwCCODE'+e_item_id).val() ,
                            qty           : $('#newwQTY'+e_item_id).val() ,
                            is_deducted   : $('#newwDDUC'+e_item_id).prop('checked') ? 1:0
                        };
                        if( $('#newwCCODE'+e_item_id).val() == 0 ) {
                            new_item_has_ccode = false;
                        }
                        new_item_data.push(data);

                    }

                });
            }

            $('#t1').val(JSON.stringify(e_item_data));
            $('#t2').val(JSON.stringify(new_item_data));

            if( !new_item_has_ccode ) {
                alert('Your new added item doesnt have a cost code');
                return false;
            }

            $('#issuance-update').submit();

        });

        (function(){

            let new_added_items = JSON.parse($('#t2').val());

            if(new_added_items.length > 0) {

                if($('#added_items_table').length==0) {

                    let table = "";
                        table += '<table class="table" id="added_items_table"><thead><tr><th></th><th>Code</th><th>Description</th><th>Cost Code</th><th>Qty</th>';
                        table += '<th>Deduction</th></tr></thead><tbody id="new_itemm"></tbody>';
                        table += '</table>'; 

                    $('#div_item').append(table);  

                } 

                $.each(new_added_items, function(i, b) {

                    let ccodess = '';
                        ccodess += '<select class="form-control" id="newwCCODE'+b.id+'" name="ccodes'+b.id+'">';
                        ccodess += '<option value="0">Select Costcode</option>';
                        $.each(costCodes, function(c, val){
                            if( b.costcode == val.name ) {
                                ccodess += '<option value="'+val.name+'" selected>'+val.name+'</option>';
                            } else {
                                ccodess += '<option value="'+val.name+'">'+val.name+'</option>';
                            }
                        });
                        ccodess += '</select>';

                    let item = '<tr id="itemz'+b.id+'" data-id="'+b.id+'">';
                        item += '<td><a href="#search-item-wrapper" class="remove_item"><i class="fa fa-times" ></i></a></td>';
                        item += '<td id="newwCODE'+b.id+'">'+b.costcode+'<input type="hidden" name="item__id'+b.id+'" value="'+b.id+'"></td>';
                        item += '<td id="newwNAME'+b.id+'">'+b.name+'</td>';
                        item += '<td>'+ccodess+'</td>';
                        item += '<td><input type="text" name="qty'+b.id+'" id="newwQTY'+b.id+'" class="form-control" value="'+b.qty+'" style="text-align:right;"> </td>';
                        item += '<td style="text-align:center;">';
                        if( b.is_deducted ){
                        item += '<input type="checkbox" id="newwDEDUC'+b.id+'" name="is_deducted'+b.id+'" checked></td>';
                        }  else {
                            item += '<input type="checkbox" id="newwDEDUC'+b.id+'" name="is_deducted'+b.id+'"></td>';
                        }
                        item += '</tr>';

                    $('#added_items_table tbody').append(item);

                });

            }

        })();


    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\owms_v2\resources\views/pages/transactions/transaction-edit.blade.php ENDPATH**/ ?>