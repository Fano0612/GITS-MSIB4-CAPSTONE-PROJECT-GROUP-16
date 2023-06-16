<?php
if (!auth()->check() || auth()->user()->status != 'active') {
    echo "<script>alert('Please login to access the system');</script>";
    echo "<script>setTimeout(function() { window.location.href = '/landing'; }, 1000);</script>";
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

<!DOCTYPE html>
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

    <link rel="stylesheet" href="trans_docs/trans.css">


    

</head>

<body>
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

        
    <!-- ***** navbar Start ***** -->
    <nav class="navbar navbar-expand-lg mb-3">
        <div class="container-fluid">

            <nav class="navbar">
                <div class="container">
                    <a class="navbar-brand" href="{{route ('homepage')}}">
                        <img src="user_docs/images/iii.png" alt="" width="62" height="62">
                    </a>
                </div>
            </nav>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <h1 class="position-absolute top-50 start-50 translate-middle">Edit Profile</h1>
                <nav class="navbar navbar-expand-lg">
                    &nbsp; &nbsp;
                    <div class="dropdown ml-auto">
                    </div>
                </nav>
            </div>
        </div>
    </nav>
<!-- ***** navbar end ***** -->

    <!-- ***** main Start ***** -->
        <div class="container" >
            <div class="row justify-content-center">
                <div class="col">
                    <div class="card border-4">
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

                            @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif
                            <form action="{{ route('updateprofile') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <br>
                                <div class="form-group mb-3">
                                    <label for="username">Username:</label>
                                    <input type="text" name="username" class="form-control" value="{{ $user->username }}" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="email">Email:</label>
                                    <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="password">New Password:</label>
                                    <input type="password" name="password" class="form-control" >
                                </div>
                                <div class="form-group mb-3">
                                    <label for="password_confirmation">Confirm Password:</label>
                                    <input type="password" name="password_confirmation" class="form-control" >
                                </div>
                                <div class="form-group mb-3">
                                    <label for="picture">Profile Picture:</label>
                                    <input type="file" name="picture" class="form-control-file" value="{{ $user->picture }}" >
                                </div>
                                <button type="submit" class="btn btn-outline-danger">Update Profile</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>


</body>

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