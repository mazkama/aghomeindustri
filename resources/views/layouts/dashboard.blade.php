<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>@yield('title')</title> -->
    <title>AG Home Industri</title>
    <link rel="apple-touch-icon" href="{{ asset('assets/img/apple-icon.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">

    <!-- Iconly CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/iconly/bold.css') }}">

    <!-- Simple DataTables CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/simple-datatables/style.css') }}">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/fontawesome/all.min.css') }}">

    <!-- Perfect Scrollbar CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">

    <!-- Bootstrap Icons CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">

    <!-- Custom App CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.svg') }}" type="image/x-icon">

    <!-- jQuery -->
    <script src="{{ asset('assets/js/jquery-3.6.4.min.js') }}"></script>

    <!-- Include SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">

    <!-- Toastify CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    <!-- Toastify JS -->
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <link rel="stylesheet" href="{{asset('assets/vendors/sweetalert2/sweetalert2.min.css')}}">

</head>

<body> 
    <div id="app">
        <!-- SIDEBAR -->
        @include('sidebars.sidebarAdmin')
        <!-- END SIDEBAR -->

        <!-- CONTENT -->
        @yield('content')
        <!-- END CONTENT -->
    </div>

    <!-- Perfect Scrollbar JS -->
    <script src="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>

    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>

    <!-- ApexCharts JS -->
    <script src="{{ asset('assets/vendors/apexcharts/apexcharts.js') }}"></script>
    <script src="{{ asset('assets/js/pages/dashboard.js') }}"></script>


    <!-- Simple DataTables JS -->
    <script src="{{ asset('assets/vendors/simple-datatables/simple-datatables.js') }}"></script>


    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>


    <!-- Font Awesome JS -->
    <script src="{{ asset('assets/vendors/fontawesome/all.min.js') }}"></script>

    <!-- Custom Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <script src="{{asset('assets/js/extensions/sweetalert2.js')}}"></script>
    <script src="{{asset('assets/vendors/sweetalert2/sweetalert2.all.min.js')}}"></script>
 
</body>

</html>