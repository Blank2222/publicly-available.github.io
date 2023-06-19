<?php
session_start();
session_destroy();
?>

<?php include_once "header.php"; ?>
    </head>

    <body>
        <div class="container-fluid text-center h-100">
            <div class="row justify-content-center align-items-end" style="min-height:30%;">
                <span class="hd1">Choose who you are</span>
            </div>
            <div class="row d-flex justify-content-center h-50">
                <div class="col-lg-4 col-md-5 p-0 m-3 rounded buttonNo1">
                    <a href='login.php?user=teacher' class="btn btn-dark shadow text-white h1 h-100 d-flex justify-content-center align-items-center">
                        <span class="h1">I'm a teacher</span>
                    </a>
                </div>
                <div class="col-lg-4 col-md-5 p-0 m-3 rounded buttonNo1">
                    <a href='login.php?user=student' class="btn btn-dark shadow text-white h1 h-100 d-flex justify-content-center align-items-center">
                        <span class="h1">I'm a student</span>
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>
