@extends('layouts.home')
@section('content')
     <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center" style="height: 15vh !important">
    </section><!-- End Hero -->

    <main id="main">
         <!-- ======= Services Section ======= -->
        <section id="services" class="services section-bg">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Consultation des résultats</h2>
                </div>

                <div class="mb-5">
                    <form method="GET" action="{{ route('results') }}">
                        <label for="ticket">Status ticket :</label>
                        <input type="text" name="ticket" value="{{ old('ticket') }}" placeholder="Code ticket">
                        <button type="submit">Vérifier</button> 
                        @if($ticket && $ticket->drawTicket && $ticket->drawTicket->is_winner) 
                            <span class="badge text-success bg-success-subtle font-size-12">Félicitation !. Votre ticket fait partie des heureux gagnant</span>
                        @endif
                        @if($ticket && $ticket->drawTicket && !$ticket->drawTicket->is_winner)
                            <span class="badge text-danger bg-danger-subtle font-size-12">Oups vous ne faite pas partie des heureux gagnant</span>
                        @endif
                
                    </form>
                </div>

                <div class="row">
                    @foreach ($draws as $draw)
                        <div class="col-xl-3 col-md-3 mb-3 d-flex align-items-stretch">
                            <div class="icon-box">
                                <h4><a href="#">Tirage du : {{ $draw->draw_date->format('d/m/y') }}</a></h4>
                                <p>Gagnants : [{{ implode(', ', $draw->winning_numbers) }}]</p>
                                <p>Total participants : {{ count($draw->drawTickets) }}</p>
                            </div>
                        </div>
                    @endforeach
                    <div class="mt-5">
                        {{ $draws->links() }}
                    </div>
                </div>

            </div>
        </section><!-- End Services Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container footer-bottom clearfix">
            <div class="copyright">
                &copy; Copyright <strong><span>PayDunya</span></strong>. Tous droits réservés.
            </div>
            <div class="credits">

            </div>
        </div>
    </footer><!-- End Footer -->
@stop
