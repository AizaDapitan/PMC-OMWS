

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
    <style type="text/css">
        table td {
            padding-bottom: 10px;
        }
    </style>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">

        <div class="col-md-12">

            <h3 class="page-title"> Item Inventory </h3>

            <ul class="page-breadcrumb breadcrumb">
                <li> 
                    <a class="btn blue" data-toggle="modal" data-backdrop="static" href="#modalItemAdd" style="color:white;">Add New</a>
                </li>
            </ul>

            <div class="portlet box blue">

                <div class="portlet-title">
                    <div class="caption">
                        <i class=" icon-list"></i>
                    </div>
                            
                </div>

                <div class="portlet-body">

                    <div class="table-scrollable">
                        
                        <table class="table table-hover">

                            <thead>
                                <form method="get" action="<?php echo e(route('items.index')); ?>">
                                <td><label><b style="color: red;">Search : </b></label></td>
                                <td><input type="text" name="searchtxt" class="form-control col-md-4 input inline"  placeholder="Search..."></td>          
                                <td><input value="GO!" type="submit" class="btn yellow"></td>
                                </form>
                                <tr>                                    
                                    <th>Code</th>
                                    <th>Name</th>                                   
                                    <th>UOM</th>
                                    <th>Category</th>                                   
                                    <th>Unit Cost</th>
                                    <th>Action</th>                    
                                </tr>
                            </thead>

                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e($item->code); ?></td>
                                        <td><?php echo e($item->name); ?></td>
                                        <td><?php echo e($item->uom); ?></td>
                                        <td><?php echo e($item->category); ?></td>
                                        <td><?php echo e($item->unit_cost); ?></td>
                                        <td><a class="edit_item" data-toggle="modal" data-backdrop="static" href="#modalItemEdit" 
                                            data-href="<?php echo e(route('items.update', $item->id)); ?>" data-code="<?php echo e($item->code); ?>"
                                            data-name="<?php echo e($item->name); ?>" data-uom="<?php echo e($item->uom); ?>" 
                                            data-category="<?php echo e($item->category); ?>" data-ucost="<?php echo e($item->unit_cost); ?>"> <i class='fa fa-pencil'></i> </a></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="6" style="text-align: center;"> No Item Found </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>

                        </table>

                    </div>

                </div>
                
                <div class="col-md-6" style="margin-top: 10px; padding-top: 10px;">
                    Items <?php echo e($items->firstItem()); ?> - <?php echo e($items->lastItem()); ?>                        
                </div> 

                <div class="col-md-6 text-right">
                    <?php echo e($items->withQueryString()->links()); ?>                        
                </div>   

             </div>

        </div>

    </div>

    <div class="modal fade" id="modalItemAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" action="<?php echo e(route('items.store')); ?>">
                <?php echo csrf_field(); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modal_title">Add New Item</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            
                <div class="modal-body">

                    <table width="100%">
                        <tr><td>Code</td><td><input type="text" class="form-control" id="code" name="code" required></td></tr>
                        <tr><td>Name</td><td><input type="text" class="form-control" id="name" name="name" required></td></tr>
                        <tr><td>UoM</td><td><input type="text" class="form-control" id="uom" name="uom" required></td></tr>
                        <tr><td>Category</td><td>
                            <select class="form-control select2me" name="category" required id="category" data-placeholder="Select...">
                                <option></option>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($category->name); ?>"><?php echo e($category->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </td></tr>
                        <tr><td>Unit Cost</td><td><input type="number" class="form-control" name="unit_cost" required></td></tr>
                    </table>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="modal_action">Save Item</button>
                </div>
            </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="modalItemEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" action="" id="form_item_edit">
                <?php echo csrf_field(); ?>
                <?php echo method_field('patch'); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modal_title">Edit Item</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            
                <div class="modal-body">

                    <table width="100%">
                        <tr><td>Code</td><td><input type="text" class="form-control" id="edit_code" name="code" required></td></tr>
                        <tr><td>Name</td><td><input type="text" class="form-control" id="edit_name" name="name" required></td></tr>
                        <tr><td>UoM</td><td><input type="text" class="form-control" id="edit_uom" name="uom" required></td></tr>
                        <tr><td>Category</td><td>
                            <select class="form-control select2me" name="category" required id="edit_category" data-placeholder="Select...">
                                <option></option>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($category->name); ?>"><?php echo e($category->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </td></tr>
                        <tr><td>Unit Cost</td><td><input type="number" class="form-control" name="unit_cost"
                            id="edit_unit_cost" required></td></tr>
                    </table>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="modal_action">Update Item</button>
                </div>

            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageJS'); ?>
    
    <script src="<?php echo e(env('APP_URL')); ?>/themes/metronic/assets/global/plugins/jquery-1.11.0.min.js" type="text/javascript"></script>
    <script src="<?php echo e(env('APP_URL')); ?>/themes/metronic/assets/global/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
    <script src="<?php echo e(env('APP_URL')); ?>/themes/metronic/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo e(env('APP_URL')); ?>/themes/metronic/assets/global/plugins/select2/select2.min.js" type="text/javascript" ></script>
    <script src="<?php echo e(env('APP_URL')); ?>/themes/metronic/assets/global/scripts/metronic.js" type="text/javascript"></script>
    <script src="<?php echo e(env('APP_URL')); ?>/themes/metronic/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
    <script src="<?php echo e(env('APP_URL')); ?>/themes/metronic/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>

    <script type="text/javascript">
        
        $(document).ready(function() {

            $('.edit_item').click(function() {

                let code = $(this).data('code');
                let route = $(this).data('href');
                let name = $(this).data('name');
                let category = $(this).data('category');
                let unit_cost = $(this).data('ucost');
                let uom = $(this).data('uom');

                $('#edit_code').val(code);
                $('#edit_name').val(name);
                $('#edit_category').val(category);
                $('#edit_uom').val(uom);
                $('#edit_unit_cost').val(unit_cost);

                $('#form_item_edit').attr('action',route);

            });          

        });

    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\omws\resources\views/pages/items/index.blade.php ENDPATH**/ ?>