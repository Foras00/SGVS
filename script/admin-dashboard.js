window.location.hash = "#home";
var si = $('#si').data('value');
var sp = $('#sp').data('value');
var confProcess = "";
$(document).ready(function () {
    $('#reset').click(function () {
        $('#reset').val('cancel');
        if (confProcess == "") {
            $('.confirmation').toggleClass('conf-animation');
            confProcess = "reset"
        } else if (confProcess == "reset") {
            $('.confirmation').toggleClass('conf-animation');
            confProcess = ""
            $('#reset').val('Reset Database');

        }

    });
    $('#print').click(function () {
        $('#print').val('cancel');
        if (confProcess == "") {
            $('.confirmation').toggleClass('conf-animation');
            confProcess = "print"
        } else if (confProcess == "print") {
            $('.confirmation').toggleClass('conf-animation');
            confProcess = ""
            $('#print').val('Print Winning Candidates');
        }
    });
    $('#confirm').click(function () {
        reset();


    });
});

function reset() {
    var ii = $('#input-id').val();
    var ip = $('#input-pass').val();
    console.log("conf btn clicked" + ii + " " + ip + " " + si + " " + sp);
    if (ii == si && ip == sp) {
        console.log("authorized");
        if (confProcess == "reset") {
            if (confirm('Are your sure? this action will remove all database data including: Candidates, Voters and Parties')) {
                $.ajax({
                    url: "script/r-system.php",
                    type: "POST",
                    datatype: "json",
                    data: {
                        action: "reset",

                    },
                    success: function (dataResult4) {
                        if (dataResult4 == "success") {
                            alert('Database has been reset successfully!\nall candidate, voters, and parties have been removed');
                            location.reload();
                        } else if(dataResult4 == "failed") {
                            alert('Error! Candidate ID is already Taken!');
                            location.reload();
                        }
                        console.log("this" +dataResult4);
                    }
                });
            } else {
                alert(false);
            }

        }
    } else {
       document.getElementById('conf-err').innerHTML = "Incorrect ID or Password"
    }
}