var selectStat = "";
var confProcess = "";
var i = $('#si').data('value');
var p = $('#sp').data('value');
chkOpen();
chkPop();
$(document).ready(function () {

    $('#selections').change(function () {
        if ($('#selections').val() == "candidate") {
            if (selectStat == "voter") {
                $(".voter-form").toggleClass('conf-animation');
                $(".candidate-form").toggleClass('conf-animation');
                selectStat = "candidate";
                window.location.hash = "#candidate"
                chkvisible();
            } else if (selectStat == "party") {
                $(".party-form").toggleClass('conf-animation');
                $(".candidate-form").toggleClass('conf-animation');
                selectStat = "candidate";
                window.location.hash = "#candidate"
                chkvisible();
            } else {
                $(".candidate-form").toggleClass('conf-animation');
                selectStat = "candidate";
                window.location.hash = "#candidate"
                chkvisible();
            }

        } else if ($('#selections').val() == "voter") {
            if (selectStat == "candidate") {
                $(".candidate-form").toggleClass('conf-animation');
                $(".voter-form").toggleClass('conf-animation');
                window.location.hash = "#voter"
                selectStat = "voter";
                chkvisible();
            } else if (selectStat == "party") {
                $(".party-form").toggleClass('conf-animation');
                $(".voter-form").toggleClass('conf-animation');
                window.location.hash = "#voter"
                selectStat = "voter";
                chkvisible();
            } else {
                $(".voter-form").toggleClass('conf-animation');
                window.location.hash = "#voter"
                selectStat = "voter";
                chkvisible();
            }

        } else if ($('#selections').val() == "party") {

            if (selectStat == "candidate") {
                $(".candidate-form").toggleClass('conf-animation');
                $(".party-form").toggleClass('conf-animation');
                window.location.hash = "#party"
                selectStat = "party"
                chkvisible();
            } else if (selectStat == "voter") {
                $(".voter-form").toggleClass('conf-animation');
                $(".party-form").toggleClass('conf-animation');
                window.location.hash = "#party"
                selectStat = "party"
                chkvisible();
            } else {
                $(".party-form").toggleClass('conf-animation');
                window.location.hash = "#party"
                selectStat = "party"
                chkvisible();
            }


        } else {
            if (selectStat == "voter") {
                $(".voter-form").toggleClass('conf-animation');
                window.location.hash = "";
                selectStat = "";
                chkvisible();

            } else if (selectStat == "party") {
                $(".party-form").toggleClass('conf-animation');
                window.location.hash = "";
                selectStat = "";
                chkvisible();

            } else if (selectStat == "candidate") {
                $(".candidate-form").toggleClass('conf-animation');
                window.location.hash = "";
                selectStat = "";
                chkvisible();
            }
        }
    });

    $('#input-id').keydown(function () {
        document.getElementById('conf-err').innerHTML = "";
    });
    $('#input-pass').keydown(function () {
        document.getElementById('conf-err').innerHTML = "";
    });

    $('#submit-btn').click(function () {
        edtCandidate();
    });
    //Delete Candidate Button (Delete Button for Candidate)
    $('#del-btn').click(function () {
        delCandidate();
    });
    //Delete Voter Button   
    $('#vsubmit-btn').click(function () {
        edtVoter();
    });
    $('vdel-btn').click(function () {
        delVoter();
    });
    //Delete Party Button
    $('#psubmit-btn').click(function () {
        edtParty();
    });
    $('#pdel-btn').click(function () {
        delParty();
    });



    $('#submit-confirmation').click(function () {
        var ii = $('#input-id').val();
        var ip = $('#input-pass').val();
        if (ii == i && ip == p) {
            if (window.location.hash == "#candidate") {
                if (confProcess == "edit") {
                    $('#submit-btn').val('edit');
                    $('#cand_id').prop("disabled", true);
                    $('#cand_fn').prop("disabled", true);
                    $('#cand_ln').prop("disabled", true);
                    $('#cand_sec').prop("disabled", true);
                    $('#cand_p').prop("disabled", true);
                    $('#del-btn').prop("disabled", true);
                    $.ajax({
                        url: "../script/edt-candidate-submit.php",
                        type: "POST",
                        datatype: "json",
                        data: {
                            id: $('#cand_id').val(),
                            fn: $('#cand_fn').val(),
                            ln: $('#cand_ln').val(),
                            sec: $('#cand_sec').val(),
                            p: $('#cand_p').val(),
                            cpos: $('#selected_pos').val(),
                            candid: $('#getid').val(),
                            oldp: $('#getprty').val(),
                            action: "edit",

                        },
                        success: function (dataResult) {
                            if (dataResult == "success") {
                                alert('Candidate has been updated successfully!');
                                $('#cand_img').attr("src", "../res/placeholder.png")
                                $('#cand_id').val([]);
                                $('#cand_fn').val([]);
                                $('#cand_ln').val([]);
                                $('#cand_p').val([]);
                                $('#cand_sb').val([]);
                                location.reload();
                            } else {
                                alert('Error! Candidate ID is already Taken!');
                                location.reload();
                            }
                            console.log(dataResult);
                        }
                    });
                } else if (confProcess == "delete") {
                    console.log("authorized")
                    $('#submit-btn').val('edit');
                    $('#cand_id').prop("disabled", true);
                    $('#cand_fn').prop("disabled", true);
                    $('#cand_ln').prop("disabled", true);
                    $('#cand_sec').prop("disabled", true);
                    $('#cand_p').prop("disabled", true);
                    $('#del-btn').prop("disabled", true);
                    $.ajax({
                        url: "../script/edt-candidate-submit.php",
                        type: "POST",
                        datatype: "json",
                        data: {
                            candid: $('#getid').val(),
                            cpos: $('#selected_pos').val(),
                            action: "Delete",
                        },
                        success: function (dataResult) {
                            if (dataResult == "success") {
                                alert('Candidate has been Deleted successfully!');
                                $('#cand_img').attr("src", "../res/placeholder.png")
                                $('#cand_id').val([]);
                                $('#cand_fn').val([]);
                                $('#cand_ln').val([]);
                                $('#cand_p').val([]);
                                $('#cand_sb').val([]);
                                location.reload();
                            } else {
                                alert('Candidate Deletion Failed');
                            }
                            console.log(dataResult);
                        }
                    });
                }
            } else if (window.location.hash == "#voter") {
                if (confProcess == "edit") {
                    $('#vsubmit-btn').val('edit');
                    $('#voter_id').prop("disabled", true);;
                    $('#voter_fn').prop("disabled", true);
                    $('#voter_ln').prop("disabled", true);
                    $('#voter_p').prop("disabled", true);
                    $('#voter_sec').prop("disabled", true);
                    $('#voter_sy').prop("disabled", true);
                    $('#vdel-btn').prop("disabled", true)
                    $.ajax({
                        url: "../script/edt-voter-submit.php",
                        type: "POST",
                        datatype: "json",
                        action: "edit",
                        data: {
                            id: $('#voter_id').val(),
                            fn: $('#voter_fn').val(),
                            ln: $('#voter_ln').val(),
                            sec: $('#voter_sec').val(),
                            sy: $('#voter_sy').val(),
                            candid: $('#getvid').val(),
                            action: "edit",
                        },
                        success: function (dataResult1) {
                            if (dataResult1 == "success") {
                                alert('Voter has been updated successfully!');
                                $('#voter_img').attr("src", "../res/placeholder.png")
                                $('#voter_id').val([]);
                                $('#voter_fn').val([]);
                                $('#voter_ln').val([]);
                                $('#voter_p').val([]);
                                $('#voter_sec').val([]);
                                $('#voter_sy').val([]);
                                $('#voter_sb').val([]);
                                $('#getvid').val([])
                                location.reload();
                            } else {
                                alert('Error! Voter ID is already Taken!');
                                location.reload();
                            }
                            console.log(dataResult1);
                        }
                    });
                } else if (confProcess == "delete") {
                    $.ajax({
                        url: "../script/edt-candidate-submit.php",
                        type: "POST",
                        datatype: "json",
                        data: {
                            id: $('#voter_id').val(),
                            action: "delete",
                        },
                        success: function (dataResult) {
                            if (dataResult == "success") {
                                alert('Voter has been Deleted successfully!');
                                $('#voter_img').attr("src", "../res/placeholder.png")
                                $('#voter_id').val([]);
                                $('#voter_fn').val([]);
                                $('#voter_ln').val([]);
                                $('#voter_p').val([]);
                                $('#voter_sec').val([]);
                                $('#voter_sy').val([]);
                                $('#voter_sb').val([]);
                                $('#getvid').val([])
                                location.reload();
                            } else {
                                alert('Voter Deletion Failed');
                                location.reload();
                            }
                            console.log(dataResult);
                        }
                    });
                }
            } else if (window.location.hash == "#party") {
                if (confProcess == "edit") {
                    $('#vsubmit-btn').val('edit');
                    $('#party_id').prop("disabled", true);;
                    $('#party_n').prop("disabled", true);
                    $.ajax({
                        url: "../script/edt-party-submit.php",
                        type: "POST",
                        datatype: "json",
                        action: "edit",
                        data: {
                            id: $('#party_id').val(),
                            n: $('#party_n').val(),
                            oldpid: $('#getpid').val(),
                            action: "edit",
                        },
                        success: function (dataResult2) {
                            if (dataResult2 == "success") {
                                alert('Voter has been updated successfully!');
                                $('#party_id').val([]);
                                $('#party_n').val([]);
                                $('#getpid').val([]);
                                location.reload();

                            } else {
                                alert('Error! Party ID is already Taken!');
                            }
                            console.log(dataResult2);
                        }
                    });
                } else if (confProcess == "delete") {
                    console.log("delete detected")
                    $.ajax({
                        url: "../script/edt-party-submit.php",
                        type: "POST",
                        datatype: "json",
                        data: {
                            id: $('#party_id').val(),
                            action: "delete",
                        },
                        success: function (dataResult) {
                            if (dataResult == "success") {
                                alert('Party has been Deleted successfully!');
                                $('#party_id').val([]);
                                $('#party_n').val([]);
                                $('#getpid').val([]);
                                location.reload();
                            } else {
                                alert('Voter Deletion Failed');
                            }
                            console.log(dataResult);
                        }
                    });
                }
            }
        }else{
            document.getElementById('conf-err').innerHTML = "Admin id or password does not match";

        }

    });


    $('#cancel-confirmation').click(function () {
        $('#input-id').val([]);
        $('#input-pass').val([]);
        document.getElementById('conf-err').innerHTML = "";
        $('.confirmation').toggleClass('conf-animation');
    });
});

