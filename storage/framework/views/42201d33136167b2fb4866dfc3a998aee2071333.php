<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <link href="google.css" rel="stylesheet" type="text/css"/>
    <?php echo $__env->yieldContent('pageCSS'); ?>

    <style type="text/css">

        .popover-content,
        .popover-title { color: black; }

        .page-header.navbar { background-color: #1f1f1f; }

        #dashboard_div {padding-left:340px; }
        #dashboard_div table { border-collapse:separate; }
        #dashboard_div td, th {
            margin:0;
            white-space:nowrap;
        }

        #dashboard_div   .headcol {
            position:absolute;
            width:28em;
            left:28px;
            top:auto;
            border-right: 0px none;
            background-color: white;
        }

        #dashboard_div    .headcol:before {content:'';}
        #dashboard_div    .long { background:yellow; letter-spacing:1em; }

    </style>

</head>
<body>

    <div class="page-header-fixed page-quick-sidebar-over-content">
        
        <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="page-container">

            <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="page-content-wrapper">

                <div class="page-content">

                    <?php if(session()->has('error_message')): ?>
                        <div class="col-md-12">

                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                <strong>Oops!</strong> <?php echo e(session()->get('error_message')); ?>

                            </div>

                        </div>
                    <?php endif; ?>

                    <?php if(session()->has('success')): ?>
                        <div class="col-md-12">

                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                <strong>Success!</strong> <?php echo e(session()->get('success')); ?>

                            </div>

                        </div>
                    <?php endif; ?>

                    <?php if($errors->any()): ?>
                        <div class="col-md-12">
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                <strong> Oops! </strong> <?php echo e($errors->first()); ?>

                            </div>
                        </div>
                    <?php endif; ?>

                    <?php echo $__env->yieldContent('content'); ?>

                </div>


            </div>

        </div>

    </div>
   
    <?php echo $__env->yieldContent('pageJS'); ?>

    <script>

        jQuery(document).ready(function() {    
            
            Metronic.init(); // init metronic core components
            Layout.init(); // init current layout
           
            $('[data-toggle="popover"]').popover(); 
        
            if( $('.alert-danger').length>0 ) {
                $('.alert-danger').delay(3000).slideUp('slow');
            }

            if( $('.alert-success').length>0 ) {
                $('.alert-success').delay(3000).slideUp('slow');
            }

            (function(){

                setInterval(function(){

                    var today = new Date();

                    console.log(today.getMinutes());

//                    if( today.getHours() == 9 && today.getMinutes() > 1 && today.getMinutes() < 20 ) {
                        
                        $.ajax({

                            type: "GET",
                            url: "<?php echo route('sequence.close-open'); ?>",
                            
                            success: function(data){

                                //location.reload();

                            }

                        });

//                    }

                }, 30000);

            })();

        });

    </script>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\omws\resources\views/layouts/app.blade.php ENDPATH**/ ?>