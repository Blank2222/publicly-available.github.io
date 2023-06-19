$(document).ready(function () {
    function makeid() {
        let result = '';
        const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        const charactersLength = characters.length;
        let counter = 0;
        while (counter < 6) {
          result += characters.charAt(Math.floor(Math.random() * charactersLength));
          counter += 1;
        }
        return result;
    }

    var testCode = makeid();
    $("#openBtn").click(function (e) { 
        e.preventDefault();
        
        var testID = $("#testName").val();

        $("#testCode").text("       Join via code: " + testCode);

        var xhr = new XMLHttpRequest();

        xhr.open('POST', 'php/openQuizSQL.php', true);

        xhr.onload = function () {
            let response = xhr.response;
            console.log(response);  
        }

        let formData = new FormData();

        formData.append('TestCode', testCode);
        formData.append('TestID', testID);

        xhr.send(formData);


        $("#seeResultsBtn").removeAttr("disabled");
    });

    $("#seeResultsBtn").click(function (e) { 
        e.preventDefault();
        
        window.open("resultsForTeacher.php?TestCode=" + testCode, "_self");
    });
});