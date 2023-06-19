<?php
session_start();
include_once "connect.php";

$TestCode = mysqli_real_escape_string($conn, $_POST['TestCode']);

$query = "SELECT q.TestName, q.TestJSON, q.NumOfQuest FROM questions AS q INNER JOIN testopen AS t ON q.TestID = t.TestID WHERE t.TestCode='$TestCode'";

$result = mysqli_query($conn, $query);

if($result)
{
    $row = mysqli_fetch_assoc($result);
    echo json_encode($row);
}
else
{
    echo "Error!". mysqli_error($conn);
}
?>