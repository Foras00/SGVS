window.location.hash = "#reg-voter";
$(document).ready(function () {
    $('#forms').keypress(function(){
        document.getElementById('errmsg').innerHTML = "";
    });
});