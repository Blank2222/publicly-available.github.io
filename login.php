<?php
session_start();
$type = $_GET['user'];
if (isset($_SESSION['uniqueID']))
{
    if ($type == 'teacher')
    {
        header("location: menuTeacher.php");
    }
    if ($type == 'student')
    {
        header("location: menuStudent.php");
    }
}
if (!isset($type))
{
    header("location: index.php");
}
?>

<?php include_once "header.php"; ?>
        <script src="js/login.js"></script>
    </head>

    <body>
        <div class="container-md text-center rounded h-100 h-md-75 w-100" style="background-color: #084C61;">
            <div class="row align-items-center d-flex justify-content-center h-100">
                    <div>
                    <span class="hd2">Log in</span>
                    <br><br><br>

                    <form id="login" class="row d-flex justify-content-center">
                        <div class="row justify-content-center">
                            <input type="text" class="form-control m-1 w-75" name="Login" id="Loggg" placeholder="Enter Login" style="max-width: 600px;">
                        </div>
                        <div class="row justify-content-center">
                            <input type="password" class="form-control m-1 w-75" name="Password" id="Password "placeholder="Enter Password" style="max-width: 600px;">
                        </div>
                    </form>
                    <br>

                    <button id='btn' class="btn btn-lg btn-dark" style="min-width: 68px;">LOG IN</button>
                    </div>
            </div>
        </div>
    </body>

</html>