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
        #d-logout {
            color: #ffffff;
            font-weight: 700;
            text-decoration: none;
        }
    </style>

@endsection

@section('content')

    <div class="row">

        <div class="col-md-12">
                
            <h3 class="page-title"> System Maintenance </h3>

            <div class="tiles">

                <div class="tile selected bg-yellow-saffron" onclick="window.location.href='{{ route('maintenance.contractors.index') }}'">
                    <div class="corner"> </div>

                    <div class="tile-body">
                        <i class="fa fa-group"></i>
                    </div>

                    <div class="tile-object">
                        <div class="name"> Contractors </div>
                        <div class="number"> Engg </div>
                    </div>
                </div>

                <div class="tile bg-blue-steel" onclick="window.location.href='{{ route('maintenance.locations.index') }}'">
                    <div class="tile-body">
                        <i class="fa fa-plane"></i>
                    </div>
                    <div class="tile-object">
                        <div class="name"> Locations </div>
                        <div class="number"> Engg </div>
                    </div>
                </div>

                <div class="tile bg-red-sunglo" onclick="window.location.href='{{ route('maintenance.receivers.index') }}'">
                    <div class="tile-body">
                        <i class="fa fa-wheelchair"></i>
                    </div>

                    <div class="tile-object">
                        <div class="name"> Receivers </div>
                        <div class="number"> MCD </div>
                    </div>
                </div>

                <div class="tile bg-purple-studio" onclick="window.location.href='{{ route('maintenance.approvers.index') }}'">
                    <div class="tile-body">
                    <i class="fa fa-foursquare"></i>
                    </div>
                    <div class="tile-object">
                        <div class="name"> Approvers </div>
                        <div class="number"> MCD </div>
                    </div>
                </div>

                <div class="tile bg-green-meadow" onclick="window.location.href='{{ route('maintenance.costcodes.index') }}'">
                    <div class="tile-body">
                    <i class="fa fa-barcode"></i>
                    </div>
                    <div class="tile-object">
                        <div class="name">Cost Codes</div>
                        <div class="number">MCD</div>
                    </div>
                </div>

                <div class="tile bg-red-intense" onclick="location.href='{{ route('maintenance.cutoffs.index') }}'">
                    <div class="tile-body">
                        <i class="fa fa-lock"></i>
                    </div>
                    <div class="tile-object">
                    <div class="name"> Cutoff </div>
                    <div class="number"> MCD </div>
                    </div>
                </div>

                <div class="tile bg-green" onclick="window.location.href='{{ route('items.index') }}'">
                    <div class="tile-body">
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="tile-object">
                        <div class="name">Items</div>
                        <div class="number">MCD</div>
                    </div>
                </div>
                   
            </div>

        </div>

        <div class="clearfix" style="margin:30px 0;"></div>

        <div class="col-md-12">
            
            <h3 class="page-title"> Transaction and Tools </h3>  

            <div class="tiles">
                
                <div class="tile double bg-blue-madison" onclick="location.href='{{ route('transactions') }}'">
                    <div class="tile-body">
                        <i class="fa fa-truck"></i>
                    </div>
                    <div class="tile-object">
                    <div class="name"> Issuance Transactions </div>
                    <div class="number"> MCD </div>
                    </div>
                </div>

                <div class="tile double bg-purple-studio" onclick="location.href='{{ route('transaction-new') }}'">
                    <div class="tile-body">
                        <i class="fa fa-plus-square"></i>
                    </div>
                    <div class="tile-object">
                        <div class="name"> Add New Issuance </div>
                        <div class="number"> MCD </div>
                    </div>
                </div>

                <div class="tile double bg-red" onclick="location.href='{{ route('transaction-batch-per-id') }}'">
                    <div class="tile-body">
                        <i class="fa fa-mail-reply-all"></i>
                    </div>
                    <div class="tile-object">
                        <div class="name"> Batch Posting </div>
                        <div class="number"> MCD </div>
                    </div>
                </div>           

                <div class="tile bg-green-meadow" onclick="location.href='{{ route('logout') }}'; event.preventDefault(); document.getElementById('logout-form').submit();">
                    <div class="tile-body">
                        <i class="fa fa-sign-out"></i>
                    </div>
                    <div class="tile-object">
                        <div class="name">
                            Logout
                        </div>
                        <div class="number"> User </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="clearfix" style="margin:30px 0;"></div>

        <div class="col-md-12">
            
            <h3 class="page-title"> System Reports </h3>  

            <div class="tiles">

                <div class="tile selected bg-yellow-saffron" onclick="location.href='{{ route('rpt.contractor-history') }}'">
                    <div class="corner"></div>
                    <div class="tile-body"> Contractor History </div>
                    <div class="tile-object">
                        <div class="name">                          
                            <i class="fa fa-group"></i>
                        </div> 
                        <div class="number"> Engg </div>                      
                    </div>
                </div>                   

                <div class="tile bg-blue-steel" onclick="location.href='{{ route('rpt.location-history') }}'">
                    <div class="tile-body"> Location History </div>
                    <div class="tile-object">
                        <div class="name">
                            <i class="fa fa-location-arrow"></i>
                        </div>
                        <div class="number"> Engg </div>
                    </div>
                </div>

                <div class="tile bg-purple-studio" onclick="location.href='{{ route('rpt.transaction-all') }}'">
                    <div class="tile-body"> Issuance Report </div>
                    <div class="tile-object">
                        <div class="name">
                            <i class="fa fa-truck"></i>
                        </div>
                        <div class="number"> MCD </div>
                    </div>
                </div>

                <div class="tile bg-green-meadow" onclick="location.href='{{ route('rpt.item-issuance') }}'">
                    <div class="tile-body"> Item Issuance Summary </div>
                    <div class="tile-object">
                        <div class="name">
                            <i class="fa fa-barcode"></i>
                        </div>
                        <div class="number"> MCD </div>
                    </div>
                </div>

                <div class="tile bg-red" onclick="location.href='{{ route('rpt.item-issuance-details') }}'">
                    <div class="tile-body"> Unposted transactions </div>
                    <div class="tile-object">
                        <div class="name">
                            <i class="fa fa-barcode"></i>
                        </div>
                        <div class="number"> MCD </div>
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

@endsection
