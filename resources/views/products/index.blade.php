@extends('partials.main')

@section('content')

<div class="container-fluid mt-4">
    <!-- Categories -->
    <div class="d-flex justify-content-center flex-wrap">
        <!-- Mobile Category -->
        <div class="col-6 col-md-4 col-lg-2 mb-4 mx-2">
            <div class="category-card">
                <img src="{{ asset('front-image/mobile.webp') }}" alt="Mobile" class="img-fluid">
                <div class="category-card-title">Mobile</div>
            </div>
        </div>
        <!-- Laptops Category -->
        <div class="col-6 col-md-4 col-lg-2 mb-4 mx-2">
            <div class="category-card">
                <img src="{{ asset('front-image/laptop.webp') }}" alt="Laptops" class="img-fluid">
                <div class="category-card-title">Laptops</div>
            </div>
        </div>
        <!-- Electronics Category -->
        <div class="col-6 col-md-4 col-lg-2 mb-4 mx-2">
            <div class="category-card">
                <img src="{{ asset('front-image/groccerry.webp') }}" alt="Grocery" class="img-fluid">
                <div class="category-card-title">Grocery</div>
            </div>
        </div>
        <!-- Fashion Category -->
        <div class="col-6 col-md-4 col-lg-2 mb-4 mx-2">
            <div class="category-card">
                <img src="{{ asset('front-image/fashion.jpg') }}" alt="Fashion" class="img-fluid">
                <div class="category-card-title">Fashion</div>
            </div>
        </div>
        <!-- Home & Furniture Category -->
        <div class="col-6 col-md-4 col-lg-2 mb-4 mx-2">
            <div class="category-card">
                <img src="{{ asset('front-image/home.webp') }}" alt="Home & Furniture" class="img-fluid">
                <div class="category-card-title">Home & Furniture</div>
            </div>
        </div>
    </div>

    <!-- Carousel -->
    <div class="container-fluid p-0 m-0">
        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('front-image/amazon-trending.webp') }}" class="d-block w-100" alt="Trending" height="425">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('front-image/home decor.jpg') }}" class="d-block w-100" alt="Home Decor" height="425">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('front-image/image.jpg') }}" class="d-block w-100" alt="Image">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <!-- Product Cards -->
    <div class="container mt-4">
        <h2 class="combo-title">Best of Electronics</h2>
        <div class="row">
            @foreach ($product as $item)
            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="card m-3">
                    <i class="fas fa-heart wishlist-icon"></i>
                    <img src="{{ $item->product_image }}" class="card-img-top" alt="{{ $item->product_name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->product_name }}</h5>
                        <p class="card-text">Price: ₹ {{ $item->product_price }}</p>
                        <div class="card-buttons">
                            <a href="#" class="btn btn-outline-secondary">Cart</a>
                            <a href="#" class="btn btn-outline-primary ml-2">Buy</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- About Us Section -->
    <div class="container about-section">
        <h2 class="about-title">About Us</h2>
        <div class="about-content">
            <p>Welcome to Sharma's Store, your number one source for all things electronics, fashion, and more. We're dedicated to giving you the very best of electronic devices, with a focus on quality, customer service, and uniqueness.</p>
            <p>Founded in 2024, Sharma's Store has come a long way from its beginnings. When we first started, our passion for electronic products, grocery products, and home essentials drove us to start our own business. We now serve customers all over Gujarat and India, and are thrilled to be a part of the e-commerce industry.</p>
            <p>We hope you enjoy our products as much as we enjoy offering them to you. If you have any questions or comments, please don't hesitate to contact us.</p>
        </div>
    </div>

    <!-- Contact Us Section -->
    <div class="container contact-section">
        <h2 class="contact-title">Contact Us</h2>
        <div class="contact-info">
            <p><strong>Email:</strong> darshanvaland143@gmail.com</p>
            <p><strong>Mobile:</strong> +91 8238270948</p>
            <p>We'd love to hear from you! For any inquiries, please feel free to reach out to us via email or phone.</p>
        </div>
        <div class="social-media">
            <p>Follow us on social media:</p>
            <a href="https://facebook.com/yourstore" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>
            <a href="https://twitter.com/yourstore" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a>
            <a href="https://instagram.com/yourstore" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a>
            <a href="https://linkedin.com/company/yourstore" target="_blank" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
        </div>
    </div>  
</div>

@endsection
