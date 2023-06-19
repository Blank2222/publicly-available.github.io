<?php

session_start();

include_once "connect.php";

function generateRandomString($length = 9) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }
    return $randomString;
}

$RandID = mysqli_real_escape_string($conn, generateRandomString());
$TestName = mysqli_real_escape_string($conn, $_POST['TestName']);
$TestJSON = mysqli_real_escape_string($conn, $_POST['TestJSON']);
$NumOfQuest = mysqli_real_escape_string($conn, $_POST['NumOfQuest']);


$query = "INSERT INTO questions VALUES ('$RandID','$TestName','$TestJSON','$NumOfQuest')";

$result = mysqli_query($conn, $query);

if($result)
{
    echo "Success!";
}
else
{
    echo ("Error!".mysqli_error($conn));
}


?>