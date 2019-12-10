<?php
    require "header.php";
    
?>

<main>
   <!DOCTYPE html>
   <html lang="en">
   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <meta http-equiv="X-UA-Compatible" content="ie=edge">
       <title>www.cookyors.com</title>
       <link rel="stylesheet" href="css/profile.css">
   </head>
   <body>
       
    <?php
    require "connect.php";
    ?>
    <section class="profile">
    <script type='text/javascript'>
        function preview_image(event) {
            var reader = new FileReader();
            reader.onload = function () {
                var output = document.getElementById('output_image');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
    <div class="cover">
        <img src="images\glasses-coffee-drink-brown-cup-ribbon-578939-wallhere.com.jpg" alt="">
    </div>
                <form class="update-details" action="update.inc.php" method="POST" enctype="multipart/form-data">
                    
                    <?php

                            $email = $_SESSION['userUid'];
                            $sql = "SELECT * FROM users WHERE uidUsers='$email';";
                            $result = mysqli_query($con, $sql);
                            $resultCheck = mysqli_num_rows($result);
                            while($row = mysqli_fetch_assoc($result)){
                    ?>
                
                    <div class="img">
                        <img id="output_image" src="<?php echo $row["img"];?>" height="200px" width="200px"><br>
                        <label for="image">Change Image</label>
                        <input type="file" name="image" id="image" accept="image/*" onchange="preview_image(event)">
                    </div>
                    <div class="just"><h2>Profile</h2></div><br><br><br>
                    <div class="actual-form">
                        <label for="fname">FIRST NAME</label>
                        <div><input type="text" id="fname" name="fname" value="<?php echo $row["firstname"];?>"></div>
                        <label for="lname">LAST NAME</label>
                        <div><input type="text" id="lname" name="lname" value="<?php echo $row["lastname"];?>"></div>
                        <label for="email">EMAIL</label>
                        <div><input type="text" id="email" name="email" value="<?php echo $row["emailUsers"];?>"></div>
                       <label for="gernder">Gender</label><br>
                        <input type="radio" name="gender" id="gender" value="male" <?php if($row['sex']==='male') echo 'checked';?>><label for="male">Male</label>
                        <input type="radio" name="gender" id="gender" value="female" <?php if($row['sex']==='female') echo 'checked';?>><label for="fmale">Female</label>
                        <input type="radio" name="gender" id="gender" value="others" <?php if($row['sex']==='others') echo 'checked';?>><label for="others">Others</label>
                        <br>
                        <label for="age">Age</label>
                        <div><input type="text" id="age" name="age" value="<?php echo $row["age"];?>"></div>
                        <label for="profession">Profession</label><br>
                        <select name="profession" id="profession">
                            <option value=""<?php if($row['profession']==='') echo 'selected';?>></option>
                            <option value="chef"<?php if($row['profession']==='chef') echo 'selected';?> >Chef</option>
                            <option value="section cook"<?php if($row['profession']==='section cook') echo 'selected';?>>Section Cook</option>
                            <option value="pastry"<?php if($row['profession']==='pastry') echo 'selected';?>>Pastry Chef</option>
                            <option value="cook"<?php if($row['profession']==='cook') echo 'selected';?>>Cook</option>
                            <option value="junior cook"<?php if($row['profession']==='junior cook') echo 'selected';?>>Junior Cook</option>
                        </select> <br>
                        <label for="bio">Biography </label>
                        <textarea id="bio" name="biography" cols="40" rows="8"><?php echo $row["biography"];?></textarea>
                        <br><br>
                        <div><button type="submit" name="submit" class="update">Update Profile</button></div>
                    </div>
                    <?php 
                    }
                    ?>
                </form>

                
                    <div class="form-popup">
                    <div id="myForm">
                        <h3>Change Password</h3><br>
                        <form class="form-container" action="changepwd.inc.php" method="POST">
                            <div class="change">
                                <label for="oldpwd">CURRENT PASSWORD</label>
                                <div><input type="password" id="oldpwd" name="oldpwd" required></div>
                                <label for="pwd">NEW PASSWORD</label>
                                <div><input type="password" id="pwd" name="pwd" required></div>
                                <label for="cpwd">CONFIRM NEW PASSWORD</label>
                                <div><input type="password" id="cpwd" name="cpwd" required></div><br>
                                <div><button type="submit" name="submit" class="chpwd">Change Password</button></div>
                                
                            </div>
                        </form>
                    </div><br><br>
                    </div>
                   
              
               

                <div class="recipe-item">
                <h2 class="posted">Recipe Posted</h2><br>
                <div class="content">
                <table class="dec-table">
                    <tr class="crows">
                        <th>Recipe ID</th>
                        <th>Posted Recipe</th>
                        <th>Action</th>
                    </tr>
                   
                   <?php
                    require 'connect.php';
                    $uid=$_SESSION['userId'];
                    $sql = "SELECT * FROM recipe where userId='$uid'";
                    $result = mysqli_query($con, $sql);
                    $resultCheck = mysqli_num_rows($result);
                    while($row = mysqli_fetch_assoc($result)){
                    ?>
                        <tr class="rows">
                            <td><?php echo $row["id"];?></td> 
                            <td><?php echo $row["title"];?></td>
                            <td><a href="updaterecipe.php?id=<?php echo $row['id'];?>">UPDATE</a>|<a href="delete.inc.php?id=<?php echo $row['id']; ?>">DELETE</a></td>
                        </tr>
                    <?php 
                    } 
                    ?>
                </table>
            </div>
        </div>
        
        </section>
        <script src="js/app.js"> </script>
    <script src="js/fontawesome-free-5.8.1-web/fontawesome-free-5.8.1-web/js/all.js"></script>
   </body>
   </html>
   
   
</main>



<?php
    require "footer.php";
?>