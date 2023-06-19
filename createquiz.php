<?php
session_start();
if (!isset($_SESSION['uniqueID']))
{
    header("location: index.php");
}
?>

<?php include_once "header.php"; ?>
    <script src="js/createquiz.js"></script>

    </head>

    <body class="d-flex flex-column">
        <?php include_once "profileBar.php"; ?>
        <div class="container-fluid align-items-start text-center rounded w-100 d-flex flex-column flex-grow-1" style="background-color: #084C61;">
            <div class="row justify-content-center w-100">
                <div class="col-9 p-0">
                    <div class="row justify-content-center">
                        <div class="col">
                            <div  class="row justify-content-center w-100">
                                <h1 id="header">Question 1</h1>
                            </div>
                        </div>
                        <div class="col">
                            <div  class="row justify-content-center w-100">
                                <input type="text" id="testName" class="form-control m-1 w-50" placeholder="Enter test name">
                            </div>
                        </div>
                    </div>
                    <div  class="row justify-content-center w-100">
                        <form id="thisForm" class="row justify-content-center">
                        <div class="row justify-content-start m-0 p-0">
                            <div class="col">
                                <textarea id="question" maxlength="300" class="w-100 bg-transparent rounded-2 txtResponsive2" cols="30" rows="7" placeholder="Type your question"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div  class="row justify-content-center w-100">
                        <button id="toPrev" class="btn btn-primary">Previous</button>
                        <button id="toNext" class="btn btn-primary">Next</button>
                        <button id="deleteQuest" class="btn btn-primary">Delete</button>
                        <button id="finish" class="btn btn-primary">Finish</button>
                        <div class="row justify-content-center align-items-center" style="height: 150px">
                            <select id="optNum" class="form-select w-50" >How many answer options do you want to have?
                                <option value="2" selected>2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

           
            <div class="row justify-content-center align-items-end w-100" id="options">
                <div class="col bg-info rounded-4 m-2" id="Ans1">
                    <div class="input-group mb-3">
                        <div class="custom-radio-button">
                            <input type="radio" id="r1" name="correctAns" value="1">
                            <label for="r1">
                                <span>
                                </span>
                            </label>
                        </div>
                        <textarea id="txt1" cols="30" rows="6" class="form-control bg-transparent border-0 w-100 txtResponsive2" placeholder="Add an option"></textarea>
                    </div>
                </div> 
                <div class="col bg-info rounded-4 m-2" id="Ans2">
                    <div class="input-group mb-3">
                        <div class="custom-radio-button">
                            <input type="radio" id="r2" name="correctAns" value="2">
                            <label for="r2">
                                <span>
                                </span>
                            </label>
                        </div>
                        <textarea id="txt2" cols="30" rows="6" class="form-control bg-transparent border-0 w-100 txtResponsive2" placeholder="Add an option"></textarea>
                    </div>
                </div> 
            </div>
                        </form>
        </div>    
    </body>
</html>