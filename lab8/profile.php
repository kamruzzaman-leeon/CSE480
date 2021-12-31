<center>
        <?php
        include('session.php');
        
        
        $sql = "SELECT * FROM user WHERE id='$userCheck'";
        if($result = mysqli_query($db, $sql)){
            if(mysqli_num_rows($result) > 0){
                echo "<table>";
                while($row = mysqli_fetch_array($result)){
                
                    echo "<tr>";
                    echo "<td colspan='2'>Profile</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>ID</td>"."<td>" . $row['id'] . "</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>NAME</td>"."<td>" . $row['name'] . "</td>";
                    echo "</tr>";

                    echo "<tr>";
                    echo "<td>EMAIL</td>"."<td>" . $row['email'] . "</td>";
                    echo "</tr>";

                    echo "<tr>";
                    echo "<td>USERTYPE </td>"."<td>" . $row['usertype'] . "</td>";
                    echo "</tr>";

                    echo "<tr><td colspan='2'>";
                    echo'<a href="javascript:history.go(-1)">Go Home</a>';
                    echo"</td></tr>";
                    
                }
               
                echo "</table>";
                mysqli_free_result($result);
            } else{
                echo "No records found.";
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
        }
        
        
        mysqli_close($db);
        ?>
        
    </center>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>
    <style>
        .d {
            border: 2px solid black;
            text-align: center;
            width: 33%;
        }
        table,tr,td{
            border: 2px solid black;
            border-collapse: collapse;
            text-align: center;
            padding: 10px 30px;

        }
     
    </style>
</head>

<body>


</body>

</html>