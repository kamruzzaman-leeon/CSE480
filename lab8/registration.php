<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Page</title>
  <style>
    .error {
      color: #FF0000;
    }
  </style>
</head>

<body>
  <?php
  $error=array();
  $idErr=$nameErr=$emailErr=$passwordErr=$confirmpassErr="";
  $id = $name = $email = $password = $confirmpass = $usertype = "";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //ID validation
    if (empty($_POST["id"])) {
      $idErr = "ID is required!";
      $error[]=$idErr;
    } else {
      $id = test_input($_POST["id"]);
      if (!preg_match("/^(\d){2}[\-](\d){5}[\-](\d){1}$/", $_POST["id"])) {
        $idErr = "Enter valid ID";
        $error[]=$idErr;
      }
    }


    //name validation
    if (empty($_POST["name"])) {
      $nameErr = "Name is required!";
      $error[]=$nameErr;
    } else {
      $name = test_input($_POST["name"]);

      if (!preg_match("/^[a-zA-Z ]{3,20}$/i", $name)) {
        $nameErr = "Username must be 3-20 character long";
        $error[]=$nameErr;
      }
    }

    //email validation
    if (empty($_POST["email"])) {
      $emailErr = "Email is required";
      $error[]=$emailErr;
    } else {
      $email = test_input($_POST["email"]);

      if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/", $email)) {
        $emailErr = "Invalid email.";
        $error[]=$emailErr;
      }
    }

    //password validation with recheck
    if (empty($_POST["password"])) {
      $passwordErr = "Password is required";
      $error[]=$passwordErr;
    } else {
      $password = test_input($_POST["password"]);
      if (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/", $_POST["password"])) {
        $passwordErr = "Minimum eight characters, at least one letter and one number!";
        $error[]=$passwordErr;
      }
    }

    if (empty($_POST["confirmpass"])) {
      $confirmpassErr = "Password is required";
      $error[]=$confirmpassErr;
    } else {
      $confirmpass = test_input($_POST["confirmpass"]);
      if ($password != $confirmpass) {
        $passwordErr=$confirmpassErr = "Password not matched";
        $error[]=$confirmpassErr;
      }
    }

    $usertype=test_input($_POST['usertype']);

    /*
    !empty($_POST["id"]) && !empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["confirmpass"]) && !empty($_POST["usertype"])
    */
    if (count($error)===0) {
      
      require('db.php');

      if (!$db) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
      }


      $sql = "INSERT INTO `user`(`id`, `name`, `password`, `email`, `usertype`) VALUES ('$id','$name','$password','$email','$usertype')";


      if (mysqli_query($db, $sql)) {
        header('location:login.php');
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


  <center>
    <div style="text-align:justify; width: 20%">
      <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        <fieldset>
          <legend>Registration Form</legend>
          <label for="id">ID</label><br>
          <input type="text" name="id" id="id">
          <span class="error">* <?php echo $idErr; ?></span>
          <br>


          <label for="password">Password</label><br>
          <input type="password" name="password" id="password">
          <span class="error">* <?php echo $passwordErr; ?></span>
          <br>

          <label for="confirmpass">Confirm Password</label><br>
          <input type="password" name="confirmpass" id="confirmpass">
          <span class="error">* <?php echo $confirmpassErr; ?></span>
          <br>

          <label for="name">name</label><br>
          <input type="text" name="name" id="name">
          <span class="error">* <?php echo $nameErr; ?></span>
          <br>

          <label for="email">Email</label><br>
          <input type="email" name="email" id="email"><br>
          <span class="error">* <?php echo $emailErr; ?></span>

          <label for="user">User type <i>[User/Admin]</i></label><br>
          <select name="usertype">
            <option value="User">User</option>
            <option value="Admin">Admin</option>
          </select>
          <hr>

          <input type="submit" name="submit" value="Register">
          <i><a href="login.php">login</a></i>

        </fieldset>

      </form>
    </div>
  </center>



</body>

</html>