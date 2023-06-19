<?php
session_start();
if (!isset($_SESSION['uniqueID']))
{
    header("location: index.php");
}
?>

<?php include_once "header.php"; ?>
        <script src='js/resultsForTeacher.js'></script>
    </head>
    <body>
        <div class="profileBar">
            <?php include_once "profileBar.php"; ?>
        </div>
        <h1 id="TestName"></h1>
        <h3 id="Results">Current Results: No answers yet</h3>

        <div class="container-fluid" style="overflow-x: auto;">
            <div id="ResultsTable" class="theTable mx-4 d-block" style="width: 1280px; min-height: 50vh;">
                
            </div>
        </div>
    </body>
</html>