@extends('layouts.app')

@section('pageCSS')

    <link href="google.css" rel="stylesheet" type="text/css"/>
    <link href="/themes/metronic/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="/themes/metronic/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
    <link href="/themes/metronic/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="/themes/metronic/assets/global/plugins/select2/select2.css"/>
    <link href="/themes/metronic/assets/global/css/components.css" rel="stylesheet" type="text/css"/>
    <link href="/themes/metronic/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
    <link href="/themes/metronic/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
    <link id="style_color" href="/themes/metronic/assets/admin/layout/css/themes/default.css" rel="stylesheet" type="text/css"/>
    <link href="/themes/metronic/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
    <link href="/themes/metronic/assets/global/plugins/bootstrap-datepicker/css/datepicker.css"/ rel="stylesheet" type="text/css">

@endsection

@section('content')

    <div class="row">

        <div class="col-md-12">

            <div class="portlet box blue">

                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>Add Form
                    </div>                    
                </div>

                    <div class="portlet-body form">
                        
                        <!-- BEGIN FORM-->
                        <form action="{{ route('transaction.store') }}" id="trans-store" method="POST" class="horizontal-form" 
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="itemss" id="itemss">
                            <input type="hidden" name="t1" id="t1" value="{{ old('t1','[]') }}">
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
                                                                    <select class="form-control select2me" name='contractor' id="contractor" data-placeholder="Select..." onchange="getLocation($(this).val())">
                                                                            <option value=""></option>
                                                                        @foreach( $contractors as $contractor )
                                                                            <option value="{{ $contractor->id }}" @if(old('contractor') == $contractor->id) selected @endif>{{ $contractor->code }} - {{ $contractor->lname }}, {{ $contractor->fname }} {{ $contractor->mname }}</option>
                                                                        @endforeach
                                                                    </select>  
                                                                    </div>
                                                                </td>                                                       
                                                            </tr>
                                                            <tr>
                                                                <td valign="top">Location:&nbsp;&nbsp;&nbsp;</td>
                                                                <td id="loclist">
                                                                    
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td valign="top">Date:</td>
                                                                <td>
                                                                    
                                                                    <div class="form-group">                                                                                
                                                                        <div class="input-group date date-picker margin-bottom-5" data-date-format="yyyy-mm-dd" data-date-start-date="">
                                                                            <input type="text" class="form-control form-filter" readonly name="docdate" id="docdate" value="{{ old('docdate',date('Y-m-d')) }}">
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
                                                                    @endif

                                                                <br><br>
                                                                </td>                                                       
                                                            </tr>                                                           
                                                            <tr>
                                                                <td valign="top">Files:&nbsp;&nbsp;&nbsp;</td>
                                                                <td>
                                                                    <input type="file" id="file" name="file" accept="image/*" /> <br>
                                                                </td>                                                       
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <td width="50%" valign="top" style="padding-right:50px;padding-left:20px;">
                                                        <table width="100%">               
                                                            <tr>
                                                                <td valign="top">MWS#:&nbsp;&nbsp;&nbsp;<span style="color: red;">*</span></td>
                                                                <td>
                                                                    <input class="form-control" name="mws" id="mws" value="{{ old('mws') }}">
                                                                <br>
                                                                </td>                                                       
                                                            </tr>
                                                            <tr>
                                                                <td valign="top">Receiver:&nbsp;&nbsp;&nbsp;<span style="color: red;">*</span></td>
                                                                <td>                                              
                                                                    <select class="form-control select2me receivers" name='receiver' id="receiver" data-placeholder="Select...">
                                                                        <option></option>
                                                                        @foreach( $receivers as $receiver )
                                                                            <option value="{{$receiver->name}}" @if(old('receiver') == $receiver->name) selected @endif>{{ $receiver->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <a class="btn green btn-sm" data-toggle="modal" href="#receiverdetails"> Add new receiver <i class="fa fa-plus"></i> </a>
                                                                     {{--  <a class="btn green btn-sm" data-toggle="modal" href="#receiverdetails"> Add Receiver <i class="fa fa-plus"></i> </a>
                                                                    <input type="hidden" name="is_new_r" id="is_new_r">
                                                                    <input style="display:none;" class="form-control receiveri" name="receiveri" id="receiveri" value="{{ old('receiveri') }}" placeholder="Enter new receiver here..">
                                                                    <a href="#" id="recopt">Add new receiver</a>
                                                                    <a href="#" style="display:none;" id="erecopt">Select from existing receiver</a>  --}}  

                                                                <br><br>                                                                
                                                                </td>     

                                                            </tr>
                                                            <tr>
                                                                <td valign="top">Approver:&nbsp;&nbsp;&nbsp;<span style="color: red;">*</span></td>
                                                                <td>                    
                                                                    <select class="form-control select2me" name='approver' id="approver" data-placeholder="Select...">
                                                                        <option></option>
                                                                        @foreach( $approvers as $approver )
                                                                            <option value="{{ $approver->name }}" @if( old('approver') == $approver->name) selected @endif>{{ $approver->name }}</option>
                                                                        @endforeach
                                                                    </select>                                                   
                                                                <br><br>
                                                                </td>                                                       
                                                            </tr>
                                                            <tr>
                                                                <td valign="top">Issuer:&nbsp;&nbsp;&nbsp;<span style="color: red;">*</span></td>
                                                                <td>
                                                                    <input class="form-control" name="issuer" id="issuer" value="{{ old('issuer') }}">                                                                                  
                                                                <br><br>
                                                                </td>                                                       
                                                            </tr>
                                                            <tr>
                                                                <td valign="top">Remarks:&nbsp;&nbsp;&nbsp;</td>
                                                                <td>
                                                                    <textarea class="form-control" name="remarks" id="remarks" rows="5">{{ old('remarks') }}</textarea>     
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
                            
                                <h3 class="form-section" id="search-item-wrapper">Items</h3>
                                <div class="row">

                                    <div class="col-md-5 ">
                                        <div class="portlet box green-meadow">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-search"></i>Search from existing items
                                                </div>
                                                <div class="tools">
                                                                                                   
                                                </div>
                                            </div>
                                            <div class="portlet-body form">
                                                <div class="table-container">
                                                    <table class="table table-striped table-bordered table-hover">
                                                        <tr>
                                                            <td>
                                                                <input type="hidden" id="nxtid" name="nxtid" value="">
                                                                <input type="text" name="searchtxtp" id="searchtxtp" class="form-control margin-bottom-10" placeholder="Search anything..">
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <div id="search_result">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-7 ">
                                        <div class="portlet box blue">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-shopping-cart"></i>Added Items
                                                </div>
                                                
                                            </div>
                                            <div class="portlet-body form">
                                                <div class="table-container">                                                       
                                                    <div id="div_item">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>              
                                
                            </div>
                            <div class="form-actions right">
                                <a href="{{ route('transactions') }}"><button type="button" class="btn default">Cancel</button></a>
                                <button type="button" id="trans-create" class="btn blue"><i class="fa fa-check"></i> Save</button>
                            </div>
                        </form>
                        <!-- END FORM-->
                    </div>

            </div>

        </div>

        {{-- <div class="modal fade" id="receiverdetails" tabindex="-1" role="basic" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #0480be; ">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title" style="color: #5C2018"><i class="icon-list"></i> Receiver Details</h4>
                    </div>
                    <div class="modal-body">
                        <form action="sequence/fabricated-store" method="POST">
                            <input type="hidden" class="form-control" name="created_by" value="{{ Auth::user()->username }}" readonly>
                            <input type="hidden" class="form-control" name="is_fabricated" value="1" readonly>
                            <input type="hidden" class="form-control" name="is_open" value="1" readonly>
                            @csrf
                            <div class="form-group" style="align-self: center;">
                                 <div class="form-group row">
                                    <div class="col-md-12">
                                        <label class="control-label" style="font-size: 13px" ><strong>Note:</strong> Please follow the formatting to have uniform data selection. Example: Dalisay, Cardo Bonifacio (Surname, Firstname Middlename). </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label class="control-label" style="font-size: 13px" >Fullname: </label>
                                        <input type="text" class="form-control" placeholder="Enter Receiver Fullname" id="rname" name="rname" value="{{ isset($_GET['name']) ? $_GET['name'] : '' }}" ><span></span>
                                    </div>
                                </div>                               
                                <div class="modal-footer">
                                    <button type="submit" class="btn green">Save </button>
                                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="modal fade" id="receiverdetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" action="{{ route('maintenance.receivers.rstore') }}">
                @csrf
            <div class="modal-content">
                <div class="modal-header" style="background-color: #0480be; ">
                    <h4 class="modal-title" style="color: #5C2018"><i class="icon-list"></i> Receiver Details</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            
                <div class="modal-body">

                    <table width="100%">
                        
                        <tr>
                            <td width="150"><label>Last Name:</label></td>
                            <td><input type="" name="lname" class="form-control col-md-4 input inline" placeholder="Last Name" required></td>                                       
                        </tr>
                        <tr>
                            <td width="150"><label>First Name:</label></td>
                            <td><input type="" name="fname" class="form-control col-md-4 input inline" placeholder="First Name" required></td>                                      
                        </tr>
                        <tr>
                            <td width="150"><label>Middle Name:</label></td>
                            <td><input type="" name="mname" class="form-control col-md-4 input inline" placeholder="Middle Name" required></td>                                     
                        </tr>
                        <tr>
                            <td width="150"><label></label></td>
                            <td><label class="label-control" style="font-size: 10px; color: blue"> Note: Extension names such as JR, SR, III, IV etc should be put adjacent next to first name (e.i: Jose Jr). Thank you!</label></td>                                      
                        </tr>

                    </table>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="modal_action">Save Receiver</button>
                </div>
            </div>
            </form>
        </div>
    </div>

    </div>

    

@endsection

@section('pageJS')
    
    <script src="/themes/metronic/assets/global/plugins/jquery-1.11.0.min.js" type="text/javascript"></script>
    <script src="/themes/metronic/assets/global/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
    <script src="/themes/metronic/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="/themes/metronic/assets/global/plugins/select2/select2.min.js"></script>
    <script src="/themes/metronic/assets/global/scripts/metronic.js" type="text/javascript"></script>
    <script src="/themes/metronic/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
    <script src="/themes/metronic/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
    <script src="/themes/metronic/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

    <script type="text/javascript">

        var costCodes = [];
        var trans_item = [];
        var initPickers = function () {
            //init date pickers
            $('.date-picker').datepicker({
                rtl: Metronic.isRTL(),
                autoclose: true
            });
        }
        initPickers();

        var getLocation = function(contractorID) {
            if(contractorID == "") { contractorID = 0; }
            $.ajax({
               type:'GET',
               url:'/api/contractor-locations/'+contractorID,
               data:'_token = <?php echo csrf_token(); ?>',
               success:function(data) {

                    let options = "";
                    if(data.length>0) {
                        options += "<div class='form-group'><select class='form-control select2me' name='location' id='location' data-placeholder='Select...'><option value='0'>Select Location</option>";
                        $.each(data, function(i, val) {
							if(val.pivot.isActive == 1) {
								options +="<option value='"+val.id+"'>"+val.name+"</option>"
							}
                        });
                        options +="</select></div>";
                    } else {
                        options +='<div class="alert alert-warning alert-dismissable">';
                        options +='<button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>';
                        options +='<strong>No Location Assigned!</strong> Please contact mine engineering dept.</div>'; 
                    }

                    $('#loclist').html(options);

               }
            });
        }

        $('#contractor').change();

        $('#searchtxtp').keyup(function() {

            //getLocation($('#contractor').val());

            if( $('#location').length == 0 ) {
                alert('Please select a location first');
                return false;
            }

            let itemname = $(this).val();

            $.ajax({
               type:'GET',
               url:'/api/get-item/'+itemname,
               data:'_token = <?php echo csrf_token(); ?>',
               success:function(data) {
                    let result = "";

                        result += '<div class="table-container">';
                        result += '<table class="table" id="sample_1">'
                        result += '<thead>';
                        result += '<tr style="font: 11px arial, sans-serif;">'                  
                        result += '<th>Code</th>';
                        result += '<th>Description</th>';                    
                        result += '<th class="table-checkbox">&nbsp;</th>';                  
                        result += '</tr></thead><tbody>';

                    if(data.length>0) {

                        $.each(data, function(i, val) {
                            result += '<tr>';
                            result += '<td>'+val.code+'</td>';
                            result += '<td>'+val.name+'</td>';
                            result += '<td><a href="#search-item-wrapper" class="add_item" data-itemcode="'+val.code+'" data-itemname="'+val.name+'" data-itemid="'+val.id+'"><i class="fa fa-plus"></i></a></td>';
                            result += '</tr>';
                        });

                        

                    } else {

                        result += '<tr><td colspan="3" style="text-align:center;">No Items Found</td></tr>';

                    }

                    result += '</tbody></table>';

                    $('#search_result').html(result);

               }
            });

        });

        $(document).on('click', '.add_item', function() {

            let code = $(this).data('itemcode');
            let name = $(this).data('itemname');
            let id   = $(this).data('itemid');

            if($('#added_items_table').length==0) {

                let table = "";
                    table += '<table class="table" id="added_items_table"><thead><tr><th></th><th>Code</th><th>Description</th><th>Cost Code</th><th>Qty</th>';
                    table += '<th>Deduction</th></tr></thead><tbody id="new_itemm"></tbody>';
                    table += '</table>'; 

                $('#div_item').append(table);  

            } 

            if( $("#itemz"+id).length > 0 ) {
                let newVal = parseInt($("#newwQTY"+id).val());
                $('#newwQTY'+id).val(newVal+1);
                return false;
            }

            let ccodess = '';
                ccodess += '<select class="form-control" id="newwCCODE'+id+'" name="ccodes'+id+'">';
                ccodess += '<option value="0">Select Costcode</option>';
                $.each(costCodes, function(i, val){
                    ccodess += '<option value="'+val.name+'">'+val.name+'</option>';
                });
                ccodess += '</select>';

            let item = '<tr id="itemz'+id+'" data-id="'+id+'">';
                item += '<td><a href="#search-item-wrapper" class="remove_item"><i class="fa fa-times" ></i></a></td>';
                item += '<td id="newwCODE'+id+'">'+code+'<input type="hidden" name="item__id'+id+'" value="'+id+'"></td>';
                item += '<td id="newwNAME'+id+'">'+name+'</td>';
                item += '<td>'+ccodess+'</td>';
                item += '<td><input type="text" name="qty'+id+'" id="newwQTY'+id+'" class="form-control" style="text-align:right;"> </td>';
                item += '<td style="text-align:center;"><input type="checkbox" id="newwDEDUC'+id+'" name="is_deducted'+id+'"></td>';
                item += '</tr>';

            $('#added_items_table tbody').append(item);

            trans_item.push(id);
            $('#itemss').val(trans_item);

        });

        $(document).on('change', '#location', function() {
            costCodes = [];
            $.ajax({
               type:'GET',
               url:'/api/location-costcodes/'+$(this).val(),
               data:'_token = <?php echo csrf_token(); ?>',
               success:function(data) {
                    costCodes = data;
               }
            });

        });


        $(document).on('click', '.remove_item', function() {
            $(this).closest('tr').remove();
        });

        $('#recopt').click(function() {
            $('#receiveri').show();
            $('#receiver').hide();
            $('#s2id_receiver').hide();
            $('#erecopt').show();
            $('#recopt').hide();
            $('#is_new_r').val(1);
        });

        $('#erecopt').click(function(){
            $('#receiveri').hide();
            $('#is_new_r').val(0);
            $('#receiver').show();
            $('#s2id_receiver').show();
            $('#erecopt').hide();
            $('#recopt').show();
        });

        $('#trans-create').click(function(e) {
            console.log("AA");

            let new_item_data = [];
            let new_item_has_ccode = true;

            if($('#new_itemm > tr').length > 0) {
                $('#new_itemm > tr').each(function(index, tr) {
                    let e_item_id = $(tr).data('id');
                    console.log(e_item_id);
                    if( typeof e_item_id !== 'undefined' ) {

                        let data = {
                            id            : e_item_id ,
                            code          : $('#newwCODE'+e_item_id).text().trim() ,
                            name          : $('#newwNAME'+e_item_id).text().trim() ,
                            costcode      : $('#newwCCODE'+e_item_id).val() ,
                            qty           : $('#newwQTY'+e_item_id).val() ,
                            is_deducted   : $('#newwDDUC'+e_item_id).prop('checked') ? 1:0
                        };
                        if( $('#newwCCODE'+e_item_id).val() == 0 ) {
                            new_item_has_ccode = false;
                        }
                        new_item_data.push(data);

                    }

                });
            }

            $('#t1').val(JSON.stringify(new_item_data));

            if( !new_item_has_ccode ) {
                alert('Your new added item doesnt have a cost code');
                return false;
            }

            $('#trans-store').submit();

        });

        (function(){

            let new_added_items = JSON.parse($('#t1').val());

            if(new_added_items.length > 0) {

                if($('#added_items_table').length==0) {

                    let table = "";
                        table += '<table class="table" id="added_items_table"><thead><tr><th></th><th>Code</th><th>Description</th><th>Cost Code</th><th>Qty</th>';
                        table += '<th>Deduction</th></tr></thead><tbody id="new_itemm"></tbody>';
                        table += '</table>'; 

                    $('#div_item').append(table);  

                } 

                $.each(new_added_items, function(i, b) {

                    let ccodess = '';
                        ccodess += '<select class="form-control" id="newwCCODE'+b.id+'" name="ccodes'+b.id+'">';
                        ccodess += '<option value="0">Select Costcode</option>';
                        $.each(costCodes, function(c, val){
                            if( b.costcode == val.name ) {
                                ccodess += '<option value="'+val.name+'" selected>'+val.name+'</option>';
                            } else {
                                ccodess += '<option value="'+val.name+'">'+val.name+'</option>';
                            }
                        });
                        ccodess += '</select>';

                    let item = '<tr id="itemz'+b.id+'" data-id="'+b.id+'">';
                        item += '<td><a href="#search-item-wrapper" class="remove_item"><i class="fa fa-times" ></i></a></td>';
                        item += '<td id="newwCODE'+b.id+'">'+b.costcode+'<input type="hidden" name="item__id'+b.id+'" value="'+b.id+'"></td>';
                        item += '<td id="newwNAME'+b.id+'">'+b.name+'</td>';
                        item += '<td>'+ccodess+'</td>';
                        item += '<td><input type="text" name="qty'+b.id+'" id="newwQTY'+b.id+'" class="form-control" value="'+b.qty+'" style="text-align:right;"> </td>';
                        item += '<td style="text-align:center;">';
                        if( b.is_deducted ){
                        item += '<input type="checkbox" id="newwDEDUC'+b.id+'" name="is_deducted'+b.id+'" checked></td>';
                        }  else {
                            item += '<input type="checkbox" id="newwDEDUC'+b.id+'" name="is_deducted'+b.id+'"></td>';
                        }
                        item += '</tr>';

                    $('#added_items_table tbody').append(item);

                });

            }

        })();
       
        
    </script>

@endsection
