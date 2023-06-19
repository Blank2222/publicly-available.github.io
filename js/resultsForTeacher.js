$(document).ready(function () {
    var urlParams = new URLSearchParams(window.location.search);
    var TestCode = urlParams.get('TestCode');
    var NumOfQuest;
    var CorrectAnswers = new Array();

    class StandartizedStudentAnswerRecord {
        constructor (login, answers, NumOfQuest){
            this.login = login;
            this.answers = answers;
            this.answersResult = new Array();
            this.score = 0;
            while (answers.length<NumOfQuest)
            {
                this.answers.push(null);
            }
            for (let i=0; i<NumOfQuest; i++)
            {
                if (this.answers[i]==null)
                {
                    this.answersResult.push(null);
                }
                else if (this.answers[i]==CorrectAnswers[i])
                {
                    this.answersResult.push(1);
                    this.score++;
                }
                else
                {
                    this.answersResult.push(0);
                }
            }
            
            
        }
    }

    var xhr = new XMLHttpRequest();
    
    xhr.open('POST', 'php/resultsForTeacherSQL1.php', true);

    xhr.onload = function () {
        if (String(xhr.response).includes('Error!'))
        {
            throw new Error();
        }
        let response = JSON.parse(xhr.response);
        NumOfQuest = response['NumOfQuest'];
        let Test = JSON.parse(response['TestJSON']);

        for (let i=0; i<Test.length; i++)
        {
            CorrectAnswers.push(Test[i]['ans']);
        }
        $("#TestName").text(response['TestName']);


        //making table header row
        let studentsNameHeader = `<div class="col-1 border h-100 align-items-center d-flex justify-content-center">
        <span>Student</span>
        </div>`;

        let questionNumHeaders = '';
        for (let i=1; i<=Number(NumOfQuest); i++)
        {
            questionNumHeaders += `<div class="col border h-100 align-items-center d-flex justify-content-center">
            <span>Q` + i + `</span>
            </div>`;
        }

        let scoreHeader = `<div class="col-1 border h-100 align-items-center d-flex justify-content-center">
        <span>Score</span>
        </div>`;

        let headingsRow = `<div class="row justify-content-center align-items-center table-hover text-center p-0 w-100" style="height: 70px;">`
        + studentsNameHeader + questionNumHeaders + scoreHeader +
        `</div>`;

        $("#ResultsTable").append(headingsRow);
        
    }
    let formData = new FormData();
    formData.append('TestCode', TestCode);

    xhr.send(formData);


    function setInitView(){             //clears previous data
        $(".resultRecord").remove();
        $("#Results").text("Current Results: ");
    }

    window.setInterval(refreshResult, 3000);
    function refreshResult () { 
        setInitView();
        var xhr = new XMLHttpRequest();
    
        xhr.open('POST', 'php/resultsForTeacherSQL2.php', true);

        xhr.onload = function () {
            
            var allRecordsArray = new Array(); 

            if (String(xhr.response).includes('Error!'))
            {
                throw new Error();
            }
            else if (String(xhr.response).includes('No answers yet'))
            {
                $("#Results").text("Current Results: No answers yet");
            }
            else
            {
                let StudentObjectsArray = JSON.parse(xhr.response);

                StudentObjectsArray.forEach(element => {
                    let StudentAnswerRecord = new StandartizedStudentAnswerRecord(element['login'], element['answers'], NumOfQuest);

                    allRecordsArray.push(StudentAnswerRecord);
                });

                allRecordsArray.sort((a,b) => {b.score - a.score});     //sorting by descending score


                //from here outputting answer result
                allRecordsArray.forEach((record) =>{
                    let loginCell = `<div class="col-1 border h-100 align-items-center d-flex loginCell justify-content-center">
                    <span>` + record.login + `</span>
                    </div>`;

                    let questionRes = '';
                    record.answersResult.forEach(ans => {
                        let classAns = ``;
                        switch (ans){
                            case 0:
                                classAns = ` answerWrong`;
                                break;
                            case 1:
                                classAns = ` answerRight`;
                                break;
                            default:
                                break;
                        }

                        questionRes += `<div class="col answerCell` + classAns + `"></div>`;
                    })

                    let scoreCell = `<div class="col-1 border h-100 align-items-center d-flex justify-content-center">
                    <span>` + record.score + `</span>
                    </div>`;

                    let resultRow = `<div class="resultRecord row justify-content-center align-items-center table-hover text-center w-100" style="height: 70px;">`
                    + loginCell + questionRes + scoreCell +
                    `</div>`;

                    $("#ResultsTable").append(resultRow);
                })
            }
        }
        let formData = new FormData();
        formData.append('TestCode', TestCode);

        xhr.send(formData);
     }
});