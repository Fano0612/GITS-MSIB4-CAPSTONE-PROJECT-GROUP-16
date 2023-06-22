<?php
if (!auth()->check() || auth()->user()->status != 'active') {
    echo "<script>alert('Please login to access the system');</script>";
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

    <link rel="stylesheet" href="trans_docs/list.css">

</head>

<body>
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
            </div>
        </div>
    </nav>
 <!-- ***** navbar end ***** -->

  <!-- ***** main start ***** -->
    <div class="Cart-Container">
        <div class="container" style="width: 500px; display: inline-block;">
            @php
            $accessRights = auth()->user()->access_rights;
            $transactionData = collect();

            if ($accessRights == 'Merchant') {
            $transactionData = App\Models\Transactions::all()->groupBy('user_id');
            } elseif ($accessRights == 'User') {
            $userId = auth()->user()->id;
            $transactionData = App\Models\Transactions::where('user_id', $userId)->get()->groupBy('user_id');
            }
            @endphp

            @foreach($transactionData as $userId => $transactions)
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-center align-items-center">
                    <div class="mb-2">
                        <div class="fw-bold">{{ $userId }}</div>
                    </div>
                </li>

                @php
                $prevTransactionId = null;
                @endphp

                @foreach($transactions as $td)
                @if($td->transaction_id != $prevTransactionId)
                @if(!is_null($prevTransactionId))
            </ul>
            @endif
            <ul class="list-group">
                <li class="list-group-item fw-bold">
                    Transaction ID: {{ $td->transaction_id }}
                    <span>
                        <a href="{{ route('viewProductTransaction', ['transactionId' => $td->transaction_id]) }}" class="btn btn-info" style="float:right; margin-left: 10px;">
                            View
                        </a>
                        <a href="{{ route('printTransaction', ['transactionId' => $td->transaction_id]) }}" class="btn btn-success" style="float:right">
                            Print
                        </a>
                    </span>
                </li>
                @php
                $prevTransactionId = $td->transaction_id;
                @endphp
                @endif
                <li class="list-group-item d-flex flex-wrap justify-content-between align-items-center">
                    <div class="col-12 col-md-6 mb-2 mb-md-0">
                        <div class="mb-2">
                            Product Name: {{ $td->product_name }}
                        </div>
                        <div class="mb-2">
                            Quantity: {{ $td->quantity }}
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="mb-2">
                            Price: Rp {{ number_format($td->product_price, 0, ',', '.') }}.00
                        </div>
                        <div class="mb-2">
                            Status:
                            <span class="badge bg-primary rounded-pill">{{ $td->transaction_status }}</span>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
            @endforeach
        </div>
    </div>



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