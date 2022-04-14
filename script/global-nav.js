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


    $("#logo").click(function () {
        if (window.location.hash == "#home") {
            location.reload();
        } else {
            window.location = "../admin-dashboard.php";
        }

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
            if (window.location.hash != "#home") {
                window.location = "./profile.php";
            } else {
                window.location = "./pages/profile.php";
            }
        }

    });

    $("#reg-voter-button").click(function () {
        if (window.location.hash == "#reg-voter") {
            location.reload();
        } else {
            if (window.location.hash != "#home") {
                window.location = "./register-voter.php";
            } else {
                window.location = "./pages/register-voter.php";
            }

        }
    });
    $("#reg-cand-button").click(function () {
        if (window.location.hash == "#reg-cand") {
            location.reload();
        } else {
            if (window.location.hash != "#home") {
                window.location = "./register-candidate.php";
            } else {
                window.location = "./pages/register-candidate.php";
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
            $('.side-nav').toggleClass('sn-slide');

            $('.remove-tab').toggleClass('sn-content-slide');
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