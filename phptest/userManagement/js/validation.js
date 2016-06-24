$(document).ready(function () {
    $("#fname").blur(function () {
        validateFirstName();
    });

    $("#lname").blur(function () {
        validateLastName();
    });

    $("#uname").blur(function () {
        validateUsername();
    });

    $("#email").blur(function () {
        validateEmail();
    });

    $("#password").blur(function () {
        validatePassword();
    });

    $("#c_password").blur(function () {
        validateC_Password();
    });
    
    $("#phone").blur(function () {
         validatePhoneNo();
    });

    $("#gender").blur(function () {
        validateGender();
    });

    $("#address").blur(function () {
        validateAddress();
    });
    var text_max = 200;
    $('#counter').html('Only '+  text_max + ' characters');
    $('#address').keyup(function () {
        var text_length = $("#address").val().length;
        var text_remaining = text_max - text_length;

        $('#counter').html(text_remaining + ' characters remaining');
    });
    
    $("#logInPassword").blur(function () {
        validateLogInPassword();
    });

    $("#submit").click(function () {
        validateFirstName();
        validateLastName();
        validateUsername();
        validateEmail();
        validatePassword();
        validateC_Password();
        validatePhoneNo(); 
        validateGender();
        validateAddress();
        validateLogInPassword();
    });
});
//
///* This function for firstnmae required*/
function validateFirstName() {
    var firstName = $("#fname").val();
    if (firstName == null || firstName == "") {
        $("#fname_error").text("First name must be required");
        return false;
    } else {
        $("#fname_error").hide();
    }
}

/* This function for lastnmae required*/
function validateLastName() {
    var lastName = $("#lname").val();
    if (lastName == null || lastName == "") {
        $("#lname_error").text("Last name must be required");
        return false;
    } else {
        $("#lname_error").hide();
    }
}

/* This function for usrename validation*/
function validateUsername() {
    var userName = $("#uname").val();
    if (userName == null || userName == "") {
        $("#uname_error").text("Username must be required");
        return false;
    } else {
        $("#uname_error").hide();
    }
}


/* This function for email validation*/
function validateEmail() {
    //var userName = $("#email").val();
    var email = $("#email").val();
    var emailDomain = ["com", "org", "in"];
    var emailText = email.toLowerCase();
    var Substr_uname = emailText.substring(emailText.lastIndexOf("@") - 1);
    var Substr_domain = emailText.substring(emailText.lastIndexOf(".") + 1);
    if (email == null || email == "") {
        $("#email_error").text("Email must be required");
        return false;
    } else if ($.inArray(Substr_domain, emailDomain) == -1 || emailText.indexOf('@') == -1) {
        $("#email_error").text("Enter valid email");
    } else {
        $.ajax({
            url: 'php/checkemail.php',
            dataType: "json",
            data: {email:email},
            type: 'POST',
            success: function (response) {
                if(response.data == 'failure'){
                    $("#email_error").text(response.msg);
                }else{
                    $("#email_error").hide();
                }  
            },
            error: function (response) {
                cosle.log(response);
            }
        });
    }
}

/* This function for password validation*/
/* contain at least 8 characters and max 10
   contain at least 1 number
   contain at least 1 lowercase character (a-z)
   contain at least 1 uppercase character (A-Z)
   contains only 0-9a-zA-Z*/
function validatePassword() {
    var pwd = $("#password").val();
    var reg = (/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/);
    if (pwd == null || pwd == "") {
        $("#password_error").text("Password must be required with atleast 8 characters");
        return false;
    } else if (reg.test(pwd) == false) {
        $("#password_error").text("Password must be alphanumeric");
    } else {
        $("#password_error").hide();
    }
}

/* This function for Confirm-password validation*/
function validateC_Password() {
    var pwd = $("#password").val();
    var confirmPwd = $("#c_password").val();
    if (confirmPwd == null || confirmPwd == "" || confirmPwd !== pwd) {
        $("#error_Cpassword").text("Please confirm your password");
        return false;
    } else {
        $("#error_Cpassword").hide();
    }
}

/* This function for phone number validation*/
function validatePhoneNo() {
    var phoneNo = $("#phone").val();
    var reg =/^[0-9-+]+$/;
    if (reg.test(phoneNo) == false) {
        $("#phone_error").text("Enter right phone number");
    } else {
        $("#phone_error").hide();
    }
   }

/* This function is used to gender validation */
function validateGender() {
    if (!($("input[name=gender]").is(":checked"))) {
        $("#error_Gender").text("Please choose a gender");
    } else {
        $("#error_Gender").hide();
    }
}

/* This function is used to textarea counter */
function validateAddress() {
    var Area = $("#address").val();
    if (Area == null || Area == "") {
        $("#error_Address").text("Please enter your address");
        return false;
    } else {
        $("#error_Address").hide();
    }
}

/* This function for login-password validation*/
function validateLogInPassword() {
    var logInpassword = $("#logInPassword").val();
    if (logInpassword == null || logInpassword == "") {
        $("#logInPassword_error").text("Please enter correct password");
        return false;
    } else {
        $("#logInPassword_error").hide();
    }
}