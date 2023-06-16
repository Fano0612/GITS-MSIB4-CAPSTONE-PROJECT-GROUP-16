<?php
if (!auth()->check() || auth()->user()->status != 'active') {
    echo "<script>alert('Please login to access the system!');</script>";
    echo "<script>setTimeout(function() { window.location.href = '/landing'; }, 1000);</script>";
    die();
}
if (auth()->user()->access_rights != 'User') {
    echo "<script>alert('You are not a User!');</script>";
    echo "<script>setTimeout(function() { window.location.href = '/product_menu'; }, 1000);</script>";
    die();
}
$user = auth()->user();
$profilePicture = $user->picture;

?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

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
    <style>
        .adjustment {
            display: flex;
            align-items: flex-start;
        }

        .navbar{
            background-color: #f89676;
        }

        .card-border {
            border-style: solid;
            flex-wrap: wrap;
            justify-content: center;
            width: fit-content;
            block-size: fit-content;
            border-color: rgb(110, 56, 56);
            margin-top: 30px;
            margin-bottom: 30px;
            margin-right: auto;
            margin-left: auto;
        }

        .card {
            display: inline-block;
            padding: 30px;
            margin: 0px 5px 10px 4px;
        }

        .narrow {
            width: 200px;
            height: 130px;
        }
        .contain {
            object-fit: contain;
        }

        footer {
            background-color: #dd7755;
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

        #scrollToTopBtn,
        #scrollToBottomBtn {
            display: none;
            position: fixed;
            bottom: 70px;
            right: 20px;
            z-index: 99;
            width: 40px;
            height: 40px;
            border: none;
            outline: none;
            background-color: #ffc9b6ba;
            color: #8d3840;
            cursor: pointer;
            border-radius: 50%;
            padding: 0;
        }

        #scrollToTopBtn:hover,
        #scrollToBottomBtn:hover {
            background-color: #8d3840;
        }

        #scrollToTopBtn svg,
        #scrollToBottomBtn svg {
            width: 24px;
            height: 24px;
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <div class="background"></div>

            <!-- ***** scroll start***** -->
    <button onclick="scrollToTop()" id="scrollToTopBtn">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="24" height="24">
            <path d="M12 2L2 12h5v8h10v-8h5L12 2z" />
        </svg>
    </button>

    <button onclick="scrollToBottom()" id="scrollToBottomBtn">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="24" height="24">
            <path d="M12 22L22 12h-5V4H7v8H2l10 10z" />
        </svg>
    </button>
            <!-- ***** scroll end***** -->

            
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
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{route ('product_menu')}}">Manage</a>
                    </li> --}}
                    
                    <!-- ***** category filter ***** -->
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

                </nav>
            </div>
        </div>
    </nav>
 <!-- ***** navbar end ***** -->


    <!-- ***** main start***** -->
 
    <div class="card-body"> 
            <br>
            @if ($products->isEmpty())
            <p>No products found.</p>
            @else
            @foreach($products as $prod)
            @if(!request('category') || request('category') == $prod->category_id)
            <div class="card">
                <img src="{{ URL::asset('images/product_pictures/'.$prod->product_picture) }}" class="contain narrow" alt="">
                <div class="card-body">
                    <h5 class="card-title" style="color: #dd7755">{{ $prod->product_name }}</h5>
                    <p class="card-text">Rp {{ number_format($prod->product_price, 0, ',', '.') }}.00</p>
                    <p class="card-text">Stock: {{ $prod->product_stock }}</p>
                    @if($prod->product_stock > 0)
                    <form action="{{route ('buyproduct')}}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $prod->product_id }}">
                        @if (auth()->user()->access_rights != 'Merchant')
                        <form action="{{ route('buyproduct') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $prod->product_id }}">
                            <button type="submit" class="btn btn-danger" style="width:70px; margin-left:57px; ">Buy</button>
                        </form>
                        @endif
                    </form>
                    @else
                    <p class="card-text text-danger">Out of stock</p>
                    @endif
                </div>
            </div>
            @if(($loop->iteration % 5) == 0)
            <div style="flex-basis: 100%;"></div>
            @endif
            @endif
            @endforeach
            @endif
    </div>


    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="first-item">
                        <div class="logo">
                            <img src="user_docs/images/iii.png" alt="hexashop ecommerce templatemo">
                        </div>
                        <ul>
                            <li><a href="#">Jacob@company.com</a></li>
                            <li><a href="#">022-345-1234</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <h4>Shopping &amp; Categories</h4>
                    <ul>
                        <li><a href="#">Food</a></li>
                        <li><a href="#">Drinks</a></li>
                        <li><a href="#">Dessert</a></li>
                        <li><a href="#">Snacks</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="productlist">Products</a></li>
                        <li><a href="#">productlist</a></li>
                        <li><a href="#">Cart</a></li>
                        <li><a href="#">Transactions List</a></li>
                    </ul>
                </div>
                <div class="col-lg-12">
                    <div class="under-footer">
                        <p>Copyright © 2023 Jacob's F&B.
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-google"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ***** Footer end ***** -->

     <!-- jQuery -->
     <script src="user_docs/js/jquery-2.1.0.min.js"></script>

     <!-- Bootstrap -->
     <script src="user_docs/js/popper.js"></script>
     <script src="user_docs/js/bootstrap.min.js"></script>
 
     <!-- Plugins -->
     <script src="user_docs/js/owl-carousel.js"></script>
     <script src="user_docs/js/accordions.js"></script>
     <script src="user_docs/js/datepicker.js"></script>
     <script src="user_docs/js/scrollreveal.min.js"></script>
     <script src="user_docs/js/waypoints.min.js"></script>
     <script src="user_docs/js/jquery.counterup.min.js"></script>
     <script src="user_docs/js/imgfix.min.js"></script> 
     <script src="user_docs/js/slick.js"></script> 
     <script src="user_docs/js/lightbox.js"></script> 
     <script src="user_docs/js/isotope.js"></script> 
     
     <!-- Global Init -->
     <script src="user_docs/js/custom.js"></script>

     <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);
                
            });
        });

    </script>
 
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    window.onscroll = function() {
        scrollFunction();
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("scrollToTopBtn").style.display = "block";
        } else {
            document.getElementById("scrollToTopBtn").style.display = "none";
        }

        if ((window.innerHeight + window.pageYOffset) >= document.body.offsetHeight) {
            document.getElementById("scrollToBottomBtn").style.display = "none";
        } else {
            document.getElementById("scrollToBottomBtn").style.display = "block";
        }
    }

    function scrollToTop() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }

    function scrollToBottom() {
        window.scrollTo(0, document.body.scrollHeight);
    }
</script>


</html>