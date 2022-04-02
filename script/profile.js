window.location.hash = "#profile";
$(document).ready(function(){
    $('#edit-btn').click(function(){
        if(window.location.hash == "#profile"){
            window.location.hash = "#profile-editable";
            $("#first_name").prop("disabled", false);
            $("#last_name").prop("disabled", false);
            $("#password").prop("disabled", false);
            document.getElementById("first_name").style.color = "black";
            document.getElementById("last_name").style.color = "black";
            document.getElementById("password").style.color = "black";

        }else{
            window.location.hash = "#profile";
            $("#first_name").prop("disabled", true);
            $("#last_name").prop("disabled", true);
            $("#password").prop("disabled", true);

            document.getElementById("first_name").style.color = "white";
            document.getElementById("last_name").style.color = "white";
            document.getElementById("password").style.color = "white";


        }

    });

});