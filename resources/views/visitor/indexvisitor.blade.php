<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BULETIN KISS</title>
    <meta name="description" content="Ecommerce Website Created and Designed by Zain Ashraf. FrontEnd Landing Page of Ecommerce Website">
    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- custom css -->
    <link rel = "stylesheet" href = "{{ asset('css/indexvisitor.css') }}">
    <link rel="icon" href="Zain_Ashraf_Official_Icon.ico">
</head>
<body>
    
    <!-- Navbar -->
    <nav class = "navbar navbar-expand-lg navbar-light bg-white py-4 fixed-top">
        <div class = "container">
            <a class = "navbar-brand d-flex justify-content-between align-items-center order-lg-0">
                <img src = "images/Frame 3267.png" >
            </a>

            <div class = "order-lg-2 nav-btns">
                <!-- <button type = "button" class = "btn position-relative">
                    <i class = "fa fa-shopping-cart"></i>
                    <span class = "position-absolute top-0 start-100 translate-middle badge bg-primary">5</span>
                </button>
                <button type = "button" class = "btn position-relative">
                    <i class = "fa fa-heart"></i>
                    <span class = "position-absolute top-0 start-100 translate-middle badge bg-primary">2</span>
                </button> -->
                <button type = "button" class = "btn position-relative">
                    <i class = "fa fa-search"></i>
                </button>
            </div>

            <button class = "navbar-toggler border-0" type = "button" data-bs-toggle = "collapse" data-bs-target = "#navMenu">
                <span class = "navbar-toggler-icon"></span>
            </button>

            <div class = "collapse navbar-collapse order-lg-1" id = "navMenu">
                <ul class = "navbar-nav mx-auto text-center">
                    <li class = "nav-item px-2 py-2">
                        <a class = "nav-link text-uppercase text-dark" href = "#header">home</a>
                    </li>
                    <li class = "nav-item px-2 py-2">
                        <a class = "nav-link text-uppercase text-dark" href = "#collection">promo</a>
                    </li>
                    <li class = "nav-item px-2 py-2">
                        <a class = "nav-link text-uppercase text-dark" href = "#special">best</a>
                    </li>
                    <li class = "nav-item px-2 py-2">
                        <a class = "nav-link text-uppercase text-dark" href = "#termurah">termurah</a>
                    </li>
                    <li class = "nav-item px-2 py-2">
                        <a class = "nav-link text-uppercase text-dark" href = "#lifestyle">life style</a>
                    </li>
                    <li class = "nav-item px-2 py-2 border-0">
                        <a class = "nav-link text-uppercase text-dark" href = "#popular">popular</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

   
<!-- Header / Carousel -->
<div id="bannerCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach($banners as $key => $banner)
        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}" style="background-image: url('{{ asset('storage/' . $banner->banner_image) }}'); background-position: center; background-size: cover; background-repeat: no-repeat; height: 100vh;">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center">
                    <div class="col-md-10 text-center">
                        <h1 class="display-4">{{ $banner->title }}</h1>
                        @if($banner->subtitle)
                            <p class="lead">{{ $banner->subtitle }}</p>
                        @endif
                        @if($banner->link)
                            <a href="{{ $banner->link }}" class="btn btn-primary mt-4">Shop Now</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Carousel Controls -->
    <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>


    
<section id="collection" class="py-5">
    <div class="container">
        <div class="title d-flex align-items-center justify-content-center py-5">
            <div class="mr-2">
                <img src="icons/coupon.png" alt="Promo Minggu Ini" style="width: 60px; height: 60px;">
            </div>
            <h2 class="m-0">Promo Minggu Ini</h2>
        </div>

        <div class="special-list row g-4">
            <!-- Loop through data from 'iklan' table -->
            @foreach($promoMingguIni as $iklan)
            <div class="col-md-6 col-lg-4 col-xl-3">
                <!-- Tambahkan link ke halaman detailitem -->
                <a href="{{ route('detailitem', ['id' => $iklan->id_iklan]) }}" class="text-decoration-none">
                    <div class="card h-100 shadow-sm card-hover">
                        <!-- Image -->
                        <div class="special-img-wrapper">
                            <div class="special-img position-relative overflow-hidden">
                                <img src="{{ asset('storage/' . $iklan->image) }}" class="card-img-top w-100" alt="{{ $iklan->title }}" style="height: 200px; object-fit: cover;">
                                <span class="position-absolute d-flex align-items-center justify-content-center text-primary fs-4">
                                    
                                </span>
                            </div>
                        </div>

                        <!-- Card Body -->
                        <div class="card-body text-center">
                            <!-- Title -->
                            <h5 class="card-title">{{ $iklan->title }}</h5>

                            <!-- Genre -->
                            <p class="card-text">
                                 {{ $iklan->genre->genre ?? 'N/A' }}
                            </p>

                            <!-- Price (Optional, jika ada) -->
                             <!-- Ganti dengan harga yang sebenarnya jika ada -->
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>


