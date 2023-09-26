@extends('admin.layouts.master-without_nav')

@section('title')@lang('translation.Error_500')@endsection

@section('content')

    <div class="authentication-bg min-vh-100" style="background: url(./assets/images/auth-bg.jpg) bottom;">
        <div class="bg-overlay bg-light"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-8">
                    <div class="home-wrapper text-center">
                        <div>
                            <div class="row justify-content-center">
                                <div class="col-sm-9">
                                    <div class="error-img">
                                        <img src="{{ URL::asset('assets/images/500-img.png') }}" alt=""
                                            class="img-fluid mx-auto d-block">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h4 class="text-uppercase mt-5">Internal Server Error</h4>
                        <p class="text-muted">It will be as simple as Occidental in fact, it will be Occidental</p>
                        <div class="mt-5">
                            <a class="btn btn-primary waves-effect waves-light" href="/">Back to Dashboard</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
