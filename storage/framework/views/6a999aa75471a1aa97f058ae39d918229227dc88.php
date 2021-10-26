

<?php $__env->startSection('pageCSS'); ?>

<link href="google.css" rel="stylesheet" type="text/css" />
<link href="<?php echo e(env('APP_URL')); ?>/themes/metronic/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo e(env('APP_URL')); ?>/themes/metronic/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo e(env('APP_URL')); ?>/themes/metronic/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

<link href="<?php echo e(env('APP_URL')); ?>/themes/metronic/assets/global/css/components.css" rel="stylesheet" type="text/css" />
<link href="<?php echo e(env('APP_URL')); ?>/themes/metronic/assets/global/css/plugins.css" rel="stylesheet" type="text/css" />
<link href="<?php echo e(env('APP_URL')); ?>/themes/metronic/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css" />
<link id="style_color" href="<?php echo e(env('APP_URL')); ?>/themes/metronic/assets/admin/layout/css/themes/default.css" rel="stylesheet" type="text/css" />
<link href="<?php echo e(env('APP_URL')); ?>/themes/metronic/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css" />

<style type="text/css">
    table td {
        padding-bottom: 10px;
    }

    ul {
        padding: 0;
    }

    ul li {
        list-style: none;
    }
</style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">

    <div class="col-md-12">

        <h3 class="page-title"> Contractor Maintenance </h3>

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
                    <i class=" icon-list"></i> List of Contractors
                </div>

            </div>

            <div class="portlet-body">

                <form method="get" action="<?php echo e(route('maintenance.contractors.index')); ?>">

                    <table width="100%">
                        <tr>
                            <td>Search:<input type="hidden" name="act" value="search"></td>
                            <td><input type="text" name="searchtxt" id="searchtxt" class="form-control input " placeholder="Enter Name or Code.."></td>
                            <td align="left"><input type="submit" class="btn purple" value="Search"> </td>
                        </tr>
                    </table>

                </form>

                <div class="table-scrollable">

                    <table class="table table-hover">

                        <thead>
                            <tr>
                                <th width="5%" style="text-align: center;">Edit</th>
                                <th width="20%">Code</th>
                                <th width="20%">Name</th>
                                <th width="30%">Active Locations</th>
                                <th width="35%">Assign New</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $contractors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $contractor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td style="text-align: center;">
                                    <?php if($edit): ?>
                                    <a data-toggle="modal" class="edit_item" data-backdrop="static" href="#modalEdit" data-href="<?php echo e(route('maintenance.contractors.update', $contractor->id)); ?>" data-fname="<?php echo e($contractor->fname); ?>" data-lname="<?php echo e($contractor->lname); ?>" data-mname="<?php echo e($contractor->mname); ?>" data-code="<?php echo e($contractor->code); ?>">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <?php else: ?>
                                    <button disabled data-toggle="modal" class="edit_item" data-backdrop="static" href="#modalEdit" data-href="<?php echo e(route('maintenance.contractors.update', $contractor->id)); ?>" data-fname="<?php echo e($contractor->fname); ?>" data-lname="<?php echo e($contractor->lname); ?>" data-mname="<?php echo e($contractor->mname); ?>" data-code="<?php echo e($contractor->code); ?>">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                    <?php endif; ?>
                                </td>
                                <td> <?php echo e($contractor->code); ?> </td>
                                <td> <?php echo e($contractor->lname); ?>, <?php echo e($contractor->fname); ?> <?php echo e($contractor->mname); ?> </td>
                                <td>
                                    <ul id="attach-locations<?php echo e($contractor->id); ?>">
                                        <?php $__currentLoopData = $contractor->location; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cont_loc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if( $cont_loc->pivot->isActive ): ?>
                                        <li>
                                            <?php if($delete): ?>
                                            <a href="#" class="remove-contractor-location" data-locid="<?php echo e($cont_loc->id); ?>" data-id="<?php echo e($contractor->id); ?>" style="color: red;">x</a>

                                            <?php endif; ?>
                                            <?php echo e($cont_loc->name); ?>

                                        </li>
                                        <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </td>
                                <td>
                                    <select id="location-<?php echo e($contractor->id); ?>" style="width: 200px;">
                                        <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($location->id); ?>"><?php echo e($location->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($edit): ?>
                                    <button type="button" class="btn blue btn-xs add_location" data-id="<?php echo e($contractor->id); ?>">Go</button>
                                    <?php else: ?>
                                    <button disabled type="button" class="btn blue btn-xs add_location" data-id="<?php echo e($contractor->id); ?>">Go</button>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td class="text-center" colspan="5"> No Contractors Found </td>
                            </tr>
                            <?php endif; ?>
                        </tbody>

                    </table>

                </div>

            </div>

            <div class="col-md-6" style="margin-top: 10px; padding-top: 10px;">
                Items <?php echo e($contractors->firstItem()); ?> - <?php echo e($contractors->lastItem()); ?>

            </div>

            <div class="col-md-6 text-right">
                <?php echo e($contractors->withQueryString()->links()); ?>

            </div>

        </div>

    </div>

