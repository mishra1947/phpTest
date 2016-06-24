document.getElementById('name').addEventListener("blur", validateName);
document.getElementById('name').onkeyup = function () {
    checkName();
};
document.getElementById('email').addEventListener("blur", validateEmail);
document.getElementById('name').addEventListener("change", toUpper);
document.getElementById('email').addEventListener("change", toLower);

document.getElementById('submit').onclick = function () {
    document.getElementById('user_data-div').style.display = 'block';
    validateName();
    validateEmail();
    dataTabel();
};
document.body.onload = function(){textCounter();};



function validateName() {
    var name = document.getElementById('name').value;
    if (name === "" || name === null) {
        document.getElementById('err-name').innerHTML = "name is required";
        document.getElementById('err-name').style.color = 'red';
        return false;
    } else {
        document.getElementById('err-name').style.display = 'none';
    }
}
function validateEmail() {
    var email = document.getElementById('email').value;
    var emailDomain = ['com', 'in', 'org'];
    var emailText = email.toLowerCase();
    var domain = emailText.substring(emailText.lastIndexOf(".") + 1);
    if (email === "" || email === null) {
        document.getElementById('err-email').innerHTML = "email is required";
        document.getElementById('err-email').style.setProperty('color', 'red');
        document.getElementById("submit").disabled = true;
        return false;
    } else if ((emailDomain.indexOf(domain)) === -1) {
        document.getElementById('err-email').innerHTML = "right email please";
        document.getElementById('err-email').style.setProperty('color', 'red');
        document.getElementById("submit").disabled = true;
    } else {
        document.getElementById('err-email').style.display = 'none';
    }
}
function toLower() {
    var email = document.getElementById('email');
    email.value = email.value.toLowerCase();
}
function toUpper() {
    var name = document.getElementById('name');
    name.value = name.value.toUpperCase();
}
//function checkCookies() {
//    var text = "";
//    if (navigator.cookieDisabled === true) {
//        text = "Cookies are disabled.";
//    } else {
//        text = "Cookies are not disabled.";
//    }
//    document.getElementById("demo").innerHTML = text;
//}
function checkName() {
    var name = document.getElementById('name').value;
    var reg = /^[a-zA-Z ]*$/;
    if (!reg.test(name)) {
        document.getElementById('name').value = "";
    }
}

function dataTabel() {
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var phone = document.getElementById('phone').value;
    var address = document.getElementById('address').value;
    var user_data = [];
    user_data.push(name, email, phone, address);
    for (var i = 0; i < 4; i++) {
        document.getElementsByTagName('td').item(i + 5).innerHTML = user_data[i];
    }
}

function textCounter(){
    var max_text = 200;
    document.getElementById('counter').innerHTML = "Only " + max_text + " characters required";
    document.getElementById('address').onkeyup = function () {
    var text_length = document.getElementById('address').value.length;
    var remaining_text = max_text - text_length;
    document.getElementById('counter').innerHTML = remaining_text + " characters remaining";
};
}