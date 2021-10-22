@extends('layouts.app')

@section('pageCSS')

    <link href="google.css" rel="stylesheet" type="text/css"/>
    <link href="{{env('APP_URL')}}/themes/metronic/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{env('APP_URL')}}/themes/metronic/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{env('APP_URL')}}/themes/metronic/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

    <link href="{{env('APP_URL')}}/themes/metronic/assets/global/css/components.css" rel="stylesheet" type="text/css"/>
    <link href="{{env('APP_URL')}}/themes/metronic/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
    <link href="{{env('APP_URL')}}/themes/metronic/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
    <link id="style_color" href="{{env('APP_URL')}}/themes/metronic/assets/admin/layout/css/themes/default.css" rel="stylesheet" type="text/css"/>
    <link href="{{env('APP_URL')}}/themes/metronic/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
  
@endsection

@section('content')

    <div class="row">

        <div class="col-md-12">

            <h3 class="page-title"> Issuance Requests List </h3>            

            <form method="get">
                <ul class="page-breadcrumb breadcrumb">                     
                    <li>
                        <i class="fa fa-filter"></i>                                                    
                    </li>   
                    <li>
                        <input name="searchtxt" id="searchtxt" class="form-control" style="width:400px;" type="text" placeholder="Input Recipeint, Receiver, or Control#.." value="{{ request()->searchtxt }}">                                
                    </li>
                    <li>
                        <select name="location" id="location" class="form-control">
                            <option value=""> - Select Location -
                            <option value="MINES" {{request()->location == 'MINES' ? 'selected' :'' }}> - MINES -
                            <option value="MILL" {{request()->location == 'MILL' ? 'selected' :'' }}> - MILL -
                        </select>
                    </li>
                    <li>
                        <input type="submit" class="btn green btn-sm" value="Search">
                        <a href="{{ route('ppe-transactions') }}" class="btn blue btn-sm" style="color:white;">Reset</a>
                    </li>
                </ul>
            </form>

            <div class="portlet box blue">

                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i> Transactions
                    </div>       

                </div>

                <div class="portlet-body">
                    
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Control #</th>
                                <th>Recipient</th>
                                <th>Document Date</th>      
                                <th>Location</th>                           
                                <th>Status</th>
                                <th>Action</th>                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $transactions as $transaction )
                                @php
                                    $qty_ordered = $transaction->details()->sum('qty');
                                    $qty_delevered = $transaction->details()->sum('qtyReleased');
                                @endphp
                                <tr onclick='$("#detailsd"+{!!$transaction->id!!}).toggle()'>
                                    <td>{{ $transaction->controlNum }}</td>
                                    <td>{{ $transaction->receiver }}</td>
                                    <td>{{ \Carbon\Carbon::parse($transaction->docDate)->toFormattedDateString() }}</td>
                                    <td>{{ $transaction->location }}</td>
                                    <td>{{ $qty_delevered }} / {{ $qty_ordered }} </td>
                                    <td>
                                        @if($create)
                                            @if( $qty_ordered > $qty_delevered )
                                                <a href="{{ route('ppe-transaction.create', $transaction->id) }}" class="btn btn-xs green-jungle">Process</a>
                                            @endif
                                        @else
                                            @if( $qty_ordered > $qty_delevered )
                                                <button disabled class="btn btn-xs green-jungle">Process</button>
                                            @endif
                                        @endif
                                    </td>
                                </tr>

                                <tr class="detailsd" id="detailsd{{$transaction->id}}" style="display: none;">
                                    <td colspan="7">
                                        
                                        <div class="portlet box grey-cascade">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-globe"></i>Control#: {{$transaction->controlNum}}
                                                </div>
                                            </div>
                                        <div class="portlet-body">
                                
                                            <table width="80%" class="table table-condensed table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Item</th>                           
                                                        <th>Size</th>
                                                        <th>Color</th>
                                                        <th>Last Issue</th>
                                                        <th>Remarks</th>
                                                        <th>Qty</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach( $transaction->details as $detail )
                                                    <tr>
                                                        <td>{{ $detail->itemDesc }}</td>
                                                        <td>{{ $detail->itemSize }}</td>
                                                        <td>{{ $detail->itemColor }}</td>
                                                        <td>{{ $detail->lastissueDate }}</td>
                                                        <td>{{ $detail->remarks }}</td>
                                                        <td>{{ $detail->qty }}</td>
                                                        <td>{{ $detail->qtyReleased }} / {{ $detail->qty }}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>

                                        </div>

                                    </td>                                        
                                </tr>

                            @endforeach
                        </tbody>

                    </table>

                </div>

                <div class="col-md-6"></div>
                <div class="col-md-6" style="text-align: right;">
                    {{ $transactions->withQueryString()->links() }}
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

    <script type="text/javascript">
        
    </script>

@endsection
