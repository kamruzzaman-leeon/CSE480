<?php
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db='fall2020';
    $con = mysqli_connect($host,$user,$pass);
    if(!$con){
        die("eorror to connect.please check the db connection info ". mysqli_connect_error());
        
    }
    else{
        echo "successfully database connected!<br>";
    }
?>