<?php
  session_start();
  require_once './database.php';

  $username = $_POST["username"];
  $password = $_POST["password"];
  
  $item = Staff::find("staff_username = '".$username."'");
  
  if (!($item == null || $item->get_password() != $password))
  {
    $_SESSION["user"] = $item->get_id();
    echo '<script language="javascript">';
    echo '</script>';
    echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";    
  }
  else
  {
    echo '<script language="javascript">';
    echo 'alert("Login failed! Wrong id and password. Please try again")';
    echo '</script>';
    echo "<script type='text/javascript'>location.href = 'login.php';</script>";
  }
?>