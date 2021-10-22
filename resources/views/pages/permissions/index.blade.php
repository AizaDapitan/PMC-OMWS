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

            <h3 class="page-title"> Permission Maintenance </h3>

            <ul class="page-breadcrumb breadcrumb">
                <li> 
                    @if($create)
                        <a class="btn blue" data-toggle="modal" data-backdrop="static" href="#modalAdd" onclick="addPermission()" style="color:white;">Add New</a>   
                    @else
                        <button disabled class="btn blue" data-toggle="modal" data-backdrop="static" href="#modalAdd" onclick="addPermission()" style="color:white;">Add New</button>   
                     @endif                 
                </li>
            </ul>

            <div class="portlet box blue">

                <div class="portlet-title">
                    <div class="caption">
                        <i class=" icon-list"></i> List of Permissions
                    </div>
                            
                </div>

                <div class="portlet-body">

                    <form method="get" action="{{ route('maintenance.permissions.index') }}">
                        <table width="100%">
                            <tr>
                                <td>Search:<input type="hidden" name="action" value="search"></td>
                                <td><input type="text" name="searchtxt" id="searchtxt" class="form-control input " placeholder="Enter Description"></td>                                 
                                <td align="left"><input type="submit" class="btn purple" value="Search"> </td>                                  
                            </tr>
                        </table>
                    </form>

                    <div class="table-scrollable">
                        
                        <table class="table table-hover">

                            <thead>
                                <tr>                                    
                                    <th>Module</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($permissions as $permission)
                                    <tr>
										<td>
											{{ strtoupper($permission->module_type) }}
										</td>
                                        <td>{{ ($permission->description) }}</td>                
                                        <td> 
                                            @if($permission->active)
                                            <i class="font-blue"> Active</i>
                                            @else
                                            <i class="font-red"> Inactive</i>
                                            @endif
                                        </td>
                                        <td>
                                            @if($edit)
                                                <a href="#" class="btn btn-success btn-xs edit_item" onclick="update_permission('{{$permission->id}}','{{$permission->module_type}}','{{$permission->description}}','{{$permission->active}}')">Edit </a>
                                            @else
                                                <button disabled href="#" class="btn btn-success btn-xs edit_item" onclick="update_permission('{{$permission->id}}','{{$permission->module_type}}','{{$permission->description}}','{{$permission->active}}')">Edit </button>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="4"> No permissions Found </td>
                                    </tr>
                                @endforelse
                            </tbody>

                        </table>

                    </div>

                </div>
                
                <div class="col-md-6" style="margin-top: 10px; padding-top: 10px;">
                    Items {{ $permissions->firstItem() }} - {{ $permissions->lastItem() }}                        
                </div> 

                <div class="col-md-6 text-right">
                    {{ $permissions->withQueryString()->links() }}                        
                </div>   

             </div>

        </div>

    </div>

    <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" action="{{ route('maintenance.permissions.store') }}">
                @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modal_title">Add New Permission</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            
                <div class="modal-body">

                    <table width="100%">
                        
                        <tr>
                            <td width="150"><label>Status:</label></td>
                            <td><input type="checkbox" name="active" id="active"></td>                                     
                        </tr>                    
                        <tr>
                            <td width="150"><label>Module <span class="required" aria-required="true"> * </span></label></td>
                            <td>
                                <select required name="module_type" id="module_type" class="form-control"> 
                                    @foreach($modules as $module)
                                        <option value="{{ $module['description'] }}">{{ $module['description'] }}</option>
                                    @endforeach
                                </select>                                
                            </td>
                        </tr>
                        <tr>
                            <td width="150"><label>Description <span class="required" aria-required="true"> * </span></label></td>
                            <td><input type="text" class="form-control" id="description" name="description" placeholder="Description" required maxlength="50"></td>
                        </tr>

                    </table>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="modal_action">Save Permission</button>
                </div>
            </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" action="{{ route('maintenance.permissions.update') }}">
                @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modal_title">Update Permission</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            
                <div class="modal-body">
                    <input type="hidden" name="nameid" id="nameid">
                    <table width="100%">
                        
                        <tr>
                            <td width="150"><label>Status:</label></td>
                            <td><input type="checkbox" name="edit_active" id="edit_active"></td>
                        </tr>
                        <tr>
                            <td width="150"><label>Module <span class="required" aria-required="true"> * </span></label></td>
                            <td>
                                <select required name="module_type" id="edit_module_type" class="form-control"> 
                                    @foreach($modules as $module)
                                        <option value="{{ $module['description'] }}">{{ $module['description'] }}</option>
                                    @endforeach
                                </select>                                
                            </td>
                        </tr>
                        <tr>
                            <td width="150"><label>Description <span class="required" aria-required="true"> * </span></label></td>
                            <td><input class="form-control" type="text" name="description" id="edit_description" placeholder="Description" required maxlength="50"></td>
                        </tr>                                                
                    </table>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="modal_action">Update Permission</button>
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
            
		function update_permission(id,module_type,description,status)
		{
			if (status == "1")
			{				
				document.getElementById('edit_active').checked = true;
			}
			else
			{
				document.getElementById('edit_active').checked = false;
			}

			$('#nameid').val(id);			
			$('#edit_module_type').val(module_type);
			$('#edit_description').val(description);
			$('#modalEdit').modal('show');
		}


		function addPermission() 
		{										
			$('#nameid').val('');
			$('#module_type').val('');
			$('#description').val('');			
		}        

    </script>

@endsection
