<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Pizza') }}</title>
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">
    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <head>
        <!-- Bootstrap CSS (if not already included) -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        
        <!-- DatePicker CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    </head>
    
</head>
<body>
<div id="app">
    <!-- Navbar & Hero Start -->
<div class="container-xxl position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-dark px-4 px-lg-5 py-3 py-lg-0" 
         style="position: absolute; width: 100%; top: 0; margin-top: 0.5%;">
        <div class="container-fluid">
            <a href="{{ url('/') }}" class="navbar-brand mx-auto">
                <img src="https://pizzeria.madrasthemes.com/wp-content/themes/pizzeria/assets/images/logo-white.svg" alt="Pizzeria Logo" style="height: 40px; margin-right: 10px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-white" aria-current="page" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ url('/about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ url('/menu') }}">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ url('/blogs') }}">Blogs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ url('/contact') }}">Contact</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <a href="{{ url('/reservations') }}" class="btn btn-warning me-3">Book A Table</a>
                    <a class="btn text-white me-3" href="{{ url('/search') }}">
                        <i class="fas fa-search"></i>
                    </a>
                    <a class="btn text-white me-3 position-relative" href="{{ url('/cart') }}">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            {{ session('cart') ? array_sum(array_column(session('cart'), 'quantity')) : 0 }}
                        </span>
                    </a>                    
                    @guest
                        <a class="btn text-white" href="{{ route('login') }}">Login</a>
                    @else
                        <div class="nav-item dropdown">
                            <a class="btn btn-outline-warning dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ url('/profile') }}">Profile</a></li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </nav>
</div>


        <main class="py-0">
            @yield('content')
        </main>

<!-- Footer Start -->
<div class="container-fluid text-secondary" style="background-color: #1a1a1a; color: #f1f1f1; margin-top: 90px;">
    <div class="container">
        <div class="row gx-5">
            <div class="col-lg-4 col-md-6 mb-lg-n5">
                <div class="d-flex flex-column align-items-center justify-content-center text-center h-100 bg-dark border-inner p-4 rounded-3 shadow-lg">
                    <a href="{{ url('/') }}" class="navbar-brand mb-3">
                        <h1 class="m-0 text-uppercase text-white">
                            <i class="fa fa-pizza-slice fs-1" style="color: #F5CA48;"></i>Pizzeria
                        </h1>
                    </a>
                    <p class="mt-3 text-light">Experience the best pizzas in town with authentic flavors, handpicked ingredients, and modern ambiance.</p>
                </div>
            </div>
            <div class="col-lg-8 col-md-6">
                <div class="row gx-5">
                    @php
                        // Fetch contact details from the database
                        $contactDetail = \App\Models\ContactDetail::first();
                    @endphp
                    <div class="col-lg-6 col-md-12 pt-5 mb-5">
                        <h4 class="mb-4" style="color: #F5CA48;">Get In Touch</h4>
                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-geo-alt-fill me-3" style="color: #F5CA48;"></i>
                            <p class="mb-0">{{ $contactDetail->address ?? '123 Street, New York, USA' }}</p>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-envelope-fill me-3" style="color: #F5CA48;"></i>
                            <p class="mb-0">{{ $contactDetail->email ?? 'info@example.com' }}</p>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-telephone-fill me-3" style="color: #F5CA48;"></i>
                            <p class="mb-0">{{ $contactDetail->phone_number ?? '+012 345 67890' }}</p>
                        </div>
                        <div class="d-flex mt-4">
                            <a class="btn btn-lg-square rounded-circle me-2 social-btn" href="#" style="background-color: #F5CA48; color: #1a1a1a;"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-lg-square rounded-circle me-2 social-btn" href="#" style="background-color: #F5CA48; color: #1a1a1a;"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-lg-square rounded-circle me-2 social-btn" href="#" style="background-color: #F5CA48; color: #1a1a1a;"><i class="fab fa-linkedin-in"></i></a>
                            <a class="btn btn-lg-square rounded-circle me-2 social-btn" href="#" style="background-color: #F5CA48; color: #1a1a1a;"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 pt-5 mb-5">
                        <h4 class="mb-4 text-warning">Quick Links</h4>
                        <div class="d-flex flex-column">
                            <a class="text-light mb-2 footer-link" href="#" style="text-decoration: none;"><i class="bi bi-arrow-right me-2" style="color: #F5CA48;"></i>About</a>
                            <a class="text-light mb-2 footer-link" href="#" style="text-decoration: none;"><i class="bi bi-arrow-right me-2" style="color: #F5CA48;"></i>Menu</a>
                            <a class="text-light mb-2 footer-link" href="#" style="text-decoration: none;"><i class="bi bi-arrow-right me-2" style="color: #F5CA48;"></i>Reservations</a>
                            <a class="text-light mb-2 footer-link" href="#" style="text-decoration: none;"><i class="bi bi-arrow-right me-2" style="color: #F5CA48;"></i>Blogs</a>
                            <a class="text-light mb-2 footer-link" href="#" style="text-decoration: none;"><i class="bi bi-arrow-right me-2" style="color: #F5CA48;"></i>Contact</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End --> 

<!-- Add this CSS to implement hover effects -->
<style>
    .footer-link {
        transition: color 0.3s ease;
    }
    .footer-link:hover {
        color: #ff6347; /* A modern hover color (Tomato) */
    }
    .social-btn {
        transition: transform 0.3s ease, background-color 0.3s ease;
    }
    .social-btn:hover {
        transform: scale(1.1); /* Slight zoom effect */
        background-color: #ff6347; /* Hover background color */
    }
</style>


    </div>

    <!-- Script Section -->
    <!-- Bootstrap JS and jQuery (if not already included) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>// After adding the item, update the cart count
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll('.add-to-cart-btn').forEach(button => {
            button.addEventListener('click', function (e) {
                e.preventDefault();
                // Perform AJAX request or any logic to add item to cart
                // On success, update the cart count badge
                let cartCount = document.getElementById('cart-count');
                cartCount.innerText = parseInt(cartCount.innerText) + 1;
            });
        });
    });
    </script>

<!-- DatePicker JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybRroKX12A4WXaAO3B9TwG0k6FnE1k5j2crv7Kbh/lU60Rj1g" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-GLklJvOGUEt1EJ1J8PjBTLwW6M2pXtk70ztGJjP7BMkG7asUE0KI5fI2qOHWhgdz" crossorigin="anonymous"></script>
</body>
</html>