</div>

<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" action="<?php echo e(route('maintenance.contractors.store')); ?>">
            <?php echo csrf_field(); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modal_title">Add New Contractor</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <table width="100%">

                        <tr>
                            <td width="150"><label>Code:</label></td>
                            <td><input type="text" name="code" class="form-control col-md-4 input inline" placeholder="Code" required></td>
                        </tr>
                        <tr>
                            <td width="150"><label>Last Name:</label></td>
                            <td><input type="text" name="lname" class="form-control col-md-4 input inline" placeholder="Last Name" required></td>
                        </tr>
                        <tr>
                            <td width="150"><label>First Name:</label></td>
                            <td><input type="text" name="fname" class="form-control col-md-4 input inline" placeholder="First Name" required></td>
                        </tr>
                        <tr>
                            <td width="150"><label>Middle Name:</label></td>
                            <td><input type="text" name="mname" class="form-control col-md-4 input inline" placeholder="Middle Name" required></td>
                        </tr>

                    </table>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="modal_action">Save Contractor</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" id="edit_form">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PATCH'); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modal_title">Edit Contractor</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <table width="100%">

                        <tr>
                            <td width="150"><label>Code:</label></td>
                            <td><input type="text" id="edit_code" name="code" class="form-control col-md-4 input inline" placeholder="Code" required></td>
                        </tr>
                        <tr>
                            <td width="150"><label>Last Name:</label></td>
                            <td><input type="text" id="edit_lname" name="lname" class="form-control col-md-4 input inline" placeholder="Last Name" required></td>
                        </tr>
                        <tr>
                            <td width="150"><label>First Name:</label></td>
                            <td><input type="text" id="edit_fname" name="fname" class="form-control col-md-4 input inline" placeholder="First Name" required></td>
                        </tr>
                        <tr>
                            <td width="150"><label>Middle Name:</label></td>
                            <td><input type="text" id="edit_mname" name="mname" class="form-control col-md-4 input inline" placeholder="Middle Name" required></td>
                        </tr>

                    </table>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="modal_action">Update Contractor</button>
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

        $('.edit_item').click(function() {

            let route = $(this).data('href');
            let fname = $(this).data('fname');
            let mname = $(this).data('mname');
            let lname = $(this).data('lname');
            let code = $(this).data('code');

            $('#edit_form').attr('action', route);
            $('#edit_fname').val(fname);
            $('#edit_mname').val(mname);
            $('#edit_lname').val(lname);
            $('#edit_code').val(code);

        });


        $(document).on('click', '.add_location', function(e) {
            e.preventDefault();
            let contractor_id = $(this).data('id');
            let loc_id = $("#location-" + contractor_id).val();
            let location_name = $('#location-' + contractor_id + " option:selected").text().trim();
            let contractor_index = "<?php echo route('maintenance.contractors.index'); ?>";

            let url = contractor_index + "/" + contractor_id + "/location/" + loc_id + "/insert";
            let delete_url = contractor_index + "/" + contractor_id + "/location/" + loc_id + "/remove";
            let exist = false;

            $('#attach-locations' + contractor_id + " li").each(function(i, val) {
                if (location_name == $(this).find("span").text().trim()) {
                    alert("cost code already added");
                    exist = true;
                    return false;
                }
            });

            if (exist) {
                return false;
            }

            console.log(url);
            $.ajax({

                type: "GET",

                data: {
                    "_token": "<?php echo e(csrf_token()); ?>"
                },

                url: url,

                success: function(data) {

                    if (data == 'yes') {
                        $('#attach-locations' + contractor_id).append('<li><a href="' + delete_url + '" class="remove-contractor-location" data-locid="' + loc_id + '" data-id="' + contractor_id + '" style="color:red;">x</a> <span> ' + location_name + '</span> </li>');
                    }

                }

            });

        });


        $(document).on('click', '.remove-contractor-location', function(e) {

            e.preventDefault();

            let _that = this;
            let location_id = $(this).data('locid');
            let contractor_id = $(this).data('id');

            let location_index = "<?php echo route('maintenance.contractors.index'); ?>";

            let delete_url = location_index + "/" + contractor_id + "/location/" + location_id + "/remove";

            $.ajax({

                type: "GET",

                data: {
                    "_token": "<?php echo e(csrf_token()); ?>"
                },

                url: delete_url,

                success: function(data) {

                    if (data == 'yes') {
                        $(_that).parent().remove();
                    }

                }

            });

        });


    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PERSONAL\SC\PMC PROJECT\omws\resources\views/pages/contractors/index.blade.php ENDPATH**/ ?>