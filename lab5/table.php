<?php
include "dbConn.php";
$db = "fall2020";
$conn = mysqli_connect($host, $user, $pass,$db);
$sql = "CREATE TABLE user(
  name VARCHAR(255) NOT NULL ,
  email VARCHAR(255) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  ip VARCHAR(255) NOT NULL DEFAULT '192.168.0.1',
  personalweb VARCHAR(255) NOT NULL,
  age INT  NOT NULL,
  gender VARCHAR(255) NOT NULL,
  mobile VARCHAR(255) NOT NULL,
  brif VARCHAR (500) NOT NULL
)";
if(mysqli_query($conn, $sql)){
  echo "Table created successfully.";
} else{
  echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}


?>
