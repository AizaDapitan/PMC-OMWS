@extends('layouts.app')

@section('pageCSS')

<link href="{{env('APP_URL')}}/themes/metronic/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="{{env('APP_URL')}}/themes/metronic/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
<link href="{{env('APP_URL')}}/themes/metronic/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

<link href="{{env('APP_URL')}}/themes/metronic/assets/global/css/components.css" rel="stylesheet" type="text/css" />
<link href="{{env('APP_URL')}}/themes/metronic/assets/global/css/plugins.css" rel="stylesheet" type="text/css" />
<link href="{{env('APP_URL')}}/themes/metronic/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css" />
<link id="style_color" href="{{env('APP_URL')}}/themes/metronic/assets/admin/layout/css/themes/default.css" rel="stylesheet" type="text/css" />
<link href="{{env('APP_URL')}}/themes/metronic/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css" />

<link href="{{ url('plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ url('plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
    
    <style type="text/css">
        table td {
            padding-bottom: 10px; 
        }
    </style>

@endsection

@section('content')

    <div class="row">

        <div class="col-md-12">

            <h3 class="page-title"> Application Maintenance </h3>

            <ul class="page-breadcrumb breadcrumb">
                <li> 
                    @if($create)
                        <a class="btn blue" data-toggle="modal" data-backdrop="static" href="#basic" onclick="addSchedule()" style="color:white;"> Create a Scheduled Shutdown </a>                        
                    @else
                        <button class="btn blue" disabled> Create a Scheduled Shutdown </button>
                    @endif                    
                </li>
            </ul>

            <div class="portlet box blue">

                <div class="portlet-title">
                    <div class="caption">
                        <i class=" icon-list"></i> Scheduled Shutdown List
                    </div>                            
                </div>
            </div>                
            <div class="portlet-body">
                <div class="table-toolbar">
                <div class="row">
                    <div class="col-md-12" style="direction:rtl;">
                        <div class="btn-group">
                            <a onclick="return confirm('Are you sure you want to run reindexing?')" href="{{ route('maintenance.application.create_indexing') }}" class="btn sbold green"> Reindex Application Database</a>                                                    
                        </div>
                        <div class="btn-group">
                            <a onclick="return confirm('Are you sure you want to start application?')" href="{{ route('maintenance.application.systemUp') }}" class="btn sbold blue"> Start</a>                                                    
                        </div>
                        <div class="btn-group">
                            <a onclick="return confirm('Are you sure you want to stop application?')" href="{{ route('maintenance.application.systemDown') }}" class="btn sbold red"> Stop</a>                                                    
                        </div>
                    </div>
                </div>
                </div>    
            
                    </br>
                    <table class="table table-striped table-hover" id="sample_1">
                        <thead>
                            <tr>
                                <th>Scheduled Date</th>
                                <th>Scheduled Time</th>
                                <th>Reason</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($applications as $application)
                            <tr>                              
                                <td>{{$application['scheduled_date']}}</td>
                                <td>{{$application['scheduled_time']}}</td>
                                <td>{{$application['reason']}}</td>
                                <td class="text-center">
                                    @if($edit)
                                        <a onclick="getApplicationDetails({!! $application['id'] !!})" data-toggle="modal" data-target="#basic"  class="btn btn-sm blue btn-outline filter-submit margin-bottom"><i class="fa fa-edit"></i> Edit</a>
                                        <a data-toggle="modal"  class="btn btn-sm red btn-outline filter-submit margin-bottom" href="#remove{{ $application['id' ]}}"><span class="fa fa-trash-o"></span> Remove</a>
                                    @else
                                        <button disabled class="btn btn-sm blue btn-outline filter-submit margin-bottom"><i class="fa fa-edit"></i> Edit</button>
                                        <button disabled class="btn btn-sm red btn-outline filter-submit margin-bottom"><span class="fa fa-trash-o"></span> Remove</button>
                                    @endif
                                    
                                </td>               

                            </tr>
                            @endforeach

                        <tbody>
                    </table>
                

             </div>

        </div>

    </div>

	<div class="modal fade" id="basic" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title" id="titleLabel" name="titleLabel"></h4>
                </div>

                <form id="form" role="form" action="{{ route('maintenance.application.store') }}" method="POST">
                    @csrf

                    <input type="hidden" name="_method" id="method" value="POST">
                    <input type="hidden" name="id" id="id" value=""> 

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">

                                <div class="form-group">
                                        <label class="control-label">Date</label><i class="font-red"> *</i>
                                        <div class="input-group input-medium date date-picker" data-date="{{ today() }}" data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                                            <input required type="date" name="scheduled_date" id="scheduled_date" class="form-control">
                                        </div>                                             
                                </div>              

                                <div class="form-group">
                                    <label class="control-label">Time</label><i class="font-red"> *</i>
                                    <input required type="time" name="scheduled_time" class="form-control" id="scheduled_time">
                                </div>

                                <div class="form-group last">
                                    <label class="control-label">Reason</label><i class="font-red"> *</i>
                                    <textarea required type="text" placeholder="Reason" name="reason" id="reason" class="form-control"></textarea>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                        <input type="submit" class="btn btn-primary" value="Save">
                    </div>
                    
                </form>            

            </div>
        </div>
	</div>



    @foreach($applications as $application)
    
    <div class="modal fade" id="remove{{ $application['id'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{{ route('maintenance.application.destroy', $application['id']) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title"><b>Confirmation</b></h4>
                    </div>
                    <div class="modal-body"> Are you sure you want to <b>Remove</b> this schedule? </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-circle dark btn-outline" data-dismiss="modal">Close</button>
                        <button type="submit" name="remove" class="btn btn-circle red"><span class="fa fa-trash"></span> Remove</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endforeach    



