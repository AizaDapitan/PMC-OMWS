@extends('layouts.app')

@section('pageCSS')

    <link href="google.css" rel="stylesheet" type="text/css"/>
    <link href="{{env('APP_URL')}}/themes/metronic/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{env('APP_URL')}}/themes/metronic/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{env('APP_URL')}}/themes/metronic/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

    <link href="{{env('APP_URL')}}/themes/metronic/assets/global/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" type="text/css" />

    <link href="{{env('APP_URL')}}/themes/metronic/assets/global/css/components.css" rel="stylesheet" type="text/css"/>
    <link href="{{env('APP_URL')}}/themes/metronic/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
    <link href="{{env('APP_URL')}}/themes/metronic/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
    <link id="style_color" href="{{env('APP_URL')}}/themes/metronic/assets/admin/layout/css/themes/default.css" rel="stylesheet" type="text/css"/>
    <link href="{{env('APP_URL')}}/themes/metronic/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
    <link href="{{env('APP_URL')}}/themes/metronic/assets/global/plugins/select2/select2.css" rel="stylesheet" type="text/css" /> 
    <link href="{{env('APP_URL')}}/themes/metronic/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>

@endsection

@section('content')

    <div class="row">

        <div class="col-md-12">
            <div class="row">
            <h3 class="page-title"> Summary per Transaction # Report </h3>

            <form action="{{ route('rpt.issuance-by-transactionID') }}" method="get">
                <table  width="100%">
                    <tr>
                        <td width="20%" style="padding-right:20px;">
                            <label class="control-label">Transaction ID<span class="required"> * </span></label>
                            <input type="text" name="trans_id" class="form-control">
                        </td>
                        
                        <td width="20%" style="padding-right:20px;">
                            <label class="control-label"> Status <span class="required"> * </span></label>
                            <select class="form-control" name="status">
                                <option value="saved" @if(request()->status == "saved") selected @endif>SAVED</option>
                                <option value="posted" @if(request()->status == "posted") selected @endif>POSTED</option>
                                <option value="cancelled" @if(request()->status == "cancelled") selected @endif>CANCELLED</option>
                            </select>
                        </td>   
                        <td width="10%">
                            <label>&nbsp;</label>
                            <input type="submit" class="btn blue form-control" value="Generate">
                        </td>
                    </tr>
                    <tr>
                                            
                    </tr>
                </table>
            </form>
            </div>
        </div>

        <div class="col-md-12"  style="margin-top: 10px;">
            <div class="row">
                @php 
                    $query_string = url()->full();
                    $q_string = explode("?", $query_string);
                    $q = "";
                    if(count($q_string) > 1)
                        $q = "&".$q_string[1];
                @endphp
                <a href="{{ route('rpt.issuance-by-transactionID') }}?excel=true{{$q}}" target="_blank" class="btn green"><i class="fa fa-file-excel-o"></i> Export to Excel</a>
                <a href="{{ route('rpt.issuance-by-transactionID') }}?print=true{{$q}}" target="_blank" class="btn purple"><i class="fa fa-print"></i> &nbsp;&nbsp;Print&nbsp;&nbsp;&nbsp;&nbsp;</a>
            </div>
        </div>

        <div class="col-md-12">
            
            <div class="row">
                    
                <div class="table-scrollable">
                    
                    <table class="table table-hover">

                        <thead>
                            <tr>
                                <th>Transaction #</th>
                                <th>MWS</th>
                                <th>Contractor</th>                                   
                                <th>Location</th>
                                <th>Date</th>
                                <th>Cost Code</th>
                                <th>Item Code</th>
                                <th>Description</th>
                                <th>Qty</th>
                            </tr>
                        </thead>

                        <tbody>
							@php $total = 0 @endphp
                            @foreach( $transactions as $transaction )
                                @foreach( $transaction->details as $transac_d )
									@php $total = $total + $transac_d->qty; @endphp
                                    <tr>
                                        <td>{{ $transaction->transId }}</td>
                                        <td>{{ $transaction->mws }}</td>
                                        <td>
                                            @if( $transaction->contractor )
                                                {{ $transaction->contractor->lname }}, {{ $transaction->contractor->fname }} {{ $transaction->contractor->mname }}
                                            @endif
                                        </td>
                                        <td>{{ $transaction->locationz? $transaction->locationz->name:'' }}</td>  
                                        <td>{{ \Carbon\Carbon::parse($transaction->docDate)->toFormattedDateString() }}</td>                                      
                                        <td>{{ $transac_d->cost_code }}</td>		
                                        <td>{{ $transac_d->itemz ? $transac_d->itemz->code: '' }}</td>
                                        <td>{{ $transac_d->itemz ? $transac_d->itemz->name: '' }}</td>
                                        <td>{{ $transac_d->qty }}</td>
                                    </tr>
                                @endforeach
                            @endforeach
								<tr>
									<td><strong>Total: </strong></td>
									<td colspan="7"></td>
									<td><strong>{{ number_format($total, 2) }} </strong></td>
								</tr>
                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>

@endsection


@section('pageJS')
    
    <script src="{{env('APP_URL')}}/themes/metronic/assets/global/plugins/jquery-1.11.0.min.js" type="text/javascript"></script>
    <script src="{{env('APP_URL')}}/themes/metronic/assets/global/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
    <script src="{{env('APP_URL')}}/themes/metronic/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

    <script src="{{env('APP_URL')}}/themes/metronic/assets/global/scripts/metronic.js" type="text/javascript"></script>
    <script src="{{env('APP_URL')}}/themes/metronic/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
    <script src="{{env('APP_URL')}}/themes/metronic/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>

    <script src="{{env('APP_URL')}}/themes/metronic/assets/global/plugins/select2/select2.min.js" type="text/javascript" ></script>
    <script src="{{env('APP_URL')}}/themes/metronic/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript" ></script>

    <script type="text/javascript">
        var initPickers = function () {
            //init date pickers
            $('.date-picker').datepicker({
                rtl: Metronic.isRTL(),
                autoclose: true
            });
        }
        initPickers();
    </script>

@endsection