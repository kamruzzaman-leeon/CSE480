<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>task4</title>
</head>
<body>
    <?php
    
    $selection=array(14,33,27,10,35,19,42,44);
    echo 'before selection sort : ';
    foreach($selection as $var){
        echo $var. " ";
    }
    echo '<br>';
    $temp=0;
    $arlength=count($selection);
    for($var=0;$var<$arlength;$var++)
    {
        $min=$var;
        for($r=$var+1;$r<$arlength;$r++)
        {
            if($selection[$r]<$selection[$min])
            {
                $temp=$selection[$r];
                $selection[$r]=$selection[$min];
                $selection[$min]=$temp;

            }
        }
        
    }
    echo 'after selection sort : ';
    foreach($selection as $var){
        echo $var. " ";
    }
    ?>
</body>
</html>