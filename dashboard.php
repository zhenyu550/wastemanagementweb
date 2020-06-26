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
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Dashboard</title>
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
    <!-- navbar-->
    <?php include("header.php"); ?>
    <div class="d-flex align-items-stretch">
      <!-- keep coding inside this tag. it stretches-->
      <!-- sidebar-->
      <?php include("sidebar.php"); ?>
      <div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-5">
          <section class="py-5">
            <div class="row">
              <div class="col-lg-12">
                <div class="card mb-5 mb-lg-0">         
                  <div class="card-header">
                    <h2 class="h6 mb-0 text-uppercase">Transaction history</h2>
                  </div>
                  <div class="card-body">
                    <table class="table table-striped table-hover card-text" id="transaction_table">
                              <thead>
                                <tr>
                                  <th>ID</th>
                                  <th>Date</th>
                                  <th>Time</th>
                                  <th>Customer Name</th>
                                  <th>Customer Mobile No</th>
                                  <th>Customer Email</th>
                                  <th>Managed By</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <th scope="row">1</th>
                                  <td>16 Jun 2020</td>
                                  <td>08:32:00</td>
                                  <td>Chin Zhen Yu</td>
                                  <td>012-3456789</td>
                                  <td>chinzhenyu97@gmail.conm</td>
                                  <td>Mohammad Ahmad bin Mohammad Mutu</td>
                                </tr>
                                <tr>
                                  <th scope="row">2</th>
                                  <td>16 Jun 2020</td>
                                  <td>10:45:12</td>
                                  <td>Wan Nurwani binti Siti Rosella</td>
                                  <td>012-3456789</td>
                                  <td>chinzhenyu97@gmail.conm</td>
                                  <td>Yap Li Feng</td>
                                </tr>
                              </tbody>
                            </table>
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
    <?php include("javascript.php"); ?>
  </body>
</html>
