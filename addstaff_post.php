<?php
require_once './database.php';

$name = $_POST["name"];
$phone_no = $_POST["phone"];
$email = $_POST["email"];
$username = $_POST["username"];
$branch_id = $_POST["cp"];
$type = $_POST["type"];
$password = hash('sha512', $username);

$item = new Staff();
$item->set_name($name);
$item->set_contact_no($phone_no);
$item->set_email($email);
$item->set_staff_username($username);
$item->set_cp_id($branch_id);
$item->set_type($type);
$item->set_password($password);
$item->save();


echo '<script language="javascript">';
echo 'alert("Staff Saved.")';
echo '</script>';
echo "<script type='text/javascript'>location.href = 'viewstaffs.php';</script>";

?>