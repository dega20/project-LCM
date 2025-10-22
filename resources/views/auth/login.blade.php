{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="{{ asset('adminlte/index2.html') }}" class="h1"><b>Login</b>Page</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <div class="social-auth-links text-center mt-2 mb-3">
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                    </a>
                </div>
                <!-- /.social-auth-links -->

                
                <p class="mb-0">
                    <a href="{{ route('home') }}" class="text-center">< Kembali Ke Home</a>
                </p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
</body>

</html> --}}


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Lantar Cipta Media</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/lcm.png') }}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('bootstrapmade/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrapmade/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrapmade/assets/vendor/aos/aos.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('bootstrapmade/assets/css/main.css') }}" rel="stylesheet">

    <style>
        :root {
            --primary-color: #37517e;
            --secondary-color: #47b2e4;
            --accent-color: #5a9bd4;
            --light-color: #f3f5fa;
            --dark-color: #37517e;
        }

        .login-page {
            background-color: var(--light-color);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-container {
            max-width: 1200px;
            width: 100%;
            margin: 0 auto;
        }

        .login-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        @media (min-width: 992px) {
            .login-card {
                flex-direction: row;
                min-height: 600px;
            }
        }

        .login-form-section {
            padding: 40px;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-image-section {
            flex: 1;
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px;
            position: relative;
            overflow: hidden;
        }

        .login-image-section::before {
            content: '';
            position: absolute;
            width: 200%;
            height: 200%;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            animation: backgroundMove 20s linear infinite;
        }

        @keyframes backgroundMove {
            0% {
                transform: translate(-50%, -50%) rotate(0deg);
            }
            100% {
                transform: translate(-50%, -50%) rotate(360deg);
            }
        }

        .login-image-content {
            position: relative;
            z-index: 1;
            text-align: center;
            color: white;
        }

        .login-image-content img {
            max-width: 200px;
            margin-bottom: 20px;
        }

        .login-image-content h3 {
            font-size: 24px;
            margin-bottom: 15px;
        }

        .login-image-content p {
            opacity: 0.9;
        }

        .login-logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .login-logo h1 {
            color: var(--primary-color);
            font-size: 28px;
            font-weight: 700;
            margin: 0;
        }

        .login-logo p {
            color: #6c757d;
            margin-top: 5px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            border-radius: 5px;
            padding: 12px 15px;
            border: 1px solid #dee2e6;
            transition: all 0.3s;
        }

        .form-control:focus {
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 0.2rem rgba(71, 178, 228, 0.25);
        }

        .input-group-text {
            background-color: white;
            border: 1px solid #dee2e6;
            border-left: none;
        }

        .input-group .form-control {
            border-right: none;
        }

        .btn-login {
            background-color: var(--secondary-color);
            border: none;
            color: white;
            padding: 12px 20px;
            border-radius: 5px;
            font-weight: 600;
            transition: all 0.3s;
            width: 100%;
        }

        .btn-login:hover {
            background-color: var(--primary-color);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .social-login {
            margin: 25px 0;
            text-align: center;
        }

        .social-login p {
            position: relative;
            margin-bottom: 20px;
            color: #6c757d;
        }

        .social-login p::before,
        .social-login p::after {
            content: '';
            position: absolute;
            top: 50%;
            width: 30%;
            height: 1px;
            background-color: #dee2e6;
        }

        .social-login p::before {
            left: 0;
        }

        .social-login p::after {
            right: 0;
        }

        .social-buttons {
            display: flex;
            gap: 10px;
        }

        .social-btn {
            flex: 1;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #dee2e6;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: all 0.3s;
            font-weight: 500;
        }

        .social-btn.facebook {
            color: #3b5998;
        }

        .social-btn.google {
            color: #db4437;
        }

        .social-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        }

        .back-home {
            text-align: center;
            margin-top: 20px;
        }

        .back-home a {
            color: var(--secondary-color);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }

        .back-home a:hover {
            color: var(--primary-color);
        }

        .alert-danger {
            border-radius: 5px;
            padding: 12px 15px;
            margin-bottom: 20px;
        }

        .remember-me {
            display: flex;
            align-items: center;
        }

        .remember-me input {
            margin-right: 8px;
        }

        .login-title {
            font-size: 24px;
            color: var(--primary-color);
            margin-bottom: 10px;
            font-weight: 600;
        }

        .login-subtitle {
            color: #6c757d;
            margin-bottom: 30px;
        }
    </style>
</head>

<body class="login-page">
    <div class="login-container">
        <div class="login-card">
            <!-- Form Section -->
            <div class="login-form-section">
                <div class="login-logo">
                    <h1>Lantar Cipta Media</h1>
                    <p>Technology Solutions Provider</p>
                </div>

                <div class="login-title">Welcome Back</div>
                <p class="login-subtitle">Sign in to your account to continue</p>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <div class="input-group">
                            <input type="email" class="form-control" placeholder="Email" name="email" required>
                            <span class="input-group-text">
                                <i class="bi bi-envelope"></i>
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <input type="password" class="form-control" placeholder="Password" name="password" required>
                            <span class="input-group-text">
                                <i class="bi bi-lock"></i>
                            </span>
                        </div>
                    </div>

                    <div class="form-group d-flex justify-content-between align-items-center">
                        <div class="remember-me">
                            <input type="checkbox" id="remember" name="remember">
                            <label for="remember">Remember Me</label>
                        </div>
                        <a href="#" style="color: var(--secondary-color);">Forgot Password?</a>
                    </div>

                    <button type="submit" class="btn-login">Sign In</button>
                </form>

                <div class="social-login">
                    <p>Or sign in with</p>
                    <div class="social-buttons">
                        <a href="#" class="social-btn facebook">
                            <i class="bi bi-facebook"></i>
                            <span>Facebook</span>
                        </a>
                        <a href="#" class="social-btn google">
                            <i class="bi bi-google"></i>
                            <span>Google</span>
                        </a>
                    </div>
                </div>

                <div class="back-home">
                    <a href="{{ route('home') }}"><i class="bi bi-arrow-left"></i> Back to Home</a>
                </div>
            </div>

            <!-- Image/Info Section -->
            <div class="login-image-section">
                <div class="login-image-content">
                    <img src="{{ asset('img/karakter-phicos.webp') }}" alt="LCM Character">
                    <h3>Join Our Digital Journey</h3>
                    <p>We are a company with a full dedication to contribute ourselves in IT, Communication, and any other business problems.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('bootstrapmade/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('bootstrapmade/assets/vendor/aos/aos.js') }}"></script>

    <script>
        // Initialize AOS (Animate On Scroll)
        AOS.init({
            duration: 1000,
            easing: 'ease-in-out',
            once: true
        });
    </script>
</body>

</html>