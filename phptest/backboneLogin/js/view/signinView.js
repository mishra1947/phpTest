'use strict';
var App = App || {};
$(function () {
    App.views.signinView = Backbone.View.extend({
        el: $("#logIn"),
        tmplSignin: _.template($("#signinTemplate").html()),
        tmplForgetPassword: _.template($("#forgetPasswordTemplate").html()),
        initialize: function () {

        },
        events: {
            "click #loginSubmit": "submitAction1",
            "click #forgetPasswordSubmit": "forgetPasswordAction1"
        },
        render: function () {
            $(this.el).html(this.tmplSignin);
            $("#btn-forget-password").bind('click', $.proxy(this.forgetPassword, this));
        },
        forgetPassword: function () {
            var that = this;
            $(this.el).html(that.tmplForgetPassword)
             return that;
        },
        submitAction1: function () {
            var Lemail = $("#logInEmail").val();
            var pwd = $("#logInPassword").val();
            this.model = new App.models.signin();
            this.model.save({email: Lemail, pwd: pwd},
                    {success: function (model, response, options) {
                            console.log(response);
                            Backbone.history.navigate("#dashboard", {trigger: true, replace: true});
                        },
                        error: function (model, response, options) {
                            $("#signup-first").addClass("error");
                            $("#signup-first").text(response.responseText);
                            console.log(response.responseText);
                        }
                    });
            return false;
        },
        forgetPasswordAction1: function () {
            var email = $("#logInEmail").val();
            var newPassword = $("#newLogInPassword").val();
            var cNewPassword = $("#cNewPassword").val();
            if (email !== '' && newPassword !== '' && cNewPassword !== '') {
                if (newPassword !== cNewPassword) {
                    $('#cNewPassword_error').addClass('error');
                    $('#cNewPassword_error').html('Password confirmation failed.');
                } else {
                    this.model = new App.models.signin();
                    this.model.url = App.fullAPIURL("php/forgetPassward.php"),
                    this.model.save({email: email, newPassword: newPassword}, {
                        success: function (model, response, options) {
                            console.log(response);
                            $('#cNewPassword_error').removeClass('error');
                            $('#cNewPassword_error').html('Password updated.');
                            Backbone.history.navigate("#signUp", {trigger: true, replace: true});
                        },
                        error:function(model, response, options){
                            $('#cNewPassword_error').addClass('error');
                            $('#cNewPassword_error').html(response.responseText);
                        }
                    });
                }
            }
        }
    });
});

