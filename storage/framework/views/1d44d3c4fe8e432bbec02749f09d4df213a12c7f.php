

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
</style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row">

    <div class="col-md-12">

        <h3 class="page-title"> User Access Rights </h3>

        <div class="portlet box blue">

            <div class="portlet-title">
                <div class="caption">
                    <i class=" icon-list"></i> User Access Rights
                </div>
            </div>



            <div class="portlet-body">

                <form id="form" action="<?php echo e(route('maintenance.useraccessrights.store')); ?>" method="POST">

                    <input type="hidden" name="users_permissions" id="users_permissions" value="">
                    <?php echo csrf_field(); ?>


                    <div class="actions">
                        <div class="form-group form-inline" style="display:inline;margin-right:10px">
                                <label class="control-label" style="margin-right:20px; margin-left:20px">User Name </label>

                            <select required name="userid" id="userid" class="form-control">
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($user['id']); ?>"><?php echo e($user['username']); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>

                        </div>
                        <?php if($create): ?>
                        <button type="submit" class="btn blue" id="saveUserPermission">
                            <i class="fa fa-save"></i>&nbsp; Save Changes
                        </button>
                        <?php else: ?>
                        <button disabled type="submit" class="btn blue" id="saveUserPermission">
                            <i class="fa fa-save"></i>&nbsp; Save Changes
                        </button>
                        <?php endif; ?>
                    </div>
                </form>
                <div class="table-scrollable">
                    <table class="table table-striped table-bordered table-advance table-hover">
                        <thead>
                            <tr>
                                <th>
                                    <i class="fa fa-briefcase"></i> Permission List
                                </th>
                                <th>
                                    <i class="fa fa-briefcase"></i> View
                                </th>
                                <th>
                                    <i class="fa fa-briefcase"></i> Create
                                </th>
                                <th>
                                    <i class="fa fa-briefcase"></i> Update
                                </th>
                                <th>
                                    <i class="fa fa-briefcase"></i> Delete/Cancel
                                </th>
                                <th>
                                    <i class="fa fa-briefcase"></i> Print
                                </th>
                                <th>
                                    <i class="fa fa-briefcase"></i> Upload
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td width="50%">
                                    <div class="caption custom-padding">
                                        <span class="caption-subject font-green bold uppercase"><?php echo e(strtoupper($module['description'])); ?></span>
                                    </div>
                                </td>
                                <td>
                                    <div class="md-checkbox custom-padding">
                                        <input type="checkbox" class="md-check" data-role="<?php echo e($module['id']); ?>_view" data-module="<?php echo e($module['id']); ?>_view" onclick="checkPermission(this.id)" id="<?php echo e($module['id']); ?>_view">
                                        <label for="<?php echo e($module['id']); ?>_view">
                                            <span></span>
                                            <span span class="check"></span>
                                            <span class="box"></span>
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="md-checkbox custom-padding">
                                        <input type="checkbox" class="md-check" data-role="<?php echo e($module['id']); ?>_create" data-module="<?php echo e($module['id']); ?>_create" onclick="checkPermission(this.id)" id="<?php echo e($module['id']); ?>_create">
                                        <label for="<?php echo e($module['id']); ?>_create">
                                            <span></span>
                                            <span span class="check"></span>
                                            <span class="box"></span>
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="md-checkbox custom-padding">
                                        <input type="checkbox" class="md-check" data-role="<?php echo e($module['id']); ?>_edit" data-module="<?php echo e($module['id']); ?>_edit" id="<?php echo e($module['id']); ?>_edit" onclick="checkPermission(this.id)">
                                        <label for="<?php echo e($module['id']); ?>_edit">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="md-checkbox custom-padding">
                                        <input type="checkbox" class="md-check" data-role="<?php echo e($module['id']); ?>_delete" data-module="<?php echo e($module['id']); ?>_delete" id="<?php echo e($module['id']); ?>_delete" onclick="checkPermission(this.id)">
                                        <label for="<?php echo e($module['id']); ?>_delete">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="md-checkbox custom-padding">
                                        <input type="checkbox" class="md-check" data-role="<?php echo e($module['id']); ?>_print" data-module="<?php echo e($module['id']); ?>_print" id="<?php echo e($module['id']); ?>_print" onclick="checkPermission(this.id)">
                                        <label for="<?php echo e($module['id']); ?>_print">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="md-checkbox custom-padding">
                                        <input type="checkbox" class="md-check" data-role="<?php echo e($module['id']); ?>_upload" data-module="<?php echo e($module['id']); ?>_upload" id="<?php echo e($module['id']); ?>_upload" onclick="checkPermission(this.id)">
                                        <label for="<?php echo e($module['id']); ?>_upload">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(strtoupper($permission['module_type']) == strtoupper($module['description']) ): ?>
                            <tr>
                                <td>
                                    <?php echo e(strtoupper($permission['description'])); ?>

                                </td>
                                <td>
                                    <div class="md-checkbox">
                                        <input type="checkbox" class="md-check" data-role="<?php echo e($permission['id']); ?>_<?php echo e($module['id']); ?>_view" data-module="<?php echo e($permission['id']); ?>_<?php echo e($module['id']); ?>_view" id="<?php echo e($permission['id']); ?>_<?php echo e($module['id']); ?>_view" onchange="storeID(this.id)">
                                        <label for="<?php echo e($permission['id']); ?>_<?php echo e($module['id']); ?>_view">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="md-checkbox">
                                        <input type="checkbox" class="md-check" data-role="<?php echo e($permission['id']); ?>_<?php echo e($module['id']); ?>_create" data-module="<?php echo e($permission['id']); ?>_<?php echo e($module['id']); ?>_create" id="<?php echo e($permission['id']); ?>_<?php echo e($module['id']); ?>_create" onchange="storeID(this.id)">
                                        <label for="<?php echo e($permission['id']); ?>_<?php echo e($module['id']); ?>_create">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="md-checkbox">
                                        <input type="checkbox" class="md-check" data-role="<?php echo e($permission['id']); ?>_<?php echo e($module['id']); ?>_edit" data-module="<?php echo e($permission['id']); ?>_<?php echo e($module['id']); ?>_edit" id="<?php echo e($permission['id']); ?>_<?php echo e($module['id']); ?>_edit" onchange="storeID(this.id)">
                                        <label for="<?php echo e($permission['id']); ?>_<?php echo e($module['id']); ?>_edit">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="md-checkbox">
                                        <input type="checkbox" class="md-check" data-role="<?php echo e($permission['id']); ?>_<?php echo e($module['id']); ?>_delete" data-module="<?php echo e($permission['id']); ?>_<?php echo e($module['id']); ?>_delete" id="<?php echo e($permission['id']); ?>_<?php echo e($module['id']); ?>_delete" onchange="storeID(this.id)">
                                        <label for="<?php echo e($permission['id']); ?>_<?php echo e($module['id']); ?>_delete">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="md-checkbox">
                                        <input type="checkbox" class="md-check" data-role="<?php echo e($permission['id']); ?>_<?php echo e($module['id']); ?>_print" data-module="<?php echo e($permission['id']); ?>_<?php echo e($module['id']); ?>_print" id="<?php echo e($permission['id']); ?>_<?php echo e($module['id']); ?>_print" onchange="storeID(this.id)">
                                        <label for="<?php echo e($permission['id']); ?>_<?php echo e($module['id']); ?>_print">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="md-checkbox">
                                        <input type="checkbox" class="md-check" data-role="<?php echo e($permission['id']); ?>_<?php echo e($module['id']); ?>_upload" data-module="<?php echo e($permission['id']); ?>_<?php echo e($module['id']); ?>_upload" id="<?php echo e($permission['id']); ?>_<?php echo e($module['id']); ?>_upload" onchange="storeID(this.id)">
                                        <label for="<?php echo e($permission['id']); ?>_<?php echo e($module['id']); ?>_upload">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                        </label>
                                    </div>
                                </td>
                            </tr>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
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
    $(document).ready(function() {
        getUsersPermissions($("#userid").val());
        $("#userid").on('change', function() {
            getUsersPermissions($("#userid").val());

        })
    });

    function getUsersPermissions(userid) {
        document.querySelectorAll('input[type=checkbox]').forEach(el => el.checked = false)
        $("#users_permissions").val("");
        $.ajax({
            url: '<?php echo route('maintenance.useraccessrights.store'); ?>',
            type: 'get',

            data: {
                userid: userid
            },
            success: function(data) {
                $.each(data, function(index, element) {
                    var chkid = "";
                    chkid = (element.permission_id + "_" + element.module_id + "_" + element.action)
                    if (chkid != "") {
                        document.getElementById(element.module_id + "_" + element.action).checked = true;
                        document.getElementById(chkid).checked = true;

                        storeID(chkid);
                    }
                });
            }
        });
    }

    function checkPermission(id) {
        var checkboxes = document.getElementsByTagName("input");
        const cb = document.getElementById(id);
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].type == "checkbox") {
                if (checkboxes[i].id.includes(id)) {
                    document.getElementById(checkboxes[i].id).checked = cb.checked;
                    storeID(checkboxes[i].id);
                }
            }
        }
    }

    function storeID(id) {
        var users_permissions = $("#users_permissions").val();

        if (document.getElementById(id).checked) {
            if (users_permissions != "") {

                users_permissions = users_permissions + ',' + id;
            } else {

                users_permissions = id;
            }
        } else {
            if ((id.match(/_/g) || []).length == 2) {
                if (users_permissions.includes("," + id)) {
                    users_permissions = users_permissions.replace("," + id, "");
                    console.log(users_permissions);
                } else if (users_permissions.includes(id + ",")) {
                    users_permissions = users_permissions.replace(id + ",", "");

                    console.log(users_permissions);
                } else {
                    users_permissions = users_permissions.replace(id, "");
                }
            }
        }
        $("#users_permissions").val(users_permissions);
    }
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\omws\resources\views/pages/useraccessrights.blade.php ENDPATH**/ ?>