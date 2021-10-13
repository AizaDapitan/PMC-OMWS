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
        ul {
            padding: 0;
        }
        ul li {
            list-style: none;
        }
    </style>

@endsection

@section('content')

    <div class="row">

        <div class="col-md-12">

            <h3 class="page-title"> Locations Maintenance </h3>

            <ul class="page-breadcrumb breadcrumb">
                <li> 
                    <a class="btn blue" data-toggle="modal" data-backdrop="static" href="#modalAdd" style="color:white;">Add New</a>
                </li>
            </ul>

            <div class="portlet box blue">

                <div class="portlet-title">
                    <div class="caption">
                        <i class=" icon-list"></i> List of Locations
                    </div>
                            
                </div>

                <div class="portlet-body">

                    <form method="get" action="{{ route('maintenance.locations.index') }}">
                        <table width="100%">
                            <tr>
                                <td>Search:<input type="hidden" name="action" value="search"></td>
                                <td><input type="text" name="searchtxt" id="searchtxt" class="form-control input " placeholder="Enter any part of location.."></td>                                 
                                <td align="left"><input type="submit" class="btn purple" value="Search"> </td>                                  
                            </tr>
                        </table>
                    </form>

                    <div class="table-scrollable">
                        
                        <table class="table table-hover">

                            <thead>
                                <tr>    
                                    <th>Edit</th>                                 
                                    <th>Name</th>
                                    <th>Cost Codes</th>                                
                                    <th>Assign New</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse( $locations as $location )
                                    <tr>
                                        <td> <a data-toggle="modal" class="edit_item" data-backdrop="static" 
                                                href="#modalEdit" data-href="{{ route('maintenance.locations.update', $location->id) }}" 
                                                data-name="{{ $location->name }}"> 
                                                <i class="fa fa-pencil"></i>
                                        </a></td>
                                        <td> {{ $location->name }} </td>
                                        <td>
                                          <ul id="attach-locations{{$location->id}}">
                                                @foreach( $location->costcode as $costcode)
                                                <li><a href="#" style="color: red;" class="remove-location-costcode" data-locid="{{$location->id}}" data-id="{{$costcode->id}}"> x </a><span>{{ $costcode->name }}</span></li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td> 
                                            <select id="costcode-{{$location->id}}">
                                            @foreach( $costcodes as $costcode1 )
                                                <option value="{{$costcode1->id}}">{{ $costcode1->name }}</option>
                                            @endforeach
                                            </select>
                                            <button class="btn blue btn-xs add_costcode" data-id="{{ $location->id }}">Go</button>
                                        </td>
                                        <td>
                                            <form method="post" action="{{ route('maintenance.locations.update', $location->id) }}">
                                                @csrf
                                                @method('PATCH')
                                                @if( $location->isActive )
                                                    <input type="hidden" name="isActive" value="0">
                                                    <button type="submit" class="btn red btn-xs">Deactivate</button>
                                                @else
                                                    <input type="hidden" name="isActive" value="1">
                                                    <button type="submit" class="btn blue btn-xs">Activate</button>
                                                @endif
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" style="text-align: center;"> No Location Found </td>
                                    </tr>
                                @endforelse
                            </tbody>

                        </table>

                    </div>

                </div>
                
                <div class="col-md-6" style="margin-top: 10px; padding-top: 10px;">
                    Items {{ $locations->firstItem() }} - {{ $locations->lastItem() }}                        
                </div> 

                <div class="col-md-6 text-right">
                    {{ $locations->withQueryString()->links() }}                        
                </div>   

             </div>

        </div>

    </div>

    <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" action="{{ route('maintenance.locations.store') }}">
                @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modal_title">Add New Location</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            
                <div class="modal-body">

                    <table width="100%">
                        
                        <tr>
                            <td width="150"><label>Name:</label></td>
                            <td><input type="text" name="name" class="form-control col-md-4 input inline" required></td>                                       
                        </tr>
                        
                    </table>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="modal_action">Save Location</button>
                </div>
            </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" id="edit_form">
                @csrf
                @method('PATCH')
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modal_title">Edit Location</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            
                <div class="modal-body">

                    <table width="100%">
                        
                        <tr>
                            <td width="150"><label>Name:</label></td>
                            <td><input type="text" id="edit_name" name="name" class="form-control col-md-4 input inline" required></td>                                       
                        </tr>
                        
                    </table>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="modal_action">Update Location</button>
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

$(document).ready(function() {

$('.edit_item').click(function () {

let route = $(this).data('href');
let name = $(this).data('name');

$('#edit_form').attr('action', route);
$('#edit_name').val(name);

});

$(document).on('click', '.add_costcode' , function(e){

e.preventDefault();

let exist = false;
let location_id = $(this).data('id');
let costcode_id = $('#costcode-'+location_id).val();
let costcode_name = $('#costcode-'+location_id+" option:selected").text();
let location_index = "{!! route('maintenance.locations.index') !!}";

let url = location_index + "/" + location_id + "/costcode/" + costcode_id + "/insert";
let delete_url = location_index + "/" + location_id + "/costcode/" + costcode_id + "/remove";

$('#attach-locations'+location_id+ " li").each(function(i, val){
if( costcode_name == $(this).find("span").text().trim()) {
alert("cost code already added");
exist = true; 
return false;
}
});

if(exist) { return false; }

$.ajax({

type: "GET",

data: {"_token": "{{ csrf_token() }}"},

url: url,

success: function(data){

if(data == 'yes') {
$('#attach-locations'+location_id).append('<li><a href="'+delete_url+'" class="remove-location-costcode" data-locid="'+location_id+'" data-id="'+costcode_id+'" style="color:red;">x</a> <span> '+costcode_name+'</span> </li>');
}

}

});

});


$(document).on('click', '.remove-location-costcode', function(e){

e.preventDefault();

let _that = this;
let location_id = $(this).data('locid');
let costcode_id = $(this).data('id');

let location_index = "{!! route('maintenance.locations.index') !!}";

let delete_url = location_index + "/" + location_id + "/costcode/" + costcode_id + "/remove";

$.ajax({

type: "GET",

data: {"_token": "{{ csrf_token() }}"},

url: delete_url,

success: function(data){

if(data == 'yes') {
$(_that).parent().remove();
}

}

});

});

})

</script>


@endsection
