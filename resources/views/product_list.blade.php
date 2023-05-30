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
        .adjustment {
            display: flex;
            align-items: flex-start;
        }

        .background {
            position: fixed;
            background-size: cover;
            top: 0;
            left: 0;
            z-index: -1;
            width: 100%;
            height: 100%;
            background-image: url('https://media-cldnry.s-nbcnews.com/image/upload/newscms/2023_05/1963490/puff-pastry-beef-wellington-valentines-day-2x1-zz-230201.jpg');
            filter: blur(5px);
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
            background-color: #555;
            color: #fff;
            cursor: pointer;
            border-radius: 50%;
            padding: 0;
        }

        #scrollToTopBtn:hover,
        #scrollToBottomBtn:hover {
            background-color: #777;
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
                        <a class="nav-link" href="{{route ('homepage')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{route ('productlist')}}">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route ('product_menu')}}">Manage</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route ('category')}}">Category</a>
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


    <div class="adjustment">
        <img class="imgone" src="https://media.voguebusiness.com/photos/607f3e087faa95508b216455/2:3/w_2560%2Cc_limit/kering-earnings-voguebus-vanessa-charlot-for-gucci-apr-21-story.jpg" alt="" style="width:250px; height:100%; float: left; margin-top: 30px; margin-left:30px;">

        <div class="card-border">
            <div class="dropdown" style="margin: 20px 10px 0px 10px">
                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Filter
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
            <br>
            @if ($products->isEmpty())
            <p>No products found.</p>
            @else
            @foreach($products as $prod)
            @if(!request('category') || request('category') == $prod->category_id)
            <div class="card" style="width: 18rem;">
                <img src="{{ URL::asset('images/product_pictures/'.$prod->product_picture) }}" class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title">{{ $prod->product_name }}</h5>
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
                            <button type="submit" class="btn btn-primary">Buy</button>
                        </form>
                        @endif
                    </form>
                    @else
                    <p class="card-text text-danger">Out of stock</p>
                    @endif
                </div>
            </div>
            @if(($loop->iteration % 3) == 0)
            <div style="flex-basis: 100%;"></div>
            @endif
            @endif
            @endforeach
            @endif
        </div>

        <img class="imgtwo" src="https://assets.vogue.com/photos/5602abd41422670c16303aa3/master/w_1280%2Cc_limit/_GUC0031.jpg" alt="" style="width:250px; height:100%; float: right; margin-top: 30px;margin-right:30px;">
    </div>





</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    window.addEventListener("scroll", scrollFunction);

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