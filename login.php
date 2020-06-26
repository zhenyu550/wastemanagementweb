<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Login</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="robots" content="all,follow" />
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css" />
    <!-- Font Awesome CSS-->
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
      integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
      crossorigin="anonymous"
    />
    <!-- Google fonts - Popppins for copy-->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Poppins:300,400,800"
    />
    <!-- orion icons-->
    <link rel="stylesheet" href="css/orionicons.css" />
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet" />
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css" />
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.png?3" />
    <!-- Tweaks for older IEs-->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script
    ><![endif]-->
  </head>
  <body>
    <div class="page-holder d-flex align-items-center">
      <div class="container">
        <div class="row align-items-center py-5">
          <div class="col-5 col-lg-7 mx-auto mb-5 mb-lg-0">
            <div class="pr-lg-5">
              <img src="images/pc-banner.png" alt="" class="img-fluid" />
            </div>
          </div>
          <div class="col-lg-5 px-lg-4">
            <h1 class="text-base text-primary text-uppercase mb-4">
              Non Biodegradable Waste Management System
            </h1>
            <h2 class="mb-4">Welcome back!</h2>
            <p class="text-muted">
              Please login with your staff username and password.
            </p>
            <form id="loginForm" action="login_post.php" method="post" class="mt-4">
              <div class="form-group mb-4">
                <input
                  type="text"
                  name="username"
                  placeholder="Staff Username"
                  class="form-control border-0 shadow form-control-lg"
                />
              </div>
              <div class="form-group mb-4">
                <input
                  type="password"
                  name="password"
                  placeholder="Password"
                  class="form-control border-0 shadow form-control-lg text-violet"
                />
              </div>
              <button type="submit" class="btn btn-primary shadow px-5">
                Log in
              </button>
            </form>
          </div>
        </div>
        <p class="mt-5 mb-0 text-gray-400 text-center">
          Design by
          <a
            href="https://bootstrapious.com/admin-templates"
            class="external text-gray-400"
            >Bootstrapious</a
          >
          & Your company
        </p>
        <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)                 -->
      </div>
    </div>
    <!-- JavaScript files-->
    <?php include("javascript.php"); ?>
  </body>
</html>
