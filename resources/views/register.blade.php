<!DOCTYPE html>
<html lang="en">
<head>
    <title>Jacob's F&B</title>
    <link rel="icon" type="image/x-icon" href="landing_docs/images/ini.png">
    <link rel="stylesheet" href="register_docs/regis.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <?php
    session_start();
    if (!isset($_SESSION['id']) && !isset($_GET['stats'])) {
        echo "<script>alert('Access it through login!'); window.location.href = '/login'; </script>";
    }
    ?>

     <!-- NAVBAR CREATION -->
     <header class="header">
        <div class="logon">
            <img src="register_docs/images/logo.png" alt="">
        </div>
    </header>

    <!-- LOGIN FORM CREATION -->
    <div class="background"></div>
    <div class="container">
        <div class="item">
            <h2 class="logo"></h2>
            <div class="text-item">
                <h2>Sign in to <br> <br><span>
                    JACOB’S F&B 
                </span></h2>
                <p>Something Special In The Good Taste!</p>
                <div class="social-icon">
                    <a href="#"><i class='bx bxl-facebook'></i></a>
                    <a href="#"><i class='bx bxl-google'></i></a>
                </div>
            </div>
        </div>
        <div class="login-section">
            <div class="form-box register">
                @if($errors->any())
                        @foreach($errors->all() as $err)
                        <p class="alert alert-danger">{{$err}}</p>
                        @endforeach
                        @endif
                        <form action="{{ route('registeracc') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <h2>Sign Up</h2>
                            <div class="input-box">
                                <span class="icon"><i class='bx bxs-user'></i></span>
                                <input type="text" class="form-control" id="username" name="username"  value="{{ old('username') }}">
                                <label for="username">Username</label>
                            </div>
                            <div class="input-box">
                                <span class="icon"><i class='bx bxs-envelope'></i></span>
                                <input type="email" class="form-control" id="email" name="email"  value="{{ old('email') }}">
                                <label for="email">Email</label>
                            </div>
                            <div class="input-box">
                                <span class="icon"><i class='bx bxs-lock-alt' ></i></span>
                                <input type="password" class="form-control" id="password" name="password" >
                                <label for="password">Password</label>
                            </div>
                            <div class="input-box">
                                <span class="icon"><i class='bx bxs-lock' ></i></span>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" >
                                <label for="passwordconfirmation">Confirm Password</label>
                            </div>
                            <div class="input-box">
                                <label for="picture" class="form-label"></label>
                                <input type="file" name="picture" class="form-control" id="picture" required>
                            </div>
                            <div class="form-group ">
                                <label for="access_rights">Access</label>
                                <div class="form-check d-flex">
                                    <div class="me-3">
                                        <input class="form-check-input" type="radio" name="access_rights" id="merchant" value="Merchant" required>
                                        <label class="form-check-label" for="merchant">Merchant</label>
                                    </div>
                                    <div class="ms-3">
                                        <input class="form-check-input" type="radio" name="access_rights" id="user" value="User" required>
                                        <label class="form-check-label" for="user">User</label>
                                    </div>
                                </div>
                            </div>       
                            
                        <button type="submit" class="btn btn-danger" style="float:right">Register</button>

                        <div class="create-account">
                            <p>Already Have An Account?<a href="{{ route('AccountExist') }}" class="link-danger">&nbsp;Sign In</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
     <!-- SIGN UP FORM CREATION -->
     <script src="register_docs\regis.js"></script>

</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

</html>