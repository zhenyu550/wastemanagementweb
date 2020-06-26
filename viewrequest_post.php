<?php
  require_once './database.php';

  // $id = $_GET["id"];
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

?>