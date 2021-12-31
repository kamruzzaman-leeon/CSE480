<?php

include('session.php');
$cpassword = $npassword = $rpassword = "";
$cpasswordErr = $npasswordErr = $rpasswordErr = "";
$error=array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $cpassword = test_input($_POST["cpassword"]);
    $sql = "SELECT password FROM user WHERE id='$userCheck'";
    $result = mysqli_query($db, $sql);
    $row=mysqli_fetch_array($result);
    if ($cpassword != $row["password"]) {
        $cpasswordErr = "Password not correct.";
        $error[] = $cpasswordErr;
    }

    if (empty($_POST["npassword"])) {
        $npasswordErr = "Password is required";
        $error[] = $npasswordErr;
    } else {
        $npassword = test_input($_POST["npassword"]);
        if (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/", $_POST["npassword"])) {
            $npasswordErr = "Minimum eight characters, at least one letter and one number!";
            $error[] = $npasswordErr;
        }
    }

    if (empty($_POST["rpassword"])) {
        $rpasswordErr = "Password is required";
        $error[] = $rpasswordErr;
    } else {
        $rpassword = test_input($_POST["rpassword"]);
        if ($npassword != $rpassword) {
            $npasswordErr = $rpasswordErr = "Password not matched";
            $error[] = $rpasswordErr;
        }
    }




    if (count($error) === 0) {


        $sql = "UPDATE `user` SET `password`= '$npassword' WHERE id='$userCheck'";


        if (mysqli_query($db, $sql)) {
            echo "<center>Sucessfully password update.<br><center>";
        } else {
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
        }

        mysqli_close($db);
    }
}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change password</title>
    <style>
        .error {
            color: #ff0000;
        }

        .d {
            width: max-content;
            text-align: left;
        }
    </style>
</head>

<body>
    <center>
        <div class="d">
            <form action="" method="POST">
                <fieldset>
                    <legend>
                        Change password
                    </legend>
                    <label for="cpassword">Current Password</label><br>
                    <input type="password" name="cpassword" id="cpassword"><br>
                    <span class="error"> <?php echo $cpasswordErr; ?></span><br>

                    <label for="npassword">New Password</label><br>
                    <input type="password" name="npassword" id="npassword"><br>
                    <span class="error"> <?php echo $npasswordErr; ?></span><br>

                    <label for="rpassword">Retype Password</label><br>
                    <input type="password" name="rpassword" id="rpassword"><br>
                    <span class="error"> <?php echo $rpasswordErr; ?></span><br>
                    <hr>

                    <input type="submit" name="change" value="Change">
                    <i><a href="javascript:history.go(-1)">Go Home</a></i>
                </fieldset>
            </form>
        </div>

    </center>
</body>

</html>