<?php
include('db.php');
session_start();


if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $sessionUserId=mysqli_real_escape_string($db,$_POST['id']);
    $sessionPassword=mysqli_real_escape_string($db,$_POST['password']);
    
    if(isset($_POST['rememberme']))
    {
        setcookie("id",$sessionUserId,time()+3600*24*30);
        setcookie("password",$sessionPassword,time()+3600*24*30);

    }

    $sql="SELECT id from user Where id = '$sessionUserId' and password='$sessionPassword'";
    $result=mysqli_query($db,$sql);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    $active =$row['active'];
    
    if(mysqli_num_rows($result)>0){
        $_SESSION['loginUser']=$sessionUserId;
        $sql="SELECT usertype From User Where id='$sessionUserId' and password = '$sessionPassword'";
        $result = mysqli_query($db,$sql);
        $row = $result->fetch_assoc();

        if($row['usertype']=='Admin'){
            header("location:admin.php");
        }
        else{
            header("location:user.php");
        }
    }
    else{
        $error="Invalid User Id or password";
    }

}