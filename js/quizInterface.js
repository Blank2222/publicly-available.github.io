$(document).ready(function () {

    var i = 0;      //question No.
    var response;
    var Questions;

    const urlParams = new URLSearchParams(window.location.search);
    var TestCode = urlParams.get('TestCode');
    var Letters = ['A','B','C','D','E'];


    var xhr = new XMLHttpRequest();

    xhr.open('GET', 'php/quizInterfaceSQL.php?TestCode='+TestCode, true);

    xhr.onload = function() 
    {
        response = JSON.parse(xhr.response);

        Questions = JSON.parse(response['TestJSON']);   //array of question objects

        showQuests(i, Questions);
    }
    
    xhr.send();


    
    

    function clearAllInput()
    {
        $(".itIsAnOption").remove();
        $("input").remove();
        $("label").remove();
        $("#question").text('');
    }

    function showQuests(n, que, lets = Letters)
    { 
        //showing question data (first one and next)
        $("#question").text(que[n]['quest']);             //set question text
        for (let j=0; j<que[n]['opts'].length; j++)       //loop to set options
        {
            let OptionHTML = 
            `<div class="col rounded-4 mx-1 p-0 d-flex flex-grow-1 itIsAnOption">
                <input type="radio" name='UserAnswer' id="r${j+1}" value="${j+1}">
                <label for="r${j+1}" class="row txtResponsive2 m-1 bg-info rounded-2 align-items-stretch justify-content-center d-flex flex-column flex-grow-1">
                    <div class="col text-center d-flex flex-column flex-grow-1" style="max-height: 20%; font-weight: bold;">
                    ${lets[j]}
                    </div>
                    <div class="col px-1 bg-transparent d-flex flex-column align-items-center justify-content-center flex-grow-1">
                    ${que[n]['opts'][j]}
                    </div>
                </label>
            </div>`;

            $("#options").append(OptionHTML);
        }
    }



    $("#options").on('change', 'input[name="UserAnswer"]', function() {         //респект чат джипити
        if (i<Number(response['NumOfQuest']))    //loop for question objects
        {
            //inserting input into database
            var Answer = $("input[name='UserAnswer']:checked").val();

            if (Answer==null)
            {
                alert("You haven't chosen an answer");          //!change later
            }
            else
            {
                var xhttp = new XMLHttpRequest();

                xhttp.open('POST', 'php/quizInterfaceSQL2.php', true);
            
                xhttp.onload = function () {
                    let response2 = xhttp.response;
                    if (response2=="Success!")
                    {
                        console.log("Record added!");
                    }
                    else
                    {
                        console.log("Error");
                    }
                }
            
                let formData = new FormData();
                formData.append('ID', $("#ID").text());             //user ID
                formData.append('TestCode', TestCode);
                formData.append('QuestionNo', i+1);
                formData.append('Answer', Answer);
                xhttp.send(formData);


                i++;
                if (i!=Number(response['NumOfQuest']))
                {
                    clearAllInput();
                    showQuests(i, Questions);
                    $("#QuestionNoHeader").text("Question " + (i + 1));
                }
                else
                {
                    let ID = $("#ID").text();
                    window.open("resultsOwn.php?ID=" + ID + "&TestCode=" + TestCode, "_self");
                }
            }
        }
      });
});