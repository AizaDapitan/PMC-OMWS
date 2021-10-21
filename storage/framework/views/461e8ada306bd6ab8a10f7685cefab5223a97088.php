

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

            <h3 class="page-title"> Role Maintenance </h3>

            <ul class="page-breadcrumb breadcrumb">
                <li> 
                    <a class="btn blue" data-toggle="modal" data-backdrop="static" href="#modalAdd" onclick="addRole()" style="color:white;">Add New</a>                    
                </li>
            </ul>

            <div class="portlet box blue">

                <div class="portlet-title">
                    <div class="caption">
                        <i class=" icon-list"></i> List of Roles
                    </div>
                            
                </div>

                <div class="portlet-body">

                    <form method="get" action="<?php echo e(route('maintenance.roles.index')); ?>">
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
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
										<td>
											<?php echo e(strtoupper($role->name)); ?>

										</td>
                                        <td><?php echo e(($role->description)); ?></td>                
                                        <td> 
                                            <?php if($role->active): ?>
                                            <i class="font-blue"> Active</i>
                                            <?php else: ?>
                                            <i class="font-red"> Inactive</i>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-success btn-xs edit_item" onclick="update_role('<?php echo e($role->id); ?>','<?php echo e($role->name); ?>','<?php echo e($role->description); ?>','<?php echo e($role->active); ?>')">Edit </a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td class="text-center" colspan="4"> No roles Found </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>

                        </table>

                    </div>

                </div>
                
                <div class="col-md-6" style="margin-top: 10px; padding-top: 10px;">
                    Items <?php echo e($roles->firstItem()); ?> - <?php echo e($roles->lastItem()); ?>                        
                </div> 

                <div class="col-md-6 text-right">
                    <?php echo e($roles->withQueryString()->links()); ?>                        
                </div>   

             </div>

        </div>

    </div>

    <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" action="<?php echo e(route('maintenance.roles.store')); ?>">
                <?php echo csrf_field(); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modal_title">Add New Role</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            
                <div class="modal-body">

                    <table width="100%">
                        
                        <tr>
                            <td width="150"><label>Status:</label></td>
                            <td><input type="checkbox" name="active" id="active"></td>                                     
                        </tr>                    
                        <tr>
                            <td width="150"><label>Name <span class="required" aria-required="true"> * </span></label></td>
                            <td><input type="text" class="form-control" id="role" name="role" placeholder="Role" required maxlength="30"></td>                                       
                        </tr>
                        <tr>
                            <td width="150"><label>Description <span class="required" aria-required="true"> * </span></label></td>
                            <td><input type="text" class="form-control" id="description" name="description" placeholder="Description" required maxlength="50"></td>                                      
                        </tr>

                    </table>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="modal_action">Save Role</button>
                </div>
            </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" action="<?php echo e(route('maintenance.roles.update')); ?>">
                <?php echo csrf_field(); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modal_title">Update Role</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            
                <div class="modal-body">
                    <input type="hidden" name="nameid" id="nameid">
                    <table width="100%">
                        
                        <tr>
                            <td width="150"><label>Status:</label></td>
                            <td><input type="checkbox" name="edit_active" id="edit_active"></td>
                        </tr>
                        <tr>
                            <td width="150"><label>Name <span class="required" aria-required="true"> * </span></label></td>
                            <td><input class="form-control" type="text" name="name" id="edit_name" placeholder="Role" required maxlength="30"></td>
                        </tr>

                        <tr>
                            <td width="150"><label>Description <span class="required" aria-required="true"> * </span></label></td>
                            <td><input class="form-control" type="text" name="description" id="edit_description" placeholder="Description" required maxlength="50"></td>
                        </tr>                                                
                    </table>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="modal_action">Update Role</button>
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
            
		function update_role(id,name,description,status)
		{
			if (status == "1")
			{				
				document.getElementById('edit_active').checked = true;
			}
			else
			{
				document.getElementById('edit_active').checked = false;
			}

			$('#nameid').val(id);			
			$('#edit_name').val(name);
			$('#edit_description').val(description);
			$('#modalEdit').modal('show');
		}


		function addRole() 
		{										
			$('#nameid').val('');
			$('#role').val('');
			$('#description').val('');			
		}        

    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\omws\resources\views/pages/roles/index.blade.php ENDPATH**/ ?>