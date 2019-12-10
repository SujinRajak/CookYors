<?php
     require 'header.php';
     
?>

<main>
    <!DOCTYPE html>
    <html lang="en">
    <head>
         <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/style.css">
    
    <script src="js/fontawesome-free-5.8.1-web/fontawesome-free-5.8.1-web/js/all.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <?php// print_r($_SESSION); ?>
                    <table class="table table-stripped">
                        <thead>
                            <tr>
                                    <?php
                                    require 'connect.php';
                                    $email = $_SESSION['userUid'];
                                    $sql = "SELECT * FROM users WHERE uidUsers='$email';";
                                    $result = mysqli_query($con, $sql);
                                    $resultCheck = mysqli_num_rows($result);
                                    while($row = mysqli_fetch_assoc($result)){
                                            echo "<tr>";
                                            echo "<input type='hidden' name='userId' value=".$row['idUsers']." id='userId'>";
                                            echo "<input type='hidden' name='userUid' value=".$row['uidUsers']." id='userUid'>";
                                            echo "<td>".$row['firstname'].$row['lastname']."</td>";
                                            echo "</tr>";
                                        }  
                                    ?>
                            </tr>
                            <tr style="margin-top:40px;">
                                    <th>Available Users</th>
                            </tr>
                        </thead>
                        <tbody>
                                    <?php
                                    require 'connect.php';
                                    $email = $_SESSION['userUid'];
                                    $sql = "SELECT * FROM users WHERE uidUsers!='$email';";
                                    $result = mysqli_query($con, $sql);
                                    while($row =mysqli_fetch_assoc($result)){
                                        echo "<tr>";
                                        echo "<td>".$row['firstname'].$row['lastname']."</td>";
                                        echo "<td> <span> <i class='fa fa-globe' aria-hidden='true'></i></span> </td>";
                                        echo "</tr>";
                                        
                                    }
                                    ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-8">
                    <div id="messages">
                        <table id="chats" class="table table-striped">
                            <thead>
                                <tr>
                                    <th colspan="4" scope="col"><strong>chat room</
                                    strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>

                    <form id="chat-room-frm" method="post" action="">
                        <div class="form-group">
                            <textarea class="form-control" id="msg" name="msg"
                            placeholder="enter message" style="height:20vh;"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="button" value="send" class="btn btn-success btn-block" id="send" name="send">
                        </div>
                    </form>
                </div>
            </div>
        </div>
       
        
          
       <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    </body>
    <script type="text/javascript">
            $(document).ready(function(){
                var conn = new WebSocket('ws://localhost:8080');
                conn.onopen = function(e) {
                    console.log("Connection established!");
                };

                conn.onmessage = function(e) {
                    console.log(e.data);
                    var data=JSON.parse(e.data);
                    var row='<tr><td valign="top"><div><strong>'+ data.userUid +'</strong></div><div>'+data.msg+'</div><td align="right" valign="top"></td></tr>';
                    $('#chats > tbody').append(row);
                };
                
                $("#send").click(function(){
                    var userId =$("#userId").val();
                    var userUid =$("#userUid").val();
                    var msg    =$("#msg").val();
                    var data ={
                        userId : userId,
                        userUid : userUid,
                        msg : msg
                    };
                    conn.send(JSON.stringify(data));
                })
            })
            </script>
             <script src="js/app.js"> </script>
    <script src="js/fontawesome-free-5.8.1-web/fontawesome-free-5.8.1-web/js/all.js"></script>
    </html>
</main>

<?php
    require 'footer.php';
?>
