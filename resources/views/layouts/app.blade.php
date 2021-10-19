<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="google.css" rel="stylesheet" type="text/css"/>

    @yield('pageCSS')

    <style type="text/css">

        .popover-content,
        .popover-title { color: black; }

        .page-header.navbar { background-color: #1f1f1f; }

        #dashboard_div {padding-left:340px; }
        #dashboard_div table { border-collapse:separate; }
        #dashboard_div td, th {
            margin:0;
            white-space:nowrap;
        }

        #dashboard_div   .headcol {
            position:absolute;
            width:28em;
            left:28px;
            top:auto;
            border-right: 0px none;
            background-color: white;
        }

        #dashboard_div    .headcol:before {content:'';}
        #dashboard_div    .long { background:yellow; letter-spacing:1em; }

    </style>

</head>
<body>

    <div class="page-header-fixed page-quick-sidebar-over-content">
        
        @include('layouts.header')

        <div class="page-container">

            @include('layouts.sidebar')

            <div class="page-content-wrapper">

                <div class="page-content">

                    @if(session()->has('error_message'))
                        <div class="col-md-12">

                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                <strong>Oops!</strong> {{ session()->get('error_message') }}
                            </div>

                        </div>
                    @endif

                    @if(session()->has('success'))
                        <div class="col-md-12">

                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                <strong>Success!</strong> {{ session()->get('success') }}
                            </div>

                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="col-md-12">
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                <strong> Oops! </strong> {{ $errors->first() }}
                            </div>
                        </div>
                    @endif

                    @yield('content')

                </div>


            </div>

        </div>

    </div>
   
    @yield('pageJS')

    <script>

        jQuery(document).ready(function() {    
            
            Metronic.init(); // init metronic core components
            Layout.init(); // init current layout
           
            $('[data-toggle="popover"]').popover(); 
        
            if( $('.alert-danger').length>0 ) {
                $('.alert-danger').delay(3000).slideUp('slow');
            }

            if( $('.alert-success').length>0 ) {
                $('.alert-success').delay(3000).slideUp('slow');
            }

            (function(){

                setInterval(function(){

                    var today = new Date();

                    console.log(today.getMinutes());

//                    if( today.getHours() == 9 && today.getMinutes() > 1 && today.getMinutes() < 20 ) {
                        
                        $.ajax({

                            type: "GET",
                            url: "{!! route('sequence.close-open') !!}",
                            
                            success: function(data){

                                //location.reload();

                            }

                        });

//                    }

                }, 30000);

            })();

        });

    </script>

</body>
</html>
