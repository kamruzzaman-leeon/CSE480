<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retrieve</title>
    <style>
        table,tr,th,td{
            border:2px solid black;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
<?php
$conn = mysqli_connect("localhost", "root", "", "fall2020");
if (!$conn)
{
    die("Could not connect. " . mysqli_connect_error());
}

$sql = "SELECT * FROM user ORDER BY 'name' ASC";
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

    }
    else
    {
        echo "No records matching your query were found.";
    }
}
else
{
    echo "Could not execute $sql. " . mysqli_error($conn);
}

?>

</body>

</html>