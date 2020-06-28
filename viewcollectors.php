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
  <title>View Collection Points</title>
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

            <!-- Form Elements -->
            <div class="col-lg-12 mb-5">
              <div class="card">
                <div class="card-header">
                  <h3 class="h6 text-uppercase mb-0">View Collectors</h3>
                </div>
                <div class="card-body">
                  <form class="form-horizontal" action="viewcollectors_post.php" method="post">
                    <div class="form-group row">
                      <label class="col-md-2 form-control-label">Search</label>
                      <div class="col-md-9">
                        <div class="row">
                          <div class="col-md-4">
                            <select class="form-control" name="search_by">
                              <?php
                              // Get from session and determine which condition is selected, else use default
                              $search_attribute = "";

                              if (isset($_SESSION["search_attribute"])) {
                                $search_attribute = $_SESSION["search_attribute"];
                                $_SESSION["search_attribute"] = null;
                              }

                              // Create array of options
                              $option_names = array("Company Name", "Waste Type", "State");
                              $option_values = array("company_name", "waste_type", "state");

                              for ($index = 0; $index < count($option_names); $index++) {
                                $option_name = $option_names[$index];
                                $option_value = $option_values[$index];

                                if ($option_value == $search_attribute) {
                                  echo "<option value=\"$option_value\" selected>$option_name</option>";
                                } else {
                                  echo "<option value=\"$option_value\">$option_name</option>";
                                }
                              }
                              ?>
                            </select>
                          </div>
                          <div class="col-md-8">
                            <div class="form-group">
                              <div class="input-group mb-3">
                                <?php
                                // Get search string from session if have, else use default

                                $search_keyword = "";

                                if (isset($_SESSION["search_keyword"])) {
                                  $search_keyword = $_SESSION["search_keyword"];
                                  $_SESSION["search_keyword"] = null;
                                }

                                if ($search_keyword == "") {
                                  echo "<input type=\"text\" placeholder=\"Search Keyword\" aria-label=\"Search Keyword\" ";
                                  echo "aria-describedby=\"button-search\" name=\"search_keyword\" class=\"form-control\">";
                                } else {
                                  echo "<input type=\"text\" placeholder=\"Search Keyword\" aria-label=\"Search Keyword\" ";
                                  echo "aria-describedby=\"button-search\" name=\"search_keyword\" value=\"$search_keyword\"";
                                  echo " class=\"form-control\">";
                                }
                                ?>

                                <div class="input-group-append">
                                  <button id="button-search" type="submit" name="search" class="btn btn-primary">Search</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>


                  </form>
                </div>
              </div>
            </div>

            <div class="col-lg-12 mb-4" style="margin: auto">
              <div class="card">
                <div class="card-header">
                  <form>
                    <button id="button-add" type="submit" name="add" class="btn btn-primary" formaction="addcollector.php" formmethod="post">Add Collector</button>
                  </form>
                  <h6 class="text-uppercase mb-0" style="text-align: center;">List of Collectors</h6>
                  <!-- Modal Form-->
                  <div class="card-body">
                    <table class="table table-striped table-hover card-text" id="transaction_table">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Company Name</th>
                          <th>Company Address</th>
                          <th>Phone No</th>
                          <th>Fax No</th>
                          <th>State</th>
                          <th>Waste Type</th>
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
                          $items = Collector::all();
                        }
                        foreach ($items as $item) {
                          $item_id = $item->get_id();
                          echo "<tr>";
                          echo "<th scope=\"row\">" . $item_id . "</th>";
                          echo "<td>" . $item->get_company_name() . "</td>";
                          echo "<td>" . $item->get_company_address() . "</td>";
                          echo "<td>" . $item->get_tel_no() . "</td>";
                          echo "<td>" . $item->get_fax_no() . "</td>";
                          echo "<td>" . $item->get_state() . "</td>";

                          $type = Waste_Type::find("id=".$item->get_type_id());
                          echo "<td>" . $type->get_name(). "</td>";

                          echo "<form>";
                          echo "<td><button type='submit' class='btn btn-primary' name='edit' formmethod='post' formaction='editcollector.php'>Edit</button></td>";
                          // echo "<td><button type='submit' class='btn btn-primary' name='delete' formmethod='post'>Delete</button></td>";
                          echo "<input type='hidden' name='collector_id' value='$item_id'>";
                          echo "</form>";
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