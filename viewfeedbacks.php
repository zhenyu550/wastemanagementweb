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
  <title>View Feedbacks</title>
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
                  <h3 class="h6 text-uppercase mb-0">View Feedbacks</h3>
                </div>
                <div class="card-body">
                  <form class="form-horizontal">
                    <div class="form-group row">
                      <label class="col-md-2 form-control-label">Branch Name</label>
                      <div class="col-md-9">
                        <div class="form-group">
                          <div class="input-group mb-3">
                            <?php 
                              $search_string = "";
                                                            
                              if(isset($_SESSION["search_string"]))
                              {
                                $search_string = $_SESSION["search_string"];
                                $_SESSION["search_string"] = null;
                              } 
                                                        
                              if($search_string == "")
                              {
                                echo "<input type=\"text\" placeholder=\"Branch Name\"";
                                echo "name=\"search_branch_input\"";
                                echo "aria-label=\"Branch Name\" aria-describedby=\"button-search\"";
                                echo "class=\"form-control\">";
                              }
                              else
                              {
                                echo "<input type=\"text\" placeholder=\"Branch Name\"";
                                echo "name=\"search_branch_input\"";
                                echo "aria-label=\"Branch Name\" aria-describedby=\"button-search\"";
                                echo "value=$search_string ";
                                echo "class=\"form-control\">";
                              }
                            ?>
                            <div class="input-group-append">
                              <button id="button-search" type="submit" class="btn btn-primary" name="search_feedback"
                                formaction="viewfeedbacks_post.php" formmethod="post">
                                Search
                              </button>
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
                          <h6 class="text-uppercase mb-0" style="text-align: center;">List of Feedbacks</h6>
                          <!-- Modal Form-->
                          <div class="card-body">
                            <table class="table table-striped table-hover card-text">
                              <thead>
                                <tr>
                                  <th>ID</th>
                                  <th>Feedback Date</th>
                                  <th>Name</th>
                                  <th>Contact No</th>
                                  <th>Email</th>
                                  <th>Prefered Communication</th>
                                  <th>Feedback On</th>
                                  <th>Comment</th>
                                  <th>Collection Point</th>
                                </tr>
                              </thead>
                              
                              <tbody>
                              <?php
                                $items = array();

                                if(isset($_SESSION["search_result"]))
                                {
                                    $items = unserialize(serialize($_SESSION["search_result"]));
                                    $_SESSION["search_result"] = null;
                                } 
                                else 
                                {
                                    $items = Feedback::all();
                                }

                                foreach ($items as $item)
                                {
                                  echo "<tr>";
                                  echo "<th scope=\"row\">".$item->get_id()."</th>";
                                  echo "<td>".$item->get_feedback_date()."</td>";
                                  echo "<td>".$item->get_name()."</td>";
                                  echo "<td>".$item->get_contact_no()."</td>";
                                  echo "<td>".$item->get_email()."</td>";

                                  $pref_comm = "";
                                  switch ($item->get_preferred_comm()) {
                                    case 1:
                                      $pref_comm="Email";
                                      break;
                                    case 2:
                                      $pref_comm="Call";
                                      break;
                                    case 3:
                                      $pref_comm="Text/Whatsapp";
                                      break;

                                    default:
                                      $pref_comm="";
                                  }
                                  echo "<td>".$pref_comm."</td>";

                                  $feedback_type = "";
                                  switch ($item->get_feedback_type()) {        
                                    case 1:
                                      $feedback_type="Waste management";
                                      break;
                                    case 2:
                                      $feedback_type="Service at collection point";
                                      break;
                                    case 3:
                                      $feedback_type="Transportation of waste";
                                      break;
                                    case 4:
                                      $feedback_type="Question";
                                      break;
                                    case 5:
                                      $feedback_type="Suggestion";
                                      break;
                                    case 6:
                                      $feedback_type="Others";
                                      break;
                    
                                    default:
                                      $pref_comm="";
                                  }

                                  echo "<td>".$feedback_type."</td>";
                                  echo "<td>".$item->get_feedback_content()."</td>";

                                  $cp_id = $item->get_cp_id();
                                  $cp = Collection_Point::find("id=".$cp_id);
                                  $cp_name = $cp->get_name();

                                  echo "<td>".$cp_name."</td>";
                                  echo "</tr>";
                                }
                              ?>
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