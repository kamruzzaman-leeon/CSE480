<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>task 1</title>
</head>

<body>
    <?php
    for($var=2000;$var<=3000;$var++)
    {
        if($var%10==0 and $var%13==0)
        echo "$var"."<br>";
    }
    ?>
</body>

</html>