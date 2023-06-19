<?php
    session_start();

    include_once "connect.php";

    $testCode = mysqli_real_escape_string($conn, $_POST['TestCode']);
    $testID = mysqli_real_escape_string($conn, $_POST['TestID']);

    //there is a slim chance that random code may be duplicated
    
    $query = "INSERT INTO testopen VALUES ('$testCode','$testID')";

    if(mysqli_query($conn,$query))
    {
        echo "Success!";
    }
    else
    {
        echo ("Error!".mysqli_error($conn));
    }
?>