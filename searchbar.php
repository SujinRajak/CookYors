<?php
    require "header.php";
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/searchbar.css">
    <title>Document</title>
</head>
<body>
    
    <?php
        require "connect.php";
    ?>
    <div class="search_div">
            <h1>Search For All Your Content Here</h1>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <input type="text" name="search" placeholder="Search dish,Keyword And Foods Here.." >
                <button type="submit" name="submit">search</button>
            </form>
    </div>
            <div class="result">
             
        <?php
                         if(isset($_POST['submit'])) {
                             $search = $_POST['search'];
                             $sql = "SELECT * FROM recipe where keyword like '%$search%'";
                             $res = mysqli_query($con,$sql);
                            if ($res){
                                   while($row = mysqli_fetch_array($res)){
                                
                    ?>     
                                <div class ="article">
                                    <a href="view.php?id=<?php echo $row['id']; ?>">
                                    <div class = "article_image">
                                      <img src="images_recipe/<?php echo $row['image']; ?>" style="width: 100%;" alt="Recipe Photo" class="ddimage">
                                    </div>
                                    <br>
                                    <div class = "article_content">
                                        
                                        <div class="article_content_name">
                                            <?php echo $row['title']; ?>
                                        </div>
                                        <br>
                                        <!-- <div class="article_content_posted_by">
                                            Posted By:  <?php 
                                               //  $u_Id = $row['idUsers']; 
                                                 //$u_name = ucfirst(mysqli_fetch_assoc(mysqli_query($con,"SELECT firstname FROM users WHERE idUsers='$u_Id'"))['firstname']).' '.ucfirst(mysqli_fetch_assoc(mysqli_query($con,"SELECT lastname FROM users WHERE idUsers='$u_Id'"))['lastname']);
                                                //echo '<span style="color: #555;font-weight: bold;">'.$u_name.'</span>';

                                            ?>
                                        </div> -->
                                        <br>
                                            <div class="article_content_description">
                                            <span style="font-weight: bold;color: #10274c;" class="ingtit">  Ingredients: </span><br>
                                                <?php 

                                                // '.$row['ingredients'].; 
                                                $ing = explode(', ', $row['ingredient']);

                                                echo '<span style="font-style: italic;">';

                                                for($i = 0; $i < count($ing); $i++) 
                                                {
                                                    echo $ing[$i] . '<br>';
                                                }

                                                echo '</span>';


                                                ?>
                
                                            </div>
                                        <br> 
                                        <div class="article_content_time">
                                            Time: <?php echo $row['time']; ?>
                                        </div>
                                        
                                    </div>
                                    </a>
                                    <hr>
                                </div>

                     <?php
                                    }
                            }
                        } 
                        else{


                        }                           
                      ?>  
            
            </div>
            
            <script src="js/app.js"> </script>
    <script src="js/fontawesome-free-5.8.1-web/fontawesome-free-5.8.1-web/js/all.js"></script>
</body>
</html>

<?php
    require "footer.php";
?>