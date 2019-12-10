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
        <link rel="stylesheet" href="css/post.css">
        <script src="js/script.js"></script>
    </head>
    <body>  

        <?php 
            require "connect.php";
        ?>
        <!--Recipe section title -->
        <div class="title">
            <h1 class=" title_name">Update Recipe</h1>
            <div class="title_underline"></div>
        </div>
        <!--end of recipe section-->
          <?php
            if (isset($_GET)){
                 $id = $_GET['id'];
            }                     
            if(isset($_POST['submit'])){
                $ingredient=$_POST['ingredient'];
                $recipe_title = $_POST['recipe_title'];
                $recipe_direction = $_POST['recipe_direction'];
                $recipe_preparation_time = $_POST['recipe_preparation_time'];
                $recipe_keywords = $_POST['recipe_keywords'];
               
                
                    $sql = "update recipe set title='$recipe_title', ingredients='$ingredient',direction='$recipe_direction',time='$recipe_preparation_time',keyword='$recipe_keywords' where id='$id'";

                    $res= mysqli_query($con,$sql) or die(mysqli_error($con));

                      if($res){
                            $errormessage = "Updated successfully";
                            echo '<script>alert("Successfully Updated!")</script>';
                           }
                           else {
                            $errormessage = "Couldnt update check:".mysqli_error($con);
                          }
                        }
        ?>
       <div class="post_recipe">
       <!-- Posting the recipe -->
            <?php
            if (isset($_GET)){
                $id = $_GET['id'];
           }    
            $sql = "SELECT * FROM recipe where id='$id'";
            $result = mysqli_query($con, $sql);
            $resultCheck = mysqli_num_rows($result);
            while($row = mysqli_fetch_assoc($result)){
            ?>
             <form action="" method="post" enctype="multipart/form-data" class="post">
                        <!-- Title -->
                        <label for="recipe_title">Title: </label>
                        <input id="recipe_title" type="text" name="recipe_title" value="<?php echo $row['title'];?>" required> 
                        <br><br>


                        <label for="recipe_add">Add The Ingedients: </label>
                        <!-- Ingredients -->
                        <div id="ingredients">
                            <div class="ingredients_each">
                            <textarea id="ingredients" name="ingredient" cols="100" rows="8"><?php echo $row["ingredient"];?></textarea>
                            </div>
                        </div>
                        <br><br>

                        <label for="recipe_direction">Direction: </label>
                        <textarea id="recipe_direction" name="recipe_direction" cols="100" rows="9"  required><?php echo $row['direction'];?></textarea>
                        <br><br>

                        <label for="recipe_preparation_time">Preparation Time: </label>
                        <input id="recipe_preparation_time" type="text" name="recipe_preparation_time"  value="<?php echo $row['time'];?>" required>
                        <br><br>

                        <label for="recipe_keywords">Keywords: </label>
                        <input id="recipe_keywords" type="text" name="recipe_keywords" value="<?php echo $row['keyword'];?>" required>
                        <br><br>

                        <input type="submit" name="submit" value="Update">
                    </form>
                </div> 
                <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
                <script type="text/javascript" src="js/scripts.js">
                </script>
           <?php
            }
        ?>   
         <script src="js/app.js"> </script>
    <script src="js/fontawesome-free-5.8.1-web/fontawesome-free-5.8.1-web/js/all.js"></script>  
    </body>
    </html>

 </main>

<?php
    require "footer.php";
?>