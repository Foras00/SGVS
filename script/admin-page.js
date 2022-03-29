
$(document).ready(function(){
    $("#hamburger-button").click(function(){
        $('.side-nav').toggleClass('sn-slide');
    
    });
    $("#register-tab").click(function(){
        $('.register-tab').toggleClass('sn-content-slide');
    
    });
    $("#account-tab").click(function(){
        $('.account-tab').toggleClass('sn-content-slide');
    
    });
          
});




function goBack() {
    document.write("<?php session_destroy();?>")
    window.location = "../index.php";
}
var logcon = document.getElementById('logout-confirmation');
function logOutPressed() {

    logcon.classList.toggle("m-fadeIn");

    document.getElementById('logout-confirmation').style.width = "15em";
    document.getElementById('logout-confirmation').style.height = "10em";
    document.getElementById('logout-confirmation').style.visibility = "visible";
    document.getElementById('logout-confirmation').style.zIndex = "1";
}
function logOutNoPressed() {
    logcon.classList.toggle("m-fadeOut");
    document.getElementById('logout-confirmation').style.height = "0";
    document.getElementById('logout-confirmation').style.width = "0";
}

