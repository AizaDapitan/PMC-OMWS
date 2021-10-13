@extends('layouts.app')

@section('pageCSS')

    <link href="google.css" rel="stylesheet" type="text/css"/>
    <link href="{{env('APP_URL')}}/themes/metronic/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{env('APP_URL')}}/themes/metronic/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{env('APP_URL')}}/themes/metronic/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{env('APP_URL')}}/themes/metronic/assets/global/plugins/select2/select2.css" rel="stylesheet" type="text/css" />
    <link href="{{env('APP_URL')}}/themes/metronic/assets/global/css/components.css" rel="stylesheet" type="text/css"/>
    <link href="{{env('APP_URL')}}/themes/metronic/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
    <link href="{{env('APP_URL')}}/themes/metronic/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
    <link id="style_color" href="{{env('APP_URL')}}/themes/metronic/assets/admin/layout/css/themes/default.css" rel="stylesheet" type="text/css"/>
    <link href="{{env('APP_URL')}}/themes/metronic/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
    <link href="{{env('APP_URL')}}/themes/metronic/assets/global/plugins/bootstrap-datepicker/css/datepicker.css"/ rel="stylesheet" type="text/css">

@endsection

@section('content')

    <div class="row">

        <div class="col-md-12">

            <h3 class="page-title"> Add New Issuance </h3>

            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <i class="fa fa-home"></i>
                    <a href="/">Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <a href="#">Add Issuance Request</a>
                </li>
                
            </ul>

            <div class="portlet box blue">

                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>Add Form
                    </div>                    
                </div>

                    <div class="portlet-body form">
                        
                        <!-- BEGIN FORM-->
                        <form action="{{ route('ppe-transaction.store') }}" id="ppe-create"  method="post" class="horizontal-form" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="contractor_id" value="{{ $transaction->contractorId }}">
                            <input type="hidden" name="trans_id" value="{{ $transaction->id }}">
                            <input type="hidden" name="t1" id="t1">
                            <div class="form-body">                                 
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">                                               
                                            <table width="90%" style="margin-left:20px;">
                                                <tr>
                                                    <td width="50%" valign="top">
                                                        <table width="100%">                                                                                
                                                            <tr>
                                                                <td valign="top">Contractor:&nbsp;&nbsp;&nbsp;</td>
                                                                <td>        
                                                                    <div class="form-group">            
                                                                    <input type="text" name="contractor" value="{{ $transaction->receiver }}" class="form-control" readonly>
                                                                    </div>     
                                                                </td>                                                       
                                                            </tr>
                                                            <tr>
                                                                <td valign="top">Location:&nbsp;&nbsp;&nbsp;</td>
                                                                <td id="loclist">
                                                                    <div class="form-group">
                                                                    <select class="form-control select2me" name='location' id="location" data-placeholder="Select...">
                                                                            <option ></option>
                                                                        @forelse($locations as $location )
                                                                            <option value="{{ $location->id }}">
                                                                                {{ $location->name }}
                                                                            </option>
                                                                        @empty
                                                                        @endforelse
                                                                    </select> 
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td valign="top">Date:</td>
                                                                <td>
                                                                    
                                                                    <div class="form-group">                                                                                
                                                                        <div class="input-group date date-picker margin-bottom-5" data-date-format="yyyy-mm-dd" data-date-start-date="">
                                                                            <input type="text" class="form-control form-filter" readonly name="docdate" id="docdate" value="{{ date('Y-m-d') }}">
                                                                            <span class="input-group-btn">
                                                                            <button class="btn  default" type="button"><i class="fa fa-calendar"></i></button>
                                                                            </span>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                    
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td valign="top">Transaction#:&nbsp;&nbsp;&nbsp;<span style="color: red;">*</span></td>
                                                                <td>
                                                                    @if(count($open_sequences)>1)
                                                                        <select class="form-control" name="seq" id="seq">
                                                                            @foreach($open_sequences as $sequence)
                                                                                <option value="{{ $sequence->sequence_id }}" @if ($sequence->is_fabricated == 0 && Carbon\Carbon::parse($sequence->date_created)->format('Y-m-d')==Carbon\Carbon::now()->format('Y-m-d')) selected @endif>{{ $sequence->sequence_id }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    @else
                                                                        <input class="form-control" name="seq" id="seq" value="{{ $open_sequences[0]->sequence_id }}" readonly>                     
                                                                    @endif  <br>
                                                                </td>                                                       
                                                            </tr>                                                           
                                                            <tr>
                                                                <td valign="top">Files:&nbsp;&nbsp;&nbsp;</td>
                                                                <td>
                                                                    <input type="file" id="file" name="file" accept="image/*" class="form-control" />           
                                                                </td>                                                       
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <td width="50%" valign="top" style="padding-right:50px;padding-left:20px;">
                                                        <table width="100%">    

                                                            <tr>
                                                                <td valign="top">MWS#:&nbsp;&nbsp;&nbsp;<span style="color: red;">*</span></td>
                                                                <td>
                                                                    <input class="form-control" name="mws" id="mws" value="{{ $transaction->controlNum }}">                              
                                                                    <br>
                                                                </td>                                                       
                                                            </tr>
                                                            <tr>
                                                                <td valign="top">Receiver:&nbsp;&nbsp;&nbsp;<span style="color: red;">*</span></td>
                                                                <td>     
                                                                    <input type="text" name="receiver" class="form-control" value="{{ $transaction->receiverId }}" readonly>
                                                                    <br> 
                                                                </td>                                                       
                                                            </tr>
                                                            <tr>
                                                                <td valign="top">Approver:&nbsp;&nbsp;&nbsp;<span style="color: red;">*</span></td>
                                                                <td>      
                                                                    <div class="form-group">              
                                                                    <select class="form-control select2me" name='approver' id="approver" data-placeholder="Select...">
                                                                        <option></option>
                                                                        <option value="ED CASTRO" selected="selected">ED CASTRO</option>
                                                                        @foreach( $approvers as $approver )
                                                                            <option value="{{ $approver->name }}">{{ $approver->name }}</option>
                                                                        @endforeach
                                                                    </select>    
                                                                    </div>
                                                                </td>                                                       
                                                            </tr>
                                                            <tr>
                                                                <td valign="top">Issuer:&nbsp;&nbsp;&nbsp;<span style="color: red;">*</span></td>
                                                                <td>
                                                                    <input class="form-control" name="issuer" id="issuer"><br>
                                                                </td>                                                       
                                                            </tr>
                                                            <tr>
                                                                <td valign="top">Remarks:&nbsp;&nbsp;&nbsp;</td>
                                                                <td>
                                                                    <textarea class="form-control" name="remarks" id="remarks" rows="5"></textarea>     
                                                                </td>                                                       
                                                            </tr>

                                                        </table>
                                                    </td>
                                                </tr>
                                            </table>                                                

                                        </div>
                                    </div>
                                    
                                </div>
                                <!--/row-->
                            
                                <h3 class="form-section">Items</h3>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                    <div class="portlet box blue">
                                        
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-gift"></i>
                                            </div>
                                            <div class="tools">
                                                <a href="javascript:;" class="collapse">
                                                </a>                                                        
                                            </div>
                                        </div>

                                        <div class="portlet-body form">
                                            <div class="table-container">                                                   
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <td>Option</td>
                                                            <td>Request</td>
                                                            <td>Color</td>
                                                            <td>Size</td>
                                                            <td>Remarks</td>
                                                            <td>Item</td>
                                                            <td>Code</td>
                                                            <td>Qty</td>
                                                            <td>Deduction</td>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="e_items_table">
                                                        @foreach($transaction->details as $detail)
                                                            @php 
                                                                $bal = $detail->qty - $detail->qtyReleased;
                                                            @endphp
                                                            @if($bal>0)
                                                            <tr data-id="{{$detail->id}}">
                                                                <td>
                                                                    @if($detail->noPAR == 1 )
                                                                        Release without par {{ $detail->id }}
                                                                    @else 
                                                                        <a href="{{ route('item-no-par', $detail->id) }}" class="btn btn-sm green">Release w/out PAR</a>
                                                                    @endif
                                                                </td>
                                                                <td>{{ $detail->itemDesc }}</td>
                                                                <td>{{ $detail->itemColor }}</td>
                                                                <td>{{ $detail->itemSize }}</td>
                                                                <td>{{ $detail->remarks }}</td>
                                                                <td width="40%">
                                                                    <select class="form-control select2me" id="itemzz{{$detail->id}}" name="item{{$detail->id}}" data-placeholder="Select...">
                                                                        <option></option>
                                                                        @foreach( $items as $item )
                                                                            <option value="{{$item->id}}">{{ $item->code }} - {{ $item->name }}</option>
                                                                        @endforeach  
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <select class="form-control" name="ccode{{$detail->id}}">
                                                                        <option value="365" selected>6.06.36.097.501</option>
                                                                        @foreach( $costcodes as $code )
                                                                            <option value="{{$code->name}}">{{ $code->name }}</option>
                                                                        @endforeach  
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    
                                                                    <div class="form-group">
                                                                    <select class="form-control" name="qty{{$detail->id}}">
                                                                        @if($bal>0)
                                                                            @for($x=1; $x<=$bal; $x++)
                                                                                <option value="{{$x}}" @if($bal == $x) selected @endif>{{ $x }}</option>
                                                                            @endfor
                                                                        @endif
                                                                    </select>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <input type="checkbox" name="deduction{{$detail->id}}" class="form-control">
                                                                </td>
                                                            </tr>
                                                            @endif
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                    </div>

                                </div>              
                                
                            </div>

                            <div class="form-actions right">
                                <a href="{{ route('transactions') }}"><button type="button" class="btn default">Cancel</button></a>
                                <button type="button" id="save-ppe" class="btn blue"><i class="fa fa-check"></i> Save</button>
                            </div>
                        </form>
                        <!-- END FORM-->
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
    
    
    <script type="text/javascript">
        var initPickers = function () {
            //init date pickers
            $('.date-picker').datepicker({
                rtl: Metronic.isRTL(),
                autoclose: true
            });
        }
        initPickers();

        $('#save-ppe').click(function(e) {

            e.preventDefault();
            let no_selected_item  = false;

            if($('.e_items_table > tr').length > 0) {
                console.log('woot');
                $('.e_items_table > tr').each(function(index, tr) {
                    let e_item_id = $(tr).data('id');
                    console.log(e_item_id);
                    if( typeof e_item_id !== 'undefined' ) {
                        console.log('defined');
                        if( $('#itemzz'+e_item_id).val() == 0 ) {
                            no_selected_item = true;
                        }

                    }

                });
            }

            if(no_selected_item){ 
                alert('Please select the requested item');
                return false 
            }

            $('#ppe-create').submit();

        });

    </script>

@endsection
