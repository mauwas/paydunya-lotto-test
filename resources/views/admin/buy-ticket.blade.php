@extends('admin.layouts.master-layouts')
@section('title') Paiement Ticket @endsection

@section('content')
    @component('admin.components.breadcrumb')
        @slot('li_1') @endslot
        @slot('title') Paiement Ticket @endslot
    @endcomponent

    <div class="row">
        <div class="col-xl-8">
            <div class="custom-accordion">
                <div class="card">
                    <a href="#checkout-billinginfo-collapse" class="text-dark" data-bs-toggle="collapse">
                        <div class="p-4">

                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 me-3">
                                    <i class="bx bxs-receipt text-primary h2"></i>
                                </div>
                                <div class="flex-grow-1 overflow-hidden">
                                    <h5 class="font-size-16 mb-1">Paiement de ticket</h5>
                                    <p class="text-muted text-truncate mb-0">Payer votre ticket pour participer au prochain tirage</p>
                                </div>
                                <div class="flex-shrink-0">
                                    <i class="mdi mdi-chevron-up accor-down-icon font-size-24"></i>
                                </div>
                            </div>

                        </div>
                    </a>

                    <div id="checkout-billinginfo-collapse" class="collapse show">
                        <div class="p-4 border-top">
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
                            @if($ticket)
                                <div class="alert alert-warning text-center">
                                    <p> Impossible d'accéder au formulaire de paiement du Ticket, vous disposez déjà d'un ticket qui est
                                        valide pour le prochain tirage du PayDunya Lotto</p>
                                    <p><strong>Ticket N° {{ $ticket->code }}, Numéros joueur : [{{ implode(', ', $ticket->numbers) }}]</strong></p>
                                </div>
                            @else
                                <form method="POST" action="{{ route('process-payment') }}">
                                    @csrf
                                    <div class="alert alert-info">
                                        <h5>Entrer vos numéros</h5>
                                        <p>Saisis 7 numéros entre 1 et 50</p>
                                    </div>
                                    <div class="alert">
                                        <div class="row">
                                            @for ($i = 1; $i <= 7; $i++)
                                                <input
                                                    class="form-control"
                                                    style="width:50px;height:50px;border-radius:.5rem;border: 2px solid #3498db;;margin-right:10px"
                                                    id="number{{ $i }}"
                                                    name="numbers[]"
                                                    placeholder="{{ $i }}"
                                                    min="1"
                                                    max="50"
                                                    value="{{ old('numbers.' . ($i - 1)) }}"
                                                    type="text"
                                                    inputmode="numeric"
                                                >
                                            @endfor
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
                                        <button class="btn btn-success">
                                            <i class="mdi mdi-cart-outline me-1"></i> Procéder au paiement </button>
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card checkout-order-summary">
                <div class="card-body">
                    <div class="p-3 bg-light mb-4">
                        <div class="alert alert-primary">
                            La Cagnotte disponible pour le prochain tirages
                        </div>
                        <h5 class="font-size-16 mb-0">Jackpot
                            <span class="float-end ms-2">CFA,
                                @if($jackpot)
                                    {{  $jackpot->amount }}
                                @else
                                    ---
                                @endif
                            </span>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script src="{{ URL::asset('assets/js/app.js') }}"></script>
@endsection
