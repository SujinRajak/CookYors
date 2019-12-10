<!DOCTYPE html>
<html lang="en">
<head>
         <!-- Required meta tags -->
         <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/footer.css">
    <script src="js/fontawesome-free-5.8.1-web/fontawesome-free-5.8.1-web/js/all.js"></script>
</head>
<body>

        <div class="button_wrapper">
        <form action="" method="POST">
            <?php    
            if (!isset($_SESSION['userId'])) {
            ?>        
                <div class="left-btn">
                    <button id="signup" class="btn btn-info btn-lg" name="signin">Sign-Up</button>
                    <?php
                        if(isset($_POST['signin'])){
                        echo "<script> window.open('join.php','_self')</script>";
                        }
                    ?>
                    </div><!-- left btn -->
            <div class="right-btn">
                <button id="login" class="btn btn-info btn-lg" name="login">Login</button>
                <?php
                    if(isset($_POST['login'])){
                        echo "<script> window.open('login.php','_self')</script>";
                    }
                ?>
            </div>
        <?php        
            }
        ?>
        </form>
    </div><!-- button wrapper login/singin-->
    <div class="buttonlog_wrapper">
    <form action="" method="POST">
    <?php    
        if (isset($_SESSION['userId'])) {
        ?>    
            <div class="log-btn">
                    <button id="logout" class="btn btn-info btn-lg" name="logout">Log_Out</button>
                    <?php
                        if(isset($_POST['logout'])){
                        echo "<script> window.open('includes/logout.inc.php','_self')</script>";
                        }
                    ?>
            </div><!-- left btn -->
        <?php
            }
        ?>
    </form>
     </div><!-- button wrapper login/singin-->
</body>
</html>