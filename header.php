<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="stylesheet" href="css/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="css/header.css">
    
</head>
<body>
    <header class="header">
        <!--nav button-->
        <div class="nav_button">
            <i class="fas fa-bars"></i>
        </div>
        <!--end of nav button-->
        <!--nav bar-->
        <nav class="nav_bar">
            <ul class="nav_links">
                <!--logo-->
                <li>
                    <a href="#">
                        <img src="Images/Untitled.png" alt="CookYours" width="160px" height="150px" style="fixed">
                    </a>
                </li>
                <li><a href="index.php" class="single_link">Home</a></li>
                <li><a href="recipe.php" class="single_link">Recipe</a></li>
                <li><a href="searchbar.php" class="single_link">Search</a></li>
                <li><a href="hotel.php" class="single_link">Hotel Finder</a></li>
                <?php
                     if (isset($_SESSION['userUid'])) {
                 ?>
                        <li><a href="profile.php" class="single_link">Profile</a></li>
                        <li><a href="addrecipe.php" class="single_link">Post Recipe</a></li>
                        <li><a href="message.php" class="single_link">Message</a></li>
                <?php    
                    }
                    
                ?>
                <li><a href="about.php" class="single_link">About</a></li>
            </ul>
        </nav>
        <!--end of nav bar-->
    </header>
</body>
</html>