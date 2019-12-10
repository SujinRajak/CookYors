

<?php
    //setting up database
    $servername="localhost";
    $dbUsername="root";
    $dbPassword="";
    $dbName="old";

    $conn = mysqli_connect($servername,$dbUsername,$dbPassword,$dbName);

    if (!$conn) {
        die("Connection failed:" .mysqli_connect_error());
    }
?>