<?php
if (!auth()->check() || auth()->user()->status != 'active') {
    echo "<script>alert('Please login to access the system');</script>";
    echo "<script>setTimeout(function() { window.location.href = '/login'; }, 1000);</script>";
    die();
}
if (auth()->user()->access_rights != 'Merchant') {
    echo "<script>alert('You are not a merchant!');</script>";
    echo "<script>setTimeout(function() { window.location.href = '/homepage'; }, 1000);</script>";
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
    <link rel="shortcut icon" type="image/png" href="admin/images/logos/logo1.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .navbar{
            background-color: #f89676;
        }
        
        .card-border {
            border-style: solid;
            flex-wrap: wrap;
            justify-content: center;
            width: fit-content;
            block-size: fit-content;
            border-color: rgb(0, 0, 0);
            margin-top: 30px;
            margin-bottom: 30px;
            margin-right: auto;
            margin-left: auto;
        }
    </style>

</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <nav class="navbar">
                <div class="container">
                    <a class="navbar-brand" href="{{route ('productlist')}}">
                        <img src="{{ URL::asset('admin/images/logos/logo1.png') }}" alt="" width="60" height="55" style="border-radius: 50%;">
                    </a>
                </div>
            </nav>
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-center text-lg-start">

                    <li class="nav-item">
                        <a class="nav-link active" href="{{route ('category')}}">Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route ('product_menu')}}">Manage</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page " href="{{route ('transaction_list_admin')}}">Transactions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route ('balance_sheet')}}">Monetary</a>
                    </li>
                </ul>
                <nav class="navbar navbar-expand-lg">
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

    <div class="mt-5 mb-5 text-center">
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
                        <a href="{{ route('viewProductTransactionAdmin', ['transactionId' => $td->transaction_id]) }}" class="btn btn-info" style="float:right; margin-left: 10px;">
                            View
                        </a>
                        <a href="{{ route('printTransactionAdmin', ['transactionId' => $td->transaction_id]) }}" class="btn btn-success" style="float:right">
                            Print
                        </a>
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

</html>