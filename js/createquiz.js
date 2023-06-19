class Question{
    constructor(quest, opts, ans){
        this.quest = quest;
        this.opts = opts;       //array
        this.ans = ans;         //No. (position) of correct answer. maybe better opts[ans-1]
    }
}

var QuestArr = new Array();
QuestArr.push(null); 
var count = 0;


$(document).ready(function(){

    //option number
    var curNum = 2;
    $("#optNum").change(function (e) { 
        e.preventDefault();
        var newNum = Number($("#optNum").val());
        while (curNum<newNum)
        {
            curNum++;
            let newOption = `
            <div class="col bg-info rounded-4 m-2" id="Ans` + curNum + `">
                <div class="input-group mb-3">
                    <div class="custom-radio-button">
                        <input type="radio" id="r` + curNum + `" name="correctAns" value="` + curNum + `">
                        <label for="r` + curNum + `">
                            <span>
                            </span>
                        </label>
                    </div>
                    <textarea id="txt` + curNum + `" cols="30" rows="6" class="form-control bg-transparent border-0 w-100 txtResponsive2" placeholder="Add an option"></textarea>
                </div>
            </div>
            `;
    
            $("#options").append(newOption);
        }
        while (curNum>newNum)
        {
            $("#Ans" + curNum).remove();
            curNum--;
        }
    });

    //clear input fields
    function clearAllInput(){
        $("textarea").val('');         //val, not text

        $(":checked").prop("checked", false);           //НАШЁЛ, НАШЁЛ

        $("#question").val('');

        headerUpdate();
    }

    //retrieve values for input 
    function setInputValues(){
        $("#optNum").val(QuestArr[count].opts.length);
        $("#optNum").trigger('change');

        $("#question").val(QuestArr[count].quest);
        for (let i=1; i<=QuestArr[count].opts.length; i++)
        {
            $("#txt" + i).val(QuestArr[count].opts[i-1]);
        }
        $("#r" + QuestArr[count].ans).prop("checked", true);

        
        headerUpdate();
    }

    //add input to array
    function setQuest(){
        let quest = $("#question").val();
        let opts = new Array();
        for (let i=1; i<=Number($("#optNum").val()); i++)
        {
            opts.push($("#txt" + i).val())
        }
        let ans = $('input[name="correctAns"]:checked').val();  //add validation for case if no radiobutton is checked

        let newQuest = new Question(quest, opts, ans);
        QuestArr[count] = newQuest;
    }

    function headerUpdate(){
        $("#header").text("Question " + (count+1));
    }

    //next question button
    $("#toNext").click(function (e) { 
        e.preventDefault();
        
        setQuest();

        count++;            //!TO DO:   delete save but and add smthg like if count<questarr.length...

        if (count==QuestArr.length)
        {
            QuestArr.push(null); 

            clearAllInput();
        }
        else
        {
            setInputValues();
        }
   
    });

    //previous question button
    $("#toPrev").click(function (e) { 
        e.preventDefault();

        setQuest();

        count--;

        setInputValues();
    });

    $("#deleteQuest").click(function (e) { 
        e.preventDefault();
        
        QuestArr.splice(count, 1);      //removes 1 element at index count

        count --;

        setInputValues();
    });

    //finish question set button
    $("#finish").click(function (e) { 
        e.preventDefault();

        setQuest();

        let TestJSON = JSON.stringify(QuestArr);
        
        let formData = new FormData();
        //adding values to formdata
        formData.append('TestName', $("#testName").val());
        formData.append('TestJSON', TestJSON);
        formData.append('NumOfQuest', count+1);


        var xhr = new XMLHttpRequest();

        xhr.open('POST', 'php/createquizSQL.php', true);

        xhr.onload = function () {
            let response = xhr.response;
            console.log(response);          //will be removed and added redirect to the main page
        }

        xhr.send(formData);

        window.open("menuTeacher.php", "_self");
    });
  });