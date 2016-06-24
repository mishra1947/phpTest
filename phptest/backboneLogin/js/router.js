var App = App || {};
$(function () {
    App.routers.route = Backbone.Router.extend({
        routes: {
            'signin': 'signin',
            'signUp': 'signUp',
            'dashboard': 'dashboard',
            'dashboard/viewProfile': 'dashboardViewProfile',
            'dashboard/editProfile': 'dashboardEditProfile',
            'dashboard/forgetPassword': 'siginForgetPassword',
            '*actions': 'signUp'
        },
        signUp: function () {
            var view = new App.views.signupView();
            view.render();
        },
        signin: function () {
            var view = new App.views.signinView();
            view.render();
        },
        dashboard: function(){
            var view = new App.views.dashboardView();
            view.render();
        },
        dashboardViewProfile: function(){
            var view = new App.views.dashboardView();
            view.renderViewProfile();
        },
        dashboardEditProfile: function(){
            var view = new App.views.dashboardView();
            view.renderEditProfile();
        },
        siginForgetPassword: function(){
             var view = new App.views.signinView();
             view.forgetPassword();
        }
    });
});
