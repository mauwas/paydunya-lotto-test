@extends('admin.layouts.master-layouts')
@section('title') Historique de vos transactions @endsection

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('assets/libs/gridjs/gridjs.min.css') }}">
    <link href="{{ URL::asset('assets/libs/flatpickr/flatpickr.min.css') }}" rel="stylesheet" type="text/css">
@endsection

    @section('content')
    @component('admin.components.breadcrumb')
        @slot('li_1') Transactions @endslot
        @slot('title') Liste @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <div class="text-muted mb-5">
                            <span class="badge bg-success font-size-18 me-1">
                            <i class="mdi mdi-star"></i> Votre Solde : {{ $account->amount }} FR CFA</span>
                        </div>
                        <div class="col-lg-6">
                            <form class="row gx-3 gy-2 align-items-center" action="{{ route('transactions.index') }}" method="GET">
                                <div class="hstack gap-3">
                                    <input class="form-control me-auto" name="search" value="{{ old('search') }}" type="text" placeholder="Recherche...">
                                    <button type="submit" class="btn btn-primary">Rechercher</button>
                                    <div class="vr"></div>
                                    <a href="{{ route('transactions.create') }}" class="btn btn-warning">Paiement</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>Type</th>
                                        <th>Montant</th>
                                        <th>Description</th>
                                        <th>Date opération</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transactions as $transaction)
                                        <tr>
                                            <th>{{  $transaction->type }}</th>
                                            <td>
                                                @if($transaction->type == "debit")
                                                    <span class="badge text-danger bg-danger-subtle font-size-12"> - {{  $transaction->amount }} FR CFA</span>
                                                @else
                                                    <span class="badge text-success bg-success-subtle font-size-12"> + {{  $transaction->amount }} FR CFA</span>
                                                @endif
                                            </td>
                                            <th>{{  $transaction->description }}</th>
                                            <th>{{  $transaction->created_at->format('d/m/Y H:i') }}</th>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="mt-5">
                                {{ $transactions->links() }}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script src="{{ URL::asset('assets/js/app.js') }}"></script>
@endsection
