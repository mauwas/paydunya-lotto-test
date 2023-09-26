<!doctype html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <head>
            <meta charset="utf-8" />
            <title> @yield('title') | {{ config('app.name', 'Laravel') }} </title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
            <meta content="Themesbrand" name="author" />
            <link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico') }}">
            <!-- CSRF Token -->
            <meta name="csrf-token" content="{{ csrf_token() }}">
            @include('admin.layouts.head-css')
        </head>

    @section('body')
        @include('admin.layouts.body')
    @show
        @yield('content')
        @include('admin.layouts.vendor-scripts')
    </body>
</html>
