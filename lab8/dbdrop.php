<?php
include 'db.php';
$sql = 'DROP DATABASE lab8';
if(mysqli_query($db,$sql)){
    echo "<br>database was dropped sucessfully!<br>";
}
else{
    echo "sorry! $sql database dropped fail." . mysqli_error($db) ."<br>";
}
?>