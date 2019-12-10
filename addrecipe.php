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
            <h1 class=" title_name">Add Recipes</h1>
            <div class="title_underline"></div>
        </div>
        <!--end of recipe section-->
        <?php
            if(isset($_POST['submit'])){
                $ingredient=$_POST['ingredient'];
                $recipe_title = $_POST['recipe_title'];
                $recipe_direction = $_POST['recipe_direction'];
                $recipe_preparation_time = $_POST['recipe_preparation_time'];
                $recipe_keywords = $_POST['recipe_keywords'];
                $recipe_ingredients = join('| ', $ingredient);
                $user_id = $_SESSION['userId'];
                //for image
                $target = "images_recipe/".basename($_FILES['recipe_image']['name']);
                $recipe_image = $_FILES['recipe_image']['name'];

                if(!empty($recipe_image)) {
                    $sql = "INSERT INTO recipe VALUES (Null,'$recipe_title','$recipe_ingredients','$recipe_direction','$recipe_preparation_time','$recipe_image',$user_id,now(),'$recipe_keywords')";

                    $res= mysqli_query($con,$sql) or die(mysqli_error($con));

                     if(move_uploaded_file($_FILES['recipe_image']['tmp_name'],$target)) {
                           if($res){
                            $errormessage = "Updated successfully";
                            echo '<script>alert("Successfully Inserted!")</script>';
                            header("Location: recipe.php");
                           }
                           else {
                            $errormessage = "Couldnt update check:".mysqli_error($con);
                          }
                    } else {
                         $errormessage = "Error in Image Insertion";
                    }
                } else {
                $errormessage = "Image is empty";
                }
             }
        ?>
       <div class="post_recipe">
       <!-- Posting the recipe -->
             <form action="" method="post" enctype="multipart/form-data" class="post">
                        <!-- Title -->
                        <label for="recipe_title">Title: </label>
                        <input id="recipe_title" type="text" name="recipe_title" placeholder="Choose A Title..." required> 
                        <br><br>

                        
                        <label for="recipe_add">Add The Ingedients: </label>
                        <!-- Ingredients -->
                        <div id="ingredients">
                            <div class="ingredients_each">
                                <input class="item" type="text" name="ingredient[]" placeholder="Item and Amount"  style="width:500px" required>
                                <button id="add_more" type="button">Add More</button>
                            </div>
                        </div>
                        <br><br>

                        <label for="recipe_direction">Direction: </label>
                        <br>
                        <textarea id="recipe_direction" name="recipe_direction" cols="100" rows="9" placeholder="Directions..." required></textarea>
                        <br><br>

                        <label for="recipe_image">Choose Image: </label>
                        <input id="recipe_image" type="file" name="recipe_image" required>
                        <br><br>

                        <label for="recipe_preparation_time">Preparation Time: </label>
                        <input id="recipe_preparation_time" type="text" name="recipe_preparation_time" placeholder="Preperation time...." required>
                        <br><br>

                        <label for="recipe_keywords">Keywords: </label>
                        <input id="recipe_keywords" type="text" name="recipe_keywords" placeholder="Keywords" required>
                        <br><br>

                        <input type="submit" name="submit" value="POST">
                    </form>
                </div> 
                <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
                <script type="text/javascript" src="js/scripts.js">
                </script>
                 <script src="js/app.js"> </script>
    <script src="js/fontawesome-free-5.8.1-web/fontawesome-free-5.8.1-web/js/all.js"></script>
    </body>
    </html>

 </main>

<?php
    require "footer.php";
?>