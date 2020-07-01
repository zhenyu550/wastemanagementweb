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
                                    <h3 class="h6 text-uppercase mb-0">Add Staff</h3>
                                </div>
                                <div class="card-body">
                                    <form class="form-horizontal" method="post">
                                        <div class="form-group row">
                                            <label class="col-md-2 form-control-label">Name</label>
                                            <div class="col-md-9">
                                                <?php
                                                if (isset($_SESSION["name"])) {
                                                    $name = $_SESSION["name"];
                                                    $_SESSION["name"] = null;

                                                    echo "<input name=\"name\" required type=\"text\" placeholder=\"Insert name\" class=\"form-control\" value=\"$name\" />";
                                                } else {
                                                    echo "<input name=\"name\" required type=\"text\" placeholder=\"Insert name\" class=\"form-control\" />";
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 form-control-label">Phone No.</label>
                                            <div class="col-md-9">
                                                <?php
                                                if (isset($_SESSION["phone_no"])) {
                                                    $phone_no = $_SESSION["phone_no"];
                                                    $_SESSION["phone_no"] = null;

                                                    echo "<input name=\"phone_no\" required type=\"text\" placeholder=\"Insert phone no.\" class=\"form-control\" value=\"$phone_no\" />";
                                                } else {
                                                    echo "<input name=\"phone_no\" required type=\"text\" placeholder=\"Insert phone no.\" class=\"form-control\" />";
                                                }
                                                ?>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-2 form-control-label">Email</label>
                                            <div class="col-md-9">
                                                <?php
                                                if (isset($_SESSION["email"])) {
                                                    $email = $_SESSION["email"];
                                                    $_SESSION["email"] = null;

                                                    echo "<input name=\"email\" required type=\"text\" placeholder=\"Insert email\" class=\"form-control\" value=\"$email\" />";
                                                } else {
                                                    echo "<input name=\"email\" required type=\"text\" placeholder=\"Insert email\" class=\"form-control\" />";
                                                }
                                                ?>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-2 form-control-label">Branch</label>
                                            <div class="col-md-9 select mb-3">
                                                <select name="cp" id="cp" class="form-control">
                                                    <?php
                                                    // Get all collection point from database
                                                    $items = Collection_Point::all();
                                                    $branch_id = "";

                                                    if (isset($_SESSION["branch_id"])) {
                                                        $branch_id = $_SESSION["branch_id"];
                                                        $_SESSION["branch_id"] = null;
                                                    }

                                                    foreach ($items as $item) {
                                                        $item_id = $item->get_id();
                                                        $item_name = $item->get_name();
                                                        $item_state = $item->get_state();

                                                        if($item_id == $branch_id){
                                                            echo "<option value=\"" . $item_id . "\" selected>" . $item_state . " - " . $item_name . "</option>";
                                                        } else {
                                                            echo "<option value=\"" . $item_id . "\">" . $item_state . " - " . $item_name . "</option>";
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-2 form-control-label">Username</label>
                                            <div class="col-md-9">
                                                <?php
                                                if (isset($_SESSION["username"])) {
                                                    $username = $_SESSION["username"];
                                                    $_SESSION["username"] = null;

                                                    echo "<input name=\"username\" required type=\"text\" placeholder=\"Insert username\" class=\"form-control\" value=\"$username\" />";
                                                } else {
                                                    echo "<input name=\"username\" required type=\"text\" placeholder=\"Insert username\" class=\"form-control\" />";
                                                }
                                                ?>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-2 form-control-label">Staff Type</label>
                                            <div class="col-md-9 select mb-3">
                                                <select name="type" id="type" class="form-control">
                                                    <?php
                                                    if (isset($_SESSION["type"])) {
                                                        $type = $_SESSION["type"];
                                                        $_SESSION["type"] = null;

                                                        $type_options = array("Normal", "Admin");
                                                        foreach ($type_options as $type_option) {
                                                            if ($type_option == $type) {
                                                                echo "<option value=\"$type_option\" selected>$type_option</option>";
                                                            } else {
                                                                echo "<option value=\"$type_option\">$type_option</option>";
                                                            }
                                                        }
                                                    } else {
                                                        echo "<option value=\"Normal\">Normal</option>";
                                                        echo "<option value=\"Admin\">Admin</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-9 form-control-label">*The staff username is the default password.</label>
                                        </div>


                                        <div class="form-group row">
                                            <div class="col-md-8 ml-auto">
                                                <button type="reset" class="btn btn-secondary">
                                                    Reset
                                                </button>
                                                <button type="submit" class="btn btn-primary" formaction="addstaff_post.php">
                                                    Add Staff
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