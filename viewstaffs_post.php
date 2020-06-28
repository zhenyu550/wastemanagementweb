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
      $search_result = Staff::where("name LIKE '%".$search_keyword."%'");
    } 
    else if($search_attribute == "username")
    {
      $search_result = Staff::where("staff_username LIKE '%".$search_keyword."%'");
    }
    else if($search_attribute == "type")
    {
      $search_result = Staff::where("type LIKE '%".$search_keyword."%'");
    }
    else if ($search_attribute == "branch") 
    {
        $branches_to_search = array();

        // Set default value if string is empty
        if($search_string == "")
        {
          $branches_to_search = Collection_Point::all();
        }
        else 
        {
          $branches_to_search = Collection_Point::where("name LIKE '%".$search_string."%'");
        }
    
        // Search the branch id using the name
        $branch_condition = "";
        $search_result = array();
    
        echo var_dump($branches_to_search);
    
        if(count($branches_to_search) > 0)
        {
          for($index = 0; $index < count($branches_to_search); $index++)
          {
            if($index == count($branches_to_search) - 1)
            {
              $branch = $branches_to_search[$index];
              $branch_id = $branch->get_id();
              $branch_condition = $branch_condition."cp_id=".$branch_id;
            } 
            else 
            {
              $branch = $branches_to_search[$index];
              $branch_id = $branch->get_id();
              $branch_condition = $branch_condition."cp_id=".$branch_id." OR ";
            }
          }  
    
          echo var_dump($branch_condition);
    
          // Fetch the search result from database
          $search_result = Staff::where($branch_condition);
        }
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
    echo "<script type='text/javascript'>location.href = 'viewstaffs.php';</script>";  

} else {
    exit;
}

?>