@extends('layouts.app')

@section('content')
<body>
<!-- About Us Hero Section -->
<div class="container-xxl py-5 bg-dark hero-header mb-5" 
     style="background-image: url('https://transvelo.github.io/pizzeria/assets/images/blog-hero.jpg'); 
            background-size: cover; background-position: center; height: 50vh;">
    <div class="container my-5 py-5 text-center">
        <h1 class="display-3 text-white mb-3 animated slideInDown">About Us</h1>
        <p class="text-white mb-4">A passion for authentic food, crafted with care and served with pride.</p>
    </div>
</div>

<!-- Our Story Section -->
<div class="container py-5">
    <div class="row align-items-center">
        <div class="col-lg-6">
            <img class="img-fluid rounded shadow-lg" src="images/Pepperoni.webp" alt="About Us">
        </div>
        <div class="col-lg-6">
            <h2 class="text-danger text-uppercase mb-4">Our Story</h2>
            <p class="text-muted mb-4">Founded in 2010, our restaurant has been driven by a passion for quality and authentic flavors. With a mission to deliver a memorable dining experience, we pride ourselves on using fresh, locally sourced ingredients to create exquisite dishes. From humble beginnings to being a staple in the community, we strive to make every visit special.</p>
            <a href="{{ url('/menu') }}" class="btn btn-danger rounded-pill px-4 py-2">Explore Our Menu</a>
        </div>
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

<!-- Testimonials Section Start -->
<div class="container-xxl py-5 bg-dark text-white">
    <div class="container">
        <h2 class="text-center text-danger mb-5">Customer Reviews</h2>
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="testimonial-item bg-light text-dark p-4 rounded">
                    <p>"The best dining experience I've had in years. The food was superb and the service was exceptional."</p>
                    <h5 class="mb-1">Emily Rogers</h5>
                    <small class="text-muted">Food Critic</small>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="testimonial-item bg-light text-dark p-4 rounded">
                    <p>"A cozy and welcoming atmosphere paired with mouth-watering dishes. I’ll definitely be back!"</p>
                    <h5 class="mb-1">Michael Brown</h5>
                    <small class="text-muted">Local Diner</small>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="testimonial-item bg-light text-dark p-4 rounded">
                    <p>"The flavors were rich and authentic. It felt like a real treat, and I highly recommend this place."</p>
                    <h5 class="mb-1">Sarah Walker</h5>
                    <small class="text-muted">Blogger</small>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonials Section End -->

@endsection

<!-- Additional CSS for Styling -->
<style>
    .team-item img {
        transition: transform 0.3s ease;
    }

    .team-item:hover img {
        transform: scale(1.05);
    }

    .testimonial-item {
        border-left: 4px solid #dc3545;
    }

    .gallery img {
        transition: all 0.3s ease;
    }

    .gallery img:hover {
        transform: scale(1.05);
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.2);
    }
</style>
