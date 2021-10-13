<?php
	$total = 0;
?>

<!DOCTYPE html>
<html>
<head>
	<title>OMSW - Item Issuance Report</title>
</head>
<body>

	<table width="100%" style="font: 14px arial, sans-serif;">
		<tr>
			<td colspan="2" align="center">
				<font style="font: bold 30px arial, sans-serif;">Item Issuance Report</font>
				<br> 
				<?php echo e(request()->has('start') ? request()->start : \Carbon\Carbon::now()->format('Y-m-d')); ?> 
				to  
				<?php echo e(request()->has('end') ? request()->end : \Carbon\Carbon::now()->format('Y-m-d')); ?>

				<br> <?php echo e(\Carbon\Carbon::now()->format('h:i A')); ?>

				<br>
			</td>
		</tr>
	</table>

	<br><br>

	<table width="100%" class="table" style="font: 14px arial, sans-serif;">
		<tr>
			<th align="left">Item code</th>
			<th align="left">Description</th>
			<th align="left">Qty</th>
		</tr>

		
        <?php $total = 0; $subtotal = 0;  ?>
        <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td colspan="3"><strong>
                    <?php if($transaction->first()->contractor): ?>
                    <?php echo e($transaction->first()->contractor->lname); ?>, <?php echo e($transaction->first()->contractor->fname); ?> <?php echo e($transaction->first()->contractor->mname); ?>

                    <?php endif; ?>
                </strong></td>
            </tr>
            <tr>
                <td colspan="3"><strong style="color: blue;"><?php echo e($transaction->first()->locationz ? $transaction->first()->locationz->name : ''); ?></strong></td>
            </tr>
            <?php $subtotal = 0;  ?>
            <?php $__currentLoopData = $transaction; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trans): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                
            <?php $__currentLoopData = $trans->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $total = $total + $detail->qty; ?>  
                <?php $subtotal = $subtotal + $detail->qty; ?>                                      
                <?php if(is_null($detail->itemz)) continue;  ?>
                <tr>
                    <td><?php echo e($detail->itemz ? $detail->itemz->code:''); ?></td>
                    <td><?php echo e($detail->itemz ? $detail->itemz->name:''); ?></td>
                    <td><?php echo e($detail->qty); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td colspan="2" style="text-align: right;"><strong>Sub Total:</strong></td>
                <td><strong><?php echo e(number_format($subtotal,2)); ?></strong></td>
            </tr>
            <tr><td colspan="3">&nbsp;</td></tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><strong>Total</strong></td>
            <td colspan="1"></td>
            <td><strong><?php echo e(number_format($total, 2)); ?></strong></td>
        </tr>
        <tr><td colspan="3">&nbsp;</td></tr>

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
<?php endif; ?><?php /**PATH C:\xampp\htdocs\owms_v2\resources\views/pages/reports/item-issuance-export.blade.php ENDPATH**/ ?>