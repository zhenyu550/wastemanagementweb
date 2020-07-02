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
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Collector List</title>
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
  <!-- Canvasjs-->
  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
  <!-- Favicon-->
  <link rel="shortcut icon" href="img/favicon.png?3">
  <!-- Tweaks for older IEs-->
  <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<?php

$staff_data = Staff::find("id=" . $user);
$cp_id = $staff_data->get_cp_id();

$servername   = "localhost";
$username   = "root";
$password   = "test";
$databasename = "waste";

$DBConn   = new mysqli($servername, $username, $password, $databasename);

$sql = "SELECT * FROM bin WHERE cp_id = $cp_id";
$result = $DBConn->query($sql);
$count = mysqli_num_rows($result);

$paper = 0;
$glass = 0;
$metal = 0;
$plastic = 0;
$fabric = 0;
$chemical = 0;
$electric = 0;
$wood = 0;

while ($row = $result->fetch_assoc()) {
  $wastetype = $row['type_id'];
  if ($wastetype == "1") {
    $paper =  $row['capacity_current'];
  } elseif ($wastetype == "2") {
    $glass =  $row['capacity_current'];
  } elseif ($wastetype == "3") {
    $metal =  $row['capacity_current'];
  } elseif ($wastetype == "4") {
    $plastic =  $row['capacity_current'];
  } elseif ($wastetype == "5") {
    $fabric =  $row['capacity_current'];
  } elseif ($wastetype == "6") {
    $chemical =  $row['capacity_current'];
  } elseif ($wastetype == "7") {
    $electric =  $row['capacity_current'];
  } elseif ($wastetype == "8") {
    $wood =  $row['capacity_current'];
  }
}
?>
<script>
  window.onload = function() {

    var chart = new CanvasJS.Chart("paperr", {
      animationEnabled: true,
      data: [{
        type: "doughnut",
        startAngle: 60,
        //innerRadius: 60,
        indexLabelFontSize: 12,
        indexLabel: "{label} - #percent%",
        toolTipContent: "<b>{label}:</b> {y} (#percent%)",
        dataPoints: [{
            y: <?php echo ($paper * 100) / 100 ?>,
            label: "Paper"
          },
          {
            y: <?php echo (100 - ($paper * 100) / 100) ?>,
            label: "Remaining"
          },
        ]
      }]
    });
    chart.render();
    var chart = new CanvasJS.Chart("glasss", {
      animationEnabled: true,
      data: [{
        type: "doughnut",
        startAngle: 60,
        //innerRadius: 60,
        indexLabelFontSize: 12,
        indexLabel: "{label} - #percent%",
        toolTipContent: "<b>{label}:</b> {y} (#percent%)",
        dataPoints: [{
            y: <?php echo ($glass * 100) / 100 ?>,
            label: "Glass"
          },
          {
            y: <?php echo (100 - ($paper * 100) / 100) ?>,
            label: "Remaining"
          },
        ]
      }]
    });
    chart.render();
    var chart = new CanvasJS.Chart("metall", {
      animationEnabled: true,
      data: [{
        type: "doughnut",
        startAngle: 60,
        //innerRadius: 60,
        indexLabelFontSize: 12,
        indexLabel: "{label} - #percent%",
        toolTipContent: "<b>{label}:</b> {y} (#percent%)",
        dataPoints: [{
            y: <?php echo ($metal * 100) / 100 ?>,
            label: "Metal"
          },
          {
            y: <?php echo (100 - ($metal * 100) / 100) ?>,
            label: "Remaining"
          },
        ]
      }]
    });
    chart.render();
    var chart = new CanvasJS.Chart("plasticc", {
      animationEnabled: true,
      data: [{
        type: "doughnut",
        startAngle: 60,
        //innerRadius: 60,
        indexLabelFontSize: 12,
        indexLabel: "{label} - #percent%",
        toolTipContent: "<b>{label}:</b> {y} (#percent%)",
        dataPoints: [{
            y: <?php echo ($plastic * 100) / 100 ?>,
            label: "Plastic"
          },
          {
            y: <?php echo (100 - ($plastic * 100) / 100) ?>,
            label: "Remaining"
          },
        ]
      }]
    });
    chart.render();
    var chart = new CanvasJS.Chart("fabricc", {
      animationEnabled: true,
      data: [{
        type: "doughnut",
        startAngle: 60,
        //innerRadius: 60,
        indexLabelFontSize: 12,
        indexLabel: "{label} - #percent%",
        toolTipContent: "<b>{label}:</b> {y} (#percent%)",
        dataPoints: [{
            y: <?php echo ($fabric * 100) / 100 ?>,
            label: "Fabric"
          },
          {
            y: <?php echo (100 - ($fabric * 100) / 100) ?>,
            label: "Remaining"
          },
        ]
      }]
    });
    chart.render();
    var chart = new CanvasJS.Chart("chemicall", {
      animationEnabled: true,
      data: [{
        type: "doughnut",
        startAngle: 60,
        //innerRadius: 60,
        indexLabelFontSize: 12,
        indexLabel: "{label} - #percent%",
        toolTipContent: "<b>{label}:</b> {y} (#percent%)",
        dataPoints: [{
            y: <?php echo ($chemical * 100) / 100 ?>,
            label: "Chemical"
          },
          {
            y: <?php echo (100 - ($chemical * 100) / 100) ?>,
            label: "Remaining"
          },
        ]
      }]
    });
    chart.render();
    var chart = new CanvasJS.Chart("electricc", {
      animationEnabled: true,
      data: [{
        type: "doughnut",
        startAngle: 60,
        //innerRadius: 60,
        indexLabelFontSize: 12,
        indexLabel: "{label} - #percent%",
        toolTipContent: "<b>{label}:</b> {y} (#percent%)",
        dataPoints: [{
            y: <?php echo ($electric * 100) / 100 ?>,
            label: "E & E"
          },
          {
            y: <?php echo (100 - ($electric * 100) / 100) ?>,
            label: "Remaining"
          },
        ]
      }]
    });
    chart.render();
    var chart = new CanvasJS.Chart("woodd", {
      animationEnabled: true,
      data: [{
        type: "doughnut",
        startAngle: 60,
        //innerRadius: 60,
        indexLabelFontSize: 12,
        indexLabel: "{label} - #percent%",
        toolTipContent: "<b>{label}:</b> {y} (#percent%)",
        dataPoints: [{
            y: <?php echo ($wood * 100) / 100 ?>,
            label: "Wood"
          },
          {
            y: <?php echo (100 - ($wood * 100) / 100) ?>,
            label: "Remaining"
          },
        ]
      }]
    });
    chart.render();

  }
