<?php
require_once './database.php';

$name = $_POST["branch"];
$address = $_POST["address"];
$state = $_POST["state"];
$phone_no = $_POST["phone"];
$fax = $_POST["fax"];
$socmed = $_POST["socmed"];


$item = new Collection_Point();
$item->set_name($name);
$item->set_address($address);
$item->set_state($state);
$item->set_phone_no($phone_no);
$item->set_fax_no($fax);
$item->set_social_media_tag($socmed);
$item->save();


echo '<script language="javascript">';
echo 'alert("Collection Point Saved.")';
echo '</script>';
echo "<script type='text/javascript'>location.href = 'addcollectionpoint.php';</script>";

?>