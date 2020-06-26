<?php
  require_once './database.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Feedback Form</title>
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
  <body style="background-image: url('images/Background.png');background-repeat: no-repeat;  background-attachment: fixed;background-size: 100% 100%;">
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
    <div class="d-flex align-items-stretch"> <!-- keep coding inside this tag. it stretches-->
      <div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-5">
          <section class="py-5">
            <div class="row">
              <!-- Form Elements -->
              <div class="col-lg-8 mb-5 container-fluid">
                <div class="card">
                  <div class="card-header">
                    <h3 class="h6 text-uppercase mb-0">Feedback</h3>
                  </div>
                  <div class="card-body">
                    <form class="form-horizontal" method="post" action="feedback_post.php" name="feedback_form">
                      <div class="form-group row">
                        <label class="col-md-3 form-control-label">Name</label>
                        <div class="col-md-9">
                          <input type="text" placeholder="Insert name" class="form-control" name="name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-3 form-control-label">Email</label>
                        <div class="col-md-9">
                          <input type="text" placeholder="Insert your email" class="form-control" name="email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-3 form-control-label">Phone No.</label>
                        <div class="col-md-9">
                          <input type="text" placeholder="Insert your phone no." class="form-control"  name="phone_no">
                        </div>
                      </div>
                      <br/>
                      <div class="form-group row">
                        <label class="col-md-3 form-control-label">Preferred communication</label>
                          <div class="col-md-9 select mb-3">
                          <select name="pref_comm" placeholder="Please choose which method do you prefer for us to contact you." class="form-control">
                            <option value="0" disabled selected hidden>Please choose which method do you prefer for us to contact you.</option>
                            <option value="1">Email</option>
                            <option value="2">Call</option>
                            <option value="3">Text/Whatsapp</option>
                          </select>
                          </div>
                      </div>
                      <div class="line"></div>
                      <div class="form-group row">
                        <label class="col-md-3 form-control-label">Feedback Type</label>
                        <div class="col-md-9 select mb-3">
                          <select name="feedback_type" placeholder="What is the feedback about?" class="form-control">
                            <option value="0" disabled selected hidden>What is the feedback about?</option>
                            <option value="1">Waste management</option>
                            <option value="2">Service at collection point</option>
                            <option value="3">Transportation of waste</option>
                            <option value="4">Question</option>
                            <option value="5">Suggestion</option>
                            <option value="6">Others</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-3 form-control-label">Feedback</label>
                        <div class="col-md-9">
                          <textarea class="form-control" id="exampleFormControlTextarea1" rows="8" type="text" placeholder="Express your concerns . . ." name="comment"></textarea>
                        </div>
                      </div>
                      <div class="line"></div>
                      <div class="form-group row">
                        <label class="col-md-3 form-control-label">Collection Point</label>
                        <div class="col-md-9 select mb-3">
                          <select name="branch" placeholder="Which branch does this incident occur?" class="form-control">
                            <option value="0" disabled selected hidden>Which branch did this incident occur?</option>
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
                          &emsp;&emsp;&emsp;<button type="submit" class="btn btn-primary">Submit Feedback</button>
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
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8eaHt9Dh5H57Zh0xVTqxVdBFCvFMqFjQ&callback=initMap"></script>
      <!-- end google map js -->
  </body>
</html>