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
  <title>View Collection Points</title>
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
                  <h3 class="h6 text-uppercase mb-0">View Collection Points</h3>
                </div>
                <div class="card-body">
                  <form class="form-horizontal" method="post" action="addcollectionpoint.php">
                    <div class="form-group row">
                      <label class="col-md-2 form-control-label">Branch Name</label>
                      <div class="col-md-9">
                        <div class="form-group">
                          <div class="input-group mb-3">
                            <input type="text" placeholder="Branch Name" aria-label="Branch Name"
                              aria-describedby="button-search" class="form-control">
                            <div class="input-group-append">
                              <button id="button-search" type="button" class="btn btn-primary">Search</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-md-2 form-control-label">State</label>
                      <div class="col-md-9 select mb-3">
                        <select name="state" class="form-control">
                          <option>ALL</option>
                          <option>Johor</option>
                          <option>Kedah</option>
                          <option>Kelantan</option>
                          <option>Melaka</option>
                          <option>Negeri Sembilan</option>
                          <option>Pahang</option>
                          <option>Pulau Pinang</option>
                          <option>Perak</option>
                          <option>Perlis</option>
                          <option>Sabah</option>
                          <option>Sarawak</option>
                          <option>Selangor</option>
                          <option>Terangganu</option>
                          <option>W.P. Kuala Lumpur</option>
                          <option>W.P. Labuan</option>
                          <option>W.P. Putrajaya</option>
                        </select>
                      </div>
                    </div>
                      <div class="form-group row">
                      <div class="col-md-8 ml-auto">
                        <button type="submit" class="btn btn-primary">Add</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            <div class="col-lg-12 mb-4" style="margin: auto">
                      <div class="card">
                        <div class="card-header">
                          <h6 class="text-uppercase mb-0" style="text-align: center;">List of Collection Points</h6>
                          <!-- Modal Form-->
                          <div class="card-body">
                            <table class="table table-striped table-hover card-text" id="transaction_table">
                              <thead>
                                <tr>
                                  <th>ID</th>
                                  <th>Name</th>
                                  <th>Address</th>
                                  <th>Phone No</th>
                                  <th>Fax No</th>
                                  <th>Social Media Tag</th>
                                  <th>State</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                  $items = Collection_Point::all();
                                  foreach($items as $item)
                                  {
                                    echo "<tr>";
                                    echo "<th scope=\"row\">".$item->get_id()."</th>";
                                    echo "<td>".$item->get_name()."</td>";
                                    echo "<td>".$item->get_address()."</td>";
                                    echo "<td>".$item->get_phone_no()."</td>";
                                    echo "<td>".$item->get_fax_no()."</td>";
                                    echo "<td>".$item->get_social_media_tag()."</td>";
                                    echo "<td>".$item->get_state()."</td>";
                                    echo "<td><button type='submit' class='btn btn-primary' name='Edit_".$item->get_id()."'>Edit</button></td>";
                                    echo "<td><button type='submit' class='btn btn-primary' name='Delete".$item->get_id()."'>Delete</button></td>";
                                    echo "</tr>";
                                  }
                                ?>

                                <!-- <tr>
                                  <th scope="row">1</th>
                                  <td>HQ</td>
                                  <td>No. 1 & 3, Jalan KF4,Kota Fesyen – MITC, Hang Tuah Jaya, 75450 Ayer Keroh, Melaka</td>
                                  <td>06-232 0986</td>
                                  <td>06-232 6561</td>
                                  <td>@nonbiowaste_HQ</td>
                                  <td>Melaka</td>
                                  <td><button type="submit" class="btn btn-primary">Edit</button></td>
                                  <td><button type="submit" class="btn btn-primary">Delete</button></td>
                                </tr>
                                <tr>
                                  <th scope="row">2</th>
                                  <td>Bandar Baru Bangi 1</td>
                                  <td>No. 2 & 4, Jalan 6C/7, 43650 Bandar Baru Bangi, Selangor  </td>
                                  <td>06-2320986</td>
                                  <td>06-2326561</td>
                                  <td>@nonbiowaste_Bangi1</td>
                                  <td>Selangor</td>
                                  <td><button type="submit" class="btn btn-primary">Edit</button></td>
                                  <td><button type="submit" class="btn btn-primary">Delete</button></td>
                                </tr> -->
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