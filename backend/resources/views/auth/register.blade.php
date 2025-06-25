<!DOCTYPE html>
<html class="loading" lang="fr" data-textdirection="ltr">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
  <meta name="description" content="Page d'inscription personnalisée" />
  <meta name="keywords" content="register, inscription, template, vuexy" />
  <meta name="author" content="Henriette" />
  <title>Inscription</title>

  <link rel="shortcut icon" href="../../../app-assets/images/ico/favicon.ico" />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet" />

  <!-- CSS Vendor -->
  <link rel="stylesheet" href="../../../app-assets/vendors/css/vendors.min.css" />
  <!-- CSS Vuexy -->
  <link rel="stylesheet" href="../../../app-assets/css/bootstrap.css" />
  <link rel="stylesheet" href="../../../app-assets/css/bootstrap-extended.css" />
  <link rel="stylesheet" href="../../../app-assets/css/colors.css" />
  <link rel="stylesheet" href="../../../app-assets/css/components.css" />
  <link rel="stylesheet" href="../../../app-assets/css/themes/dark-layout.css" />
  <link rel="stylesheet" href="../../../app-assets/css/themes/bordered-layout.css" />
  <link rel="stylesheet" href="../../../app-assets/css/themes/semi-dark-layout.css" />
  <link rel="stylesheet" href="../../../app-assets/css/core/menu/menu-types/vertical-menu.css" />
  <link rel="stylesheet" href="../../../app-assets/css/plugins/forms/form-validation.css" />
  <link rel="stylesheet" href="../../../app-assets/css/pages/authentication.css" />
  <link rel="stylesheet" href="../../../assets/css/style.css" />
</head>

<body
  class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static menu-collapsed"
  data-menu="vertical-menu-modern"
  data-col="blank-page"
>
  <div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
      <div class="content-header row"></div>
      <div class="content-body">
        <div class="auth-wrapper auth-cover">
          <div class="auth-inner row m-0">
            <!-- Brand Logo -->
            <a class="brand-logo" href="#">
              <img src="../../../app-assets/images/ico/logop.jpeg" alt="Logo" height="40" />
              <h2 class="brand-text ms-1 fw-bold" style="color: #ff9911;">Pointel</h2>
            </a>

            <!-- Left image -->
            <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
              <div class="w-100 d-lg-flex align-items-center justify-content-center px-5">
                <img
                  class="img-fluid"
                  src="../../../app-assets/images/pages/register-v2.svg"
                  alt="Illustration"
                />
              </div>
            </div>

            <!-- Register Form -->
            <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
              <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                <h2 class="card-title fw-bold mb-1">Inscription</h2>

                <form
                  class="auth-register-form mt-2"
                  action="{{ route('register.store') }}"
                  method="POST"
                >
                  @csrf

                  <!-- Affichage des erreurs -->
                  @if ($errors->any())
                  <div class="alert alert-danger">
                    <ul class="mb-0">
                      @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                  @endif

                  <div class="mb-1">
                    <label for="nom" class="form-label">Nom</label>
                    <input
                      type="text"
                      id="nom"
                      name="nom"
                      class="form-control"
                      placeholder="Entrez votre nom"
                      value="{{ old('nom') }}"
                      required
                    />
                  </div>

                  <div class="mb-1">
                    <label for="prenom" class="form-label">Prénom</label>
                    <input
                      type="text"
                      id="prenom"
                      name="prenom"
                      class="form-control"
                      placeholder="Entrez votre prénom"
                      value="{{ old('prenom') }}"
                      required
                    />
                  </div>

                  <div class="mb-1">
                    <label for="email" class="form-label">Email</label>
                    <input
                      type="email"
                      id="email"
                      name="email"
                      class="form-control"
                      placeholder="exemple@mail.com"
                      value="{{ old('email') }}"
                      required
                    />
                  </div>

                  <div class="mb-1">
                    <label for="telephone" class="form-label">Téléphone (optionnel)</label>
                    <input
                      type="tel"
                      id="telephone"
                      name="telephone"
                      class="form-control"
                      placeholder="+221 77 123 45 67"
                      value="{{ old('telephone') }}"
                    />
                  </div>

                  <div class="mb-1">
                    <label for="password" class="form-label">Mot de passe</label>
                    <div class="input-group input-group-merge form-password-toggle">
                      <input
                        type="password"
                        id="password"
                        name="password"
                        class="form-control form-control-merge"
                        placeholder="********"
                        required
                      />
                      <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                    </div>
                  </div>

                  <div class="mb-1">
                    <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
                    <div class="input-group input-group-merge form-password-toggle">
                      <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        class="form-control form-control-merge"
                        placeholder="********"
                        required
                      />
                      <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                    </div>
                  </div>

                  <div class="mb-1 form-check">
                    <input
                      type="checkbox"
                      class="form-check-input"
                      id="terms"
                      name="terms"
                      required
                      {{ old('terms') ? 'checked' : '' }}
                    />
                    <label class="form-check-label" for="terms"
                      >J'accepte les <a href="#">conditions d'utilisation</a></label
                    >
                  </div>

                  <button
                    type="submit"
                    class="btn w-100"
                    style="background-color: #ff9911; color: white; border: none;"
                  >
                    Créer un compte
                  </button>
                </form>

                <p class="text-center mt-2">
                  <span>Déjà inscrit ?</span>
                  <a href="{{ route('login') }}"><span>Se connecter</span></a>
                </p>

                <div class="divider my-2">
                  <div class="divider-text">ou</div>
                </div>

                <div class="auth-footer-btn d-flex justify-content-center">
                  <a class="btn btn-facebook" href="#"><i data-feather="facebook"></i></a>
                  <a class="btn btn-twitter white" href="#"><i data-feather="twitter"></i></a>
                  <a class="btn btn-google" href="#"><i data-feather="google"></i></a>
                  <a class="btn btn-github" href="#"><i data-feather="github"></i></a>
                </div>
              </div>
            </div>
            <!-- /Register Form -->
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- JS Vendor -->
  <script src="../../../app-assets/vendors/js/vendors.min.js"></script>
  <!-- JS Theme -->
  <script src="../../../app-assets/js/core/app-menu.js"></script>
  <script src="../../../app-assets/js/core/app.js"></script>
  <!-- JS Page -->
  <script src="../../../app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
  <script src="../../../app-assets/js/scripts/pages/auth-register.js"></script>

  <script>
    window.addEventListener('load', function () {
      if (feather) {
        feather.replace({ width: 14, height: 14 });
      }
    });
  </script>
</body>
</html>
