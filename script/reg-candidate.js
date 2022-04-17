window.location.hash = "#reg-cand";

$(document).ready(function () {
    $('#forms').keypress(function(){
        document.getElementById('errmsg').innerHTML = "";
    });
});
