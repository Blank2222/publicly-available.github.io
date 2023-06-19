<?php
session_start();
if (!isset($_SESSION['uniqueID']))
{
    header("location: index.php");
}
?>

<?php include_once "header.php"; ?>
        <script src="js/openQuiz.js"></script>
    </head>
    <body>
        <?php include_once "profileBar.php"; ?>
        <div class="container-fluid">
            <div class="row justify-content-start m-4 align-items-center">
                <div class="col-lg-4 col-md-9 col-sm-12 m-0 p-0 text-center">
                    <div class="w-100">
                        <h1 class="h1">Choose a test</h1>
                    </div>
                    <select name="testName" class="form-select w-100" id="testName">
                    <?php
                    include_once "php/connect.php";
                    $query = "SELECT TestID, TestName, NumOfQuest FROM questions ORDER BY TestName ASC";
                    $result = mysqli_query($conn, $query);
                    if($result)
                    {
                        if(mysqli_num_rows($result)>0)
                        {
                            while ($row = mysqli_fetch_assoc($result))
                            {
                    ?>
                                <option value="<?php echo $row['TestID']; ?>"><?php echo $row['TestName'] ?></option>
                    <?php
                            }
                        }
                        else
                        {
                            echo "Failed1";
                        }
                    }
                    else
                    {
                        echo "Failed2";
                    }
                    ?>
                    </select><br>
                    <div class="row text-start">
                        <div class="col mb-3 text-center">
                            <button id="openBtn" class="btn btn-lg btn-dark">Open</button>
                        </div>
                        <div class="col text-center">
                            <button id="seeResultsBtn" class="btn btn-lg btn-dark" disabled>Proceed to results</button>
                        </div>
                    </div>
                </div>
                <div class="col m-0 p-0 text-center">
                    <h3 id="testCode" class="hd1"></h3>
                </div>
            </div>
        </div>
    </body>
</html>