<?php
session_start();
if (!isset($_SESSION['uniqueID']))
{
    header("location: index.php");
}
?>

<?php include_once "header.php"; ?>
    </head>
    <body class="d-flex align-items-center flex-column">
        <?php include_once "profileBar.php"; ?>
        
        <div class="container-md text-center rounded w-100 txtResponsive" style="min-height: 90vh; background-color: #084C61;">        

        <?php
            include_once "php/connect.php";
        
            $ID = mysqli_real_escape_string($conn, $_GET['ID']);
            $TestCode = mysqli_real_escape_string($conn, $_GET['TestCode']);
            $arrayTestResults = array();

            $query1 = "SELECT t.TestCode, t.TestID, a.ID, a.QuestionNo, a.Answer FROM testopen AS t INNER JOIN answers AS a ON t.TestCode=a.TestCode WHERE a.ID = '$ID' AND t.TestCode = '$TestCode' ORDER BY a.QuestionNo ASC";
            $result1 = mysqli_query($conn, $query1);
            if ($result1)
            {
                while($row1 = mysqli_fetch_assoc($result1))
                {
                    array_push($arrayTestResults, $row1['Answer']);         //since it is already ordered by ascending, we can just use indexed array and it will be QuestionNo-1
                    $TestID = $row1['TestID'];                              //ehhhh now it assigns the same value to it each time but I don't know how to do other way
                }
                
                $query2 = "SELECT TestID, TestJSON, NumOfQuest FROM questions WHERE TestID = '$TestID'";
                $result2 = mysqli_query($conn, $query2);
                if ($result2)
                {
                    $row2 = mysqli_fetch_assoc($result2);
                    $TestOriginal = json_decode($row2['TestJSON']);
                    $NumOfQuest = $row2['NumOfQuest'];      // $NumOfQuest is equal to count($TestOriginal)

                    $score = 0;

                    // $TestOriginal[0]->quest;          accessing php object attributes
                    for ($i=0; $i<$NumOfQuest; $i++)                   //here we start to output original quiz questions with variants on the screen
                    {

                        $CorrectAns = $TestOriginal[$i]->ans;
                        if ($arrayTestResults[$i] == $TestOriginal[$i]->ans)
                        {
                            $score++;
                        }
                    ?>
                    <div class="row align-items-center justify-content-center d-flex flex-column pt-5">
                        <p id="r<?php echo $i ?>"><?php echo ($TestOriginal[$i]->quest) ?></p>        <!-- question -->       
                        <?php
                            for ($j=0; $j<count($TestOriginal[$i]->opts); $j++)       //variants
                            {
                                $ClassesForVariants = 'DefVariant';
                                if ($j == intval($arrayTestResults[$i])-1)        //j starts from zero and answer order starts from 1
                                {
                                    $ClassesForVariants .= ' StudAns';
                                }
                                if ($j == intval($TestOriginal[$i]->ans)-1)
                                {
                                    $ClassesForVariants .= ' CorAns'; 
                                }
                        ?>
                        <!-- it sets varying classes -->
                        <div class="<?php echo $ClassesForVariants ?>"><input type="radio" class="resRad"  name="radio<?php echo $i ?>" value="<?php echo $j ?>" id="r<?php echo ($i.$j) ?>">
                                        <label for="r<?php echo ($i.$j) ?>"><?php echo ($TestOriginal[$i]->opts[$j]) ?></label>     <!-- access element of an array that is a parameter -->
                        </div>
                    
                        <?php
                            }
                        ?>
                    </div>
                    <?php
                    }
                    ?>
                        <div class = "mt-3">You score is: <?php echo ($score . " out of " . $NumOfQuest) ?></h5>
                    <?php

                }
                else
                {
                    echo ("Error!".mysqli_error($conn));
                }
            }
            else
            {
                echo ("Error!".mysqli_error($conn));
            }
        ?>
        </div>
    </body>
</html>