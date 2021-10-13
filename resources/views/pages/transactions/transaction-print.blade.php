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
        <td align="right" style="font-size:11px;" valign="top">{{ date('F d,Y h:i A') }}</td>
    </tr>
</tbody></table>
    </td></tr>    
	<tr><td style="font-weight:bold;font-size:16px;" colspan="7" align="center">Issuance Report</td></tr>	
	<tr></tr>
	<tr></tr>
	<br><br>
	<tr><td colspan="2">Contractor: 
        @if($transaction->contractor)
            {{ $transaction->contractor->lname }}, {{ $transaction->contractor->fname }} {{ $transaction->contractor->mname }}
        @endif
    </td><td colspan="2">Transaction No.: {{ $transaction->transId }}</td></tr>
	<tr><td></td></tr>
	<tr><td colspan="2">Location: 
        @if($transaction->locationz)
            {{ $transaction->locationz->name }}
        @endif
    </td><td colspan="2">MWS: {{ $transaction->mws }}</td></tr>
	<tr><td colspan="2">Approved by: {{ $transaction->approvere }}</td><td colspan="2">Issuance status: {{ $transaction->status }}</td></tr>
	<tr><td colspan="2">Remarks: {{ $transaction->remarks }}</td></td><td colspan="2">Doc Date: {{ \Carbon\Carbon::parse($transaction->docDate)->toFormattedDateString() }}</td></tr>
	<tr><td>&nbsp;</td></tr>
	<tr style='color:blue;font-weight:bold;'>
        <td align='left'>Cost Code</td>
        <td align='left'>Code</td>
        <td align='left'>Description</td>
        <td align='right'>Qty</td>  
        
    </tr><tr><td colspan='4'><hr></td></tr>
    @forelse($transaction->details as $detail )
        <tr>
            <td>{{ $detail->cost_code }}</td>
            <td>{{ $detail->itemz ? $detail->itemz->code : '' }}</td>
            <td>{{ $detail->itemz ? $detail->itemz->name : '' }}</td>
            <td>{{ $detail->qty }}</td>
        </tr>
    @empty

    @endforelse

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
    	<td>{{ $transaction->issuer }}</td>
        <td></td>
        <td></td>
        <td>{{ $transaction->receiver }}</td>       
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
