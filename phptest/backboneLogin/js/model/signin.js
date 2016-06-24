var App = App || {};
$(function () {

    App.models.signin = Backbone.Model.extend({
        url: App.fullAPIURL("php/signin.php"),
        initialize: function () {

        }
    });
});