function chkOpen() {
    if (window.location.hash == "#candidate") {
        if ($(".candidate-form").toggleClass('conf-animation')) {
            $('.candidate-form').css("visiblity", "visible");
            selectStat = "candidate";
            $('#selections').val("candidate")
        } else {
            $(".candidate-form").toggleClass('conf-animation');
            selectStat = "candidate";
            $('#selections').val("candidate")
        }


    }
    if (window.location.hash == "#voter") {

        if ($(".voter-form").toggleClass('conf-animation')) {
            $('.voter-form').css("visiblity", "visible");
            selectStat = "voter";
            $('#selections').val("voter")
        } else {
            $(".voter-form").toggleClass('conf-animation');
            selectStat = "voter";
            $('#selections').val("voter")
        }
    }

    if (window.location.hash == "#party") {
        if ($(".party-form").toggleClass('conf-animation')) {
            $('.party-form').css("visiblity", "visible");
            selectStat = "party";
            $('#selections').val("party")
        } else {
            $(".party-form").toggleClass('conf-animation');
            selectStat = "party";
            $('#selections').val("party")
        }
    }
}

function chkvisible() {
    if (selectStat != "candidate") {
        $('#cand_img').attr("src", "../res/placeholder.png")
        $('#cand_id').val([]);
        $('#cand_fn').val([]);
        $('#cand_ln').val([]);
        $('#cand_p').val([]);
        $('#cand_sec').val([]);
        $('#cand_sb').val([]);
        $('#getid').val([]);
    }
    if (selectStat != "voter") {
        $('#voter_img').attr("src", "../res/placeholder.png")
        $('#voter_id').val([]);
        $('#voter_fn').val([]);
        $('#voter_ln').val([]);
        $('#voter_p').val([]);
        $('#voter_sec').val([]);
        $('#voter_sy').val([]);
        $('#voter_sb').val([]);
        $('#getvid').val([]);
    }
    if (selectStat != "party") {
        $('#party_id').val([]);
        $('#party_n').val([]);
        $('getpid').val([]);
    }

}

