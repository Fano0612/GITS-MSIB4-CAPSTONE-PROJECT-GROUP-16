<?php
if (!auth()->check() || auth()->user()->status != 'active') {
    echo "<script>alert('Please login to access the system');</script>";
    echo "<script>setTimeout(function() { window.location.href = '/login'; }, 1000);</script>";
    die();
}
?>

<?php
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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jacob's F&B</title>
    <link rel="shortcut icon" type="image/png" href="admin/images/logos/logo1.png">
    <link rel="stylesheet" href="admin/css/styles.min.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <style>
        .navbar{
            background-color: #f89676;
        }
        .col-8{
            margin-top: 40px;
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
    </style>

</head>

<body>
    <nav class="navbar navbar-expand-lg mb-3">
        <div class="container-fluid">

            <nav class="navbar">
                <div class="container">
                    <a class="navbar-brand" href="">
                        <img src="{{ URL::asset('admin/images/logos/logo1.png') }}" alt="" width="60" height="55" style="border-radius: 50%;">
                    </a>
                </div>
            </nav>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <h1 class="position-absolute top-50 start-50 translate-middle">Product Data Update</h1>
                <nav class="navbar navbar-expand-lg">
                    &nbsp; &nbsp;
                    <div class="dropdown ml-auto">
                    </div>
                </nav>
            </div>
        </div>
    </nav>



    <div class="container" style="margin-bottom: 30px;">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">

                        <form action="{{  url("/editTransaction/$balancesheet->id") }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="transaction_id" value="{{$balancesheet->transaction_id}}">
                            <input type="hidden" name="user_id" value="{{$balancesheet->user_id}}">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Transaction Name</label>
                                <input type="text" name="transaction_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$balancesheet->transaction_name}}">
                            </div>
                            <div class="mb-3">

                                <label for="exampleInputEmail1" class="form-label">Amount</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Rp</span>
                                    <input type="number" name="product_price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$balancesheet->product_price}}">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Transaction Type</label>
                                <select class="form-select" name="transaction_type" aria-label="Default select example">
                                    <option value="{{$balancesheet->transaction_type}}" selected>{{$balancesheet->transaction_type }}</option>
                                    <option value="Debit">Debit</option>
                                    <option value="Credit">Credit</option>

                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
</body>



</html>