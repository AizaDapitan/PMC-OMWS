<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <link href="google.css" rel="stylesheet" type="text/css" />

    <?php echo $__env->yieldContent('pageCSS'); ?>

    <style type="text/css">
        .popover-content,
        .popover-title {
            color: black;
        }

        .page-header.navbar {
            background-color: #1f1f1f;
        }

        #dashboard_div {
            padding-left: 340px;
        }

        #dashboard_div table {
            border-collapse: separate;
        }

        #dashboard_div td,
        th {
            margin: 0;
            white-space: nowrap;
        }

        #dashboard_div .headcol {
            position: absolute;
            width: 28em;
            left: 28px;
            top: auto;
            border-right: 0px none;
            background-color: white;
        }

        #dashboard_div .headcol:before {
            content: '';
        }

        #dashboard_div .long {
            background: yellow;
            letter-spacing: 1em;
        }
             /* The Modal (background) */
#myModal1 {
  display: none ; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
#content {
  background-color: #fefefe;
  margin: 15% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 45%; /* Could be more or less, depending on screen size */
}

/* The Close Button */
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}
    </style>

</head>

<body>

    <div class="page-header-fixed page-quick-sidebar-over-content">

        <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="page-container">

            <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="page-content-wrapper">

                <div class="page-content">
                <div id="myModal1" class="modal">
                        <!-- Modal content -->
                        <div class="modal-content" id="content">
                            <span class="close" id="close">&times;</span>
                            <p style="font-size: 18px; font-weight:bold;">In exactly 1 hour the system will undergo maitenance! Please save your work!</p>
                        </div>
                    </div>
                    <div>
                        <?php if($reason): ?>
                        <div class="alert alert-danger alert-dismissable">
                            <!-- <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button> -->
                            <span class="fa fa-exclamation"></span>
                            <label aria-labelledby="notifications" id="notifications"><?php echo e($reason); ?> </label>
                            <label aria-labelledby="countdown" id="countdown" style="float:right; font-weight:bold">Time Remaining : </label>
                            <label aria-labelledby="datetime" id="datetime" style="display:block">Shutdown Date : <?php echo e($scheduledate); ?> <?php echo e($scheduletime); ?> </label>
                        </div>
                        <?php else: ?>
                        <label aria-labelledby="countdown" id="countdown" style="display:none; font-weight:bold">Time Remaining : </label>
                        <?php endif; ?>
                    </div>
                    <?php if(session()->has('error_message')): ?>
                    <div class="col-md-12">

                        <div class="alert alert-danger alert-dismissable danger">
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
                        <div class="alert alert-danger ">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                            <strong> Oops! </strong> <?php echo e($errors->first()); ?>

                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if(session('down')): ?>
                        <div id="errdiv" class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                            <span class="fa fa-exclamation"></span>                
                            <?php echo session('down'); ?>

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

            if ($('.danger').length > 0) {
                $('.danger').delay(3000).slideUp('slow');
            }

            if ($('.alert-success').length > 0) {
                $('.alert-success').delay(3000).slideUp('slow');
            }

            (function() {

                setInterval(function() {

                    var today = new Date();

                    console.log(today.getMinutes());

                    //                    if( today.getHours() == 9 && today.getMinutes() > 1 && today.getMinutes() < 20 ) {

                    $.ajax({

                        type: "GET",
                        url: "<?php echo route('maintenance.sequence.close-open'); ?>",

                        success: function(data) {

                            //location.reload();

                        }

                    });

                    //                    }

                }, 30000);

            })();

        });
        var modal = document.getElementById("myModal1");
	var tday = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
	var tmonth = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
	var shown = 0;
	var span = document.getElementById("close");
	// When the user clicks on <span> (x), close the modal
	span.onclick = function() {
		modal.style.display = "none";
	}

	function GetClock() {
		var d = new Date();
		var nday = d.getDay(),
		nmonth = d.getMonth(),
		ndate = d.getDate(),
		nyear = d.getFullYear();
		var nhour = d.getHours(),
		nmin = d.getMinutes(),
		nsec = d.getSeconds(),
		ap;
		var ohour = nhour + 1;
        if (nhour <= 9) nhour = "0" + nhour;
		if (nhour == 0) {
		ap = " AM";
		nhour = 12;
		} else if (nhour < 12) {
		ap = " AM";
		} else if (nhour == 12) {
		ap = " PM";
		} else if (nhour > 12) {
		ap = " PM";
		nhour -= 12;
		}

		if (nmin <= 9) nmin = "0" + nmin;
		if (nsec <= 9) nsec = "0" + nsec;

		var clocktext = "" + tday[nday] + ", " + tmonth[nmonth] + " " + ndate + ", " + nyear + " " + nhour + ":" + nmin + ":" + nsec + ap + "";
		// document.getElementById('clockbox').innerHTML = clocktext;
		var schedule = <?php echo json_encode($scheduledate); ?> + ' ' + <?php echo json_encode($scheduletime); ?>;
		// dt = dt.replace(':00.0000000','');
		var mnth = nmonth + 1;
		var dte = ndate;
		if (mnth <= 9) mnth = "0" + mnth;
		if (dte <= 9) dte = "0" + dte;
		var curDateless1hour = nyear + '-' + mnth + '-' + dte + ' ' + ohour + ":" + nmin;
		var curDate = nyear + '-' + mnth + '-' + dte + ' ' + (ohour - 1) + ":" + nmin;
		// console.log(dt);
		// console.log(dd2);
		if (schedule == curDateless1hour && shown == 0) {
		shown = 1;
		//    alert("In exactly 1 hour the system will undergo maitenance! Please save your work.");

		modal.style.display = "block";
		return false;
		}
		if (schedule == curDate) {
		$.ajax({
			url: '<?php echo route('maintenance.application.systemDown'); ?>',
			type: 'GET',
			async: false,
			success: function(response) {}
		});
		}
        // console.log(schedule);
        // console.log(curDate);
		if (schedule > curDate) {
		var TimeDiff = timeDiffCalc(new Date(schedule), new Date());
		} else {
		TimeDiff = "Maintenance is in progress!";
		}

		document.getElementById('countdown').innerHTML = "Time Remaining : " + TimeDiff;
	}
	GetClock();
	setInterval(GetClock, 1000);

	function timeDiffCalc(dateFuture, dateNow) {
		// console.log(dateNow);
		let diffInMilliSeconds = Math.abs(dateFuture - dateNow) / 1000;
		// calculate days
		const days = Math.floor(diffInMilliSeconds / 86400);
		diffInMilliSeconds -= days * 86400;

		// calculate hours
		const hours = Math.floor(diffInMilliSeconds / 3600) % 24;
		diffInMilliSeconds -= hours * 3600;

		// calculate minutes
		const minutes = Math.floor(diffInMilliSeconds / 60) % 60;
		diffInMilliSeconds -= minutes * 60;

		// calculate minutes
		const seconds = Math.floor(diffInMilliSeconds);
		diffInMilliSeconds -= seconds;
		// if(seconds > 0){

		let difference = '';
		if (days > 0) {
		difference += (days === 1) ? `${days} day, ` : `${days} days, `;
		}

		difference += (hours === 0 || hours === 1) ? `${hours} hour, ` : `${hours} hours, `;

		difference += (minutes === 0 || hours === 1) ? `${minutes} minute, ` : `${minutes} minutes, `;

		difference += (seconds === 0 || seconds === 1) ? `${seconds} seconds` : `${seconds} seconds`;

		return difference;
		// }
	}
    </script>

</body>

</html><?php /**PATH D:\PERSONAL\SC\PMC PROJECT\omws\resources\views/layouts/app.blade.php ENDPATH**/ ?>