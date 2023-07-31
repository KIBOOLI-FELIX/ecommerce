<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">

    <!-- Styles -->
    @vite(['resources/admin/vendors/mdi/css/materialdesignicons.min.css',
            'resources/admin/vendors/base/vendor.bundle.base.css',
            'resources/admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css',
            'resources/admin/css/style.css',
            'resources/admin/images/favicon.png',
            ])
    @livewireStyles
</head>
<body>

    <div class="container-scroller">
        @include('layouts.inc.admin.navbar')
        <div class="container-fluid page-body-wrapper">
            @include('layouts.inc.admin.sidebar')
            <div class="main-panel">
              <div class="content-wrapper">
                @yield('content')
              </div>
            </div>
        </div>
    </div>

    @vite([
            'resources/admin/vendors/base/vendor.bundle.base.js',
            'resources/admin/vendors/datatables.net/jquery.dataTables.js',
            'resources/admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js',
            'resources/admin/js/off-canvas.js',
            'resources/admin/js/hoverable-collapse.js',
            'resources/admin/js/template.js',
            'resources/admin/js/dashboard.js',
            'resources/admin/js/data-table.js',
            'resources/admin/js/jquery.dataTables.js',
            'resources/admin/js/dataTables.bootstrap4.js'])
    <script src='{{asset('js/jquery-3.7.0.min.js')}}'></script>
    @yield('scripts')
 @livewireScripts
 @stack('script')
</body>
</html>
