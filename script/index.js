$(document).ready(function(){

    $('#admin-login').click(function(){
        $('.admin-login-screen').toggleClass('lf-admin');
    });

    $('#closebtn').click(function(){
        $('.admin-login-screen').toggleClass('lf-admin');
    });

    $('#admin-form').submit(function(){
        var id = document.getElementById('admin-id');
        var pass = document.getElementById('admin-pass');
        var err = document.getElementById('admin-form-error');
        if(id.value == "" && pass.value == ""){
            alert("Both fields is empty!");
        }else if(id.value == "" && pass.value != ""){
            alert("Field: Admin ID is empty!");
        }else if(id.value != "" && pass.value == ""){
            alert("Field: Password is empty!");
        }
    });
    $('#barcode-form').submit(function(){
        if(document.getElementById('barcode-input').value === ""){
            alert("barcode form is empty");
        }
    });
});