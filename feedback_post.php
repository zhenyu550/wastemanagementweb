<?php
  require_once './database.php';
  $name = $_POST["name"];
  $email = $_POST["email"];
  $phone_no = $_POST["phone_no"];
  $pref_comm = $_POST["pref_comm"];
  $feedback_type = $_POST["feedback_type"];
  $comment = $_POST["comment"];
  $branch = $_POST["branch"];
  $date_now = date('Y-m-d H:i:s');

  if($name == "" || $email = "" || $phone_no == "" || $pref_comm == 0 || 
  $feedback_type == 0 || $comment == "" || $branch == 0)
  {
    echo '<script language="javascript">';
    echo 'alert("Error: Unable to submit feedback, please ensure all fields are filled.")';
    echo '</script>';  
    echo "<script type='text/javascript'>location.href = 'feedback.php';</script>";
    exit;
  }

  $item = new Feedback();
  $item->set_name($name);
  $item->set_email($email);
  $item->set_contact_no($phone_no);
  $item->set_preferred_comm($pref_comm);
  $item->set_feedback_type($feedback_type);
  $item->set_feedback_date($date_now);
  $item->set_feedback_content($comment);
  $item->set_cp_id(intval($branch));
  $item->save();
  
  echo '<script language="javascript">';
  echo 'alert("Feedback Submitted.")';
  echo '</script>';
  echo "<script type='text/javascript'>location.href = 'index.php';</script>";
?>