var App = App || {};
$(function () {

    App.models.signup = Backbone.Model.extend({
        url: App.fullAPIURL("php/signup.php"),
        initialize: function () {

        },
        defaults: {
            fname: '',
            lname: '',
            uname: '',
            email: '',
            password: '',
            c_password: '',
            phone: '',
            gender: '',
            address: ''
        }
    });
});