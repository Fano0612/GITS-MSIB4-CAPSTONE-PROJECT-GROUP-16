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
    <title>G.16 Food & Bev's.</title>
    <link rel="icon" type="image/x-icon" href="{{ URL::asset('https://www.theworlds50best.com/filestore/png/SRA-Logo-1.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .background {
            position: fixed;
            background-size: cover;
            top: 0;
            left: 0;
            z-index: -1;
            width: 100%;
            height: 100%;
            background-image: url('https://wallpaper.dog/large/1423.png');
            filter: blur(5px);
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
            text-shadow: 2px 2px 4px black;
            color: #ffffff;
            font-size: 1.75rem;
            background-color: rgb(255, 255, 255, 0.4);
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


    <div class="background"></div>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <nav class="navbar bg-body-tertiary">
                <div class="container">
                    <a class="navbar-brand" href="{{route ('homepage')}}">
                        <img src="{{ URL::asset('https://marketplace.canva.com/EAEzOw_ovvE/1/0/1600w/canva-watercolor-food-logo-0GcpZ9_7Xls.jpg') }}" alt="" width="60" height="55" style="border-radius: 50%;">
                    </a>
                </div>
            </nav>
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-center text-lg-start">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route ('homepage')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route ('productlist')}}">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route ('product_menu')}}">Manage</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{route ('category')}}">Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{route ('transaction_list')}}">Transactions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="{{route ('balance_sheet')}}">Monetary</a>
                    </li>
                </ul>
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a href="{{route ('showProductCart')}}">
                        <i class="fa fa-shopping-cart" style="font-size:36px"></i>
                    </a>
                    &nbsp; &nbsp;
                    <div class="dropdown ml-auto" style="margin-left: auto;">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{ URL::asset('images/'.$profilePicture) }}" alt="" width="60" height="55" style="border-radius: 50%;">
                        </button>
                        <div class="dropdown-menu dropdown-menu-right position-relative" aria-labelledby="dropdownMenuButton">
                            @if (auth()->check())
                            <a class="dropdown-item" href="{{route ('editprofile')}}">Hello <b>{{ auth()->user()->username }}</a>
                            @endif
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route ('logout')}}">Logout</a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </nav>

    <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="7000">
                <img src="https://assets.vogue.com/photos/5f22ce57512a74568845a5ca/4:3/w_2664,h_1998,c_limit/17-off-white-backstage-menss20-acielle.jpg" class="d-block w-100" alt="" style="width:100%; height:400px; object-fit: cover;">
                <div class="carousel-caption d-none d-md-block mb-5">
                    <h2>Off White</h2>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="7000">
                <img src="https://us.louisvuitton.com/images/is/image/lv/1/PP_VP_L/louis-vuitton--W_Fa_Wild_at_Heart_DI1.jpg?wid={IMG_WIDTH}&hei={IMG_HEIGHT}" class="d-block w-100" alt="" style="width:100%; height:400px; object-fit: cover;">
                <div class="carousel-caption d-none d-md-block mb-5">
                    <h2>Louis Vuitton</h2>
                </div>
            </div>
            <div class="carousel-item" data-bs-interval="7000">
                <img src="https://static01.nyt.com/images/2022/12/01/multimedia/30gucci-1-0a1d/30gucci-1-0a1d-superJumbo.jpg" class="d-block w-100" alt="" style="width:100%; height:400px; object-fit: cover;">
                <div class="carousel-caption d-none d-md-block mb-5">
                    <h2>Gucci</h2>
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


</body>

</html>




</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


</html>