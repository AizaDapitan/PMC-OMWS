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

            <h3 class="page-title"> Approver Maintenance </h3>

            <ul class="page-breadcrumb breadcrumb">
                <li> 
                    @if($create)
                        <a class="btn blue" data-toggle="modal" data-backdrop="static" href="#modalAdd" onclick="addApprover()" style="color:white;">Add New</a>    
                    @else
                        <button disabled class="btn blue" data-toggle="modal" data-backdrop="static" href="#modalAdd" onclick="addApprover()" style="color:white;">Add New</button>
                    @endif                
                </li>
            </ul>

            <div class="portlet box blue">

                <div class="portlet-title">
                    <div class="caption">
                        <i class=" icon-list"></i> List of Approvers
                    </div>
                            
                </div>

                <div class="portlet-body">

                    <form method="get" action="{{ route('maintenance.approvers.index') }}">
                        <table width="100%">
                            <tr>
                                <td>Search:<input type="hidden" name="action" value="search"></td>
                                <td><input type="text" name="searchtxt" id="searchtxt" class="form-control input " placeholder="Enter Name"></td>                                 
                                <td align="left"><input type="submit" class="btn purple" value="Search"> </td>                                  
                            </tr>
                        </table>
                    </form>                

                    <div class="table-scrollable">
                        
                        <table class="table table-hover">

                            <thead>
                                <tr>                                                   
                                    <th>Name</th>                                                                        
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($approvers as $approver)
                                    <tr>
										<td>
                                            {{ $approver->name }}
										</td>             
                                        <td> 
                                            @if($edit)
                                                @if($approver->isActive)
                                                    <a href="#" class="btn btn-success btn-xs edit_item" onclick="update_approver('{{$approver->id}}','{{$approver->name}}')">Edit </a>
                                                    <a href="#" class="btn btn-xs red" onclick="change_status('{{$approver->id}}',0)">Deactivate</a>                                            
                                                @else
                                                    <a href="#" class="btn btn-xs green" onclick="change_status('{{$approver->id}}',1)">Activate</a>
                                                @endif
                                            @else
                                                @if($approver->isActive)
                                                    <button disabled href="#" class="btn btn-success btn-xs edit_item">Edit </button>
                                                    <button disabled href="#" class="btn btn-xs red" onclick="change_status('{{$approver->id}}','INACTIVE')">Deactivate</button>                                                
                                                @else
                                                    <button disabled href="#" class="btn btn-xs green" onclick="change_status('{{$approver->id}}','ACTIVE')">Activate</button>
                                                @endif
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="4"> No approvers Found </td>
                                    </tr>
                                @endforelse
                            </tbody>

                        </table>

                    </div>

                </div>
                
                <div class="col-md-6" style="margin-top: 10px; padding-top: 10px;">
                    Items {{ $approvers->firstItem() }} - {{ $approvers->lastItem() }}                        
                </div> 

                <div class="col-md-6 text-right">
                    {{ $approvers->withQueryString()->links() }}                        
                </div>   

             </div>

        </div>

    </div>

    <div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" action="{{ route('maintenance.approvers.store') }}">
                @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modal_title">Add New Approver</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            
                <div class="modal-body">

                    <table width="100%">
                    
                        <tr>
                            <td width="150"><label>Last Name <span class="required" aria-required="true"> * </span></label></td>
                            <td><input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name" required maxlength="30"></td>                                       
                        </tr>

                        <tr>
                            <td width="150"><label>First Name <span class="required" aria-required="true"> * </span></label></td>
                            <td><input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" required maxlength="30"></td>                                       
                        </tr>
                        
                        <tr>
                            <td width="150"><label>Middle Name <span class="required" aria-required="true"> * </span></label></td>
                            <td><input type="text" class="form-control" id="mname" name="mname" placeholder="Middle Name" required maxlength="30"></td>                                       
                        </tr>      
                        
                        <tr>
                            <td width="150"><label></label></td>
                            <td><label class="label-control" style="font-size: 10px; color: blue"> Note: Extension names such as JR, SR, III, IV etc should be put adjacent next to first name (e.i: Jose Jr). Thank you!</label></td>
                        </tr>

                    </table>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="modal_action">Save Approver</button>
                </div>
            </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" action="{{ route('maintenance.approvers.update') }}">
                @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modal_title">Update Approver</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            
                <div class="modal-body">                    
                    <input type="hidden" name="nameid" id="nameid">
                    <table width="100%">
                        
                        <tr>
                            <td width="150"><label>Name <span class="required" aria-required="true"> * </span></label></td>
                            <td><input class="form-control" type="text" name="name" id="edit_name" placeholder="Name" required maxlength="30"></td>
                        </tr>

                    </table>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="modal_action">Update Approver</button>
                </div>
            </div>
            </form>
        </div>
    </div>

	<div class="modal fade" id="name-status" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
			
		<form method="post" action="{{ route('maintenance.approver.change-status') }}">
			@csrf
			<div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Confirmation</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
				<div class="modal-body">
					<p>
						You are about to change the status of the selected approver into						
						<b><span id="name_status"></span></b>. Do you want to continue?
					</p>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="approverid" id="approverid">
					<input type="hidden" name="namestatus" id="namestatus">
					<button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
					<button type="submit" class="btn" id="btnStatus">Yes, <span id="status_btn"></span>!</button>
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
            
		function update_approver(id,name)
		{
			$('#nameid').val(id);			
			$('#edit_name').val(name);
			$('#modalEdit').modal('show');
		}


		function addApprover() 
		{										
			$('#nameid').val('');
			$('#lname').val('');
            $('#fname').val('');
            $('#mname').val('');
		}        

		function change_status(id,status)
        {
			$('#approverid').val(id);
			$('#namestatus').val(status);
			var status_str = "INACTIVE";
			if(status == 1)
			{
				status_str = "ACTIVE";
			}
			$('#name_status').html(status_str);

			if(status == 1){
				$('#status_btn').html('activate');
				$('#btnStatus').addClass('green');
				$('#btnStatus').removeClass('red');
			} else {
				$('#status_btn').html('deactivate');
				$('#btnStatus').addClass('red');
				$('#btnStatus').removeClass('green');
			}

			$('#name-status').modal('show');
		}


    </script>

@endsection
