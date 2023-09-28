@extends('layouts.home')
@section('content')
     <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                <h1>Loto en ligne : votre billet vers la richesse est à portée de clic. <i class="fas fa-hand-point-right"></i></h1>
                <h2>Les prochains tirages sont prévus pour le Mardi, {{ $tuesday->format('d/m/Y') }} et le vendredi, {{  $friday->format('d/m/Y') }} à 12h</h2>
                <div class="d-flex justify-content-center justify-content-lg-start">
                    <a href="{{ url('results') }}" class="btn-get-started scrollto">Vérifier votre ticket</a>
                </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img mt-20" data-aos="zoom-in" data-aos-delay="200">
                    @if($draw && $draw->winning_numbers)
                        <div class="lottery-results">
                            @foreach($draw->winning_numbers as $number)
                                <div class="number">{{ $number }}</div>
                            @endforeach
                        </div>
                    @endif
                    @if($jackpot)
                        <div class="section-title mt-5">
                            <h2>Jackpot : {{ $jackpot->amount }} FR CFA</h2>
                        </div>
                    @endif
                {{-- <img src="{{ asset('front/assets/img/hero-img.png') }}" class="img-fluid animated" alt=""> --}}
                </div>
            </div>

        </div>
    </section><!-- End Hero -->

    <main id="main">
         <!-- ======= Services Section ======= -->
        <section id="services" class="services section-bg">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h2>Comment jouer ?</h2>
                </div>

                <div class="row">
                <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box">
                    <div class="icon"><i class="bx bxl-dribbble"></i></div>
                    <h4><a href="#">1. Accéder à votre compte</a></h4>
                    <p>Pour jouer à PayDunya Lotto, vous devez créé un compte en ligne. Vous avez accès ensuite pour le paiement de votre ticket</p>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
                    <div class="icon-box">
                    <div class="icon"><i class="bx bx-file"></i></div>
                    <h4><a href="#">2. Pari</a></h4>
                    <p>Choisisser vos 7 numéros de pari et procéder au paiement en ligne
                        </p>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-tachometer"></i></div>
                        <h4><a href="#">3. Tirage</a></h4>
                        <p>
                            Les tirages sont effectués chaque Mardi et vendredi à 12h. Tous les participants seront notifiés par email.
                        </p>
                    </div>
                </div>

                <div
                    class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0"
                    data-aos="zoom-in"
                    data-aos-delay="400"
                >
                    <div class="icon-box">
                        <div class="icon"><i class="bx bx-layer"></i></div>
                        <h4><a href="#">Gain</a></h4>
                        <p>
                            A la fin de chaque tirage, les participants gagnants reçoivent leurs gains
                        </p>
                    </div>
                </div>

                </div>

            </div>
        </section><!-- End Services Section -->

        <!-- ======= Why Us Section ======= -->
        <section id="why-us" class="why-us section-bg">
            <div class="container-fluid" data-aos="fade-up">
                <div class="row">
                    <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">
                        <div class="content">
                            <h3><strong>Distribution des gains</strong></h3>
                            <p>La cagnotte de départ est fixée à 20 millions de FCFA. Pour chaque tirage : </p>
                        </div>
                        <div class="accordion-list">
                            <ul>
                                <li>
                                    <a data-bs-toggle="collapse" class="collapse" data-bs-target="#accordion-list-1"><span>01</span> Pas de gagnant ? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                                    <div id="accordion-list-1" class="collapse show" data-bs-parent=".accordion-list">
                                        <p>Si aucun gagnant n'est sélectionné, la cagnotte augmente de 5 millions de FCFA
                                            pour le tirage suivant
                                        </p>
                                    </div>
                                </li>

                                <li>
                                    <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2" class="collapsed">
                                        <span>02</span> Un seul gagnant ?
                                        <i class="bx bx-chevron-down icon-show"></i>
                                        <i class="bx bx-chevron-up icon-close"></i>
                                    </a>
                                    <div id="accordion-list-2" class="collapse" data-bs-parent=".accordion-list">
                                        <p>Si un gagnant a été sélectionné, la cagnotte devra
                                            être réinitialisée à 20 millions de FCFA pour le prochain tirage.
                                        </p>
                                    </div>
                                </li>

                                <li>
                                    <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3" class="collapsed">
                                        <span>03</span> Plusieurs gagnants ?
                                        <i class="bx bx-chevron-down icon-show"></i>
                                        <i class="bx bx-chevron-up icon-close"></i>
                                    </a>
                                    <div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
                                        <p>
                                            Si nous avons plusieurs gagnants, la cagnotte devra être partagée équitablement,
                                            la cagnotte devra être réinitialisée à 20 millions de FCFA pour le prochain tirage.
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img"
                        style='background-image: url("front/assets/img/why-us.png");'
                        data-aos="zoom-in" data-aos-delay="150">&nbsp;
                    </div>
                </div>
            </div>
        </section><!-- End Why Us Section -->

        <!-- ======= Pricing Section ======= -->
        <section id="pricing" class="pricing">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Combien ça coute ?</h2>
                </div>

                <div class="row">
                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">

                    </div>
                    <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="200">
                        <div class="box featured">
                        <h3>Tickets</h3>
                        <h4><sup>Fr CFA</sup>500<span>par Ticket</span></h4>
                        <ul>
                            <li><i class="bx bx-check"></i> 1 Ticket</li>
                            <li><i class="bx bx-check"></i> 7 Numéros</li>
                            <li><i class="bx bx-check"></i> 1 Tirage</li>
                        </ul>
                        @guest
                            <a href="{{ url('/login') }}" class="buy-btn">Parier</a>
                        @else
                            <a href="{{ url('/buy-ticket') }}" class="buy-btn">Parier</a>
                        @endguest
                        </div>
                    </div>
                    <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="300">

                    </div>
                </div>

            </div>
        </section><!-- End Pricing Section -->

        {{-- <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
            <h2>Contact</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
            </div>

            <div class="row">

            <div class="col-lg-5 d-flex align-items-stretch">
                <div class="info">
                <div class="address">
                    <i class="bi bi-geo-alt"></i>
                    <h4>Location:</h4>
                    <p>A108 Adam Street, New York, NY 535022</p>
                </div>

                <div class="email">
                    <i class="bi bi-envelope"></i>
                    <h4>Email:</h4>
                    <p>info@example.com</p>
                </div>

                <div class="phone">
                    <i class="bi bi-phone"></i>
                    <h4>Call:</h4>
                    <p>+1 5589 55488 55s</p>
                </div>

                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
                </div>

            </div>

            <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
                <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                <div class="row">
                    <div class="form-group col-md-6">
                    <label for="name">Your Name</label>
                    <input type="text" name="name" class="form-control" id="name" required>
                    </div>
                    <div class="form-group col-md-6">
                    <label for="name">Your Email</label>
                    <input type="email" class="form-control" name="email" id="email" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name">Subject</label>
                    <input type="text" class="form-control" name="subject" id="subject" required>
                </div>
                <div class="form-group">
                    <label for="name">Message</label>
                    <textarea class="form-control" name="message" rows="10" required></textarea>
                </div>
                <div class="my-3">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your message has been sent. Thank you!</div>
                </div>
                <div class="text-center"><button type="submit">Send Message</button></div>
                </form>
            </div>

            </div>

        </div>
        </section><!-- End Contact Section --> --}}

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-12 col-md-12 footer-contact text-center">
                        <h3>PayDunya Lotto</h3>
                        <p>
                        XXXXXXX<br>
                        XXXXXXXXXXX<br>
                        <strong>Email:</strong> XXXXXXXXX<br>
                        <strong>Téléphone:</strong> XXXXXXXXX<br>
                        </p>
                    </div>



                    <div class="col-lg-12 col-md-12 text-center">
                        <img src="{{  asset('assets/images/bouton-senegal-02.png') }}" class="mx-auto" alt="">
                    </div>

                </div>
            </div>
        </div>

        <div class="container footer-bottom clearfix">
            <div class="copyright">
                &copy; Copyright <strong><span>PayDunya</span></strong>. Tous droits réservés.
            </div>
            <div class="credits">

            </div>
        </div>
    </footer><!-- End Footer -->
    <div id="preloader"></div>
@stop
