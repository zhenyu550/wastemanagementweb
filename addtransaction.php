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
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Add Transaction Form</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="robots" content="all,follow" />
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css" />
    <!-- Font Awesome CSS-->
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
      integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
      crossorigin="anonymous"
    />
    <!-- Google fonts - Popppins for copy-->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Poppins:300,400,800"
    />
    <!-- orion icons-->
    <link rel="stylesheet" href="css/orionicons.css" />
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet" />
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css" />
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.png?3" />
    <!-- Tweaks for older IEs-->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script
    ><![endif]-->
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
              <?php
                if(isset($_SESSION["transaction"]))
                {
                  $transaction = unserialize(serialize($_SESSION["transaction"]));
                  $_SESSION["transaction"] = null;
                }
              ?>
              <div class="col-lg-12 mb-5">
                <div class="card">
                  <div class="card-header">
                    <h3 class="h6 text-uppercase mb-0">Add Transaction</h3>
                  </div>
                  <div class="card-body">
                    <form class="form-horizontal" method="post" action="addtransaction_post.php" name="add_transaction" >
                      <input type='hidden' name='staff_id' value='<?php echo $user?>'>
                      <div class="form-group row">
                        <label class="col-md-2 form-control-label">Name</label>
                        <div class="col-md-9">
                          <input
                            type="text"
                            name="name"
                            placeholder="Insert name"
                            class="form-control"
                            <?php 
                              if(!empty($transaction)){
                                echo "value=\"".$transaction->get_name()."\"";
                              }
                            ?>
                          />
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-2 form-control-label">Email</label>
                        <div class="col-md-9">
                          <input
                            type="text"
                            name="email"
                            placeholder="Insert email"
                            class="form-control"
                            <?php 
                              if(!empty($transaction)){
                                echo "value=\"".$transaction->get_email()."\"";
                              }
                            ?>
                          />
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-md-2 form-control-label"
                          >Phone No.</label
                        >
                        <div class="col-md-9">
                          <input
                            type="text"
                            name="phone_no"
                            placeholder="Insert phone no."
                            class="form-control"
                            <?php 
                              if(!empty($transaction)){
                                echo "value=\"".$transaction->get_contact_no()."\"";
                              }
                            ?>
                          />
                        </div>
                      </div>
                      <div class="line"></div>
                      <hr />
                      <div class="line"></div>
                      <div class="form-group row">
                        <label class="col-md-2 form-control-label"
                          >Collection Point</label
                        >

                        <input type='hidden' name='branch_id' value='
                          <?php
                            $staff = Staff::find("id=".$user); 
                            $branch_id = $staff->get_cp_id();
                            echo $branch_id;
                          ?>
                        '>

                        <div class="col-md-6 select mb-3">
                            <?php
                              // If the user is admin
                                // if($staff->get_type() == "Admin")
                                // {
                                //   echo "<select name='branch' id='branch_select' class='form-control' onchange='setBranch()'>";
                                //   $items = Collection_Point::all();
                                //   echo var_dump($items);
                                //   foreach ($items as $item)
                                //   {
                                //     // Set default value to the branch of the admin
                                //     if($item->get_id() == $branch_id)
                                //     {
                                //       echo "<option value='".$item->get_id()."' selected>";
                                //       echo $item->get_state()." - ".$item->get_name();
                                //       echo "</option>";  
                                //     }
                                //     else
                                //     {
                                //       echo "<option value='".$item->get_id()."'>";
                                //       echo $item->get_state()." - ".$item->get_name();
                                //       echo "</option>";  
                                //     }
                                //   }
                                //   echo "</select>";
                                // }
                                // else
                                // {
                                  echo "<select name='branch' id='branch_select' class='form-control' disabled>";
                                  $item = Collection_Point::find("id=".$branch_id);
                                  echo "<option value='".$item->get_id()."'>";
                                  echo $item->get_state()." - ".$item->get_name();
                                  echo "</option>";
                                  echo "</select>";
                                // }
                            ?>
                        </div>
                      </div>

                      <script type="text/javascript" src="js/jquery.min.js">
                        function setBranch(){
                          var selected = document.getElementById("branch_select").value;
                        }
                      </script>

                      <div class="col-lg-10 mb-4" style="margin: auto;">
                        <div class="card">
                          <div class="card-header">
                            <h6
                              class="text-uppercase mb-0"
                              style="text-align: center;"
                            >
                              List of Wastes
                            </h6>
                            <br />
                            <!-- Modal Form-->
                            <button
                              type="button"
                              id="add-waste-button"
                              data-toggle="modal"
                              data-target="#myModal"
                              class="btn btn-primary"
                            >
                              Add Waste
                            </button>
                            <!-- Modal-->
                            <div
                              id="myModal"
                              tabindex="-1"
                              role="dialog"
                              aria-labelledby="exampleModalLabel"
                              aria-hidden="true"
                              class="modal fade text-left"
                            >
                              <div role="document" class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4
                                      id="exampleModalLabel"
                                      class="modal-title"
                                    >
                                      Add Waste
                                    </h4>
                                    <div class="line"></div>
                                    <button
                                      type="button"
                                      data-dismiss="modal"
                                      aria-label="Close"
                                      class="close"
                                    >
                                      <span aria-hidden="true">×</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <p>Select the collection bin to add.</p>
                                    <div class="form-group row">
                                      <label class="col-md-3 form-control-label"
                                        >Collection Bin</label
                                      >
                                      <div class="col-md-9 select mb-3">
                                        <select
                                          name="bin"
                                          class="form-control"
                                        >
                                          <?php
                                          // Get Bin from database
                                            $items = Bin::where('cp_id='.$branch_id);
                                            echo var_dump($items);
                                            foreach ($items as $item)
                                            {
                                              // Get the waste type for that bin
                                              $type = Waste_Type::find("id=".$item->get_type_id());

                                              echo "<option value='".$item->get_id()."'>";
                                              echo $type->get_name();
                                              echo "</option>";
                                            }
                                          ?>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <label class="col-md-3 form-control-label"
                                        >Weight (kg)</label
                                      >
                                      <div class="col-md-9 select mb-3">
                                        <input
                                          type="number"
                                          name="weight"
                                          placeholder="Weight"
                                          min="0"
                                          value="0"
                                          step="0.001"
                                          class="form-control"
                                        />
                                      </div>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button
                                      type="button"
                                      data-dismiss="modal"
                                      class="btn btn-secondary"
                                    >
                                      Close
                                    </button>
                                    <button
                                      type="submit"
                                      name="add_waste"
                                      class="btn btn-primary"
                                    >
                                      Add Waste
                                    </button>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="card-body">
                              <table
                                class="table table-striped table-hover card-text"
                              >
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>Waste Type</th>
                                    <th>Weight (kg)</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                    if(isset($_SESSION["transaction_bins_from_post"]))
                                    {
                                      $transaction_bins = unserialize(serialize($_SESSION["transaction_bins_from_post"]));
                                      // $_SESSION["transaction_bins_to_post"] = $transaction_bins;
                                      $_SESSION["transaction_bins_from_post"] = null;
                                  
                                      // Create a new array for json encoding
                                      $exported_bins = array();
                                      $exported_weights = array();

                                      foreach ($transaction_bins as $transaction_bin)
                                      {
                                        array_push($exported_bins, $transaction_bin->get_bin_id());
                                        array_push($exported_weights, $transaction_bin->get_weight());
                                      }

                                      echo "<input type='hidden' name='waste_list_bins' value='";
                                        echo json_encode($exported_bins);
                                      echo "'/>";
                                      echo "<input type='hidden' name='waste_list_weights' value='";
                                        echo json_encode($exported_weights);
                                      echo "'/>";

                                      for($index = 0; $index < count($transaction_bins); $index++)
                                      {
                                      // Get the type of bin with the bin id
                                       $bin = Bin::find("id=".$transaction_bins[$index]->get_bin_id());
                                       $type = Waste_Type::find("id=".$bin->get_type_id());

                                       echo "<tr>";
                                       echo "<th scope='row'>".($index + 1)."</th>";
                                       echo "<td>".$type->get_name()."</td>";
                                       echo "<td>".$transaction_bins[$index]->get_weight()."</td>";
                                       echo "</tr>";
                                      }
                                    }
                                  ?>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="col-md-8 ml-auto">
                          <button type="submit" name="add_transaction" class="btn btn-primary">
                            Save
                          </button>
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
