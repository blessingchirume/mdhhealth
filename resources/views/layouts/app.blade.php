<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css"> -->

    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/css/jquery-editable.css" rel="stylesheet" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/js/jquery-editable-poshytip.min.js"></script>
<style>
    /* Target the selected item in the dropdown */
.select2-results__option[aria-selected=true] {
    background-color: #09033a !important;
}
.select2-selection__choice {
    background-color: #1c4a85 !important;
    color: #ffffff !important; /* Optionally, you can also change the text color */
}
</style>
    @livewireStyles
    @yield('styles')
</head>

<body class="hold-transition sidebar-mini ">
    <div class="wrapper">

        <!-- Navbar -->
        @include('nav')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside style="background-color: #162137;" class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="/" class="brand-link">
                <img src="{{ asset('images/AGI_HMS_logo_trans.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-0">
                <!-- <span class="brand-text font-weight-light">{{ config('app.name') }}</span> -->
            </a>
            @include('layouts.navigation')
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper p-8">
            @include('layouts.partials.alert')
            @yield('content')
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->

            <!-- Default to the left -->
            <strong>Copyright &copy; 2019 - {{ date('Y') }} <a href="https://www.agimedix.co.zw">Agimedix</a>.</strong>
            All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    @vite('resources/js/app.js')
    <!-- AdminLTE App -->
    <script src="{{ asset('js/adminlte.min.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script>
    <script>
        $(document).ready(function() {
            $('#icd10_codes').select2();
        });
    </script>

    <!-- <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js" defer></script> -->
    <script type="module">
        $(function() {
            $(".js-example-basic-single").select2();
            $("#table1").DataTable({
                "scrollY": "400px",
                "lengthChange": true,
                "paging": true,
                "responsive": false,
                "autoWidth": true,
                "lengthMenu": [
                    [10, 20, 50, 100, 200, 300, -1],
                    [10, 20, 50, 100, 200, 300, 'All']
                ],
            });
        });
    </script>
    <script>
        $.fn.editable.defaults.mode = "inline";
        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'}
        });

        $('.editable').editable({
            url: '/currency/update',
            type: 'text',
            name: 'rate',
            title: 'Enter exchange rate'
        });
    </script>
    @livewireScripts

    @yield('scripts')
</body>

</html>
