<!DOCTYPE html>
<html>
<head>
<title>OMWS - Unposted Transactions Report </title>
</head>
<body>

<table width="100%" style="font: 14px arial, sans-serif;">
<tr>
<td colspan="2" align="center">
<font style="font: bold 30px arial, sans-serif;">Unposted Transactions Report</font>
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

<table width="100%" style="font: 14px arial, sans-serif;">
<tr>
<th align="left">Date</th>
<th align="left">Transaction #</th>
<th align="left">Contractor Code</th>
<th align="left">Name</th>
<th align="left">Location</th>
<th align="left">Cost Code</th>
<th align="left">Item Code</th>
<th align="left">Description</th>
<th align="left">Qty</th>
</tr>

<?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php $__currentLoopData = $transaction->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transac_d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
<td><?php echo e($transaction->docDate); ?></td>
<td><?php echo e($transaction->transId); ?></td>
<td>
<?php if( $transaction->contractor ): ?>
<?php echo e($transaction->contractor->code); ?>

<?php endif; ?>
</td>
<td>
<?php if( $transaction->contractor ): ?>
<?php echo e($transaction->contractor->lname); ?>, <?php echo e($transaction->contractor->fname); ?> <?php echo e($transaction->contractor->mname); ?>

<?php endif; ?>
</td>
<td><?php echo e($transaction->locationz? $transaction->locationz->name:''); ?></td>
<td><?php echo e($transac_d->cost_code); ?></td>
<td><?php echo e($transac_d->itemz ? $transac_d->itemz->code: ''); ?></td>
<td><?php echo e($transac_d->itemz ? $transac_d->itemz->name: ''); ?></td>
<td><?php echo e($transac_d->qty); ?></td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
<?php endif; ?><?php /**PATH C:\xampp\htdocs\omws\resources\views/pages/reports/transaction-by-status-export.blade.php ENDPATH**/ ?>