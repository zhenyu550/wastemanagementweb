<?php

    session_start();
    require_once './database.php';

    $old_pw = $_POST["old_pw"];
    $new_pw = $_POST["new_pw"];
    $new_pw_confirm = $_POST["new_pw_confirm"];
    $staff_id = $_POST["staff_id"];

    $staff = Staff::find("id=".$staff_id);

    if($staff->get_password() != hash('sha512', $old_pw)){
        $_SESSION["old_pw"] = $old_pw;
        $_SESSION["new_pw"] = $new_pw;
        $_SESSION["new_pw_confirm"] = $new_pw_confirm;

        echo "<script type='text/javascript'>alert(\"Fail to change password. Incorrect old password.\")</script>";
        echo "<script type='text/javascript'>location.href = 'changepassword.php';</script>";
    }

    if($new_pw != $new_pw_confirm){
        $_SESSION["old_pw"] = $old_pw;
        $_SESSION["new_pw"] = $new_pw;
        $_SESSION["new_pw_confirm"] = $new_pw_confirm;

        echo "<script type='text/javascript'>alert(\"Fail to change password. Please ensure new password and confirm new password are the same.\")</script>";
        echo "<script type='text/javascript'>location.href = 'changepassword.php';</script>";
    }

    $hashed_password = hash('sha512', $new_pw);

    $staff->set_password($hashed_password);
    $staff->save();
    
    echo "<script type='text/javascript'>alert(\"Password Changed\")</script>";
    echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";

?>