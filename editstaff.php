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
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit Staff</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
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
                        <?php
                        //Receive Collection Point data from previous screem
                        $staff_id = $_POST["staff_id"];
                        $staff = Staff::find("id=" . $staff_id);
                        ?>
                        <!-- Form Elements -->
                        <div class="col-lg-12 mb-5">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="h6 text-uppercase mb-0">Edit Staff</h3>
                                </div>
                                <div class="card-body">
                                    <form class="form-horizontal" method="post">
                                        <input type='hidden' name='staff_id' value='<?php echo $staff_id; ?>'>
                                        <input type='hidden' name='password' value='<?php echo $staff->get_password(); ?>'>

                                        <div class="form-group row">
                                            <label class="col-md-2 form-control-label">Name</label>
                                            <div class="col-md-9">
                                                <input name="name" required type="text" placeholder="Insert name" value="<?php echo $staff->get_name(); ?>" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 form-control-label">Phone No.</label>
                                            <div class="col-md-9">
                                                <input name="phone" required type="text" placeholder="Insert phone no." value="<?php echo $staff->get_contact_no(); ?>" class="form-control" />
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-2 form-control-label">Email</label>
                                            <div class="col-md-9">
                                                <input name="email" required type="text" placeholder="Insert email" value="<?php echo $staff->get_email(); ?>" class="form-control" />
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-2 form-control-label">Branch</label>
                                            <div class="col-md-9 select mb-3">
                                                <select name="cp" id="cp" class="form-control">
                                                    <?php
                                                    // Get all waste type data from database
                                                    $items = Collection_Point::all();
                                                    $staff_branch_id = $staff->get_cp_id();

                                                    foreach ($items as $item) {
                                                        $item_id = $item->get_id();
                                                        $item_name = $item->get_name();
                                                        $item_state = $item->get_state();

                                                        if ($item_id == $staff_branch_id) {
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
                                                <input name="username" required readonly type="text" placeholder="Insert username" value="<?php echo $staff->get_staff_username(); ?>" class="form-control" />
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-2 form-control-label">Staff Type</label>
                                            <div class="col-md-9 select mb-3">
                                                <select name="type" id="type" class="form-control">
                                                    <?php
                                                    $staff_type = $staff->get_type();
                                                    $options = array("Normal", "Admin");

                                                    foreach ($options as $option) {
                                                        if ($option == $staff_type) {
                                                            echo "<option value=\"$option\" selected>$option</option>";
                                                        } else {
                                                            echo "<option value=\"$option\">$option</option>";
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-8 ml-auto">
                                                <button type="submit" class="btn btn-secondary" formaction="viewcollectors.php" formmethod="post">Back</button>
                                                <button type="submit" class="btn btn-primary" formaction="editstaff_post.php" formmethod="post">Save</button>
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