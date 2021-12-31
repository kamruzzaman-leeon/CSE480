<center>
<?php

include('session.php');

$sql = "SELECT * FROM user";
if ($result = mysqli_query($db, $sql)) {
    if (mysqli_num_rows($result) > 0) {

        echo "<table>";
        echo "<tr>";
        echo "<td colspan='4'>Users</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>NAME</th>";
        echo "<th>EMAIL</th>";
        echo "<th>USER TYPES</th>";
        echo "</tr>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['usertype'] . "</td>";
            echo "</tr>";
        }
        echo "<tr><td colspan='4'class='foot'>";
        echo '<a href="javascript:history.go(-1)">Go Home</a>';
        echo "</td></tr>";
        echo "</table>";

        mysqli_free_result($result);
    } else {
        echo "No records matching your query were found.";
    }
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}


// Close connection
mysqli_close($db);
?>
</center>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User view</title>
</head>
<style>
    table,
    tr,
    th,
    td {
        border: 2px solid black;
        border-collapse: collapse;
        text-align: center;
        padding: 5px 10px;
    }
    .foot{
        text-align: right;
    }
</style>

<body>
    
</body>

</html>