function chkPop() {
    if ($('#cand_id').val() != "" && $('#cand_fn').val() != "" && $('#cand_ln').val() != "") {
        $('#submit-btn').prop("disabled", false);
    } else {
        $('#submit-btn').prop("disabled", true);
    }
    if ($('#voter_id').val() != "" && $('#voter_fn').val() != "" && $('#voter_ln').val() != "" && $('#voter_sec').val() != "" && $('#voter_sy').val() != "") {
        $('#vsubmit-btn').prop("disabled", false);
    } else {
        $('#vsubmit-btn').prop("disabled", true);
    }
    if ($('#party_id').val() != "" && $('#party_n').val() != "") {
        $('#psubmit-btn').prop("disabled", false);
    } else {
        $('#psubmit-btn').prop("disabled", true);
    }
}

function edtCandidate() {

    if ($('#submit-btn').val() == "edit") {
        $('#submit-btn').val('submit');
        $('#cand_id').prop("disabled", false);
        $('#cand_fn').prop("disabled", false);
        $('#cand_ln').prop("disabled", false);
        $('#cand_sec').prop("disabled", false);
        $('#cand_p').prop("disabled", false);
        $('#del-btn').prop("disabled", false);


    } else {
        $('.confirmation').toggleClass('conf-animation');
        confProcess = "edit";
    }
}

