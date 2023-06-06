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
  <title>Jacob's F&B</title>
  <link rel="shortcut icon" type="image/png" href="admin/images/logos/logo1.png" />
  <link rel="stylesheet" href="admin/css/styles.min.css" />
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
    </style>
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo mt-4 d-flex align-items-center justify-content-between">
          <a href="./index.html" class="text-nowrap logo-img">
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
                        <a class="sidebar-link" href="productlist" aria-expanded="false">
                          <span>
                            <i class="ti ti-layout-dashboard"></i>

                          </span>
                          <span class="hide-menu" href="{{route ('productlist')}}">Dashboard</span>
                        </a>
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
                      <a class="sidebar-link" href="transaction_list" aria-expanded="false">
                        <span>
                          <i class="ti ti-book"></i>
                        </span>
                        <span class="hide-menu" href="{{route ('transaction_list')}}">Transactions</span>
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
      <!--  Header End -->

      <div class="container-fluid">

        <!--  Row Input -->
        <div class="row">
            <div class="col-lg-6 d-flex align-items-strech">
            </div>
          <div class="row">
            <div class="col-lg-4 d-flex align-items-stretch">
              <div class="card w-100">
              </div>
            </div>
            <div class="col-lg-8 d-flex align-items-stretch">
            </div>
          </div>
          <p> sds
            <p>Pages / Category</p> </p>
          <h3>Add Category</h3>
            <div class="container-fluid">

            <div class="card ">
              <div class="card-body">
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{ route('category.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="id" class="form-label">ID</label>
                        <input type="number" name="id" class="form-control {{ $errors->has('id') ? 'is-invalid' : '' }}" id="id" placeholder="Enter ID" value="{{ old('id') }}" required>

                    </div>

                    <div class="mb-3">
                        <label for="product_category" class="form-label">Product Category</label>
                        <input type="text" name="product_category" class="form-control {{ $errors->has('product_category') ? 'is-invalid' : '' }}" id="product_category" placeholder="Enter Product Category" value="{{ old('product_category') }}" required>

                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>
          </div>
      </div>
  </div>
  </div>

  {{-- table --}}
  <div class="container">
    <div class="row">
        <table class="table table-dark table-striped-columns">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Product Category</th>
                    <th scope="col" style="text-align: center;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($category as $cat)
                <tr>
                    <th scope="row">{{$cat->id}}</th>
                    <td>{{$cat->product_category}}</td>
                    <td style="text-align: center;">
                        <a href="{{ route('category.edit', ['id' => $cat->id]) }}" class="btn btn-success">Edit</a>
                        <a href="#" class="btn btn-danger delete" data-id="{{$cat->id}}">Delete</a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    </div>


        <div class="py-6 px-6 text-center">
          <p class="mb-0 fs-4">Design and Developed by Kelompok 16</a></p>
        </div>

    </div>
  </div>
  <script src="admin/libs/jquery/dist/jquery.min.js"></script>
  <script src="admin/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="admin/js/sidebarmenu.js"></script>
  <script src="admin/js/app.min.js"></script>
  <script src="admin/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="admin/libs/simplebar/dist/simplebar.js"></script>
  <script src="admin/js/dashboard.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>

<script>
    $('.delete').click(function() {
        var stdid = $(this).attr('id-data');
        swal({
                title: "Delete Data?",
                text: "Delete " + stdid + "?\n" + "Once it's deleted, you won't be able to recover this data anymore",
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
                        window.location = "/deleteproduct/" + stdid;
                    });
                } else {
                    swal("Data deletion cancelled!");
                }
            });
    });
</script>
<script>
    $('.delete').click(function() {
        var catId = $(this).data('id');
        swal({
                title: "Delete Category?",
                text: "Delete category " + catId + "?\n" + "Once it's deleted, you won't be able to recover this category anymore",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                closeOnClickOutside: false,
                closeOnEsc: false,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "{{ url('category') }}" + '/' + catId,
                        type: "POST",
                        data: {
                            '_method': 'DELETE',
                            '_token': '{{ csrf_token() }}'
                        },
                        success: function(data) {
                            swal("Category has been deleted successfully!", {
                                icon: "success",
                            }).then(() => {
                                window.location.reload();
                            });
                        },
                        error: function(data) {
                            swal("Oops", "You can't delete a category with products connected to it", "error");
                        }
                    });
                } else {
                    swal("Category deletion cancelled!");
                }
            });
    });
</script>

</html>
