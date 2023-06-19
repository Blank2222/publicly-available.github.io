<?php
session_start();
include_once "connect.php";

class StudentAnswer {
    public $login;
    public $answers;
  
    function __construct($login, $answers) {
      $this->login = $login;
      $this->answers = $answers;
    }
  }

$TestCode = mysqli_real_escape_string($conn, $_POST['TestCode']);

$Logins = array();

$query1 = "SELECT s.Login FROM answers AS a INNER JOIN students AS s ON a.ID = s.ID";

$result1 = mysqli_query($conn, $query1);

$studentObjectsArray = array();

if($result1)
{
    if(mysqli_num_rows($result1)>0)
    {
        while($row1 = mysqli_fetch_assoc($result1))
        {
            if (!in_array($row1['Login'], $Logins))
            {
            array_push($Logins, $row1['Login']); 
            }  
        }

        foreach ($Logins as $Login)
        {
            $Login = mysqli_real_escape_string($conn, $Login);
            //a.ID, a.TestID, a.QuestionNo, a.Answer, s.Login, t.TestCode
            $query2 = "SELECT a.Answer FROM answers AS a                                            
            INNER JOIN students AS s ON a.ID = s.ID 
            INNER JOIN testopen AS t ON a.TestCode = t.TestCode
            WHERE t.TestCode='{$TestCode}' AND s.Login='{$Login}'
            ORDER BY a.QuestionNo";
        
            $result2 = mysqli_query($conn, $query2);
            
            $answers = array();

            if($result2)
            {
                if(mysqli_num_rows($result2)>0)
                {
                    while($row2 = mysqli_fetch_assoc($result2))
                    {
                        array_push($answers, $row2['Answer']);
                    }
                    $studAns = new StudentAnswer($Login, $answers);
                    array_push($studentObjectsArray, $studAns);
                }
                else
                {
                    echo "No answers yet";
                }
            }
            else
            {
                echo "Error!". mysqli_error($conn);
            }
        }
        
        echo (json_encode($studentObjectsArray));
    }
    else
    {
        echo "No answers yet";
    }
}
else
{
    echo "Error!". mysqli_error($conn);
}
?>