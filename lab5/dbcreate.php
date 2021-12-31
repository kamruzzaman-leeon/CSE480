<?php
include 'dbConn.php';
$sql = "CREATE DATABASE fall2020";
if(mysqli_query($con,$sql)){
    echo "hi! Database was created successfully.";
}
else{
    echo "sorry! $sql Database create fail." . mysqli_error($con);
}
?>