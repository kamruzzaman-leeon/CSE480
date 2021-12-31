<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<center>
        <div style="text-align:justify; width: 33%">
            <form method="POST" action="loginbackend.php">

                <fieldset>
                   <legend>Login</legend>
                   <label for="id">User Id</label><br>
                   <input type="text" name="id" id="id"><br>

                   <label for="password">Password</label><br>
                   <input type="password" name="password" id="password">
                   <br>
                   <input type="checkbox" value="remember" name="rememberme">Remember Me
                   <hr>
        
                   <input type="submit" name="submit" value="Login">
                   
                    <i><a href="registration.php">Registration</a></i>
                </fieldset>

            </form>
        </div>
    </center>
</body>
</html>