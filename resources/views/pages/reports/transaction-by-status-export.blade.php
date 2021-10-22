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
{{ request()->has('start') ? request()->start : \Carbon\Carbon::now()->format('Y-m-d') }}
to
{{ request()->has('end') ? request()->end : \Carbon\Carbon::now()->format('Y-m-d') }}
<br> {{ \Carbon\Carbon::now()->format('h:i A') }}
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

@foreach( $transactions as $transaction )
@foreach( $transaction->details as $transac_d )
<tr>
<td>{{ $transaction->docDate }}</td>
<td>{{ $transaction->transId }}</td>
<td>
@if( $transaction->contractor )
{{ $transaction->contractor->code }}
@endif
</td>
<td>
@if( $transaction->contractor )
{{ $transaction->contractor->lname }}, {{ $transaction->contractor->fname }} {{ $transaction->contractor->mname }}
@endif
</td>
<td>{{ $transaction->locationz? $transaction->locationz->name:'' }}</td>
<td>{{ $transac_d->cost_code }}</td>
<td>{{ $transac_d->itemz ? $transac_d->itemz->code: '' }}</td>
<td>{{ $transac_d->itemz ? $transac_d->itemz->name: '' }}</td>
<td>{{ $transac_d->qty }}</td>
</tr>
@endforeach
@endforeach

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

@if(request()->has('excel'))
@php
$filename ="CMS".date('Ymdhis').".xls";
header('Content-type: application/ms-excel');
header('Content-Disposition: attachment; filename='.$filename);
@endphp
@endif