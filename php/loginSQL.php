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


$Login = mysqli_real_escape_string($conn, $_POST['Login']);
$Password = mysqli_real_escape_string($conn, $_POST['Password']);
$Table = mysqli_real_escape_string($conn, $_POST['Table']);


$query = "SELECT ID, Login, Password FROM $Table WHERE Login='{$Login}'";       //table not in the parentheses

$result = mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($result);     //create an associative array

if($result)
{
    if(mysqli_num_rows($result)>0)
    {
        if($row["Password"]==$Password)
        {
            $_SESSION['uniqueID'] = $row["ID"];
            $_SESSION['login'] = $row["Login"];
            echo "Success!";
        }
        else
        {
            echo "Password is incorrect";
        }
    }
    else
    {
        echo "The login doesn't exist";
    }
}
else
{
    echo "Error!". mysqli_error($conn);
}

?>