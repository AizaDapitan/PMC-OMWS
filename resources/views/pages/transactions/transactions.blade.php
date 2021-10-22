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
    <style type="text/css">
        table td {
            padding-bottom: 10px;
        }
    </style> 

@endsection

@section('content')

    <div class="row">

        <div class="col-md-12">

            <h3 class="page-title"> Issuance Transaction </h3>            

            <ul class="page-breadcrumb breadcrumb">
                <li>                            
                    @if($create)
                    <a class="btn blue" href="{{ route('transaction-new') }}" style="color:white;">Add New</a>  
                    @else
                    <button disabled class="btn blue" href="{{ route('transaction-new') }}" style="color:white;">Add New</button>  
                    @endif                          
                </li>                       
            </ul>

            <div class="portlet box blue">

                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i> Transactions
                    </div>       

                </div>

                <div class="portlet-body">
                    
                    
                    <form action="{{ route('transactions') }}" method="get" class="form-inline">
                        <input type="hidden" value="search" name="act">
                        <span class="form-control form-inline col-md-2 col-sm-2" style="font-weight:bold;">Search:</span>
                        <input type="text" name="search_txt" class="form-control form-inline col-md-3 col-sm-3" placeholder="search here..">
                        <select class="form-control form-inline col-md-3 col-sm-3" name='search_type' style="margin-right: 5px;">
                            <option value="contractor" @if(request()->search_type == 'contractor') selected @endif>Contractor</option>
                            <option value="location" @if(request()->search_type == 'location') selected @endif>Location</option>
                            <option value="seq" @if(request()->search_type == 'seq') selected @endif>Transaction No.</option>
                            <option value="transId" @if(request()->search_type == 'transId') selected @endif>Transaction ID</option>
                            <option value="mws" @if(request()->search_type == 'mws') selected @endif>MWS</option>
                            <option value="receiver" @if(request()->search_type == 'receiver') selected @endif>Receiver</option>
                            <option value="approver" @if(request()->search_type == 'approver') selected @endif>Approver</option>
                            <option value="issuer" @if(request()->search_type == 'issuer') selected @endif>Issuer</option>
                            <option value="rq" @if(request()->search_type == 'rq') selected @endif>RQ</option>
                            <option value="batch" @if(request()->search_type == 'batch') selected @endif>Batch</option>                        
                            <option value="item" @if(request()->search_type == 'item') selected @endif>Item</option>                                      
                            <option value="costcode" @if(request()->search_type == 'costcode') selected @endif>Cost Code</option>     
                            <option value="status" @if(request()->search_type == 'status') selected @endif>Status</option>                                                                      
                        </select>
                        <input value="Search" type="submit" class="btn yellow">
                        <a href="{{ route('transactions') }}"  class="btn green">Reset</a>
                    </form>
                       
                    <br>

                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Trans#</th>                                                                     
                                <th>Contractor</th>                             
                                <th>Location</th>                                   
                                <th>Date</th>                               
                                <th>Status</th>
                                <th>Actions</th>                           
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $transactions as $transaction )
                            <tr class="odd gradeX" onclick='$("#detailsd"+{!!$transaction->id!!}).toggle()'>
                                <td>{{ $transaction->transId }}</td>
                                <td>{{ $transaction->contractor ? $transaction->contractor->lname:'' }}, {{ $transaction->contractor ? $transaction->contractor->fname:'' }} {{ $transaction->contractor? $transaction->contractor->mname:'' }} </td>
                                <td>{{ $transaction->locationz ? $transaction->locationz->name : '' }}</td>
                                <td>{{ \Carbon\Carbon::parse($transaction->docDate)->toFormattedDateString() }}</td>
                                <td>{{ $transaction->status }}</td>
                                <td>

                                    @if($transaction->status == 'SAVED')
                                    @if($edit)
                                        <a href="{{ route('transaction.edit', $transaction->id) }}" class="btn green btn-xs" title="Edit Issuance"><i class="fa fa-edit"></i> </a>
                                        <a href="#modalPost" data-id="{{$transaction->id}}" data-toggle="modal" data-backdrop="static" class="btn blue postb btn-xs btn-post" title="POST Transaction" ><i class="fa fa-check-circle-o"></i> </a>
                                    
                                    @else
                                        <button disabled href="{{ route('transaction.edit', $transaction->id) }}" class="btn green btn-xs" title="Edit Issuance"><i class="fa fa-edit"></i> </button>
                                        <button disabled href="#modalPost" data-id="{{$transaction->id}}" data-toggle="modal" data-backdrop="static" class="btn blue postb btn-xs btn-post" title="POST Transaction" ><i class="fa fa-check-circle-o"></i> </button>
                                    
                                    @endif
                                        @if($delete)
                                            <a href="#modalPost" data-id="{{$transaction->id}}" class="btn red btn-cancel btn-xs" title="CANCEL Transaction" data-toggle="modal" data-backdrop="static"><i class="fa fa-times"></i> </a>
                                        @else
                                            <button disabled href="#modalPost" data-id="{{$transaction->id}}" class="btn red btn-cancel btn-xs" title="CANCEL Transaction" data-toggle="modal" data-backdrop="static"><i class="fa fa-times"></i> </button>
                                        @endif
                                    @endif      
                                    @if($transaction->status != 'CANCELLED')   
                                        @if($print)                                                           
                                            <a href="{{ route('transactions') }}?print=true&transId={{$transaction->id}}" target="_blank" class="btn purple btn-xs" title="Print Issuance"><i class="fa fa-print"></i> </a>
                                        @else
                                            <button disabled href="{{ route('transactions') }}?print=true&transId={{$transaction->id}}" target="_blank" class="btn purple btn-xs" title="Print Issuance"><i class="fa fa-print"></i> </button>
                                        @endif
                                        @if($edit)
                                            <a data-toggle="modal" href="#modalClassic" data-id="{{$transaction->id}}" data-rq="{{$transaction->rq}}" data-transac="{{$transaction->transId}}" data-batch="{{$transaction->batch}}" class="btn green btn-xs btn-classic" title="Update Classic Info"><i class="fa fa-info"></i> Classic</a>
                                        @else
                                            <button disabled data-toggle="modal" href="#modalClassic" data-id="{{$transaction->id}}" data-rq="{{$transaction->rq}}" data-transac="{{$transaction->transId}}" data-batch="{{$transaction->batch}}" class="btn green btn-xs btn-classic" title="Update Classic Info"><i class="fa fa-info"></i> Classic</button>
                                        @endif
                                    @endif
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

    <div class="modal fade" id="modalPost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" id="post-form">
                @csrf
                @method('PATCH')
                <input type="hidden" name="status" id="form-status">
            <div class="modal-content">
                
                <div class="modal-body">

                    <h3 id="form-text"></h3>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="modal_action">OK</button>
                </div>
            </div>
            </form>
        </div>
    </div>


    <div class="modal fade" id="modalClassic" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" id="classic-form">
                @csrf
                @method('PATCH')
                <input type="hidden" name="status" id="classic-status">
            <div class="modal-content">
                
                <div class="modal-header">
                    <h3 class="modal-title" id="classic-title">Update Classic data of - <span id="classic-transID"></span></h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <h3 id="form-text"></h3>

                    <table width="100%">
                        <tr>
                            <td width="150"><label>Batch #:</label></td>
                            <td><input type="text" id="f_batch" name="batch" class="form-control col-md-4 input inline" ></td>
                        </tr>
                        <tr>
                            <td width="150"><label>Classic RQ:</label></td>
                            <td><input type="text" id="f_rq" name="rq" class="form-control col-md-4 input inline"></td>
                        </tr>                                       
                    </table>    

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="modal_action">UPDATE</button>
                </div>
            </div>
            </form>
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
        
        $('.btn-post').click(function() {

            let transaction_id = $(this).data('id');
            let url = '{!! route('transactions') !!}';

            $('#form-status').val("POSTED");
            $('#form-text').text('Are you sure you want to post this transaction ?');
            $('#post-form').attr('action', url+'/'+transaction_id);

        });

        $('.btn-cancel').click(function() {

            let transaction_id = $(this).data('id');
            let url = '{!! route('transactions') !!}';

            $('#form-status').val("CANCELLED");
            $('#form-text').text('Are you sure you want to cancel this transaction ?');
            $('#post-form').attr('action', url+'/'+transaction_id);

        });

        $('.btn-classic').click(function() {

            let transaction_id = $(this).data('id');
            let transID = $(this).data('transac');
            let rq = $(this).data('rq');
            let batch = $(this).data('batch');
            let url = '{!! route('transactions') !!}';

            $('#classic-status').val("CLASSIC");
            $('#classic-transID').text(transID);
            $('#f_batch').val(batch);
            $('#f_rq').val(rq);
            $('#classic-form').attr('action', url+'/'+transaction_id);

        });


    </script>

@endsection
