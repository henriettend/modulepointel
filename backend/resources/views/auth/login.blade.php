<!DOCTYPE html>
<html lang="fr" class="loading" data-textdirection="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion évaluation Pointel</title>
    <link rel="shortcut icon" href="{{ asset('app-assets/images/ico/logop.jpeg') }}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('app-assets/vendors/css/vendors.min.css') }}">
    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('app-assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('app-assets/css/bootstrap-extended.css') }}">
    <link rel="stylesheet" href="{{ asset('app-assets/css/colors.css') }}">
    <link rel="stylesheet" href="{{ asset('app-assets/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('app-assets/css/themes/dark-layout.css') }}">
    <link rel="stylesheet" href="{{ asset('app-assets/css/themes/bordered-layout.css') }}">
    <link rel="stylesheet" href="{{ asset('app-assets/css/themes/semi-dark-layout.css') }}">
    <!-- Page CSS -->
    <link rel="stylesheet" href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" href="{{ asset('app-assets/css/plugins/forms/form-validation.css') }}">
    <link rel="stylesheet" href="{{ asset('app-assets/css/pages/authentication.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static menu-collapsed" data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">

    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-body">
                <div class="auth-wrapper auth-cover">
                    <div class="auth-inner row m-0">
                        <!-- Brand logo -->
                        <a class="brand-logo" href="{{ route('dashboard') }}">
                            <img src="{{ asset('app-assets/images/ico/logop.jpeg') }}" alt="Logo" height="40">
                            <h2 class="brand-text ms-1 fw-bold" style="color: #ff9911;">Pointel</h2>
                        </a>
                        <!-- /Brand logo -->

                        <!-- Left Text -->
                        <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                            <div class="w-100 d-lg-flex align-items-center justify-content-center px-5">
                                <img class="img-fluid" src="{{ asset('app-assets/images/pages/login-v2.svg') }}" alt="Login Illustration" />
                            </div>
                        </div>
                        <!-- /Left Text -->

                        <!-- Login Form -->
                        <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <h2 class="card-title fw-bold mb-1">Connexion</h2>
                                <p class="card-text mb-2">Veuillez vous connecter à votre compte.</p>

                                <form class="auth-login-form mt-2" method="POST" action="{{ route('login.post') }}">
                                    @csrf
                                    <div class="mb-1">
                                        <label class="form-label" for="login-email">Email</label>
                                        <input class="form-control" id="login-email" type="email" name="email" required autofocus />
                                    </div>
                                    <div class="mb-1">
                                        <div class="d-flex justify-content-between">
                                            <label class="form-label" for="login-password">Mot de passe</label>
                                            <a href="#"><small>Mot de passe oublié ?</small></a>
                                        </div>
                                        <input class="form-control form-control-merge" id="login-password" type="password" name="password" required />
                                    </div>
                                    <div class="mb-1">
                                        <div class="form-check">
                                            <input class="form-check-input" id="remember-me" type="checkbox" name="remember">
                                            <label class="form-check-label" for="remember-me">Souviens-toi de moi</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn w-100" style="background-color: #ff9911; color: white; border: none;">
                                        Connexion
                                    </button>
                                </form>

                                <p class="text-center mt-2">
                                    <span>Nouveau sur notre plateforme ?</span>
                                    <a href="{{ route('register') }}"><span>&nbsp;Créer un compte</span></a>
                                </p>

                                <div class="divider my-2">
                                    <div class="divider-text">ou</div>
                                </div>

                                <div class="auth-footer-btn d-flex justify-content-center">
                                    <a class="btn btn-facebook" href="#"><i data-feather="facebook"></i></a>
                                    <a class="btn btn-twitter white" href="#"><i data-feather="twitter"></i></a>
                                    <a class="btn btn-google" href="#"><i data-feather="mail"></i></a>
                                    <a class="btn btn-github" href="#"><i data-feather="github"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- /Login Form -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Vendor JS -->
    <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <!-- Theme JS -->
    <script src="{{ asset('app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('app-assets/js/core/app.js') }}"></script>
    <script src="{{ asset('app-assets/js/scripts/pages/auth-login.js') }}"></script>

    <script>
        $(window).on('load', function () {
            if (feather) {
                feather.replace({ width: 14, height: 14 });
            }
        });
    </script>
</body>

</html>
