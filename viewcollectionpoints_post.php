<?php

session_start();
require_once './database.php';



if (isset($_POST["delete"])) {
    $cp_id = $_POST["cp_id"];
    
} else if (isset($_POST["search"])) {
    $search_keyword = $_POST["search_keyword"];
    $search_attribute = $_POST["search_by"];
    $search_string = "";
    $search_result = array();
  
    if($search_attribute == "name")
    {
      $search_result = Collection_Point::where("name LIKE '%".$search_keyword."%'");
    }
    else if($search_attribute == "state")
    {
      $search_result = Collection_Point::where("state LIKE '%".$search_keyword."%'");
    }
    else
    {
      exit;
    }
  
    // Save the result into session
    $_SESSION["search_result"] = $search_result;
    $_SESSION["search_keyword"] = $search_keyword;
    $_SESSION["search_attribute"] = $search_attribute;
    
    // Return to viewcollectionpoint
    echo "<script type='text/javascript'>location.href = 'viewcollectionpoints.php';</script>";  

    // Set the session
} else {
    exit;
}

?>