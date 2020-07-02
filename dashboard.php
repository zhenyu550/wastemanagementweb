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
  <title>Dashboard</title>
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
  <!-- Canvasjs-->
  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
  <!-- Favicon-->
  <link rel="shortcut icon" href="img/favicon.png?3" />
  <!-- Tweaks for older IEs-->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script
    ><![endif]-->
</head>
<?php

$staff_data = Staff::find("id=" . $user);
$cp_id = $staff_data->get_cp_id();

$servername   = "localhost";
$username   = "root";
$password   = "test";
$databasename = "waste";

$DBConn   = new mysqli($servername, $username, $password, $databasename);

$sql = "SELECT * FROM bin a, transaction_bin b WHERE a.type_id = b.bin_id AND a.cp_id = $cp_id";
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
  $wastetype = $row['bin_id'];
  if ($wastetype == "1") {
    $paper +=  $row['weight'];
  } elseif ($wastetype == "2") {
    $glass +=  $row['weight'];
  } elseif ($wastetype == "3") {
    $metal +=  $row['weight'];
  } elseif ($wastetype == "4") {
    $plastic +=  $row['weight'];
  } elseif ($wastetype == "5") {
    $fabric +=  $row['weight'];
  } elseif ($wastetype == "6") {
    $chemical +=  $row['weight'];
  } elseif ($wastetype == "7") {
    $electric +=  $row['weight'];
  } elseif ($wastetype == "8") {
    $wood +=  $row['weight'];
  }
}

$sql1 = "SELECT * FROM bin WHERE cp_id = $cp_id";
$result1 = $DBConn->query($sql1);
$count1 = mysqli_num_rows($result1);

$paper1 = 0;
$glass1 = 0;
$metal1 = 0;
$plastic1 = 0;
$fabric1 = 0;
$chemical1 = 0;
$electric1 = 0;
$wood1 = 0;

