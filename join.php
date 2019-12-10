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
            <title>Create an account</title>
            <link rel="stylesheet" href="Css/join.css">
        </head>
        <body>
            <div class="join_box">
             <h1>Create Account</h1>
             <?php
                    if (isset($_GET['error'])){
                        if ($_GET['error'] =="emptyfields") {
                            echo '<p class="joinerror" style="text-align:center; color:red; font-size:30px;">Fill in all Fields!</p>';
                        }
                    }
             ?>
              <?php
                    if (isset($_GET['error'])){
                        if ($_GET['error'] =="invalidEmailsuname") {
                            echo '<p class="joinerror" style="text-align:center; color:red; font-size:30px;">Please enter valid email/username!</p>';
                        }
                        elseif ($_GET['error'] =="invalidEmails") {
                            echo '<p class="joinerror" style="text-align:center; color:red; font-size:30px;">invalid Email!</p>';
                        }
                        else if ($_GET['error'] =="invaliduser") {
                            echo '<p class="joinerror" style="text-align:center; color:red; font-size:30px;">invalid username!</p>';
                        }
                        else if ($_GET['error'] =="passwordcheck") {
                            echo '<p class="joinerror" style="text-align:center; color:red; font-size:30px;">Password did not match!</p>';
                        } 
                        else if ($_GET['error'] =="Usertaken") {
                            echo '<p class="joinerror" style="text-align:center; color:red; font-size:30px;">Usertaken!</p>';
                        }       
                    }
             ?>
             <?php
                    if (isset($_GET['join'])){
                        if ($_GET['join'] =="SUCESS") {
                            echo '<p class="joinerror" style="text-align:center; color:red; font-size:30px;">Account Created!</p>';
                        }
                    }
             ?>
             <form action="includes/join.inc.php" method="POST">
                  <label for="firstname" class="form">FirstName</label><br>
                  <input type="text"  name="fname" placeholder="Firstname" class="join_detail" onfocus="this.value=''"><br>
                  <label for="lastname" class="form">Lastname</label><br>
                  <input type="text"  name="lname" placeholder="Lastname" class="join_detail" onfocus="this.value=''"><br>
                  <label for="username" class="form">Username</label><br>
                  <input type="text"  name="uname" placeholder="Username" class="join_detail" onfocus="this.value=''"><br>
                  <label for="Email" class="form">Email</label><br>
                  <input type="email" name="email" placeholder="Email" class="join_detail"><br>
                  <label for="Password" class="form">Password</label><br>
                  <input type="password" name="pass" placeholder="Password" class="join_detail" onfocus="this.value=''"><br>
                  <label for="repatPassword" class="form">Repeat Password</label><br>
                  <input type="password" name="repass" placeholder="Repeat Password" class="join_detail" onfocus="this.value=''"><br>
                  <input type="submit" value="Create" name="create">
            </form>
           </div>
           <script src="js/app.js"> </script>
    <script src="js/fontawesome-free-5.8.1-web/fontawesome-free-5.8.1-web/js/all.js"></script>
        </body>
    </html>
</main>
