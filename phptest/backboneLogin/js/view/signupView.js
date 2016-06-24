var App = App || {};
$(function () {
    App.views.signupView = Backbone.View.extend({
        el: $("#logIn"),
        template: _.template($("#signupTemplate").html()),
        initialize: function () {

        },
        events: {
            "submit": "sumbitAction",
            "blur input[name=fname]": App.validateFirstName,
            "blur input[name=lname]": App.validateLastName,
            "blur input[name=uname]": App.validateUsername,
            "blur input[name=email]": App.validateEmail,
            "blur input[name=password]": App.validatePassword,
            "blur input[name=c_password]": App.validateCpassword,
            "blur input[name=phone]": App.validatePhone,
            "blur input[name=gender]": App.validateGender
        },
        render: function () {
            $(this.el).html(this.template);
            App.addressCounter();
        },
        sumbitAction: function () {
            var firstName = $("#fname").val();
            var lastName = $("#lname").val();
            var userName = $("#uname").val();
            var email = $("#email").val();
            var pwd = $("#password").val();
            var confirmPwd = $("#c_password").val();
            var phoneNo = $("#phone").val();
            var address = $("#address").val();
            var gender = $("input[name=gender]:checked").val()
            this.model = new App.models.signup();
            if(firstName!=="" && lastName!=="" && userName!=="" && email!=="" && pwd!==""&& confirmPwd!==""){
            this.model.save({
                firstName: firstName,
                lastName: lastName,
                userName: userName,
                email: email,
                pwd: pwd,
                confirmPwd: confirmPwd,
                phoneNo: phoneNo,
                address: address,
                gender: gender
            });
            Backbone.history.navigate("#signin", {trigger: true, replace: true});
        }else{
            console.log("Fill all required field");
        }
            return false;

        }
    });
});

