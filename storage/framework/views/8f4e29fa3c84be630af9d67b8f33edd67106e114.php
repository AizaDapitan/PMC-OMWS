<?php
	$total = 0;
	$location = \App\Location::find(request()->location);
	$contractor = \App\Contractor::find(request()->contractor);
	$cont = "Not Specified";
	$loc = "Not Specified";
	if( $contractor ) $cont = $contractor->lname .", ".$contractor->fname ." ".$contractor->mname;
	if( $location ) $loc = $location->name;
?>

<!DOCTYPE html>
<html>
<head>
	<title>OMSW - Issuance Report</title>
</head>
<body>

	<div style="width: 100%; display: block; margin: 0 auto;">
		<table width="100%" style="font: 14px arial, sans-serif;">
			<tr>
				<td colspan="14" align="center">
					<font style="font: bold 30px arial, sans-serif; text-align: center;">Issuance Report</font>
					<br> 
					<?php echo e(request()->has('start') ? request()->start : \Carbon\Carbon::now()->format('Y-m-d')); ?> 
					to  
					<?php echo e(request()->has('end') ? request()->end : \Carbon\Carbon::now()->format('Y-m-d')); ?>

					<br> <?php echo e(\Carbon\Carbon::now()->format('h:i A')); ?>

					<br>
				</td>
			</tr>
			<tr><td>Contractor: <?php echo e($cont); ?></td></tr>
			<tr><td>Location: <?php echo e($loc); ?></td></tr>
		</table>
	</div>
	<br><br>

	<table width="100%" class="table" style="font: 14px arial, sans-serif;">
		<tr>
			<th>Con Code</th>
			<th>Name</th>
			<th>Location</th>
			<th>Date</th>
			<th>Receiver</th>
			<th>Trans#</th>
			<th>RQ</th>
			<th>Batch</th>
			<th>MWS</th>
			<th>Item code</th>
			<th>Description</th>
			<th>Cost code</th>
			<th>Remarks</th>
			<th>Qty</th>
		</tr>

		<?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<?php $__currentLoopData = $transaction->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<?php $total = $total + $detail->qty; ?>
				<td><?php echo e($transaction->contractor->code); ?></td>
	            <td><?php echo e($transaction->contractor->lname); ?>, <?php echo e($transaction->contractor->fname); ?> <?php echo e($transaction->contractor->mname); ?> </td>
	            <td><?php echo e($transaction->locationz? $transaction->locationz->name:''); ?></td>
	            <td><?php echo e($transaction->docDate); ?></td>
	            <td><?php echo e($transaction->receiver); ?></td>
	            <td><?php echo e($transaction->transId); ?></td>
	            <td><?php echo e($transaction->rq); ?></td>
	            <td><?php echo e($transaction->batch); ?></td>
	            <td><?php echo e($transaction->mws); ?></td>
	            <td><?php echo e($detail->itemz ? $detail->itemz->code: ''); ?></td>
	            <td><?php echo e($detail->itemz ? $detail->itemz->name: ''); ?></td>
	            <td><?php echo e($detail->cost_code); ?></td>
	            <td><?php echo e($transaction->remarks); ?></td>
	            <td><?php echo e($detail->qty); ?></td>
			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

			<tr style="font-size:16px;font-weight:bold;">
				<td>Total:</td><td colspan="13" align="right"><?php echo e(number_format($total,2)); ?></td>
			</tr>
	</table>

	<br><br>

	<table width="100%" style="font-family:Arial;font-size:12px;font-weight:bold;">
	    <tr>
	        <td>Prepared by:</td>
	        <td>Checked by:</td>
	        <td>Noted by:</td>
	    </tr>
	    <tr>
	        <td>_______________________</td>
	        <td>_______________________</td>
	        <td>_______________________</td>
	    </tr>
	</table>
</body>
</html>

<?php if(request()->has('excel')): ?>
	<?php
	$filename ="CMS".date('Ymdhis').".xls";
	header('Content-type: application/ms-excel');
	header('Content-Disposition: attachment; filename='.$filename);
	?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\owms_v2\resources\views/pages/reports/transactions-export.blade.php ENDPATH**/ ?>