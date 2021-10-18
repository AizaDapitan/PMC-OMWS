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
	<!-- <link href="{{ env('APP_URL')}}/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css" rel="stylesheet" type="text/css"/>
	<link href="{{ env('APP_URL')}}/plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css"/> -->
    <style type="text/css">
        table td {
            padding-bottom: 10px; 
        }
    </style>

@endsection

@section('content')

    <div class="row">

        <div class="col-md-12">

            <h3 class="page-title"> User Maintenance </h3>

            <ul class="page-breadcrumb breadcrumb">
                <li> 
                    <a class="btn blue" data-toggle="modal" data-backdrop="static" href="#modalAdd" style="color:white;" onclick="addUser()">Add New</a>
                </li>
            </ul>

            <div class="portlet box blue">

                <div class="portlet-title">
                    <div class="caption">
                        <i class=" icon-list"></i> List of Users
                    </div>
                            
                </div>

                <div class="portlet-body">

                    <div class="table-scrollable">
                        
                        <table class="table table-hover">

                            <thead>
                                <tr>                                    
                                    <th> Name</th>
                                    <th> Username</th>
                                    <th> Role</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                               @forelse($users as $user)
								<tr>
									<td>{{ $user->name }}</td>
									<td>{{ $user->username }}</td>
									<td>{{ $user->role }}</td>
									<td>
									@if($user->active)
									<i class="font-blue"> Active</i>
									@else
									<i class="font-red"> Inactive</i>
									@endif
									</td>
									<td>										
										@if($edit)
											@if($user->active)
											<a href="#" onclick="getUserDetails('{{$user->id}}')" class="btn btn-xs blue" data-toggle="modal" data-target="#modalAdd">Edit</a>
											<a href="#" class="btn btn-xs red" onclick="change_status('{{$user->id}}',0)">Deactivate</a>
											<a href="#" class="btn btn-xs green" onclick="reset_password('{{$user->id}}')">Reset Password</a>
											@else
											<a href="#" class="btn btn-xs green" onclick="change_status('{{$user->id}}',1)">Activate</a>
											@endif
										@else
											@if($user->active)
											<button disabled href="{{ route('users.edit',$user->id) }}" class="btn btn-xs blue">Edit</button>
											<button disabled href="#" class="btn btn-xs red" onclick="change_status('{{$user->id}}','INACTIVE')">Deactivate</button>
											<button disabled href="#" class="btn btn-xs green" onclick="reset_password('{{$user->id}}')">Reset Password</button>
											@else
											<button disabled href="#" class="btn btn-xs green" onclick="change_status('{{$user->id}}','ACTIVE')">Activate</button>
											@endif
										@endif
									</td>
								</tr>
								@empty
								<tr><td colspan="6" class="text-center">No users found.</td></tr>
								@endforelse
                            </tbody>

                        </table>

                    </div>

                </div>
                
				<div class="col-md-6" style="margin-top: 10px; padding-top: 10px;">
                    Items {{ $users->firstItem() }} - {{ $users->lastItem() }}                        
                </div> 

                <div class="col-md-6 text-right">
                    {{ $users->withQueryString()->links() }}                        
                </div>   
             </div>

        </div>

    </div>

	<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" action="{{ route('maintenance.users.store') }}" id="form" role="form">
                @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modal_title">Add New User</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            
                <div class="modal-body">

					<input type="hidden" name="_method" id="method" value="POST">
                    <input type="hidden" name="id" id="id" value="">
                    <table width="100%">
                        
                        <tr>
                            <td width="150"><label>Last Name:</label></td>
                            <td><input type="" name="lastname" id="lastname" class="form-control col-md-4 input inline" placeholder="Last Name" required></td>                                       
                        </tr>
                        <tr>
                            <td width="150"><label>First Name:</label></td>
                            <td><input type="" name="firstname" id="firstname" class="form-control col-md-4 input inline" placeholder="First Name" required></td>                                      
                        </tr>
                        <tr>
                            <td width="150"><label></label></td>
                            <td><label class="label-control" style="font-size: 10px; color: blue"> Note: Extension names such as JR, SR, III, IV etc should be put adjacent next to first name (e.i: Jose Jr). Thank you!</label></td>                                      
                        </tr>
						<tr>
                            <td width="150"><label>Username:</label></td>
							<td><input type="" name="username" id="username"  class="form-control col-md-4 input inline" placeholder="Username" required></td>                                      
						</tr>
						<tr>
							<td width="150"><label>Email Address:</label></td>
                            <td><input type="" name="email" id="email" class="form-control col-md-4 input inline" placeholder="Email Address" required></td>                                      
                        </tr>
						<tr>
							<td width="150"><label>Role:</label></td>
							<td>
								<select required name="role_id" id="role_id" class="form-control">
									@foreach($roles as $role)
									<option value="{{ $role['id'] }}">{{ $role['name'] }}</option>
									@endforeach
								</select>
							</td>
						</tr>
                    </table>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="modal_action">Save User</button>
                </div>
            </div>
            </form>
        </div>
    </div>
	
	

	<div class="modal fade" id="user-status" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
			
		<form method="post" action="{{ route('maintenance.user.change-status') }}">
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
						You are about to change the status of the selected user into						
						<b><span id="user_status"></span></b>. Do you want to continue?
					</p>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="userid" id="userid">
					<input type="hidden" name="userstatus" id="userstatus">
					<button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
					<button type="submit" class="btn" id="btnStatus">Yes, <span id="status_btn"></span>!</button>
				</div>
			</div>
		</form>
		</div>
	</div>

	<div class="modal fade" id="reset-password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
			
		<form method="post" action="{{ route('maintenance.user.reset-password') }}">
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
						You are about to reset the user password. Do you want to continue?
					</p>
				</div>
				<div class="modal-footer">
				<input type="hidden" name="userid" id="ruserid">
				<button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
				<button type="submit" class="btn red">Yes, reset!</button>
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
            
           
		function reset_password(id){
			$('#ruserid').val(id);
			$('#reset-password').modal('show');
		}

		function change_status(id,status){
			$('#userid').val(id);
			$('#userstatus').val(status);
			var status_str = "INACTIVE";
			if(status == 1)
			{
				status_str = "ACTIVE";
			}
			$('#user_status').html(status_str);

			if(status == 1){
				$('#status_btn').html('activate');
				$('#btnStatus').addClass('green');
				$('#btnStatus').removeClass('red');
			} else {
				$('#status_btn').html('deactivate');
				$('#btnStatus').addClass('red');
				$('#btnStatus').removeClass('green');
			}

			$('#user-status').modal('show');
		}
		function getUserDetails(id) {
        $.ajax({
            url: '{!! route('maintenance.users.edit') !!}',
            type: 'POST',
            async: false,
            dataType: 'json',
            data: {
                _token: '{!! csrf_token() !!}',
                id: id
            },
            success: function(response) {     
                $('#username').val(response.username);
                $('#role_id').val(response.role_id);
                $('#firstname').val(response.firstname);
                $('#lastname').val(response.lastname);
                $('#email').val(response.email);
                $('#id').val(id);
                $('#method').val('PUT');
                $('#form').attr('action', '{{ route('maintenance.users.update') }}');
				
                $('#modal_title').text('Update User');
                $('#modal_action').text('Update User');
				
            }
        });
    }
	function addUser() {
        $('#username').val('');
        $('#id').val('');
        $('#role_id').val('');
        $('#firstname').val('');
        $('#lastname').val('');
        $('#email').val('');
        $('#method').val('POST');
        $('#form').attr('action', '{{ route('maintenance.users.store') }}');
        $('#modal_title').text('Add New User');
        $('#modal_action').text('Save User');
    }
    </script>

@endsection
