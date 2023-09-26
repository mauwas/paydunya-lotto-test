@extends('layouts.master-without_nav')

@section('title') Verify Password @endsection

@section('body')

    <body class="auth-body-bg">
    @endsection

@section('content')

        <div class="authentication-bg min-vh-100">
            <div class="bg-overlay"></div>
            <div class="container">
                <div class="d-flex flex-column min-vh-100 px-3 pt-4">
                    <div class="row justify-content-center my-auto">
                        <div class="col-md-8 col-lg-6 col-xl-5">

                            <div class="text-center mb-4">
                                <a href="index">
                                    <img src="{{ URL::asset('assets/images/logo-sm.svg') }}" alt="" height="22"> <span class="logo-txt">Symox</span>
                                </a>
                        </div>

                            <div class="card">
                                <div class="card-body p-4">
                                    <div class="text-center mt-2">
                                        <h5 class="text-primary"> Verify Password</h5>
                                        <p class="text-muted">Re-Password with Symox.</p>
                                    </div>
                                    <div class="p-2 mt-4">
                                        <div class="alert alert-success text-center small mb-4" role="alert">
                                            Enter your Email and instructions will be sent to you!
                                        </div>
                                        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="username">email</label>
                                                <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" @if (old('email')) value="{{ old('email') }}" @endif id="email" placeholder="Enter email" autocomplete="email" autofocus>
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <div class="mt-3 text-end">
                                                <button class="btn btn-primary w-sm waves-effect waves-light" type="submit">Reset</button>
                                            </div>

                                            <div class="mt-4 text-center">
                                                <p class="mb-0">Remember It ? <a href="{{ url('login') }}" class="fw-medium text-primary"> Sign in </a></p>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>

                        </div><!-- end col -->
                    </div><!-- end row -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-center text-muted p-4">
                                <p class="text-white-50">© <script>document.write(new Date().getFullYear())</script> Symox. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div><!-- end container -->
        </div>

@endsection
