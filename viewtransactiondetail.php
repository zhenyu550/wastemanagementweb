<!DOCTYPE html>
<?php 
  session_start();
  require_once './database.php';
  if (!isset($_SESSION["user"]))
  {
    echo "<script type='text/javascript'>location.href = 'login.php';</script>";
  }
  else
  {
    $user = $_SESSION["user"];
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>View Transaction Detail</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="all,follow">
  <!-- Bootstrap CSS-->
  <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome CSS-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
    integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <!-- Google fonts - Popppins for copy-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,800">
  <!-- orion icons-->
  <link rel="stylesheet" href="css/orionicons.css">
  <!-- theme stylesheet-->
  <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
  <!-- Custom stylesheet - for your changes-->
  <link rel="stylesheet" href="css/custom.css">
  <!-- Favicon-->
  <link rel="shortcut icon" href="img/favicon.png?3">
  <!-- Tweaks for older IEs-->
  <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>

<body>
   <!-- navbar-->
    <?php include("header.php"); ?>  
    <div class="d-flex align-items-stretch"> <!-- keep coding inside this tag. it stretches-->
      <!-- sidebar-->
      <?php include("sidebar.php"); ?> 
    <div class="page-holder w-100 d-flex flex-wrap">
      <div class="container-fluid px-xl-5">
        <section class="py-5">
          <div class="row">

            <!-- Form Elements -->
            <div class="col-lg-12 mb-5">
              <div class="card">
                <div class="card-header">
                  <h3 class="h6 text-uppercase mb-0">View Transaction Detail</h3>
                </div>
                <div class="card-body">
                  <form class="form-horizontal">
                    <div class="form-group row">
                        <label class="col-md-3 form-control-label">Name</label>
                        <div class="col-md-9">
                          <input type="text" placeholder="Insert name" class="form-control" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-3 form-control-label">Email</label>
                        <div class="col-md-9">
                          <input type="text" placeholder="Insert your email" class="form-control" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-3 form-control-label">Phone No.</label>
                        <div class="col-md-9">
                          <input type="text" placeholder="Insert your phone no." class="form-control" readonly>
                        </div>
                      </div>
                    <div class="line"></div>
                    <hr/>
                    <div class="line"></div>
                    <div class="form-group row">
                      <label class="col-md-3 form-control-label">Date and Time</label>
                      <div class="col-md-6">
                        <input type="datetime-local" class="form-control" readonly>
                      </div>
                    </div>
                     <div class="form-group row">
                        <label class="col-md-3 form-control-label">Collection Point</label>
                        <div class="col-md-6 select mb-3">
                          <input type="text" placeholder="Collection Point" class="form-control" readonly>
                        </div>
                      </div>
                    
                      <div class="col-lg-10 mb-4" style="margin: auto">
                        <div class="card">
                          <div class="card-header">
                            <h6 class="text-uppercase mb-0" style="text-align: center;">List of Wastes</h6>
                            <br/>
                            <div class="card-body">
                              <table class="table table-striped table-hover card-text">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>Waste Type</th>
                                    <th>Weight (kg)</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th scope="row">1</th>
                                    <td>Paper</td>
                                    <td>1.50</td>
                                  </tr>
                                  <tr>
                                    <th scope="row">2</th>
                                    <td>Metal</td>
                                    <td>0.50</td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>

                    <div class="form-group row">
                      <div class="col-md-8 ml-auto">
                        <button type="button" class="btn btn-secondary">Back</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <!-- footer-->
        <?php include("footer.php"); ?>
    </div>
  </div>
  <!-- JavaScript files-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/popper.js/umd/popper.min.js"> </script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
  <script src="js/front.js"></script>
</body>

</html>