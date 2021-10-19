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

            <h3 class="page-title"> Issuance Report </h3>

            <div class="col-md-12">
                <div class="row">
                    <form action="{{ route('rpt.transaction-all') }}" method="get">
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
                                    <select class="form-control input-large select2me" name='location' id="location">
                                        <option></option>
                                        @foreach( $locations as $location )
                                            <option value="{{ $location->id }}" @if($location->id == request()->location) selected @endif>{{ $location->name }}</option>
                                        @endforeach
                                    </select>   
                                </td>
                                
                                <td><input type="checkbox" name="ckb" @if(request()->has('ckb')) checked @endif> Deductible items only</td>
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
                                    <select class="form-control input-large select2me" name='contractor' id="contractor">
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
                    <a href="{{ route('rpt.transaction-all') }}?excel=true{{$q}}" target="_blank" class="btn green"><i class="fa fa-file-excel-o"></i> Export to Excel</a>
                    <a href="{{ route('rpt.transaction-all') }}?print=true{{$q}}" target="_blank" class="btn purple"><i class="fa fa-print"></i> &nbsp;&nbsp;Print&nbsp;&nbsp;&nbsp;&nbsp;</a>
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
                                    <th>Contractor Code</th>                                   
                                    <th>Name</th>
                                    <th>Location</th>
                                    <th>Date</th>                                   
                                    <th>Receiver</th>
                                    <th>Transaction #</th>
                                    <th>RQ</th>
                                    <th>Batch</th>
                                    <th>MWS</th>
                                    <th>Item Code</th>
                                    <th>Description</th>
                                    <th>Cost Code</th>
                                    <th>Remarks</th>
                                    <th>Qty</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php $total = 0; @endphp
                                @foreach( $transactions as $transaction )
                                    @foreach( $transaction->details as $transac_d )
                                        @php $total = $total + $transac_d->qty; @endphp
                                        <tr>
                                            <td>{{ $transaction->contractor->code }}</td>
                                            <td>{{ $transaction->contractor->lname }}, {{ $transaction->contractor->fname }} {{ $transaction->contractor->mname }} </td>
                                            <td>{{ $transaction->locationz? $transaction->locationz->name:'' }}</td>
                                            <td>{{ \Carbon\Carbon::parse($transaction->docDate)->toFormattedDateString() }}</td>
                                            <td>{{ $transaction->receiver }}</td>
                                            <td>{{ $transaction->transId }}</td>
                                            <td>{{ $transaction->rq }}</td>
                                            <td>{{ $transaction->batch }}</td>
                                            <td>{{ $transaction->mws }}</td>
                                            <td>{{ $transac_d->itemz ? $transac_d->itemz->code: '' }}</td>
                                            <td>{{ $transac_d->itemz ? $transac_d->itemz->name: '' }}</td>
                                            <td>{{ $transac_d->cost_code }}</td>
                                            <td>{{ $transaction->remarks }}</td>
                                            <td>{{ $transac_d->qty }}</td>
                                        </tr>
                                    @endforeach
                                @endforeach
                                
                                <tr>
                                    <td><strong>Total</strong></td>
                                    <td colspan="12"></td>
                                    <td><strong>{{ $total }}</strong></td>
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
