<?php
  require_once './database.php';
  session_start();

  $search_keyword = $_POST["search_keyword"];
  $search_attribute = $_POST["search_by"];
  $search_string = "";
  $search_result = array();

  if($search_attribute == "transaction_date")
  {
    $search_result = Transaction::where("transaction_date LIKE '%".$search_keyword."%'");
  }
  else if($search_attribute == "staff_id")
  {
    $staffs_to_search = array();

    // Set default value if string is empty
    if($search_keyword == "")
    {
      $staffs_to_search = Staff::all();
    }
    else 
    {
      $staffs_to_search = Staff::where("name LIKE '%".$search_keyword."%'");
    }

    // Search the branch id using the name
    $staff_condition = "";
    
    echo var_dump($staffs_to_search);
    
    if(count($staffs_to_search) > 0)
    {
        for($index = 0; $index < count($staffs_to_search); $index++)
        {
            if($index == count($staffs_to_search) - 1)
            {
                $staff = $staffs_to_search[$index];
                $staff_id = $staff->get_id();
                $staff_condition = $staff_condition."staff_id=".$staff_id;
            } 
            else 
            {
                $staff = $staffs_to_search[$index];
                $staff_id = $staff->get_id();
                $staff_condition = $staff_condition."staff_id=".$staff_id." OR ";
            }
        }  
    
        echo var_dump($staff_condition);
    
        // Fetch the search result from database
        $search_result = Transaction::where($staff_condition);
    }
  }
  else if($search_attribute == "name")
  {
    $search_result = Transaction::where("name LIKE '%".$search_keyword."%'");
  }
  else
  {
    exit;
  }

  // Save the result into session
  $_SESSION["search_result"] = $search_result;
  $_SESSION["search_keyword"] = $search_keyword;
  $_SESSION["search_attribute"] = $search_attribute;
  
  // Return to viewtransaction
  echo "<script type='text/javascript'>location.href = 'viewtransaction.php';</script>";  
  
?>