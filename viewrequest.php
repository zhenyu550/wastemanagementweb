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
    <title>View Pick Up Requests</title>
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
    <div class="d-flex align-items-stretch">
        <!-- keep coding inside this tag. it stretches-->
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
                                    <h3 class="h6 text-uppercase mb-0">View Pick Up Requests</h3>
                                </div>
                                <div class="card-body">
                                    <form class="form-horizontal">
                                        <div class="form-group row">
                                            <label class="col-md-2 form-control-label">Branch Name</label>
                                            <div class="col-md-9">
                                                <div class="form-group">
                                                    <div class="input-group mb-3">
                                                        <input type="text" placeholder="Branch Name"
                                                            aria-label="Branch Name" aria-describedby="button-search"
                                                            class="form-control">
                                                        <div class="input-group-append">
                                                            <button id="button-search" type="button"
                                                                class="btn btn-primary">Search</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="col-lg-12 mb-4" style="margin: auto">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="text-uppercase mb-0" style="text-align: center;">List of Pick Up Requests</h6>
                            <!-- Modal Form-->
                            <div class="card-body">
                                <table class="table table-striped table-hover card-text">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Request Date</th>
                                            <th>Name</th>
                                            <th>Contact No</th>
                                            <th>Waste Type</th>
                                            <th>Address</th>
                                            <th>Postcode</th>
                                            <th>City</th>
                                            <th>State</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>2020-06-17 14:58:02</td>
                                            <td>Chin Zhen Yuan</td>
                                            <td>014-6677196</td>
                                            <td>Paper, Glass</td>
                                            <td>12, Jalan 123, Taman Gembira, 58200 Kuala Lumpur</td>
                                            <td>58200</td>
                                            <td>Kuala Lumpur</td>
                                            <td>W.P. Kuala Lumpur</td>
                                            <td>
                                                <div class="ml-auto">
                                                    <button type="button" class="btn btn-primary">Pending</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>2020-06-17 14:58:02</td>
                                            <td>Chin Zhen Yuan</td>
                                            <td>014-6677196</td>
                                            <td>Paper, Glass</td>
                                            <td>12, Jalan 123, Taman Gembira, 58200 Kuala Lumpur</td>
                                            <td>58200</td>
                                            <td>Kuala Lumpur</td>
                                            <td>W.P. Kuala Lumpur</td>
                                            <td>
                                                <div class="ml-auto">
                                                    <button type="button" class="btn btn-primary" disabled>Done</button>
                                                </div>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- footer-->
            <?php include("footer.php"); ?>
        </div>
    </div>
    <!-- JavaScript files-->
    <?php include("javascript.php"); ?></body>

</html>