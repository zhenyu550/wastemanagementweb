<?php
  require_once './database.php';
  session_start();

  if(isset($_POST["pending"]))
  {
    $staff_id = $_POST["staff_id"];
    $request_id = $_POST["request_id"];
    $date_now = date('Y-m-d H:i:s');
  
    echo "<h1>The staff id is: ".$staff_id."</h1>";
    echo "<h1>The request id is: ".$request_id."</h1>";
  
    // Get the request data
    $request = Pick_Up_Request::find("id=".$request_id);
  
    // Set new values
    $request->set_status("Done");
    $request->set_staff_id($staff_id);
    $request->set_pickup_date($date_now);
  
    // Save the request
    $request->save();
  
    // Return to viewrequest
    echo "<script type='text/javascript'>location.href = 'viewrequest.php';</script>";  
  }
  else if(isset($_POST["search_request_pen"]))
  {
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

      // Fetch the search result from database
      $search_result = Pick_Up_Request::where("(".$branch_condition.") and status='Pending'");
    }

    // Save the result into session
    $_SESSION["search_result"] = $search_result;
    $_SESSION["search_string"] = $search_string;

    // Return to viewrequest
    echo "<script type='text/javascript'>location.href = 'viewrequest.php';</script>";  
  }  
  else if(isset($_POST["search_request_com"]))
  {
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

      // Fetch the search result from database
      $search_result = Pick_Up_Request::where("(".$branch_condition.") and status='Done'");
    }

    // Save the result into session
    $_SESSION["search_result"] = $search_result;
    $_SESSION["search_string"] = $search_string;

    // Return to viewrequest
    echo "<script type='text/javascript'>location.href = 'viewrequestcompleted.php';</script>";  
  }

  else
  {
    exit;
  }

?>