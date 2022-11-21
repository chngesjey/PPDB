<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Sign In Admin</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{asset ('assets/modules/bootstrap.min.css')}}">
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="{{asset ('assets/modules/all.min.css')}}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset ('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset ('assets/css/components.css')}}">
    <link rel="stylesheet" href="feedback.css">
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <!-- <img src="https://yt3.ggpht.com/ytc/AMLnZu9JW4gVnRwef3M2GbDxrfyO00bqDxawTFifLKcY=s900-c-k-c0x00ffffff-no-rj" alt="logo" width="150"
                                class="shadow-light rounded-circle"> -->
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Login</h4>
                            </div>

                            <div class="card-body">
                                <form method="POST" action="{{route ('admin.adminlogin')}}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" class="form-control" name="email" tabindex="1"
                                            required autofocus>
                                        <div class="invalid-feedback">
                                            Please fill in your email
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-label">Password</label>
                                            <div class="float-right">
                                                <!-- <a href="auth-forgot-password.html" class="text-small">
                                                    Forgot Password?
                                                </a> -->
                                            </div>
                                        </div>
                                        <input id="password" type="password" class="form-control" name="password"
                                            tabindex="2" required>
                                        <div class="invalid-feedback">
                                            please fill in your password
                                        </div>
                                    </div>

                                    <!-- <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="remember" class="custom-control-input"
                                                tabindex="3" id="remember-me">
                                            <label class="custom-control-label" for="remember-me">Remember Me</label>
                                        </div>
                                    </div> -->

                                    <!-- Untuk Login -->
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Login
                                        </button>
                                    </div>
                                </form>
                                <!-- <div class="text-center mt-4 mb-3">
                                    <div class="text-job text-muted">Login With Social</div>
                                </div>
                                <div class="row sm-gutters">
                                    <div class="col-6">
                                        <a class="btn btn-block btn-social btn-facebook">
                                            <span class="fab fa-facebook"></span> Facebook
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        <a class="btn btn-block btn-social btn-twitter">
                                            <span class="fab fa-twitter"></span> Twitter
                                        </a>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                        <div class="card-body">
                                    <div class="row">
                                        <div class="col"><a href="{{route('login')}}" class="btn w-100">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon text-github" width="24" height="24"
                                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M9 19c-4.3 1.4 -4.3 -2.5 -6 -3m12 5v-3.5c0 -1 .1 -1.4 -.5 -2c2.8 -.3 5.5 -1.4 5.5 -6a4.6 4.6 0 0 0 -1.3 -3.2a4.2 4.2 0 0 0 -.1 -3.2s-1.1 -.3 -3.5 1.3a12.3 12.3 0 0 0 -6.2 0c-2.4 -1.6 -3.5 -1.3 -3.5 -1.3a4.2 4.2 0 0 0 -.1 3.2a4.6 4.6 0 0 0 -1.3 3.2c0 4.6 2.7 5.7 5.5 6c-.6 .6 -.6 1.2 -.5 2v3.5" />
                                                </svg>
                                                Login Student
                                            </a></div>
                                        </div>
                                 </div>
                        <!-- Register -->
                        <!-- <div class="mt-5 text-muted text-center">
                            Go Back <a href="/login">Click Here</a>
                        </div> -->
                        <!-- <div class="simple-footer">
                            Copyright &copy; Anandito 2022
                        </div> -->
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="{{asset ('assets/modules-js/jquery.min.js')}}"></script>
    <script src="{{asset ('assets/modules-js/popper.js')}}"></script>
    <script src="{{asset ('assets/modules-js/tooltip.js')}}"></script>
    <script src="{{asset ('assets/modules-js/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset ('assets/modules-js/nicescroll/jquery.nicescroll.min.js')}}"></script>
    <script src="{{asset ('assets/modules-js/moment.min.js')}}"></script>
    <script src="{{asset ('assets/modules-js/stisla.js')}}"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="{{asset('assets/js/scripts.js')}}"></script>
    <script src="{{asset('assets/js/custom.js')}}"></script>
</body>

</html>