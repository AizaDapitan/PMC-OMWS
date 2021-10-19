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

            <h3 class="page-title"> Item Issuance Details Report </h3>

            <div class="col-md-12">
                <div class="row">
                    <form action="{{ route('rpt.item-issuance-details') }}" method="get">
                        <input type="hidden" name="act" value="gen">
                        
                        <table  width="100%">
                            <tr>
                                <td width="30%">
                                    <label class="control-label">Start<span class="required"> * </span></label>
                                    <div class="input-group date date-picker" style="width:80%" data-date-format="yyyy-mm-dd">
                                        <input type="text" class="form-control form-filter" readonly name="start" id="start" value="{{ request()->has('start') ? request()->start : date('Y-m-d') }}">
                                        <span class="input-group-btn">
                                        <button class="btn  default" type="button"><i class="fa fa-calendar"></i></button>                      
                                        
                                    </div>
                                </td>

                                <td>
                                    <label class="control-label">Location<span class="required"> * </span></label>
                                    <select class="form-control input-large select2me" name='location' id="location" data-placeholder="Select...">
                                        <option></option>
                                        @foreach( $locations as $location )
                                            <option value="{{ $location->id }}" @if($location->id == request()->location) selected @endif>{{ $location->name }}</option>
                                        @endforeach
                                    </select>   
                                </td>
                                
                                <td>
                                    <label for="item"> Item </label>
                                    <input type="text" name="item" class="form-control" value="{{ request()->item }}">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label class="control-label">End:<span class="required"> * </span></label>
                                    <div class="input-group date date-picker" style="width:80%" data-date-format="yyyy-mm-dd">
                                        <input type="text" class="form-control form-filter" readonly name="end" id="end" value="{{ request()->has('end') ? request()->end : date('Y-m-d') }}">
                                        <span class="input-group-btn">
                                        <button class="btn  default" type="button"><i class="fa fa-calendar"></i></button>                                  
                                    </div>                                  
                                </td>
                                <td>                                
                                    <label class="control-label">Contractor<span class="required"> * </span></label>
                                    <select class="form-control input-large select2me" name='contractor' id="contractor" data-placeholder="Select...">
                                        <option></option>
                                        <@foreach( $contractors as $contractor )
                                            <option value="{{ $contractor->id }}" @if($contractor->id == request()->contractor) selected @endif>{{ $contractor->lname }}, {{ $contractor->fname }} {{ $contractor->mname }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td><input type="submit" class="btn blue form-control" value="Generate"></td>
                            </tr>
                        </table>
                    </form>

                </div>
            </div>

            <br><br>
            <div class="clearfix"></div>

            <div class="col-md-12"  style="margin-top: 10px;">
                <div class="row">
                    @php 
                        $query_string = url()->full();
                        $q_string = explode("?", $query_string);
                        $q = "";
                        if(count($q_string) > 1)
                            $q = "&".$q_string[1];
                    @endphp
                    <a href="{{ route('rpt.item-issuance-details') }}?excel=true{{$q}}" target="_blank" class="btn green"><i class="fa fa-file-excel-o"></i> Export to Excel</a>
                    <a href="{{ route('rpt.item-issuance-details') }}?print=true{{$q}}" target="_blank" class="btn purple"><i class="fa fa-print"></i> &nbsp;&nbsp;Print&nbsp;&nbsp;&nbsp;&nbsp;</a>
                </div>
            </div>

            <br><br>
            <div class="clearfix"></div>

            <div class="col-md-12">
                <div class="row">
                    <div class="table-scrollable">
                        
                        <table class="table table-hover">

                            <thead>
                                <tr>
                                    <th>Date</th>     
                                    <th>Transaction #</th>
                                    <th>MWS</th>
                                    <th>RQ</th>
                                    <th>Batch</th>
                                    <th>Item Code</th>
                                    <th>Description</th>
                                    <th>Qty</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php $total = 0; @endphp
                                @foreach( $transactions as $transaction )                                    
                                    <tr>
                                        <td colspan="8"><strong>
                                            @if($transaction->first()->contractor)
                                            {{ $transaction->first()->contractor->lname }}, {{ $transaction->first()->contractor->fname }} {{ $transaction->first()->contractor->mname }}
                                            @endif
                                        </strong></td>
                                    </tr>
                                    <tr>
                                        <td colspan="8"><strong style="color: blue;">{{ $transaction->first()->locationz ? $transaction->first()->locationz->name : '' }}</strong></td>
                                    </tr>
                                    @php $subtotal = 0;  @endphp
                                    @foreach($transaction as $trans)                                    
                                    @foreach( $trans->details as $detail )
                                        @php $total = $total + $detail->qty; @endphp
                                        @php $subtotal = $subtotal + $detail->qty; @endphp  
                                        @php if(is_null($detail->itemz)) continue;  @endphp
                                        <tr>
                                            <td>{{ \Carbon\Carbon::parse($trans->docDate)->toFormattedDateString() }}</td>
                                            <td>{{ $trans->seq }}</td>
                                            <td>{{ $trans->mws }}</td>
                                            <td>{{ $trans->rq }}</td>
                                            <td>{{ $trans->batch }}</td>
                                            <td>{{ $detail->itemz ? $detail->itemz->code:'' }}</td>
                                            <td>{{ $detail->itemz ? $detail->itemz->name:'' }}</td>
                                            <td>{{ $detail->qty }}</td>
                                        </tr>
                                    @endforeach
                                    @endforeach
                                    <tr>
                                        <td colspan="7" style="text-align: right;"><strong>Sub Total:</strong></td>
                                        <td><strong>{{ number_format($subtotal,2) }}</strong></td>
                                    </tr>
                                    <tr><td colspan="8">&nbsp;</td></tr>
                                @endforeach
                                <tr>
                                    <td><strong>Total</strong></td>
                                    <td colspan="6"></td>
                                    <td><strong>{{ number_format($total, 2) }}</strong></td>
                                </tr>
                            </tbody>

                        </table>

                    </div>
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
