$(document).ready(function () {

    
    function emptyCheck (a){
        if (a!='' && a!=null)
        {  
            return true;
        }
        else
        {
            alert("Please enter login");
            return false;
        }
    }


    $("#btn").click(function (e) { 
        e.preventDefault();
        let form = document.getElementById("login");
        const urlParams = new URLSearchParams(window.location.search);
        const table = urlParams.get('user') + 's';                             //take value from url

        let a = $("#Loggg").val();


        if (emptyCheck(a)) 
        {
            var xhr = new XMLHttpRequest();
        
            xhr.open('POST', 'php/loginSQL.php', true);
        
            var Login = $("#Loggg").val();;
        
            xhr.onload = function () {
                let response = xhr.response;
                console.log(response);                      //change to alert or some alternative _________________________
                if (response == "Success!")
                {
                    if (table == "teachers")                     //open another html page
                    {
                        window.open("menuTeacher.php?login="+Login, "_self");  
                    }
                    else
                    {
                        window.open("menuStudent.php?login="+Login, "_self");  
                    }
                }
                else
                {
                    alert(response);
                }
            }
        
            let formData = new FormData(form);
        
            formData.append('Table', table);        //https://developer.mozilla.org/en-US/docs/Web/API/FormData/Using_FormData_Objects
        
            xhr.send(formData);
        }
    });
});