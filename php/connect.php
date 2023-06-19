<?php

$servername = 'localhost';
$username = 'Nurs';
$pass = '12345';
$db = '_thisdb_';

$conn = mysqli_connect($servername,$username,$pass,$db);

  if(!$conn){
    echo "Database connection error".mysqli_connect_error();
  }
?>
