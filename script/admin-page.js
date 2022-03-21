function extendBar(){
    document.getElementById('nav').style.height = "20em";
}
function closeBar(){
    document.getElementById('nav').style.height = "4em";
}

function extendBarRegister(){
    document.getElementById('nav').style.height = "20em";
    document.getElementById('register-tab').style.height = "20em";
}
function closeBarRegister(){
    document.getElementById('nav').style.height = "4em";
    document.getElementById('register-tab').style.height = "4em";
}
function extendBarAccount(){
    document.getElementById('nav').style.height = "20em";
    document.getElementById('account-tab').style.height = "20em";
}
function closeBarAccount(){
    document.getElementById('nav').style.height = "4em";
    document.getElementById('account-tab').style.height = "4em";
}

function goBack(){
    document.write("<?php session_destroy();?>")
    window.location = "../index.php";
}
var logcon = document.getElementById('logout-confirmation');
function  logOutPressed(){
    
    logcon.classList.toggle("m-fadeIn");

    document.getElementById('logout-confirmation').style.width = "15em";
    document.getElementById('logout-confirmation').style.height = "10em";
}
function logOutNoPressed(){
    logcon.classList.toggle("m-fadeOut");
    document.getElementById('logout-confirmation').style.height = "0";
    document.getElementById('logout-confirmation').style.width = "0";
}