function delCandidate() {
    $('.confirmation').toggleClass('conf-animation');
    confProcess = "delete";
}

function edtVoter() {
    if ($('#vsubmit-btn').val() == "edit") {
        $('#vsubmit-btn').val('submit');
        $('#voter_id').prop("disabled", false);;
        $('#voter_fn').prop("disabled", false);
        $('#voter_ln').prop("disabled", false);
        $('#voter_p').prop("disabled", false);
        $('#voter_sec').prop("disabled", false);
        $('#voter_sy').prop("disabled", false);
        $('#vdel-btn').prop("disabled", false)
    } else {
        $('.confirmation').toggleClass('conf-animation');
        confProcess = "edit";
    }
}
function delVoter() {
    $('.confirmation').toggleClass('conf-animation');
    confProcess = "delete";
}

function edtParty() {
    if ($('#psubmit-btn').val() == "edit") {
        $('#psubmit-btn').val('submit');
        $('#party_id').prop("disabled", false);
        $('#party_n').prop("disabled", false);
        $('#pdel-btn').prop("disabled", false);



    } else {
        $('.confirmation').toggleClass('conf-animation');
        confProcess = "edit";
    }
}
function delParty() {
    $('.confirmation').toggleClass('conf-animation');
    confProcess = "delete";
}