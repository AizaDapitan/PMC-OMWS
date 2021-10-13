@php
	$total = 0;
@endphp

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
				{{ request()->has('start') ? request()->start : \Carbon\Carbon::now()->format('Y-m-d') }} 
				to  
				{{ request()->has('end') ? request()->end : \Carbon\Carbon::now()->format('Y-m-d') }}
				<br> {{ \Carbon\Carbon::now()->format('h:i A') }}
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

		
        @php $total = 0; $subtotal = 0;  @endphp
        @foreach( $transactions as $transaction )
            <tr>
                <td colspan="3"><strong>
                    @if($transaction->first()->contractor)
                    {{ $transaction->first()->contractor->lname }}, {{ $transaction->first()->contractor->fname }} {{ $transaction->first()->contractor->mname }}
                    @endif
                </strong></td>
            </tr>
            <tr>
                <td colspan="3"><strong style="color: blue;">{{ $transaction->first()->locationz ? $transaction->first()->locationz->name : '' }}</strong></td>
            </tr>
            @php $subtotal = 0;  @endphp
            @foreach($transaction as $trans)                
            @foreach( $trans->details as $detail )
                @php $total = $total + $detail->qty; @endphp  
                @php $subtotal = $subtotal + $detail->qty; @endphp                                      
                @php if(is_null($detail->itemz)) continue;  @endphp
                <tr>
                    <td>{{ $detail->itemz ? $detail->itemz->code:'' }}</td>
                    <td>{{ $detail->itemz ? $detail->itemz->name:'' }}</td>
                    <td>{{ $detail->qty }}</td>
                </tr>
            @endforeach
            @endforeach
            <tr>
                <td colspan="2" style="text-align: right;"><strong>Sub Total:</strong></td>
                <td><strong>{{ number_format($subtotal,2) }}</strong></td>
            </tr>
            <tr><td colspan="3">&nbsp;</td></tr>
        @endforeach
        <tr>
            <td><strong>Total</strong></td>
            <td colspan="1"></td>
            <td><strong>{{ number_format($total, 2) }}</strong></td>
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

@if(request()->has('excel'))
	@php
	$filename ="CMS".date('Ymdhis').".xls";
	header('Content-type: application/ms-excel');
	header('Content-Disposition: attachment; filename='.$filename);
	@endphp
@endif