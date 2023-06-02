<?php
if (!auth()->check() || auth()->user()->status != 'active') {
    echo "<script>alert('Please login to access the system!');</script>";
    echo "<script>setTimeout(function() { window.location.href = '/login'; }, 1000);</script>";
    die();
}

$user = auth()->user();
$profilePicture = $user->picture;
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jacob's F&B</title>
    <link rel="icon" type="image/x-icon" href="landing_docs/images/ini.png">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="user_docs/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="user_docs/css/font-awesome.css">

    <link rel="stylesheet" href="user_docs/css/templatemo-hexashop.css">

    <link rel="stylesheet" href="user_docs/css/owl-carousel.css">

    <link rel="stylesheet" href="user_docs/css/lightbox.css">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('home_docs/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('home_docs/css/bootstrap.min.css') }}">

    <style>

        .navbar{
            background-color: #f89676;
        }

        .carousel {
            width: 100vw;
            overflow: hidden;
        }

        .carousel-inner {
            text-align: center;
        }

        .carousel-inner .item img {
            display: block;
            margin: auto;
            padding-bottom: 0;
        }

        .carousel-control {
            position: absolute;
            top: 30%;
            transform: translateY(-50%);
        }

        .carousel-control.left {
            left: 0;
        }

        .carousel-control.right {
            right: 0;
        }

        .carousel-caption {
            position: absolute;
            width: 500px;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            padding: 10px;
            text-shadow: 2px 2px 4px rgb(255, 255, 255);
            color: #ffffff;
            font-size: 1.75rem;
        }

        @media (max-width: 767px) {
            #myCarousel img {
                max-height: 300px;
                width: auto;
            }
        }

        .categories {
            margin: 0;

            padding: 0;

            min-height: 100vh;

            display: flex;

            align-items: center;

            justify-content: center;

            font-family: sans-serif;
            background: transparent;
            border-style: solid;

        }

        .categories .card .icon {

            position: absolute;

            top: 0;

            left: 0;

            width: 100%;

            height: 100%;

            background: #2c73df;

        }

        .categories .card .icon .fa {

            position: absolute;

            top: 50%;

            left: 50%;

            transform: translate(-50%, -50%);

            font-size: 80px;

            color: #fff;

        }

        .categories .card .slide {

            width: 300px;

            height: 200px;

            transition: 0.5s;

        }

        .categories .card .slide.slide1 {

            position: relative;

            display: flex;

            justify-content: center;

            align-items: center;

            z-index: 1;

            transition: .7s;

            transform: translateY(100px);

        }

        .categories .card:hover .slide.slide1 {

            transform: translateY(0px);

        }

        .categories .card .slide.slide2 {

            position: relative;

            display: flex;

            justify-content: center;

            align-items: center;

            padding: 20px;

            box-sizing: border-box;

            transition: .8s;

            transform: translateY(-100px);

            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);

        }

        .categories .card:hover .slide.slide2 {

            transform: translateY(0);

        }

        .categories .card .slide.slide2::after {

            content: "";

            position: absolute;

            width: 30px;

            height: 4px;

            bottom: 15px;

            left: 50%;

            left: 50%;

            transform: translateX(-50%);

            background: #2c73df;

        }

        .categories .card .slide.slide2 .content p {

            margin: 0;

            padding: 0;

            text-align: center;

            color: #414141;

        }

        .categories .card .slide.slide2 .content h3 {

            margin: 0 0 10px 0;

            padding: 0;

            font-size: 24px;

            text-align: center;

            color: #414141;

        }

        .hr1 {
            padding: 0;
            margin: 0;
        }

        footer {
            background-color: rgba(255, 255, 255, 0.7);
        }

        .h1-footer {
            color: rgb(152, 255, 200);
            text-align: center;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }

        .text-muted {
            text-align: center;
            color: white;
        }

        img.sosimg {
            height: 20px;
            width: 20px;
            margin-right: 2px;
        }

        .card-border {
            border-style: solid;
            flex-wrap: wrap;
            justify-content: center;
            width: fit-content;
            block-size: fit-content;
            border-color: rgba(255, 255, 255);
            margin-top: 30px;
            margin-bottom: 30px;
            margin-right: auto;
            margin-left: auto;
        }

        .card {
            display: inline-block;
            margin: 10px;

        }
    </style>

</head>

