<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>search</title>
</head>

<body>
    <?php
    
$conn = mysqli_connect("localhost", "root", "", "fall2020");
if ($conn === false)
{
    die("Could not connect. " . mysqli_connect_error());
}
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $find = mysqli_real_escape_string($conn, $_POST['search']);
    $sql = "SELECT * FROM user WHERE name='$find'";
    if ($result = mysqli_query($conn, $sql))
    {
        if (mysqli_num_rows($result) > 0)
        {
            echo "<table>";
            echo "<tr>";
            echo "<th>Name</th>";
            echo "<th>Email</th>";
            echo "<th>Password</th>";
            echo "<th>IP Address</th>";
            echo "<th>URL</th>";
            echo "<th>Age</th>";
            echo "<th>Gender</th>";
            echo "<th>Mobile</th>";
            echo "<th>brif</th>";
            echo "</tr>";
            while ($row = mysqli_fetch_array($result))
            {
                echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['password'] . "</td>";
                echo "<td>" . $row['ip'] . "</td>";
                echo "<td>" . $row['personalweb'] . "</td>";
                echo "<td>" . $row['age'] . "</td>";
                echo "<td>" . $row['gender'] . "</td>";
                echo "<td>" . $row['mobile'] . "</td>";
                echo "<td>" . $row['brif'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            mysqli_free_result($result);
        }
        else
        {
            echo "No records matching .";
        }
    }
}

mysqli_close($conn);
    ?>
    <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="POST">
        Name
        <input type="text" name="search" placeholder="Enter First Name">
        <button>Search</button>
    </form>
</body>

</html>