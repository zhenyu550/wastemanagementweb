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
  
    if($search_attribute == "company_name")
    {
      $search_result = Collector::where("company_name LIKE '%".$search_keyword."%'");
    }
    else if($search_attribute == "state")
    {
      $search_result = Collector::where("state LIKE '%".$search_keyword."%'");
    }
    else if ($search_attribute == "waste_type") {
        $types_to_search = array();

        // Set default value if string is empty
        if($search_keyword == "")
        {
          $types_to_search = Waste_Type::all();
        }
        else 
        {
          $types_to_search = Waste_Type::where("name LIKE '%".$search_keyword."%'");
        }
    
        // Search the branch id using the name
        $type_condition = "";
                
        if(count($types_to_search) > 0)
        {
            for($index = 0; $index < count($types_to_search); $index++)
            {
                if($index == count($types_to_search) - 1)
                {
                    $type = $types_to_search[$index];
                    $type_id = $type->get_id();
                    $type_condition = $type_condition."type_id=".$type_id;
                } 
                else 
                {
                    $type = $types_to_search[$index];
                    $type_id = $type->get_id();
                    $type_condition = $type_condition."type_id=".$type_id." OR ";
                }
            }  
                
            // Fetch the search result from database
            $search_result = Collector::where($type_condition);
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
    echo "<script type='text/javascript'>location.href = 'viewcollectors.php';</script>";  

} else {
    exit;
}

?>