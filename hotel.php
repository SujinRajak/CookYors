<?php
    require("header.php");   
?>

<main>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=sa, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>www.cookyors.com</title>
        <link rel="stylesheet" href="css/hotel.css">
    </head>
    <body>
        <!--Map section -->
        <div class="title">
            <h1 class=" title_name">Hotel/Restaurants Finder</h1>
            <div class="title_underline"></div>
        </div>
        <!--search-bar-->
        <div class="searchbar"> 
            <form action="" method="post">
        
                <input name="location" id="location" placeholder="Enter your location..." required autofocus>
                <button type="submit" name="submit">search</button>
            </form>
        </div>
    <div class="map">
    <?php
        if(isset($_POST['submit'])) {
            $location = $_POST['location'];
    ?>
        <div class="mapouter">
            <div class="gmap_canvas">
            <iframe width="100%" height="520" id="gmap_canvas" src="https://maps.google.com/maps?q=resturent and hotel near <?php echo $location;?>&t=&z=15&ie=UTF8&iwloc=&output=embed"  frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
            </div>
        </div>
    <?php
        }
    ?>
    </div>   
    <script src="js/app.js"> </script>
    <script src="js/fontawesome-free-5.8.1-web/fontawesome-free-5.8.1-web/js/all.js"></script>
    </body>
    </html>
</main>

<?php
    require("footer.php");   
?>
