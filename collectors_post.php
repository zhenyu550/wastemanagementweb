<?php

session_start();
require_once './database.php';

if (isset($_POST["submit"])) {
    $type_id = $_POST["id"];
    $staff_id = $_POST["staff_id"];
    $cp_id = $_POST["cp_id"];

    $bins = Bin::where("cp_id=".$cp_id." and type_id=".$type_id);
    $bins[0]->set_capacity_current(0.000);
    $bins[0]->save();

    echo "<script type='text/javascript'>alert(\"Bin Cleared\")</script>";
    echo "<script type='text/javascript'>location.href = 'collectors.php';</script>";
}
else{
    
}
