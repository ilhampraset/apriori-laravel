<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
          <script>window.Laravel = { csrfToken: '{{ csrf_token() }}' }</script>
        <title>Apriori </title>

        <!-- Fonts -->
        

    
        <link rel="stylesheet" type="text/css" href="{{url('css/app.css')}}">
         <link  href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
         <link  href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <link href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
        

        <!-- Styles -->
         <style>
          /* Style the sidebar - fixed full height */
          .sidebar {
            height: 100%;
            width: 188px;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            padding-top: 16px;
          }

          /* Style sidebar links */
          .sidebar a {
            padding: 6px 8px 6px 16px;
            text-decoration: none;
            font-size: 20px;
            color: #818181;
            display: block;
          }

          /* Style links on mouse-over */
          .sidebar a:hover {
            color: #f1f1f1;
          }

          /* Style the main content */
          .main {
            margin-left: 190px; /* Same as the width of the sidenav */
            padding: 0px 10px;
          }

          /* Add media queries for small screens (when the height of the screen is less than 450px, add a smaller padding and font-size) */
          @media screen and (max-height: 450px) {
            .sidebar {padding-top: 15px;}
            .sidebar a {font-size: 18px;}
          }
                
      @yield('css')
        </style>

    </head>
    <body>
        <div id="app">

    <!-- The sidebar -->
        <div class="sidebar">
          <a href="{{url('/')}}"><i class="fa fa-fw fa-home"></i> Home</a>
          <a href="{{url('/data-barang')}}"><i class="fa fa-archive"></i> Barang</a>
          <a href="{{url('/data-transaksi')}}"><i class="fa fa-cart-plus"></i> Transaksi</a>
           <a href="{{url('/association-rule')}}"><i class="fa fa-binoculars"></i>  Rule</a>
            <a href="{{url('/setting')}}"><i class="fa fa-gear"></i> Setting</a>
        </div>
            <!-- Page Content -->
            <div class="main">
              <div class="row" style="margin-bottom: 10px;">
                <div class="card col-md-12 col-sm-12">
                  <div class="card-body">

                  <div align="center">
                    <h5>Asociation Rule Pt. Evanusa Mulya Jaya</h5>    
                   </div>
                    
                 </div>
              </div>
            </div>
                @yield('section')
               

            </div>
        </div>
    </body>
    <script>
      function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

/* Set the width of the side navigation to 0 */
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
    </script>
    <script src="{{url('js/app.js')}}"></script>
    @yield('script')
</html>
