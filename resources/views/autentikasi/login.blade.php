<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title', 'PT. Indomex Dwijaya Lestari - Login')</title>
    <meta name="description" content="Aplikasi Manajemen PT. Indomex Dwijaya Lestari">
    <meta name="author" content="Abyan Adam">
    <meta name="keywords" content="Aplikasi Manajemen PT. Indomex Dwijaya Lestari" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/logo2.png') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" type="text/css">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/login/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Material Design Bootstrap -->
    <link href="{{ asset('assets/login/css/mdb.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Our Custom CSS -->
    <link href="{{ asset('assets/login/css/sign-style.css') }}" rel="stylesheet" type="text/css" />
    <!--  Toasts -->
    <link href="{{ asset('assets/login/vendor/toasts/toastr.min.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
    <script src="{{ asset('assets/login/js/jquery.min.js') }}"></script>
    <!-- Bootstrap tooltips -->
    <script src="{{ asset('assets/login/js/popper.min.js') }}"></script>
    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('assets/login/js/bootstrap.min.js') }}"></script>
    <!-- MDB core JavaScript -->
    <script src="{{ asset('assets/login/js/mdb.min.js') }}"></script>
    <!-- Start your project here-->
    <main class="main">
        <div class="app-container">
            <div class="app-login">
                <div class="app-screen">
                    <div class="app-screen-left"></div>
                    <div class="app-screen-right">
                        <div class="app-screen-form">
                            <div class="app-screen-header">
                                <h2 class="text-primary">PT. Indomex Dwijaya Lestari</h2>
                                <p>Silahkan login untuk masuk ke akun anda</p>
                            </div>
                            <div class="app-screen-body">
                                <!-- Material form login -->
                                <form action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <!-- Username -->
                                    <div class="md-form form-lg required">
                                        <label for="username">Email</label>
                                        <input type="text"
                                            class="form-control @error('username') is-invalid @enderror" name="username"
                                            id="username" value="{{ old('username') }}" autocomplete="off">
                                        @error('username')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <!-- Password -->
                                    <div class="md-form form-lg required">
                                        <label for="password">Password</label>
                                        <input type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            value="{{ old('password') }}" id="password" autocomplete="off">
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="row d-flex align-items-center">
                                        <!-- Remember me -->
                                        <div class="col-md-6 col-6 text-left">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" name="rememberme"
                                                    id="rememberme">
                                                <label class="custom-control-label" for="rememberme">Remember me</label>
                                            </div>
                                        </div>
                                        <!-- Forgot password -->
                                        <div class="col-md-6 col-6">
                                            <a href="javascript:;" class="d-flex justify-content-end">Forgot password
                                                ?</a>
                                        </div>
                                    </div>
                                    <!-- Sign in button -->
                                    <button class="btn btn-primary btn-block my-4" type="submit" name="submit"
                                        id="submit">Sign In</button>
                                </form>
                                <!-- Don't have Account -->
                                <p class="font-small grey-text app-contact">
                                    Don't have an account ?
                                    <a href="javascript:;" class="text-primary">Please contact admin</a>
                                </p>
                                <!-- copyright -->
                                <p class="font-small grey-text text-center">
                                    <a href="https://sukumaya.co.id/" target="_blank">PT. Suku Maya Teknologi</a> &copy;
                                    2022
                                </p>
                                <!-- Material form login -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- /Start your project here-->

    <!-- SCRIPTS -->
    <!-- Toasts -->
    <script src="{{ asset('assets/login/vendor/toasts/toastr.min.js') }}"></script>
    <script>
        @if (Session::has('success'))
            toastr["success"]("{{ Session::get('success') }}", "Berhasil")
        @elseif (Session::has('message'))
            toastr["error"]("{{ Session::get('message') }}", "Gagal")
        @endif
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    </script>
</body>

</html>
