@extends('admin.layouts.master-layouts')
@section('title') Tableau de bord @endsection

@section('content')
    @component('admin.components.breadcrumb')
        @slot('li_1') @endslot
        @slot('title') Tableau de bord @endslot
    @endcomponent

    <div class="row">
        <div class="col-xl-4">
            <div class="card bg-primary">
                <div class="card-body">
                    <div class="text-center py-3">
                        <ul class="bg-bubbles ps-0">
                            <li><i class="bx bx-grid-alt font-size-24"></i></li>
                            <li><i class="bx bx-tachometer font-size-24"></i></li>
                            <li><i class="bx bx-store font-size-24"></i></li>
                            <li><i class="bx bx-cube font-size-24"></i></li>
                            <li><i class="bx bx-cylinder font-size-24"></i></li>
                            <li><i class="bx bx-command font-size-24"></i></li>
                            <li><i class="bx bx-hourglass font-size-24"></i></li>
                            <li><i class="bx bx-pie-chart-alt font-size-24"></i></li>
                            <li><i class="bx bx-coffee font-size-24"></i></li>
                            <li><i class="bx bx-polygon font-size-24"></i></li>
                        </ul>
                        <div class="main-wid position-relative">
                            <h3 class="text-white">Tableau de board</h3>

                            <h3 class="text-white mb-0"> PayDunya Lotto !</h3>

                            <p class="text-white-50 px-4 mt-4">La Chance au Bout des Doigts : Jouez, Gagnez, Réalisez vos Rêves !</p>

                            <div class="mt-4 pt-2 mb-2">
                                <a href="#" class="btn btn-success">Votre profil<i class="mdi mdi-arrow-right ms-1"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="avatar">
                                <span class="avatar-title bg-soft-primary rounded">
                                    <i class="mdi mdi-shopping-outline text-primary font-size-24"></i>
                                </span>
                            </div>
                            <p class="text-muted mt-4 mb-0">Today Orders</p>
                            <h4 class="mt-1 mb-0">3,89,658 <sup class="text-success fw-medium font-size-14"><i class="mdi mdi-arrow-down"></i> 10%</sup></h4>
                            <div>
                                <div class="py-3 my-1">
                                    <div id="mini-1" data-colors='["#3980c0"]'></div>
                                </div>
                                <ul class="list-inline d-flex justify-content-between justify-content-center mb-0">
                                    <li class="list-inline-item"><a href="" class="text-muted">Day</a></li>
                                    <li class="list-inline-item"><a href="" class="text-muted">Week</a></li>
                                    <li class="list-inline-item"><a href="" class="text-muted">Month</a></li>
                                    <li class="list-inline-item"><a href="" class="text-muted">Year</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="avatar">
                                <span class="avatar-title bg-soft-success rounded">
                                    <i class="mdi mdi-eye-outline text-success font-size-24"></i>
                                </span>
                            </div>
                            <p class="text-muted mt-4 mb-0">Today Visitor</p>
                            <h4 class="mt-1 mb-0">1,648,29 <sup class="text-danger fw-medium font-size-14"><i class="mdi mdi-arrow-down"></i> 19%</sup></h4>
                            <div>
                                <div class="py-3 my-1">
                                    <div id="mini-2" data-colors='["#33a186"]'></div>
                                </div>
                                <ul class="list-inline d-flex justify-content-between justify-content-center mb-0">
                                    <li class="list-inline-item"><a href="" class="text-muted">Day</a></li>
                                    <li class="list-inline-item"><a href="" class="text-muted">Week</a></li>
                                    <li class="list-inline-item"><a href="" class="text-muted">Month</a></li>
                                    <li class="list-inline-item"><a href="" class="text-muted">Year</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="avatar">
                                <span class="avatar-title bg-soft-primary rounded">
                                    <i class="mdi mdi-rocket-outline text-primary font-size-24"></i>
                                </span>
                            </div>
                            <p class="text-muted mt-4 mb-0">Total Expense</p>
                            <h4 class="mt-1 mb-0">6,48,249 <sup class="text-success fw-medium font-size-14"><i class="mdi mdi-arrow-down"></i> 22%</sup></h4>
                            <div>
                                <div class="py-3 my-1">
                                    <div id="mini-3" data-colors='["#3980c0"]'></div>
                                </div>
                                <ul class="list-inline d-flex justify-content-between justify-content-center mb-0">
                                    <li class="list-inline-item"><a href="" class="text-muted">Day</a></li>
                                    <li class="list-inline-item"><a href="" class="text-muted">Week</a></li>
                                    <li class="list-inline-item"><a href="" class="text-muted">Month</a></li>
                                    <li class="list-inline-item"><a href="" class="text-muted">Year</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="avatar">
                                <span class="avatar-title bg-soft-success rounded">
                                    <i class="mdi mdi-account-multiple-outline text-success font-size-24"></i>
                                </span>
                            </div>
                            <p class="text-muted mt-4 mb-0">New Users</p>
                            <h4 class="mt-1 mb-0">$5,265,3 <sup class="text-danger fw-medium font-size-14"><i class="mdi mdi-arrow-down"></i> 18%</sup></h4>
                            <div>
                                <div class="py-3 my-1">
                                    <div id="mini-4" data-colors='["#33a186"]'></div>
                                </div>
                                <ul class="list-inline d-flex justify-content-between justify-content-center mb-0">
                                    <li class="list-inline-item"><a href="" class="text-muted">Day</a></li>
                                    <li class="list-inline-item"><a href="" class="text-muted">Week</a></li>
                                    <li class="list-inline-item"><a href="" class="text-muted">Month</a></li>
                                    <li class="list-inline-item"><a href="" class="text-muted">Year</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/chartjs.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/dashboard.init.js') }}"></script>
    <script src="{{ URL::asset('assets/js/app.js') }}"></script>
@endsection
