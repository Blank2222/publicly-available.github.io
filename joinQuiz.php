<?php
session_start();
if (!isset($_SESSION['uniqueID']))
{
    header("location: index.php");
}
?>

<?php include_once "header.php"; ?>
        <script src="js/joinQuiz.js"></script>
    </head>
    <body>
        <?php include_once "profileBar.php"; ?>

        <div class="container-md text-center rounded h-100 h-md-75 w-100">
            <div class="row d-flex flex-column justify-content-center align-items-center h-100">
                    <div class="d-flex justify-content-center">
                        <span class="h1 mt-3">Enter PIN code</span>
                    </div>
                    <div class="row my-2 justify-content-center">
                        <div class="col-lg-7 col-md-10">
                            <input type="text" class="w-100" id="testCode" placeholder="Enter PIN Code">
                        </div>
                    </div>
                    <div class="row mt-2 justify-content-center">
                        <button class="btn btn-dark btn-lg w-25" id="joinBtn" style="min-width: 90px;">Join</button>
                    </div>
            </div>
        </div>
    </body>
</html>