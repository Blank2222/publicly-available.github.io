<?php
    session_start();

    include_once "connect.php";

    $TestCode = mysqli_real_escape_string($conn, $_GET['TestCode']);

    $query = "SELECT t.TestCode, t.TestID, q.TestName, q.TestJSON, q.NumOfQuest FROM testopen AS t INNER JOIN questions AS q ON t.TestID=q.TestID WHERE t.TestCode = '$TestCode'";

    $result = mysqli_query($conn, $query);

    if($result)
    {
        $row = mysqli_fetch_assoc($result);     //since we surely know testcode exists (it is checked in previous page - joinquiz)

        echo JSON_encode($row);
    }
    else
    {
        echo "Error!". mysqli_error($conn);     //I quess it won't happen so I didn't write a case for it in js
    }
?>