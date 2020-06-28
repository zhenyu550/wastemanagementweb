<!DOCTYPE html>
<?php
session_start();
require_once './database.php';
if (!isset($_SESSION["user"])) {
    echo "<script type='text/javascript'>location.href = 'login.php';</script>";
} else {
    $user = $_SESSION["user"];
}
?>

<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Add Collector</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="robots" content="all,follow" />
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css" />
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous" />
    <!-- Google fonts - Popppins for copy-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,800" />
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
                        <!-- Form Elements -->
                        <div class="col-lg-12 mb-5">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="h6 text-uppercase mb-0">Add Collector</h3>
                                </div>
                                <div class="card-body">
                                    <form class="form-horizontal" method="post">
                                        <div class="form-group row">
                                            <label class="col-md-2 form-control-label">Name</label>
                                            <div class="col-md-9">
                                                <input name="name" required type="text" placeholder="Insert branch name" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 form-control-label">Address</label>
                                            <div class="col-md-9">
                                                <input name="address" required type="text" placeholder="Insert address" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 form-control-label">Phone No.</label>
                                            <div class="col-md-9">
                                                <input name="phone" required type="text" placeholder="Insert phone no" class="form-control" />
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-2 form-control-label">Fax No.</label>
                                            <div class="col-md-9">
                                                <input name="fax" required type="text" placeholder="Insert fax no." class="form-control" />
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-2 form-control-label">Waste Type</label>
                                            <div class="col-md-9 select mb-3">
                                                <select name="waste_type" id="waste_type" class="form-control">
                                                    <?php 
                                                    // Get all waste type data from database
                                                    $types = Waste_Type::all();
    
                                                    foreach($types as $type){
                                                        $type_id = $type->get_id();
                                                        $type_name = $type->get_name();

                                                        echo "<option value=\"$type_id\">$type_name</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-2 form-control-label">State</label>
                                            <div class="col-md-9 select mb-3">
                                                <select name="state" id="state" class="form-control">
                                                    <option value="" disabled selected hidden>Select State</option>
                                                    <option>Johor</option>
                                                    <option>Kedah</option>
                                                    <option>Kelantan</option>
                                                    <option>Melaka</option>
                                                    <option>Negeri Sembilan</option>
                                                    <option>Pahang</option>
                                                    <option>Pulau Pinang</option>
                                                    <option>Perak</option>
                                                    <option>Perlis</option>
                                                    <option>Sabah</option>
                                                    <option>Sarawak</option>
                                                    <option>Selangor</option>
                                                    <option>Terangganu</option>
                                                    <option>W.P. Kuala Lumpur</option>
                                                    <option>W.P. Labuan</option>
                                                    <option>W.P. Putrajaya</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-8 ml-auto">
                                                <button type="reset" class="btn btn-secondary">
                                                    Reset
                                                </button>
                                                <button type="submit" class="btn btn-primary" formaction="addcollector_post.php">
                                                    Add Collector
                                                </button>
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
    <?php include("javascript.php"); ?>
</body>

</html>