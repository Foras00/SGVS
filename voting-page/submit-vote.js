$(document).ready(function(){
    $('#submit').click(function(){
        $.ajax({
            url: "submit-vote.php",
            type: "POST",
            success: function (dataResult) {
                if (dataResult == "success") {
                    alert('votes have been recorded successfully!');
                    window.location.replace("../index.php");
                } else {
                    alert('vote record failed');
                }
                console.log(dataResult);
            }
        });
    });



});