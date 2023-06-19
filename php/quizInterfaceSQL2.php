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

    $ID = mysqli_real_escape_string($conn, $_POST['ID']);
    $TestCode = mysqli_real_escape_string($conn, $_POST['TestCode']);
    $QuestionNo = mysqli_real_escape_string($conn, $_POST['QuestionNo']);
    $Answer = mysqli_real_escape_string($conn, $_POST['Answer']);
    $Date = mysqli_real_escape_string($conn, date("Y.m.d"));
    $PrimaryKeyID = generateRandomString(63);

    $query = "INSERT INTO answers VALUES ('$ID','$TestCode','$QuestionNo','$Answer','$Date', '$PrimaryKeyID')";

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