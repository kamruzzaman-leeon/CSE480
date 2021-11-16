<!DOCTYPE html>
<html lavarg="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>task5</title>
</head>
<body>
<?php
        $var = 10;
        for($i=1; $i<=$var; $i++){
            if($i%2 == 0){
                echo "-$i";
            }
            else if($i!=1){
                echo "_$i";
            }
            else{
                echo $i;
            }
        }
    ?>
</body>
</html>