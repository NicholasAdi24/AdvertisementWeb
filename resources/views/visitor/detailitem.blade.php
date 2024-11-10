<!-- resources/views/visitor/detailitem.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BULETIN KISS</title>
    <meta name="description" content="Detail page for an advertisement on BULETIN KISS ecommerce site.">
    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- custom css -->
    <link rel="stylesheet" href="{{ asset('css/indexvisitor.css') }}">
    <link rel="icon" href="Zain_Ashraf_Official_Icon.ico">
</head>
<body>
    
    <!-- Navbar -->
    <nav class = "navbar navbar-expand-lg navbar-light bg-white py-4 fixed-top">
        <div class = "container">
            <a class = "navbar-brand d-flex justify-content-between align-items-center order-lg-0">
                <img src = "/images/Frame 3267.png" >
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
                        <a class = "nav-link text-uppercase text-dark" href = "/login">home</a>
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
    <main>
        <div id="itemCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <!-- Image 1 -->
                @if($iklan->image)
                    <div class="carousel-item active carousel-small"> 
                    <img src="{{ asset('storage/' . $iklan->image) }}" >
                    </div>
                @endif
                <!-- Image 2-5 -->
                @for($i = 2; $i <= 5; $i++)
                    @if($iklan->{'image' . $i})
                        <div class="carousel-item carousel-small">
                            <img src="{{ asset('storage/' . $iklan->{'image' . $i}) }}">
                            <div class="container h-100 d-flex align-items-center justify-content-center text-center">
                                <div>
                                    <h1 class="display-4 text-black">{{ $iklan->title }}</h1>
                                    <p class="text-black lead">{{ $iklan->description ?? 'No description available.' }}</p>
                                </div>
                            </div>
                        </div>
                    @endif
                @endfor
            </div>

            <!-- Carousel Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#itemCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#itemCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <section class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <h1 class="mb-3">{{ $iklan->title }}</h1>
            <p> {{ $iklan->genre->genre ?? 'N/A' }}</p>
            <p> {{ $iklan->deskripsi ?? 'No description available.' }}</p>


            <!-- Gallery Section -->
            <div class="row my-4">
                        <h4>Gallery</h4>
                        @for($i = 1; $i <= 5; $i++)
                            @if($iklan->{'galeri' . $i})
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#imageModal{{ $i }}">
                                            <img src="{{ asset('storage/' . $iklan->{'galeri' . $i}) }}" class="card-img-top img-fluid" alt="Gallery Image {{ $i }}">
                                        </a>
                                    </div>
                                </div>

                                <!-- Modal for Full Image -->
                                <div class="modal fade" id="imageModal{{ $i }}" tabindex="-1" aria-labelledby="imageModalLabel{{ $i }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="imageModalLabel{{ $i }}">Gallery Image {{ $i }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-center">
                                                <img src="{{ asset('storage/' . $iklan->{'galeri' . $i}) }}" class="img-fluid" alt="Gallery Image {{ $i }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endfor
                    </div>

            
            <!-- Link Google Maps -->

            <!-- Embed Google Maps -->
            <iframe
                src="{{ $iklan->linkembed }}"
                width="100%" 
                height="450"
                style="border:0;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>

<!-- Floating Instagram Reel -->
<div class="floating-instagram" id="instagramSection">
    <button class="toggle-btn" onclick="toggleInstagram()">></button>
    <div class="instagram-reel">
        <blockquote class="instagram-media" data-instgrm-permalink="{{ $iklan->link_ig }}" data-instgrm-version="12">
            <a href="{{ $iklan->link_ig }}">Lihat postingan ini di Instagram</a>
        </blockquote>
        <script async src="//www.instagram.com/embed.js"></script>
    </div>
</div>
    </div>
</section>


    </main>

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


    <style>
    /* Style for the floating Instagram section */
    .floating-instagram {
        position: fixed;
        top: 15%; /* Adjust the top position as needed */
        right: 0;
        width: 350px; /* Width of the floating box */
        z-index: 1000;
        background-color: white;
        border: 1px solid #ddd;
        padding: 3px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s ease-in-out;
    }

    /* Hidden state */
    .floating-instagram.hidden {
        transform: translateX(100%); /* Moves the section out of view */
    }

    /* Style for the toggle button */
    .toggle-btn {
        position: absolute;
        top: 10px;
        left: -30px; /* Positioning it on the left of the floating box */
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 0 5px 5px 0;
        padding: 5px;
        cursor: pointer;
        font-size: 18px;
    }
</style>

<script>
    function toggleInstagram() {
        const instagramSection = document.getElementById('instagramSection');
        instagramSection.classList.toggle('hidden');

        // Change the button text based on visibility
        const toggleBtn = instagramSection.querySelector('.toggle-btn');
        toggleBtn.textContent = instagramSection.classList.contains('hidden') ? '<' : '>';
    }
</script>





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
