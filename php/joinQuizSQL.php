<?php
    session_start();

    include_once "connect.php";
    
    $testCode = mysqli_real_escape_string($conn, $_GET['TestCode']);

    $query = "SELECT TestCode FROM testopen WHERE TestCode='$testCode'";

    $result = mysqli_query($conn, $query);

    $row = mysqli_fetch_assoc($result);

    if ($result)
    {
        if(mysqli_num_rows($result)>0)
        {
            echo '1';   //if code is found
        }
        else
        {
            echo '2';   //if code isn't found
        }
    }
    else
    {
        echo "Error!". mysqli_error($conn);
    }
?>