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
        <link rel="stylesheet" href="css/about.css">
    </head>
    <body>
             <!--info section -->
        <div class="title">
            <h1 class=" title_name">About Us</h1>
            <div class="title_underline"></div>
        </div>

        <div class="about-image">
            <img src="images/food5.jpg" height="500">
        </div>
        <div class="about-text container">
            <p>



            </p>
        </div>

         <div class="title">
            <h1 class=" title_name">Contact Us</h1>
            <div class="title_underline"></div>
        </div>

        <div class="contact container">
            <form>
                  <div class="form-group">
                    <label for="Fullname">Full Name</label>
                    <input type="email" class="form-control" id="FullName" aria-describedby="fullname" placeholder="Enter Full Name">

                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                  </div>
                  <div class="form-group">
                    <label for="message">Enter Your Message</label>
                    <textarea class="form-control" id="message" rows="3"></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
        </div>
         <script src="js/app.js"> </script>
    <script src="js/fontawesome-free-5.8.1-web/fontawesome-free-5.8.1-web/js/all.js"></script>
    </body>
    </html>

</main>

<?php
    require "footer.php";
?>