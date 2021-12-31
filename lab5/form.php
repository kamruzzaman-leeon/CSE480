<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form of lab5</title>
    <style>
        .error {
            color: #FF0000;
        }
    </style>
</head>

<body>

    <?php

    //define variables and set to empty values;
    $nameErr = $emailErr = $passwordErr = $ipErr = $personalwebErr = $birthdateErr = $genderErr = $mobileErr = $brifErr = "";
    $name = $email = $password = $ip = $personalweb = $birthdate = $gender = $mobile = $brif = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "Name is required!";
        } else {
            $name = testInput($_POST["name"]);
            $regex_name = "/^[a-zA-Z ]{4,25}$/i";
            if (!preg_match($regex_name, $name)) {
                $nameErr = "Username must be 4-25 chars long";
            }
            if (!preg_match("/^[A-Za-z]+[ ]?([A-Za-z]+[ ]?)*$/", $name)) {
                $nameErr = "multiple space not allowed";
            }
        }
        if (empty($_POST["email"])) {
            $emailErr = "Email is required!";
        } else {
            $email = testInput($_POST["email"]);
            $regex_mail = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
            if (!preg_match($regex_mail, $email)) {
                $emailErr = "Invalid email!";
            }
        }

        if (empty($_POST["password"])) {

            $passwordErr = "password is required!";
        } else {
            $password = testInput($_POST["password"]);
            $regex_password = "/^[a-zA-Z0-9]{8,20}$/i";
            if (!preg_match($regex_password, $password)) {
                $passwordErr = "Please password between 8 to 20 character length and no special characters are allowed";
            } else {

                if (!preg_match("/[a-z]+/", $password)) {
                    $passwordErr = "Must contain a Lowercase.";
                }
                if (!preg_match("/[A-Z]/", $password)) {
                    $passwordErr = "Must contain an Uppercase";
                }
                if (!preg_match("/[0-9]+/", $password)) {
                    $passwordErr = "Must contain One number";
                }
            }
        }

        if (empty($_POST["ip"])) {
            $ipErr = "IP address is required!";
        } else {
            $ip = testInput($_POST["ip"]);
            if (!filter_var($ip, FILTER_VALIDATE_IP)) {
                $ipErr = "Not a valid IP address!";
            }
        }

        if (empty($_POST["personalweb"])) {
            $personalwebErr = "URL is required";
        } else {
            $personalweb = testInput($_POST["personalweb"]);
            if (!filter_var($personalweb, FILTER_VALIDATE_URL)) {
                $personalwebErr = "not a a valid URL";
            }
        }
        if (empty($_POST["birthdate"])) {
            $dateErr = "date is required!";
        } else {
            $date = $_POST["birthdate"];

            $dateOfbirth = new DateTime($date);
            $now = new DateTime();

            $difference = $now->diff($dateOfbirth);

            $age = $difference->y;

            $date = $age;
        }
        if (empty($_POST["gender"])) {
            $genderErr = "Gender is required!";
        } else {
            $gender = testInput($_POST["gender"]);
        }

        if (empty($_POST["mobile"])) {
            $mobileErr = "not a valid Bangladeshi number!";
        } else {
            $mobile = testInput($_POST["mobile"]);
            if (!preg_match("/^\+?(88)?0?1[3|6|7|8|9][0-9]{8}/", $mobile)) {
                $mobileErr = "Enter valid phone number";
            } else {
            }
        }



        if (empty($_POST["brif"])) {
            $brifErr = "Please give some information!";
        } else {
            $brif = testInput($_POST['brif']);
            if (str_word_count($brif) > 15) {
                $brifErr = "Enter info between 15 words";
            } else {
                $brif = offensiveword($_POST["brif"]);
            }
        }

        if (!empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["ip"]) && !empty($_POST["personalweb"]) && !empty($_POST["birthdate"]) && !empty($_POST["gender"]) && !empty($_POST["mobile"]) && !empty($_POST["brif"])) {
            $conn = mysqli_connect("localhost", "root", "", "fall2020");

            $sql = "INSERT INTO user VALUES ('$name', '$email', '$password', '$ip', '$personalweb', '$age', '$gender', '$mobile', '$brif')";

            if (mysqli_query($conn, $sql)) {
                echo "Records inserted successfully.";
            } else {
                echo "Could not able to execute $sql. " . mysqli_error($conn);
            }
        }
    }


    function testInput($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function offensiveword($data)
    {
        $offensive = array(
            "damn",
            "kill",
            "liar",
            "death"
        );
        $replaceVal = array(
            "****",
            "****",
            "****",
            "*****"
        );
        $data = str_replace($offensive, $replaceVal, $data);
        return $data;
    }

    ?>


    <center>
        <h1>Form Validation</h1>
        <p><span class="error">* required field.</span></p>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <table>
                <tr>
                    <td>Name:</td>
                    <td>
                        <input type="text" name="name" id="name">
                        <span class="error">*<?php echo $nameErr; ?></span>
                    </td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td>
                        <input type="text" name="email" id="email">
                        <span class="error">*<?php echo $emailErr; ?></span>
                    </td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td>
                        <input type="password" name="password" id="password">
                        <span class="error">*<?php echo $passwordErr; ?></span>
                    </td>
                </tr>
                <tr>
                    <td>IP address:</td>
                    <td>
                        <input type="text" name="ip" id="ip">
                        <span class="error">*<?php echo $ipErr; ?></span>
                    </td>
                </tr>
                <tr>
                    <td>Personal Web URL:</td>
                    <td>
                        <input type="text" name="personalweb" id="personalweb">
                        <span class="error">*<?php echo $personalwebErr; ?></span>
                    </td>
                </tr>
                <tr>
                    <td>Date of birth:</td>
                    <td>
                        <input type="date" name="birthdate" id="birthdate">
                        <span class="error">*<?php echo $birthdateErr; ?></span>
                    </td>
                </tr>
                <tr>
                    <td>Gender:</td>
                    <td>
                        <input type="radio" name="gender" value="female">Female
                        <input type="radio" name="gender" value="male">Male
                        <span class="error">*<?php echo $genderErr; ?></span>
                    </td>
                </tr>
                <tr>
                    <td>Mobile Number:</td>
                    <td>
                        <input type="text" name="mobile" id="mobile">
                        <span class="error">*<?php echo $mobileErr; ?></span>
                    </td>
                </tr>
                <tr>
                    <td>Brif info(use text area):</td>
                    <td>
                        <input type="text" name="brif" id="brif">
                        <span class="error">*<?php echo $brifErr; ?></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <center><input type="submit" name="submit" value="Register"></center>
                    </td>
                </tr>
            </table>
        </form>
    </center>
</body>

</html>