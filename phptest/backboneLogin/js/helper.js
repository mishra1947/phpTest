App.models = {};
App.views = {};
App.routers = {};
App.fullAPIURL = function (path) {
    return "http://bb-login.com/" + path;
};
App.validateFirstName = function () {
    var firstName = $("#fname").val();
    
    if (firstName === null || firstName === "") {
        $("#fname_error").addClass("error");
        $("#fname_error").text("First name must be required");
        return false;
    } else {
        $("#fname_error").hide();
    }
};
App.validateLastName = function () {
    var lastName = $("#lname").val();
    if (lastName === null || lastName === "") {
        $("#lname_error").addClass("error");
        $("#lname_error").text("Last name must be required");
        return false;
    } else {
        $("#lname_error").hide();
    }
};
App.validateUsername = function () {
    var userName = $("#uname").val();
    if (userName === null || userName === "") {
        $("#uname_error").addClass("error");
        $("#uname_error").text("Username must be required");
        return false;
    } else {
        $("#uname_error").hide();
    }
};
App.validateEmail = function () {
    var email = $("#email").val();
    var emailDomain = ["com", "org", "in"];
    var emailText = email.toLowerCase();
    var Substr_domain = emailText.substring(emailText.lastIndexOf(".") + 1);
    if (email === null || email === "") {
        $("#email_error").addClass("error");
        $("#email_error").text("Email must be required");
        return false;
    } else if ($.inArray(Substr_domain, emailDomain) === -1 || emailText.indexOf('@') === -1) {
        $("#email_error").addClass("error");
        $("#email_error").text("Enter valid email");
    }else {
        $.ajax({
            url: 'php/checkemail.php',
            dataType: "json",
            data: {email:email},
            type: 'POST',
            success: function (response) {
                if(response.data == 'failure'){
                    $("#email_error").addClass("error");
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
};
App.validatePassword = function () {
    var pwd = $("#password").val();
    var reg = (/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/);
    if (pwd === null || pwd === "") {
        $("#password_error").addClass("error");
        $("#password_error").text("Password must be required with atleast 8 characters");
        return false;
    } else if (reg.test(pwd) === false) {
        $("#password_error").addClass("error");
        $("#password_error").text("Password must be alphanumeric");
    } else {
        $("#password_error").hide();
    }
};
App.validateCpassword = function () {
    var pwd = $("#password").val();
    var confirmPwd = $("#c_password").val();
    if (confirmPwd === null || confirmPwd === "" || confirmPwd !== pwd) {
        $("#error_Cpassword").addClass("error");
        $("#error_Cpassword").text("Please confirm your password");
        return false;
    } else {
        $("#error_Cpassword").hide();
    }
};
App.validatePhone = function () {
    var phoneNo = $("#phone").val();
    var reg = /^[0-9-+]+$/;
    if (reg.test(phoneNo) === false) {
        $("#phone_error").addClass("error");
        $("#phone_error").text("Enter right phone number");
    } else {
        $("#phone_error").hide();
    }
};
App.validateGender = function () {
    if (!($("input[name=gender]").is(":checked"))) {
        $("#error_Gender").addClass("error");
        $("#error_Gender").text("Please choose a gender");
    } else {
        $("#error_Gender").hide();
    }
};
App.addressCounter = function () {
    var text_max = 200;
    $('#counter').html('Only ' + text_max + ' characters');
    var text_length = $("#address").val().length;
    var text_remaining = text_max - text_length;

    $('#counter').html(text_remaining + ' characters remaining');
    $('#address').keyup(function () {
        var text_length = $("#address").val().length;
        var text_remaining = text_max - text_length;

        $('#counter').html(text_remaining + ' characters remaining');
    });
};