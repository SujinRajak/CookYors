<?php
	if (isset($_POST['submit'])) {

    session_start();
    require 'connect.php';
    
    $oldpwd = mysqli_real_escape_string($con, $_POST['oldpwd']);
    $pwd = mysqli_real_escape_string($con, $_POST['pwd']);
    $cpwd = mysqli_real_escape_string($con, $_POST['cpwd']);
    

        if ($pwd!=$cpwd) {
            header("Location: profile.php?Password_&_Confirm_Password_do_not_match");
            exit();	
        }
        else {
            $userid = $_SESSION['userUid'];
            $sql = "SELECT * FROM users WHERE uidUsers='$userid';";
            $result = mysqli_query($con, $sql);
            $resultCheck = mysqli_num_rows($result);
            if ($row = mysqli_fetch_assoc($result)) {
                                
                $hashedPwdCheck = password_verify($oldpwd, $row['pwdUsers']);
                if ($hashedPwdCheck == false) {
                    header("Location: profile.php?Wrong_password");
                    exit();
                }
                elseif($hashedPwdCheck == true) {

                    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
                    $sql = "UPDATE users SET pwdUsers='$hashedPwd' WHERE uidUsers='$userid';";
                    $result = mysqli_query($con, $sql);
                                
                    header("Location: profile.php?Password_Update=Success");
                    echo '<script>alert("Successfully Updated!")</script>';
                    exit();
                }
            }  
        }
    }   
    else {
		header("Location: profile.php");
		exit();
    }
?>