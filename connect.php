<?php
    $con = mysqli_connect("localhost","root","") or die("Couldn't connect to the localhost");
    mysqli_select_db($con,"old") or die("Couldn't connect to the database");
?>
