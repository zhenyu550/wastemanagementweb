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
    <title>Edit Collection Point</title>
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
                        $cp_id = $_POST["cp_id"];
                        $cp = Collection_Point::find("id=" . $cp_id);
                        ?>
                        <!-- Form Elements -->
                        <div class="col-lg-12 mb-5">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="h6 text-uppercase mb-0">Edit Collection Point</h3>
                                </div>
                                <div class="card-body">
                                    <form class="form-horizontal">
                                        <input type='hidden' name='cp_id' value='<?php echo $cp_id; ?>'>
                                        <div class="form-group row">
                                            <label class="col-md-2 form-control-label">Name</label>
                                            <div class="col-md-9">
                                                <input type="text" name="branch" placeholder="Insert branch name" class="form-control" readonly value='<?php echo $cp->get_name(); ?>'>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 form-control-label">Address</label>
                                            <div class="col-md-9">
                                                <input type="text" name="address" placeholder="Insert address" class="form-control" value='<?php echo $cp->get_address(); ?>'>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 form-control-label">Phone No.</label>
                                            <div class="col-md-9">
                                                <input type="text" name="phone" placeholder="Insert phone no" class="form-control" value='<?php echo $cp->get_phone_no(); ?>'>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 form-control-label">Fax No.</label>
                                            <div class="col-md-9">
                                                <input type="text" name="fax" placeholder="Insert fax no." class="form-control" value='<?php echo $cp->get_fax_no(); ?>'>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 form-control-label">Social Media Tag</label>
                                            <div class="col-md-9">
                                                <input type="text" name="socmed" placeholder="Insert social media tag" class="form-control" value='<?php echo $cp->get_social_media_tag(); ?>'>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 form-control-label">State</label>
                                            <div class="col-md-9 select mb-3">
                                                <select name="state" id="state" class="form-control">
                                                    <?php
                                                    // Create a array containing all state of Malaysia
                                                    $states = array(
                                                        "Johor", "Kedah", "Kelantan", "Melaka", "Negeri Sembilan", "Pahang",
                                                        "Pulau Pinang", "Perak", "Perlis", "Sabah", "Sarawak", "Selangor", "Terangganu",
                                                        "W.P. Kuala Lumpur", "W.P. Labuan", "W.P. Putrajaya"
                                                    );
                                                    // Get the state of the collection point
                                                    $cp_state = $cp->get_state();

                                                    foreach ($states as $state)
                                                    {
                                                        // Set the state same as state of collection point to selected
                                                        if($state == $cp_state)
                                                        {
                                                            echo "<option value=\"$state\" selected>$state</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value=\"$state\">$state</option>";
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-8 ml-auto">
                                                <button type="submit" class="btn btn-secondary" formaction="viewcollectionpoints.php" formmethod="post">Back</button>
                                                <button type="submit" class="btn btn-primary" formaction="editcollectionpoint_post.php" formmethod="post">Save</button>
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