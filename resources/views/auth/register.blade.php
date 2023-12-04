
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
          <div class="col-lg-7 col-md-10 col-12 mx-auto mt-4 mb-4">
             <div class="card z-index-0 fadeIn3 fadeInBottom">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1 mb-7">
                        <h4 class="text-white font-weight-bolder text-center mt-2 mb-0"><img src="./assets/img/logos/logo_sl.jpg" alt="Logo" class="rounded-circle" style="object-fit: cover; width: 12%; height: 10%;"></h4>
                        <h4 class="font-weight-bolder text-white text-center">Student Registration</h4>
                    </div>
              <div class="card-body" style="margin-top:-14%">
                <form role="form" method="POST" action="{{ route('register') }}">
                    @csrf
                    <label for="" class="form-label text-success"><i class="fa fa-users"></i> Profile Information</label>
                    <div class="mb-3 d-flex">
                    <div class="input-group input-group-outline mb-3 me-3">
                      <label class="form-label">Student Name</label>
                      <input class="form-control" id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" >
                    </div>
                    <div class="input-group input-group-outline mb-3">
                        <label class="form-label">Birthdate</label>
                        <input type="date" name="birthday" id="birthday" class="form-control" value="{{ old('birthday') }}" aria-label="birthdate">
                        <input id="age" type="hidden" name="age" :value="old('age')" required autocomplete="age" class="form-control">
                    </div>
                  
                    
                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            const birthdayInput = document.getElementById('birthday');
                            const ageInput = document.getElementById('age');
                    
                            birthdayInput.addEventListener('input', function () {
                                calculateAge();
                            });
                    
                            function calculateAge() {
                                const birthdate = new Date(birthdayInput.value);
                                const today = new Date();
                                let age = today.getFullYear() - birthdate.getFullYear();
                    
                                // Adjust age if birthday hasn't occurred yet this year
                                if (today.getMonth() < birthdate.getMonth() || (today.getMonth() === birthdate.getMonth() && today.getDate() < birthdate.getDate())) {
                                    age--;
                                }
                    
                                ageInput.value = age;
                            }
                        });
                    </script>
                    
                    {{-- <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Student ID</label>
                      <input id="student_id" type="text" name="student_id" :value="old('student_id')" required autocomplete="student_id" class="form-control">
                    </div> --}}
                   </div>
                   <div class="mb-3 d-flex">
                    <div class="input-group input-group-outline mb-3 me-3">
                        {{-- <label for="grade_level">Grade Level</label> --}}
                        <select name="grade_level" id="grade_level" class="form-control{{ $errors->has('grade_level') ? ' is-invalid' : '' }}" placeholder="{{ __('Select Grade level') }}" required>
                            <option value="">Select Grade level
                
                            </option>
                            <option value="Grade 7">Grade 7</option>
                            <option value="Grade 8" >Grade 8</option>
                            <option value="Grade 9" >Grade 9</option>
                            <option value="Grade 10" >Grade 10</option>
                    </select>
                    </div>
                    
                      <div class="input-group input-group-outline mb-3">
                        <label class="form-label">Phone No. <p class="text-info small"> (Optional)</p></label>
                        <input type="text" id="phone" name="phone" value="{{ old('phone') }}" aria-label="Phone #" class="form-control">
                    </div>
                    </div>
                
                    <style>
                        .gender-container {
                            border: 1px solid #ccc; /* Add border style and color here */
                            padding: 10px; /* Add padding for spacing */
                            border-radius: 5px; /* Add border-radius for rounded corners */
                        }
                    </style>
                    <div class="mb-3 d-flex">
                    <div class=" gender-container input-group input-group-outline mb-3 me-3">
                        <label>Gender : </label>
                
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="male" checked>
                            <label class="form-check-label" for="male">
                                Male
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                            <label class="form-check-label" for="female">
                                Female
                            </label>
                        </div>
                        {{-- <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="others" value="others">
                            <label class="form-check-label" for="others">
                                Others
                            </label>
                        </div> --}}
                        </div>
                        <div class="input-group input-group-outline mb-3">
                            <label class="form-label">Home Address</label>
                            <input type="text" id="location" name="location" class="form-control"  value="{{ old('location') }}">
                        </div>
                    </div>
                  
                    <div class="mb-3 d-flex">
                       
                        {{-- <div class="input-group input-group-outline mb-3">
                            <label class="form-label">Age</label>
                            
                        </div> --}}
                    </div>
                   
                    <label for="" class="form-label text-success"><i class="fa fa-phone"></i> Contact Emergency</label>
                    <div class="mb-3 d-flex">
                        <div class="input-group input-group-outline mb-3 me-3">
                            <label class="form-label">Guardian Name</label>
                            <input type="text" name="name_guardian" id="name_guardian" class="form-control" value="{{ old('name_guardian') }}" aria-label="Section">
                        </div>
                        <div class="input-group input-group-outline mb-3">
                            <label class="form-label">Contact Number</label>
                            <input type="text" name="contact_guardian" id="contact_guardian" class="form-control"  value="{{ old('contact_guardian') }}" aria-label="Section">
                        </div>
                    </div>
                    <label for="" class="form-label text-success"><i class="fa fa-user"></i> Account</label>
                    <div class="mb-3 d-flex">
                        <div class="input-group input-group-outline mb-3 me-3">
                            <label class="form-label">Email <p class="text-info small"> (Optional)</p></label>
                            <input id="email" type="email" name="email" :value="old('email')" required autocomplete="email"class="form-control">
                          </div>
                        <div class="input-group input-group-outline mb-3">
                
                            <label class="form-label">Username</label>
                            <input type="string" id="username" name="username" class="form-control" value="{{ old('username') }}" aria-label="username">
                        </div>
                        {{-- <div class="input-group input-group-outline mb-3">
                            <label class="form-label">Section Name <p class="text-info small"> (Optional)</p></label>
                            <input type="text" name="section_name" id="section_name" class="form-control"  value="{{ old('section_name') }}" aria-label="Section">
                        </div> --}}
                    </div>
                    <div class="mb-3 d-flex">
                        <div class="input-group input-group-outline mb-3 me-3">
                        <label class="form-label">Password</label>
                        <input id="password" type="password" name="password" required autocomplete="new-password" class="form-control">
                        </div>
                        <div class="input-group input-group-outline mb-3">
                            <label class="form-label">Confirm Password</label>
                            <input  id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" class="form-control">
                          </div>
                    </div>
                    
                    <div class="form-check form-check-info text-start ps-0">
                        {{-- @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature()) --}}
                        {{-- <label class="form-check-label" for="terms">
                        <input class="form-check-input" type="checkbox" name="terms" id="terms" required>
                      
                          I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and Conditions</a>
                          <div class="ms-2">
                              {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                      'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                      'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                              ]) !!}
                          </div>
                        </label>
                    @endif --}}
                     
                    </div>
                    <div class="text-center">
                      <button class="btn btn-lg bg-gradient-success btn-lg w-100 mt-4 mb-0">Register</button>
                      {{-- <x-button class="ms-4">
                        {{ __('Register') }}
                    </x-button> --}}
                    </div>
                  </form>
                  <div class="card-footer text-center pt-0 px-lg-2 px-1 mt-4">
                    <p class="mb-2 text-sm mx-auto">
                      Already have an account?
                      <a href="login" class="text-primary text-gradient font-weight-bold">Sign in</a>
                    </p>
                  </div>
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







