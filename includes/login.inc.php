<?php

    if(isset($_POST['login-submit']))
    {
        require 'dbh.inc.php';
        //email or username signup
        $mail = $_POST['uname'];
        $pass= $_POST['pass'];
        //validating empty
        if (empty($mail)||empty($pass)) {
            header("Location:../login.php?error=emptyfields");
            exit();
        }
        //checking username and password form the database
        else{
            $sql= "SELECT * FROM users WHERE uidUsers=? OR emailUsers=?;";
            $stmt= mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt,$sql)) {
                header("Location:../login.php?error=sqlerror");
                exit();
            }
            else{
                //passint the user info to the databse
                mysqli_stmt_bind_param($stmt,"ss",$mail,$mail);
                //execute statement
                mysqli_stmt_execute($stmt);
                //taking data fro mthe database
                $result = mysqli_stmt_get_result($stmt);
                //fetching data from the database
                if ($row = mysqli_fetch_assoc($result)) {
                    //chek password from the user
                    $passwordchek=password_verify($pass,$row['pwdUsers']);
                    if($passwordchek==false){
                        header("Location:../login.php?error=Wrong Password");
                        exit();
                    }
                    else if($passwordchek==true){
                        //session create global variable 
                        session_start();
                        $_SESSION['userId']=$row['idUsers'];
                        $_SESSION['userUid']=$row['uidUsers'];
                        header("Location:../index.php?Login=Sucess");
                        exit();
                    }
                    else{
                        header("Location:../login.php?error=Wrong Password");
                        exit();
                    }
                }
                else {
                    header("Location:../login.php?error=No User");
                exit();
                }
            }
        }
    }
    else{
        header("Location:../index.php");
        exit();
    }