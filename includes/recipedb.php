<?php
             $create_database = 'create table recipe (' .
            'id int auto_increment primary key,' .
            'title varchar(255) not null,' .
            'ingredient varchar(255) not null,' .
            'direction varchar(255) not null,' .
            'time time(6) not null,' .
            'image varchar(255) not null,' .
            'userid int not null,' .
            '`date` date not null,' .
            'keyword varchar(255) not null,' .
            'registerid int not null' .
            ');';
            $connection = mysqli_connect('localhost','root','','cookyors');
            if (mysqli_query($connection, $create_database)) 
             {
                echo $query . '<br>';
                echo 'Successfully created recipe database.';       
            }
             else 
            {
                echo $query . '<br>';
                echo mysqli_error($connection);
             }
        ?>