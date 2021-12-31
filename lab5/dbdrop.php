<?php
include 'dbConn.php';
$sql = 'DROP DATABASE fall2020';
if(mysqli_query($con,$sql)){
    echo "<br>database was dropped sucessfully!<br>";
}
else{
    echo "sorry! $sql database dropped fail." . mysqli_error($con) ."<br>";
}
?>