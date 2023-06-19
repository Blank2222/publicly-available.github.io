<?php

session_start();

include_once "connect.php";


function RandomID()
    {
        $characters = '0123456789';
        $randID = '';
        for ($i = 0; $i < 12; $i++) {
            $randID .= $characters[rand(0, strlen($characters))];
        }
        return $randID;
    }

$ID = mysqli_real_escape_string($conn, RandomID());
$Login = mysqli_real_escape_string($conn, $_POST['Login']);
$Password = mysqli_real_escape_string($conn, $_POST['Password']);

$query = "INSERT INTO students VALUES ('$ID', '$Login', '$Password')";

if(mysqli_query($conn,$query))
{
    echo "Success!";
}
else
{
    echo ("Error!".mysqli_error($conn));
}

?>