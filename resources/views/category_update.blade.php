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

<?php
if (isset($_FILES['product_picture']) && $_FILES['product_picture']['error'] == UPLOAD_ERR_OK) {
    $tmp_name = $_FILES['product_picture']['tmp_name'];
    $name = $_FILES['product_picture']['name'];
    move_uploaded_file($tmp_name, "uploads/$name");
}

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Jacob's F&B</title>
  <link rel="shortcut icon" type="image/png" href="images/logos/logo1.png" />
  <link rel="stylesheet" href="css/styles.min.css" />

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

      <div class="container-fluid" >
        <div class="nav">
            <h3>Edit Category</h3>
        </div>

        <!--  Row 1 -->
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                      <form action="{{ route('category.update', ['id' => $category->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">ID</label>
                            <input type="number" name="id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$category->id}}" onchange="checkIdLength(this.value)" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputName" class="form-label">Product Category</label>
                            <input type="text" name="product_category" class="form-control" id="exampleInputName" aria-describedby="nameHelp" value="{{$category->product_category}}" onchange="checkNameLength(this.value)" required>
                        </div>
                        @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </div>
                        @endif
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    @if($errors->has('error'))
                    <div class="alert alert-danger mt-2" role="alert">
                        {{ $errors->first('error') }}
                    </div>
                    @endif
          </div>

        </div>

      </div>
    </div>
  </div>
  <script src="libs/jquery/dist/jquery.min.js"></script>
  <script src="libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/sidebarmenu.js"></script>
  <script src="js/app.min.js"></script>
  <script src="libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="libs/simplebar/dist/simplebar.js"></script>
  <script src="js/dashboard.js"></script>
  <script>
    function checkIdLength(id) {
        if (id.length !== 1) {
            alert('ID must be 1 digit only.');
        }
    }
</script>
<script>
    $(document).ready(function() {
        var initialValues = {
            id: $('input[name="id"]').val(),
            product_category: $('input[name="product_category"]').val(),
        };

        function isFormChanged() {
            var currentValues = {
                id: $('input[name="id"]').val(),
                product_category: $('input[name="product_category"]').val(),
            };

            return JSON.stringify(currentValues) !== JSON.stringify(initialValues);
        }

        $('form').submit(function() {
            if (!isFormChanged()) {
                $('button[type="submit"]').prop('disabled', true);
            }
        });

        $('input').on('change', function() {
            if (isFormChanged()) {
                $('button[type="submit"]').prop('disabled', false);
            }
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>

</html>
