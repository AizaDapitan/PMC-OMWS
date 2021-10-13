@extends('layouts.app')

@section('pageCSS')

    <link href="google.css" rel="stylesheet" type="text/css"/>
    <link href="{{env('APP_URL')}}/themes/metronic/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{env('APP_URL')}}/themes/metronic/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{env('APP_URL')}}/themes/metronic/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{env('APP_URL')}}/themes/metronic/assets/global/plugins/select2/select2.css"/>
    <link href="{{env('APP_URL')}}/themes/metronic/assets/global/css/components.css" rel="stylesheet" type="text/css"/>
    <link href="{{env('APP_URL')}}/themes/metronic/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
    <link href="{{env('APP_URL')}}/themes/metronic/assets/global/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" type="text/css" />    
    <link href="{{env('APP_URL')}}/themes/metronic/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
    <link id="style_color" href="{{env('APP_URL')}}/themes/metronic/assets/admin/layout/css/themes/default.css" rel="stylesheet" type="text/css"/>
    <link href="{{env('APP_URL')}}/themes/metronic/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
  
@endsection

@section('content')

    <div class="row">

        <div class="col-md-12">

            <h3 class="page-title"> Contractor History Report </h3>

            <form action="{{ route('rpt.contractor-history') }}" method="get">
                <table  width="100%">
                    <tr>
                        <td width="30%">
                            <label class="control-label">Start<span class="required"> * </span></label>
                            <div class="input-group date date-picker" style="width:80%" data-date-format="yyyy-mm-dd">
                                <input type="text" class="form-control form-filter" readonly name="start" id="start" value="{{ request()->has('start') ? request()->start : date('Y-m-d') }}">
                                <span class="input-group-btn">
                                <button class="btn  default" type="button"><i class="fa fa-calendar"></i></button>                      
                                
                            </div>
                        </td>

                        <td>
                            <label class="control-label">Contractor<span class="required"> * </span></label>
                            <select class="form-control input-large select2me" name='contractor' id="contractor" data-placeholder="Select...">
                                <option></option>
                                @foreach( $conts as $cont )
                                    <option value="{{ $cont->id }}" @if($cont->id == request()->contractor) selected @endif>{{ $cont->lname }}, {{ $cont->fname }} {{ $cont->mname }}</option>
                                @endforeach
                            </select>   
                        </td>                       
                    </tr>
                    <tr>
                        <td>
                            <label class="control-label">End:<span class="required"> * </span></label>
                            <div class="input-group date date-picker" style="width:80%" data-date-format="yyyy-mm-dd">
                                <input type="text" class="form-control form-filter" readonly name="end" id="end" value="{{ request()->has('end') ? request()->end : date('Y-m-d') }}">
                                <span class="input-group-btn">
                                <button class="btn  default" type="button"><i class="fa fa-calendar"></i></button>                                  
                            </div>                                 
                        </td>
                        <td><input type="submit" class="btn blue form-control" value="Generate" style="width:200px;"></td>
                    </tr>
                </table>
            </form>

            <div class="clearfix"></div>

            <div class="row">            

                <h1> Result </h1>

                <div class="table-scrollable">
                    
                    <table class="table table-hover">

                        <thead>
                            <tr>
                                <th>Contractor Code</th>                                   
                                <th>Name</th>
                                <th>Location</th>
                                <th>Assigned Date</th>                                   
                                <th>Assigned By</th>
                                <th>Removed Date</th>   
                                <th>Removed By</th>                 
                            </tr>
                        </thead>

                        <tbody>

                            @forelse( $contractors as $contractor )
                                @foreach( $contractor->location as $location )
                                    <tr>
                                        <td>{{ $contractor->code }}</td>
                                        <td>{{ $contractor->lname }}, {{ $contractor->fname }} {{ $contractor->mname }}</td>
                                        <td>{{ $location->name }}</td>
                                        <td>{{ \Carbon\Carbon::parse($location->pivot->addedDate)->toFormattedDateString() }}</td>
                                        <td>{{ $location->pivot->addedBy }}</td>
                                        <td>{{ $location->pivot->removedDate ? \Carbon\Carbon::parse($location->pivot->removedDate)->toFormattedDateString() : '' }}</td>
                                        <td>{{ $location->pivot->removedBy }}</td>
                                    </tr>
                                @endforeach
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center"> No Contractor Found </td>
                                </tr>
                            @endforelse
                            
                        </tbody>

                    </table>

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
    <script src="{{env('APP_URL')}}/themes/metronic/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript" ></script>        
    <script src="{{env('APP_URL')}}/themes/metronic/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>

    <script type="text/javascript">
        var initPickers = function () {
            //init date pickers
            $('.date-picker').datepicker({
                rtl: Metronic.isRTL(),
                autoclose: true
            });
        }
        initPickers();
    </script>

@endsection
