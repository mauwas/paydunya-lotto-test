@extends('admin.layouts.master-layouts')
@section('title') Historique de vos tickets @endsection

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('assets/libs/gridjs/gridjs.min.css') }}">
    <link href="{{ URL::asset('assets/libs/flatpickr/flatpickr.min.css') }}" rel="stylesheet" type="text/css">
@endsection

    @section('content')
    @component('admin.components.breadcrumb')
        @slot('li_1') Tickets @endslot
        @slot('title') Liste @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <div class="col-lg-3">
                            <form class="row gx-3 gy-2 align-items-center" action="{{ route('tickets.index') }}" method="GET">
                                <div class="hstack gap-3">
                                    <input class="form-control me-auto" name="search" value="{{ old('search') }}" type="text" placeholder="N° Ticket...">
                                    <button type="submit" class="btn btn-primary">Rechercher</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>Ticket N°</th>
                                        <th>Numéros</th>
                                        <th>Expire ?</th>
                                        <th>Numéros tiés au sort</th>
                                        <th>Ticket gagnant ?</th>
                                        <th>Date du Tirage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tickets as $ticket)
                                        <tr>
                                            <td>{{  $ticket->code }}</td>
                                            <td>[{{ implode(', ', $ticket->numbers) }}]</td>
                                            <td>
                                                @if($ticket->is_expire)
                                                    <span class="badge text-danger bg-danger-subtle font-size-12">OUI</span>
                                                @else
                                                    <span class="badge text-success bg-success-subtle font-size-12">NON</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($ticket->is_expire)
                                                    [{{ implode(', ', $ticket->drawTicket->draw->winning_numbers) }}]
                                                @else
                                                    ---
                                                @endif
                                            </td>
                                            <td>
                                                @if($ticket->is_expire)
                                                    @if($ticket->drawTicket->is_winner)
                                                        <span class="badge text-success bg-success-subtle font-size-12">
                                                            OUI
                                                        </span>
                                                    @else
                                                        <span class="badge text-danger bg-danger-subtle font-size-12">
                                                            NON
                                                        </span>
                                                    @endif
                                                @else
                                                    ---
                                                @endif
                                            </td>
                                            <td>
                                                @if($ticket->is_expire)
                                                    {{ $ticket->drawTicket->draw->draw_date->format('d/m/Y') }}
                                                @else
                                                     ---
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="mt-5">
                                {{ $tickets->links() }}
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
