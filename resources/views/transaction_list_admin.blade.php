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
    <link rel="stylesheet" href="admin/css/styles.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
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
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo mt-4 d-flex align-items-center justify-content-between">
          <a href="{{route ('productlist')}}" class="text-nowrap logo-img">
            <img src="{{ URL::asset('admin/images/logos/logo1.png') }}" alt="" width="180"/>
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
              <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                  <ul class="navbar-nav">
                    <li class="nav-item d-block d-xl-none">
                      <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                        <i class="ti ti-menu-2"></i>
                      </a>
                    </li>
                    <li class="nav-item">
                    </li>
                </ul>
                <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                  <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                    <li class="nav-item dropdown">
                      <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img src="{{ URL::asset('images/'.$profilePicture) }}" alt="" width="35" height="35" class="rounded-circle">
                      </a>
                      <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                        <div class="message-body">
                          @if (auth()->check())
                                  <a class="dropdown-item" href="{{route ('editprofile')}}">Hello <b>{{ auth()->user()->username }}</a>
                                  @endif
      
                          <a href="{{route ('logout')}}" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </nav>
              </header>
              <p>Pages / Transactions</p> </p>
        <h3>Transaction List</h3>
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