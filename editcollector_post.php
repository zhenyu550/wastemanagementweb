<?php
require_once './database.php';

$name = $_POST["name"];
$address = $_POST["address"];
$state = $_POST["state"];
$phone_no = $_POST["phone"];
$fax = $_POST["fax"];
$type = $_POST["waste_type"];
$id = $_POST["collector_id"];

$item = new Collector();
$item->set_id($id);
$item->set_company_name($name);
$item->set_company_address($address);
$item->set_state($state);
$item->set_tel_no($phone_no);
$item->set_fax_no($fax);
$item->set_type_id($type);
$item->save();


echo '<script language="javascript">';
echo 'alert("Collector Saved.")';
echo '</script>';
echo "<script type='text/javascript'>location.href = 'viewcollectors.php';</script>";

?>