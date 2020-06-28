<?php

    session_start();
    require_once './database.php';

  if(isset($_POST["add_transaction"]))
  {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone_no = $_POST["phone_no"];
    $date_now = date('Y-m-d H:i:s');
    $staff_id = $_POST["staff_id"];

    $item = new Transaction();
    $item->set_name($name);
    $item->set_email($email);
    $item->set_contact_no($phone_no);
    $item->set_transaction_date($date_now);
    $item->set_staff_id($staff_id);
    $item->save();

    // Get the Transaction Id for bridge table
    $transaction_id = $item->get_id();

    echo "<h1>The transaction id is:".$transaction_id."</h1>";

    // Get the bin and wastes
    // Decode the json
    $transaction_bins = array();

    $bins_id = json_decode($_POST['waste_list_bins']);
    $bins_weight = json_decode($_POST['waste_list_weights']);
    
    // Create new class for each element and assign into object array
    for($index = 0; $index < count($bins_id); $index++)
    {
      // Convert the weight to float
      $weight_float = floatval($bins_weight[$index]);

      $transaction_waste_temp = new Transaction_Bin();
      $transaction_waste_temp->set_transaction_id($transaction_id);
      $transaction_waste_temp->set_bin_id($bins_id[$index]);
      $transaction_waste_temp->set_weight($weight_float);
      $transaction_waste_temp->save();

      // get the bin id and update the weight
      $affected_bin = Bin::find("id=".$bins_id[$index]);
      $weight = $affected_bin->get_capacity_current();
      $weight = $weight + $weight_float;
      $affected_bin->set_capacity_current($weight);
      $affected_bin->save();
    }
    
    echo "<script type='text/javascript'>alert(\"Transaction Saved\")</script>";
    echo "<script type='text/javascript'>location.href = 'viewtransaction.php';</script>";

  } 
  else if (isset($_POST["add_waste"]))
  {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone_no = $_POST["phone_no"];
    $date_now = date('Y-m-d H:i:s');
    $staff_id = $_POST["staff_id"];

    $bin = $_POST["bin"];
    $weight = floatval($_POST["weight"]);

    // Save into session
    $item = new Transaction();
    $item->set_name($name);
    $item->set_email($email);
    $item->set_contact_no($phone_no);
    $item->set_transaction_date($date_now);
    $item->set_staff_id($staff_id);


    $transaction_waste = new Transaction_Bin();
    $transaction_waste->set_bin_id($bin);
    $transaction_waste->set_weight($weight);

    $transaction_bins = array();

    
    if(isset($_POST['waste_list_bins']) && isset($_POST['waste_list_weights'])){

      // Decode the json
      $bins_id = json_decode($_POST['waste_list_bins']);
      $bins_weight = json_decode($_POST['waste_list_weights']);

      // Create new class for each element and assign into object array
      for($index = 0; $index < count($bins_id); $index++)
      {
        $transaction_waste_temp = new Transaction_Bin();
        $transaction_waste_temp->set_bin_id($bins_id[$index]);
        $transaction_waste_temp->set_weight($bins_weight[$index]);
        array_push($transaction_bins, $transaction_waste_temp);
      }
    }

    array_push($transaction_bins, $transaction_waste);

    $_SESSION["transaction"] = $item;
    $_SESSION["transaction_bins_from_post"] = $transaction_bins;

    echo "<script type='text/javascript'>location.href = 'addtransaction.php';</script>";
  }
  else {
      exit;
  }

?>