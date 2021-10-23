

<?php $__env->startSection('pageCSS'); ?>

    <link href="google.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(env('APP_URL')); ?>/themes/metronic/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(env('APP_URL')); ?>/themes/metronic/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(env('APP_URL')); ?>/themes/metronic/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

    <link href="<?php echo e(env('APP_URL')); ?>/themes/metronic/assets/global/css/components.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(env('APP_URL')); ?>/themes/metronic/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(env('APP_URL')); ?>/themes/metronic/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
    <link id="style_color" href="<?php echo e(env('APP_URL')); ?>/themes/metronic/assets/admin/layout/css/themes/default.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(env('APP_URL')); ?>/themes/metronic/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
    <style type="text/css">
        table td {
            padding-bottom: 10px; 
        }
    </style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">

        <div class="col-md-12">

            <h3 class="page-title"> Cost Code Maintenance </h3>

            <ul class="page-breadcrumb breadcrumb">
                <li> 
                    <?php if($create): ?>
                        <a class="btn blue" data-toggle="modal" data-backdrop="static" href="#modalAdd" onclick="addCostCode()" style="color:white;">Add New</a>    
                    <?php else: ?>
                        <button disabled class="btn blue" data-toggle="modal" data-backdrop="static" href="#modalAdd" onclick="addCostCode()" style="color:white;">Add New</button>
                    <?php endif; ?>                
                </li>
            </ul>

            <div class="portlet box blue">

                <div class="portlet-title">
                    <div class="caption">
                        <i class=" icon-list"></i> List of Cost Codes
                    </div>
                            
                </div>

                <div class="portlet-body">

                    <form method="get" action="<?php echo e(route('maintenance.costcodes.index')); ?>">
                        <table width="100%">
                            <tr>
                                <td>Search:<input type="hidden" name="action" value="search"></td>
                                <td><input type="text" name="searchtxt" id="searchtxt" class="form-control input " placeholder="Enter Name"></td>                                 
                                <td align="left"><input type="submit" class="btn purple" value="Search"> </td>                                  
                            </tr>
                        </table>
                    </form>                

                    <div class="table-scrollable">
                        
                        <table class="table table-hover">

                            <thead>
                                <tr>               
                                    <th>Action</th>                                                         
                                    <th>Code</th>
                                    <th>Description</th>
                                    <th>Status</th>                                    
                                </tr>
                            </thead>

                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $costcodes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $costcode): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td>
                                            <?php if($edit): ?>
                                                <a href="#" class="btn btn-success btn-xs edit_item" onclick="update_costcode('<?php echo e($costcode->id); ?>','<?php echo e($costcode->name); ?>','<?php echo e($costcode->description); ?>')"><i class='fa fa-pencil'></i> </a>
                                            <?php else: ?>
                                                <button disabled href="#" class="btn btn-success btn-xs edit_item"><i class='fa fa-pencil'></i> </button>
                                            <?php endif; ?>                                    
                                        </td>
										<td>
                                            <?php echo e($costcode->name); ?>

										</td>
                                        <td>
                                            <?php echo e($costcode->description); ?>

                                        </td>                
                                        <td> 
                                            <?php if($edit): ?>
                                                <?php if($costcode->isActive): ?>                                                    
                                                    <a href="#" class="btn btn-xs red" onclick="change_status('<?php echo e($costcode->id); ?>',0)">Deactivate</a>                                            
                                                <?php else: ?>
                                                    <a href="#" class="btn btn-xs green" onclick="change_status('<?php echo e($costcode->id); ?>',1)">Activate</a>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <?php if($costcode->isActive): ?>                                                                                                        
                                                    <button disabled href="#" class="btn btn-xs red" onclick="change_status('<?php echo e($costcode->id); ?>','INACTIVE')">Deactivate</button>                                                
                                                <?php else: ?>
                                                    <button disabled href="#" class="btn btn-xs green" onclick="change_status('<?php echo e($costcode->id); ?>','ACTIVE')">Activate</button>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td class="text-center" colspan="4"> No costcodes Found </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>

                        </table>

                    </div>

                </div>
                
                <div class="col-md-6" style="margin-top: 10px; padding-top: 10px;">
                    Items <?php echo e($costcodes->firstItem()); ?> - <?php echo e($costcodes->lastItem()); ?>                        
                </div> 

                <div class="col-md-6 text-right">
                    <?php echo e($costcodes->withQueryString()->links()); ?>                        
                </div>   

             </div>

        </div>

    </div>

    <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" action="<?php echo e(route('maintenance.costcodes.store')); ?>">
                <?php echo csrf_field(); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modal_title">Add New Costcode</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            
                <div class="modal-body">

                    <table width="100%">
                    
                        <tr>
                            <td width="150"><label>Code <span class="required" aria-required="true"> * </span></label></td>
                            <td><input type="text" class="form-control" id="name" name="name" placeholder="Code" required maxlength="30"></td>                                       
                        </tr>
                        <tr>
                            <td width="150"><label>Description <span class="required" aria-required="true"> * </span></label></td>
                            <td>
                                <textarea name="description" id="description" class="form-control col-md-4 input inline" placeholder="Description" rows="5" required maxlength="50"></textarea>
                            </td>
                        </tr>

                    </table>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="modal_action">Save Costcode</button>
                </div>
            </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" action="<?php echo e(route('maintenance.costcodes.update')); ?>">
                <?php echo csrf_field(); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modal_title">Update Costcode</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            
                <div class="modal-body">                    
                    <input type="hidden" name="nameid" id="nameid">
                    <table width="100%">
                        
                        <tr>
                            <td width="150"><label>Code <span class="required" aria-required="true"> * </span></label></td>
                            <td><input class="form-control" type="text" name="name" id="edit_name" placeholder="Code" required maxlength="30"></td>
                        </tr>

                        <tr>
                            <td width="150"><label>Description <span class="required" aria-required="true"> * </span></label></td>
                            <td><input class="form-control col-md-4 input inline" rows="5" type="text" name="description" id="edit_description" placeholder="Description" required maxlength="50"></td>
                        </tr>                                                
                    </table>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="modal_action">Update Costcode</button>
                </div>
            </div>
            </form>
        </div>
    </div>

	<div class="modal fade" id="name-status" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
			
		<form method="post" action="<?php echo e(route('maintenance.costcode.change-status')); ?>">
			<?php echo csrf_field(); ?>
			<div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Confirmation</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
				<div class="modal-body">
					<p>
						You are about to change the status of the selected costcode into						
						<b><span id="name_status"></span></b>. Do you want to continue?
					</p>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="costcodeid" id="costcodeid">
					<input type="hidden" name="namestatus" id="namestatus">
					<button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
					<button type="submit" class="btn" id="btnStatus">Yes, <span id="status_btn"></span>!</button>
				</div>
			</div>
		</form>
		</div>
	</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageJS'); ?>
    
    <script src="<?php echo e(env('APP_URL')); ?>/themes/metronic/assets/global/plugins/jquery-1.11.0.min.js" type="text/javascript"></script>
    <script src="<?php echo e(env('APP_URL')); ?>/themes/metronic/assets/global/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
    <script src="<?php echo e(env('APP_URL')); ?>/themes/metronic/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

    <script src="<?php echo e(env('APP_URL')); ?>/themes/metronic/assets/global/scripts/metronic.js" type="text/javascript"></script>
    <script src="<?php echo e(env('APP_URL')); ?>/themes/metronic/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
    <script src="<?php echo e(env('APP_URL')); ?>/themes/metronic/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>

    <script type="text/javascript">
            
		function update_costcode(id,name,description)
		{
			$('#nameid').val(id);			
			$('#edit_name').val(name);
			$('#edit_description').val(description);
			$('#modalEdit').modal('show');
		}


		function addCostCode() 
		{										
			$('#nameid').val('');
			$('#name').val('');
			$('#description').val('');			
		}        

		function change_status(id,status)
        {
			$('#costcodeid').val(id);
			$('#namestatus').val(status);
			var status_str = "INACTIVE";
			if(status == 1)
			{
				status_str = "ACTIVE";
			}
			$('#name_status').html(status_str);

			if(status == 1){
				$('#status_btn').html('activate');
				$('#btnStatus').addClass('green');
				$('#btnStatus').removeClass('red');
			} else {
				$('#status_btn').html('deactivate');
				$('#btnStatus').addClass('red');
				$('#btnStatus').removeClass('green');
			}

			$('#name-status').modal('show');
		}


    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\omws\resources\views/pages/costcodes/index.blade.php ENDPATH**/ ?>