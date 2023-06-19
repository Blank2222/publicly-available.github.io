<?php
session_start();
if (!isset($_SESSION['uniqueID']))
{
    header("location: index.php");
}
$_SESSION['user'] = "Teacher";
?>

<?php include_once "header.php"; ?>
    </head>
    <body class="d-flex flex-column">   <!-- it means  flex-direction: column -->
        
        <?php include_once "profileBar.php"; ?>

        <div class="container-fluid align-items-center p-1 d-flex flex-grow-1">  

            <div class="row d-flex justify-content-center m-2 w-100 h-50">
                <div class="col-md-3 col-sm-11 p-0 m-4 rounded buttonNo1">
                    <a href='createquiz.php' class="btn btn-dark shadow text-white h1 h-100 d-flex justify-content-center align-items-center">
                        <span class="h1">Create a quiz</span>
                    </a>
                </div>
                <div class="col-md-3 col-sm-11 p-0 m-3 rounded buttonNo1">
                    <a href='openQuiz.php' class="btn btn-dark shadow text-white h1 h-100 d-flex justify-content-center align-items-center">
                        <span class="h1">Open a quiz</span>
                    </a>
                </div>
                <div class="col-md-3 col-sm-11 p-0 m-3 rounded buttonNo1">
                    <a href='addUser.php' class="btn btn-dark shadow text-white h1 h-100 d-flex justify-content-center align-items-center">
                        <span class="h1">Add Student Account</span>
                    </a>
                </div>
            </div>

        </div>
    </body>
</html>