<?php
if (!auth()->check() || auth()->user()->status != 'active') {
    echo "<script>alert('Please login to access the system');</script>";
    echo "<script>setTimeout(function() { window.location.href = '/landing'; }, 1000);</script>";
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
    <title>Jacob's F&B</title>
    <link rel="shortcut icon" type="image/png" href="admin/images/logos/logo1.png" />
    <link rel="stylesheet" href="admin/css/styles.min.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <style>
        .col-8{
            margin-top: 8px;
            margin-bottom: 30px;
            top: 68%;
            left: 50%;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 1px 12px 3px #995151;
        }

        .coProfit{
            margin-top: 35px;
            margin-bottom: 30px;
            padding: 20px;
            border-radius: 9px;
            box-shadow: 0px 1px 2px 3px #995151;
        }

        .hr1 {
            padding: 0;
            margin: 0;
        }
        p{
            font-weight: bold;
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
            background-color: #ffc9b6ba;
            color: #8d3840;
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

    {{--  --}}
    <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
  data-sidebar-position="fixed" data-header-position="fixed">
  <!-- Sidebar Start -->
  <aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
      <div class="brand-logo mt-4 d-flex align-items-center justify-content-between">
        <a href="" class="text-nowrap logo-img">
          <img src="admin/images/logos/logo.png" width="180" alt="" />
        </a>
        <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
          <i class="ti ti-x fs-8"></i>
        </div>
      </div>
      <!-- Sidebar navigation-->
      <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
        <ul id="sidebarnav">
          <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
              <ul id="sidebarnav">

                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu"></span>
                  </li>
                    <li class="sidebar-item">
                      <a class="sidebar-link" href="category" aria-expanded="false">
                        <span>
                          <i class="ti ti-package"></i>
                        </span>
                        <span class="hide-menu" href="{{route ('category')}}">Category</span>
                      </a>
                    </li>
                  <li class="sidebar-item">
                    <a class="sidebar-link" href="product_menu" aria-expanded="false">
                      <span>
                        <i class="ti ti-settings"></i>
                      </span>
                      <span class="hide-menu" href="{{route ('product_menu')}}">Manage Product</span>
                    </a>
                  </li>
                  <li class="sidebar-item">
                    <a class="sidebar-link" href="transaction_list_admin" aria-expanded="false">
                      <span>
                        <i class="ti ti-book"></i>
                      </span>
                      <span class="hide-menu" href="{{route ('transaction_list_admin')}}">Transactions</span>
                    </a>
                  </li>
                  <li class="sidebar-item">
                    <a class="sidebar-link" href="balance_sheet" aria-expanded="false">
                      <span>
                          <i class="ti ti-clipboard"></i>
                      </span>
                      <span class="hide-menu" href="{{route ('balance_sheet')}}">Monetary</span>

                    </a>
                  </li>

                  <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu"></span>
                  </li>
                  <li class="sidebar-item">
                    <a class="sidebar-link" href="logout" aria-expanded="false">
                      <span>
                        <i class="ti ti-login"></i>
                      </span>
                      <span class="hide-menu" href="{{route ('logout')}}">Log Out</span>
                    </a>
                  </li>
                </nav>

              </nav>
              <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
          </aside>
            <!--  Sidebar End -->
            <!--  Main wrapper -->
    <div class="body-wrapper">
        <!--  Header Start -->
        <!--  Header End -->
        <div class="container-fluid">

            <!--  Row Input -->
            <div class="row">
              <div class="row">
                <div class="col-lg-8 d-flex align-items-stretch">
                </div>
              </div>
              <p>
                <p>Pages / Monetary</p> </p>
              <h3>Monetary</h3>
                <div class="container-fluid">
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
        <div class="coProfit">
            <canvas id="transactionChart" style="background-color: white; margin-bottom: 30px;"></canvas>
        </div>
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
