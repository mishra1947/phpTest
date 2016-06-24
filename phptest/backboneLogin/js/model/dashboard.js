var App = App || {};
$(function () {

    App.models.dashboard = Backbone.Model.extend({
        url: App.fullAPIURL("php/dashboard.php"),
        initialize: function () {

        }
    });
});