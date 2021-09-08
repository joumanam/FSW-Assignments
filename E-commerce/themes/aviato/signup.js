function formValidation() {

var fnameElement = document.getElementById("first_name");
var lnameElement = document.getElementById("last_name");
var emailElement = document.getElementById("email");
var passwordElement = document.getElementById("password");
var confirmPasswordElement = document.getElementById("confirm_password");
var submitElement = document.getElementById("submitButton");
var formElement = document.getElementById("signUpForm");

submitElement.addEventListener("click", function () {
  if (validateEmail() && confirmPassword() && validatefname() && validatelname()) {
    formElement.submit();
    return true;
  } else {
    if(!confirmPassword()){
      var element = document.getElementById("confirm_password");
      element.classList.add("alert-danger");
      element.classList.add("alert"); 
    }else{
      var element = document.getElementById("confirm_password");
      element.classList.remove("alert-danger");
    }
  
    if(!validateEmail()){
      var element = document.getElementById("email");
      element.classList.add("alert-danger");
      element.classList.add("alert");
    }else{
      var element = document.getElementById("email");
      element.classList.remove("alert-danger");
    }
  
    if(!validatefname()){
      var element = document.getElementById("first_name");
      element.classList.add("alert-danger");
      element.classList.add("alert");
    }else{
      var element = document.getElementById("first_name");
      element.classList.remove("alert-danger");
    }
  
    if(!validatelname()){
       var element = document.getElementById("last_name");
      element.classList.add("alert-danger");
      element.classList.add("alert");
    }else{
      var element = document.getElementById("last_name");
      element.classList.remove("alert-danger");
    }
    return false;
  }


});

function validateEmail() {
  var emailValue = emailElement.value;
  emailValid = false;
  if (
    emailValue.length > 5 &&
    emailValue.lastIndexOf(".") > emailValue.lastIndexOf("@") &&
    emailValue.lastIndexOf("@") != -1
  ) {
    emailValid = true;
    return true;
  } else return false;
}

function confirmPassword() {
  confirmPass = false;
  if (passwordElement.value == confirmPasswordElement.value && passwordElement.value.length > 5) {
    confirmPass = true;
    return true;
  } else return false;
}

function validatefname(){
  fnameValid = false;
  if(fnameElement.value.length>2){
    fnameValid = true;
    return true;
  } else return false;
}

function validatelname(){
  lnameValid = false;
  if(lnameElement.value.length>2){
    lnameValid = true;
    return true;
  } else return false;
}
}