<body>
    <!-- ***** Header Area Start ***** -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <nav class="navbar">
                <div class="container">
                    <a class="navbar-brand" href="{{route ('productlist')}}">
                        <img src="user_docs/images/iii.png" alt="" width="62" height="62">
                    </a>
                </div>
            </nav>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-center text-lg-start">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route ('homepage')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route ('productlist')}}">Products</a>
                    </li>
                    <div class="dropdown" style="margin: 1px 6px 22px 4px">
                        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Category
                        </button>
                        <ul class="dropdown-menu">
                            @php
                            $categories = App\Models\Category::all();
                            @endphp
                            <li><a class="dropdown-item" href="{{ route('productlist') }}">All</a></li>
                            @foreach($categories as $category)
                            <li><a class="dropdown-item" href="{{ route('productlist', ['category' => $category->id]) }}">{{ $category->product_category }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- ***** category filter end***** -->
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route ('showProductCart')}}">Cart</a>
                        &nbsp; &nbsp;
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="{{route ('transaction_list')}}">Transactions</a>
                    </li>


                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{route ('category')}}">Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{route ('transaction_list')}}">Transactions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{route ('balance_sheet')}}">Monetary</a>
                    </li> --}}
                </ul>

                     <!-- ***** profile start ***** -->
                    <div class="dropdown ml-auto" style="margin-left: auto;">
                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{ URL::asset('images/'.$profilePicture) }}" alt="" width="60" height="55" style="border-radius: 50%;">
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            @if (auth()->check())
                            <a class="dropdown-item" href="{{route ('editprofile')}}">Hello <b>{{ auth()->user()->username }}</a>
                            @endif
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route ('logout')}}">Logout</a>
                        </div>
                    </div>
                    <!-- ***** profile end ***** -->
            </div>
        </div>
    </nav>
 <!-- ***** navbar end ***** -->

    <!-- Home Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100" src="{{ asset('home_docs/images/draft/ini.png') }}" alt="" style="object-fit: contain;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <br><br><br><br>
                    <h6 class="section-title bg-white text-start text-primary pe-3">Hello</h6>
                    <h1 class="mb-4">Welcome to <span class="text-primary">Jacob's F&B</span></h1>
                    <h6 class="section-title bg-white text-start text-primary pe-3">Something Special In The Good Taste!</h6>
                </div>
            </div>
        </div>
    </div>
    <!-- Home End -->

     <!-- carousel start -->
     <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="7000">
                <img src="{{ asset('home_docs/images/product/cocktail.jpg') }}" >
                <div class="carousel-caption d-none d-md-block mb-5">
                    <h2>Cocktail</h2>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="7000">
                <img src="{{ asset('home_docs/images/product/lemonsoda.jpg') }}">
                <div class="carousel-caption d-none d-md-block mb-5">
                    <h2>Lemon Soda</h2>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="7000">
                <img src="{{ asset('home_docs/images/product/sushi.jpg') }}" >
                <div class="carousel-caption d-none d-md-block mb-5">
                    <h2>Sushi</h2>
                </div>
            </div>
        </div>
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- carousel end -->

       <!-- Discount Start -->
       <div class="container-xxl py-5 destination">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Product</h6>
                <h1 class="mb-5">Discount</h1>
            </div>
            <div class="row g-3">
                <div class="col-lg-7 col-md-6">
                    <div class="row g-3">
                        <div class="col-lg-12 col-md-12 wow zoomIn" data-wow-delay="0.1s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img class="img-fluid" src="{{ asset('home_docs/images/product/ramen.jpg') }}" alt="">
                                <div class="bg-white text-danger fw-bold position-absolute top-0 start-0 m-3 py-1 px-2">10% OFF</div>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.3s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img class="img-fluid" src="{{ asset('home_docs/images/product/icecream.jpg') }}" alt="">
                                <div class="bg-white text-danger fw-bold position-absolute top-0 start-0 m-3 py-1 px-2">20% OFF</div>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.5s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img class="img-fluid" src="{{ asset('home_docs/images/product/satee.jpg') }}" alt="">
                                <div class="bg-white text-danger fw-bold position-absolute top-0 start-0 m-3 py-1 px-2">15% OFF</div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 wow zoomIn" data-wow-delay="0.7s" style="min-height: 350px;">
                    <a class="position-relative d-block h-100 overflow-hidden" href="">
                        <img class="img-fluid position-absolute w-100 h-100" src="{{ asset('home_docs/images/product/steak.jpg') }}" alt="" style="object-fit: cover;">
                        <div class="bg-white text-danger fw-bold position-absolute top-0 start-0 m-3 py-1 px-2">5% OFF</div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Discount End -->

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="home_docs/lib/wow/wow.min.js"></script>
    <script src="home_docs/lib/easing/easing.min.js"></script>
    <script src="home_docs/lib/waypoints/waypoints.min.js"></script>
    <script src="home_docs/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="home_docs/lib/tempusdominus/js/moment.min.js"></script>
    <script src="home_docs/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="home_docs/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="home_docs/js/main.js"></script>
</body>

</html>




</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


</html>