var selectStat = "";
chkOpen();
$(document).ready(function () {

    $('#selections').change(function () {
        if ($('#selections').val() == "candidate") {
            $(".candidate-form").css("visibility", "visible");
            selectStat = "candidate";
            window.location.hash = "#candidate"
            chkvisible();
        } else if ($('#selections').val() == "voter") {
            $(".voter-form").css("visibility", "visible");
            window.location.hash = "#voter"
            selectStat = "voter";
            chkvisible();
        } else if($('#selections').val() == "party"){
            $(".party-form").css("visibility", "visible");
            window.location.hash = "#party"
            selectStat = "party";
            chkvisible();
        } else {
            window.location.hash = "";
            selectStat = "";
            chkvisible()
        }

    });
});

function chkOpen(){
    if(window.location.hash == "#candidate"){
        $(".candidate-form").css("visibility", "visible");
            selectStat = "candidate";
            $('#selections').val("candidate")
    }
    if(window.location.hash == "#voter"){
        $(".voter-form").css("visibility", "visible");
            selectStat = "voter";
            $('#selections').val("voter")
    }
    if(window.location.hash == "#party"){
        $(".party-form").css("visibility", "visible");
            selectStat = "party";
            $('#selections').val("party")
    }
}

function chkvisible() {
    if (selectStat != "candidate") {
        $(".candidate-form").css("visibility", "hidden");
        $('#cand_img').attr("src","../res/placeholder.png")
        $('#cand_id').val([]);
        $('#cand_fn').val([]);
        $('#cand_ln').val([]);
        $('#cand_p').val([]);
        $('#cand_sb').val([]);
    }
    if (selectStat != "voter") {
        $(".voter-form").css("visibility", "hidden");
        $('#voter_img').attr("src","../res/placeholder.png")
        $('#voter_id').val([]);
        $('#voter_fn').val([]);
        $('#voter_ln').val([]);
        $('#voter_p').val([]);
        $('#voter_sb').val([]);
    }
    if (selectStat != "party") {
        $(".party-form").css("visibility", "hidden");
    }
}