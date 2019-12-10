
<?php
    require 'header.php';
?>

<main>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
    <script src="js/fontawesome-free-5.8.1-web/fontawesome-free-5.8.1-web/js/all.js"></script>
</head>
<body>
  <a href="index.php"><i class="fas fa-arrow-left back fa-3x"></i></a>  
    <div class="login_box">
         <i class="fas fa-user icon fa-7x"  id="user_icon"></i><br>
        <h1>Login Here</h1>
        <?php
                    if (isset($_GET['error'])){
                        if ($_GET['error'] =="emptyfields") {
                            echo '<p class="joinerror" style="text-align:center; color:red; font-size:30px;">Fill in all Fields!</p>';
                        }
                    }
        ?>
        <?php
                    if (isset($_GET['join'])){
                        if ($_GET['join'] =="SUCESS") {
                            echo '<p class="joinerror" style="text-align:center; color:red; font-size:30px;">Account Created! Now You Can Login</p>';
                        }
                    }
             ?>
        <form action="includes/login.inc.php" method="POST">
            <label for="Username" class="form">Username</label><br>
            <input type="text"  name="uname" placeholder="Username/Email" class="form" onfocus="this.value=''"><br>
            <label for="Password" class="form">Password</label><br>
            <input type="password" name="pass" placeholder="Password" class="form" onfocus="this.value=''" ><br>
            <input type="submit" value="Login" name="login-submit">
            <a href="forgot.php">Forgot Password?</a><br>
            <a href="join.php">Don't have an account?</a>
        </form>
    </div>
    <script src="js/app.js"> </script>
    <script src="js/fontawesome-free-5.8.1-web/fontawesome-free-5.8.1-web/js/all.js"></script>
</body>
</html>
</main>
