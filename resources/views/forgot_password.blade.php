<?php
if (auth()->check()) {
    header('Location: /homepage');
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
    <link rel="stylesheet" href="forget_docs/forget.css"> 
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        ::placeholder { 
            color:    rgb(0, 0, 0);
        }
    </style>
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
                <h2>Forgot Your <br><span>
                    Password? 
                </span></h2>
                <p>To reset your password, Enter the <br><span>
                    registered Email address and we <br>
                    will send you new password</span></p>
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
                
                @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                
                <form action="{{ route('forgotPassword') }}" method="POST">
                    @csrf
                    <h2>Forgot Password</h2>
                    <br>
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-envelope'></i></span>
                        <input type="email" class="form-control" id="email" name="email" placeholder="">
                        <label for="email">Email</label>
                    </div>


                            <a href="{{ route('AccountExist') }}?stats=true" class="link-danger">Remember Password?</a>

                            <button type="submit" class="btn btn-danger" style="float:right">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

</html>