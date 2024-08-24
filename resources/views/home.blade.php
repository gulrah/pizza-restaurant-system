@extends('layouts.app')

@section('content')
        <!-- Hero Section -->
        <div class="container-xxl py-5 bg-dark hero-header mb-5" style="background-image: url('https://transvelo.github.io/pizzeria/assets/images/hero-bg.png'); background-size: cover; background-position: center;">
            <div class="container my-5 py-5 text-center">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Authentic Italian Pizzas</h1>
                <p class="text-white mb-4">Pizza Tastes Better Than Skinny Feels</p>
                <a href="{{ url('/reservations') }}" class="btn btn-primary py-sm-3 px-sm-5 me-3">Book A Table</a>
                <a href="{{ url('/menu') }}" class="btn btn-outline-light py-sm-3 px-sm-5">See Menu</a>
            </div>
        </div>
    </div>
    <!-- Navbar & Hero End -->
    <div class="custom-section" style="background-color: #f8f8f8; border-radius: 32px; padding: 40px 15px;">
        <div class="d-flex flex-wrap justify-content-center align-items-center" style="padding-bottom: 21px;">
            <div class="text-center" style="flex-basis: 300px;">
                <figure class="mb-3">
                    <img src="https://pizzeria.madrasthemes.com/wp-content/themes/pizzeria/assets/images/icon-1.svg" alt="Local Pickup" class="img-fluid">
                </figure>
                <p class="font-weight-bold" style="margin-top: 25px; margin-bottom: 13px; font-size: 1rem; line-height: 1.4;">Local Pickup</p>
                <p style="margin-top: 0px; margin-bottom: 0px; font-size: 0.9rem; font-weight: 500; line-height: 1.5;">A neque malesuada in tortor eget justo mauris nec dolor.</p>
            </div>
            <div class="text-center" style="flex-basis: 184px;">
                <figure class="mb-3">
                    <img src="https://pizzeria.madrasthemes.com/wp-content/themes/pizzeria/assets/images/first-arrow.svg" alt="" class="img-fluid">
                </figure>
            </div>
            <div class="text-center" style="flex-basis: 300px;">
                <figure class="mb-3">
                    <img src="https://pizzeria.madrasthemes.com/wp-content/themes/pizzeria/assets/images/icon-2.svg" alt="Live Order Tracking" class="img-fluid">
                </figure>
                <p class="font-weight-bold" style="margin-top: 25px; margin-bottom: 13px; font-size: 1rem; line-height: 1.4;">Live Order Tracking</p>
                <p style="margin-top: 0px; margin-bottom: 0px; font-size: 0.9rem; font-weight: 500; line-height: 1.5;">A neque malesuada in tortor eget justo mauris nec dolor.</p>
            </div>
            <div class="text-center" style="flex-basis: 184px;">
                <figure class="mb-3">
                    <img src="https://pizzeria.madrasthemes.com/wp-content/themes/pizzeria/assets/images/first-arrow.svg" alt="" class="img-fluid">
                </figure>
            </div>
            <div class="text-center" style="flex-basis: 300px;">
                <figure class="mb-3">
                    <img src="https://pizzeria.madrasthemes.com/wp-content/themes/pizzeria/assets/images/icon-3.svg" alt="Fast Delivery" class="img-fluid">
                </figure>
                <p class="font-weight-bold" style="margin-top: 25px; margin-bottom: 13px; font-size: 1rem; line-height: 1.4;">Fast Delivery</p>
                <p style="margin-top: 0px; margin-bottom: 0px; font-size: 0.9rem; font-weight: 500; line-height: 1.5;">A neque malesuada in tortor eget justo mauris nec dolor.</p>
            </div>
        </div>
    </div>
    <div class="custom-offers-section d-flex flex-wrap">
        <div class="offer-card" style="flex: 1; margin-right: 15px;">
            <div class="position-relative" style="border-radius: 16px; overflow: hidden;">
                <img src="https://transvelo.github.io/pizzeria/assets/images/banner-1.png" alt="" class="img-fluid" style="width: 100%; height: auto;">
                <div class="overlay-content" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; padding: 64px; color: white;">
                    <p class="text-secondary" style="font-size: 1.2rem; font-weight: 400;">Special offer</p>
                    <h2 class="font-weight-bold" style="font-size: 2.5rem; font-weight: 600;">Special Delicious</h2>
                    <p style="font-size: 1rem; font-weight: 500;">Mexican Pizza Tastes Better</p>
                    <a href="https://pizzeria.madrasthemes.com/shop/" class="btn btn-primary" style="border-radius: 120px; padding: 14px 30px; font-weight: 600; background-color: #ff5a5f; color: white; text-decoration: none;">
                        Order Now <img src="https://pizzeria.madrasthemes.com/wp-content/themes/pizzeria/assets/images/right-up-black.svg" alt="" style="width: 16px;">
                    </a>
                </div>
            </div>
        </div>
        <div class="offer-card" style="flex: 1; margin-left: 15px;">
            <div class="position-relative" style="border-radius: 16px; overflow: hidden;">
                <img src="https://transvelo.github.io/pizzeria/assets/images/banner-2.png" alt="" class="img-fluid" style="width: 100%; height: auto;">
                <div class="overlay-content" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; padding: 55px; color: white;">
                    <p class="text-secondary" style="font-size: 1.1rem; font-weight: 400;">Free Delivery With</p>
                    <h2 class="font-weight-bold" style="font-size: 2rem; font-weight: 600;">Pizza Of The Day</h2>
                    <p class="font-weight-bold" style="font-size: 1.2rem;">Start At</p>
                    <p style="font-size: 3rem; font-weight: 600;">$32</p>
                    <p style="font-size: 1.2rem;">99</p>
                </div>
            </div>
        </div>
        <div class="offer-card" style="flex: 1; margin-left: 15px;">
            <div class="position-relative" style="border-radius: 16px; overflow: hidden;">
                <img src="https://transvelo.github.io/pizzeria/assets/images/banner-3.png" alt="" class="img-fluid" style="width: 100%; height: auto;">
                <div class="overlay-content" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; padding: 50px; color: white;">
                    <h2 class="font-weight-bold" style="font-size: 2rem; font-weight: 600;">The Fastest In Delivery Food</h2>
                    <a href="https://pizzeria.madrasthemes.com/shop/" class="btn btn-primary" style="border-radius: 120px; padding: 14px 30px; font-weight: 600; background-color: #ff5a5f; color: white; text-decoration: none;">
                        Order Now <img src="https://pizzeria.madrasthemes.com/wp-content/themes/pizzeria/assets/images/right-up-white.svg" alt="" style="width: 16px;">
                    </a>
                </div>
            </div>
        </div>
    </div>
    

        <!-- About Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="row g-3">
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="img/about-1.jpg">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.3s" src="img/about-2.jpg" style="margin-top: 25%;">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s" src="img/about-3.jpg">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.7s" src="img/about-4.jpg">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h5 class="section-title ff-secondary text-start text-primary fw-normal">About Us</h5>
                        <h1 class="mb-4">Welcome to <i class="fa fa-utensils text-primary me-2"></i>Restoran</h1>
                        <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos erat ipsum et lorem et sit, sed stet lorem sit.</p>
                        <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                        <div class="row g-4 mb-4">
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                    <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">15</h1>
                                    <div class="ps-4">
                                        <p class="mb-0">Years of</p>
                                        <h6 class="text-uppercase mb-0">Experience</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                    <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">50</h1>
                                    <div class="ps-4">
                                        <p class="mb-0">Popular</p>
                                        <h6 class="text-uppercase mb-0">Master Chefs</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-primary py-3 px-5 mt-2" href="">Read More</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->

        <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Youtube Video</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- 16:9 aspect ratio -->
                        <div class="ratio ratio-16x9">
                            <iframe class="embed-responsive-item" src="" id="video" allowfullscreen allowscriptaccess="always"
                                allow="autoplay"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Reservation Start -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="app.js"></script>

@endsection
