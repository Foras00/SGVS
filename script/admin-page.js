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

function logoutAjax(){
    var doc = document.getElementById('nav');
    var logout = "<?php logout(); ?>";
    document.write(logout);
}