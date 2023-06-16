<?php
if (!auth()->check() || auth()->user()->status != 'active') {
    echo "<script>alert('Please login to access the system!');</script>";
    echo "<script>setTimeout(function() { window.location.href = '/login'; }, 1000);</script>";
    die();
}
if (auth()->user()->access_rights != 'Merchant') {
    echo "<script>alert('You are not a merchant!');</script>";
    echo "<script>setTimeout(function() { window.location.href = '/homepage'; }, 1000);</script>";
    die();
}
?>

<!doctype html>
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
        .card-header {
            text-align: center;
            background-color: #f89676;
        }

        h3{
            text-align: center;
        }

        .ini {
            margin: 10px 0px 0px 480px;
        }

        .btn{
            text-align: center;
            margin-left: 100px;
            background-color: #f97c53
        }  
    </style>

</head>

<body>
    <div class="card">
        <div class="card-header">
            <h3>Transaction Details</h3>
        </div>
        <div class="card-body ini">
            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">Transaction ID:</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    {{ $transaction->transaction_id }}
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">User:</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    {{ $transaction->user->username }}
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">Transaction Status:</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    {{ $transaction->transaction_status }}
                </div>
            </div>

            <?php
            $transactions = \App\Models\Transactions::where('transaction_id', $transaction->transaction_id)->get();
            $total = 0;

            foreach ($transactions as $t) {
                $total += $t->product_price * $t->quantity;
            }
            ?>

            <?php
            $tax = $total * 0.1;
            $total += $tax;
            ?>


            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">Total Transaction:</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    Rp {{ number_format($total, 0, ',', '.') }}.00
                </div>
            </div>



            @foreach(\App\Models\Transactions::where('transaction_id', $transaction->transaction_id)->get() as $transaction)
            <div class="card" style="width: 18rem; margin-bottom: 9px;">
                <img src="{{ URL::asset('images/product_pictures/'.$transaction->product_picture)  }}" class="card-img-top" alt="">
                <div class="card-body">
                    <h5 class="card-title">{{ $transaction->product_name }}</h5>
                    <p class="card-text">Product ID: {{ $transaction->product_id }}</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Transaction ID: {{ $transaction->transaction_id }}</li>
                    <li class="list-group-item">Transaction Status: {{ $transaction->transaction_status }}</li>
                    <li class="list-group-item">Quantity: {{ $transaction->quantity }}</li>
                    <li class="list-group-item">Total Price: Rp {{ number_format($transaction->product_price* $transaction->quantity, 0, ',', '.') }}.00</li>
                </ul>
            </div>
            @endforeach



            <div class="row mb-3">
                <div class="col-sm-3">
                    <a class="btn" href="{{route ('transaction_list_admin')}}" role="button">Return</a>
                </div>
            </div>
        </div>
    </div>

</body>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</html>