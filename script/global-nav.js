
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
    $("#logout-button").click(function(){
        $('.logout-container').toggleClass('lo-slide'); 
    });
    $('#y-button').click(function(){
        document.write("<?php session_destroy();?>")
        window.location = "../index.php";
    });
    $("#n-button").click(function(){
        $('.logout-container').toggleClass('lo-slide');
    });


    $("#home-button").click(function(){
        if(window.location.hash == "#home"){
            location.reload();
        }else{
            window.location = "../admin-dashboard.php";
        }

    });
    $("#view-profile-button").click(function(){
        if(window.location.hash == "#profile" || window.location.hash == "#profile-editable"){
            location.reload();
        }else{
            window.location = "./pages/profile.php";
        }

    });
});