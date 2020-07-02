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

$types = Waste_Type::all();
foreach($types as $type){
    $bin = new Bin();
    $bin->set_cp_id($item->get_id());
    $bin->set_type_id($type->get_id());
    $bin->set_capacity_current(0);
    $bin->set_capacity_max(100);
    $bin->save();
}


echo '<script language="javascript">';
echo 'alert("Collection Point Saved.")';
echo '</script>';
echo "<script type='text/javascript'>location.href = 'viewcollectionpoints.php';</script>";

?>