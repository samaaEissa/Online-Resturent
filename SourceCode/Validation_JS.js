





function validatMeal() {
    
    if ($("#txtMName").val() == "") {
        alert('please fill the Name field');
        $("#txtMName").focus();
        return false;
    }
    if ($("#txtPrice").val() == "" ) {
        alert('please fill the Price field');
        $("#txtPrice").focus();
        return false;
    }
    if ($("#fileToUpload").val() == "") {
        alert('please choose an icon');
        $("#fileToUpload").focus();

        return false;
    }
    else
        return true;
}


function ValidatRegisterationInputs() {
    if ($("#txtName").val() == "") {
        alert('please fill the required field');
        $("#txtName").focus();
       
        return false;
    }
    
    if ($("#Password").val() == "" ) {
        alert('please fill the required field');
        $("#Password").focus();
        return false;
    }
    if ($("#txtPhone").val() == "" || $("#txtPhone").val().length < 10) {
        alert('please fill the required field');
        $("#txtPhone").focus();
        return false;
    }
    if ($("#txtAddress").val() == "") {
        alert('please fill the required field');
        $("#txtAddress").focus();
        return false;
    }
    
   
    else
        return true;
}

function ValidatLogin() {
    if ($("#txtName").val() == "") {
        alert('please fill the required field');
        $("#txtName").focus();
       
        return false;
    }
    
    if ($("#Password").val() == "" ) {
        alert('please fill the required field');
        $("#Password").focus();
        return false;
    }
   else
        return true;
}