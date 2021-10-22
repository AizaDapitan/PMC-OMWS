@extends('layouts.app')

@section('pageCSS')
<!-- Theme styles START -->
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
<!-- Theme styles END -->

@endsection
@section('content')


<!-- BEGIN SIDEBAR CONTENT LAYOUT -->

<!-- BEGIN PAGE HEADER-->

<div class=" row">

    <div class="col-md-12">

        <h3 class="page-title"> Unposted Transactions Report </h3>
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <i class="fa fa-user font-dark"></i>
                    <span class="caption-subject bold uppercase">Records</span>
                </div>
                <div class="tools"> </div>
            </div>
            <form action="" method="get">
                <div class="actions">
                    <div class="form-group form-inline" style="display:inline;margin-right:10px">
                        <label class="control-label">Start<span class="required"> * </span></label>                        
                        <div class="input-group input-medium date date-picker" data-date="{{ today() }}" data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                            
                            <input type="text" class="form-control form-filter" readonly name="start" id="start" value="{{ request()->has('start') ? request()->start : date('Y-m-d') }}">
                            <span class="input-group-btn">
                                <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                            </span>
                        </div>

                        <label class="control-label">End:<span class="required"> * </span></label>
                        <div class="input-group input-medium date date-picker" data-date="{{ today() }}" data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                            <input type="text" class="form-control form-filter" readonly name="end" id="end" value="{{ request()->has('end') ? request()->end : date('Y-m-d') }}">
                            <span class="input-group-btn">
                                <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                            </span>
                        </div>

                        <label class="control-label"> Status <span class="required"> * </span></label>
                        <select class="form-control" name="status">
                            <option value="saved" @if(request()->status == "saved") selected @endif>SAVED</option>
                            <option value="posted" @if(request()->status == "posted") selected @endif>POSTED</option>
                            <option value="cancelled" @if(request()->status == "cancelled") selected @endif>CANCELLED</option>
                        </select>
                    </div>
                    <input type="submit" name="filter_submit" class="btn btn-success" value="Generate" />
                    
                </div>
            </form>

            <div class="portlet-body">
            <br>

            <table class="table table-striped table-hover" id="sample_1">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Transaction #</th>
                        <th>Contractor Code</th>
                        <th>Name</th>
                        <th>Location</th>
                        <th>Cost Code</th>
                        <th>Item Code</th>
                        <th>Description</th>
                        <th>Qty</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach( $transactions as $transaction )
                    @foreach( $transaction->details as $transac_d )
                    @php $total = $total + $transac_d->qty; @endphp
                    <tr>
                    <td>{{ $transaction->docDate }}</td>
                    <td>{{ $transaction->transId }}</td>
                    <td>
                    @if( $transaction->contractor )
                    {{ $transaction->contractor->code }}
                    @endif
                    </td>
                    <td>
                    @if( $transaction->contractor )
                    {{ $transaction->contractor->lname }}, {{ $transaction->contractor->fname }} {{ $transaction->contractor->mname }}
                    @endif
                    </td>
                    <td>{{ $transaction->locationz? $transaction->locationz->name:'' }}</td>
                    <td>{{ $transac_d->cost_code }}</td>
                    <td>{{ $transac_d->itemz ? $transac_d->itemz->code: '' }}</td>
                    <td>{{ $transac_d->itemz ? $transac_d->itemz->name: '' }}</td>
                    <td>{{ $transac_d->qty }}</td>
                    </tr>
                    @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
    <!-- END EXAMPLE TABLE PORTLET-->
</div>
</div>
<!-- END PAGE BASE CONTENT -->
</div>
<!-- END SIDEBAR CONTENT LAYOUT -->
@stop
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
    function getReportDetails() {
        const dateFrom = urlParams.get('dateFrom')
        const dateTo = urlParams.get('dateTo')
        var userid = urlParams.get('userid')
        if (userid == null) {
            userid = 0
        }
        $('#dateFrom').val(dateFrom);
        $('#dateTo').val(dateTo);
        $('#userid').val(userid);

    }
    $(function() {
        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);

        const dateFrom = urlParams.get('dateFrom')
        const dateTo = urlParams.get('dateTo')
        var userid = urlParams.get('userid')
        if (userid == null) {
            userid = 0
        }
        $('#dateFrom').val(dateFrom);
        $('#dateTo').val(dateTo);
        $('#userid').val(userid);

        // let dateInterval = getQueryParameter('dateFrom','dateTo','userid');

    });

    function getQueryParameter(datefrom, dateto, userid) {



        // const url = window.location.href;
        // name = name.replace(/[\[\]]/g, "\\$&");
        // const regex = new RegExp("[?&]" + datefrom + "(=([^&#]*)|&|#|$)"),
        //     results = regex.exec(url);

        // var dateFrom = decodeURIComponent(results[0].replace(/\+/g, " "));
        // var dateTo = decodeURIComponent(results[1].replace(/\+/g, " "));
        // var userid = decodeURIComponent(results[2].replace(/\+/g, " "));
        // alert(dateFrom);
        // alert(dateTo);
        // alert(userid);
        // // alert(decodeURIComponent(results[1].replace(/\+/g, " ")));
        // if (!results) return null;
        // if (!results[2]) return '';
        // return decodeURIComponent(results[2].replace(/\+/g, " "));
    }
</script>
@stop