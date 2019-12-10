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
        <link rel="stylesheet" href="css/recipe.css">    
    </head>
    <body>  
        <?php 
            require "connect.php";
        ?>
        <!--Recipe section -->
        <div class="title">
            <h1 class=" title_name">Recipes</h1>
            <div class="title_underline"></div>
        </div>
        <!--end of recipe section-->
                <div class="add-recipe">
            <a id="add-recipe" class="btn btn-info btn-lg add-recipe-btn" name="logout" href="addrecipe.php">Add Recipe</a>
        </div>
        
        <div class="container">
            <div class="row">
        <?php
                                $sql = "SELECT * FROM recipe ORDER by id desc";
                                $res = mysqli_query($con,$sql);
                                if ($res){
                                    while($row = mysqli_fetch_array($res)){
                            ?> 

                            <div class="col-6 col-md-4">
                                <div class ="article">
                                    <a href="view.php?id=<?php echo $row['id']; ?>">
                                    <div class = "article_image">
                                      <img src="images_recipe/<?php echo $row['image']; ?>" style="width: 100%;" alt="Recipe Photo" class="ddimage" height="350">
                                      <i class="fas fa-search icon" ></i>
                                    </div>
                                  <br>
                                    <div class = "article_content">
                                        
                                        <div class="article_content_name">
                                            <?php echo $row['title']; ?>
                                        </div>
                                       <br>
                                        <div class="article_content_posted_by">
                                        <a href="viewprofile.php?id=<?php echo $row['id']; ?>">
                                          Posted By: <?php 
                                                $u_Id = $row['userid']; 
                                                $u_name = ucfirst(mysqli_fetch_assoc(mysqli_query($con,"SELECT firstname FROM users WHERE idUsers='$u_Id'"))['firstname']).' '.ucfirst(mysqli_fetch_assoc(mysqli_query($con,"SELECT lastname FROM users WHERE idUsers='$u_Id'"))['lastname']);
                                                echo '<span style="color: #555;font-weight: bold;">'.$u_name.'</span>';
                                                 ?>
                                        </a>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    </a>
                                </div></div> 
                            <?php
                                    }
                                }
                            ?>   
                            
                        </div>
                    </div>

                                    <hr>


                </div>


                <script src="js/app.js"> </script>
    <script src="js/fontawesome-free-5.8.1-web/fontawesome-free-5.8.1-web/js/all.js"></script>
    </body>
    </html>

 </main>

<?php
    require "footer.php";
?>