@endsection

@section('pageJS')
    
<script src="{{env('APP_URL')}}/themes/metronic/assets/global/plugins/jquery-1.11.0.min.js" type="text/javascript"></script>
<script src="{{env('APP_URL')}}/themes/metronic/assets/global/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<script src="{{env('APP_URL')}}/themes/metronic/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

<script src="{{env('APP_URL')}}/themes/metronic/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="{{env('APP_URL')}}/themes/metronic/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="{{env('APP_URL')}}/themes/metronic/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<!-- <script src="{{ url('plugins/datatables/jquery-ui/jquery-ui-1.10.3.custom.min.js') }}" type="text/javascript"></script> -->
<script src="{{ url('plugins/datatables/datatable.js') }}" type="text/javascript"></script>
<script src="{{ url('plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
<!-- <script src="{{ url('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script> -->
<!-- END PAGE LEVEL PLUGINS -->
<script src="{{ url('plugins/datatables/table-datatables-buttons.js') }}" type="text/javascript"></script>

<script type="text/javascript">

$(document).ready(function(){                
            
        });
  
        function addSchedule() {
                          
          $("#titleLabel").text(" Create a Scheduled Shutdown");                        
          $('#id').val('');
          $('#scheduled_date').val('');
          $('#scheduled_time').val('');
          $('#reason').val('');
  
          $('#method').val('POST');
          $('#form').attr('action', '{{ route('maintenance.application.store') }}');
      }
  
          function getApplicationDetails(id) {
              $.ajax({
                  url: '{!! route('maintenance.application.edit') !!}',
                  type: 'POST',
                  async: false,
                  dataType: 'json',
                  data:{
                      _token: '{!! csrf_token() !!}',
                      id: id
                  },
                  success: function(response){
                      $('#cancel').show();
  
                      $("#titleLabel").text(" Update a Scheduled Shutdown");
              
                      $('#scheduled_date').val(response.scheduled_date);
                      $('#scheduled_time').val(response.scheduled_time.replace(':00.0000000',''));                
                      $('#reason').val(response.reason);
                                      
                      $('#id').val(id);                
                      $('#method').val('PUT');
                      $('#form').attr('action', '{{ route('maintenance.application.update') }}');
                      $('#submit').html('<span class="glyphicon glyphicon-edit"></span> Update');
                  }
              });
          }
  
          function systemDown(id) {
          $.ajax({
              url: '{!! route('maintenance.application.systemDown') !!}',
              type: 'POST',
              async: false,
              success: function(response) {
                 
              }
          });
      }

</script>

@endsection
