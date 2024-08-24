@extends('layouts.app')

@section('content')
<body>
<!-- About Us Section -->
<div class="container-xxl py-5 bg-dark hero-header mb-5" 
     style="background-image: url('https://transvelo.github.io/pizzeria/assets/images/blog-hero.jpg'); 
            background-size: cover; background-position: center; height: 50vh;">
    <div class="container my-5 py-5 text-center">
        <h1 class="display-3 text-white mb-3 animated slideInDown">About us</h1>
        <p class="text-white mb-4">Lorem ipsum dolor sit amet consectetur adipisicing.</p>
    </div>
</div>

<!-- Service Section Start -->
<div class="container-xxl py-5">
    <div class="container">
        <h2 class="text-center mb-4 text-white">Our Services</h2>
        <div class="row g-4">
            <div class="col-lg-3 col-sm-6 mb-4">
                <div class="service-item rounded bg-white shadow-sm p-4 text-center">
                    <i class="fa fa-3x fa-user-tie text-primary mb-3"></i>
                    <h5 class="mb-3">Master Chefs</h5>
                    <p class="text-muted">Our team of master chefs ensures the highest quality dishes with the finest ingredients.</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 mb-4">
                <div class="service-item rounded bg-white shadow-sm p-4 text-center">
                    <i class="fa fa-3x fa-utensils text-primary mb-3"></i>
                    <h5 class="mb-3">Quality Food</h5>
                    <p class="text-muted">Every dish served is of the highest quality, prepared with fresh and premium ingredients.</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 mb-4">
                <div class="service-item rounded bg-white shadow-sm p-4 text-center">
                    <i class="fa fa-3x fa-cart-plus text-primary mb-3"></i>
                    <h5 class="mb-3">Online Order</h5>
                    <p class="text-muted">Conveniently order your favorite dishes online and have them delivered straight to your doorstep.</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 mb-4">
                <div class="service-item rounded bg-white shadow-sm p-4 text-center">
                    <i class="fa fa-3x fa-headset text-primary mb-3"></i>
                    <h5 class="mb-3">24/7 Service</h5>
                    <p class="text-muted">Our support team is available around the clock to assist with any inquiries or concerns.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service Section End -->
@endsection