<!-- Collection Section -->
<section id="special" class="py-5">
    <div class="container">
        <div class="title d-flex align-items-center justify-content-center py-5">
            <div class="mr-2">
                <img src="icons/star.png" alt="Promo Minggu Ini" style="width: 60px; height: 60px;">
            </div>
            <h2 class="m-0">Best Sellers & Reccomendations</h2>
        </div>

        <div class="special-list row g-4">
            <!-- Loop through data from 'iklan' table -->
            @foreach($bestSellers as $iklan)
            <div class="col-md-6 col-lg-4 col-xl-3">
                <!-- Tambahkan link ke halaman detailitem -->
                <a href="{{ route('detailitem', ['id' => $iklan->id_iklan]) }}" class="text-decoration-none">
                    <div class="card h-100 shadow-sm card-hover">
                        <!-- Image -->
                        <div class="special-img-wrapper">
                            <div class="special-img position-relative overflow-hidden">
                                <img src="{{ asset('storage/' . $iklan->image) }}" class="card-img-top w-100" alt="{{ $iklan->title }}" style="height: 200px; object-fit: cover;">
                                <span class="position-absolute d-flex align-items-center justify-content-center text-primary fs-4">
                                    
                                </span>
                            </div>
                        </div>

                        <!-- Card Body -->
                        <div class="card-body text-center">
                            <!-- Title -->
                            <h5 class="card-title">{{ $iklan->title }}</h5>

                            <!-- Genre -->
                            <p class="card-text">
                                 {{ $iklan->genre->genre ?? 'N/A' }}
                            </p>

                            <!-- Price (Optional, jika ada) -->
                             <!-- Ganti dengan harga yang sebenarnya jika ada -->
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Collection Section -->
<section id="collection" class="py-5">
    <div class="container">
    <div class="title d-flex align-items-center justify-content-center py-5">
            <div class="mr-2">
                <img src="icons/wallet.png" alt="Promo Minggu Ini" style="width: 60px; height: 60px;">
            </div>
            <h2 class="m-0">Termurah</h2>
        </div>

        <div class="special-list row g-4">
            <!-- Loop through data from 'iklan' table -->
            @foreach($termurah as $iklan)
            <div class="col-md-6 col-lg-4 col-xl-3">
                <!-- Tambahkan link ke halaman detailitem -->
                <a href="{{ route('detailitem', ['id' => $iklan->id_iklan]) }}" class="text-decoration-none">
                    <div class="card h-100 shadow-sm card-hover">
                        <!-- Image -->
                        <div class="special-img-wrapper">
                            <div class="special-img position-relative overflow-hidden">
                                <img src="{{ asset('storage/' . $iklan->image) }}" class="card-img-top w-100" alt="{{ $iklan->title }}" style="height: 200px; object-fit: cover;">
                                <span class="position-absolute d-flex align-items-center justify-content-center text-primary fs-4">
                                    
                                </span>
                            </div>
                        </div>

                        <!-- Card Body -->
                        <div class="card-body text-center">
                            <!-- Title -->
                            <h5 class="card-title">{{ $iklan->title }}</h5>

                            <!-- Genre -->
                            <p class="card-text">
                                 {{ $iklan->genre->genre ?? 'N/A' }}
                            </p>

                            <!-- Price (Optional, jika ada) -->
                             <!-- Ganti dengan harga yang sebenarnya jika ada -->
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Collection Section -->
<section id="collection" class="py-5">
    <div class="container">
    <div class="title d-flex align-items-center justify-content-center py-5">
            <div class="mr-2">
                <img src="icons/lifestyle.png" alt="Promo Minggu Ini" style="width: 60px; height: 60px;">
            </div>
            <h2 class="m-0">Lifestyle</h2>
        </div>

        <div class="special-list row g-4">
            <!-- Loop through data from 'iklan' table -->
            @foreach($lifestyle as $iklan)
            <div class="col-md-6 col-lg-4 col-xl-3">
                <!-- Tambahkan link ke halaman detailitem -->
                <a href="{{ route('detailitem', ['id' => $iklan->id_iklan]) }}" class="text-decoration-none">
                    <div class="card h-100 shadow-sm card-hover">
                        <!-- Image -->
                        <div class="special-img-wrapper">
                            <div class="special-img position-relative overflow-hidden">
                                <img src="{{ asset('storage/' . $iklan->image) }}" class="card-img-top w-100" alt="{{ $iklan->title }}" style="height: 200px; object-fit: cover;">
                                <span class="position-absolute d-flex align-items-center justify-content-center text-primary fs-4">
                                    
                                </span>
                            </div>
                        </div>

                        <!-- Card Body -->
                        <div class="card-body text-center">
                            <!-- Title -->
                            <h5 class="card-title">{{ $iklan->title }}</h5>

                            <!-- Genre -->
                            <p class="card-text">
                                 {{ $iklan->genre->genre ?? 'N/A' }}
                            </p>

                            <!-- Price (Optional, jika ada) -->
                             <!-- Ganti dengan harga yang sebenarnya jika ada -->
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

    <!-- Offers -->
    <section id = "offers" class = "py-5">
        <div class = "container">
            <div class = "row d-flex align-items-center justify-content-center text-center justify-content-lg-start text-lg-start">
                    <!-- <div class = "offers-content">
                        <span class = "text-white">Discount Up To 40%</span>
                        <h2 class = "mt-2 mb-4 text-white">Grand Sale Offer!</h2>
                        <a href = "#" class = "btn">Buy Now</a>
                    </div> -->
            </div>
        </div>
    </section>

    <!-- Blogs -->
    <section id = "blogs" class = "py-5">
        <div class = "container">
            <div class = "title text-center py-5">
                <h2 class = "position-relative d-inline-block">Our Latest Blog</h2>
            </div>

            <div class = "row g-3">
                <div class = "card border-0 col-md-6 col-lg-4 bg-transparent my-3">
                    <img src = "/images/blog_1.jpg" alt = "">
                    <div class = "card-body px-0">
                        <h4 class = "card-title">Lorem ipsum, dolor sit amet consectetur adipisicing</h4>
                        <p class = "card-text mt-3 text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet aspernatur repudiandae nostrum dolorem molestias odio. Sit fugit adipisci omnis quia itaque ratione iusto sapiente reiciendis, numquam officiis aliquid ipsam fuga.</p>
                        <p class = "card-text">
                            <small class = "text-muted">
                                <span class = "fw-bold">Author: </span>Zain Ashraf
                            </small>
                        </p>
                        <a href = "#" class = "btn">Read More</a>
                    </div>
                </div>

                <div class = "card border-0 col-md-6 col-lg-4 bg-transparent my-3">
                    <img src = "/images/blog_2.jpg" alt = "">
                    <div class = "card-body px-0">
                        <h4 class = "card-title">Lorem ipsum, dolor sit amet consectetur adipisicing</h4>
                        <p class = "card-text mt-3 text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet aspernatur repudiandae nostrum dolorem molestias odio. Sit fugit adipisci omnis quia itaque ratione iusto sapiente reiciendis, numquam officiis aliquid ipsam fuga.</p>
                        <p class = "card-text">
                            <small class = "text-muted">
                                <span class = "fw-bold">Author: </span>Zain Ashraf
                            </small>
                        </p>
                        <a href = "#" class = "btn">Read More</a>
                    </div>
                </div>

                <div class = "card border-0 col-md-6 col-lg-4 bg-transparent my-3">
                    <img src = "/images/blog_3.jpg" alt = "">
                    <div class = "card-body px-0">
                        <h4 class = "card-title">Lorem ipsum, dolor sit amet consectetur adipisicing</h4>
                        <p class = "card-text mt-3 text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet aspernatur repudiandae nostrum dolorem molestias odio. Sit fugit adipisci omnis quia itaque ratione iusto sapiente reiciendis, numquam officiis aliquid ipsam fuga.</p>
                        <p class = "card-text">
                            <small class = "text-muted">
                                <span class = "fw-bold">Author: </span>Zain Ashraf
                            </small>
                        </p>
                        <a href = "#" class = "btn">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About us -->
    <section id = "about" class = "py-5">
        <div class = "container">
            <div class = "row gy-lg-5 align-items-center">
                <div class = "col-lg-6 order-lg-1 text-center text-lg-start">
                    <div class = "title pt-3 pb-5">
                        <h2 class = "position-relative d-inline-block ms-4">About Us</h2>
                    </div>
                    <p class = "lead text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis, ipsam.</p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem fuga blanditiis, modi exercitationem quae quam eveniet! Minus labore voluptatibus corporis recusandae accusantium velit, nemo, nobis, nulla ullam pariatur totam quos.</p>
                </div>
                <div class = "col-lg-6 order-lg-0">
                    <img src = "/images/about_us.jpg" alt = "" class = "img-fluid">
                </div>
            </div>
        </div>
    </section>

    <!-- Popular -->
    <section id = "popular" class = "py-5">
        <div class = "container">
            <div class = "title text-center pt-3 pb-5">
                <h2 class = "position-relative d-inline-block ms-4">Semua Iklan</h2>
            </div>

            <div class = "row">
                <div class = "col-md-6 col-lg-4 row g-3">
                    <h3 class = "fs-5">Top Rated</h3>
                    <div class = "d-flex align-items-start justify-content-start">
                        <img src = "/images/top_rated_1.jpg" alt = "" class = "img-fluid pe-3 w-25">
                        <div>
                            <p class = "mb-0">Blue Shirt</p>
                            <span>$ 20.00</span>
                        </div>
                    </div>
                    <div class = "d-flex align-items-start justify-content-start">
                        <img src = "/images/top_rated_2.jpg" alt = "" class = "img-fluid pe-3 w-25">
                        <div>
                            <p class = "mb-0">Blue Shirt</p>
                            <span>$ 20.00</span>
                        </div>
                    </div>
                    <div class = "d-flex align-items-start justify-content-start">
                        <img src = "/images/top_rated_3.jpg" alt = "" class = "img-fluid pe-3 w-25">
                        <div>
                            <p class = "mb-0">Blue Shirt</p>
                            <span>$ 20.00</span>
                        </div>
                    </div>
                </div>

                <div class = "col-md-6 col-lg-4 row g-3">
                    <h3 class = "fs-5">Best Selling</h3>
                    <div class = "d-flex align-items-start justify-content-start">
                        <img src = "/images/best_selling_1.jpg" alt = "" class = "img-fluid pe-3 w-25">
                        <div>
                            <p class = "mb-0">Blue Shirt</p>
                            <span>$ 20.00</span>
                        </div>
                    </div>
                    <div class = "d-flex align-items-start justify-content-start">
                        <img src = "/images/best_selling_2.jpg" alt = "" class = "img-fluid pe-3 w-25">
                        <div>
                            <p class = "mb-0">Blue Shirt</p>
                            <span>$ 20.00</span>
                        </div>
                    </div>
                    <div class = "d-flex align-items-start justify-content-start">
                        <img src = "/images/best_selling_3.jpg" alt = "" class = "img-fluid pe-3 w-25">
                        <div>
                            <p class = "mb-0">Blue Shirt</p>
                            <span>$ 20.00</span>
                        </div>
                    </div>
                </div>

                <div class = "col-md-6 col-lg-4 row g-3">
                    <h3 class = "fs-5">On Sale</h3>
                    <div class = "d-flex align-items-start justify-content-start">
                        <img src = "/images/on_sale_1.jpg" alt = "" class = "img-fluid pe-3 w-25">
                        <div>
                            <p class = "mb-0">Blue Shirt</p>
                            <span>$ 20.00</span>
                        </div>
                    </div>
                    <div class = "d-flex align-items-start justify-content-start">
                        <img src = "/images/on_sale_2.jpg" alt = "" class = "img-fluid pe-3 w-25">
                        <div>
                            <p class = "mb-0">Blue Shirt</p>
                            <span>$ 20.00</span>
                        </div>
                    </div>
                    <div class = "d-flex align-items-start justify-content-start">
                        <img src = "/images/on_sale_3.jpg" alt = "" class = "img-fluid pe-3 w-25">
                        <div>
                            <p class = "mb-0">Blue Shirt</p>
                            <span>$ 20.00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter -->
    <section id = "newsletter" class = "py-5">
        <div class = "container">
            <div class = "d-flex flex-column align-items-center justify-content-center">
                <div class = "title text-center pt-3 pb-5">
                    <h2 class = "position-relative d-inline-block ms-4">Newsletter Subscription</h2>
                </div>

                <p class = "text-center text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Possimus rem officia accusantium maiores quisquam dolorum?</p>
                <div class = "input-group mb-3 mt-3">
                    <input type = "text" class = "form-control" placeholder="Enter Your Email ...">
                    <button class = "btn btn-primary" type = "submit">Subscribe</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class = "bg-dark pt-5">
        <div class = "container pb-4">
            <div class = "row text-white g-4">
                <div class = "col-md-6 col-lg-3">
                    <a class = "text-uppercase text-decoration-none brand text-white" href = "https://zainashrafofficial.com">BULETIN KISS</a>
                    <p class = "text-white text-muted mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum mollitia quisquam veniam odit cupiditate, ullam aut voluptas velit dolor ipsam?</p>
                </div>

                <div class = "col-md-6 col-lg-3">
                    <h5 class = "fw-light">Links</h5>
                    <ul class = "list-unstyled">
                        <li class = "my-3">
                            <a href = "#" class = "text-white text-decoration-none text-muted">
                                <i class = "fas fa-chevron-right me-1"></i> Home
                            </a>
                        </li>
                        <li class = "my-3">
                            <a href = "#" class = "text-white text-decoration-none text-muted">
                                <i class = "fas fa-chevron-right me-1"></i> Collection
                            </a>
                        </li>
                        <li class = "my-3">
                            <a href = "#" class = "text-white text-decoration-none text-muted">
                                <i class = "fas fa-chevron-right me-1"></i> Blogs
                            </a>
                        </li>
                        <li class = "my-3">
                            <a href = "#" class = "text-white text-decoration-none text-muted">
                                <i class = "fas fa-chevron-right me-1"></i> About Us
                            </a>
                        </li>
                    </ul>
                </div>

                <div class = "col-md-6 col-lg-3">
                    <h5 class = "fw-light mb-3">Contact Us</h5>
                    <div class = "d-flex justify-content-start align-items-start my-2 text-muted">
                        <span class = "me-3">
                            <i class = "fas fa-map-marked-alt"></i>
                        </span>
                        <span class = "fw-light">
                            Surakarta, Jawa Tengah
                        </span>
                    </div>
                    <div class = "d-flex justify-content-start align-items-start my-2 text-muted">
                        <span class = "me-3">
                            <i class = "fas fa-envelope"></i>
                        </span>
                        <span class = "fw-light">
                            admin@gmail.com
                        </span>
                    </div>
                    <div class = "d-flex justify-content-start align-items-start my-2 text-muted">
                        <span class = "me-3">
                            <i class = "fas fa-phone-alt"></i>
                        </span>
                        <span class = "fw-light">
                            +62 321 0000259
                        </span>
                    </div>
                </div>

                <div class = "col-md-6 col-lg-3">
                    <h5 class = "fw-light mb-3">Follow Us</h5>
                    <div>
                        <ul class = "list-unstyled d-flex">
                            <li>
                                <a href = "#" class = "text-white text-decoration-none text-muted fs-4 me-4">
                                    <i class = "fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href = "#" class = "text-white text-decoration-none text-muted fs-4 me-4">
                                    <i class = "fab fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href = "https://www.instagram.com/buletin_kiss/" class = "text-white text-decoration-none text-muted fs-4 me-4">
                                    <i class = "fab fa-instagram"></i>
                                </a>
                            </li>
                            <li>
                                <a href = "#" class = "text-white text-decoration-none text-muted fs-4 me-4">
                                    <i class = "fab fa-pinterest"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <section class="Footer-Zain">
          <h2>  All Rights Reserved by  <b><em><a href="https://zainashrafofficial.com/"> BULETIN KISS</a></em></b>  </h2>
        </section>
    </footer>




    <!-- jQuery CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- isotope js -->
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
    <!-- Bootstrap CDN Js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js" integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- custom js -->
    <script src = "script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js" integrity="sha512-something" crossorigin="anonymous"></script>

</body>
</html>