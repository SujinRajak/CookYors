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
        <link rel="stylesheet" href="css/view.css">    
    </head>
    <body>  
        <?php
                     if (isset($_SESSION['userUid'])) {
        ?>
        <?php 
            require "connect.php";
        ?>
        <!--Recipe section -->
        <div class="title">
            <h1 class=" title_name">Recipes Description</h1>
            <div class="title_underline"></div>
        </div>
        <!--end of recipe section-->
        
       <?php
            if (isset($_GET)){
                 $id = $_GET['id'];
                 $sql = "SELECT * FROM recipe WHERE id='$id'";
                 $res = mysqli_query($con,$sql);
            }                      
         ?> 
        <?php 
        if ($res){
                while($row = mysqli_fetch_array($res)){
        ?> 
       
        <div class ="view_article">

            <div class = "view_article_image">
            <img src="images_recipe/<?php echo $row['image']; ?>" style="width: 100%;" alt="Recipe Photo">
            </div>
            <div class = "view_article_content">
            <div class="view_article_content_ingredients">
                    <span style="font-weight: bold;color: #10274c;">Ingredients: </span><br>
<?php 

// '.$row['ingredients'].; 
$ing = explode('| ', $row['ingredient']);

echo '<span style="font-style: italic;">';

for($i = 0; $i < count($ing); $i++) 
{
    echo $ing[$i] . '<br>';
}

echo '</span>';


?>
            </div>
            <br>
            <div class="view_article_content_description">
                <span style="font-weight: bold;color: #10274c;display: block;border-bottom: 1px solid #f1f1f1;">Directions:</span> <?php echo $row['direction']; ?>
            </div>
        </div>
        <?php
                  }
             }
        ?>    
        <?php    
                    }
                    else{
                        header("Location:login.php");
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