<?php
if (auth()->check()) {
    header('Location: /productlist');
    exit();
}
if (auth()->check() && auth()->user()->status != 'active') {
    header('Location: /login');
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Jacob's F&B</title>
    <link rel="icon" type="image/x-icon" href="landing_docs/images/ini.png">
    <link rel="stylesheet" href="login_docs/index.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <!-- NAVBAR CREATION -->
    <header class="header">
        <div class="logon">
            <img src="login_docs/images/logo.png" alt="">
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
            <div class="form-box login">
                @if($errors->any())
                        @foreach($errors->all() as $err)
                        <p class="alert alert-danger">{{$err}}</p>
                        @endforeach
                        @endif
                        <form action="{{ route('loginacc') }}" method="POST">
                            @csrf
                    <h2>Sign In</h2>
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-envelope'></i></span>
                        <input type="email" class="form-control" id="email" name="email">
                        <label for="email">Email</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-lock-alt' ></i></span>
                        <input type="password" class="form-control" id="password" name="password">
                        <label for="password">Password</label>
                    </div>
                    <button type="submit" class="btn btn-danger" style="float:right">Login</button>
                    <br><br><br>
                    <a href="{{ route('forgot_password') }}?stats=true" class="link-danger">Forgot Password?</a>


                    <div class="create-account">
                        <p>Create A New Account? <a href="{{ route('AccountUnexist') }}?stats=true" class="link-danger">Sign Up</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
     <!-- SIGN UP FORM CREATION -->

     <script src="login_docs\index.js"></script>

</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

</html>