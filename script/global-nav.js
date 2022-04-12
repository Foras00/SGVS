var sn_status = "";
$(document).ready(function () {
    $("body").click(function () {

    })
    $("#hamburger-button").click(function () {
        chkSn();
    });
    $("#register-tab").click(function () {
        $('.register-tab').toggleClass('sn-content-slide');
        if (sn_status == "reg") {
            sn_status = "";
        } else {
            sn_status = "reg";
        }

    });
    $("#remove-tab").click(function () {
        $('.remove-tab').toggleClass('sn-content-slide');
        if (sn_status == "rem") {
            sn_status = "";
        } else {
            sn_status = "rem";
        }
    });
    $("#account-tab").click(function () {
        $('.account-tab').toggleClass('sn-content-slide');
        if (sn_status == "acc") {
            sn_status = "";
        } else {
            sn_status = "acc";
        }
    });
    $("#logout-button").click(function () {
        $('.logout-container').toggleClass('lo-slide');
    });
    $('#y-button').click(function () {
        document.write("<?php session_destroy();?>")
        window.location = "../index.php";
    });
    $("#n-button").click(function () {
        $('.logout-container').toggleClass('lo-slide');
    });


    $("#home-button").click(function () {
        if (window.location.hash == "#home") {
            location.reload();
        } else {
            window.location = "../admin-dashboard.php";
        }

    });
    $("#view-profile-button").click(function () {
        if (window.location.hash == "#profile" || window.location.hash == "#profile-editable") {
            location.reload();
        } else {
            switch (window.location.hash) {
                case "#reg-voter":
                    window.location = "./profile.php";
                    break;
                case "#reg-cand":
                    window.location = "./profile.php";
                    break;
                case "#rem-cand":
                    window.location = "./register-voter.php";
                    break;
                case "#rem-voter":
                    window.location = "./register-voter.php";
                    break;
                case "#home":
                    window.location = "./pages/profile.php";
                    break;
            }

        }

    });

    $("#reg-voter-button").click(function () {
        if (window.location.hash == "#reg-voter") {
            location.reload();
        } else {
            switch (window.location.hash) {
                case "#profile":
                    window.location = "./register-voter.php";
                    break;
                case "#reg-cand":
                    window.location = "./register-voter.php";
                    break;
                case "#rem-cand":
                    window.location = "./register-voter.php";
                    break;
                case "#rem-voter":
                    window.location = "./register-voter.php";
                    break;
                case "#home":
                    window.location = "./pages/register-voter.php";
                    break;
            }

        }
    });
    $("#reg-cand-button").click(function(){
        if (window.location.hash == "#reg-cand") {
            location.reload();
        } else {
            switch (window.location.hash) {
                case "#profile":
                    window.location = "./register-candidate.php";
                    break;
                case "#reg-voter":
                    window.location = "./register-candidate.php";
                    break;
                case "#rem-cand":
                    window.location = "./register-candidate.php";
                    break;
                case "#rem-voter":
                    window.location = "./register-candidate.php";
                    break;
                case "#home":
                    window.location = "./pages/register-candidate.php";
                    break;
            }

        }
    });
    
});

function chkSn() {
    switch (sn_status) {
        case "reg":
            $('.side-nav').toggleClass('sn-slide');
            $('.register-tab').toggleClass('sn-content-slide');
            sn_status = "";
            break;
        case "rem":
            $('.remove-tab').toggleClass('sn-content-slide');
            $('.side-nav').toggleClass('sn-slide');
            sn_status = "";
            break;
        case "acc":
            $('.account-tab').toggleClass('sn-content-slide');
            $('.side-nav').toggleClass('sn-slide');
            sn_status = "";
            break;
        default:
            $('.side-nav').toggleClass('sn-slide');
            break;
    }
}