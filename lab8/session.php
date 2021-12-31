<?php
include("db.php");
session_start();
$userCheck=$_SESSION['loginUser'];
$sql="SELECT name FROM User WHERE id= '$userCheck'";
$sessionSql= mysqli_query($db,$sql);

$row=mysqli_fetch_array($sessionSql,MYSQLI_ASSOC);
$loginSession=$row['name'];
if(!isset($_SESSION['loginUser'])){
    header("location:login.php");
    die();
}