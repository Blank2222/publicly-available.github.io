<?php
session_start();
if (!isset($_SESSION['uniqueID']))
{
    header("location: index.php");
}
?>

<?php include_once "header.php"; ?>
        <script src='js/quizInterface.js'></script>
    </head>
    <body class="d-flex flex-column">
        <?php include_once "profileBar.php"; ?>

        <h6 id="ID" hidden><?php echo $_SESSION['uniqueID'] ?></h6>


        <div class="container-fluid p-0 align-items-center text-center rounded w-100 d-flex flex-column flex-grow-1" style="background-color: #084C61;">
            <div class="row justify-content-center w-100 d-flex"  style="min-height: 50%;">
                <div class="col-9 p-0 d-flex flex-column align-items-stretch">
                    <div class="row justify-content-center">
                        <div class="row justify-content-center w-100">
                            <h1 id="QuestionNoHeader">Question 1</h1>
                        </div>
                    </div>
                    <div class="row justify-content-start m-0 p-0 d-flex flex-grow-1 ">
                        <div id="question" class="col d-flex align-items-center justify-content-center border w-100 h-100 p-1 bg-transparent rounded-2" style="font-size:calc(1.9vw + 1.4vh);">
                            <!-- Question text -->
                        </div>
                    </div>
                </div>
            </div>

           
            <div class="row d-flex justify-content-center align-items-stretch px-1 m-0 flex-grow-1 w-100" id="options" style="height: 35%;">
                <!-- here do all flex happen -->
            </div>
        </div>
    </body>
</html>