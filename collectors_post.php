<?php

session_start();
require_once './database.php';

if (isset($_POST["submit"])) {
    $type = $_POST["id"];
    $staff_id = $_POST["staff_id"];
    $cp_id = $_POST["cp_id"];

    $servername   = "localhost";
    $username   = "root";
    $password   = "test";
    $databasename = "waste";

    $DBConn   = new mysqli($servername, $username, $password, $databasename);

    $sql = "UPDATE `bin` SET capacity_current = '0.000' WHERE type_id = '" . $type . "' AND cp_id = $cp_id";
    $result = $DBConn->query($sql);

    echo "<script type='text/javascript'>alert(\"Bin Cleared\")</script>";
    // echo "<script type='text/javascript'>location.href = 'collectors.php';</script>";
}
else{
    
}
