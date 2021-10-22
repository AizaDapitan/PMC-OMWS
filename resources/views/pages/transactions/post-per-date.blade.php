@extends('layouts.app')

@section('pageCSS')

    <link href="google.css" rel="stylesheet" type="text/css"/>
    <link href="{{env('APP_URL')}}/themes/metronic/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{env('APP_URL')}}/themes/metronic/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{env('APP_URL')}}/themes/metronic/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}/themes/metronic/assets/global/plugins/select2/select2.css"/>
    <link href="{{env('APP_URL')}}/themes/metronic/assets/global/css/components.css" rel="stylesheet" type="text/css"/>
    <link href="{{env('APP_URL')}}/themes/metronic/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
    <link href="{{env('APP_URL')}}/themes/metronic/assets/global/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" type="text/css" />
    <link href="{{env('APP_URL')}}/themes/metronic/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
    <link id="style_color" href="{{env('APP_URL')}}/themes/metronic/assets/admin/layout/css/themes/default.css" rel="stylesheet" type="text/css"/>
    <link href="{{env('APP_URL')}}/themes/metronic/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
    <link href="{{env('APP_URL')}}/themes/metronic/assets/global/plugins/bootstrap-datepicker/css/datepicker.css"/ rel="stylesheet" type="text/css">

@endsection

@section('content')

    <div class="row">

        <div class="col-md-12">

            <h3 class="page-title"> Batch Posting Module Per Date </h3>

            
                <div class="row">
                    <form method="get">
                    <div class="col-md-3">
                        <div class="form-group">Transaction Date:       
                            <div class="input-group date date-picker" style="width:80%" data-date-format="yyyy-mm-dd">
                                <input type="text" class="form-control form-filter" readonly name="docdate" id="docdate" value="{{ request()->has('docdate') ? request()->docdate : date('Y-m-d') }}">
                                <span class="input-group-btn">
                                <button class="btn  default" type="button"><i class="fa fa-calendar"></i></button>                      
                                
                            </div>
                        </div>                                  
                    </div>
                    <div class="col-md-3">
                        <input type="submit" class="btn blue" value="GO" style="margin-top: 17px;">  
                    </div>
                    </form>
                    <div class="col-md-6" style="text-align: right;">
                        <div class="form-group">
                            @if(count($transactions)) 
                                <form method="POST" action="{{ route('transaction-batch-per-date.update', request()->docdate) }}">
                                    @csrf
                                    @method('PATCH')
                                    @if($create)
                                    <input type="hidden" name="seq" value="{{ request()->docdate }}">
                                    <button class="btn blue text-right" type="submit" style="margin-top: 17px;"> Post All </button>
                                    @else
                                    <button disabled class="btn blue text-right" type="submit" style="margin-top: 17px;"> Post All </button>

                                    @endif
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            

            <div class="portlet box blue">

                <div class="portlet-title">
                    <div class="caption">
                        <i class=" icon-list"></i>Transaction List
                    </div>                    
                </div>

                <div class="portlet-body">
                   
                    <table class="table table-hover">   
                        <thead>                        
                            <tr>
                                <th>Transaction #</th>
                                <th>Contractor</th>                          
                                <th>Location</th>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>                               
                        </thead>                                
                        <tbody>

                            @forelse($transactions as $transaction)

                                @foreach( $transaction->details as $detail )
                                    <tr class="odd gradeX" onclick='$("#detailsd"+{!!$transaction->id!!}).toggle()'>
                                        <td>{{ $transaction->transId }} </td>
                                        <td>
                                            @if($transaction->contractor)
                                                {{ $transaction->contractor->lname }} , {{ $transaction->contractor->fname }} {{ $transaction->contractor->mname }}
                                            @endif
                                        </td>
                                        <td>
                                            @if($transaction->locationz)
                                                {{ $transaction->locationz->name }}
                                            @endif
                                        </td>
                                        <td>
                                            {{ $transaction->docDate }}
                                        </td>
                                        <td>
                                            {{ $transaction->status }}
                                        </td>
                                    </tr>

                                    <tr class='detailsd' id="detailsd{{$transaction->id}}"style="display: none;">
                                        <td colspan='7' >
                                        <div class='portlet box grey-cascade'>
                                            <div class='portlet-title'>
                                            <div class='caption'>
                                                <i class='fa fa-globe'></i>{{ $transaction->contractor ? $transaction->contractor->lname:'' }}, {{ $transaction->contractor ? $transaction->contractor->fname:'' }} {{ $transaction->contractor ? $transaction->contractor->mname :'' }}
                                            </div>
                                        </div>
                                        <div class='portlet-body'>

                                            <table width='80%' class='table table-striped table-bordered table-hover' style='font-size:12px;'>
                                                <thead>
                                                    <tr>
                                                        <th>Item Code</th>
                                                        <th>Item</th>
                                                        <th>Cost Code</th>
                                                        <th>Qty</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach( $transaction->details as $detail )
                                                    <tr>    
                                                        <td>{{ $detail->itemz ? $detail->itemz->code:'' }}</td>
                                                        <td>{{ $detail->itemz ? $detail->itemz->name:'' }}</td>
                                                        <td>{{ $detail->cost_code }}</td>
                                                        <td>{{ $detail->qty }}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>    
                                            </table> 

                                        </div>                     
                                    </tr>
                                @endforeach

                            @empty
                                <tr>
                                    <td colspan="5" style="text-align: center;"> No Transaction Found </td>
                                </tr>
                            @endforelse

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
    <script type="text/javascript" src="{{env('APP_URL')}}/themes/metronic/assets/global/plugins/select2/select2.min.js"></script>
    <script src="{{env('APP_URL')}}/themes/metronic/assets/global/scripts/metronic.js" type="text/javascript"></script>
    <script src="{{env('APP_URL')}}/themes/metronic/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
    <script src="{{env('APP_URL')}}/themes/metronic/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
    <script src="{{env('APP_URL')}}/themes/metronic/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
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
