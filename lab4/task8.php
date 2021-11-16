<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>task8</title>
    <style>
    table,
    tr,
    td {
        border: 1px solid black;

        text-align: center;
        border-collapse: collapse;


    }

    td {
        width: 30px;
        height: 30px;
        background-color: white;

    }

    .blac {
        background-color: black;
    }

    /* .whi{
        background-color: white;
    } */
    </style>
</head>

<body>
    <center>
        <form action="" method="post">

            <tr>
                <td><label for="row"><b>row of chess</b></label></td>
                <td><input type="number" name="row" id="row" required></td>
            </tr>
            <tr>
                <td><label for="column"><b>Column of chess</b></label></td>
                <td><input type="number" name="column" id="column" required></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Submit"></td>
            </tr>



            <br>
            <br>



        </form>

        <?php
    // if(isset($_POST['Submit']))
    // {
    $row=$_POST['row'];
    $column=$_POST['column'];
    echo"<table>";
    for($var=1;$var<=$row;$var++)
    {
        echo"<tr>";
        for($rr=1;$rr<=$column;$rr++)
        {
           if($var%2!=0 and $rr%2==0){
                echo'<td class="blac"></td>';
                
           }

            elseif($var%2==0 and $rr%2!=0)
            {
                echo'<td class="blac"></td>';
                
            }
            else
                echo '<td></td>';
            
        }
        
        echo"</tr>";
    }
    echo"</table>";
    echo'<caption>chess of '.$row ." x ".$column."</caption>";
// }
    ?>
    </center>

</body>

</html>