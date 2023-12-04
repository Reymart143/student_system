<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Student Login
  </title>

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
@if ($errors->any())
    <div class="position-fixed top-0 end-0 p-2" style="z-index: 1050;">
        <div class="toast fade show bg-gradient-danger" role="alert" aria-live="assertive" id="errorToast" aria-atomic="true">
            <div class="toast-header bg-transparent border-0">
                <i class="material-icons text-white me-2">notifications</i>
                <small class="text-white">Login Error</small>
                <i class="fas fa-times text-white ms-4 cursor-pointer" style="margin-left:200px !important;" data-bs-dismiss="toast" aria-label="Close"></i>
            </div>
            <hr class="horizontal light m-0">
            <div class="toast-body text-white">
                <x-validation-errors />
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            setTimeout(function(){
                $('#errorToast').fadeOut('slow');
            }, 3000);
        });
    </script>
@endif
<body class="bg-gray-200">
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
      </div>
    </div>
  </div>
  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100" style="background-image: url('assets/img/logos/bg.jpg');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
                <h4 class="text-white font-weight-bolder text-center mt-2 mb-0"><img src="./assets/img/logos/logo_sl.jpg" alt="Logo" class="rounded-circle" style="object-fit: cover; width: 50%; height: 30%;"></h4>
                <h4  class="text-black font-weight-bolder text-center mt-2 mb-0">login Portal</h4>
                
              <div class="card-body" style="margin-top:-10%">
                <form class="text-start" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="input-group input-group-outline my-3">
                      <label class="form-label">Username</label>
                      <input id="username" type="text" name="username" :value="old('username')" required autofocus autocomplete="username"  class="form-control">
                    </div>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Password</label>
                    <input id="password" type="password" name="password" required autocomplete="current-password" class="form-control">
                  </div>
                  <div class="form-check form-switch d-flex align-items-center mb-3">
                    <x-checkbox id="remember_me" name="remember" class="form-check-input" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-success w-100 my-4 mb-2">Sign in</button>
                  </div>
                    @if (Route::has('password.request'))
                    <a class="underline text-sm text-red-600 hover:text-red-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 text-danger" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
                  <p class="mt-4 text-sm text-center">
                    Don't have an account?
                    <a href="/register" class="text-primary text-gradient font-weight-bold">Sign up</a>
                  </p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer position-absolute bottom-2 py-2 w-100" style="margin-left: 32%">
        <div class="container">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-12 col-md-6 my-auto">
              <div class="copyright text-center text-sm text-white text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
               Copyright  <i class="fa fa-heart" aria-hidden="true"></i> 
                <a href="https://www.creative-tim.com" class="font-weight-bold text-white" target="_blank">Taguig NHS 2023</a>
        
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </main>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.1.0"></script>
</body>

</html>
