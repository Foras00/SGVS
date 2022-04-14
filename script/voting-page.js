window.location.hash = "#home";
$(document).ready(function(){
    $('#left').click(function(){
        document.getElementById('cards-container').scrollLeft -= 500;
    });
    $('#right').click(function(){
        document.getElementById('cards-container').scrollLeft += 500;
    });
});
