<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>task2</title>
    <style>
    
    td {
       
        width: 10px;
    }
    </style>
</head>

<body>
    <?php
    $s='*';
    // $w="\x20\x20\x20";
    echo "<table>";
        for($i=1;$i<=5;$i++)
        { 
            echo "<tr>";
            for($j=1;$j<=$i;$j++)
                echo "<td>","$s","</td>";
                
            echo "</tr>";
        }
        for($i=5;$i>=1;$i--)
        {
            echo "<tr>";
            for($j=5;$j>=1;$j--)
            {
                if($i<$j)
                    echo "<td>"," ","</td>";
                else
                    echo "<td>","$s","</td>";
            }
            echo "</tr>";

        }
    echo "</table>";
   


    ?>
</body>

</html>