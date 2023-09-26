@extends('admin.layouts.master-layouts')
@section('title') @lang('translation.Tabs_&_Accordions') @endsection

@section('content')
    @component('admin.components.breadcrumb')
    @slot('li_1') Transactions @endslot
    @slot('title') Remboursement @endslot
    @endcomponent

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Demande de paiement</h4>
                </div>
                <div class="card-body">
                    <div>
                        @if (Session::has('success'))
                            <div class="alert alert-success text-center">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        @if (Session::has('error'))
                            <div class="alert alert-danger text-center">
                                {{ Session::get('error') }}
                            </div>
                        @endif
                    </div>
                    <form method="POST" action="{{ route('transactions.store') }}">
                        @csrf
                        <div class="text-muted mb-5">
                            <span class="badge bg-success font-size-18 me-1">
                            <i class="mdi mdi-star"></i> Votre Solde : {{ $account->amount }} FR CFA</span>
                        </div>
                        @unless($account->amount > 0)
                            <div class="alert alert-danger">
                                Vous ne disposez pas suffisament de fonds pour effectuer une demande de paiement.
                            </div>
                        @endunless
                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Montant</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" value="{{ old('amount') }}" name="amount" id="example-text-input">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="example-text-input" class="col-md-2 col-form-label">Adresse email</label>
                            <div class="col-md-10">
                                <input class="form-control" type="text" value="{{ old('account') }}" name="account" id="example-text-input">
                            </div>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger mt-4">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="text-end mt-2 mt-sm-0">
                            @if($account->amount > 0)
                                <button class="btn btn-success" type="submit">
                                    <i class="mdi mdi-cart-outline me-1"></i> Valider
                                </button>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div>

@endsection
@section('script')
    <script src="{{ URL::asset('assets/js/app.js') }}"></script>
@endsection
