

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
        
    </style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">

        <div class="col-md-12">

            <h3 class="page-title"> Sequence Control </h3>
            
            <div class="portlet box blue">

                <div class="portlet-title">
                    <div class="caption">
                        <i class=" icon-list"></i> List of Sequences
                    </div>
                    <div class="actions">
                        <?php if($create): ?>
                            <a class="btn green btn-sm" data-toggle="modal" href="#fabricatedseqnum"> Add Fabricated Number <i class="fa fa-plus"></i> </a>
                        <?php else: ?>
                            <button disabled class="btn green btn-sm" data-toggle="modal" href="#fabricatedseqnum"> Add Fabricated Number <i class="fa fa-plus"></i> </button>
                        <?php endif; ?>
                    </div>
                            
                </div>

                <div class="portlet-body">

                    <div class="table-scrollable">
                        
                        <table class="table table-hover">

                            <thead>
                                <tr>                                    
                                    <th>Sequence Number</th>
                                    <th>Date Started</th>
                                    <th>Status</th>
                                    <th align="center">Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $sequences; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sequence): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e($sequence->sequence_id); ?></td>
                                         <td><?php echo e(\Carbon\Carbon::parse($sequence->date_created)->format('Y-m-d H:s A')); ?></td>
                                        <td><span id="seq_stat<?php echo e($sequence->id); ?>" class="label <?php echo e($sequence->is_open ? 'label-success':'label-default'); ?> "><?php echo e($sequence->is_open ? 'Open':'Close'); ?></span></td>
                                        <td align="center"> <?php if($sequence->is_fabricated == 1): ?> <span class="badge badge-primary">FABRICATED</span> <br> added by: <?php echo e($sequence->created_by); ?> <?php endif; ?></td>
                                        <td> <?php if(\Auth::user()->can_open_sequence): ?> <button class="btn btn-primary btnToggleAction" data-id="<?php echo e($sequence->id); ?>"><?php echo e($sequence->is_open ? 'Close':'Open'); ?></button> <?php endif; ?> 
                                            <?php if($sequence->is_fabricated == 1): ?> 
                                                <?php if($edit): ?>
                                                    <button class="btn btn-warning editfabricatednum" href="#fabricatedseqnumedit" data-id="<?php echo e($sequence->id); ?>" data-seqnum="<?php echo e($sequence->sequence_id); ?>"> EDIT </button> 
                                                <?php else: ?>
                                                    <button disabled class="btn btn-warning editfabricatednum" href="#fabricatedseqnumedit" data-id="<?php echo e($sequence->id); ?>" data-seqnum="<?php echo e($sequence->sequence_id); ?>"> EDIT </button> 
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="4" class="text-center"> No Sequence Found </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>

                        </table>

                    </div>


                </div>
                
                <div class="col-md-6" style="margin-top: 10px; padding-top: 10px;">
                                     
                </div> 

                <div class="col-md-6 text-right">

                </div>   

             </div>
             <div class="col-md-6" style="margin-top: 10px; padding-top: 10px;">
                Items <?php echo e($sequences->firstItem()); ?> - <?php echo e($sequences->lastItem()); ?>

            </div>

            <div class="col-md-6 text-right">
                <?php echo e($sequences->withQueryString()->links()); ?>

            </div>
            
        </div>

        <div class="modal fade" id="fabricatedseqnum" tabindex="-1" role="basic" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #0480be; ">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title" style="color: #5C2018"><i class="icon-list"></i> Fabricated Number</h4>
                    </div>
                    <div class="modal-body">
                        <form action="sequence/fabricated-store" method="POST">
                            <input type="hidden" class="form-control" name="created_by" value="<?php echo e(Auth::user()->username); ?>" readonly>
                            <input type="hidden" class="form-control" name="is_fabricated" value="1" readonly>
                            <input type="hidden" class="form-control" name="is_open" value="1" readonly>
                            <?php echo csrf_field(); ?>
                            <div class="form-group" style="align-self: center;">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label class="control-label" style="font-size: 13px" >Fabricated Number: </label>
                                        <input type="text" class="form-control" placeholder="Enter Fabricated Number" id="fabnumber" name="sequence_id" value="<?php echo e(isset($_GET['sequence_id']) ? $_GET['sequence_id'] : ''); ?>" ><span></span>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn green">Save </button>
                                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="fabricatedseqnumedit" tabindex="-1" role="basic" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #0480be; ">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title" style="color: #5C2018"><i class="icon-list"></i> Edit Fabricated Number</h4>
                    </div>
                    <div class="modal-body">
                        <form action="/sequence/fabricated-update/<?php echo e($sequence->id); ?>" method="GET">
                            <input type="hidden" class="form-control" name="updated_by" value="<?php echo e(Auth::user()->username); ?>" readonly> 
                            <input type="hidden" class="form-control" id="eid" name="id" readonly>                            
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PATCH'); ?>
                            <div class="form-group" style="align-self: center;">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label class="control-label" style="font-size: 13px" >Fabricated Number: </label>
                                        <input type="text" class="form-control" placeholder="Enter Fabricated Number" id="efabnumber" name="sequence_id" value="<?php echo e(isset($_GET['sequence_id']) ? $_GET['sequence_id'] : ''); ?>" ><span></span>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn green">Save </button>
                                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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

    <script type="text/javascript">
    $(document).on('click','.editfabricatednum',function() {
        $('#fabricatedseqnumedit').modal('show');
        $('#eid').val($(this).data('id'));
        $('#efabnumber').val($(this).data('seqnum'));       
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PERSONAL\SC\PMC PROJECT\omws\resources\views/pages/sequence/index.blade.php ENDPATH**/ ?>