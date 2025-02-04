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
  <link href="sass/main.css" rel="stylesheet">
  <link href="sass/dark-theme.css" rel="stylesheet">
  <link href="sass/responsive.css" rel="stylesheet">

  </head>

  <body class="bg-forgot-password">


    <!--authentication-->

     <div class="container my-5">
        <div class="row">
           <div class="col-12 col-md-8 col-lg-6 col-xl-5 col-xxl-4 mx-auto">
            <div class="card border-3">
              <div class="card-body p-5">
                  <img src="/assets/images/logo1.png" class="mb-4" width="145" alt="">
                  <h4 class="fw-bold">Forgot Password?</h4>
                  <p class="mb-0">Enter your registered email ID to reset the password</p>

                  <div class="form-body mt-4">
										<form class="row g-3">
											<div class="col-12">
												<label class="form-label">Email id</label>
												<input type="text" class="form-control" placeholder="example@user.com">
											</div>
											<div class="col-12">
												<div class="d-grid gap-2">
                          <button type="button" class="btn btn-primary">Send</button>
                           <a href="{{ route('admin.login') }}" class="btn btn-light">Back to Login</a>
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