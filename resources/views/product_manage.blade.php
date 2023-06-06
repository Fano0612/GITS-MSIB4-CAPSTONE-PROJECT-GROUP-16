
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

<?php
if (isset($_FILES['product_picture']) && $_FILES['product_picture']['error'] == UPLOAD_ERR_OK) {
    $tmp_name = $_FILES['product_picture']['tmp_name'];
    $name = $_FILES['product_picture']['name'];
    move_uploaded_file($tmp_name, "uploads/$name");
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
    <script>
        $(document).ready(function() {
            $("form").submit(function(event) {
                var product_id = $("#exampleInputEmail1").val();
                var product_name = $("#exampleInputName").val();
                var exist = false;
                $("table tbody tr").each(function() {
                    var id = $(this).find("th:eq(0)").text();
                    var name = $(this).find("td:eq(0)").text();
                    if (id == product_id || name == product_name) {
                        exist = true;
                        return false;
                    }
                });
                if (exist) {
                    alert("Product already exists in the table.");
                    event.preventDefault();
                }
            });
        });
    </script>

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
          <div class="unlimited-access hide-menu bg-light-primary position-relative mb-7 mt-5 rounded">
            <div class="d-flex">
              <div class="unlimited-access-title me-3">

                <a href="https://adminmart.com/product/modernize-bootstrap-5-admin-template/" target="_blank" class="btn btn-primary fs-2 fw-semibold lh-sm">Buy Pro</a>
              </div>
              <div class="unlimited-access-img">
                <img src="../assets/images/backgrounds/rocket.png" alt="" class="img-fluid">
              </div>
            </div>
          </div>
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
            <p>Pages / Manage Product</p> </p>
          <h3>Add Product</h3>
            <div class="container-fluid">

            <div class="card ">
              <div class="card-body">

                  <form action="/insertproduct" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                          <label for="exampleFormControlInput1">ID Product</label>
                          <input type="number" name="product_id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" onchange="checkIdLength(this.value)" required>
                          <script>
                              function checkIdLength(id) {
                                  if (id.length !== 5) {
                                      alert("Invalid Product ID! \nPlease enter a 5 digit number.");
                                      document.getElementById("exampleInputEmail1").value = "";
                                  }
                              }
                          </script>
                        </div>

                      <div class="form-group">
                          <label for="exampleInputName" class="form-label">Product Name</label>
                          <input type="text" name="product_name" class="form-control" id="exampleInputName" aria-describedby="nameHelp" onchange="checkNameLength(this.value)" required>
                          <span id="name-error-msg" class="error-msg"></span>
                          <script>
                              function checkNameLength(name) {
                                  if (name.length > 255) {
                                      alert("Invalid Name! Please enter a name with less than 255 characters.");
                                      document.getElementById("exampleInputName").value = "";
                                      document.getElementById("name-error-msg").textContent = "";
                                  } else {
                                      document.getElementById("name-error-msg").textContent = "";
                                  }
                              }
                          </script>
                      </div>

                      <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Price</label>
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
                          <label for="exampleInputEmail1" class="form-label">Stock</label>
                          <input type="number" name="product_stock" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="1" min="1" required>
                      </div>



                      <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Picture</label>
                          <input type="file" name="product_picture" class="form-control custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" required>
                      </div>

                      <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Product Category</label>
                          <select class="form-select" name="category_id" aria-label="Default select example" required>
                              <option value="" selected disabled hidden>Choose a category</option>
                              @php
                              $category = App\Models\Category::all();
                              @endphp
                              @foreach($category as $cat)
                              <option value="{{$cat->id}}">{{$cat->product_category}}</option>
                              @endforeach
                          </select>
                          <span id="category-error-msg" class="error-msg"></span>
                          <script>
                              function checkCategory(category) {
                                  if (category === "") {
                                      document.getElementById("category-error-msg").textContent = "Please choose a category";
                                      return false;
                                  } else {
                                      document.getElementById("category-error-msg").textContent = "";
                                      return true;
                                  }
                              }

                              document.querySelector("form").addEventListener("submit", function(event) {
                                  const category = document.querySelector("[name='category_id']").value;
                                  if (!checkCategory(category)) {
                                      event.preventDefault();
                                  }
                              });
                          </script>
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
                    <th scope="col">Product ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Picture</th>
                    <th scope="col">Category</th>
                    <th scope="col" style="text-align: center;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $prod)
                <tr>
                    <th scope="row">{{$prod->product_id}}</th>
                    <td>{{$prod->product_name}}</td>
                    <td>Rp {{ number_format($prod->product_price, 0, ',', '.') }}.00</td>
                    <td>{{$prod->product_stock}}</td>
                    <td><img src="{{ URL::asset('images/product_pictures/'.$prod->product_picture) }}" alt="" class="card-img-top" style="width: 100px; height: 80px;"></td>
                    <td>{{ $prod->categories->product_category }}</td>
                    <td style="text-align: center;">
                        <a href="/showproduct/{{$prod->product_id}}" class="btn btn-success">Edit</a>
                        <a href="#" class="btn btn-danger delete" id-data="{{$prod->product_id}}">Delete</a>
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
