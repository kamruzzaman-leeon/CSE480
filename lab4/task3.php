<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>task3</title>
    <style>

    </style>
</head>

<body>

    <?php
    $temp = array(78,60,62, 68, 71, 68, 73, 85, 66, 64, 76, 63, 75, 76, 73, 68, 62, 73, 72, 65,
    74, 62, 62, 65, 64, 68, 73, 75, 79, 73);
    $arrlength= count($temp);
    $sumtemp=0;
    foreach($temp as $var)
    {
        $sumtemp += $var;
    }
    $av= $sumtemp/$arrlength;
    echo "<b>Expected Output: </b><br>";
    echo "<strong>Average Temperature is: </strong>".$av ."<br>";
    $sd=0;
    $xi=0;
    foreach($temp as $var)
    {
        $xi +=pow(($var-$av),2);
    }
    $sd=sqrt($xi/$arrlength);
    echo "<b>Standard Deviation is: </b>". $sd ."<br>";
    echo "<b>Lowest Temperature: </b>".min($temp)."<br>";
    echo "<b>Highest Temperature: </b>".max($temp)."<br>";
    
    ?>
</body>

</html>