</script>

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
            <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
              <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                <div class="flex-grow-1 d-flex align-items-center">
                  <div class="dot mr-3 bg-violet"></div>
                  <div class="text">
                    <h6 class="mb-0">Paper</h6><span class="text-gray"><?php echo $paper ?> kg</span>
                    <form action="collectors_post.php" method="post">
                      <input type="submit" class="btn btn-secondary" name="submit" value="Clear"></input>
                      <input type="hidden" class="btn btn-secondary" name="id" value="1"></input>
                      <input type="hidden" class="btn btn-secondary" name="staff_id" value="<?php echo $staff_data->get_id(); ?>"></input>
                      <input type="hidden" class="btn btn-secondary" name="cp_id" value="<?php echo $cp_id; ?>"></input>
                    </form>
                  </div>
                </div>
                <div class="col-sm-8">
                  <div id="paperr" style="height: 300px; width: 100%;"></div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
              <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                <div class="flex-grow-1 d-flex align-items-center">
                  <div class="dot mr-3 bg-green"></div>
                  <div class="text">
                    <h6 class="mb-0">Glass</h6><span class="text-gray"><?php echo $glass ?> kg</span>
                    <br />
                    <form action="collectors_post.php" method="post">
                      <input type="submit" class="btn btn-secondary" name="submit" value="Clear"></input>
                      <input type="hidden" class="btn btn-secondary" name="id" value="2"></input>
                      <input type="hidden" class="btn btn-secondary" name="staff_id" value="<?php echo $staff_data->get_id(); ?>"></input>
                      <input type="hidden" class="btn btn-secondary" name="cp_id" value="<?php echo $cp_id; ?>"></input>
                    </form>
                  </div>
                </div>
                <div class="col-sm-8">
                  <div id="glasss" style="height: 300px; width: 100%;"></div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
              <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                <div class="flex-grow-1 d-flex align-items-center">
                  <div class="dot mr-3 bg-blue"></div>
                  <div class="text">
                    <h6 class="mb-0">Metal</h6><span class="text-gray"><?php echo $metal ?> kg</span>
                    <br />
                    <form action="collectors_post.php" method="post">
                      <input type="submit" class="btn btn-secondary" name="submit" value="Clear"></input>
                      <input type="hidden" class="btn btn-secondary" name="id" value="3"></input>
                      <input type="hidden" class="btn btn-secondary" name="staff_id" value="<?php echo $staff_data->get_id(); ?>"></input>
                      <input type="hidden" class="btn btn-secondary" name="cp_id" value="<?php echo $cp_id; ?>"></input>
                    </form>
                  </div>
                </div>
                <div class="col-sm-8">
                  <div id="metall" style="height: 300px; width: 100%;"></div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
              <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                <div class="flex-grow-1 d-flex align-items-center">
                  <div class="dot mr-3 bg-red"></div>
                  <div class="text">
                    <h6 class="mb-0">Plastic</h6><span class="text-gray"><?php echo $plastic ?> kg</span>
                    <br />
                    <form action="collectors_post.php" method="post">
                      <input type="submit" class="btn btn-secondary" name="submit" value="Clear"></input>
                      <input type="hidden" class="btn btn-secondary" name="id" value="4"></input>
                      <input type="hidden" class="btn btn-secondary" name="staff_id" value="<?php echo $staff_data->get_id(); ?>"></input>
                      <input type="hidden" class="btn btn-secondary" name="cp_id" value="<?php echo $cp_id; ?>"></input>
                    </form>
                  </div>
                </div>
                <div class="col-sm-8">
                  <div id="plasticc" style="height: 300px; width: 100%;"></div>
                </div>
              </div>
            </div>
          </div>
          <br />
          <div class="row">
            <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
              <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                <div class="flex-grow-1 d-flex align-items-center">
                  <div class="dot mr-3 bg-violet"></div>
                  <div class="text">
                    <h6 class="mb-0">Fabric</h6><span class="text-gray"><?php echo $fabric ?> kg</span>
                    <br />
                    <form action="collectors_post.php" method="post">
                      <input type="submit" class="btn btn-secondary" name="submit" value="Clear"></input>
                      <input type="hidden" class="btn btn-secondary" name="id" value="5"></input>
                      <input type="hidden" class="btn btn-secondary" name="staff_id" value="<?php echo $staff_data->get_id(); ?>"></input>
                      <input type="hidden" class="btn btn-secondary" name="cp_id" value="<?php echo $cp_id; ?>"></input>
                    </form>
                  </div>
                </div>
                <div class="col-sm-8">
                  <div id="fabricc" style="height: 300px; width: 100%;"></div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
              <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                <div class="flex-grow-1 d-flex align-items-center">
                  <div class="dot mr-3 bg-green"></div>
                  <div class="text">
                    <h6 class="mb-0">Chemical</h6><span class="text-gray"><?php echo $chemical ?> kg</span>
                    <br />
                    <form action="collectors_post.php" method="post">
                      <input type="submit" class="btn btn-secondary" name="submit" value="Clear"></input>
                      <input type="hidden" class="btn btn-secondary" name="id" value="6"></input>
                      <input type="hidden" class="btn btn-secondary" name="staff_id" value="<?php echo $staff_data->get_id(); ?>"></input>
                      <input type="hidden" class="btn btn-secondary" name="cp_id" value="<?php echo $cp_id; ?>"></input>
                    </form>
                  </div>
                </div>
                <div class="col-sm-8">
                  <div id="chemicall" style="height: 300px; width: 100%;"></div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
              <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                <div class="flex-grow-1 d-flex align-items-center">
                  <div class="dot mr-3 bg-blue"></div>
                  <div class="text">
                    <h6 class="mb-0">Electric & Electronic</h6><span class="text-gray"><?php echo $electric ?> kg</span>
                    <br />
                    <form action="collectors_post.php" method="post">
                      <input type="submit" class="btn btn-secondary" name="submit" value="Clear"></input>
                      <input type="hidden" class="btn btn-secondary" name="id" value="7"></input>
                      <input type="hidden" class="btn btn-secondary" name="staff_id" value="<?php echo $staff_data->get_id(); ?>"></input>
                      <input type="hidden" class="btn btn-secondary" name="cp_id" value="<?php echo $cp_id; ?>"></input>
                    </form>
                  </div>
                </div>
                <div class="col-sm-8">
                  <div id="electricc" style="height: 300px; width: 100%;"><span class="text-gray"><?php echo $electric ?> kg</span></div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
              <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                <div class="flex-grow-1 d-flex align-items-center">
                  <div class="dot mr-3 bg-red"></div>
                  <div class="text">
                    <h6 class="mb-0">Wood</h6><span class="text-gray"><?php echo $wood ?> kg</span>
                    <br />
                    <form action="collectors_post.php" method="post">
                      <input type="submit" class="btn btn-secondary" name="submit" value="Clear"></input>
                      <input type="hidden" class="btn btn-secondary" name="id" value="8"></input>
                      <input type="hidden" class="btn btn-secondary" name="staff_id" value="<?php echo $staff_data->get_id(); ?>"></input>
                      <input type="hidden" class="btn btn-secondary" name="cp_id" value="<?php echo $cp_id; ?>"></input>
                    </form>
                  </div>
                </div>
                <div class="col-sm-8">
                  <div id="woodd" style="height: 300px; width: 100%;"></div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="py-5">
          <div class="row">
            <div class="col-lg-12 mb-5">
              <div class="card">
                <div class="card-header">
                  <h6 class="text-uppercase mb-0">List Of Companies</h6>
                </div>
                <div class="card-body">
                  <table class="table table-striped card-text">
                    <thead>
                      <tr>
                        <th>Waste Type</th>
                        <th>Company Name</th>
                        <th>Address</th>
                        <th>Contact</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $items = Collector::all();
                      $waste_types = Waste_Type::all();
                      $types = array();
                      foreach ($items as $item) {
                        if (!array_key_exists($item->get_type_id(), $types)) {
                          $types[$item->get_type_id()] = 0;
                        }
                        $types[$item->get_type_id()] += 1;
                      }

                      foreach ($types as $type => $num) {
                        $type_data = Waste_Type::find("id=" . $type);
                        $type_name = $type_data->get_name();

                        echo "<th scope=\"row\" rowspan=\"" . strval($num + 1) . "\" style=\"text-align: center; vertical-align: middle\">$type_name</th>";
                        foreach ($items as $item) {
                          if ($item->get_type_id() == $type) {
                            echo "<tr>";
                            echo "<td>" . $item->get_company_name() . "</td>";
                            echo "<td>" . $item->get_company_address() . "</td>";
                            echo "<td>Tel: " . $item->get_tel_no() . "<br/>Fax: " . $item->get_fax_no() . "</td>";
                            echo "</tr>";
                          }
                        }
                      }
                      ?>
                    </tbody>
                  </table>
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