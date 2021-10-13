@php
	$total = 0;
	$location = \App\Location::find(request()->location);
	$contractor = \App\Contractor::find(request()->contractor);
	$cont = "Not Specified";
	$loc = "Not Specified";
	if( $contractor ) $cont = $contractor->lname .", ".$contractor->fname ." ".$contractor->mname;
	if( $location ) $loc = $location->name;
@endphp

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
					{{ request()->has('start') ? request()->start : \Carbon\Carbon::now()->format('Y-m-d') }} 
					to  
					{{ request()->has('end') ? request()->end : \Carbon\Carbon::now()->format('Y-m-d') }}
					<br> {{ \Carbon\Carbon::now()->format('h:i A') }}
					<br>
				</td>
			</tr>
			<tr><td>Contractor: {{ $cont }}</td></tr>
			<tr><td>Location: {{ $loc }}</td></tr>
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

		@foreach($transactions as $transaction )
			@foreach( $transaction->details as $detail )
			<tr>
				@php $total = $total + $detail->qty; @endphp
				<td>{{ $transaction->contractor->code }}</td>
	            <td>{{ $transaction->contractor->lname }}, {{ $transaction->contractor->fname }} {{ $transaction->contractor->mname }} </td>
	            <td>{{ $transaction->locationz? $transaction->locationz->name:'' }}</td>
	            <td>{{ $transaction->docDate }}</td>
	            <td>{{ $transaction->receiver }}</td>
	            <td>{{ $transaction->transId }}</td>
	            <td>{{ $transaction->rq }}</td>
	            <td>{{ $transaction->batch }}</td>
	            <td>{{ $transaction->mws }}</td>
	            <td>{{ $detail->itemz ? $detail->itemz->code: '' }}</td>
	            <td>{{ $detail->itemz ? $detail->itemz->name: '' }}</td>
	            <td>{{ $detail->cost_code }}</td>
	            <td>{{ $transaction->remarks }}</td>
	            <td>{{ $detail->qty }}</td>
			</tr>
			@endforeach
		@endforeach

			<tr style="font-size:16px;font-weight:bold;">
				<td>Total:</td><td colspan="13" align="right">{{ number_format($total,2) }}</td>
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

@if(request()->has('excel'))
	@php
	$filename ="CMS".date('Ymdhis').".xls";
	header('Content-type: application/ms-excel');
	header('Content-Disposition: attachment; filename='.$filename);
	@endphp
@endif