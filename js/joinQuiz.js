$(document).ready(function () {
    $("#joinBtn").click(function (e) { 
        e.preventDefault();

        var testCode = $("#testCode").val();

        var xhr = new XMLHttpRequest();

        xhr.open('GET', 'php/joinQuizSQL.php?TestCode='+testCode, true);

        xhr.onload = function () {
            var response = xhr.response;

            if (response == '1')
            {
                window.open("quizInterface.php?TestCode=" + testCode, "_self");
            }
            else if (response == '2')
            {
                console.log("Invalid code");
            }
            else
            {
                console.log(response);
            }
        }

        xhr.send();
    });
});