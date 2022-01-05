<?php

session_start();
setcookie('id', "", time() - 3600*24*30);
setcookie('password', "", time() - 3600*24*30);
 //send browser command remove sid from cookie
session_destroy();
 //remove sid-login from server storage
session_write_close();
header('Location: login.php');

?>