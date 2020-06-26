<!DOCTYPE html>
<?php
  require_once './database.php';
?>
<html>

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Pick-Up Request Form</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- site icons -->
    <link rel="icon" href="images/fevicon/fevicon.png" type="image/png" />
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- site css -->
    <link rel="stylesheet" href="css/style.css" />
    <!-- responsive css -->
    <link rel="stylesheet" href="css/responsive.css" />
    <!-- colors css -->
    <link rel="stylesheet" href="css/colors.css" />
    <!-- wow animation css -->
    <link rel="stylesheet" href="css/animate.css" />
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.png?3">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
</head>

<body
    style="background-image: url('images/Background.png');background-repeat: no-repeat;  background-attachment: fixed;background-size: 100% 100%;">
    <!-- navbar-->
    <header class="header header_style1">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-lg-10">
                    <div class="logo"><a href="index.php"><img src="images/logo.png" alt="#" /></a></div>
                    <div class="main_menu float-right">
                        <div class="menu">
                            <ul class="clearfix">
                                <li class="active"><a href="index.php">Home</a></li>
                                <li><a href="locateus.php">Locate Us</a></li>
                                <li><a href="about.php">About</a></li>
                                <li><a class="drop" href="#">Services</a>
                                    <ul>
                                        <li><a href="pickuprequest.php">Pick-up Request</a></li>
                                        <li><a href="feedback.php">Feedback</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-lg-2">
                    <div class="right_bt"><a class="bt_main" href="login.php">Login</a> </div>
                </div>
            </div>
        </div>
    </header>
    <div class="d-flex align-items-stretch">
        <!-- keep coding inside this tag. it stretches-->
        <div class="page-holder w-100 d-flex flex-wrap">
            <div class="container-fluid px-xl-5">
                <section class="py-5">
                    <div class="row">
                        <!-- Form Elements -->
                        <div class="col-lg-8 mb-5 container-fluid">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="h6 text-uppercase mb-0">Pick-Up Request</h3>
                                </div>
                                <div class="card-body">
                                    <form class="form-horizontal" method="post" action="pickuprequest_post.php">
                                        <div class="form-group row">
                                            <label class="col-md-3 form-control-label">Name</label>
                                            <div class="col-md-9">
                                                <input type="text" name="name" placeholder="Insert name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 form-control-label">Phone No.</label>
                                            <div class="col-md-9">
                                                <input type="text" name ="phone_no" placeholder="Insert your phone no."
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <br />
                                        <div class="form-group row">
                                            <label class="col-md-3 form-control-label">Waste Type</label>
                                            <div class="col-md-9">
                                                <?php
                                                    // Read all waste type from database
                                                    $items = Waste_Type::all();
                                                    foreach($items as $item)
                                                    {
                                                        echo "<label class='checkbox-inline'>";
                                                        echo "&emsp;<input name='waste_types[]' id='checkbox_".$item->get_id()."' type='checkbox' value='".$item->get_id()."'>";
                                                        echo $item->get_name();
                                                        echo "</label>";
                                                    }

                                                ?>
                                                <!-- <label class="checkbox-inline">
                                                    &emsp;<input name="waste_type_1" id="inlineCheckbox1" type="checkbox" value="1">
                                                    Paper
                                                </label>
                                                <label class="checkbox-inline">
                                                    &emsp;&emsp;<input name="waste_type_2" id="inlineCheckbox2" type="checkbox"
                                                        value="10"> Glass
                                                </label>
                                                <label class="checkbox-inline">
                                                    &emsp;&emsp;<input name="waste_type_3" id="inlineCheckbox3" type="checkbox"
                                                        value="100"> Metal
                                                </label>
                                                <label class="checkbox-inline">
                                                    &emsp;&emsp;<input name="waste_type_4" id="inlineCheckbox3" type="checkbox"
                                                        value="1000"> Plasttic
                                                </label> -->
                                                
                                                <small class="form-text text-muted ml-3">Please tick the type of waste.</small>
                                            </div>
                                        </div>
                                        <div class="line"></div>
                                        <div class="form-group row">
                                            <label class="col-md-3 form-control-label">Address</label>
                                            <div class="col-md-9">
                                                <textarea name="address" class="form-control" id="exampleFormControlTextarea1" rows="3"
                                                    type="text" placeholder="Insert your pick up location address"></textarea>
                                            </div>
                                        </div>
                                        <div class="line"></div>
                                        <div class="form-group row">
                                          <label class="col-md-3 form-control-label">Collection Point</label>
                                          <div class="col-md-9 select mb-3">
                                            <select name="branch" placeholder="Nearest collection point" class="form-control">
                                              <option value="0" disabled selected hidden>Nearest collection point</option>
                                              <?php
                                                $items = Collection_Point::all();
                                                echo var_dump($items);
                                                foreach ($items as $item)
                                                {
                                                  echo "<option value='".$item->get_id()."'>";
                                                  echo $item->get_state()." - ".$item->get_name();
                                                  echo "</option>";
                                                }
                                              ?>
                                            </select>
                                          </div>
                                        </div>                                        
                                        <div class="line"></div>
                                        <div class="form-group row" style="margin: auto">
                                            <div class="col-md-9 ml-auto">
                                                &emsp;&emsp;&emsp;<button type="submit"
                                                    class="btn btn-primary">Submit Request</button>
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
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- wow animation -->
    <script src="js/wow.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
    <!-- google map js -->
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8eaHt9Dh5H57Zh0xVTqxVdBFCvFMqFjQ&callback=initMap"></script>
    <!-- end google map js -->
</body>

</html>