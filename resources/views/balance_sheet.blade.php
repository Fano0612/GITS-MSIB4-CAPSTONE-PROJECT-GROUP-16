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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
            background-image: url('https://media-cldnry.s-nbcnews.com/image/upload/newscms/2023_05/1963490/puff-pastry-beef-wellington-valentines-day-2x1-zz-230201.jpg');
            filter: blur(5px);
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
            bottom: 20px;
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

        #scrollToTopBtn svg,
        #scrollToBottomBtn svg {
            width: 24px;
            height: 24px;
            vertical-align: middle;
        }

        #scrollToTopBtn:hover,
        #scrollToBottomBtn:hover {
            background-color: #777;
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
                        <a class="nav-link" href="{{route ('productlist')}}">Products</a>
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
                        <a class="nav-link active" aria-current="page" href="{{route ('balance_sheet')}}">Monetary</a>
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


    <div class="container" style="margin-top: 30px; margin-bottom: 30px;">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        @php
                        $BS = App\Models\Balancesheets::all();
                        @endphp
                        <form action="{{ route('insertTransaction') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputName" class="form-label">Transaction Name</label>
                                <input type="text" name="transaction_name" class="form-control" id="exampleInputName" aria-describedby="nameHelp" onchange="checkNameLength(this.value)" required>
                                <span id="name-error-msg" class="error-msg"></span>
                                <script>
                                    function checkNameLength(name) {
                                        if (name.length > 255) {
                                            alert("Invalid Transaction Name! Please enter a name with less than 255 characters.");
                                            document.getElementById("exampleInputName").value = "";
                                            document.getElementById("name-error-msg").textContent = "";
                                        } else {
                                            document.getElementById("name-error-msg").textContent = "";
                                        }
                                    }
                                </script>
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Amount</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Rp</span>
                                    <input type="number" name="product_price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    <span class="input-group-text">.00</span>
                                </div>
                                <script>
                                    $(document).ready(function() {
                                        $('form').submit(function(event) {
                                            var price = $('input[name="product_price"]').val();
                                            if (isNaN(price)) {
                                                alert('Please enter a valid number for the price.');
                                                event.preventDefault();
                                            }
                                        });
                                    });
                                </script>

                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Transaction Type</label>
                                <select class="form-select" name="transaction_type" required>
                                    <option value="" selected disabled hidden>Choose a Transaction Type</option>
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


    <div class="container">
        <div class="row">
            <table class="table table-dark table-striped-columns">
                <thead>
                    <tr>
                        <th scope="col">Transaction ID</th>
                        <th scope="col">User ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Debit</th>
                        <th scope="col">Credit</th>
                        <th scope="col" style="text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $balancesheets = App\Models\Balancesheets::all();
                    @endphp
                    @foreach($balancesheets as $balancesheet)
                    <tr>
                        <th scope="row">{{$balancesheet->transaction_id}}</th>
                        <td>{{$balancesheet->user_id}}</td>
                        <td>{{$balancesheet->transaction_name}}</td>
                        @if($balancesheet->transaction_type == 'Debit')
                        <td>Rp {{ number_format($balancesheet->product_price, 0, ',', '.') }}.00</td>
                        <td></td>
                        @elseif($balancesheet->transaction_type == 'Credit')
                        <td></td>
                        <td>Rp {{ number_format($balancesheet->product_price, 0, ',', '.') }}.00</td>
                        @endif
                        <td style="text-align: center;">
                            <a href="{{  url("/showTransaction/$balancesheet->transaction_id") }}" class="btn btn-success">Edit</a>
                            <a href="#" class="btn btn-danger delete" id-data="{{$balancesheet->id}}">Delete</a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="container">
        <canvas id="transactionChart" style="background-color: white; margin-bottom: 30px;"></canvas>
    </div>

    <style>
        .chart-title {
            font-size: 2em;
            font-weight: bold;
        }
    </style>

    <script>
        var balanceSheets = <?php echo json_encode($balancesheets); ?>;

        var creditData = [];
        var debitData = [];
        var labels = [];

        balanceSheets.forEach(function(balanceSheet) {
            var transactionMonth = balanceSheet.created_at.substring(0, 7);

            if (balanceSheet.transaction_type === 'Credit') {
                creditData.push(balanceSheet.product_price);
                debitData.push(0);
            } else if (balanceSheet.transaction_type === 'Debit') {
                creditData.push(0);
                debitData.push(balanceSheet.product_price);
            } else {
                creditData.push(0);
                debitData.push(0);
            }

            labels.push(transactionMonth);
        });

        var monthlyCreditData = calculateMonthlySum(creditData);
        var monthlyDebitData = calculateMonthlySum(debitData);
        var updatedMonthlyCreditData = calculateNextMonthData(monthlyCreditData);
        var updatedMonthlyDebitData = calculateNextMonthData(monthlyDebitData);
        var operationResult = calculateOperationResult(updatedMonthlyDebitData, updatedMonthlyCreditData);

        var ctx = document.getElementById('transactionChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Result',
                    data: operationResult,
                    borderColor: operationResult.map(value => value >= 0 ? 'green' : 'red'),
                    fill: false
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'Profit Chart',
                        font: {
                            size: '35px'
                        }
                    }
                },
                scales: {
                    x: {
                        display: true,
                        title: {
                            display: true,
                            text: 'Month of Transaction'
                        },
                        ticks: {
                            callback: function(value, index, values) {
                                return labels[index];
                            }
                        }
                    },
                    y: {
                        display: true,
                        title: {
                            display: true,
                            text: 'Value'
                        }
                    }
                }
            }
        });

        function calculateMonthlySum(data) {
            var monthlySum = {};

            for (var i = 0; i < labels.length; i++) {
                var month = labels[i];

                if (!monthlySum[month]) {
                    monthlySum[month] = 0;
                }

                monthlySum[month] += data[i] || 0;
            }

            return Object.values(monthlySum);
        }

        function calculateNextMonthData(data) {
            var nextMonthData = data.slice();

            for (var i = 1; i < nextMonthData.length; i++) {
                nextMonthData[i] += nextMonthData[i - 1];
            }

            return nextMonthData;
        }

        function calculateOperationResult(debitData, creditData) {
            var operationResult = [];

            for (var i = 0; i < debitData.length; i++) {
                operationResult.push(debitData[i] - creditData[i]);
            }

            return operationResult;
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>
<script>
    $('.delete').click(function() {
        var stdid = $(this).attr('id-data');
        swal({
                title: "Delete Data?",
                text: "Delete " + stdid + "?\n" + "Once it's deleted, you won't be able to recover this transaction anymore",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                closeOnClickOutside: false,
                closeOnEsc: false,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal("Data has been deleted successfully!", {
                        icon: "success",
                    }).then(() => {
                        window.location = "/deleteTransaction/" + stdid;
                    });
                } else {
                    swal("Data deletion cancelled!");
                }
            });
    });
</script>

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