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

            <h3 class="page-title"> Cost Code Maintenance </h3>

            <ul class="page-breadcrumb breadcrumb">
                <li> 
                    <a class="btn blue" data-toggle="modal" data-backdrop="static" href="#modalAdd" style="color:white;">Add New</a>
                </li>
            </ul>

            <div class="portlet box blue">
                
                <div class="portlet-title">
                
                    <div class="caption">
                        <i class=" icon-list"></i>List Of Cost Codes
                    </div>
                            
                </div>

                <div class="portlet-body">

                    <form method="get" action="{{ route('maintenance.costcodes.index') }}">
                        <table width="100%">
                            <tr>
                                <td>Search:<input type="hidden" name="action" value="search"></td>
                                <td><input type="text" name="searchtxt" id="searchtxt" class="form-control input " placeholder="Enter any part of costcode.."></td>
                                <td align="left"><input type="submit" class="btn purple" value="Search"> </td>                                  
                            </tr>
                        </table>
                    </form>

                    <div class="table-scrollable">
                        
                        <table class="table table-hover">

                            <thead>
                                <tr>                                    
                                    <th>Action</th>
                                    <th>Code</th>                                   
                                    <th>Description</th>
                                    <th>Status</th>                     
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($costcodes as $costcode)
                                    <tr>
                                        <td><a class="edit_item" data-toggle="modal" data-backdrop="static" href="#modalEdit" 
                                            data-href="{{ route('maintenance.costcodes.update', $costcode->id) }}" data-name="{{ $costcode->name }}"
                                            data-description="{{ $costcode->description }}"> 
                                            <i class='fa fa-pencil'></i>
                                        </a></td>
                                        <td>{{ $costcode->name }}</td>
                                        <td>{{ $costcode->description }}</td>
                                        <td>
                                            <form action="{{ route('maintenance.costcodes.update', $costcode->id) }}" method="POST">
                                                @csrf
                                                @method('patch') 
                                                @if( $costcode->isActive )
                                                    <input type="hidden" name="isActive" value="0">
                                                    <button type="submit" class="btn red btn-xs"> Deactivate </button>
                                                @else
                                                    <input type="hidden" name="isActive" value="1">
                                                    <button type="submit" class="btn blue btn-xs"> Activate </button>
                                                @endif
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="4"> No Cost Code Found </td>
                                    </tr>
                                @endforelse
                            </tbody>

                        </table>

                    </div>

                </div>

                <div class="col-md-6" style="margin-top: 10px; padding-top: 10px;">
                    Items {{ $costcodes->firstItem() }} - {{ $costcodes->lastItem() }}                        
                </div> 

                <div class="col-md-6 text-right">
                    {{ $costcodes->withQueryString()->links() }}                        
                </div>   

            </div>

        </div>

    </div>

    <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" action="{{ route('maintenance.costcodes.store') }}">
                @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modal_title">Add New Costcode</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            
                <div class="modal-body">

                    <table width="100%">
                        <tr>
                            <td width="150"><label>Code:</label></td>
                            <td><input type="text" name="name" class="form-control col-md-4 input inline" placeholder="Code"></td>                                      
                        </tr>
                        <tr>
                            <td width="150"><label>Description:</label></td>
                            <td>
                                <textarea name="description" class="form-control col-md-4 input inline" placeholder="Description" rows="5"></textarea>
                            </td>
                        </tr>
                    </table>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="modal_action">Save Costcode</button>
                </div>
            </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" action="" id="form_item_edit">
                @csrf
                @method('patch')
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modal_title">Edit Costcode</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            
                <div class="modal-body">

                    <table width="100%">
                        <tr>
                            <td width="150"><label>Code:</label></td>
                            <td><input type="text" id="edit_name" name="name" class="form-control col-md-4 input inline" placeholder="Code"></td>                                      
                        </tr>
                        <tr>
                            <td width="150"><label>Description:</label></td>
                            <td>
                                <textarea id="edit_description" name="description" class="form-control col-md-4 input inline" placeholder="Description" rows="5"></textarea>
                            </td>
                        </tr>
                    </table>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="modal_action">Update Costcode</button>
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
        
        $(document).ready(function() {

            $('.edit_item').click(function() {

                let route = $(this).data('href');
                let name = $(this).data('name');
                let description = $(this).data('description');

                $('#edit_name').val(name);
                $('#edit_description').val(description);
                $('#form_item_edit').attr('action',route);

            });          

        });

    </script>

@endsection
