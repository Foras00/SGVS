function chkBarcodeInput(){
    if(document.getElementById('barcode-input').value === ""){
        alert("barcode form is empty");
    }
}
function chkAdminForm(){
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
}


function openAdminForm(){
    document.getElementById('admin-login-page').style.width = "21em";
}
function closeAdminForm(){
    document.getElementById('admin-login-page').style.width = "0";
}