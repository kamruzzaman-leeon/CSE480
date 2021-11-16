<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tast 6 palindrome</title>
</head>

<body>
    <form action="" method="post">
        <label for="palin">checking number: </label>
        <input type="number" name="palindrome">
        <button type="submit">Check</button>
    </form>
    <?php
      if($_POST)  
      {  
  
       $var=$num =$_POST['palindrome'];
       $re=0;
       while(floor($var))
       {
           $a= $var % 10;
           $re=$re*10+$a;
           
           $var= $var /10;
       }
       
       if($re==$num)
       {
            echo $num . " is palindrome". "<br>";
       }
        else{
            echo $num . " is not palindrome". " <br>";
        }
       
    }
    ?>
</body>

</html>