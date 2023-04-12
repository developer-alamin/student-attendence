<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('title')</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        
        <!-- MDB -->
        <link rel="stylesheet" href="{{asset('css/mdb.min.css')}}" rel="stylesheet"/>
        {{-- toastr css start form here --}}
        <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}"/>
        {{-- bootstrap min css start form here --}}
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        {{-- datatable min css start form here --}}
        <link rel="stylesheet" href="{{asset('css/datatables.min.css')}}"/>
        {{-- select datatable min css start form here --}}
        <link rel="stylesheet" href="{{asset('css/select.dataTables.min.css')}}" />
        {{-- JQuery ui css start form here --}}
        <link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}" />
        {{-- DataTables css start form here --}}
        <link rel="stylesheet" type="text/css" href="{{asset('css/dataTable.css')}}">
        {{-- modal.css css start form here --}}
        <link rel="stylesheet" type="text/css" href="{{asset('css/modal.css')}}">
        {{-- animation loader css start form here --}}
        <link rel="stylesheet" type="text/css" href="{{asset('css/loader.css')}}">
        <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
         <link href="{{asset('css/admin.css')}}" rel="stylesheet" />
        
        
    </head>
    <body class="sb-nav-fixed">

                    @includeif('layout.menu')
                    
                     @yield('content')
                    </div>
                </main>
            </div>
        </div>



        {{-- JQuery js start form here --}}
        <script type="text/javascript" src="{{asset('js/jquery-1.10.2.js')}}"></script>
        {{-- propper js start form here --}}
        <script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
        {{-- bootstrap min js start form here --}}
        <script type="text/javascript" src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
        <!-- MDB -->
        <script type="text/javascript" src="{{asset('js/mdb.min.js')}}"></script>
        {{-- toastr min js start form here --}}
        <script type="text/javascript" src="{{asset('js/toastr.min.js')}}"></script>
        {{-- jquery.dataTables.min.js start form here --}}
        <script type="text/javascript" src="{{asset('js/jquery.dataTables.min.js')}}"></script>

        {{-- dataTables.select.min.js start form here --}}
        <script type="text/javascript" src="{{asset('js/dataTables.select.min.js')}}"></script>
        {{-- sweetalert.min.js start form here --}}
        <script type="text/javascript" src="{{asset('js/sweetalert.min.js')}}"></script>
        {{-- JQuery ui js start form here --}}
        <script type="text/javascript" src="{{asset('js/jquery-ui.js')}}"></script>
        {{-- jquery.waypoints.min.js start form here --}}
        <script type="text/javascript" src="{{asset('js/jquery.waypoints.min.js')}}"></script>
        {{-- custom loader js start form here --}}
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        {{-- axios.min.js start form here --}}
        <script type="text/javascript" src="{{asset('js/axios.min.js')}}"></script>
        {{-- font icon js cdn link start form here --}}
        <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
        {{-- site main js start form here --}}
        <script type="text/javascript" src="{{asset('js/main.js')}}"></script>
        {{-- script file js start form here --}}
        <script type="text/javascript" src="{{asset('js/scripts.js')}}"></script>
        {{--  content js start form here    --}}
          @yield('script')
         
    </body>
</html>
