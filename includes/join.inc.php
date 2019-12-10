<?php

if (isset($_POST['create'])) {
    require 'dbh.inc.php';

    $username=$_POST['uname'];
    $email=$_POST['email'];
    $password=$_POST['pass'];
    $repassword=$_POST['repass'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    //validation
    if (empty($username)||empty($email)||empty($password)||empty($repassword)||empty($fname)||empty($lname)) {
        header("Location: ../join.php?error=emptyfields&uname=".$username."&email=".$email);
        exit();
    }
    //valid email plus valid email
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/",$username)) {
        header("Location: ../join.php?error=invalidEmailsuname");
        exit();
    }
    //validating email and sending back username
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: ../join.php?error=invalidEmails&uname=".$username);
        exit();
    }
    //checking username and send back email
    else if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
        header("Location: ../join.php?error=invaliduser&email=".$email);
        exit();
    }
    //match password
    else if ($password !== $repassword) {
        header("Location: ../join.php?error=passwordcheck&uname=".$username."&email=".$email);
        exit();
    }
    //checking if user is already availbale or not and if not available inserting into the db?
    else {
        //?=placeholder
        $sql="SELECT * FROM users WHERE uidUsers=? AND emailUsers=?";
        $stmt=mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt,$sql)) {
            header("Location: ../join.php?error=SQLerror");
            exit();
         }
         //take info from user and check
         else{
             //bind statement from the user bind_param(statment,datatype,)
             mysqli_stmt_bind_param($stmt,"ss",$username,$email);
             //executing
             mysqli_stmt_execute($stmt);
             //takes result from the db and stores it back into the statemtn
             mysqli_stmt_store_result($stmt);
             //cheking how many reults we have in stmt
             $resultCheck = mysqli_stmt_num_rows($stmt);
             if ($resultCheck>0) {
                header("Location: ../join.php?error=Usertaken&email=".$email);
                exit();
             }
             //inserting into db
             else{
                $sql= "INSERT INTO users (uidUsers,emailUsers,pwdUsers,firstname,lastname) VALUES(? , ? , ? , ? , ? )";
                $stmt= mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt,$sql)) {
                     header("Location: ../join.php?error=SQLerror");
                    exit();
                } 
                else{
                    //hashing password dont use md5 not safe coz outdated
                    $hasspwd=password_hash($password, PASSWORD_DEFAULT); 
                    //binding
                    mysqli_stmt_bind_param($stmt,"sssss",$username,$email,$hasspwd,$fname,$lname);
                    mysqli_stmt_execute($stmt);
                   header("Location: ../login.php?join=SUCESS");
                    exit();
                 }
            }        
         }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
    else{
        header("Location: ../join.php");
        exit();
    }