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

      .hr1 {
          padding: 0;
          margin: 0;
      }

      h3{
        margin-left: 33rem;
        margin-top: 1rem;
        text-align: center;
      }
      .container-fluid{
        background-color: #FA896B;
        height: 5rem;
      }

      .col-8{
        margin-top: 3rem;
        position: absolute;
        padding: 20px;
        border-block: 5px dotted #f86941;
    }

    [type=submit], button, .btn{
    margin-left: 22rem;
    font-size: 14px;
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

        <!-- Sidebar navigation-->

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
        <div class="nav">
            <h3>Edit Product</h3>
        </div>
        
        <!--  Row 1 -->
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <form action="/editproduct/{{$productdata->product_id}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Product ID</label>
                                <input type="number" name="product_id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$productdata->product_id}}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Name</label>
                                <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$productdata->product_name}}" required>
                            </div>
                            <div class="mb-3">

                                <label for="exampleInputEmail1" class="form-label">Price</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Rp</span>
                                    <input type="number" name="product_price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$productdata->product_price}}" required>
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Stock</label>
                                <input type="number" name="product_stock" class="form-control input-number" id="exampleInputEmail1" value="{{ $productdata->product_stock }}" min="1" aria-describedby="emailHelp" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Picture</label>
                                <input type="file" name="product_picture" class="form-control custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" value="">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Product Category</label>
                                <select class="form-select" name="category_id" aria-label="Default select example" required>
                                    <option value="{{$productdata->category_id}}" selected>{{$productdata->categories->product_category }}</option>
                                    @php
                                    $category = App\Models\Category::all();
                                    @endphp
                                    @foreach($category as $cat)
                                    <option value="{{$cat->id}}">{{$cat->product_category}}</option>
                                    @endforeach

                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

          </div>

        </div>
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
</body>

</html>
