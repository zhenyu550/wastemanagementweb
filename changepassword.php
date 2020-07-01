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
    <title>Change Password</title>
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
                                    <h3 class="h6 text-uppercase mb-0">Change Password</h3>
                                </div>
                                <div class="card-body">
                                    <form class="form-horizontal" method="post">

                                        <input type="hidden" name="staff_id" value="<?php echo $user; ?>" />

                                        <div class="form-group row">
                                            <label class="col-md-2 form-control-label">Old Password</label>
                                            <div class="col-md-9">
                                                <?php
                                                if (isset($_SESSION['old_pw'])) {
                                                    $old_pw = $_SESSION['old_pw'];
                                                    $_SESSION['old_pw'] = null;
                                                    echo "<input name=\"old_pw\" required type=\"password\" placeholder=\"Insert old password\" class=\"form-control\" value=\"$old_pw\" />";
                                                } else {
                                                    echo "<input name=\"old_pw\" required type=\"password\" placeholder=\"Insert old password\" class=\"form-control\"/>";
                                                }
                                                ?>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-2 form-control-label">New Password</label>
                                            <div class="col-md-9">
                                                <?php
                                                if (isset($_SESSION['new_pw'])) {
                                                    $new_pw = $_SESSION['new_pw'];
                                                    $_SESSION['new_pw'] = null;
                                                    echo "<input name=\"new_pw\" required type=\"password\" placeholder=\"Insert new password\" class=\"form-control\" value=\"$new_pw\" />";
                                                } else {
                                                    echo "<input name=\"new_pw\" required type=\"password\" placeholder=\"Insert new password\" class=\"form-control\"/>";
                                                }
                                                ?>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-2 form-control-label">Confirm New Password</label>
                                            <div class="col-md-9">
                                            <?php
                                                if (isset($_SESSION['new_pw_confirm'])) {
                                                    $new_pw_confirm = $_SESSION['new_pw_confirm'];
                                                    $_SESSION['new_pw_confirm'] = null;
                                                    echo "<input name=\"new_pw_confirm\" required type=\"password\" placeholder=\"Insert new password again\" class=\"form-control\" value=\"$new_pw_confirm\" />";
                                                } else {
                                                    echo "<input name=\"new_pw_confirm\" required type=\"password\" placeholder=\"Insert new password again\" class=\"form-control\"/>";
                                                }
                                                ?>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-8 ml-auto">
                                                <button type="submit" class="btn btn-primary" formaction="changepassword_post.php">
                                                    Change Password
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