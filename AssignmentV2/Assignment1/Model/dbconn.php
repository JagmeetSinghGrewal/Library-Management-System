<?php 
//connect to database
$mysqli = new mysqli('144.6.227.26:3306', 'jsgrewal', 'Waheguru1!','books195070');

//check whether database connection was successful
if(mysqli_connect_errno()){
    printf("Connect failed: %s\n",mysqli_connect_error());
    exit();
}
?>