<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
	<title>OMWS</title>
</head>

<body onload='window.print()'>
 <table width="100%" style="font-family:Arial;font-size:12px;">
    <tr><td colspan="9">
        <table width="100%">
    <tbody><tr>
        <td><font color="blue" size="+1">PHILSAGA MINING CORPORATION</font><br>
Purok 1-A, Bayugan 3, Rosario, Agusan del Sur<br><br></td>
        <td align="right" style="font-size:11px;" valign="top"><?php echo e(date('F d,Y h:i A')); ?></td>
    </tr>
</tbody></table>
    </td></tr>    
	<tr><td style="font-weight:bold;font-size:16px;" colspan="7" align="center">Issuance Report</td></tr>	
	<tr></tr>
	<tr></tr>
	<br><br>
	<tr><td colspan="2">Contractor: 
        <?php if($transaction->contractor): ?>
            <?php echo e($transaction->contractor->lname); ?>, <?php echo e($transaction->contractor->fname); ?> <?php echo e($transaction->contractor->mname); ?>

        <?php endif; ?>
    </td><td colspan="2">Transaction No.: <?php echo e($transaction->transId); ?></td></tr>
	<tr><td></td></tr>
	<tr><td colspan="2">Location: 
        <?php if($transaction->locationz): ?>
            <?php echo e($transaction->locationz->name); ?>

        <?php endif; ?>
    </td><td colspan="2">MWS: <?php echo e($transaction->mws); ?></td></tr>
	<tr><td colspan="2">Approved by: <?php echo e($transaction->approvere); ?></td><td colspan="2">Issuance status: <?php echo e($transaction->status); ?></td></tr>
	<tr><td colspan="2">Remarks: <?php echo e($transaction->remarks); ?></td></td><td colspan="2">Doc Date: <?php echo e(\Carbon\Carbon::parse($transaction->docDate)->toFormattedDateString()); ?></td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr style='color:blue;font-weight:bold;'>
        <td align='left'>Cost Code</td>
        <td align='left'>Code</td>
        <td align='left'>Description</td>
        <td align='right'>Qty</td>  
        
    </tr><tr><td colspan='4'><hr></td></tr>
    <?php $__empty_1 = true; $__currentLoopData = $transaction->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <tr>
            <td><?php echo e($detail->cost_code); ?></td>
            <td><?php echo e($detail->itemz ? $detail->itemz->code : ''); ?></td>
            <td><?php echo e($detail->itemz ? $detail->itemz->name : ''); ?></td>
            <td><?php echo e($detail->qty); ?></td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

    <?php endif; ?>

 </table>


<br><br>
<table width="100%" style="font-family:Arial;font-size:12px;font-weight:bold;">
    <tr>
        <td>Processed by:</td>
        <td>Issued by:</td>
        <td>Checked by:</td>        
        <td>Received by:</td> 
    </tr>
    <tr>
    	<td><?php echo e($transaction->issuer); ?></td>
        <td></td>
        <td></td>
        <td><?php echo e($transaction->receiver); ?></td>       
    </tr>
    <tr>
        <td>_______________________</td>
        <td>_______________________</td>
        <td>_______________________</td>
        <td>_______________________</td>
    </tr>
</table>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\owms_v2\resources\views/pages/transactions/transaction-print.blade.php ENDPATH**/ ?>