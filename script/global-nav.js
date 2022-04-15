var sn_status = "";
$(document).ready(function () {
    $("body").click(function () {

    })
    $("#hamburger-button").click(function () {
        $('.h-container').toggleClass('h-bg');
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
    $("#reg-party-button").click(function () {
        if (window.location.hash == "#reg-party") {
            location.reload();
        } else {
            if (window.location.hash != "#home") {
                window.location = "./register-party.php";
            } else {
                window.location = "./pages/register-party.php";
            }

        }
    });
    $("#edt-cand-button").click(function () {
        if (window.location.hash == "#edt-cand") {
            location.reload();
        } else {
            if (window.location.hash != "#home") {
                window.location = "./edit-candidate.php";
            } else {
                window.location = "./pages/edit-candidate.php";
            }
        }
    });

    $("#edt-voter-button").click(function () {
        if (window.location.hash == "#edt-voter") {
            location.reload();
        } else {
            if (window.location.hash != "#home") {
                window.location = "./edit-voter.php";
            } else {
                window.location = "./pages/edit-voter.php";
            }

        }
    });
    $("#edt-party-button").click(function () {
        if (window.location.hash == "#edt-party") {
            location.reload();
        } else {
            if (window.location.hash != "#home") {
                window.location = "./edit-party.php";
            } else {
                window.location = "./pages/edit-party.php";
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
        default:
            $('.side-nav').toggleClass('sn-slide');
            break;
    }
}