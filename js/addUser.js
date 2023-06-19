$(document).ready(function () {
    
    const form = document.getElementById("addUser");

    function emptyCheck (a, b){
        if ((a!='' && a!=null)&&(b!='' && b!=null))
        {  
            return true;
        }
        else
        {
            alert("Please enter login and password");
            return false;
        }
    }

    function emptyCheck (a, b){
        if ((a.length>7)&&(b.length>7))
        {  
            return true;
        }
        else
        {
            alert("Login and password have to contain at least 7 characters");
            return false;
        }
    }

    $("#sendFormBtn").click(function (e) {
        let a = $("#Login").val(); 
        let b = $("#Password").val(); 
        if (emptyCheck(a,b))
        {
        e.preventDefault();
    
        var xhr = new XMLHttpRequest();
    
        xhr.open('POST', 'php/addUserSQL.php', true);
    
        xhr.onload = function () {
            let response = xhr.response;
            if (response=="Success!")
            {
                alert("Success");
            }
            else
            {
                alert("This login is already taken");
            }
        }
    
        let formData = new FormData(form);
    
        xhr.send(formData);
        }
    });
});


