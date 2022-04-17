window.location.hash = "#reg-party";
$(document).ready(function () {
    $('#forms').keypress(function(){
        document.getElementById('errmsg').innerHTML = "";
    });
});