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
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.png?3">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <!-- navbar-->
    <?php include("header.php"); ?>  
    <div class="d-flex align-items-stretch"> <!-- keep coding inside this tag. it stretches-->
      <!-- sidebar-->
      <?php include("sidebar.php"); ?> 
      <div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-5">
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
                          foreach ($items as $item)
                          {
                            if (!array_key_exists($item->get_type_id(), $types))
                            {
                              $types[$item->get_type_id()] = 0;
                            }
                            $types[$item->get_type_id()] += 1;
                          }
                   
                          foreach ($types as $type => $num)
                          {
                            $type_data = Waste_Type::find("id=".$type);
                            $type_name = $type_data->get_name();

                            echo "<th scope=\"row\" rowspan=\"".strval($num+1)."\" style=\"text-align: center; vertical-align: middle\">$type_name</th>";
                            foreach($items as $item)
                            {
                              if ($item->get_type_id() == $type)
                              {
                                echo "<tr>";
                                echo "<td>".$item->get_company_name()."</td>";
                                echo "<td>".$item->get_company_address()."</td>";
                                echo "<td>Tel: ".$item->get_tel_no()."<br/>Fax: ".$item->get_fax_no()."</td>";
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