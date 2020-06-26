<?php
  require_once './database.php';

  $name = $_POST["name"];
  $phone_no = $_POST["phone_no"];
  $address = $_POST["address"];
  $waste_type = 0;
  if (isset($_POST["waste_type_1"])) $waste_type += 1;
  if (isset($_POST["waste_type_2"])) $waste_type += 10;
  if (isset($_POST["waste_type_3"])) $waste_type += 100;
  if (isset($_POST["waste_type_4"])) $waste_type += 1000;
  $branch = $_POST["branch"];
  $date_now = date('Y-m-d H:i:s');
  
  $item = new Pick_Up_Request();
  $item->set_name($name);
  $item->set_contact_no($phone_no);
  $item->set_waste_type($waste_type);
  $item->set_address($address);
  $item->set_request_date($date_now);
  $item->set_cp_id(intval($branch));
  $item->save();
  
  
  echo '<script language="javascript">';
  echo 'alert("Pick up Request Submitted.")';
  echo '</script>';
  echo "<script type='text/javascript'>location.href = 'index.php';</script>";
?>