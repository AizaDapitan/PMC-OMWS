

<?php $__env->startSection('pageCSS'); ?>

    <link href="google.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(env('APP_URL')); ?>/themes/metronic/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(env('APP_URL')); ?>/themes/metronic/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(env('APP_URL')); ?>/themes/metronic/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo e(env('APP_URL')); ?>/themes/metronic/assets/global/plugins/select2/select2.css"/>
    <link href="<?php echo e(env('APP_URL')); ?>/themes/metronic/assets/global/css/components.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(env('APP_URL')); ?>/themes/metronic/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(env('APP_URL')); ?>/themes/metronic/assets/global/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(env('APP_URL')); ?>/themes/metronic/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
    <link id="style_color" href="<?php echo e(env('APP_URL')); ?>/themes/metronic/assets/admin/layout/css/themes/default.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(env('APP_URL')); ?>/themes/metronic/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
  
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">

        <div class="col-md-12">

            <h3 class="page-title"> Location History Report </h3>

            <form action="<?php echo e(route('rpt.location-history')); ?>" method="get">
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
                                <?php $__currentLoopData = $locs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $loc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($loc->id); ?>" <?php if($loc->id == request()->location): ?> selected <?php endif; ?>><?php echo e($loc->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>   
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
                        <td><input type="submit" class="btn blue form-control" value="Generate" style="width:200px;"></td>
                    </tr>
                </table>
            </form>

            <div class="clearfix"></div>

            <div class="row">

                <h1> Result </h1>

                <div class="table-scrollable">
                            
                    <table class="table table-hover">

                        <thead>
                            <tr>                                    
                                <th>Location</th>
                                <th>Contractor Code</th>                                   
                                <th>Name</th>
                                <th>Assigned Date</th>                                   
                                <th>Assigned By</th>
                                <th>Removed Date</th>   
                                <th>Removed By</th>                 
                            </tr>
                        </thead>

                        <tbody>

                            <?php $__empty_1 = true; $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <?php $__currentLoopData = $location->contractor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contractor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($location->name); ?></td>
                                        <td><?php echo e($contractor->code); ?></td>
                                        <td><?php echo e($contractor->lname); ?>, <?php echo e($contractor->fname); ?> <?php echo e($contractor->mname); ?></td>
                                        <td><?php echo e(\Carbon\Carbon::parse($contractor->pivot->addedDate)->toFormattedDateString()); ?></td>
                                        <td><?php echo e($contractor->pivot->addedBy); ?></td>
                                        <td><?php echo e($contractor->pivot->removedDate ? \Carbon\Carbon::parse($contractor->pivot->removedDate)->toFormattedDateString() :''); ?></td>
                                        <td><?php echo e($contractor->pivot->removedBy); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="7" class="text-center"> No Location Found </td>
                                </tr>
                            <?php endif; ?>
                            
                        </tbody>

                    </table>

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
    <script src="<?php echo e(env('APP_URL')); ?>/themes/metronic/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript" ></script>    
    <script src="<?php echo e(env('APP_URL')); ?>/themes/metronic/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
    <script src="<?php echo e(env('APP_URL')); ?>/themes/metronic/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>

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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webfocusprod/cms4.webfocusprod.wsiph2.com/pmc_p1/PMCP1-OMWS/PMC-OMWS/resources/views/pages/reports/location-history.blade.php ENDPATH**/ ?>