<?php
   include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User's home page</title>
    <style>
        .d{
            border: 2px solid black;
            text-align:center;
        }
    </style>
</head>
<body>

    <center>
        <div class="d" style=" width: 33%">

        <h1>Welcome <?php echo $loginSession."!" ?> </h1>
        <a href="profile.php">Profile</a><br>
        <a href="changePass.php">Change Password</a><br>
        <a href="logout.php">Logout</a><br>

            
        </div>
    </center>
</body>
</html>