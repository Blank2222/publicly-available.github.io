<?php
session_start();
if (!isset($_SESSION['uniqueID']))
{
    header("location: index.php");
}
?>

<?php include_once "header.php"; ?>
</head>

<body>
    <?php include_once "profileBar.php"; ?>

    <div class="container-md text-center rounded h-100 h-md-75 w-100">
            <div class="row d-flex justify-content-start h-100">
                <div>
                    <div class="d-flex justify-content-start text-start">
                    <span class="h1 mt-3">Add User Account</span>
                    </div>
                    

                    <form id="addUser">
                        <div class="row d-flex mx-2 justify-content-start align-items-center mb-3">
                            <div class="col-sm-2 d-flex flex-column justify-content-start items-align-center">
                                <h4>Login</h4>
                            </div>
                            <div class="col-lg-6 col-md-8 d-flex justify-content-start">
                                <input id="Login" type="text" class="w-100" name="Login" placeholder="Enter Login">
                            </div>
                        </div>
                        <div class="row d-flex mx-2 justify-content-start align-items-center mb-3">
                            <div class="col-sm-2 d-flex flex-column justify-content-start items-align-center">
                                <h4>Password</h4>
                            </div>
                            <div class="col-lg-6 col-md-8 d-flex justify-content-start">
                                <input id="Password" type="text" class="w-100" name="Password" placeholder="Enter Password">
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <button class="btn btn-dark btn-lg w-25" id="sendFormBtn" style="min-width: 90px;">Create</button>
                        </div>
                    </form>
                    <script src="js/addUser.js"></script>
                </div>
            </div>
        </div>
    </div>
</body>

</html>