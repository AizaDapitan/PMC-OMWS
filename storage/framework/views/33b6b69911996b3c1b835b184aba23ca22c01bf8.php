

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

            <h3 class="page-title"> Receiver Maintenance </h3>

            <ul class="page-breadcrumb breadcrumb">
                <li> 
                <?php if($create): ?>
                <a class="btn blue" data-toggle="modal" data-backdrop="static" href="#modalAdd" style="color:white;">Add New</a>
                <?php else: ?>
                <button disabled class="btn blue" data-backdrop="static" style="color:white;">Add New</button>
                <?php endif; ?>
                </li>
            </ul>

            <div class="portlet box blue">

                <div class="portlet-title">
                    <div class="caption">
                        <i class=" icon-list"></i> List of Receivers
                    </div>
                            
                </div>

                <div class="portlet-body">

                    <div class="table-scrollable">
                        
                        <table class="table table-hover">

                            <thead>
                                <tr>                                    
                                    <th>Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $receivers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $receiver): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e($receiver->name); ?></td>
                                        <td>
                                            <?php if($edit): ?>
                                            <button class="btn btn-success btn-xs edit_item" data-toggle="modal" data-backdrop="static" 
                                                href="#modalEdit" data-href="<?php echo e(route('maintenance.receivers.update', $receiver->id)); ?>" 
                                                data-name="<?php echo e($receiver->name); ?>" > Edit </button> 
                                            
                                            <form method="POST" action="<?php echo e(route('maintenance.receivers.update', $receiver->id )); ?>" style="display: inline-block;">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('patch'); ?>
                                                <?php if( $receiver->isActive): ?>
                                                    <input type="hidden"  name="isActive" value="0">
                                                    <button type="submit" class="btn red btn-xs">Deactivate</button>
                                                <?php else: ?>
                                                    <input type="hidden" name="isActive" value="1">
                                                    <button type="submit" class="btn blue btn-xs">Activate</button>
                                                <?php endif; ?>
                                            </form>
                                            <?php else: ?>
                                            <button disabled class="btn btn-success btn-xs edit_item" data-toggle="modal" data-backdrop="static" 
                                                href="#modalEdit" data-href="<?php echo e(route('maintenance.receivers.update', $receiver->id)); ?>" 
                                                data-name="<?php echo e($receiver->name); ?>" > Edit </button> 
                                            
                                            <form method="POST" action="<?php echo e(route('maintenance.receivers.update', $receiver->id )); ?>" style="display: inline-block;">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('patch'); ?>
                                                <?php if( $receiver->isActive): ?>
                                                    <input type="hidden"  name="isActive" value="0">
                                                    <button disabled type="submit" class="btn red btn-xs">Deactivate</button>
                                                <?php else: ?>
                                                    <input type="hidden" name="isActive" value="1">
                                                    <button disabled type="submit" class="btn blue btn-xs">Activate</button>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td class="text-center" colspan="2"> No receivers Found </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>

                        </table>

                    </div>

                </div>
                
                <div class="col-md-6" style="margin-top: 10px; padding-top: 10px;">
                    Items <?php echo e($receivers->firstItem()); ?> - <?php echo e($receivers->lastItem()); ?>                        
                </div> 

                <div class="col-md-6 text-right">
                    <?php echo e($receivers->withQueryString()->links()); ?>                        
                </div>   

             </div>

        </div>

    </div>

    <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" action="<?php echo e(route('maintenance.receivers.store')); ?>">
                <?php echo csrf_field(); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modal_title">Add New Receiver</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            
                <div class="modal-body">

                    <table width="100%">
                        
                        <tr>
                            <td width="150"><label>Last Name:</label></td>
                            <td><input type="" name="lname" class="form-control col-md-4 input inline" placeholder="Last Name" required></td>                                       
                        </tr>
                        <tr>
                            <td width="150"><label>First Name:</label></td>
                            <td><input type="" name="fname" class="form-control col-md-4 input inline" placeholder="First Name" required></td>                                      
                        </tr>
                        <tr>
                            <td width="150"><label>Middle Name:</label></td>
                            <td><input type="" name="mname" class="form-control col-md-4 input inline" placeholder="Middle Name" required></td>                                     
                        </tr>
                        <tr>
                            <td width="150"><label></label></td>
                            <td><label class="label-control" style="font-size: 10px; color: blue"> Note: Extension names such as JR, SR, III, IV etc should be put adjacent next to first name (e.i: Jose Jr). Thank you!</label></td>                                      
                        </tr>

                    </table>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="modal_action">Save Receiver</button>
                </div>
            </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" action="" id="edit_form">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PATCH'); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modal_title">Update Receiver</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            
                <div class="modal-body">

                    <table width="100%">
                        <tr><td>Name</td><td><input type="text" class="form-control" id="edit_name" name="name" required></td></tr>
                    </table>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="modal_action">Update Receiver</button>
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
            
        $(document).ready(function() {

            $('.edit_item').click(function () {

                let route = $(this).data('href');
                let name = $(this).data('name');

                $('#edit_form').attr('action', route);
                $('#edit_name').val(name);

            });

        });

    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\omws\resources\views/pages/receivers/index.blade.php ENDPATH**/ ?>