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

            <h3 class="page-title"> Role Access Rights </h3>

            <div class="portlet box blue">

                <div class="portlet-title">
                    <div class="caption">
                        <i class=" icon-list"></i> Role Access Rights
                    </div>                            
                </div>

                <div class="portlet">
                    <form id="form" action="{{ route('maintenance.roleaccessrights.store') }}" method="POST">
                    
                    <input type="hidden" name="roles_permissions" id="roles_permissions" value="">
                    @csrf
                    
                    <div class="portlet-title">

                        <div class="actions">
                            <div class="form-group form-inline" style="display:inline;margin-right:10px">
                                <label class="control-label" style="margin-right:20px">Role </label>
                                
                                <select required name="roleid" id="roleid" class="form-control">
                                    @foreach($roles as $role)
                                    <option value="{{ $role['id'] }}">{{ $role['name'] }}</option>
                                    @endforeach
                                </select>
                                
                            </div>
                            @if($create)
                                <button type="submit" class="btn blue" id="saveRolePermission">
                                    <i class="fa fa-save"></i>&nbsp; Save Changes
                                </button>
                            @else
                                <button disabled type="submit" class="btn blue" id="saveRolePermission">
                                    <i class="fa fa-save"></i>&nbsp; Save Changes
                                </button>
                            @endif
                        </div>                

                    </div>
                    <div class="portlet-body">
                        <div class="table-scrollable">
                            <table class="table table-striped table-bordered table-advance table-hover">
                                <thead>
                                <tr>
                                    <th>
                                        <i class="fa fa-briefcase"></i> Permission List
                                    </th>
                                    <th>
                                        <i class="fa fa-briefcase"></i> View
                                    </th>
                                    <th>
                                        <i class="fa fa-briefcase"></i> Create
                                    </th>                                
                                    <th>
                                        <i class="fa fa-briefcase"></i> Update
                                    </th>
                                    <th>
                                        <i class="fa fa-briefcase"></i> Delete/Cancel
                                    </th>
                                    <th>
                                        <i class="fa fa-briefcase"></i> Print
                                    </th>
                                    <th>
                                        <i class="fa fa-briefcase"></i> Upload
                                    </th>                                                                                                                            
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($modules as $module)
                                    <tr>
                                        <td width="50%">
                                            <div class="caption custom-padding">
                                                <span class="caption-subject font-green bold uppercase">{{ strtoupper($module['description'])}}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="md-checkbox custom-padding">
                                                <input type="checkbox" class="md-check" data-role="{{$module['id']}}_view" data-module="{{$module['id']}}_view" onclick="checkPermission(this.id)" id="{{$module['id']}}_view">
                                                <label for="{{$module['id']}}_view">
                                                    <span></span>
                                                    <span span class="check"></span>
                                                    <span class="box"></span>
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="md-checkbox custom-padding">
                                                <input type="checkbox" class="md-check" data-role="{{$module['id']}}_create" data-module="{{$module['id']}}_create" onclick="checkPermission(this.id)" id="{{$module['id']}}_create">
                                                <label for="{{$module['id']}}_create">
                                                    <span></span>
                                                    <span span class="check"></span>
                                                    <span class="box"></span>
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="md-checkbox custom-padding">
                                                <input type="checkbox" class="md-check" data-role="{{$module['id']}}_edit" data-module="{{$module['id']}}_edit" id="{{$module['id']}}_edit" onclick="checkPermission(this.id)">
                                                <label for="{{$module['id']}}_edit">
                                                    <span></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span>
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="md-checkbox custom-padding">
                                                <input type="checkbox" class="md-check" data-role="{{$module['id']}}_delete" data-module="{{$module['id']}}_delete" id="{{$module['id']}}_delete" onclick="checkPermission(this.id)">
                                                <label for="{{$module['id']}}_delete">
                                                    <span></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span>
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="md-checkbox custom-padding">
                                                <input type="checkbox" class="md-check" data-role="{{$module['id']}}_print" data-module="{{$module['id']}}_print" id="{{$module['id']}}_print" onclick="checkPermission(this.id)">
                                                <label for="{{$module['id']}}_print">
                                                    <span></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span>
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="md-checkbox custom-padding">
                                                <input type="checkbox" class="md-check" data-role="{{$module['id']}}_upload" data-module="{{$module['id']}}_upload" id="{{$module['id']}}_upload" onclick="checkPermission(this.id)">
                                                <label for="{{$module['id']}}_upload">
                                                    <span></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span>
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    @foreach($permissions as $permission)
                                    @if(strtoupper($permission['module_type']) == strtoupper($module['description']) )
                                    <tr>
                                        <td>
                                            {{ strtoupper($permission['description']) }}
                                        </td>
                                        <td>
                                            <div class="md-checkbox">
                                                <input type="checkbox" class="md-check" data-role="{{$permission['id']}}_{{$module['id']}}_view" data-module="{{$permission['id']}}_{{$module['id']}}_view" id="{{$permission['id']}}_{{$module['id']}}_view" onchange="storeID(this.id)">
                                                <label for="{{$permission['id']}}_{{$module['id']}}_view">
                                                    <span></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span>
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="md-checkbox">
                                                <input type="checkbox" class="md-check" data-role="{{$permission['id']}}_{{$module['id']}}_create" data-module="{{$permission['id']}}_{{$module['id']}}_create" id="{{$permission['id']}}_{{$module['id']}}_create" onchange="storeID(this.id)">
                                                <label for="{{$permission['id']}}_{{$module['id']}}_create">
                                                    <span></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span>
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="md-checkbox">
                                                <input type="checkbox" class="md-check" data-role="{{$permission['id']}}_{{$module['id']}}_edit" data-module="{{$permission['id']}}_{{$module['id']}}_edit" id="{{$permission['id']}}_{{$module['id']}}_edit" onchange="storeID(this.id)">
                                                <label for="{{$permission['id']}}_{{$module['id']}}_edit">
                                                    <span></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span>
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="md-checkbox">
                                                <input type="checkbox" class="md-check" data-role="{{$permission['id']}}_{{$module['id']}}_delete" data-module="{{$permission['id']}}_{{$module['id']}}_delete" id="{{$permission['id']}}_{{$module['id']}}_delete" onchange="storeID(this.id)">
                                                <label for="{{$permission['id']}}_{{$module['id']}}_delete">
                                                    <span></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span>
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="md-checkbox">
                                                <input type="checkbox" class="md-check" data-role="{{$permission['id']}}_{{$module['id']}}_print" data-module="{{$permission['id']}}_{{$module['id']}}_print" id="{{$permission['id']}}_{{$module['id']}}_print" onchange="storeID(this.id)">
                                                <label for="{{$permission['id']}}_{{$module['id']}}_print">
                                                    <span></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span>
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="md-checkbox">
                                                <input type="checkbox" class="md-check" data-role="{{$permission['id']}}_{{$module['id']}}_upload" data-module="{{$permission['id']}}_{{$module['id']}}_upload" id="{{$permission['id']}}_{{$module['id']}}_upload" onchange="storeID(this.id)">
                                                <label for="{{$permission['id']}}_{{$module['id']}}_upload">
                                                    <span></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span>
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
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
            getRolesPermissions($("#roleid").val());
            $("#roleid").on('change', function() {
                getRolesPermissions($("#roleid").val());

            })
        });

        function getRolesPermissions(roleid) {
            document.querySelectorAll('input[type=checkbox]').forEach(el => el.checked = false)
            $("#roles_permissions").val("");
            $.ajax({
                url: '{!! route('maintenance.roleaccessrights.store') !!}',
                type: 'get',
                
                data: {
                    roleid: roleid
                },
                success: function(data) {
                    $.each(data, function(index, element) {
                        var chkid = "";
                        chkid = (element.permission_id + "_" + element.module_id + "_" + element.action)
                        if (chkid != "") {
                            document.getElementById(element.module_id + "_" + element.action).checked = true;
                            document.getElementById(chkid).checked = true;

                            storeID(chkid);
                        }
                    });
                }
            });
        }

        function checkPermission(id) {
            var checkboxes = document.getElementsByTagName("input");
            const cb = document.getElementById(id);
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].type == "checkbox") {
                    if (checkboxes[i].id.includes(id)) {
                        document.getElementById(checkboxes[i].id).checked = cb.checked;
                        storeID(checkboxes[i].id);
                    }
                }
            }
        }

        function storeID(id) {
            var roles_permissions = $("#roles_permissions").val();
            
            if (document.getElementById(id).checked) {
                if (roles_permissions != "") {

                    roles_permissions = roles_permissions + ',' + id;
                } else {

                    roles_permissions = id;
                }
            } else {
            if((id.match(/_/g) || []).length == 2)
            {
                    if (roles_permissions.includes("," + id)) {
                        roles_permissions = roles_permissions.replace("," + id, "");
                        console.log(roles_permissions);
                    } else if (roles_permissions.includes(id + ",")) {
                        roles_permissions = roles_permissions.replace(id + ",", "");
                        
                        console.log(roles_permissions);
                    } else {
                        roles_permissions = roles_permissions.replace(id, "");
                    }
                }
            }
            $("#roles_permissions").val(roles_permissions);
        }

    </script>

@endsection
