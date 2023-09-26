<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8" />
        <title> @yield('title') | {{ config('app.name', 'Laravel') }} </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="https://paydunya.com/refont/images/favicon/favicon-96x96.png">
        @include('admin.layouts.head-css')
    </head>

<body data-layout="vertical" data-sidebar="dark">
    <div id="layout-wrapper">
        @include('admin.layouts.topbar')
        @include('admin.layouts.sidebar')
        @include('admin.layouts.horizontal')

            <div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </div>
                @include('admin.layouts.footer')
            </div>
        </div>
        @include('admin.layouts.right-sidebar')
        @include('admin.layouts.vendor-scripts')
    </body>
</html>
