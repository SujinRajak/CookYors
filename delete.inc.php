<?php
   require 'connect.php';
   $id = $_GET['id'];
    $query = "delete from recipe where id='$id';";
    mysqli_query($con, $query); 
    mysqli_close($con);
    echo '<script>alert("Successfully Deleted!")</script>';
    header('Location:profile.php');
?>