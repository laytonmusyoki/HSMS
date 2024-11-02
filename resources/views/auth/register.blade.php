<!doctype html>
<html lang="en" data-bs-theme="light">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home | Bootstrap demo</title>
  <!--favicon-->
	<link rel="icon" href="/assets/images/favicon-32x32.png" type="image/png">

  <!--plugins-->
  <link href="/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="/assets/plugins/metismenu/metisMenu.min.css">
  <link rel="stylesheet" type="text/css" href="/assets/plugins/metismenu/mm-vertical.css">
  <!--bootstrap css-->
  <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined" rel="stylesheet">
  <!--main css-->
  <link href="/assets/css/bootstrap-extended.css" rel="stylesheet">
  <link href="/sass/main.css" rel="stylesheet">
  <link href="/sass/dark-theme.css" rel="stylesheet">
  <link href="/sass/responsive.css" rel="stylesheet">

  </head>

  <body class="bg-register">


    <!--authentication-->

     <div class="container-fluid my-5">
        <div class="row">
           <div class="col-12 col-md-8 col-lg-6 col-xl-5 col-xxl-5 mx-auto">
            <div class="card rounded-4">
              <div class="card-body p-5">
                  {{-- <img src="/assets/images/logo1.png" class="mb-4" width="145" alt=""> --}}
                  <h4 class="fw-bold">Get Started Now</h4>
                  <p class="mb-0">Enter your credentials to create your account</p>

                  @if($errors->any())
                  @foreach ($errors->all() as $error)
                      <div class="alert alert-danger">
                        {{ $error }}
                      </div>
                  @endforeach
                  @endif

                  <div class="form-body my-4">
										<form class="row g-3" method="POST" action="{{ route('user.registerUser') }}">
                      @csrf
											<div class="col-12">
												<label for="inputUsername" class="form-label">Student Name</label>
												<input type="text" name="name" class="form-control" id="inputUsername" placeholder="Jhon">
											</div>
                      <div class="col-12">
												<label for="inputUsername" class="form-label">Phone</label>
												<input type="text" name="phone" class="form-control" id="inputPhone" placeholder="0700000000">
											</div>
											<div class="col-12">
												<label for="inputEmailAddress" class="form-label">Email Address</label>
												<input type="email" name="email" class="form-control" id="inputEmailAddress" placeholder="example@user.com">
											</div>
											<div class="col-12">
												<label for="inputChoosePassword" name="password" class="form-label">Password</label>
												<div class="input-group" id="show_hide_password">
													<input type="password" class="form-control border-end-0" id="inputChoosePassword" name="password" value="" placeholder="Enter Password">
                           <a href="javascript:;" class="input-group-text bg-transparent"><i class="bi bi-eye-slash-fill"></i></a>
												</div>
											</div>
                      <div class="col-12">
												<label for="inputChoosePassword" name="password_confirmation" class="form-label">Confirm</label>
												<div class="input-group" id="show_hide_password">
													<input type="password" name="password_confirmation" class="form-control border-end-0" id="inputChoosePassword" value="" placeholder="Enter Password">
                           <a href="javascript:;" class="input-group-text bg-transparent"><i class="bi bi-eye-slash-fill"></i></a>
												</div>
											</div>
											<div class="col-12">
												<div class="d-grid">
													<button type="submit" class="btn btn-primary">Register</button>
												</div>
											</div>
											<div class="col-12">
												<div class="text-start">
													<p class="mb-0">Already have an account? <a href="{{ route('user.login') }}">Sign in here</a></p>
												</div>
											</div>
										</form>
									</div>

              </div>
            </div>
           </div>
        </div><!--end row-->
     </div>
      
    <!--authentication-->




    <!--plugins-->
    <script src="/assets/js/jquery.min.js"></script>

    <script>
      $(document).ready(function () {
        $("#show_hide_password a").on('click', function (event) {
          event.preventDefault();
          if ($('#show_hide_password input').attr("type") == "text") {
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass("bi-eye-slash-fill");
            $('#show_hide_password i').removeClass("bi-eye-fill");
          } else if ($('#show_hide_password input').attr("type") == "password") {
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass("bi-eye-slash-fill");
            $('#show_hide_password i').addClass("bi-eye-fill");
          }
        });
      });
    </script>
  
  </body>
</html>