while ($row1 = $result1->fetch_assoc()) {
  $wastetype1 = $row1['type_id'];
  if ($wastetype1 == "1") {
    $paper1 =  $row1['capacity_current'];
  } elseif ($wastetype1 == "2") {
    $glass1 =  $row1['capacity_current'];
  } elseif ($wastetype1 == "3") {
    $metal1 =  $row1['capacity_current'];
  } elseif ($wastetype1 == "4") {
    $plastic1 =  $row1['capacity_current'];
  } elseif ($wastetype1 == "5") {
    $fabric1 =  $row1['capacity_current'];
  } elseif ($wastetype1 == "6") {
    $chemical1 =  $row1['capacity_current'];
  } elseif ($wastetype1 == "7") {
    $electric1 =  $row1['capacity_current'];
  } elseif ($wastetype1 == "8") {
    $wood1 =  $row1['capacity_current'];
  }
}
?>
<script>
  window.onload = function() {

    var chart = new CanvasJS.Chart("barchart", {
      animationEnabled: true,
      theme: "light2", // "light1", "light2", "dark1", "dark2"
      title: {
        text: "Total waste collected (kg)"
      },
      axisY: {
        title: "Total waste collected (kg)",
        suffix: "kg",
        includeZero: false
      },
      axisX: {
        title: "Bins"
      },
      data: [{
        type: "column",
        yValueFormatString: "#,##0.0#\"kg\"",
        dataPoints: [{
            label: "Paper",
            y: <?php echo $paper ?>,
          },
          {
            label: "Glass",
            y: <?php echo $glass ?>,
          },
          {
            label: "Metal",
            y: <?php echo $metal ?>,
          },
          {
            label: "Plastic",
            y: <?php echo $plastic ?>,
          },
          {
            label: "Fabric",
            y: <?php echo $fabric ?>,
          },
          {
            label: "Chemical",
            y: <?php echo $chemical ?>,
          },
          {
            label: "Electric & Electronic",
            y: <?php echo $electric ?>,
          },
          {
            label: "Wood",
            y: <?php echo $wood ?>,
          }

        ]
      }]
    });
    chart.render();
    var chart = new CanvasJS.Chart("paper", {
      animationEnabled: true,
      data: [{
        type: "doughnut",
        startAngle: 60,
        //innerRadius: 60,
        indexLabelFontSize: 17,
        indexLabel: "{label} - #percent%",
        toolTipContent: "<b>{label}:</b> {y} (#percent%)",
        dataPoints: [{
            y: <?php echo ($paper1 * 100) / 100 ?>,
            label: "Paper"
          },
          {
            y: <?php echo (100 - ($paper1 * 100) / 100) ?>,
            label: "Remaining"
          },
        ]
      }]
    });
    chart.render();
    var chart = new CanvasJS.Chart("glass", {
      animationEnabled: true,
      data: [{
        type: "doughnut",
        startAngle: 60,
        //innerRadius: 60,
        indexLabelFontSize: 17,
        indexLabel: "{label} - #percent%",
        toolTipContent: "<b>{label}:</b> {y} (#percent%)",
        dataPoints: [{
            y: <?php echo ($glass1 * 100) / 100 ?>,
            label: "Glass"
          },
          {
            y: <?php echo (100 - ($paper1 * 100) / 100) ?>,
            label: "Remaining"
          },
        ]
      }]
    });
    chart.render();
    var chart = new CanvasJS.Chart("metal", {
      animationEnabled: true,
      data: [{
        type: "doughnut",
        startAngle: 60,
        //innerRadius: 60,
        indexLabelFontSize: 17,
        indexLabel: "{label} - #percent%",
        toolTipContent: "<b>{label}:</b> {y} (#percent%)",
        dataPoints: [{
            y: <?php echo ($metal1 * 100) / 100 ?>,
            label: "Metal"
          },
          {
            y: <?php echo (100 - ($metal1 * 100) / 100) ?>,
            label: "Remaining"
          },
        ]
      }]
    });
    chart.render();
    var chart = new CanvasJS.Chart("plastic", {
      animationEnabled: true,
      data: [{
        type: "doughnut",
        startAngle: 60,
        //innerRadius: 60,
        indexLabelFontSize: 17,
        indexLabel: "{label} - #percent%",
        toolTipContent: "<b>{label}:</b> {y} (#percent%)",
        dataPoints: [{
            y: <?php echo ($plastic1 * 100) / 100 ?>,
            label: "Plastic"
          },
          {
            y: <?php echo (100 - ($plastic1 * 100) / 100) ?>,
            label: "Remaining"
          },
        ]
      }]
    });
    chart.render();
    var chart = new CanvasJS.Chart("fabric", {
      animationEnabled: true,
      data: [{
        type: "doughnut",
        startAngle: 60,
        //innerRadius: 60,
        indexLabelFontSize: 17,
        indexLabel: "{label} - #percent%",
        toolTipContent: "<b>{label}:</b> {y} (#percent%)",
        dataPoints: [{
            y: <?php echo ($fabric1 * 100) / 100 ?>,
            label: "Fabric"
          },
          {
            y: <?php echo (100 - ($fabric1 * 100) / 100) ?>,
            label: "Remaining"
          },
        ]
      }]
    });
    chart.render();
    var chart = new CanvasJS.Chart("chemical", {
      animationEnabled: true,
      data: [{
        type: "doughnut",
        startAngle: 60,
        //innerRadius: 60,
        indexLabelFontSize: 17,
        indexLabel: "{label} - #percent%",
        toolTipContent: "<b>{label}:</b> {y} (#percent%)",
        dataPoints: [{
            y: <?php echo ($chemical1 * 100) / 100 ?>,
            label: "Chemical"
          },
          {
            y: <?php echo (100 - ($chemical1 * 100) / 100) ?>,
            label: "Remaining"
          },
        ]
      }]
    });
    chart.render();
    var chart = new CanvasJS.Chart("electric", {
      animationEnabled: true,
      data: [{
        type: "doughnut",
        startAngle: 60,
        //innerRadius: 60,
        indexLabelFontSize: 17,
        indexLabel: "{label} - #percent%",
        toolTipContent: "<b>{label}:</b> {y} (#percent%)",
        dataPoints: [{
            y: <?php echo ($electric1 * 100) / 100 ?>,
            label: "Electric & Electronic"
          },
          {
            y: <?php echo (100 - ($electric1 * 100) / 100) ?>,
            label: "Remaining"
          },
        ]
      }]
    });
    chart.render();
    var chart = new CanvasJS.Chart("wood", {
      animationEnabled: true,
      data: [{
        type: "doughnut",
        startAngle: 60,
        //innerRadius: 60,
        indexLabelFontSize: 17,
        indexLabel: "{label} - #percent%",
        toolTipContent: "<b>{label}:</b> {y} (#percent%)",
        dataPoints: [{
            y: <?php echo ($wood1 * 100) / 100 ?>,
            label: "Wood"
          },
          {
            y: <?php echo (100 - ($wood1 * 100) / 100) ?>,
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
                  </div>
                </div>
                <div class="col-sm-8">
                  <div id="paper" style="height: 300px; width: 100%;"></div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
              <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                <div class="flex-grow-1 d-flex align-items-center">
                  <div class="dot mr-3 bg-green"></div>
                  <div class="text">
                    <h6 class="mb-0">Glass</h6><span class="text-gray"><?php echo $glass ?> kg</span>
                  </div>
                </div>
                <div class="col-sm-8">
                  <div id="glass" style="height: 300px; width: 100%;"></div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
              <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                <div class="flex-grow-1 d-flex align-items-center">
                  <div class="dot mr-3 bg-blue"></div>
                  <div class="text">
                    <h6 class="mb-0">Metal</h6><span class="text-gray"><?php echo $metal ?> kg</span>
                  </div>
                </div>
                <div class="col-sm-8">
                  <div id="metal" style="height: 300px; width: 100%;"></div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
              <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                <div class="flex-grow-1 d-flex align-items-center">
                  <div class="dot mr-3 bg-red"></div>
                  <div class="text">
                    <h6 class="mb-0">Plastic</h6><span class="text-gray"><?php echo $plastic ?> kg</span>
                  </div>
                </div>
                <div class="col-sm-8">
                  <div id="plastic" style="height: 300px; width: 100%;"></div>
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
                  </div>
                </div>
                <div class="col-sm-8">
                  <div id="fabric" style="height: 300px; width: 100%;"></div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
              <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                <div class="flex-grow-1 d-flex align-items-center">
                  <div class="dot mr-3 bg-green"></div>
                  <div class="text">
                    <h6 class="mb-0">Chemical</h6><span class="text-gray"><?php echo $chemical ?> kg</span>
                  </div>
                </div>
                <div class="col-sm-8">
                  <div id="chemical" style="height: 300px; width: 100%;"></div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
              <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                <div class="flex-grow-1 d-flex align-items-center">
                  <div class="dot mr-3 bg-blue"></div>
                  <div class="text">
                    <h6 class="mb-0">Electric & Electronic</h6><span class="text-gray"><?php echo $electric ?> kg</span>
                  </div>
                </div>
                <div class="col-sm-8">
                  <div id="electric" style="height: 300px; width: 100%;"><span class="text-gray"><?php echo $electric ?> kg</span></div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
              <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                <div class="flex-grow-1 d-flex align-items-center">
                  <div class="dot mr-3 bg-red"></div>
                  <div class="text">
                    <h6 class="mb-0">Wood</h6><span class="text-gray"><?php echo $wood ?> kg</span>
                  </div>
                </div>
                <div class="col-sm-8">
                  <div id="wood" style="height: 300px; width: 100%;"></div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section>
          <div class="card">
            <div class="card-header">
              <h2 class="h6 text-uppercase mb-0">Total waste collected</h2>
            </div>
            <div class="card-body">
              <p class="text-gray">Total waste collected since establishment</p>
              <div class="chart-holder">
                <div id="barchart" style="height: 300px; width: 100%;"></div>
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