<?php

session_start();
require_once './database.php';

if (isset($_POST["submit"])) {
    $type = $_POST["id"];

    $servername   = "localhost";
    $username   = "root";
    $password   = "";
    $databasename = "wastemanagement";

    $DBConn   = new mysqli($servername, $username, $password, $databasename);

    $sql = "UPDATE `bin` SET capacity_current = '0.000' WHERE type_id = '" . $type . "' AND cp_id = '1'";
    $result = $DBConn->query($sql);
    $count = mysqli_num_rows($result);

    echo "<script type='text/javascript'>alert(\"Transaction Saved\")</script>";
    echo "<script type='text/javascript'>location.href = 'collectors.php';</script>";
}
else{
    
}
