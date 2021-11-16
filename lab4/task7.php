<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>task7</title>
</head>
<body>
<?php
function randompassword($uppercase, $lowercase, $numeric, $other) { 
    
    $pass = array(); 
    $password = ''; 

    for ($var = 0; $var < $uppercase; $var++) { 
        $pass[] = chr(rand(65, 90)); 
    } 
    for ($var = 0; $var < $lowercase; $var++) { 
        $pass[] = chr(rand(97, 122)); 
    } 
    for ($var = 0; $var < $numeric; $var++) { 
        $pass[] = chr(rand(48, 57)); 
    } 
    for ($var = 0; $var < $other; $var++) { 
        $pass[] = chr(rand(33, 47)); 
    } 

    shuffle( $pass); 
    foreach ($pass as $pin) { 
        $password .= $pin; 
    }
    
    return $password; 
}
$Gpass=randompassword(rand(2,4),rand(3,5),rand(2,3),rand(1,5));
echo "generated password is: '".$Gpass."'";
?>
</body>
</html>