var App = App || {};
$(function () {
    App.views.dashboardView = Backbone.View.extend({
        el: $("#logIn"),
        tmplDashboard: _.template($("#dashboardTemplate").html()),
        tmplHeader: _.template($("#headerTemplate").html()),
        tmplFooter: _.template($("#footerTemplate").html()),
        tmplDashboardHome: _.template($("#dashboardHomeTemplate").html()),
        tmplViewProfile: _.template($("#viewProfileTemplate").html()),
        tmplEditProfile: _.template($("#editProfileTemplate").html()),
        tmplChangePwd: _.template($("#changePwdTemplate").html()),
        initialize: function () {

        },
        events: {
            "click #update-button": "updateProfileAction",
            "click #setting-button": "settingAction",
            "click #submit_user_instructions": "userInstructionAction"
        },
        render: function () {
            var that = this;
            $(this.el).html(this.tmplDashboard);
            this.model = new App.models.dashboard();
            this.model.fetch({
                success: function (model, response, xhr) {
                    var username = new App.models.dashboard(response);
                    $("#header").html(that.tmplHeader(username.toJSON()));
                }
            });
            $("#footer").html(this.tmplFooter);
            $("#dashboard-container").html(this.tmplDashboardHome);
            $("#btn-dashboard-home").bind('click', $.proxy(this.renderDashboardHome, this));
            $("#btn-view-profile").bind('click', $.proxy(this.renderViewProfile, this));
            $("#btn-edit-profile").bind('click', $.proxy(this.renderEditProfile, this));
            $("#btn-setting").bind('click', $.proxy(this.renderSetting, this));
            $("#btn-logOut").bind('click', $.proxy(this.dashboardLogout, this));
            //$("#btn-view-profile, #btn-edit-profile, #btn-setting").removeClass('active');
        },
        renderViewProfile: function () {
            var that = this;
            this.model = new App.models.dashboard();
            this.model.url = App.fullAPIURL("php/viewProfile.php");
            this.model.fetch({
                success: function (model, response, xhr) {
                    var details = new App.models.dashboard(response);
                    $("#btn-edit-profile, #btn-setting, #btn-dashboard-home").removeClass('active');
                    $("#btn-view-profile").addClass("active");
                    $("#dashboard-container").html(that.tmplViewProfile(details.toJSON()));
                    return that;
                },
                error: function () {
                    console.log("error");
                }
            });
        },
        renderDashboardHome: function () {
            this.render();
            $("#btn-view-profile, #btn-edit-profile, #btn-setting").removeClass('active');
            $("#btn-dashboard-home").addClass('active');
        },
        renderEditProfile: function () {
            var that = this;
            this.model = new App.models.dashboard();
            this.model.url = App.fullAPIURL("php/viewProfile.php");
            this.model.fetch({
                success: function (model, response, xhr) {
                    var details = new App.models.dashboard(response);
                    $("#btn-view-profile, #btn-setting, #btn-dashboard-home").removeClass('active');
                    $("#btn-edit-profile").addClass("active");
                    $("#dashboard-container").html(that.tmplEditProfile(details.toJSON()));
                    App.addressCounter();
                    return that;
                },
                error: function () {
                    console.log("error");
                }
            });

        },
        renderSetting: function () {
            $("#btn-view-profile, #btn-edit-profile, #btn-dashboard-home").removeClass('active');
            $("#btn-setting").addClass('active');
            $("#dashboard-container").html(this.tmplChangePwd());
        },
        dashboardLogout: function () {
            Backbone.history.navigate("#signin", {trigger: true, replace: true});
        },
        updateProfileAction: function () {
            var firstName = $("#fname").val(),
                    lastName = $("#lname").val(),
                    userName = $("#uname").val(),
                    email = $("#email").val(),
                    phoneNo = $("#phone").val(),
                    address = $("#address").val();
            this.model = new App.models.dashboard();
            this.model.url = App.fullAPIURL("php/editProfile.php");
            this.model.set({
                firstName: firstName,
                lastName: lastName,
                userName: userName,
                email: email,
                phoneNo: phoneNo,
                address: address
            });
            this.model.save(null, {
                success: function (model, response, options) {
                    $("#update-successful").html('<b>Profile updated successfully</b>');
                },
                error: function () {
                    console.log("error");
                }
            });
            return false;
        },
        settingAction: function () {
            var oldPwd = $("#old-password").val();
            var newPwd = $("#new-password").val();
            var cNewPwd = $("#cnew-password").val();
            this.model = new App.models.dashboard();
            this.model.url = App.fullAPIURL("php/setting.php");
            if (newPwd === cNewPwd) {
                this.model.set({
                    oldPwd: oldPwd,
                    newPwd: newPwd
                });
                this.model.save(null, {
                    success: function (model, response, options) {
                        $("#setting-msg").removeClass("error");
                        $("#setting-msg").text('Password updated successfully');
                    },
                    error: function (model, response, options) {
                        $("#setting-msg").addClass("error");
                        $("#setting-msg").text(response.responseText);
                    }
                });
            } else {
                $("#setting-msg").addClass("error");
                $("#setting-msg").text("Please confirm your new password");
            }
        },
        userInstructionAction: function(){
            var instruction =$("#user_instruction").val();
            this.model = new App.models.dashboard(); 
            this.model.save({instruction:instruction},{
                success: function(model, response, options){
                    console.log(response);
                    $("#upload-instruction").html("<tabel><tr>"+response.instruction+"</tabel></tr>");
                },
                error:function(model, response, options){
                    console.log(response);
                    console.log("not updated");
                }
            });
        }
    });
});