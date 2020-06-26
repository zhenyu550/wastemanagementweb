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


  } 
  else if (isset($_POST["add_waste"]))
  {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone_no = $_POST["phone_no"];
    $date_now = date('Y-m-d H:i:s');
    $staff_id = $_POST["staff_id"];

    $bin = $_POST["bin"];
    $weight = $_POST["weight"];

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
    if(isset($_POST["waste_list"])){
        $waste_list = json_decode($_POST['waste_list']);
        echo var_dump($waste_list);
        echo "<h1>The waste is: ".$waste_list[0]->get_bin_id().", ".$waste_list[0]->get_weight()." kg</h1>";

        $transaction_bins = unserialize($waste_list);
    }
    
    array_push($transaction_bins, $transaction_waste);

    $_SESSION["transaction"] = $item;
    $_SESSION["transaction_bins"] = $transaction_bins;

    // echo "<h1>The waste is: ".$transaction_bins[0]->get_bin_id().", ".$transaction_bins[0]->get_weight()." kg</h1>";
    // echo "<script type='text/javascript'>location.href = 'addtransaction.php';</script>";
  }
  else {
      exit;
  }

//   $name = $_POST["name"];
//   $phone_no = $_POST["phone_no"];
//   $address = $_POST["address"];
//   $waste_type = 0;
//   if (isset($_POST["waste_type_1"])) $waste_type += 1;
//   if (isset($_POST["waste_type_2"])) $waste_type += 10;
//   if (isset($_POST["waste_type_3"])) $waste_type += 100;
//   if (isset($_POST["waste_type_4"])) $waste_type += 1000;
//   $branch = $_POST["branch"];
//   $date_now = date('Y-m-d H:i:s');
  
//   $item = new Pick_Up_Request();
//   $item->set_name($name);
//   $item->set_contact_no($phone_no);
//   $item->set_waste_type($waste_type);
//   $item->set_address($address);
//   $item->set_request_date($date_now);
//   $item->set_cp_id(intval($branch));
//   $item->save();
  
  
//   echo '<script language="javascript">';
//   echo 'alert("Pick up Request Submitted.")';
//   echo '</script>';
//   echo "<script type='text/javascript'>location.href = 'index.php';</script>";
?>