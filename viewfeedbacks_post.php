<?php
  require_once './database.php';
  session_start();

  $search_string = $_POST["search_branch_input"];

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
    $search_result = Feedback::where($branch_condition);
  }

  // Save the result into session
  $_SESSION["search_result"] = $search_result;
  $_SESSION["search_string"] = $search_string;

  // Return to viewfeedback
  echo "<script type='text/javascript'>location.href = 'viewfeedbacks.php';</script>";

?>