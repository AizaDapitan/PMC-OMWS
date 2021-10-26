

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

            <h3 class="page-title"> Sequence Control Maintenance </h3>

            <div class="portlet box blue">

                <div class="portlet-title">
                    <div class="caption">
                        <i class=" icon-list"></i> List of Sequences
                    </div>

                    <div class="actions">
                        <?php if($create): ?>
                            <a class="btn green btn-sm" data-toggle="modal" data-backdrop="static" href="#modalAdd" onclick="addSequence()" style="color:white;">Add Fabricated Number <i class="fa fa-plus"></i></a>    
                        <?php else: ?>
                            <button disabled class="btn green btn-sm" data-toggle="modal" data-backdrop="static" href="#modalAdd" onclick="addSequence()" style="color:white;">Add Fabricated Number <i class="fa fa-plus"></i> </button>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="portlet-body">

                    <form method="get" action="<?php echo e(route('maintenance.sequence.index')); ?>">
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
                                    <th>Sequence Number</th>
                                    <th>Date Started</th>
                                    <th>Status</th>
                                    <th align = "center">Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $sequences; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sequence): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
										<td>
                                            <?php echo e($sequence->sequence_id); ?>

										</td>

                                        <td>
                                            <?php echo e(\Carbon\Carbon::parse($sequence->date_created)->format('Y-m-d H:s A')); ?>             
                                        </td>

                                        <td>
                                            <span id="seq_stat<?php echo e($sequence->id); ?>" class="label <?php echo e($sequence->is_open ? 'label-success':'label-default'); ?> "><?php echo e($sequence->is_open ? 'Open':'Close'); ?></span>
                                        </td>

                                        <td align="center">
                                            <?php if($sequence->is_fabricated == 1): ?> <span class="badge badge-primary">FABRICATED</span> <br> added by: <?php echo e($sequence->created_by); ?> <?php endif; ?>
                                        </td>

                                        <td>                       
                                            <?php if($edit): ?> 
                                                <button class="btn btn-primary btnToggleAction" data-id="<?php echo e($sequence->id); ?>"><?php echo e($sequence->is_open ? 'Close':'Open'); ?></button> 
                                            <?php else: ?>
                                                <button disabled class="btn btn-primary btnToggleAction" data-id="<?php echo e($sequence->id); ?>"><?php echo e($sequence->is_open ? 'Close':'Open'); ?></button> 
                                            <?php endif; ?> 
                                                              
                                            <?php if($sequence->is_fabricated == 1): ?>
                                                <?php if($edit): ?>
                                                    <a href="#" class="btn btn-warning edit_item" onclick="update_sequence('<?php echo e($sequence->id); ?>','<?php echo e($sequence->sequence_id); ?>')">Edit </a>
                                                <?php else: ?>
                                                    <button disabled href="#" class="btn btn-warning edit_item">Edit </button>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td class="text-center" colspan="4"> No sequence Found </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>

                        </table>

                    </div>

                </div>
                
                <div class="col-md-6" style="margin-top: 10px; padding-top: 10px;">
                    Items <?php echo e($sequences->firstItem()); ?> - <?php echo e($sequences->lastItem()); ?>                        
                </div> 

                <div class="col-md-6 text-right">
                    <?php echo e($sequences->withQueryString()->links()); ?>                        
                </div>   

             </div>

        </div>

    </div>

    <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" action="<?php echo e(route('maintenance.sequence.store')); ?>">
                <?php echo csrf_field(); ?>
            <div class="modal-content">
                <div class="modal-header" style="background-color: #0480be; ">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title" style="color: #5C2018"><i class="icon-list"></i> Add New Fabricated Number</h4>
                </div>
            
                <div class="modal-body">

                    <input type="hidden" class="form-control" name="created_by" id="created_by" value="<?php echo e(Auth::user()->username); ?>" readonly>
                    <input type="hidden" class="form-control" name="is_fabricated" id="is_fabricated" value="1" readonly>
                    <input type="hidden" class="form-control" name="is_open" id="is_open" value="1" readonly>                

                    <table width="100%">
                        <tr>
                            <td width="150"><label>Fabricated Number <span class="required" aria-required="true"> * </span></label></td>
                            <td><input type="number" class="form-control" id="sequence_id" name="sequence_id" step="any" placeholder="Enter Fabricated Number" value="<?php echo e(isset($_GET['sequence_id']) ? $_GET['sequence_id'] : ''); ?>" required></td>                                       
                        </tr>
                    </table>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="modal_action">Save Sequence</button>
                </div>
            </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" action="<?php echo e(route('maintenance.sequence.update')); ?>">
                <?php echo csrf_field(); ?>
            <div class="modal-content">
                <div class="modal-header" style="background-color: #0480be; ">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title" style="color: #5C2018"><i class="icon-list"></i> Update Fabricated Number</h4>
                </div>
            
                <div class="modal-body">
                    <input type="hidden" name="nameid" id="nameid">
                    <input type="hidden" class="form-control" name="updated_by" id="updated_by" value="<?php echo e(Auth::user()->username); ?>" readonly> 
                    
                    <table width="100%">
                        <tr>
                            <td width="150"><label>Fabricated Number <span class="required" aria-required="true"> * </span></label></td>
                            <td><input class="form-control" type="number" name="sequence_id" id="edit_sequence_id" step="any" placeholder="Enter Fabricated Number" value="<?php echo e(isset($_GET['sequence_id']) ? $_GET['sequence_id'] : ''); ?>" required></td>
                        </tr>
                    </table>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="modal_action">Update Sequence</button>
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
            
		function update_sequence(id,sequence_id)
		{
			$('#nameid').val(id);			
			$('#edit_sequence_id').val(sequence_id);
			$('#modalEdit').modal('show');
		}


		function addSequence() 
		{										
			$('#nameid').val('');
			$('#sequence_id').val('');
		}

        $('.btnToggleAction').click(function() {

            let _action = $(this).text();
            let _sequenceId = $(this).data('id');
            let _url = "<?php echo route('maintenance.sequence.getAction'); ?>";
            let _that = $(this);

            console.log(_action);

            $.ajax({

                type: "POST",
                data: {"_token": "<?php echo e(csrf_token()); ?>", id : _sequenceId, action: _action},
                url: _url,
                
                success: function(data){
                    if(data == 'Open'){
                        console.log('change to Open');
                        _that.text('Open');
                        $('#seq_stat'+_sequenceId).text('Close');
                    } else {
                        _that.text('Close');
                        $('#seq_stat'+_sequenceId).text('Open');
                        console.log('change to Close');
                    }

                }

            });


            });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PERSONAL\SC\PMC PROJECT\omws\resources\views/pages/sequence/index.blade.php ENDPATH**/ ?>