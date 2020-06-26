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
      <title>Locate Us</title>
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
    <!-- header -->
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
    <!-- navbar-->
    <div class="d-flex align-items-stretch"> <!-- keep coding inside this tag. it stretches-->
      <div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-5">
          <section class="py-5">
            <div class="row">
              <!-- Form Elements -->
              <div class="col-lg-12 mb-5">
                <div class="card">
                  <div class="card-header">
                    <h6 class="text-uppercase mb-0">Locate Us</h6>
                  </div>
                  <div class="card-body">     
                    <!-- TABLE FOR LOCATE US -->                      
                    <table class="table table-striped card-text">
                      <thead>
                        <tr>
                          <th>State</th>
                          <th>Branch</th>
                          <th>Address</th>
                          <th>Contact No</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                        $items = Collection_Point::all();
                        $states = array();
                        foreach ($items as $item)
                        {
                          if (!array_key_exists($item->get_state(), $states))
                          {
                            $states[$item->get_state()] = 0;
                          }
                          $states[$item->get_state()] += 1;
                        }
                   
                        foreach ($states as $state => $num)
                        {
                          echo "<th scope=\"row\" rowspan=\"".strval($num+1)."\" style=\"text-align: center; vertical-align: middle\">$state</th>";
                          foreach($items as $item)
                          {
                            if ($item->get_state() == $state)
                            {
                              echo "<tr>";
                              echo "<td>".$item->get_name()."</td>";
                              echo "<td>".$item->get_address()."</td>";
                              echo "<td>Tel: ".$item->get_phone_no()."<br/>Fax: ".$item->get_fax_no()."<br/>".$item->get_social_media_tag()."</td>";
                              echo "</tr>";
                            }
                          }
                        }
                      ?>
                      </tbody>
                      <!--
                      <tbody>
                        <th scope="row" rowspan="4" style="text-align: center; vertical-align: middle">Melaka</th>
                        <tr>
                          <td>Ayer Keroh</td>
                          <td>No. 1 & 3, <br/>Jalan KF4,Kota Fesyen – MITC, <br/>Hang Tuah Jaya, <br/>75450 Ayer Keroh, Melaka</td>
                          <td>Tel: 06-232 0986<br/>Fax: 06-232 6561<br/>@nonbiowaste_HQ</td>
                        </tr>
                        <tr>
                          <td>Bandar Melaka</td>
                          <td>Lot G1, G2 & G3, <br/>Wisma Air, <br/>Jalan Hang Tuah, <br/>75300 Melaka</td>
                          <td>Tel: 06-232 0986<br/>Fax: 06-232 6561<br/>@nonbiowaste_BM</td>
                        </tr>
                        <tr>
                          <td>Jasin</td>
                          <td>JC 526 & JC 527 Ground Floor, <br/>Jalan Bestari 5, <br/>Bandar Jasin Bestari, Section 2, <br/>77200 Jasin, Melaka</td>
                          <td>Tel: 06-232 0986<br/>Fax: 06-232 6561<br/>@nonbiowaste.Jasin</td>
                        </tr>
                        <th scope="row" rowspan="6" style="text-align: center; vertical-align: middle">Selangor</th>
                        <tr>
                          
                          <td>Ampang</td>
                          <td>No. 1 & 3, <br/>Jalan Pandan Prima 2, <br/>Dataran Prima Ampang, <br/>68000 Ampang, Selangor</td>
                          <td>Tel: 06-232 0986<br/>Fax: 06-232 6561<br/>@nonbiowaste_AP</td>
                        </tr>
                        <tr>
                          <td>Ara Damansara</td>
                          <td>A-G-01 & A-1-01, Block A, <br/>No. 2, Jalan PJU 1A/7A, <br/>Ara Damansara, PJU 1A, <br/>47301 Petaling Jaya, Selangor</td>
                          <td>Tel: 06-232 0986<br/>Fax: 06-232 6561<br/>@nonbiowaste_ADA</td>
                        </tr>
                        <tr>
                          <td>Bandar Baru Bangi</td>
                          <td>No. 2 & 4, <br/>Jalan 6C/7, <br/>43650 Bandar Baru Bangi, Selangor</td>
                          <td>Tel: 06-232 0986<br/>Fax: 06-232 6561<br/>@nonbiowaste_Bangi</td>
                        </tr>
                        <tr>
                          <td>Cyberjaya</td>
                          <td>Suite 0-55 & 0-56, <br/>4812 Central Business District Perdana 2, <br/>Jalan Perdana, Cyber 12, <br/>63000 Cyberjaya, Selangor</td>
                          <td>Tel: 06-232 0986<br/>Fax: 06-232 6561<br/>@nonbiowaste_Cyber</td>
                        </tr>
                        <tr>
                          <td>Klang</td>
                          <td>Lot 336, <br/>Kompleks Majlis Agama Islam Selangor, <br/>Section 23, Jalan Kapar, <br/>41400 Klang, Selangor</td>
                          <td>Tel: 06-232 0986<br/>Fax: 06-232 6561<br/>@nonbiowaste.Klang</td>
                        </tr>
                        <th scope="row" rowspan="3" style="text-align: center; vertical-align: middle">Pulau Pinang</th>
                        <tr>
                          <td>Butterworth</td>
                          <td>No. 71 & 73, <br/>Jalan Taman Selat, <br/>Off Jalan Bagan Luar, P.O. Box 303, <br/>12720 Butterworth, Pulau Pinang</td>
                          <td>Tel: 06-232 0986<br/>Fax: 06-232 6561<br/>@nonbiowaste.BW</td>
                        </tr><tr>
                          <td>Georgetown</td>
                          <td>Ground Floor, <br/>Wisma Great Eastern, <br/>Light Street, Peti Surat 1204, <br/>10200 Georgetown, Pulau Pinang</td>
                          <td>Tel: 06-232 0986<br/>Fax: 06-232 6561<br/>@nonbiowaste.PP</td>
                        </tr>
                      </tbody>
                      -->
                    </table>
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